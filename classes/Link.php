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

    /**
     * @var string $_domin
     * @var bool $_query 
     */
    private $_domin,
            $_query = false;

    /**
     * get initial value for $_domin
     */
    public function __construct()
    {
        $this->_domin = $_SERVER['SERVER_NAME'];
    }

    /**
     * cleane URL !!!!
     * remove lange in string query and create the link to be true and without impurities
     * @param string $link
     * @return string
     */
    private function clean($link)
    {
        /**
         * @var array its $_GET array! (the variables in url)
         */
        $get = $_GET;
        // check if url have query string (remove all variables from url only!)
        if(preg_match('/\?*/', $link))
        {
            $url = substr($link, 0, strpos($link, "?"));
            $link = str_replace($url, '', $link);
        }
        // if (lang) variable set in query string delet it
        if(isset($_GET['lang']))
        {

            unset($get['lang']);
        }
        // if $get array is not empty set $_query to true 
        if(count($get))
        {
            $this->_query = true;
            /**
             * @var string $qString create string query (Rewritten correctly)
             */
            $qString = "?";

            foreach($get as $key => $val)
            {

                $qString .= $key . "=" . $val . "&";
            }
            $link = $link . rtrim($qString, '&');
        }
        return $link;
    }

    /**
     * check if url is valide or not
     * @param string $url
     * @return boolean
     */
    private function validUrl($url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL))
            return true;

        return false;
    }

    /**
     * 
     * @param stirng $link
     * @param stribg $lang
     * @return string
     */
    public function create($link = '', $lang = '')
    {
        // check if hide_default_language option is enabled
        $hideDefaultLanguage = (getOption('options/hide_default_language') == true ? true : false);

        // check if $link is empty
        if(!$link)
        {
            // create link (current page)
            $url = $this->clean('http://' . $this->_domin . $_SERVER['PHP_SELF']);

            // if hide_default_language option is enabled and $lang is defualte language return same link
            if($hideDefaultLanguage && $lang == defualtLang())
            {
                return $url;
            }

            // check if url have query string
            if($this->_query)
            {
                // if url have parameter then set 'lang' last parameter
                return $url . '&lang=' . $lang;
            }

            // if url not have any parameter then 'lang' is first parameter
            return $url . '?lang=' . $lang;
        }

        // check if $link is a valide URL
        if($this->validUrl($link))
        {
            parse_str(parse_url($link, PHP_URL_QUERY), $vars);
            $this->_query =  count($vars) ? true : false;
            // if $lang is emty set it current language
            if(!$lang)
            {
                $lang = currentLang();
            }

            // clean link (see clean method)
            //$link = $this->clean($link);

            // if $hideDefaultLanguage is true and $lang is default language return same link
            if($hideDefaultLanguage && $lang == defualtLang())
            {
                return $link;
            }
            // if $_query is true then url have other parameters
            if($this->_query)
            {
                return $link . '&lang=' . $lang;
            }

            return $link . '?lang=' . $lang;
        }
        return $link . '?lang=' . $lang;
        //return false;
    }

}
