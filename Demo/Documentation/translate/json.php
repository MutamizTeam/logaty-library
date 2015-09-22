<?php include_once '../../html/header.php'; ?>
<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>

            <div class="padding30 sub-leader text-light">
                <?php __("Translate Static Content Using Json Format") ?>
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

        <?php __("What I Mean in 'Static Content ?'") ?>
        <hr>
        <?php
        __("Static Content ist content not changed (not retrieved from database ) <br>"
                . "Like Whate ?")
        ?><br>
        <div class="example" data-text="example">
            <?php __("in Blogs for Example: <br><br> Write a Comment. <br><br> button title (Send Message)") ?>
        </div>
    </div>

    <div class="margin20 no-margin-left no-margin-right sub-header text-light">
        <h4><?php __("Create Language File") ?></h4>
        <p>
            <?php __("Go to Language Folder , Create File language-<strong>ISO-3</strong>.json") ?>
        </p>
        <div class="example" data-text="example">
            <br> <?php __("English File :<span class='fg-red'> en-US.json</span> , Spain File <span class='fg-red'> es-ES.json</span> ... etc") ?> <br><br>
        </div>

        <hr>
        <h4><?php __("File Content") ?></h4>
        <p>
            <?php __("the content of file Mist be Like this:") ?> <br><br></p>
        <div class="example" data-text="example">
            <pre>
{
    "File-Name" :
    {
        "the orginal text was be here" : "here set translation"
    }
}
            </pre>
        </div>
        <p>
            <?php __("Suppose i want to translate (Hello World) to Arabic") ?>
        </p>
        <div class="example" data-text="example">
            <pre>
{
    "ar-AR" :
    {
        "Hello World" : "مرحبا بالعالم"
    }
}
            </pre>
        </div>

        <hr>
        <h4><?php __("How to use") ?></h4>
        <p>
            <?php __("you can retrieve translation using one of two functions") ?>
        </p>
        <div class="example" data-text="code">
            <?php __("echo Directly") ?><br>
            <pre>
&lt;?php
__("orginal text");
            </pre>
            <?php __("or") ?>
            <pre>
&lt;?php
echo _x("orginal text");
            </pre>
        </div>
        <?php __("The examples in the above retrieved translate of text in selected language !") ?>
        <br>
        <p>
            <?php __("you can retrieve text in language forced if you want") ?>
            <br>
            <br>
            <?php __("for example when detect user language you want to echo alert message to user in detected language not in defualt language") ?>
        </p>
        <div class="example" data-text="code">
            <pre>
                           
&lt;?php
// __("orginal text", "lang-code");

__("orginal text", "ar");
            </pre>
            <?php __("or") ?>
            <pre>
&lt;?php
// echo _x("orginal text", "lang-code");

echo _x("orginal text", "ar");
            </pre>

        </div>
    </div>
    <div class="margin20 no-margin-left no-margin-right sub-header text-light example">
    <p>
        <?php __("Whate Next ?") ?><br><br>
        <?php __("See Tutorial to Learn More abuot translate static content") ?> <br><br>
        <?php __("How to translate (dynamic) database content") ?>
    </p>
    </div>
</div>
<?php include_once '../../html/footer.php'; ?>