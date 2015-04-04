#LOGATY
##PHP Library to create Multilingual websites
####To Arabic go to : http://www.t3lam.net : للشرح باللغة العربية توجه الى (soon)
##Features :
- Use json format to translate statements.
- Hide untranslated contents or Hint to visitors that the content is not available in his own language and he/she can browse content in another language.
- Detect browser language.
- Detect country language
- Hide default language from url
- Easy to use.
- Generate links with correct language
- support all languages.
- Get Languages name in English and Mother tongue.
-----
#HOW TO USE :
####include library:
```php
<?php 
require_once('logaty/core/intit.php');
```
go to (logaty/core/config.php)
and configure library how you want
- choice default language.
- enable/disable detected browser language.
- enable/disable detected country language.
- enable/disable hide untranslated contents.

 ... etc.

(SEE ALL OPTIONS IN FILE).

###NOTE : 
you can save and get all options from database if you want
------
## translate sentences :
in path (logaty/languages).
create ( json ) file called by ISO CODE language.
(en-US, fr-FR) ... etc.

write in json file :
```
{
    "FILE-NAME": {
        "Original sentence ":"translated ..."
        }
    
}
```
eg:
```
{
    "de_DE": {
        "Hi there I'm a Multilingual Library :)":"Hallo zusammen, ich bin ein Mehrsprachige Bibliothek :)",
        "Detected Your Brouser Language is :" : "Erkannte Ihre Brouser Sprache ist:"
        }
    
}
```

### HOW TO GET TRANSLATED :
to echo directly .
```php
<?php
__("This is Original sentence ");
```
or 
```php
<?php
echo _x("This is Original sentence ");
```
and you can get sentence in any language you need
```php
<?php
echo _x("This is Original sentence ", 'de'); 

__("This is Original sentence ", 'sp'); 
```
---------------
###Link Class:
this class to generate correct URLs
##HOW TO USE:
- create object from class:
```php
<?php
$link = new Link();
```
to create link to same page in other language:
```php
<?php
$link->create('', 'lang-code');
$link->create('', 'en');
$link->create('', 'ar');
```
for example:
```php
<a href="<?php echo  $link->create('', 'en');?>"> ENGLISH</a>
<a href="<?php echo  $link->create('', 'ar');?>"> ARABIC</a>
```
to create link to other  page in same language:
```php
<?php
$link->create('THE URL');
```
to create link to other  page in other language:
```php
<?php
$link->create('THE URL', 'lang-code');
```
---------------------
##Detected browser or country language:
```php
Detect::browser(); // to detect browser language

Detect::country(); // to detect country language
```
return language ISO code 2-digit
---------------------
###SOME FUNCTIONS:
1 - get current language
```php
echo currentLang();
// en
```
2 - get  language name in english
```php
echo languageNameInEnglish('language-code');
//////
echo languageNameInEnglish('en');
 // output ENGLISH
echo languageNameInEnglish('ar');
 // output ARABIC
```
3 - get  language name in mother tongue
```php
echo languageNameIntongue('language-code');
//////
echo languageNameIntongue('en');
 // output ENGLISH
echo languageNameIntongue('ar');
 // output العربية
```
4- get language direction:
```
<html dir="<?php getDir() ?>">
```
getDir() function return direction for current language.

5- get default language:
```php
<?php 
echo defualtLang();
```
6- get all enabled language from array :
```php
<?php 
print_r(enabledLanguagesList());
```
7- get all supported language from array:
```php
<?php 
print_r(supportedLanguage());
```
------------
###to get content from database:
first thing configure database .
in (logaty/core/config.php).
```php
        // database host
        'host'     => 'localhost',
        // database username
        'username' => 'root',
        //database password
        'password' => '',
        // database charsit UTF-8 RECOMMENDED
        'charset'  => 'utf-8',
        // database name
        'db_name'  => 'mlang',
        // database type (I mean  mysql, mysqli, pdo) just this types supported
        'db_type'  => 'pdo', 
        
        // translation table name
        'table_name' => 'translation',
        // options table name (to get option from database)
        // see config file in demo-with-database folder to kearn more
        'options_table' => '',
        // colomns prefix ..
        /* 
         * ex : if you want create table for posts
         * the table have (post_title, post_content)
         * you must be create colomn for all languages enabled
         * to be (ar_post_title, ar_post_content, en_post_title, en_post_content ...)
         * 
         * you can choise (lang_code, local_code, lang_name)
         * 
         * lang_code are(ar for arabic, en for english, es for espain ...)
         * local_code are(en_US for or en_UK or any english country, AR_JO or AR_KW ...etc for arabic.... )
         * lang_name the lanuage name in english (arabic, english ... etc)
         * 
         * if you want to use lang_code the table must be (ar_post_title, ar_post_content, en_post_title, en_post_content ...)
         * if you want to use local_code the table must be (AR_post_title, AR_post_content, en-US_post_title, en-US_post_content ...)
         * if you want to use lang_name the table must be (arabic_post_title, arabic_post_content, english_post_title, english_post_content ...)
         * 
         */
        'colmns_tag' => 'lang_code',
```
- create object :
```php
<?php 
$db = DBContent::connect();
```
- to get all content in current language
```php
$db->get('content_table_name');
```
- to get single content in current language
```php
$db->get('content_table_name' , $content_ID);
```
=============
## database tables structure:
####content table:
id | date | ...
----|------|----
12 | foo  | foo
20 | bar  | bar
21 | baz  | baz

#### translation table:
id | title | content
----|------|----
12 | English title  | English content
12| ARABIC title  | ARABIC content
12| SPAIN title  | SPAIN content
... etc
*****************
##NOTE : 
####All files was documented and explained using comments.
***********
##Future plans :
 - FIX any bug found.
 - add MVC support.
 - rewrite DBContent class!
 - add more features.
 
-----------------
If you have an idea tell me on (team@tlam.net).
or visit to my blog on [php-tricks(http://www.t3lam.net)].
