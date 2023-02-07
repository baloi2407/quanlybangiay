<?php
if (!defined('BASE'))
    exit('Access deny');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'view/widget/head.php' ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php
            include 'view/widget/menu.php';
            include 'view/widget/topmenu.php'
            ?>


            <!-- page content -->
            <div class="right_col" role="main">
                <?php
                include  $view;
                ?>
            </div>
            <!-- /page content -->
            <?php
            include 'view/widget/footer.php';
            ?>

        </div>
    </div>

    <?php include 'view/widget/js.php' ?>

</body>

</html>