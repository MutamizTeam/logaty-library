<?php include_once 'html/header.php'; ?>
<div class="bg-lightBlue fg-white align-center">
    <div class="container">
        <div class="no-overflow" style="padding-top: 40px">
            <br>
            <br>
            <br>

            <div class="padding30 sub-leader text-light">
                <?php __("The Multilingual Library To Dovelop Multilingul Secripts/Apps Using PHP") ?>
            </div>
            <p class="" style="margin-top: 10px; padding: 0 50px">
                <?php __("There is a class that can detect the user language by either checking the HTTP Accept request header or looking up the country of the user based on the IP address and then looking up the official language of that country.") ?>
                <?php __("The user language can also be retrieved from a request parameter named lang.") ?>
                <?php __("Another class can read the application texts for the user language from JSON files.") ?>
                <?php __("can retrieve the application texts from a MySQL database accessed using PDO, MySQLi") ?>
            </p>

            <div class="margin60">
                <div class="clear-float">
                    <a href="#"><button class="button big-button block-shadow success loading-pulse lighten">Download Now</button></a>
                    <a href="#"><button class="button big-button block-shadow warning loading-cube lighten">Github</button></a>
                    <a href="#"><button class="button big-button block-shadow info loading-cube lighten">PHP Classes</button></a>
                </div>
                <br>
                <div class="align-center">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_donations">
                        <input type="hidden" name="business" value="TBRJPD2P2BH7A">
                        <input type="hidden" name="item_name" value="<?php __("Logaty Library") ?>">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHosted">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>


            <div class="grid no-margin-bottom" style="margin-top: 100px" id="g1">
                <div class="row cells3">
                    <div class="cell no-overflow" style="height: 85px">
                        <div class="bg-yellow fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 0px;">
                            <h2 class="text-light"><?php __("Easy to Use") ?></h2>
                        </div>
                    </div>
                    <div class="cell no-overflow" style="height: 85px">
                        <div class="bg-green fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 0px;">
                            <h2 class="text-light"><?php __("Clean Code") ?></h2>
                        </div>
                    </div>
                    <div class="cell no-overflow" style="height: 85px">
                        <div class="bg-red fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 0px;">
                            <h2 class="text-light"><?php __("Open Source") ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(function () {
                    setTimeout(function () {
                        $("#g1 .cell > div:eq(0)").animate({
                            'margin-top': 0
                        }, 500, 'easeOutBounce');
                        $("#g1 .cell > div:eq(1)").animate({
                            'margin-top': 0
                        }, 1000, 'easeOutBounce');
                        $("#g1 .cell > div:eq(2)").animate({
                            'margin-top': 0
                        }, 1500, 'easeOutBounce');
                    }, 500);
                });
            </script>
        </div>
    </div>
</div>

<div class="fg-dark">
    <div class="container">
        <div class="padding80" style="padding-top: 40px">
            <div class="">
                <div class="grid">
                    <div class="row cells3">
                        <div class="cell no-phone">
                            <div class="image-container bordered">
                                <div class="frame">
                                    <img src="assets/fet.png">
                                </div>
                            </div>
                        </div>
                        <div class="cell colspan2" style="padding-left: 20px">
                            <h1 class=""><?php __("Main Features") ?></h1>
                            <ol class="numeric-list square-marker">
                                <li><?php __("Translate Static Content Using <strong><span class='fg-red'>JSON Format</span></strong> (simple way)") ?></li>
                                <li><?php __("Translate Dynamic Content <strong><span class='fg-red'>Retrive From Databse</span></strong> (very easy way with one line of code!)") ?></li>

                                <li><?php __("Clean Code - its easy to <strong>customize and develop</strong>") ?></li>
                                <li><?php __("<strong>One Line Of Code</strong> to <span class='fg-red'>include Library Options to Admin Panel </span>") ?></li>

                                <hr>

                                <li><?php __("<strong>One-Click-Switching</strong> between the languages") ?></li>
                                <li><?php __("No need to edit the Library files to get your language working! – Use the comfortable and intuitive <strong>Configuration Page</strong>") ?></li>
                                <li><?php __("Comes with many languages already builtin! –Arabic, English, German, Span ,Chinese and a lot of others") ?></li>
                                <li><?php __("<strong>Detect</strong> User Langueg from<strong><span class='fg-red'>(Browser/Country)</span></strong> and Redirect to Base Language") ?></li>
                                <li><?php __("Easy Way to Create Links with correct Language Parameter <span class='fg-red'>two different ways</span>") ?></li>

                            </ol>
                            <p class="no-display">
                                The main feature in version 3 is: a declarative approach to the definition and initialization of components, and the framework itself monitors components, pressure via ajax. When a declarative definition of all component parameters are set via data-* attributes, including methods and events of the component. This approach allows to further separate html and javascript code. Now that would determine which component do not need to know javascript :). It is still possible to determine which component directly via javascript.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
            </div>
        </div>
    </div>


    <br>
    <hr class="thin">

    <div class="example" style="width: 50%; margin: 0 auto; text-align: center;">
        
        <a href="<?php echo $link->create(BASE . "/Documentation/quick_start.php") ?>" style="padding-left: 80px; padding-right: 80px; padding-top: 30px; padding-bottom: 40px" class="button success"><?php __("Quick Start") ?></a>
        
    </div>
</div>
</div>

<div class="bg-steel no-tablet-portrait no-phone">
    <div class="container padding20 fg-white">
        <div class="carousel bg-transparent" data-role="carousel" data-controls="false" data-markers="false" data-effect="fade" data-height="200" style="width: 100%; height: 200px;">
            <div class="slide fg-white" style=" left: 0px;">
                <div class="place-left" style="margin-right: 20px">
                    <img src="assets/time.png" style="height: 200px">
                </div>
                <h1><?php __("Save Your Time") ?></h1>
                <p><?php __("Save Your Time With LOGATY Library") ?></p>
                <p><?php __("Dont Thing How to Make Multilingual Sites for yous Clients ... ") ?></p>
                <p><?php __("Logaty Library its Good Choice to Play with Multilingual PHP Websites/Secripts/Apps") ?></p>
            </div>
        </div>
    </div>
</div>
<?php include_once 'html/footer.php'; ?>