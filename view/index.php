<!doctype html>
<html lang="vi">

<head>
    <title>Hệ Thống Quản Lý Dinh Dưỡng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white vh-100 p-4">
                <div class="text-center mb-4">
                    <a href="edit_profile.php">
                        <img src="..\assets\images\bacsi.png" alt="Logo" class="rounded-circle mb-1"
                            style="width: 100px; height: 100px;">
                    </a>
                    <h4>ThanhTong</h4>
                    <h6 class="text-muted">bsdd@gmail.com</h6>
                    <button type="button" class="btn btn-danger w-75 mt-3">Đăng Xuất</button>
                </div>

                <div class="list-group mt-4">
                    <a href="index.php?page=home" class="list-group-item list-group-item-action bg-dark text-light fs-4">
                        <i class="bi bi-house-fill fs-4"></i> Trang Chủ
                    </a>
                    <a href="index.php?page=appointments"
                        class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-calendar-check-fill"></i> Xem lịch hẹn tư vấn
                    </a>
                    <a href="index.php?page=menu" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-list-ul"></i> Quản lý thực đơn dinh dưỡng
                    </a>
                    <a href="index.php?page=users" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-person-fill"></i> Quản lý thông tin bệnh nhân
                    </a>
                    <a href="index.php?page=request" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="bi bi-file-earmark-text-fill"></i> Gửi Đơn Xin Nghỉ/Công Tác
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <header class="d-flex justify-content-between align-items-center bg-white text-dark p-3">
                    <div class="logo">
                        <a href="index.php?page=home">
                            <img src="..\assets\images\logo.jpg" alt="Logo" style="width: 80px; height: auto;">
                        </a>
                    </div>
                    <div class="input-group w-50">
                        <input type="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">Tìm</button>
                        </div>
                    </div>
                    <div class="date-info text-dark">
                        <span>Ngày hôm nay: 29/10/2024</span>
                        <i class="bi bi-calendar-event-fill ml-2"></i>
                    </div>
                </header>

                <hr>
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