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
        <h2> <?php __("Links Class") ?></h2>
        <br>
        <br>

    </div>
    <div class="example">
        <?php __("Link Class Allow you to create links with correct language !") ?>
    </div>
    <h4><?php __("How yo Use") ?></h4>
    <div class="example" data-text="code">
        <pre>
        
$link = new Link();
        </pre>
    </div>

    <h4><?php __("to create link to other page with current language parameter") ?></h4>
    <div class="example" data-text="code">
        <pre>
$link->create("my-url");

echo $link->create("http://logaty.phptricks.org/quik-start");

///////////////////////////////
&lt;html&gt;
     &lt;a&gt; href="&lt;?php echo $link->create("http://logaty.phptricks.org/quik-start") ?&gt;"  &lt;/a&gt;
&lt;/html&gt;
        </pre>
    </div>


    <h4><?php __("Create Link to Same Page with Other Language Parameter") ?></h4>
    <div class="example" data-text="code">
        <pre>
 $link->create("", "language_parameter");

echo $link->create("", "ar");

///////////////////////////////
&lt;html&gt;
     &lt;a&gt; href="&lt;?php echo $link->create("", "ar") ?&gt;"  &lt;/a&gt;
&lt;/html&gt;
        </pre>

    </div>
</div>

 <div class='example'>
            <p> <?php __("What Next ? ") ?></p>
            <br>
            <p>
                
            <?php __("Work Advanced") ?> : <br>
            <br>
            
            <a href="#"><?php __("Detect user Language") ?></a><br><br>
            <a href="#"><?php __("Translate Content") ?></a><br><br>
            <a href="#"><?php __("Create Admin Panel") ?></a><br><br>
            </p>
        </div>

<?php include_once '../html/footer.php'; ?>
