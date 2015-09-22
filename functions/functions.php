<?php

/**
 * __()
 * get $string translation from .json file useing Translate class
 * look to Translate class to more information about functionality
 * @param mixed $string
 * @return mixed
 */
function __($string, $lang = ''){
    $translate = new Translate($lang);

    echo $translate->getTranslate($string);
}

function _x($string, $lang = ''){
    $translate = new Translate(strtolower($lang));

    return $translate->getTranslate($string);
}

/**
 * validLang()
 * check if language is a valiable
 * @param sting $lang
 * @return boolean
 */
function validLang($lang = ''){
    if(!$lang){
        if(isset($_GET['lang'])){
            $lang = htmlentitiess(strtolower($_GET['lang']));
        }
    }


    if(avaliableLanguage($lang)){
        return true;
    }

    return false;
}

/**
 * avaliableLanguage()
 * check if language is a valiable
 * @param type $lang
 * @return boolean
 */
function avaliableLanguage($lang){
    if(in_array(strtolower($lang),enabledLanguagesList())){
        return true;
    }

    return false;
}

/**
 * supportedLanguage()
 * check if language is supported
 * @param tring $lang
 * @return boolean
 */
function supportedLanguage($lang){
    if(in_array(strtolower($lang), getOption('supported_languages'))){
        return true;
    }

    return false;
}

/**
 * currentLang()
 * get curren language 
 * @return string
 */
function currentLang(){
    //return isset($_GET['lang']) ? htmlentities($_GET['lang']) : defualtLang();
    if(isset($_GET['lang'])) {
        $currentLang = htmlentities(strtolower($_GET['lang']));
        if(avaliableLanguage($currentLang)) {
            return $currentLang;
        }
    }
    
    return defualtLang();
}

/**
 * defualtLang()
 * get defualt language 
 * @return string
 */
function defualtLang(){
    return getOption('options/defualt_lang');
}

/**
 * enabledLanguagesList()
 * get enabled languages
 * @return array
 */
function enabledLanguagesList(){
    return getOption('enabled_languages');
}

/**
 * languageNameInEnglish()
 * get name of language in english
 * @param string $lang
 * @return string
 */
function languageNameInEnglish($lang){
    return getOption('languages_name/' . strtolower($lang));
}

/**
 * languageNameIntongue()
 * get name of language in tongue
 * @param string $lang
 * @return string
 */
function languageNameIntongue($lang){
    return getOption('name_mother_tongue/' . strtolower($lang));
}

/**
 * languageLocalCode()
 * get iso code(2 digits) of language
 * @param string $lang
 * @return string
 */
function languageLocalCode($lang){
    return getOption('langLocal/' . strtolower($lang));
}

function getDir($lang = '') {
    if(!$lang) {
        $lang = currentLang();
    }
    return  getOption('lang_dir/' . strtolower($lang));
}

function notValiableMessage($lang) {
    return getOption('not_available/' . $lang);
}