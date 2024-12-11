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
$query = "SELECT username, email FROM nhan_vien WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($username, $email);
$stmt->fetch();
$stmt->close();
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
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="/thesixhospital/assets/images/logo.jpg" alt="" width="100%"
                                        style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title" style="color: white;">
                                        <?php echo htmlspecialchars($username); ?></p>
                                    <p class="profile-subtitle " style="color: white;">
                                        <?php echo htmlspecialchars($email); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="margin-top: 50px;">
                                    <a href="/thesixhospital/login.php"><input type="button" value="Đăng xuất"
                                            class="btn btn-danger"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="profile.php" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-user menu-icon"></i>
                                <p class="menu-text">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        <div>
                            <a href="MyBooking.php" class="non-style-link-menu " style="color: white;">
                                <i class="fa-solid fa-bookmark menu-icon"></i>
                                <p class="menu-text">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="#" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"></i>
                                <p class="menu-text">Hồ sơ bệnh án</p>
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
                        <a href="/thesixhospital/index.php"><button class="btn" style="margin-left: 20px;">
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
            <table style="border: solid black 1px; margin-top: 20px;">
                <tbody>
                    <tr>
                        <td style="width: 25%;">
                            <div class="HSBA">
                                <div style="width:100%;">
                                    <div class="">
                                        <h1 style="text-align: center;">Bệnh
                                            Án</h1>
                                    </div>
                                    <hr>
                                    <div>
                                        <img style="width: 200px;  margin-top: 20px; margin-left: 50px;"
                                            src="/thesixhospital/assets/images/Screenshot 2024-10-29 224352.png" alt="">
                                        <p style="float: right; margin-right: 100px;">
                                            Ngày lập:
                                            10/29/2024 <br> Mã hồ sơ:
                                            2424525</p><br> <br>

                                        <p style=" margin-left: 50px;">
                                            Họ tên:
                                            Trương Chí
                                            Nghiệm</p>
                                        <p style="margin-left: 50px;">
                                            Mã bệnh nhân:
                                            BC1234124</p>
                                        <p style="margin-left: 50px;">
                                            Tình trạng bệnh án:
                                            Đái tháo đường</p>
                                        <p style="margin-left: 50px;">
                                            Tên bác sĩ:
                                            Cao Trí Kiệt</p>


                                    </div>
                                    <br>
                                    <a href="#myModal"><button class="login-btn btn-primary-soft btn "
                                            style="padding-top:11px;padding-bottom:11px;width:100%">
                                            <font class="tn-in-text">Đánh
                                                giá và nhận xét bác sĩ
                                            </font>
                                        </button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

    </div>
    <br><br>
</body>

</html>