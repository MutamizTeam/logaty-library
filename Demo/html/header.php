
<?php
$http = "http://";
if(isset($_SERVER['HTTPS']))
{
    $http = "https://";
}
define('BASE', $http . $_SERVER["SERVER_NAME"] . '/logaty/Demo/');
require_once $_SERVER['DOCUMENT_ROOT'] . '/logaty/core/init.php';
?>
<?php $link = new Link(); ?>
<!DOCTYPE html>
<html dir="<?php echo getDir(); ?>">
    <head>
        <title><?php __("Logaty Library Demo") ?> </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/metro.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/metro-responsive.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/metro-responsive.min.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/metro-schemes.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/metro-icons.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/codeMod.css">
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/sweetalert.css">
        <script type="text/javascript" src="<?php echo BASE ?>assets/js/jquery-1.10.2.min.js"></script>
        <?php
        if(getDir() == 'rtl')
        {
            ?>
            <link rel="stylesheet" href="<?php echo BASE ?>assets/css/rtl.css">
            <?php
        }
        ?>
    </head>
    <body dir="<?php echo getDir(); ?>">

        <header class="app-bar fixed-top" data-role="appbar">
            <div>
                <a href="<?php echo BASE ?>" class="app-bar-element branding visit"><img src="<?php echo BASE ?>assets/logo.png" style="height: 28px; display: inline-block; margin-right: 10px;"><?php __("Logaty") ?></a>
                <div class="app-bar-divider"></div>
                <ul class="app-bar-menu small-dropdown">
                    <li data-flexorderorigin="2" data-flexorder="3" class="">
                        <a href="" class="dropdown-toggle"><?php __("Content From DB") ?></a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li><a class="visit" href="<?php echo $link->create(BASE."contentFromDbHid/index.php") ?>"><?php __("Hide Untranslate Option <span class='fg-red'>ON</span>") ?></a></li>
                            <li><a class="visit" href="<?php echo $link->create(BASE . "contentFromDbUnHid/index.php") ?>"><?php __("Hide Untranslate Option <span class='fg-red'>OFF</span>") ?></a></li>
                        </ul>
                    </li>
                    <li data-flexorderorigin="2" data-flexorder="3" class="">
                        <a href="" class="dropdown-toggle"><?php __("Documentation") ?></a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li><a href="<?php echo $link->create(BASE . "Documentation/quick_start.php") ?>"><?php __("Quick Start") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $link->create(BASE . "Documentation/apis.php") ?>"><?php __("Library API's") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $link->create(BASE . "Documentation/configSettings.php") ?>"><?php __("Config and Settings") ?></a></li>
                            <li>
                                <a href="" class="dropdown-toggle"><?php __("Translate Contents") ?></a>
                                <ul class="d-menu" data-role="dropdown">
                                    <li><a href="<?php echo $link->create(BASE."Documentation/translate/json.php") ?>"><?php __("Static Contents - JSON") ?></a></li>
                                    <li><a href="<?php  echo $link->create(BASE."Documentation/translate/db.php") ?>"><?php __("Dynamic Contents - DB") ?></a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php  echo $link->create(BASE."Documentation/link.php") ?>"><?php __("Links/URL's") ?></a></li>
                            <li><a><?php __("Detect Languages") ?></a></li>
                            <li class="divider"></li>
                            <li><a><?php __("Create Languages Swither") ?></a></li>
                            <li><a><?php __("Create Logaty Admin Panel") ?></a></li>

                        </ul>
                    </li>
                    <li data-flexorderorigin="0" data-flexorder="1">
                        <a href="#" class="dropdown-toggle"><?php __("Tutotials") ?></a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li class="disabled"><a href="overview.html"><?php __("Overview About Settings") ?></a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="" class="dropdown-toggle"><?php __("Detect Language") ?></a>
                                <ul class="d-menu" data-role="dropdown">
                                    <li><a href="grid.html"><?php __("Browser") ?></a></li>
                                    <li><a href="flexgrid.html"><?php __("Country") ?></a></li>
                                </ul>
                            </li>
                            <li><a href="typography.html"><?php __("Hide Untranslated") ?></a></li>
                            <li><a href="tables.html"><?php __("Alert user about available languages") ?></a></li>
                            <li><a href="inputs.html"><?php __("Hide Defual Language From URL") ?></a></li>
                            <li><a href="buttons.html"><?php __("Enable Languages") ?></a></li>
                            <li><a href="images.html"><?php __("Supported Language") ?></a></li>
                            <li><a href="font.html"><?php __("Language Name in English/Tongue") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="colors.html"><?php __("Language Local Code") ?></a></li>
                            <li><a href="helpers.html"><?php __("Not Available Message") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="rtl.html"><?php __("Flag") ?></a></li>
                            <li><a href="responsive.html"><?php __("Paths") ?></a></li>
                            <li><a href="responsive.html"><?php __("Language Direction") ?></a></li>
                        </ul>
                    </li>

                    <li data-flexorderorigin="3" data-flexorder="4" class="">
                        <a href="#" class="dropdown-toggle"><?php __("Help Me") ?></a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li><a href="http://forum.metroui.org.ua"><?php __("Upload Issue") ?></a></li>
                            <li><a href="https://github.com/olton/Metro-UI-CSS"><?php __("Tranlate this Documentation") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="license.html"><?php __("Donate") ?></a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>


                    <li data-flexorderorigin="3" data-flexorder="4" class="">
                        <a href="#" class="dropdown-toggle"><?php __("About") ?></a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
                            <li><a href="http://forum.metroui.org.ua"><?php __("How I am") ?></a></li>
                            <li><a href="https://github.com/olton/Metro-UI-CSS"><?php __("Other Works") ?></a></li>
                            <li><a href="https://github.com/olton/Metro-UI-CSS"><?php __("Why I Created this Library") ?></a></li>
                            <li class="divider"></li>
                            <li><a href="license.html"><?php __("Licence") ?></a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>


                    <ul class="app-bar-menu">
                        <li data-flexorderorigin="0" data-flexorder="5">
                            <a href="" class="dropdown-toggle"> <span class="mif-vpn-publ icon"></span></a>

                            <ul class="d-menu" data-role="dropdown">
                                <?php 
                                        foreach(enabledLanguagesList() as $lang)
                                        {
                                            ?>
                                <li><a href="<?php echo $link->create("", $lang) ?>"><?php echo languageNameIntongue($lang) ?></a></li>
                                <li class="divider"></li>
                                <?php
                                        }
                                ?>
                                
                                <!--<li><a href="<?php //echo $link->create("", $lang) ?>">English <img class="flag_" src="http://location.phptricks.org/assets/imgs/flags/en.png"></a></li>-->
                            </ul>
                        </li>
                    </ul>
                </ul>

                <span class="app-bar-pull"></span>

                <div class="app-bar-pullbutton automatic" style="display: none;"></div><div class="clearfix" style="width: 0;"></div><nav class="app-bar-pullmenu hidden flexstyle-app-bar-menu" style="display: none;"><ul class="app-bar-pullmenubar app-bar-menu hidden" style="display: none;"></ul></nav></div>
        </header>

