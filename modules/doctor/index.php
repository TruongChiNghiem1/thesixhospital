<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The six hospital</title>
    <link href="/thesixhospital/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/thesixhospital/assets/css/theme.min.css" id="theme-styles">
    <link rel="stylesheet" href="/thesixhospital/assets/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/thesixhospital/assets/css/style.css?v=5" id="theme-styles">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark text-white p-4 min-vh-100" >
                <div class="text-center mb-4">
                    <a href="edit_profile.php">
                        <img src="\thesixhospital\assets\images\doctor.png" alt="Logo" class="rounded-circle mb-1"
                            style="width: 100px; height: 100px;">
                    </a>
                    <h4 class="text-white">Nguyen Truong Son</h4>
                    <h6 class="text-secondary">doctor@gmail.com</h6>
                    <a href="#" class="btn btn-danger">Đăng xuất</a>
                </div>

                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item list-group-item-action bg-dark text-white" ><i class="bi bi-speedometer"></i> Bảng điều khiển</a>
                    <a href="index.php?page=examination" class="list-group-item list-group-item-action bg-dark text-white"><i class="bi bi-camera-video"></i> Khám bệnh</a>
                    <a href="index.php?page=appointment" class="list-group-item list-group-item-action bg-dark text-white"><i class="bi bi-calendar-check"></i> Lịch làm việc</a>
                    <a href="index.php?page=calendar_management" class="list-group-item list-group-item-action bg-dark text-white"><i class="bi bi-kanban"></i> Quản lý lịch làm việc</a>
                    <a href="index.php?page=patient" class="list-group-item list-group-item-action bg-dark text-white"><i class="bi bi-people"></i> Bệnh nhân</a>
                    <a href="index.php?page=setting" class="list-group-item list-group-item-action bg-dark text-white"><i class="bi bi-gear"></i> Cài đặt</a>
                </div>
            </div>


            <div class="col-md-9">
                <header class="d-flex justify-content-between align-items-center bg-white text-dark p-3">
                    <div class="logo">
                        <a href="index.php?page=home">
                            <img src="\thesixhospital\assets\images\logo.jpg" alt="Logo" style="width: 80px; height: auto;">
                        </a>
                    </div>
                    <div class="input-group w-50">
                        <input type="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">Tìm</button>
                        </div>
                    </div>
                    <div class="date-info text-dark">
                        <span>Ngày hôm nay: 31/10/2024</span>
                        <i class="bi bi-calendar-event-fill ml-2"></i>
                    </div>
                </header>

                <hr>
                <div id="main-content" class="main-content mt-4">
                    <?php
                    // Xử lý trang cần hiển thị dựa trên giá trị của tham số page
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

                    switch ($page) {
                        case 'setting':
                            include 'setting.php';
                            break;
                        case 'appointment':
                            include 'appointment.php';
                            break;
                        case 'calendar_management':
                            include 'calendar_management.php';
                            break;
                        case 'patient':
                            include 'patient.php';
                            break;
                        case 'examination';
                            include 'examination.php';
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
<script src="/thesixhospital/assets/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script type="text/javascript" src="assets/js/myscript.js"></script>

</html>