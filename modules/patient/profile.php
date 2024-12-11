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

    // Kiểm tra xem email có bị trùng không
    $checkEmailQuery = "SELECT COUNT(*) FROM nhan_vien WHERE email = ? AND id != ?";
    if ($stmt = $conn->prepare($checkEmailQuery)) {
        $stmt->bind_param('si', $email, $id);  // Kiểm tra email khác với chính người dùng hiện tại
        $stmt->execute();
        $stmt->bind_result($emailCount);
        $stmt->fetch();
        $stmt->close();

        // Nếu email đã được sử dụng bởi người khác, hiển thị thông báo và không thực hiện cập nhật
        if ($emailCount > 0) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=email_exists");
            exit();  // Dừng ngay sau khi chuyển hướng
        }

        // Tiến hành cập nhật thông tin người dùng trong CSDL nếu email không trùng
        $updateQuery = "UPDATE nhan_vien SET ho_ten = ?, email = ?, so_dien_thoai = ?, dia_chi = ?, ngay_sinh = ? WHERE id = ?";
        if ($stmt = $conn->prepare($updateQuery)) {
            $stmt->bind_param('sssssi', $ho_ten, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $id);

            if ($stmt->execute()) {
                // Cập nhật thành công
                header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                exit();  // Dừng ngay sau khi chuyển hướng
            } else {
                // Nếu không cập nhật được
                header("Location: " . $_SERVER['PHP_SELF'] . "?error=update_failed");
                exit();  // Dừng ngay sau khi chuyển hướng
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=sql_error");
            exit();  // Dừng ngay sau khi chuyển hướng
        }
    } else {
        // Nếu không thể kiểm tra email
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=email_check_failed");
        exit();  // Dừng ngay sau khi chuyển hướng
    }
}
?>

<?php
// Kiểm tra nếu có thông báo thành công hoặc lỗi
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Cập nhật thông tin thành công!');</script>";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'email_exists':
            echo "<script>alert('Email này đã được sử dụng!');</script>";
            break;
        case 'update_failed':
            echo "<script>alert('Có lỗi xảy ra khi cập nhật thông tin!');</script>";
            break;
        case 'sql_error':
            echo "<script>alert('Không thể chuẩn bị câu lệnh SQL!');</script>";
            break;
        case 'email_check_failed':
            echo "<script>alert('Không thể kiểm tra email trùng!');</script>";
            break;
        default:
            echo "<script>alert('Có lỗi xảy ra!');</script>";
            break;
    }
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
        <div class="dash-body" style="margin-top: 30px">
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
                            <div class="mb-3" style="padding-bottom: 10px;">
                                <label for="ho_ten" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="ho_ten" name="ho_ten"
                                    value="<?php echo htmlspecialchars($ho_ten); ?>" required>
                                <span class="text-danger" id="ho_ten_error"></span>
                                <!-- Thông báo lỗi -->
                            </div>
                            <div class="mb-3" style="padding-bottom: 10px;">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo htmlspecialchars($email); ?>" required>
                                <span class="text-danger" id="email_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <div class="mb-3" style="padding-bottom: 10px;">
                                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai"
                                    value="<?php echo htmlspecialchars($so_dien_thoai); ?>" required>
                                <span class="text-danger" id="so_dien_thoai_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <div class="mb-3" style="padding-bottom: 10px;">
                                <label for="dia_chi" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                    value="<?php echo htmlspecialchars($dia_chi); ?>" required>
                                <span class="text-danger" id="dia_chi_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <div class="mb-3" style="padding-bottom: 10px;">
                                <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh"
                                    value="<?php echo htmlspecialchars($ngay_sinh); ?>" required>
                                <span class="text-danger" id="ngay_sinh_error"></span> <!-- Thông báo lỗi -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Lưu thay
                                    đổi</button>
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