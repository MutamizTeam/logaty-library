<?php

/**
 * database class
 * @author Moahammad Anzawi <m.anzawi2013@gmail.com>
 * @link www.t3lam.net
 * @license GPL2
 * @version 1.0.0
 */

/**
 * DBContent
 * Manage Database connection and get content
 * @author Mohammad Anzawi
 * @copyright 2015
 * @version 1.0.0
 * @access public
 */
########### HINE ############################/
# Sorry for  code in this class,             /
# when I finished writing it and reread it!  /
# I didnt understand anything!!!             /
#############################################/

class DBContent
{

    /** @var object $_instace store DBContent object to allow one connection only */
    private static $_instace;
    private $__instace;

    /**
     *
     * @var string $_extention table prefix
     * @var string $_db connection string
     * @var string $_dbType database type
     * @var string $_query SQL statement
     */
    private $_extention,
            $_db,
            $_dbType,
            $_results,
            $_valiableLang = array();

    /**
     *
     * @var string $_host host name
     * @var string $_user database username
     * @var string $_pass database password
     * @var string $_charset database unicode
     * @var string $_dbName database name
     */
    private $_host,
            $_user,
            $_pass,
            $_charset,
            $_dbName,
            $_tableName;

    /**
     * DBContent::__construct()
     * initialize variables values
     * @return void
     */
    private function __construct()
    {
        $conf = $GLOBALS['langConfig'];
        // look to (core/config.php) to know what this variables
        //$this->_extention = getOption('database']['colmns_tag');
        $this->_dbType = strtolower($conf['database']['db_type']);
        $this->_host = $conf['database']['host'];
        $this->_user = $conf['database']['username'];
        $this->_pass = $conf['database']['password'];
        $this->_charset = $conf['database']['charset'];
        $this->_dbName = $conf['database']['db_name'];
        $this->_tableName = $conf['database']['table_name'];
        // get connection string
        $connectFunction = $this->_dbType . 'ConnectWithDatabase';
        $this->_db = $this->$connectFunction();
    }

    /**
     * DBContent::connect()
     * create instace connection with database
     * @return object
     */
    public static function connect()
    {
        // check if we connect with database before or not
        if(!isset(self::$_instace))
        {
            // if not return new object 
            self::$_instace = new DBContent();
        }

        // if treu return this connection
        return self::$_instace;
    }

    /**
     * create connection string use PDO
     * @return boolean|\PDO
     */
    private function pdoConnectWithDatabase()
    {
        if($connectionString = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_dbName, $this->_user, $this->_pass))
        {
            $connectionString->exec("set names {$this->_charset}");

            return $connectionString;
        }

        return false;
    }

    /**
     * create connection string use MySQL
     * @return boolean|/MYSQL
     */
    private function mysqlConnectWithDatabase()
    {
        if($connectionString = mysql_connect($this->_host, $this->_user, $this->_pass))
        {
            mysql_select_db($this->_dbName, $connectionString);
            mysql_set_charset($this->_charset, $connectionString);

            return $connectionString;
        }
        return false;
    }

    /**
     * create connection string use MySQLi
     * @return boolean|\mysqli
     */
    private function mysqliConnectWithDatabase()
    {
        if($connectionString = new mysqli($this->_host, $this->_user, $this->_pass, $this->_dbName))
        {
            mysqli_set_charset($connectionString, $this->_charset);

            return $connectionString;
        }

        return false;
    }

    /**
     * DBContent::mysqlQuery()
     * run mysql query function
     * @param string $sql
     * @return array
     */
    private function mysqlQuery($sql)
    {
        $result = mysql_query($sql, $this->_db);
        if($this->_results = mysql_fetch_array($result))
        {
            return true;
        }
        return false;
    }

    /**
     * DBContent::mysqliQuery()
     * run mysqli query method
     * @param string $sql
     * @return array
     */
    private function mysqliQuery($sql)
    {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        if($result = $stmt->get_result())
        {
            $this->_results = $result->fetch_assoc();
            return true;
        }
        return false;
    }

    /**
     * DBContent::pdoQuery()
     * * run pdo query method
     * @param string $sql
     * @return array
     */
    private function pdoQuery($sql)
    {
        $this->_results = '';
        $stmt = $this->_db->prepare($sql);
        //echo $sql;
        if($stmt->execute())
        {
            $this->_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return true;
        }
        return false;
    }

    /*
     * 
     * Now we want generate moethodes to get Content from database with current Language
     * 
     */

    /**
     * Check if content has $id is exist in current language or not
     * and save languages post translated in $_valiableLang variable.
     * @param string $table
     * @param number $id
     * @return boolean
     */
    private function checkIfContentExistInCurrentLanguage($table, $id)
    {
        // sql statmante to get valiable languages og this post
        $sql = "SELECT local FROM {$table} WHERE id = {$id}";

        // choice correct function (pdoQuery() or mysqlQuery() or mysqliQuery())
        // the function created (_dbType) + 'Query'
        $correctFunctionName = $this->_dbType . 'Query';
        $this->$correctFunctionName($sql);
        
        // if content not exist in db then the id passed is invaled so return empty array for languages avalible
        if(!count($this->_results)) return array();
        
        $languages = explode(',', $this->_results[0]['local']);
        $this->_valiableLang = $languages;
        if(in_array(currentLang(), $languages))
        {
            return true;
        }

        return false;
    }

    /**
     * this function to create links for contents in a valiable language (translation content)
     * 
     * @param number $id
     * @param string $table
     * @return boolean|string
     */
    private function valiableLang($id = '', $table = '')
    {
        // check if $id and $table are set
        if($id && $table)
        {
            // call function checkIfContentExistInCurrentLanguage() to know 
            // valiable languages .
            $this->checkIfContentExistInCurrentLanguage($table, $id);
            // if current language are exist return false!
            /**
             * i know you ask yourself WHY ????
             * if option hide untranslation is false we want to show users all posts (in current language and other)
             * so if any post exist in (current language and other language) the system well be desplay same post more than one in same time
             * so we check if this post exist in current language show user this post in current language only.
             * 
             * too learn more see block code in line: 333 - 379 
             */
            if(in_array(currentLang(), $this->_valiableLang))
            {
                return false;
            }
            /**
             * @var string $lang to store links for avaliable language in and return it.
             */
            // get initial bracket
            $langs = ' (';
            // get all languages of post translated in and get tongue name
            foreach($this->_valiableLang as $lang)
            {
                $langs .= languageNameIntongue($lang) . ' - ';
            }
            // remove lanst dash
            $langs = rtrim($langs, ' - ');
            // close bracket
            $langs .= ')';
            return $langs;
        }
        else
        { // if $id and $table not set
            /**
             * @var string $links to save links in
             */
            $links = '';
            // create obect from Link() Class
            $link = new Link();
            // get all languages of post translated in and get tongue name and create it in links
            foreach($this->_valiableLang as $lang)
            {   
                $links .= " - <a href='" .
                        $link->create('', $lang)
                        . "'>" . languageNameIntongue($lang) . "</a>";
            }

            return $links;
        }
    }

    /**
     * this main function for this class only this function is public!! 'with connect method')
     * get correct content from tables in currect language
     * @param string $table
     * @param number $id
     * @return mixed
     */
    public function getContent($table, $id = '')
    {
        // check if hide untranslated option is enabled
        if(getOption('options/hide_untranslated'))
        {
            // check if $id is set
            if($id)
            {
                // check if post is exist in current language or not
                if($this->checkIfContentExistInCurrentLanguage($table, $id))
                {
                    // create select statement
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id_ref = {$id} AND lang = '" . currentLang() . "'";
                    // create function name we need
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql))
                    {
                        // return first record
                        $this->_results = $this->_results[0];
                        
                        return $this->_results[0];
                    }
                    // this else return to if in line 278 -  if($this->$correctFunctionName($sql))
                    // check if alert_user_available_lang is enabled alert user (this post not avaliable in his language and get him links for post in a valiable languages)
                }
                elseif(getOption('options/alert_user_available_lang') == true)
                {
                    $this->_results = array("title" => notValiableMessage(currentLang()) . $this->valiableLang(), 'content' => "");

                    return $this->_results;
                }
                // this else return for if in line 272 - if($id)
            }
            else
            {
                // if $id not set so the user in home/blog page then get all posts
                // create select statement
                $sql = "SELECT * FROM {$this->_tableName} WHERE lang = '" . currentLang() . "'";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql))
                {
                    return $this->_results;
                }

                // if not returnd anything then we have error in calling function then return false..
                return false;
            }
            // this else return to line 270 - if(getOption('options/hide_untranslated') == true)
            // if hide_untranslated option is desabled
        }
        else
        {
            // if $id set
            if($id)
            {
                // check if post is exist in current language or not
                if($this->checkIfContentExistInCurrentLanguage($table, $id))
                {
                    // create select statement
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id_ref = {$id} AND lang = '" . currentLang() . "'";
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql))
                    {
                        return $this->_results[0];
                    }
                }
                else
                {

                    // this noted code , to get posts in defualte language if it not exist in current language you can enabled this code and remove (return notValiableMessage(currentLang()) . $this->valiableLang();) in line 331

                    /*
                      $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id} AND lang = '" . defualtLang() . "'";
                      $correctFunctionName = $this->_dbType . 'Query';
                      if($this->$correctFunctionName($sql))
                      {
                      if(count($this->_results))
                      {
                      return $this->_results[0];
                      }
                      else
                      {
                      if(getOption('options/alert_user_available_lang') == true)
                      {
                      $this->_results[0] = array(
                      "title" => notValiableMessage(currentLang()) . $this->valiableLang(),
                      "content" => ""
                      );
                      }
                      }
                      }
                      */
                    // return this post is not a valiable in current language and links for post in a valiable in languages
                    $this->_results[0] = array(
                        "title" => notValiableMessage(currentLang()) . $this->valiableLang(),
                        "content" => ""
                    );
                    return $this->_results[0];
                }
            }
            else
            {
                // create select statement to get all contents in current language
                $sql = "SELECT * FROM {$this->_tableName} WHERE lang = '" . currentLang() . "'";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql))
                {
                    /**
                     * @var array $inCurrentLang save all contents in current language
                     */
                    $inCurrentLang = $this->_results;
                    // get all contents in other languages
                    $sql = "SELECT * FROM {$this->_tableName} WHERE lang <> '" . currentLang() . "'";
                    $correctFunctionName = $this->_dbType . 'Query';
                    $this->$correctFunctionName($sql);
                    /**
                     * @var array $postsNotTraslated to save all contents in other languages
                     */
                    $postsNotTraslated = $this->_results;
                    /**
                     * @var int $x counter 
                     */
                    $x = 0;
                    $id_ref = 0;
                    foreach($postsNotTraslated as $c)
                    {
                        // remove record from $postsNotTraslated if content avalible in current language
                        if($this->valiableLang($c['id_ref'], $table) == false)
                        {
                            unset($postsNotTraslated[$x]);
                        }
                        elseif($c['id_ref'] != $id_ref)
                        {
                            // if this content is not a valiable in current language add hint for user to valiable language
                            $postsNotTraslated[$x]['title'] = $c['title'] . '<small>' . $this->valiableLang($c['id_ref'], $table) . '</small>';
                            $postsNotTraslated[$x]['content'] = "<strong style='color:red; padding:5px; border:2px solid #999;'>" . notValiableMessage(currentLang()) . $this->valiableLang($c['id_ref'], $table) ."</strong>";
                            
                        }
                        else
                        {
                            unset($postsNotTraslated[$x]);
                        }

                        $x++;
                        $id_ref = $c['id_ref'];
                    }
                    /**
                     * @var array $results merge $inCurrentLang and $postsNotTraslated and store it by id number (you can change this to date or anything else!)
                     */
                     
                    
                    $results = array_merge((array) $postsNotTraslated, (array) $inCurrentLang);

                    usort($results, function($a, $b)
                    {
                        return $a['id_ref'] - $b['id_ref'];
                    });
                    $this->_results = $results;
                    return true;
                }
                return false;
            }
        }
    }

    /**
     * function to set content into translation table 
     * its esy to use
     * just send array have column name and his value like this
     * 
     * $example = array("column_name"=> "my Value", "column_name_2"=> "my Value", ..... etc);
     * setContent($example);
     * 
     * @param type $fields
     * @return boolean
     */
    public function setContent($fields = array())
    {
        $table = $this->_tableName;
        $keys = array_keys($fields);
        $values = null;
        $x = 1;
        /**

         * 
         * array(
         *  0 => ll,
         * 1=> mm
         * 
         * )
         *  `ll`,`mm`,
         *  */
        foreach($fields as $value)
        {
            $values .= "?";
            if($x < count($fields))
            {
                $values .= ', ';
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

        if(!$this->query($sql, $fields)->error())
        {
            return true;
        }

        return false;
    }

    /**
     * function to update data from translate table
     * its esy to use , you can use it like insert
     * 
     * 
     * suppose i want to update row have id number 5
     * 
     * $example = array("column_name"=> "my New Value", "column_name_2"=> "my New Value", ..... etc)
     * EditContent(5, $example)
     * 
     * 
     * @param int $id
     * @param array $fields
     * @return boolean
     */
    public function editContent($id, $fields = array())
    {
        $set = null;
        $x = 1;
        $table = $this->_tableName;
        foreach($fields as $name => $value)
        {
            $set .= "{$name} = ?";
            if($x < count($fields))
            {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if(!$this->query($sql, $fields)->error())
        {
            return true;
        }

        return false;
    }

    /**
     * Now we Need To generat method to create Library Tables
     * 
     * You can Add colums as you like in this table to cosumize it as you like
     * 
     * NOTE: you can add any thing but you cant edit or delete  any column i created!!
     */
    public function createLogatyTables()
    {
        return;
        $sql = "CREATE TABLE IF NOT EXISTS `$this->_tableName` (
                `id` int(11) NOT NULL,
                `lang` varchar(10) NOT NULL,
                `title` varchar(255) NOT NULL,
                `content` text NOT NULL,
                `id_ref` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

              -- --------------------------------------------------------

              --
              --

             
              -- Indexes for table `content`
              --
              ALTER TABLE `$this->_tableName`
                ADD PRIMARY KEY (`id`);

            
              --
              -- AUTO_INCREMENT for table `$this->_tableName`
              --
              ALTER TABLE `content`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
            ";

        $correctFunctionName = $this->_dbType . 'Query';

        $correctFunctionName($sql);

        $options = $GLOBALS['langConfig'];
    }

    // return results

    public function results()
    {
        return $this->_results;
    }

}
