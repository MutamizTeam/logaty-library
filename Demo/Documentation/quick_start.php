<?php
include_once '../html/header.php';
?>

<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="container page-content" style="margin-top: 50px;">
    <?php
    if(currentLang() != 'en')
    {
        ?>
        <div class="padding10 bg-red fg-white text-accent" style="margin-bottom: 10px">
            <?php __("Sorry This Page Not Available in your Language, that Available in English and Arabic"); ?>
            <br><br>
            <?php __("Help Me to Translate this Documentation in your Language"); ?> <button class="button success"><?php __("Help Me") ?></button>
        </div>
        <?php
    }
    ?>

    <div class="margin20 no-margin-left no-margin-right sub-header text-light">
        <h2> <?php __("Quick Started") ?></h2>
        <br>
        <br>
        <div class="example">
            <?php __("Requirement PHP v 5.3.x or more")?>
        </div>
    </div>
     <div class="example">
        <?php __("Logaty Library Esay to Use , you can Create PHP Multi-Language Webesite with several simple steps !,") ?>
     </div>
    <h4><?php __("Include Library") ?></h4>
    <div class="example" data-text="code">
        <pre>
        <span class="function">require_once</span>(<span class="string">'logaty/core/init.php'</span>);
        </pre>
    </div>

    <h4><?php __("Config and Customize Library") ?></h4>
    <p>
        <?php __("all configuration can you edited using admin panel!") ?>
        <br>
        <?php __("the values in config.ini are initial values") ?>
    </p>
    <p class="example">
        <?php __("go to (root folder config.ini) and configure library how you want") ?> 
        <br><br>
        <?php __("choice default language.") ?> 
        <br><br>
        <?php __("enable/disable detected browser language.") ?> 
        <br><br>
        <?php __("enable/disable detected country language.") ?> 
        <br><br>
        <?php __("enable/disable hide untranslated contents.") ?> 
        <br><br>
        <?php __("... etc.") ?> 
        <br><br>
        <a href="configSettings.php"><?php __("See Config and Settings Page") ?></a>
    </p>


    <h4><?php __("Translate sentences") ?></h4>
    <p><?php __("in path (logaty/languages). create ( json ) file called by ISO-3 CODE language. (en-US, fr-FR) ... etc.") ?></p>
    <div class="example" data-text="code">
        <?php __("written in json file") ?> :
        <pre>
{
    <span class="string">"FILE-NAME"</span>: 
        {
            <span class="string">"Original sentence "</span>:<span class="string">"translated ..."</span>
        }

}
        </pre>
        <div class="example" data-text="example">
            <pre>
{
    "de_DE": 
    {
        <span class="string">"Hi there I'm a Multilingual Library :)"</span>:<span class="string">"Hallo zusammen, ich bin ein Mehrsprachige Bibliothek :)",</span>
        <span class="string">"Detected Your Brouser Language is :"</span> : <span class="string">"Erkannte Ihre Brouser Sprache ist:"</span>
    }
}
            </pre>
        </div>
    </div>

    <h4><?php __("GET TRANSLATED From Json's files") ?></h4>

    <div class="example">
        <?php __("to echo directly .") ?>
        <br><br>
        <div class="example" data-text="code">
            <pre>
<span class="php">&lt;?php</span>
<span class="function">__</span>(<span class="string">"This is Original sentence"</span>);
            </pre>
        </div>
        <br>

        <?php __("or") ?>
        <br>
        <br>
        <div class="example" data-text="code">
            <pre>
<span class="php">&lt;?php</span>
<span class="function">echo _x</span>(<span class="string">"This is Original sentence"</span>);
            </pre>
        </div>
        <br>
        <?php __("The examples in the above retrieved translate of text in selected language !") ?>

        <br><br><br>
        <?php __("and you can get sentence in any language you need") ?>
        <br><br>
        <div class="example" data-text="code">
            <pre>
<span class="php">&lt;?php</span>
<span class="function">echo _x</span>(<span class="string">"This is Original sentence", <span class="string">"ar"</span>);
    
    
<span class="function"> __</span>(<span class="string">"This is Original sentence", <span class="string">"en"</span>);
                        </pre>
                        </div>

        
        <div class="example" id="api">
            <h4><?php __("Public Functions ( API )") ?></h4>
            <br>
            <p>
                <?php __("get any thing you need with one line of code!") ?>
            </p>
            <br>
            <ol class="numeric-list square-marker">
                <li><?php __("get current language") ?>: </li>
                    <div class="example" data-text="code">
                        <pre>
echo currentLang();
// en
                        </pre>
                    </div>
                
                
                <li>
                    <?php __("get language name in english") ?></li>
                    <div class="example" data-text="code">
                        <pre>
echo languageNameInEnglish('language-code');
//////
echo languageNameInEnglish('en');
 // output ENGLISH
echo languageNameInEnglish('ar');
 // output ARABIC
                        </pre>
                    </div>
                
                <li>
                    <?php __("get language name in mother tongue") ?>
                    </li>
                    <div class="example" data-text="code">
                        <pre>
echo languageNameIntongue('language-code');
//////
echo languageNameIntongue('en');
 // output ENGLISH
echo languageNameIntongue('ar');
 // output العربية
                        </pre>
                    </div>
                
                
                <li>
                    <?php __("get language direction") ?></li>
                    <div class="example" data-text="code">
                        <pre>
&lt;html dir="&lt;?php getDir() ?&gt;"&gt;
                        </pre>
                        <p><span class="tag"> getDir()</span> function return direction for current language.</p>
                    </div>
                
               
                
                <li>
                    <?php __("get default language") ?></li>
                    <div class="example" data-text="code">
                        <pre>
echo defualtLang();
                        </pre>
                    </div>
               
                <li>
                    <?php __("get all enabled language in array") ?></li>
                    <div class="example" data-text="code">
                        <pre>
print_r(enabledLanguagesList());
                        </pre>
                    </div>
               
                <li>
                    <?php __("get all supported language in array") ?></li>
                    <div class="example" data-text="code">
                        <pre>
print_r(supportedLanguage());
                        </pre>
                    </div>
                
            </ol>
            <br>
            
            <?php __("See all API's and More Examples on") ?> <a href="#">APIs</a>
        </div>
        
                        <div class="example">
                            <h4><?php __("Create Languages Switcher") ?></h4>
                            <br>
                            <p>
                                <?php __("Create Language Switcher") ?>
                                <br><br>
                            </p>
                            <div class="example" data-text="code">
                                <pre>
echo LangSwither('type');
                                </pre>
                            </div>
                            <div class="example">
                                <?php __("type : ul or select") ?> 
                            </div>
                            
                            <?php __("OR") ?>
                            
                            <div class="example" data-text="code">
                                <pre>
$html = "&lt;ul&gt;";
foreach(enabledLanguagesList() as $lang)
{
    $html .= "&lt;li&gt &lt;a href = \"$link->create('', $lang)\" &gt; " . languageNameIntongue() . " &lt;/a&gt;&lt;/li&gt;";
}
$html .= "&lt;/ul&gt;"

echo $html;
                                </pre>
                            </div>

                            <br>
                            <br>
                            <?php __("or get Language Flag.") ?>
                            <?php __("See More") ?> <?php __("On") ?> <a href="#"><?php __("Languages Swither") ?></a>
                        </div>




        <div class='example'>
            <p> <?php __("What Next ? ") ?></p>
            <br>
            <p>
                
            <?php __("Work Advanced") ?> : <br>
            <br>
            <a href="#"><?php __("Translate Content") ?></a><br><br>
            <a href="#"><?php __("Links") ?></a><br><br>
            <a href="#"><?php __("Detect user Language") ?></a><br><br>
            <a href="#"><?php __("Create Admin Panel") ?></a><br><br>
            <a href="#"><?php __("See Tutorials") ?></a><br><br>
            </p>
        </div>


                        <!--
                        <div class="example" data-text="code">
                        <?php // __("the file config.ini Content") ?>
                            <pre>
                            <span class='comment'>[database]</span>
                    <span class='var'>host</span> = <span class='string'>127.0.0.1"</span>
                    <span class='var'>username </span> = <span class='string'> "root"</span>
                    <span class='var'>password </span> = <span class='string'> ""</span>
                    <span class='var'>charset </span> = <span class='string'> "utf8"</span>
                    <span class='var'>db_name </span> = <span class='string'> "logaty"</span>
                    <span class='var'>db_type </span> = <span class='string'> "pdo"</span>
                    <span class='var'>table_name </span> = <span class='string'> "logaty_translation"</span>
                    <span class='comment'>[options]</span>
                    <span class='var'>defualt_lang </span> = <span class='string'> "en"</span>
                    <span class='var'>detect_browser_lang </span> = <span class='string'> 1</span>
                    <span class='var'>detect_country_lang </span> = <span class='string'> no</span>
                    <span class='var'>hide_untranslated </span> = <span class='string'> yes</span>
                    <span class='var'>alert_user_available_lang </span> = <span class='string'> 1</span>
                    <span class='var'>hide_default_language </span> = <span class='string'> 1</span>
                    <span class='comment'>[enabled_languages]</span>
                    <span class='var'>0 </span> = <span class='string'> "ar"</span>
                    <span class='var'>1 </span> = <span class='string'> "en"</span>
                    <span class='var'>2 </span> = <span class='string'> "es"</span>
                    <span class='var'>3 </span> = <span class='string'> "de"</span>
                    <span class='comment'>[supported_languages]</span>
                    <span class='var'>0 </span> = <span class='string'> "ar"</span>
                    <span class='var'>1 </span> = <span class='string'> "en"</span>
                    <span class='var'>2 </span> = <span class='string'> "de"</span>
                    <span class='var'>3 </span> = <span class='string'> "fr"</span>
                    <span class='var'>4 </span> = <span class='string'> "pt"</span>
                    <span class='var'>5 </span> = <span class='string'> "es"</span>
                    <span class='comment'>[languages_name]</span>
                    <span class='var'>ar </span> = <span class='string'> "Arabic"</span>
                    <span class='var'>en </span> = <span class='string'> "English"</span>
                    <span class='var'>de </span> = <span class='string'> "German"</span>
                    <span class='var'>fr </span> = <span class='string'> "French"</span>
                    <span class='var'>pt </span> = <span class='string'> "Portuguese"</span>
                    <span class='var'>ro </span> = <span class='string'> "Romanian"</span>
                    <span class='var'>es </span> = <span class='string'> "Spain"</span>
                    <span class='comment'>[name_mother_tongue]</span>
                    <span class='var'>ar </span> = <span class='string'> "العربية"</span>
                    <span class='var'>en </span> = <span class='string'> "English"</span>
                    <span class='var'>es </span> = <span class='string'> "España"</span>
                    <span class='var'>de </span> = <span class='string'> "Deutsch"</span>
                    <span class='var'>fr </span> = <span class='string'> "Français"</span>
                    <span class='var'>pt = "Português"</span>
                    <span class='var'>ro = "Română"</span>
                    <span class='comment'>[langLocal]</span>
                    <span class='var'>ar </span> = <span class='string'> "ar"</span>
                    <span class='var'>en </span> = <span class='string'> "en-US"</span>
                    <span class='var'>de </span> = <span class='string'> "de_DE"</span>
                    <span class='var'>fr </span> = <span class='string'> "fr_FR"</span>
                    <span class='var'>pt </span> = <span class='string'> "es_ES"</span>
                    <span class='var'>ro </span> = <span class='string'> "ro_RO"</span>
                    <span class='comment'>[not_available]</span>
                    <span class='var'>ar </span> = <span class='string'> "هذا المحتوى غير متوفر باللغة المختارة يمكنك مشاهدة هذا المحتوى باللغات: "</span>
                    <span class='var'>en </span> = <span class='string'> "This content is not available in selected language you can see this content in  :"</span>
                    <span class='var'>de </span> = <span class='string'> "Dieser Inhalt ist nicht verfügbar in der ausgewählten Sprache Sie können diese Inhalte in zu sehen : "</span>
                    <span class='var'>fr </span> = <span class='string'> "Ce contenu ne est pas disponible dans la langue sélectionnée, vous pouvez voir ce contenu dans : "</span>
                    <span class='var'>pt </span> = <span class='string'> "Este conteúdo não está disponível no idioma selecionado, você pode ver este conteúdo em : "</span>
                    <span class='var'>ro </span> = <span class='string'> "Acest conținut nu este disponibil în limba selectată, puteți vedea acest conținut în : "</span>
                    <span class='var'>es </span> = <span class='string'> "Acest conținut nu este disponibil în limba selectată, puteți vedea acest conținut în : "</span>
                    <span class='comment'>[flag]</span>
                    <span class='var'>ar </span> = <span class='string'> "ps.png"</span>
                    <span class='var'>en </span> = <span class='string'> "en.png"</span>
                    <span class='var'>de </span> = <span class='string'> "de.png"</span>
                    <span class='var'>fr </span> = <span class='string'> "fr.png"</span>
                    <span class='var'>pt </span> = <span class='string'> "pt.png"</span>
                    <span class='var'>ro </span> = <span class='string'> "ro.png"</span>
                    <span class='comment'>[paths]</span>
                    <span class='var'>lang_files </span> = <span class='string'> "languages/"</span>
                    <span class='var'>flags </span> = <span class='string'> "lags/"</span>
                    <span class='comment'>[lang_dir]</span>
                    <span class='var'>ar </span> = <span class='string'> "rtl"</span>
                    <span class='var'>en </span> = <span class='string'> "ltr"</span>
                    <span class='var'>es </span> = <span class='string'> "ltr"</span>
                    <span class='var'>de </span> = <span class='string'> "ltr"</span>
                            </pre>
                            
                            <a href="configSettings.php"><?php // __("See Config and Settings Page")      ?></a>
                        </div>
                    --->

                        </div>
</div>



                        <?php include_once '../html/footer.php'; ?>
