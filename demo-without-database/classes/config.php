<?php

class Config
{
    public static function get($settingPath = '') {
        if($settingPath) {
            $settingPath = explode('/', $settingPath);
            $config = $GLOBALS['langConfig'];
            
            
            foreach ($settingPath as $setting) {
                if (isset($config[$setting])) {
                    $config = $config[$setting];
                }
            }
            
            return $config;
        }
        
        return false;
    }
}