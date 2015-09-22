<?php include_once '../../html/header.php'; ?>
<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>

            <div class="padding30 sub-leader text-light">
                <?php __("Translate Dynamic Content Using  Database") ?>
            </div>
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
        <br>
      
    <div class="margin20 no-margin-left no-margin-right sub-header text-light example">
          <?php __("What I Mean in 'Dynamic Content ?'") ?>
        <hr>
        <?php
        __("Dynamic Content ist content retrieved from database <br>"
                . "Like Whate ?")
        ?><br>
    </div>

    <div class="margin20 no-margin-left no-margin-right sub-header text-light">
        <h4><?php __("Create Translation Table") ?></h4>
        <p>
            <?php __("Go to phpmyadmin , and create table called (what you named in config.ini)") ?>
            <br>
        </p>
        <div class="example" data-text="code">
            <pre>
CREATE TABLE IF NOT EXISTS `table_name` (
    `id` int(11) NOT NULL,
    `lang` varchar(10) NOT NULL,
    `title` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `id_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            </pre>
        </div>
        <p>
            <?php __("or") ?>
            <br>
            <?php __("use <strong>createLogatyTables()</strong> Method from DBContent Class") ?>
        </p>
        <div class="example" data-text="code">
            <pre>
DBContent::connect()->createLogatyTables();
            </pre>
        </div>

        <hr>
        <h4><?php __("Custmize translation table") ?></h4>
        <p>
            <?php __("the table have ( <span class='fg-red'>id, contnet, title, id_ref, lang</span> )") ?> </p> 
        <p><?php __("you cant delete any column but you can add any thing you want") ?></p> 
        <p><?php __("for example colunm for image or any thing you can add unlimeted columns") ?></p>
        <div class="example">
            <?php __("Suppose you want to create<strong> e-commerce website</strong>, you want to create <strong>product table</strong>") ?>
            <?php __("you need to add one column to your table called <strong>local</strong>") ?>
            <br>
            <p>
                <?php __("the local column contains the languages  codes this row translated Separated by a comma.") ?>
            </p>
            <div class="example" data-text="example">
                <table border="1" style="width:70%; min-width: 300px; text-align: center;">
                    <thead>
                        <tr>
                            <td>produc_id</td>
                            <td>produc_local</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>ar,en,de</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php __("the <span class='fg-red'>id_ref</span> column its shortcut to (reference identifier)") ?>
            <br>
            <?php __("when you add row into <strong>product</strong> table you want to add row to same product per language") ?>
            <br>
            <div class="example" data-text="expamle">
                <h5><?php __("Poduct Table") ?></h5>
                <table border="1" style="width:70%; min-width: 300px; text-align: center;">
                    <thead>
                        <tr>
                            <td>produc_id</td>
                            <td>produc_local</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>ar,en,de</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <h5><?php __("Translation Table") ?></h5>
                <table border="1" style="width:70%; min-width: 300px; text-align: center;">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>title</td>
                            <td>content</td>
                            <td>id_ref</td>
                            <td>lang</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>title in English</td>
                            <td>Content in English</td>
                            <td><strong>5</strong></td>
                            <td><strong>en</strong></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Title in Arabic</td>
                            <td>Content in Arabic</td>
                            <td><strong>5</strong></td>
                            <td><strong>ar</strong></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Title in German</td>
                            <td>Content in German</td>
                            <td><strong>5</strong></td>
                            <td><strong>de</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <h4><?php __("How to retrieve data") ?></h4>
        <p><?php __("Create Object From <strong>DBContent</strong> Class") ?></p>

        <div class="example" data-text="example">
            <pre>
&lt;?php
$db = new DBContent();
            </pre>
        </div>

        <hr>
        <h4><?php __("How to use") ?></h4>
        <p>
            <?php __("you can retrieve translation using one of two functions") ?>
        </p>
        <div class="bg-lightBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow" style="padding-top: 40px">
                    <br>
                    <div class="padding30 sub-header text-light">
                        <?php __("Just Note : I Recomended to read DBContent Class") ?><br>
                        <?php __("the DBContent class allowed you to connect with db -you can edit that to create your owen DB class-") ?><br>
                        <?php __("this Class Allowed you to connect with db using (MySQL, MySQLi and PDO) - to learn more see config and settings page.") ?><br>
                        <?php __("so first thing we need to connect with database, see.....") ?>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <h4><?php __("Connect With DB") ?></h4>
        <small><?php __("in config.ini you can set pdo or mysql or mysqli") ?></small>
        <div class="example" data-text="code">
            <pre>
&lt;?php
$conn = DBContent::connect();
            </pre>
        </div>
        <h4><?php __("Get Data From DB") ?></h4>
        <div class="example" data-text="code">
            1- <?php __("to get all contnet in table") ?>
            <pre>

$results = $conn->getContent("your-table_name");
            </pre>
            <pre>

$results = $conn->getContent("products");
            </pre>

            <p><?php __("the <strong>getContent()</strong> Method return an array") ?></p>

            2- <?php __("Get Single Row") ?>
            <pre>

$results = $conn->getContent("your-table_name", id_ref);
            </pre>
            <pre>

$results = $conn->getContent("products", 5);
            </pre>
        </div>

        <h4><?php __("How to Insert Into Translation Table") ?></h4>
        <div class="example" data-text="code">
            <pre>
//connect with db
$conn = DBContent::connect();

// create data array
$myData = array(
        
        'id_ref' => 18,
        'title'  => 'my title',
        'content' => 'my content',
        'lang'   => 'en',
        'my_custom_column' => value,
        'my_custom_column_2' => value,
        'my_custom_column_3' => value
);

// insert into table
$conn->setContent($myData);
            </pre>
        </div>

        <h4><?php __("How to Update Column in Translation Table") ?></h4>
        <div class="example" data-text="code">
            <pre>
//connect with db
$conn = DBContent::connect();

// create new data array
$myNewData = array(
        
        'my_target_column' => 'my new value',
        'my_target_column_2' => 'my new value',
        'my_target_column_3' => 'my new value'
);

// insert into table
// $conn->EditContent($row_id, $myData);

$conn->editContent(7, $myData);
            </pre>
        </div>

        <?php __("Need a Demo For this?") ?><br>
        <br><?php __("See") ?> :<br><br>
        1- <a class="visit" href="<?php echo $link->create(BASE . "contentFromDbHid/index.php") ?>"><?php __("Hide Untranslate Option <span class='fg-red'>ON</span>") ?></a>
        <br><br>
        2- <a class="visit" href="<?php echo $link->create(BASE . "contentFromDbUnHid/index.php") ?>"><?php __("Hide Untranslate Option <span class='fg-red'>OFF</span>") ?></a>
        <br><br>
        3- <?php __("this Site using this Library :)") ?>
        <br><br>
        4- <?php __("Show Case :") ?><a href="http://location.phptricks.org">Location Finder</a>

    </div>
    <div class="margin20 no-margin-left no-margin-right sub-header text-light example">
        <p>
            <?php __("Whate Next ?") ?><br><br>
            <?php __("I Recommended to see this video tutorial ") ?><br> <a href="#"><?php __("How Customize Translation Table And DBContent Class for your Project") ?></a><br><br>
        </p>
    </div>
</div>
<?php include_once '../../html/footer.php'; ?>