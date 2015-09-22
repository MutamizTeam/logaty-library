<?php
/**
 * init file
 * this file loaded when web app/site initialize
 */
// set header content HTML and charset utf-8
header('Content-Type: text/html; charset=utf-8');
// SEPARATOR
define('SP', DIRECTORY_SEPARATOR);
// main file directory
define('ROOT', dirname(__DIR__) . SP);
// classes file directory
define('CLS', ROOT . 'classes' . SP);
// functions file directory
define('FUNC', ROOT . 'functions' . SP);
// core file directory
define('CORE', ROOT . 'core' . SP);

/**
 * require library files
 */
require_once (CORE . SP . 'config.php'); // config file
require_once (FUNC . SP . 'functions.php'); // functions file
require_once (FUNC . SP . 'options.php'); // functions file

/*
 * autoload classes whene call it
 */
spl_autoload_register(function($class) {
    require_once CLS . SP . $class . '.php';
});

/**
 * Create Tables we Need for this Library.
 * 
 * in this lib we need 2 tables 
 * 
 * first one to save all translated content (table name is "table_name" option on  core/config.php by defualt is logaty_translation )
 * 
 * the second one to save our options and Settings (table name is "options_table" option in core/config.php by defualt is logaty_options)
 */

  // $db = DBContent::connect();

  // $db->createLogatyTables();