<style>
    .ms-3 {
        margin-left: 1rem;
    }
</style>
<?php
//session_start();
?>
<div class="col-auto col-md-3 col-xl-2 border ms-3">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-2 text-white min-vh-100">
        <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0 d-flex align-items-center color-text-menu mb-5" href="/thesixhospital/index.php">
                    <span class="d-none d-sm-flex flex-shrink-0 text-primary rtl-flip me-2">
                        <img src="/thesixhospital/assets/images/logo.jpg" width="80px">
                    </span>
            <b>TheSixHospital</b>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">

            <li class="nav-item">
                <a href="/thesixhospital/view/view_dashboard.php" class="nav-link align-middle px-0">
                    <img src="/thesixhospital/assets/images/service/dashboard.png" width="25px" class="me-2">
                    <span class="d-none d-sm-inline color-text-menu">Dashboard</span>
                </a>
            </li>

            <?php
            if($_SESSION['loai_nhan_vien'] == 1) {
                ?>
            <li class="nav-item">
                <a href="/thesixhospital/admin/index.php" class="nav-link align-middle px-0">
                    <img src="/thesixhospital/assets/images/service/medical-team.png" width="25px" class="me-2">
                    <span class="d-none d-sm-inline color-text-menu">Quản lý nhân sự</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/thesixhospital/view/view_schedule.php" class="nav-link align-middle px-0">
                    <img src="/thesixhospital/assets/images/service/team.png" width="25px" class="me-2">
                    <span class="d-none d-sm-inline color-text-menu">Phân lịch ca trực</span>
                </a>
            </li>
                <li class="nav-item">
                    <a href="/thesixhospital/view/view_approveleave.php" class="nav-link align-middle px-0">
                        <img src="/thesixhospital/assets/images/bsdd/documentation.png" width="25px" class="me-2">
                        <span class="d-none d-sm-inline color-text-menu">Duyệt đơn nghỉ</span>
                    </a>
                </li>
            <?php
            }
            if($_SESSION['loai_nhan_vien'] == 2 || $_SESSION['loai_nhan_vien'] == 1) {
            ?>
            <li class="w-100 mt-1 mb-1">
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center">
                        <span class="d-none d-sm-inline color-text-menu">
                                <img src="/thesixhospital/assets/images/service/healthcare.png" width="25px" class="me-2">
                                Sức khỏe
                            </span>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/service/completed-task.png" width="25px" class="me-2">
                        <a href="#" class="nav-link px-0 color-text-menu">Danh sách dịch vụ</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/service/schedule.png" width="25px" class="me-2">
                        <a href="/thesixhospital/adminIndex.php?m=services&a=list-calendar" class="nav-link px-0 color-text-menu">Lịch đặt dịch vụ</a>
                    </li>
                </ul>
            </li>
            <?php
            }
            if($_SESSION['loai_nhan_vien'] == 3 || $_SESSION['loai_nhan_vien'] == 1) {
            ?>
            <li class="w-100 mt-1 mb-1">
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center">
                        <span class="d-none d-sm-inline color-text-menu">
                                <img src="/thesixhospital/assets/images/service/nutrition-plan.png" width="25px" class="me-2">
                                Dinh dưỡng
                            </span>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/bsdd/home.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=home" class="nav-link px-0 color-text-menu">Trang Chủ</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/service/schedule.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=appointments" class="nav-link px-0 color-text-menu">Xem lịch hẹn tư vấn</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/bsdd/menu.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=menu" class="nav-link px-0 color-text-menu">Quản lý thực đơn dinh dưỡng</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/bsdd/examination.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=users" class="nav-link px-0 color-text-menu">Quản lý thông tin bệnh nhân</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/bsdd/documentation.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=request" class="nav-link px-0 color-text-menu">Gửi Đơn Xin Nghỉ/Công</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/bsdd/health-report.png" width="25px" class="me-2">
                        <a href="/thesixhospital/view/BacSiDD.php?page=add_medical_records" class="nav-link px-0 color-text-menu">Tạo hồ sơ bệnh án</a>
                    </li>
                </ul>
            </li>
            <?php
            }
            if($_SESSION['loai_nhan_vien'] == 4 || $_SESSION['loai_nhan_vien'] == 1) {
            ?>
            <li class="w-100 mt-1 mb-1">
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center">
                        <span class="d-none d-sm-inline color-text-menu">
                                <img src="/thesixhospital/assets/images/service/medical-history.png" width="25px" class="me-2">
                                Chuyên khoa
                            </span>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/service/completed-task.png" width="25px" class="me-2">
                        <a href="#" class="nav-link px-0 color-text-menu">Danh sách dịch vụ</a>
                    </li>
                    <li class="w-100 d-flex align-items-center ms-3">
                        <img src="/thesixhospital/assets/images/service/schedule.png" width="25px" class="me-2">
                        <a href="#" class="nav-link px-0 color-text-menu">Lịch đặt dịch vụ</a>
                    </li>
                </ul>
            </li>
            <?php
            }
            if($_SESSION['loai_nhan_vien'] == 1) {
            ?>
            <li class="w-100 mt-1 mb-1">
                <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center">
                        <span class="d-none d-sm-inline color-text-menu">
                                <img src="/thesixhospital/assets/images/service/logistics.png" width="25px" class="me-2">
                                Dịch vụ
                            </span>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
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
                <?php
            }
            ?>
        </ul>

    </div>
</div>