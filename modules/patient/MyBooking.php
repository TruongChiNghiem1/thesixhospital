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
    <link rel="stylesheet" href="/thesixhospital/assets/css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>Lịch sử đặt lịch</title>
    <style>
    .popup {
        animation: transitionIn-Y-bottom 0.5s;
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
                            <a href="profile.php" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-user menu-icon" style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="MyBooking.php" class="non-style-link-menu " style="color: white;">
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
                            <a href="MedicalRecords.php" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php"><button class="btn" style="margin-left:20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Lịch sử đặt lịch</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/assets/images/calendar.svg"
                                width="100%"></button>
                    </td>


                </tr>

                <!-- <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>
                        </a>
                        </div>
                    </td>
                </tr> -->

                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <br>
                                <br>
                                <br>
                                <br>
                                <table width="93%" class="sub-table scrolldown" border="0" style="border:none">
                                    <tbody>
                                        <tr>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">
                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ chuyên khoa<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Đau đầu thường xuyên
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn ">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a href="#myModal"><button
                                                                class="login-btn btn-primary-soft btn ">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
                                                            </button></a>
                                                    </div>



                                                </div>
                                            </td>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">

                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                            Mã đặt lịch: OC-000-1
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ sinh dưỡng<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Ăn hoài không mập :D
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn ">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a href="#myModal"><button
                                                                class="login-btn btn-primary-soft btn ">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
                                                            </button></a>
                                                    </div>

                                                </div>
                                            </td>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">

                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                            Mã đặt lịch: OC-000-1
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ sức khỏe<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Đau đầu thường xuyên
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a href="#myModal"><button
                                                                class="login-btn btn-primary-soft btn ">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
                                                            </button></a>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Sửa lịch khám</h3>
                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</a>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <label for="txtDate">Ngày đặt lịch</label>
                        <input type="date" class="form-control" id="txtDate" />
                        <span id="tbDate" class="text-danger">*</span>
                    </div>

                    <div class="col-sm-12">
                        <label for="txtChuyenKhoa" class="mt-3">Thời gian</label>
                        <select id="txtChuyenKhoa" class="form-select">
                            <option value="" hidden selected>Chọn thời gian</option>
                            <option value="8h">8h</option>
                            <option value="10h">10h</option>
                            <option value="13h">13h</option>
                            <option value="15h">15h</option>
                            <option value="17h">17h</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger col-sm-12" data-bs-dismiss="modal" id="btnSave">
                        Xác nhận thay đổi
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>