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
$query = "SELECT username, email, so_dien_thoai, dia_chi, ngay_sinh FROM nhan_vien WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($username, $email, $so_dien_thoai, $dia_chi, $ngay_sinh);
$stmt->fetch();
$stmt->close();

// Kiểm tra nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];

    // Cập nhật thông tin người dùng trong CSDL
    $updateQuery = "UPDATE nhan_vien SET username = ?, email = ?, so_dien_thoai = ?, dia_chi = ?, ngay_sinh = ? WHERE id = ?";

    if ($stmt = $conn->prepare($updateQuery)) {
        // Gắn giá trị vào câu lệnh
        $stmt->bind_param('sssssi', $username, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $id);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            // Nếu cập nhật thành công
            $stmt->close();
            echo "<script>alert('Cập nhật thông tin thành công!');</script>";
        } else {
            // Nếu có lỗi trong quá trình cập nhật
            echo "<script>alert('Có lỗi xảy ra khi cập nhật thông tin!');</script>";
        }
    } else {
        echo "<script>alert('Không thể chuẩn bị câu lệnh SQL!');</script>";
    }
} else {
    // Nếu không phải POST, thì lấy thông tin người dùng
    $query = "SELECT username, email, so_dien_thoai, dia_chi, ngay_sinh FROM nhan_vien WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($username, $email, $so_dien_thoai, $dia_chi, $ngay_sinh);
    $stmt->fetch();
    $stmt->close();
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
                                <td colspan="2">
                                    <a href="/thesixhospital/logout.php"><input type="button" value="Đăng xuất"
                                            class="btn btn-danger"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="#" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-user menu-icon"></i>
                                <p class="menu-text">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
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
                    <td class="">
                        <div>
                            <a href="MedicalRecords.php" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"></i>
                                <p class="menu-text">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <a class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php"><button class="btn" style="margin-left: 20px;">
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

                <br>
                <center>

                    <div>
                        <table width="50%" class="sub-table scrolldown add-doc-form-container"
                            style="margin-left: 250px;" border="0">
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
                                    <?php echo htmlspecialchars($username); ?> <br><br>
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
                                    <?php echo htmlspecialchars(string: $dia_chi); ?> <br><br>
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

                            <div class="">
                                <div id="myModal" class="modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Sửa thông tin cá nhân</h3>
                                                <a href="#" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">&times;</a>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form chỉnh sửa profile -->
                                                <form action="#" method="POST">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Tên đăng nhập</label>
                                                        <input type="text" class="form-control" id="username"
                                                            name="username" value="<?php echo $username; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            value="<?php echo $email; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="so_dien_thoai" class="form-label">Số điện
                                                            thoại</label>
                                                        <input type="text" class="form-control" id="so_dien_thoai"
                                                            name="so_dien_thoai" value="<?php echo $so_dien_thoai; ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                        <input type="text" class="form-control" id="dia_chi"
                                                            name="dia_chi" value="<?php echo $dia_chi; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                                        <input type="date" class="form-control" id="ngay_sinh"
                                                            name="ngay_sinh" value="<?php echo $ngay_sinh; ?>" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger col-sm-12"
                                                            id="btnSave">
                                                            Xác nhận thay đổi
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>

                    </div>
                </center>
            </table>
</body>

</html>