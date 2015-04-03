<?php

/**
 * Link
 * 
 * @author Mohammad Anzawi
 * @copyright 2015
 * @version 1.0.0
 * @access public
 */
class Link
{

    private $_domin,
            $_query = false;

    public function __construct() {
        $this->_domin = $_SERVER['SERVER_NAME'];
    }

    private function clean($link) {
        $get = $_GET;
        if(preg_match('/\?*/', $link)) {
            $url = substr($link, 0, strpos($link, "?"));
            $link = str_replace($url, '', $link);
        }
        if(isset($_GET['lang'])) {
            
            unset($get['lang']);
        }

        if(isset($get['countyLang'])) {
            unset($get['countyLang']);
        }

        if(count($get)) {
            $this->_query = true;
            $qString = "?";

            foreach($get as $key => $val) {

                $qString .= $key . "=" . $val . "&";
            }
            $link = $link . rtrim($qString, '&');
        }
        return $link;
    }

    private function validUrl($url) {
        if(filter_var($url, FILTER_VALIDATE_URL)) return true;

        return false;
    }

    public function create($link = '', $lang = '') {
        
        $hideDefaultLanguage = (Config::get('options/hide_default_language') ? true
                            : false);

        if(!$link) {
            
            $url = $this->clean('http://' . $this->_domin . $_SERVER['PHP_SELF']);//$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

            if($hideDefaultLanguage && $lang == defualtLang()) {
                return $url;
            }

            if($this->_query) {
                return $url . '&lang=' . $lang;
            }

            return $url . '?lang=' . $lang;
        }

        if($this->validUrl($link)) {
            
            if(!$lang) {
                $lang = currentLang();
            }

            $link = $this->clean($link);

            if($hideDefaultLanguage && $lang == defualtLang()) {
                return $link;
            }
            if($this->_query) {
                return $link . '&lang=' . $lang;
            }

            return $link . '?lang=' . $lang;
        }
        return $link . '?lang=' . $lang;
        //return false;
    }

}
