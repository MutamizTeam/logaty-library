#LOGATY
##PHP Library to create Multilingual websites
<<<<<<< HEAD
=======
To Arabic go to : http://www.phptricks.org : للشرح باللغة العربية توجه الى (soon)
>>>>>>> 2f024099832043692cc79e2d85de16d2bc9e7044
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
require_once('logaty/core/init.php');
```
go to (logaty/config.ini)
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
<html dir="<?php echo getDir() ?>">
```
echo getDir() function return direction for current language.

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
in (logaty/config.ini).
```
	[database]
	; database host
	host = "127.0.0.1"
	; database username
	username = "root"
	;database password
	password = ""
	; database charsit UTF-8 RECOMMENDED
	charset = "utf8"
	; database name
	db_name = "logaty"
	; database type (I mean  mysql, mysqli, pdo) just this types supported
	db_type = "pdo"
	; translation table name
	table_name = "logaty_translation"
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

##Update Option : 
 
 ```php
 <?php 
 
 setOption("option_name", "value", "config.ini_path");
 // last parameter is optional (config.ini_path)
 // by default the config.ini in the root folder
 setOption("default_lang", "ar");
 // or if you want to change config.ini file position
  setOption("default_lang", "ar", ROOT . "config/config.ini");
```

##Get Option Value :
```php
<?php 

getOption("option_path");

getOption("database/host");
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
<<<<<<< HEAD
## Change LOG :
* FIX retrieve content from database
* CHANGE config structure
* ADD new options structure
=======
##Future plans :
 - FIX any bug found.
 - rewrite DBContent class!
 - add more features.
>>>>>>> 2f024099832043692cc79e2d85de16d2bc9e7044
 
### What in my Plane ?????? 
the new Version is not Completed yet  .
I work hard to complete it, I thing in next week you can use this Library in your Projects :)
-----------------
If you have an idea tell me on (team@phptricks.org).
or visit to my blog on [php-tricks(http://www.phptricks.org)].
