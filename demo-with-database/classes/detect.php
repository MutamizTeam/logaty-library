<?php

//NOTE : code mean ISO Code
//https://github.com/umpirsky/country-list/blob/master/country/cldr/
/**
 * Detect
 * 
 * @author Mohammad Anzawi
 * @link www.t3lam.net - m.anzawi2013@gmail.com
 * @copyright 2015
 * @version 1.0.0
 * @access public
 * @api http://www.geoplugin.net/php.gp
 */
class Detect
{

    /**
     * Detect::country()
     * detect country language for visitor
     * @return string code language (2 digits)
     */
    public static function country() {
        /**
         * @var number $ip this ip for visitor
         */
        $ip = self::getIp();
        // if cant't detect visitor ip then language is defualt language in website
        if($ip == 'UNKNOWN') {
            return defualtLang();
        } elseif($ip == '::1'){
            return 'localhost';
        }

        // get country local code (ex: US for USA, JO for Jordan, UK for United Kingdom .. etc)
        if($countryCode = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip))) {
            $countryCode = $countryCode['geoplugin_countryCode'];

            /*
             * @var  string $countryLangCode convert country local code to country laguage ISO code
             *  get the language from detected country (US = en, UK = en, JO = ar .. etc)
             */
            $countryLangCode = self::getCountryLang($countryCode);
            /*
             * @var array $enabledLanguages all the enabled languages
             */
            $enabledLanguages = enabledLanguagesList();

            // check if visitor vountry language is enable in website ro not
            // if enabled return it
            if(in_array($countryLangCode, $enabledLanguages)) {
                return $countryLangCode;
            }
        }
        // if not return country language code return defualt language
        return defualtLang();
    }

    /**
     * Detect::browser()
     * detect  browser language for visitor
     * @return string code language (2 digits)
     */
    public static function browser() {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $lang;
    }

    /**
     * Detect::getIp()
     * detect ip address for the visitor
     * @return mixed
     */
    private static function getIp() {
        $ipaddress = '';
        if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ipaddress = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } else if(isset($_SERVER['HTTP_X_REAL_IP'])) {
            $ipaddress = $_SERVER['HTTP_X_REAL_IP'];
        } else if(isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
        else $ipaddress = 'UNKNOWN';
        
        return $ipaddress;
    }

    /**
     * Detect::getCountryLang()
     * convert country local code to language code 
     * @param string $code
     * @return string
     */
    private static function getCountryLang($code) {
        $languagesCodes = array(
            // arabic countris
            'ar' => array(
                'DZ',
                'BH',
                'EG',
                'IQ',
                'JO',
                'KW',
                'LB',
                'LY',
                'MA',
                'OM',
                'QA',
                'SA',
                'SY',
                'TN',
                'AE',
                'YE',
                'PS',
            ),
            // english countris
            'en' => array(
                'AU',
                'BZ',
                'CA',
                'CB',
                'IE',
                'JM',
                'NZ',
                'PH',
                'ZA',
                'TT',
                'GB',
                'US',
                'ZW',
            ),
            // espanish countris
            'es' => array(
                'AR', 'BO', 'CL', 'CO', 'CR', 'DO', 'EC', 'SV', 'GT', 'HN', 'MX',
                'NI', 'PA', 'PY', 'PR', 'PE', 'ES', 'UY', 'VE',
            ),
            // franch countris
            'fr' => array('BE', 'FR', 'MC', 'CH',
            ),
            // german countris
            'de' => array('AT', 'DE', 'LI', 'LU',),
            // italy countris
            'it' => array('IT'),
            'ja' => array('ja'),
            // portagal countris
            'pt' => array('PT', 'IN', 'BR',),
        );

        // search language code for the detected country code
        if(in_array($code, $languagesCodes['ar'])) {
            return 'ar';
        }


        if(in_array($code, $languagesCodes['en'])) {
            return 'en';
        }


        if(in_array($code, $languagesCodes['es'])) {
            return 'es';
        }


        if(in_array($code, $languagesCodes['fr'])) {
            return 'fr';
        }


        if(in_array($code, $languagesCodes['de'])) {
            return 'de';
        }


        if(in_array($code, $languagesCodes['it'])) {
            return 'it';
        }


        if(in_array($code, $languagesCodes['pt'])) {
            return 'pt';
        }

        // if not found return UNKNOWN
        return 'UNKNOWN';
    }

}
