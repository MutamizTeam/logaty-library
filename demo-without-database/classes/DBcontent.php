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

    private function pdoConnectWithDatabase() {
        if($connectionString = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_dbName,
                $this->_user, $this->_pass)) {
            $connectionString->exec("set names {$this->_charset}");

            return $connectionString;
        }

        return false;
    }

    private function mysqlConnectWithDatabase() {
        if($connectionString = mysql_connect($this->_host, $this->_user,
                $this->_pass)) {
            mysql_select_db($this->_dbName, $connectionString);
            mysql_set_charset($this->_charset, $connectionString);

            return $connectionString;
        }
        return false;
    }

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

    private function checkIfContentExistInCurrentLanguage($table, $id) {
        $sql = "SELECT local FROM {$table} WHERE id = {$id}";
        $correctFunctionName = $this->_dbType . 'Query';
        $this->$correctFunctionName($sql);
        $languages = explode(',', $this->_results[0]['local']);
        $this->_valiableLang = $languages;
        if(in_array(currentLang(), $languages)) {
            return true;
        }

        return false;
    }

    private function valiableLang() {
        $links = '';
        $link = new Link();
        foreach($this->_valiableLang as $lang) {
            $links .= " - <a href='" .
                    $link->create('', $lang)
                    . "'>" . languageNameIntongue($lang) . "</a>";
        }
        return $links;
    }

    public function get($table, $id = '') {
        if(Config::get('hide_untranslated') === true) {
            if($id) {
                if($this->checkIfContentExistInCurrentLanguage($table, $id)) {
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id} AND lang = '" . currentLang() . "'";
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql)) {
                        return $this->_results[0];
                    }
                    return false;
                } elseif(Config::get('options/alert_user_available_lang') == true){
                    return notValiableMessage(currentLang()) . $this->valiableLang();
                }
            } else {
                $sql = "SELECT * FROM {$this->_tableName} WHERE lang = '" . currentLang() . "'";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql)) {
                    return $this->_results;
                }
                return false;
            }
        } else {
            if($id) {
                if($this->checkIfContentExistInCurrentLanguage($table, $id)) {
                    $sql = "SELECT * FROM {$this->_tableName} WHERE id = {$id}";
                    $correctFunctionName = $this->_dbType . 'Query';
                    if($this->$correctFunctionName($sql)) {
                        return $this->_results[0];
                    }
                    return false;
                } elseif(Config::get('options/alert_user_available_lang') == true) {
                    return notValiableMessage(currentLang()) . $this->valiableLang();
                }
            } else {
                $sql = "SELECT * FROM {$this->_tableName}";
                $correctFunctionName = $this->_dbType . 'Query';
                if($this->$correctFunctionName($sql)) {
                    return $this->_results;
                }
                return false;
            }
        }
    }

}
