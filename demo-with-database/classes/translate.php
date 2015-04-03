<?php

/**
 * Translate class 
 * @author Moahammad Anzawi <m.anzawi2013@gmail.com>
 * @link www.t3lam.net
 * @license GPL2
 * @version 1.0.0
 */

/**
 * Translate
 * control constant string storing in .json files
 * @copyright 2015
 * @version 1.0.0
 * @access public
 */
class Translate
{

    /**
     *
     * @var string $_langFile language file directory
     * @var string $_theLang current language
     * @var string $_theTranslation the string translation 
     * @var string $_localLang local language code
     */
    private $_langFile,
            $_theLang,
            $_theTranslation,
            $_localLang;

    /**
     * DBContent::__construct()
     * initialize variables values
     * @return void
     */
    public function __construct($lang = '') {
        if(!$lang) {
            $lang = currentLang();
        }
        // get languages json files path
        $this->_langFile = Config::get('paths/lang_files');
        // check if file language exist
        if($this->getLangFile($lang)) {
            // set the language = current language
            $this->_theLang = $lang;
        } else {
            // set defulat language
            $this->_theLang = defualtLang();
        }
        // open language .json file
        $this->getCurrentLanguageFile();
    }
    /**
     * getLangFile()
     * check if language set have .json file
     * @param string $lang
     * @return boolean true if file exsit false if not
     */
    private function getLangFile($lang) {
        if(in_array($lang, enabledLanguagesList())) {
            $lang = languageLocalCode($lang);

            if(file_exists($this->_langFile . $lang . '.json')) {
                return true;
            }
        }

        return false;
    }

    /**
     * getCurrentLanguageFile()
     * open .json language file
     * @return void
     */
    private function getCurrentLanguageFile() {
        // get local language ISO code
        $this->_localLang = languageLocalCode($this->_theLang);
        /** @var string $translateFile  the language .json filr path */
        $translateFile = $this->_langFile . $this->_localLang . '.json';
        /**
         * @var json_format $translateFile json file content
         */
        $file = @file_get_contents($translateFile);

        // convert json format to array
        $this->_theTranslation = json_decode($file, true);
    }

    /**
     * getTranslate()
     * get string translation from json file
     * @param string $str
     * @return string
     */
    public function getTranslate($str = '') {
        if($str) {
            /**
             * @var string $translate  string translation */
            if(!isset($this->_theTranslation[$this->_localLang][$str])) {
                return $str;
            }
            $translate = $this->_theTranslation[$this->_localLang][$str];
            // check if translation is not empty retun translation
            if(!empty($translate) || !$translate == '') {
                return $translate;
            }
        }

        // return same string if empty translaton or space if $str not set
        return $str;
    }

}
