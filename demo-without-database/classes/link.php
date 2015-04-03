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
        $get = array();
        if(preg_match('/\?*/', $link)) {
            $link = substr($link, 0, strpos($link, "?"));
        }
        if(isset($_GET['lang'])) {
            $get = $_GET;
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
//        if(preg_match('/\?lang=[0-9A-Za-z]+&[0-9A-Za-z]*/', $link)) {
//            $link = str_replace('lang=' . currentLang() . '&', '', $link);
//            $this->_query = true;
//        }
//
//        if(preg_match('/\?lang=[0-9A-Za-z]*/', $link)) {
//            $link = str_replace('?lang=' . currentLang(), '', $link);
//        }
//
//        if(preg_match('/\&lang=[0-9A-Za-z]*/', $link)) {
//            $link = str_replace('&lang=' . currentLang(), '', $link);
//            $this->_query = true;
//        }
//        if(preg_match('/\?[0-9A-Za-z]+=[0-9A-Za-z]*/', $link)) {
//            $this->_query = true;
//        }
//        if(preg_match('/\?[\'\']*/', $link)) {
//            $link = str_replace('?', '', $link);
//            $this->_query = false;
//        }

        /* if(preg_match('/\?[0-9A-Za-z]', $link)) {
          $this->_query = true;
          } */

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
            $url = $this->clean('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

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
        return false;
    }

}
