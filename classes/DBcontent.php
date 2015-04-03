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
    private function __construct() {

        // look to (core/config.php) to know what this variables
        $this->_extention = Config::get('database/colmns_tag');
        $this->_dbType = strtolower(Config::get('database/db_type'));
        $this->_host = Config::get('database/host');
        $this->_user = Config::get('database/username');
        $this->_pass = Config::get('database/password');
        $this->_charset = Config::get('database/charset');
        $this->_dbName = Config::get('database/db_name');
        $this->_tableName = Config::get('database/table_name');
        // get connection string
        $connectFunction = $this->_dbType . 'ConnectWithDatabase';
        $this->_db = $this->$connectFunction();
    }

    /**
     * DBContent::connect()
     * create instace connection with database
     * @return object
     */
    public static function connect() {
        // check if we connect with database before or not
        if(!isset(self::$_instace)) {
            // if not return new object 
            self::$_instace = new DBContent();
        }

        // if yes return this connection
        return self::$_instace;
    }

    /**
     * create connection string use PDO
     * @return boolean|\PDO
     */
    private function pdoConnectWithDatabase() {
        if($connectionString = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_dbName,
                $this->_user, $this->_pass)) {
            $connectionString->exec("set names {$this->_charset}");

            return $connectionString;
        }

        return false;
    }

    /**
     * create connection string use MySQL
     * @return boolean|/MYSQL
     */
    private function mysqlConnectWithDatabase() {
        if($connectionString = mysql_connect($this->_host, $this->_user,
                $this->_pass)) {
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
    private function mysqliConnectWithDatabase() {
        if($connectionString = new mysqli($this->_host, $this->_user,
                $this->_pass, $this->_dbName)) {
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
    private function mysqlQuery($sql) {
        $result = mysql_query($sql, $this->_db);
        if($this->_results = mysql_fetch_array($result)) {
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
    private function mysqliQuery($sql) {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        if($result = $stmt->get_result()) {
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
    private function pdoQuery($sql) {
        $this->_results = '';
        $stmt = $this->_db->prepare($sql);
        if($stmt->execute()) {
            $this->_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return true;
        }
        return false;
    }

    /**
     * Check if content has $id is exist in current language or not
     * and save languages post translated in $_valiableLang variable.
     * @param string $table
     * @param number $id
     * @return boolean
     */
    private function checkIfContentExistInCurrentLanguage($table, $id) {
        // sql statmante to get valiable languages og this post
        $sql = "SELECT local FROM {$table} WHERE id = {$id}";
        // choice correct function (pdoQuery() or mysqlQuery() or mysqliQuery())
        // the function created (_dbType) + 'Query'
        $correctFunctionName = $this->_dbType . 'Query';
        $this->$correctFunctionName($sql);
        $languages = explode(',', $this->_results[0]['local']);
        $this->_valiableLang = $languages;
        if(in_array(currentLang(), $languages)) {
            return true;
        }

        return false;
    }

    /**
     * this function to create links for post in a valiable language (translation post)
     * 
     * @param number $id
     * @param string $table
     * @return boolean|string
     */
    private function valiableLang($id = '', $table = '') {
        // check if $id and $table are set
        if($id && $table) {
            // call function checkIfContentExistInCurrentLanguage() to know 
            // valiable languages .
            $this->checkIfContentExistInCurrentLanguage($table, $id);
            // if current language are exist return false!
            /**
             * i know you ask yourself WHY ????
             * if option hide untranslation is false we want to show users all posts (in current language and other)
             * so if any post exist in (current language and other language) the system well be desplay same post 2 more time
             * so we check if this post exist in current language show user this post in current language only.
             * 
             * too learn more see block code in line: 333 - 379 
             */
            if(in_array(currentLang(), $this->_valiableLang)) {
                return false;
            }
            /**
             * @var string $lang to store links for avaliable language in and return it.
             */
            // get initial bracket
            $langs = ' (';
            // get all languages of post translated in and get tongue name
            foreach($this->_valiableLang as $lang) {
                $langs .= languageNameIntongue($lang) . ' - ';
            }
            // remove lanst dash
            $langs = rtrim($langs, ' - ');
            // close bracket
            $langs .= ')';
            return $langs;
        } else { // if $id and $table not set
            /**
             * @var string $links to save links in
             */
            $links = '';
            // create obect from Linke() Class
            $link = new Link();
            // get all languages of post translated in and get tongue name and create it in links
            foreach($this->_valiableLang as $lang) {
                $links .= " - <a href='" .
                        $link->create('', $lang)
                        . "'>" . languageNameIntongue($lang) . "</a>";
            }
            
            return $links;
        }
    }

    /**
     * this main function for this class (only this function is public!!)
     * get correct content from tables in currect language
     * @param string $table
     * @param number $id
     * @return mixed
     */
    public function get($table, $id = '') {
        // check if hide untranslated option is enabled
        if(Config::get('options/hide_untranslated') == true) {
            // check if $id is set
            if($id) {
                // check if post is exist in current language or not
                if($this->checkIfContentExistInCurrentLanguage($table, $id)) {
                    // create select statement
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id} AND lang = '" . currentLang() . "'";
                    // create function name we need
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql)) {
                        // return first record
                        return $this->_results[0];
                    }
                    // this else return to if in line 278 -  if($this->$correctFunctionName($sql))
                    // check if alert_user_available_lang is enabled alert user (this post not avaliable in his language and get him links for post in a valiable languages)
                } elseif(Config::get('options/alert_user_available_lang') == true) {
                    return notValiableMessage(currentLang()) . $this->valiableLang();
                }
                // this else return for if in line 272 - if($id)
            } else {
                // if $id not set so the user in home/blog page then get all posts
                // create select statement
                $sql = "SELECT * FROM {$this->_tableName} WHERE lang = '" . currentLang() . "'";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql)) {
                    return $this->_results;
                }
                
               // if not returnd anything then we have error in calling function then return false..
                return false;
            }
            // this else return to line 270 - if(Config::get('options/hide_untranslated') == true)
            // if hide_untranslated option is desabled
        } else {
            // if $id set
            if($id) {
                // check if post is exist in current language or not
                if($this->checkIfContentExistInCurrentLanguage($table, $id)) {
                    // create select statement
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id} AND lang = '" . currentLang() . "'";
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql)) {
                        return $this->_results[0];
                    }
                } else {
                    
                    // this noted code , to get posts in defualte language if it not exist in current language you can enabled this code and remove (return notValiableMessage(currentLang()) . $this->valiableLang();) in line 331
                    
                   /* $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id} AND lang = '" . defualtLang() . "'";
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql)) {
                        if(count($this->_results)) {
                            return $this->_results[0];
                        } else {
                            if(Config::get('options/alert_user_available_lang') == true) {
                                return notValiableMessage(currentLang()) . $this->valiableLang();
                            }
                        }
                    }*/
                    
                    // return this post is not a valiable in current language and links for post in a valiable in languages
                    return notValiableMessage(currentLang()) . $this->valiableLang();
                }
            } else {
                // create select statement to get all contents in current language
                $sql = "SELECT * FROM {$this->_tableName} WHERE lang = '" . currentLang() . "'";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql)) {
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
                    
                    foreach($postsNotTraslated as $c) {
                        // remove record from $postsNotTraslated if content avalible in current language
                        if($this->valiableLang($c['id'], $table) == false) {
                            unset($postsNotTraslated[$x]);
                        } else {
                            // if this content is not a valiable in current language add hint for user to valiable language
                            $postsNotTraslated[$x]['title'] = $c['title'] . '<small>' . $this->valiableLang($c['id'],
                                            $table) . '</small>';
                        }

                        $x++;
                    }
                    /**
                     * @var array $results merge $inCurrentLang and $postsNotTraslated and store it by id number (you can change this to date or anything else!)
                     */
                    $results = array_merge((array) $postsNotTraslated,
                            (array) $inCurrentLang);
                    usort($results,
                            function($a, $b) {
                        return $a['id'] - $b['id'];
                    });
                    return $results;
                }
                return false;
            }
        }
    }

}
