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
    <link rel="stylesheet" href="/thesixhospital/assets/css/dataTables.bootstrap5.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/thesixhospital/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/thesixhospital/assets/css/styleAdminService.css" id="theme-styles">
</head>

<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0 d-flex align-items-center color-text-menu mb-5" href="/thesixhospital/index.php">
                    <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
                        <img src="assets/images/logo.jpg" width="80px">
                    </span>
                    <b>TheSixHospital</b>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <img src="/thesixhospital/assets/images/service/dashboard.png" width="25px" class="me-2">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline color-text-menu">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i>
                            <span class="ms-1 d-none d-sm-inline color-text-menu">
                                <img src="/thesixhospital/assets/images/service/logistics.png" width="25px" class="me-2">
                                Dịch vụ
                            </span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100 d-flex align-items-center ms-3">
                                <img src="/thesixhospital/assets/images/service/completed-task.png" width="25px" class="me-2">
                                <a href="/thesixhospital/adminIndex.php?m=services&a=list" class="nav-link px-0 color-text-menu">Danh sách dịch vụ</a>
                            </li>
                            <li class="w-100 d-flex align-items-center ms-3">
                                <img src="/thesixhospital/assets/images/service/schedule.png" width="25px" class="me-2">
                                <a href="/thesixhospital/adminIndex.php?m=services&a=list-calendar" class="nav-link px-0 color-text-menu">Lịch đặt dịch vụ</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col py-3 border-5 bg-color-main h-100">
            <div class="content">
                <div class="p-3 bg-white border-main">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="me-3">
                            <img src="/thesixhospital/assets/images/service/bell.png" width="30px" class="me-2">
                        </div>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <h6 class="d-none d-sm-inline color-text-menu me-3 mb-0">Trương Chí Nghiệm</h6>
                                <img src="/thesixhospital/assets/images/service/doctor.webp" alt="hugenerd" width="50" height="50" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item color-text-menu" href="#">Thông tin cá nhân</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item color-text-menu" href="#">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                // index.php?m=category&a=delete&id=1
                if (isset($_GET["m"])) {
                    $m = $_GET["m"];

                    switch ($m) {
                        case 'services':
                            if (isset($_GET["a"])) {
                                $a = $_GET["a"];
                                switch ($a) {
                                    case 'list':
                                        include 'modules/adminService/list.php';
                                        break;
                                    case 'create':
                                        include 'modules/adminService/create.php';
                                        break;
                                    case 'list-calendar':
                                        include 'modules/adminService/listCalendar.php';
                                        break;
                                    default:
                                        include 'modules/adminService/list.php';
                                }
                            }
                            break;
                        default:
                            include 'modules/dashboard/index.php';
                    }
                } else {
                    include 'modules/dashboard/index.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>



</body>
<script src="/thesixhospital/assets/js/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="/thesixhospital/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/thesixhospital/assets/js/dataTables.js"></script>
<script src="/thesixhospital/assets/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="assets/js/myscript.js"></script>
</html>