<?php
// Kết nối tới cơ sở dữ liệu
include('../../config/connect.php');

session_start();
$database = new connect();
$conn = $database->connectDB();
if (!isset($_SESSION['id'])) {
    // Nếu chưa đăng nhập, chuyển hướng tới trang đăng nhập
    header("Location: /thesixhospital/login.php");
    exit();
}

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công. Vui lòng kiểm tra lại tệp connect.php.");
}
// Lấy ID người dùng từ session
$id = $_SESSION['id'];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$query = "SELECT ho_ten, email, so_dien_thoai, dia_chi, ngay_sinh FROM nhan_vien WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($ho_ten, $email, $so_dien_thoai, $dia_chi, $ngay_sinh);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];

    // Kiểm tra email trùng lặp
    $query_check_email = "SELECT id FROM nhan_vien WHERE email = ? AND id != ?";
    $stmt_check_email = $conn->prepare($query_check_email);
    $stmt_check_email->bind_param('si', $email, $id);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        // Nếu email đã tồn tại
        echo "<script>alert('Email đã tồn tại! Vui lòng sử dụng email khác.');</script>";
    } else {
        // Cập nhật thông tin vào cơ sở dữ liệu
        $query_update = "UPDATE nhan_vien SET ho_ten = ?, email = ?, so_dien_thoai = ?, dia_chi = ?, ngay_sinh = ? WHERE id = ?";
        $stmt_update = $conn->prepare($query_update);
        $stmt_update->bind_param('sssssi', $ho_ten, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $id);

        if ($stmt_update->execute()) {
            // Hiển thị thông báo thành công
            echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href = 'profile.php';</script>";
        } else {
            // Hiển thị thông báo lỗi nếu cập nhật thất bại
            echo "<script>alert('Có lỗi xảy ra khi cập nhật thông tin!');</script>";
        }

        $stmt_update->close();
    }

    $stmt_check_email->close();
}
$conn->close();
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
        <div class="menu" style="background-color: #343a40">
            <table class=" menu-container" border="0">

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
                        <td colspan=" 2">
                            <a href="/thesixhospital/logout.php"><input type="button" value="Đăng xuất"
                                    class="btn btn-danger"></a>
                        </td>
                    </tr>
                </table>

                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="#" class="non-style-link-menu" style="color: white;">
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
                            <a href="MedicalRecords.php?id=<?php echo $_SESSION["id"]; ?>" class="non-style-link-menu"
                                style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 30px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php?id=<?php echo $_SESSION["id"]; ?>"><button class="btn"
                                style="margin-left: 20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Thông tin cá nhân</p>
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
            </table>
            <br>
            <center>
                <div>
                    <table width="70%" height="80%" style="font-size: 17px;"
                        class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                            <td>
                                <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">
                                    Thông tin</p>

                                <br>
                                <hr><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="name" class="form-label">Họ Tên: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <?php echo htmlspecialchars($ho_ten); ?> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Email" class="form-label">Email: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <?php echo htmlspecialchars($email); ?> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="Tele" class="form-label">Số điện thoại: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <?php echo htmlspecialchars($so_dien_thoai); ?> <br><br>
                            </td>
                        </tr>

                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" class="form-label">Địa chỉ: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <?php echo htmlspecialchars($dia_chi); ?> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <label for="spec" class="form-label">Ngày sinh: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <?php echo htmlspecialchars($ngay_sinh); ?> <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#myModal"><input type="button" value="Sửa thông tin"
                                        class="login-btn btn-primary-soft btn"></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </center>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>SỬA THÔNG TIN CÁ NHÂN</h3>
                        <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</a>
                    </div>
                    <div class="modal-body">
                        <!-- Form chỉnh sửa profile -->
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="ho_ten" class="form-label">Họ và tên</label>
                                <input type="text" name="ho_ten" id="ho_ten" class="form-control form-control-sm"
                                    placeholder="Nhập họ và tên"
                                    value="<?php echo htmlspecialchars(string: $ho_ten); ?>" required>
                                <span class="text-danger" id="user_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm"
                                    placeholder="Nhập Email" value=" <?php echo htmlspecialchars(string: $email); ?>"
                                    required onblur="validateEmail(this)">
                                <p id="email-error-message" style="color: red; display: none; margin-top: 0;"></p>
                                <!-- Thông báo lỗi -->
                            </div>

                            <div class="mb-3">
                                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                <input type="tel" name="so_dien_thoai" class="form-control form-control-sm"
                                    placeholder="ex: 0712345678"
                                    value="<?php echo htmlspecialchars(string: $so_dien_thoai); ?>"
                                    onblur="rangbuocsodienthoai(this)">
                                <p id="phone-error-message" style="color: red; display: none; margin-top: 0;"></p>
                            </div>

                            <div class="mb-3">
                                <label for="dia_chi" class="form-label">Địa chỉ</label>
                                <input type="text" name="dia_chi" class="form-control form-control-sm"
                                    placeholder="Nhập địa chỉ" onblur="rangbuocdiachi(this)"
                                    value="<?php echo htmlspecialchars(string: $dia_chi); ?>" required>
                                <p id="address-error-message" style="color: red; display: none;"></p>
                            </div>

                            <div class="mb-3">
                                <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                <input type="date" name="ngay_sinh" class="form-control form-control-sm"
                                    value="<?php echo htmlspecialchars(string: $ngay_sinh); ?>" required>
                                <span class="text-danger" id="ngay_sinh_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <!-- Nút Submit trong Modal, không dùng data-bs-dismiss -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger w-100 btn-sm">Lưu thay đổi</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="/thesixhospital/assets/js/signup.js"></script>
</body>

</html>