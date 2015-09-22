<?php

function getOption($pathOfOption = null)
{
    if($pathOfOption)
    {
        $config = $GLOBALS['langConfig'];
        $path = explode('/', $pathOfOption);

        foreach($path as $bit)
        {
            
            if(isset($config[$bit]))
            {
                $config = $config[$bit];
            }
        }

        return $config;
    }

    return false;
}

function setOption($optionPath, $value, $file = ROOT . 'config.ini')
{
    $optionPath = explode("/", $optionPath);
    $GLOBALS['langConfig'][$optionPath[0]][$optionPath[1]] = $value;
    $array = $GLOBALS['langConfig'];
    $array['paths']['flags'] = str_replace(ROOT, "", $array['paths']['flags']);
    $array['paths']['lang_files'] = str_replace(ROOT, "", $array['paths']['lang_files']);
    $res = array();
    foreach($array as $key => $val)
    {
        if(is_array($val))
        {
            $res[] = "[$key]";
            foreach($val as $skey => $sval)
                $res[] = "$skey = " . (is_numeric($sval) ? $sval : '"' . $sval . '"');
        }
        else
            $res[] = "$key = " . (is_numeric($val) ? $val : '"' . $val . '"');
    }
    safefilerewrite($file, implode("\r\n", $res));
}

function safefilerewrite($fileName, $dataToSave)
{
    if($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime(TRUE);
        do
        {
            $canWrite = flock($fp, LOCK_EX);
// If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
            if(!$canWrite)
                usleep(round(rand(0, 100) * 1000));
        } while((!$canWrite)and ( (microtime(TRUE) - $startTime) < 5));

//file was locked so now we can store information
        if($canWrite)
        {
            fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }
}
