<?php
// Kết nối tới cơ sở dữ liệu
include('../../config/connect.php');
session_start();
$database = new connect();
$conn = $database->connectDB();
// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công. Vui lòng kiểm tra lại tệp connect.php.");
}
if (!isset($_SESSION['id'])) {
    // Nếu chưa đăng nhập, chuyển hướng tới trang đăng nhập
    header("Location: /thesixhospital/login.php");
    exit();
}
// Lấy ID người dùng từ session
$id = $_SESSION['id'];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$query = "SELECT ho_ten, email FROM nhan_vien WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($ho_ten, $email);
$stmt->fetch();
$stmt->close();


// --------

include("../../controller/BSDD/cUser.php");
include_once '../model/inforuser.php';  // Đảm bảo đường dẫn từ thư mục controller

$inforUser = new InforUser();

$id_ho_so_benh_an = $_GET['id'] ?? null;

if (!$id_ho_so_benh_an) {
    echo "<script>alert('Không tìm thấy ID Hồ Sơ Bệnh Án!'); window.history.back();</script>";
    exit;
}

$hoSo = $inforUser->getHoSoBenhAnById($id_ho_so_benh_an);

if (!$hoSo) {
    echo "<script>alert('Không tìm thấy Hồ Sơ Bệnh Án với ID đã chọn!'); window.history.back();</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/admin.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/modal1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <title>Profile</title>
    <style>
    .dashbord-tables {
        animation: transitionIn-Y-over 0.5s;
    }

    .filter-container {
        animation: transitionIn-X 0.5s;
    }

    .sub-table {
        animation: transitionIn-Y-bottom 0.5s;
    }
    </style>


</head>

<body>

    <div class="container">
        <div class="menu" style="background-color: #343a40;">
            <table class="menu-container" border="0">
                <table border="0" class="profile-container">
                    <tr>
                        <td width="30%" style="padding-left:20px">
                            <img src="/thesixhospital/assets/images/logo.jpg" alt="" width="30%"
                                style="border-radius:50%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="profile-title"
                                style="color: white; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 25px;">
                                <?php echo htmlspecialchars($ho_ten); ?></p>
                            <p class="profile-subtitle "
                                style="color: white; text-align: center;  padding-bottom: 10px; font-size: 17px;">
                                <?php echo htmlspecialchars($email); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a href="/thesixhospital/logout.php"><input type="button" value="Đăng xuất"
                                    class="btn btn-danger"></a>
                        </td>
                    </tr>
                </table>
                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="profile.php?id=<?php echo $_SESSION["id"]; ?>" class="non-style-link-menu"
                                style="color: white;">
                                <i class="fa-solid fa-user menu-icon" style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="MyBooking.php?id=<?php echo $_SESSION["id"]; ?>" class="non-style-link-menu "
                                style="color: white;">
                                <i class="fa-solid fa-bookmark menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="#" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>

            </table>
        </div>


        <a class="dash-body">
            <table border="0" width="100%" style="border-spacing: 0;margin:0;padding:0">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php?id=<?php echo $_SESSION["id"]; ?>"><button class="btn"
                                style="margin-left: 20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Hồ sơ bệnh án</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">

                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/assets/images/calendar.svg"
                                width="100%"></button>
                    </td>
                </tr>
            </table>
            <div class="container mt-5">
                <h2>Chi Tiết Hồ Sơ Bệnh Án</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Bệnh Nhân</strong></td>
                            <td>
                                <?php
                                $benhNhan = $inforUser->getBenhNhanById($hoSo['id_benh_nhan']);
                                echo $benhNhan ? $benhNhan['ten_benh_nhan'] : "Không xác định";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Giới Tính</strong></td>
                            <td><?php echo $benhNhan['gioi_tinh']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Ngày Sinh</strong></td>
                            <td><?php echo $benhNhan['ngay_sinh']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Địa chỉ</strong></td>
                            <td><?php echo $benhNhan['dia_chi']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Mã Hồ Sơ</strong></td>
                            <td><?php echo $hoSo['ma_ho_so_benh_an']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Mô Tả</strong></td>
                            <td><?php echo $hoSo['mo_ta']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Chuẩn Đoán</strong></td>
                            <td><?php echo $hoSo['chuan_doan']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Ngày Khám</strong></td>
                            <td><?php echo $hoSo['ngay_kham']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Dị Ứng</strong></td>
                            <td><?php echo $hoSo['di_ung']; ?></td>
                        </tr>
                    </table>
                </div>
                <a href="BacSiDD.php?page=users" class="btn btn-secondary mt-3">Quay Lại</a>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <br><br>
</body>

</html>