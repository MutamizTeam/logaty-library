<?php include_once '../html/header.php'; ?>
<?php
ob_start();
setOption("options/hide_untranslated", false);
$db = DBContent::connect();
$art = $db->getContent('content');
$art = $db->results();

ob_flush();

?>
<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>

            <div class="padding30 sub-leader text-light">
                <?php __("Demo For Content Retrieved From Database <br> With Hide Untranslated") ?>
            </div>
            <p class="text-light" style="margin-top: 10px; padding: 0 50px">
                <?php __("in this Demo I have 4 Articles") ?>
            </p>
            <p class="text-light" style="margin-top: 10px; padding: 0 20px">
                <?php __("the  Article Number <strong> <span class='fg-red'>4</span> Not Translated in English and Spain</strong> So Try Choice English or Spain Language , The Article Number <strong>4</strong> Shown with Notice") ?>
            </p>
            <p class="text-light" style="margin-top: 10px; padding: 0 50px">   
                <?php __("the  Article Number <strong> <span class='fg-red'>2</span> Not Translated in Arabic</strong> So Try Choice Arabic Language , The Article Number <strong>2</strong> well be Shown with Notice!") ?>
            </p>
            <p class="text-light" style="margin-top: 10px; padding: 0 50px">
                <?php __("the  Articles Number <strong> <span class='fg-red'>1 and 3</span>  Translated in all Languages</strong> So Try Choice any Language , You can Found this Articles !") ?>
            </p>
        </div>
    </div>
</div>

<div class="fg-dark">
    <div class="container">
        <?php 
        foreach($art as $a):
            ob_start();
        ?>
        <div class="padding80" style="padding-top: 40px;padding-top: 40px;border: 3px solid #999;margin-top: 20px;">
            <div class="">
                <div class="grid">
                    <div class="row cells3">
                        <div class="cell colspan3" style="padding-left: 20px; border: 1px solid #9999">
                            <h1 class=""><a href="<?php echo $link->create(BASE."contentFromDbHid/single.php?art_id=". $a['id_ref'], currentLang()) ?>"><?php echo $a['title'] ?></a></h1>
                            <p>
                                <?php echo $a['content'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        ob_flush();
        endforeach; ?>
    </div>


    <br>
    <hr class="thin">

    <div>

    </div>
</div>

<?php include_once '../html/footer.php'; ?>