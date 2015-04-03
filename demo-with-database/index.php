<?php
require_once 'core/intit.php';
$link = new Link();
$db = DBContent::connect();
$allContent = $db->get('content');
?>
<!DOCTYPE html>
<html dir="<?php getDir() ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta charset="UTF-8">

        <title><?php __('multilingual php library'); ?></title>

        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="assets/css/heroic-features.css" type="text/css" rel="stylesheet">
        <link href="assets/css/sweet-alert.css" type="text/css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->        
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php __("Toggle navigation"); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php __('the Library On GitHub'); ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        foreach(enabledLanguagesList() as $lang => $code) {
                            ?>
                            <li>
                                <a href="<?php echo $link->create('', $code) ?>"><?php echo languageNameIntongue($code) ?></a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a target="_blank" href="http://t3lam.net"><?php __("My Blog"); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">
            <div class="row clearfix">
                <?php
                foreach($allContent as $content) {
                    ?>
                    <div class="col-md-12 column">
                        <h2>
                            <?php echo $content['title']; ?>
                        </h2>
                        <p>
                            <?php echo $content['content']; ?>
                        </p>
                        <p>
                            <a class="btn" href="<?php echo $link->create('http://' . $_SERVER['SERVER_NAME'] . '/ml/demo-with-database/posts.php') . (count($_GET) > 0 ? '&' : '?') . 'id=' . $content['id'] ?>"><?php __("View details »"); ?></a>
                        </p>
                    </div>
                    <div class="clear"></div>
                <?php } ?>
            </div>
        </div>
        <!-- /.container -->
        <script src="assets/js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>  
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/sweet-alert.js"></script>
        <script src="assets/js/sweet-alert.min.js"></script>
        <script type="text/javascript">
<?php
if(currentLang() !== Detect::browser()) {
    if(!in_array(Detect::browser(), enabledLanguagesList())) {
        ?>
                    swal({title: '<?php
        __("Browser Language", Detect::browser());
        echo '-' . languageNameIntongue(Detect::browser()) . '!'
        ?>',
                        text: "Sorry Your Browser Language Not Supported",
                        imageUrl: "assets/sad.png"
                    });
        <?php
    } else {
        ?>
                    swal({title: '<?php
        __("Browser Language", Detect::browser());
        echo '-' . languageNameIntongue(Detect::browser()) . '!'
        ?>',
                        text: '<?php
        __("You Want to Complete Browsing in Browser Language ?",
                Detect::browser())
        ?> <?php echo languageNameIntongue(Detect::browser()) ?>',
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: '<?php
        __("Yes Complete With Browser Language", Detect::browser())
        ?>',
                        cancelButtonText: '<?php
        __("No Complete With Current Language", Detect::browser())
        ?>',
                        closeOnConfirm: false,
                        closeOnCancel: true},
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = "<?php
        echo $link->create('', Detect::browser())
        ?>";
                        }
                    });

        <?php
    }
}
?>


        </script>

        <?php
        if(isset($_GET['countyLang'])) {
            $lang = Detect::country();
            //echo $lang;
            if($lang == 'localhost') {
                ?>
                <script type="text/javascript">
                    swal('<?php __("Country Language"); ?>', "<?php __('Cant Detect your Country Language in localhost'); ?>", 'error');
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    swal("<?php __('Country Language', $lang) ?>", "<?php
        echo _x('Detected Your Country Language is :', $lang) . languageNameIntongue(Detect::country());
        ?>", "success");
                </script>
                <?php
            }
        }
        ?>
    </body>

</html>