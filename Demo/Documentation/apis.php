<?php
include_once '../html/header.php';
$align = (getDir() == 'ltr' ? 'left' : 'right');
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
        <div class="padding20">
            <div class="">
                <div class="grid">
                    <div class="row cells1">
                        <div class="cell colspan3">
                            <div class="bg-lightBlue fg-white align-center">
                                <div class="container">
                                    <div class="no-overflow" style="padding-top: 40px">
                                        <?php __("this Page to Show you all functions located in functions folder. <br> whate function do ! <be> you can read comments in funtions.php its good reference") ?>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <h1 class=""><?php __("Library API's") ?></h1>
                            <hr>


                            <pre class="code">
function myFunction()
{
    echo "ani";

    include_once("fvfmk.php");
}
                            </pre>

<!--        <table class="table" dir="<?php echo getDir() ?>"
       style="text-align: <?php echo $align ?>">
    <thead>
        <tr>
            <th style="text-align: <?php echo $align ?>" class="sortable-column"><?php __("Function Name") ?></th>
            <th style="text-align: <?php echo $align ?>" class="sortable-column sort-asc"><?php __("What it do") ?></th>
            <th style="text-align: <?php echo $align ?>" class="sortable-column sort-desc"><?php __("More Information") ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("__(\$string, \$lang = '')") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
            <td style="text-align: <?php echo $align ?>">
                            <?php __("") ?>
            </td>
        </tr>
    </tbody>
</table>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../html/footer.php'; ?>
