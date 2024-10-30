<?php
//echo phpinfo();
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
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
    <meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache" />
    <title>The six hospital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/thesixhospital/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/thesixhospital/assets/css/style.css" id="theme-styles">
</head>

<body>
    <!--    <div class="header">-->
    <!--        Hello --><?php //echo $_SESSION["admin"] 
                            ?>
    <!-- - <a href="logout.php">Logout</a>-->
    <!--    </div>-->

    <header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element="">
        <div class="container">
            <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0 d-flex align-items-center" href="/thesixhospital/index.php">
                <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
                    <img src="assets/images/logo.jpg" width="100px">
                </span>
                TheSixHospital
            </a>
            <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
                <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
                    <ul class="navbar-nav position-relative">
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link active" aria-current="page" href="/thesixhospital/index.php" about="">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown position-static py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-trigger="hover" aria-expanded="false">Khám chuyên khoa</a>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Khám dinh
                                dưỡng</a>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Khám sức
                                khỏe</a>
                        </li>
                        <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                            <a class="nav-link " href="/thesixhospital/index.php?m=service" >Dịch vụ</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex gap-sm-1 m-2">
                <a class="btn btn-primary animate-scale mr-2" href="#">
                    <span class="d-none d-xl-inline ms-1">Đăng nhập/Đăng ký</span>
                </a>
            </div>
            <div class="d-flex gap-sm-1">
                <a class="btn btn-primary animate-scale" href="#">
                    <span class="d-none d-xl-inline ms-1" data-toggle="modal" data-target="#myModal">Đặt lịch</span>
                </a>
            </div>
        </div>
    </header>


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
                case 'service':
                    include 'modules/service/index.php';
                    break;
                default:
                    include 'modules/dashboard/index.php';
            }
        } else {
            include 'modules/dashboard/index.php';
        }
        ?>
    </div>

    <!-- Page footer -->
    <footer class="footer bg-body border-top mt-5" data-bs-theme="dark">
        <div class="container pb-md-2">
            <div class="d-md-flex align-items-center py-4 pt-sm-5 mt-3 mt-sm-0">
                <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-md-auto mb-4 mb-md-0 order-md-2">

                </div>
                <p class="text-body-secondary fs-sm text-center text-md-start mb-0 me-md-4 order-md-1">© All rights
                    reserved.</p>
            </div>
        </div>
    </footer>
</body>
<script src="/thesixhospital/assets/js/jquery-3.7.1.min.js"
        crossorigin="anonymous"></script>
<script src="/thesixhospital/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script type="text/javascript" src="assets/js/myscript.js"></script>
</html>