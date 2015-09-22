<?php include_once '../html/header.php'; ?>
<?php
ob_start();
if(!isset($_GET['art_id']) || empty($_GET['art_id']))
{
    $_GET['art_id'] = null;
    $a['title'] = _x("Error 404");
    $a['content'] = _x("the Page Not Found") . " - <a href='".BASE."'>"._x("Home Page")."</a>";
}

setOption("options/hide_untranslated", false);

$db = DBContent::connect();
if($_GET['art_id'] != null)
{
    $art = $db->getContent('content', htmlentities($_GET['art_id']));
    $a = $db->results();
}


ob_flush();
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

<div class="fg-dark">
    <div class="container">
        <div class="padding80" style="padding-top: 40px;padding-top: 40px;border: 3px solid #999;margin-top: 20px;">
            <div class="">
                <div class="grid">
                    <div class="row cells3">
                        <div class="cell colspan3" style="padding-left: 20px; border: 1px solid #9999">
                            <h1 class=""><?php echo $a['title'] ?></h1>
                            <p>
                                <?php echo $a['content'] ?>
                            </p>
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
</div>

<?php include_once '../html/footer.php'; ?>