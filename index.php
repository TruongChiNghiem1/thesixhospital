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
    <link href="/thesixhospital/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/thesixhospital/assets/css/theme.min.css" id="theme-styles">
    <link rel="stylesheet" href="/thesixhospital/assets/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!--    <div class="header">-->
<!--        Hello --><?php //echo $_SESSION["admin"] ?><!-- - <a href="logout.php">Logout</a>-->
<!--    </div>-->

<header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element="">
    <div class="container">
        <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="index.php">
          <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
            <img src="assets/images/logo.jpg" width="100px">
          </span>
            TheSixHospital
        </a>
        <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
                <ul class="navbar-nav position-relative">
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link active" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown position-static py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Khám chuyên khoa</a>
                    </li>
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Khám dinh dưỡng</a>
                    </li>
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Khám sức khỏe</a>
                    </li>
                    <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Dịch vụ</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-flex gap-sm-1">
            <a class="btn btn-primary animate-scale" href="#">
                <span class="d-none d-xl-inline ms-1">Đăng nhập/Đăng ký</span>
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
                default:
                    include 'modules/dashboard/index.php';
            }

        } else {
            include 'modules/dashboard/index.php';
        }
    ?>
</div>

<!-- Page footer -->
<footer class="footer bg-body border-top" data-bs-theme="dark">
    <div class="container pb-md-2">
        <div class="d-md-flex align-items-center py-4 pt-sm-5 mt-3 mt-sm-0">
            <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-md-auto mb-4 mb-md-0 order-md-2">

            </div>
            <p class="text-body-secondary fs-sm text-center text-md-start mb-0 me-md-4 order-md-1">© All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
<script src="/thesixhospital/assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/myscript.js"></script>
</html>