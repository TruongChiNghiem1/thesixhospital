
<?php
session_start();

$id = $_SESSION['id'];
include_once("../controller/BSDD/cNhanVien.php");
$nhanVienBS = new NhanVienBS();
$nhanVien = $nhanVienBS->selectNhanVienById($id);
$row = mysqli_fetch_array($nhanVien);
$ten_nhan_vien = $row['ho_ten'];
$email = $row['email'];


error_reporting(0);
// require_once 'config/connect.php';
include_once("controller/admin.php");
    
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../login.php");
    }else{
        if (strpos($_SESSION['loai_nhan_vien'], 1) !== false) {
            header("location: ../admin/index.php");
        } elseif (strpos($_SESSION['loai_nhan_vien'], 2) !== false) {
            header("Location: BSSucKhoe.php");
        }
    }




?>

<!doctype html>
<html lang="vi">

<head>
    <title>Hệ Thống Quản Lý Dinh Dưỡng</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<style>
       
        .sidebar, .container-fluid {
            overflow: hidden; 
            height: 100vh;
            
        }

        .sidebar {
            position: fixed;
            width: 250px;
            transition: all 0.3s;
        }
</style>

<body class="bg-light">
    <!-- Button trigger modal -->

    <!-- Modal -->
    
    <!--  -->
   
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white vh-100 p-4">
                <div class="text-center mb-4">
                    <a>
                        <img src="..\assets\images\bacsi.png" alt="Logo" class="rounded-circle mb-1"
                            style="width: 100px; height: 100px" data-toggle="modal" data-target="#modelId" />
                    </a>
                    <h4><?php echo $ten_nhan_vien ?></h4>
                    <h6 class="text-muted"><?php echo $email ?></h6>
                    <form action="" method="post">

                        <button type="submit" name="btnLogout" class="btn btn-danger w-75 mt-3">Đăng Xuất</button>
                    </form>

                </div>

                <?php
                            if (isset($_POST['btnLogout'])) {
                                // echo "logout";
                                include_once("../logout.php");
                            }
                ?>

                <div class="list-group mt-4">
                    <a href="BacSiDD.php?page=home"
                        class="list-group-item list-group-item-action bg-dark text-light fs-4">
                        <i class="bi bi-house-fill fs-4"></i> Trang Chủ
                    </a>
                    <a href="BacSiDD.php?page=appointments"
                        class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-calendar-check-fill"></i> Xem lịch hẹn tư vấn
                    </a>
                    <a href="BacSiDD.php?page=menu" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-list-ul"></i> Quản lý thực đơn dinh dưỡng
                    </a>
                    <a href="BacSiDD.php?page=users" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-person-fill"></i> Quản lý thông tin bệnh nhân
                    </a>
                    <a href="BacSiDD.php?page=request"
                        class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-file-earmark-text-fill"></i> Gửi Đơn Xin Nghỉ/Công
                        Tác
                    </a>
                    <a href="BacSiDD.php?page=add_medical_records"
                        class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-file-earmark-medical-fill"></i> Tạo hồ sơ bệnh án
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <header class="d-flex justify-content-between align-items-center bg-white text-dark p-3">
                    <div class="logo">
                        <a href="BacSiDD.php?page=home">
                            <img src="..\assets\images\logo.jpg" alt="Logo" style="width: 80px; height: auto" />
                        </a>
                    </div>
                    <div class="banner">

                    <!-- chữ chạy chạy -->
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        <h1 class="text-primary">Hệ Thống Quản Lý Dinh Dưỡng</h1>
                    </marquee>
                      
                        
                    </div>
                    <div class="date-info text-dark">
                        <span>Ngày hôm nay: <?php echo date("Y-m-d"); ?></span>
                        <i class="bi bi-calendar-event-fill ml-2"></i>
                    </div>
                </header>

                <hr />
                <div id="main-content" class="main-content mt-4">
                    <?php
                    // Xử lý trang cần hiển thị dựa trên giá trị của tham số page
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

                    switch ($page) {
                        case 'appointments':
                            include 'view_appointments.php';
                            break;
                        case 'menu':
                            include 'manage_menu.php';
                            break;
                        case 'users':
                            include 'manage_users.php';
                            break;
                        case 'request':
                            include 'submit_request.php';
                            break;
                        case 'medical_records':
                            include 'vMedical_Records.php';
                            break;
                        case 'update_menu':
                            include 'vUpdate_menu.php';
                            break;
                        case 'add_thucdon':
                            include 'add_thuc_don.php';
                            break;
                        case 'add_medical_records':
                            include 'add_medical_records.php';
                            break;
                        case 'view_BacSiDD':
                            include 'vDonXinNghi.php';
                            break;
                        default:
                            include 'dashboard.php';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
