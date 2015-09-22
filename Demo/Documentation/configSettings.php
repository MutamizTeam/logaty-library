<?php include_once '../html/header.php'; ?>

<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<div class="fg-dark">
    <div class="container">
        <div class="padding20">
            <div class="">
                <div class="grid">
                    <div class="row cells1">
                        <div class="cell colspan3">
                            <h1 class=""><?php __("Settings and Configuration") ?></h1>
                            <hr>

                            <p>
                                <?php __("We Have Some Settings and Options in Library .") ?>
                                <br>
                                <?php __("the config file located in root file of library ,") ?>
                                <br>
                                <?php __("the config file written in <span class='fg-red'>INI Fromat</span>") ?>
                            <hr>
                            <br>
                            <div class="bg-lightBlue fg-white align-center">
                                <div class="container">
                                    <div class="no-overflow" style="padding-top: 40px">
                                        <strong><?php __("Just Note: this page contains the definitions of settings in (config.ini) .<br> you can read"
                                                . " config.php in core folder its good reference for that.") ?></strong>
                                        <br><br><br>
                                    </div>
                                </div>
                            </div>

                            <ol class="numeric-list square-marker">
                                <li  class="header-title">
                                    <h1> <?php __("Database Information") ?></h1>
                                </li>
                                <ul class="cont">
                                    <li><strong><?php __("host") ?></strong>: <?php __("the database hosting - defualt  <span class='fg-red'>localhost</span>") ?></li>
                                    <li><strong><?php __("username") ?></strong>: <?php __("the database username - defualt  <span class='fg-red'>root</span>") ?></li>
                                    <li><strong><?php __("password") ?></strong>: <?php __("the database passwor of user - defualt  <span class='fg-red'>empty</span>") ?></li>
                                    <li><strong><?php __("db_name") ?></strong>: <?php __("the database name - defualt <span class='fg-red'>logaty</span>") ?></li>
                                    <li><strong><?php __("db_type") ?></strong>: <?php __("how you want to access the database? you can access using MySQL and (MySQLi, PDO) extentions - defualt<span class='fg-red'>pdo</span>") ?></li>
                                    <li><strong><?php __("table_name") ?></strong>: <?php __("the translation table name, all content well be in this table to retrive were we need - defualt <span class='fg-red'>logaty_translation</span>") ?></li>
                                </ul>

                                <!----->
                                <li  class="header-title">
                                    <h1><?php __("Options") ?></h1>
                                </li>
                                <ul class="cont">
                                    <li><strong><?php __("defualt_lang") ?></strong>: <?php __("the defual (primary) language of your website - defualt  <span class='fg-red'>en</span>") ?></li>
                                    <li><strong><?php __("detect_browser_lang") ?></strong>: <?php __("this option if you want to detect user browser language ! - defualt  <span class='fg-red'>false</span> true to detect language false to not") ?></li>
                                    <li><strong><?php __("detect_browser_lang") ?></strong>: <?php __("this option if you want to detect user Country language ! - defualt  <span class='fg-red'>false</span> true to detect language false to not,  <span class='fg-red'>this option not working in localhost because ist using ip address</span>") ?></li>
                                    <li><strong><?php __("hide_untranslated") ?></strong>: <?php __("this option if you want to hide untranslated content || for example: if you want to hide english content for visitor use another english language , I mean you have an article not translated to arabic then any one brows your site in arabic language cant see this article  (Work with database content Only) - defualt <span class='fg-red'>on</span> , if you set this option off the content well be shown with notic") ?></li>
                                    <li><strong><?php __("hide_default_language") ?></strong>: <?php __("yes if you want to hide language information from url for defualt language in ex : if yes and  the defualt language is arabic when visitor browse your site in arabic the url must be like this (www.my-site.come) but if visitor browse your site in other language the url  must be like this (www.my-site.come?lang=en) - defualt <span class='fg-red'>true</span>") ?></li>
                                    <li><strong><?php __("hotable_name") ?></strong>: <?php __("the translation table name, all content well be in this table to retrive were we need - defualt <span class='fg-red'>logaty_translation</span>") ?></li>
                                </ul>

                                <li  class="header-title">
                                    <h1><?php __("Other Settings") ?></h1>
                                </li>
                                <ul class="cont">
                                    <li><strong><?php __("enabled_languages") ?></strong>: <?php __("the enabeld languages list , you can set your initial value when first website work, in admin panel you can add-remove-edit") ?></li>
                                    <li><strong><?php __("supported_languages") ?></strong>: <?php __("list of supported language on your website.!") ?></li>
                                    <li><strong><?php __("languages_name") ?></strong>: <?php __("the Languages Name in English") ?></li>
                                    <li><strong><?php __("name_mother_tongue") ?></strong>: <?php __("the Languages Name in Ttongue") ?></li>
                                    <li><strong><?php __("langLocal") ?></strong>: <?php __("list of ISO-3 code of language (require this list same name of json file name to language)") ?></li>
                                    <li><strong><?php __("not_available") ?></strong>: <?php __("the Messages to Shown to user if content is not avaliable in his language") ?></li>
                                    <li><strong><?php __("flag") ?></strong>: <?php __("the Language falg(image) name") ?></li>
                                    <li><strong><?php __("lang_dir") ?></strong>: <?php __("the Direction of language right to left or left to right (rtl,ltr)") ?></li>
                                </ul>
                                <!----->
                                <li  class="header-title">
                                    <h1><?php __("Paths") ?></h1>
                                </li>
                                <ul class="cont">
                                    <li><strong><?php __("lang_files") ?></strong>: <?php __("the Languages File Name ened with slash") ?></li>
                                    <li><strong><?php __("flags") ?></strong>: <?php __("the Flags File Name ened with slash") ?></li>
                                </ul>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    <br>
    <hr class="thin">

    <div>

    </div>

    <?php include_once '../html/footer.php'; ?>