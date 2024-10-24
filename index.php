<?php
//echo phpinfo();
session_start();
require_once 'config/app.php';
require_once 'config/connect.php';
require_once 'config/functional.php';

if (!isset($_SESSION["admin"])) {
    header("location:login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/myscript.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            Hello <?php echo $_SESSION["admin"] ?> - <a href="logout.php">Logout</a>
        </div>

        <div class="content">

            <?php
                // index.php?m=category&a=delete&id=1
                if (isset($_GET["m"])) {
                    $m = $_GET["m"];

                    switch ($m) {
                        case 'category':
                            include 'modules/category/index.php';
                            break;
                        case 'product':
                            include 'modules/product/index.php';
                            break;
                        case 'user':
                            include 'modules/user/index.php';
                            break;
                        default:
                            include 'modules/dashboard/index.php';
                    }

                } else {
                    include 'modules/dashboard/index.php';
                }
            ?>
        </div>

        <div class="footer"></div>
    </div>
</body>
</html>