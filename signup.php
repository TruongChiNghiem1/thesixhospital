<?php
require_once __DIR__ . '/config/connect.php'; // Đảm bảo đúng đường dẫn

$database = new connect();
$conn = $database->connectDB();

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công. Vui lòng kiểm tra lại tệp connect.php.");
}

// Hàm kiểm tra email đã tồn tại hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra mật khẩu xác nhận
    if ($password != $confirm_password) {
        echo "Mật khẩu và mật khẩu xác nhận không khớp.";
    } else {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $email_check_query = "SELECT * FROM nhan_vien WHERE email = '$email'";
        $result = $conn->query($email_check_query);
        if ($result->num_rows > 0) {
            echo "Email này đã tồn tại. Vui lòng chọn email khác.";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng nhan_vien
            $sql = "INSERT INTO nhan_vien (username, password, email, so_dien_thoai, dia_chi, ngay_sinh)
                    VALUES ('$username', '$password_hash', '$email', '$so_dien_thoai', '$dia_chi', '$ngay_sinh')";

            if ($conn->query($sql) === TRUE) {
                echo "Đăng ký thành công!";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/signup.css">
    <title>Đăng ký</title>
    <style>
    .container {
        animation: transitionIn-X 0.5s;
    }
    </style>
</head>

<body>
    <center>
        <div class="container">
            <table border="0" style="width: 69%;">
                <tr>
                    <td colspan="2">
                        <p class="header-text">Đăng ký</p>
                    </td>
                </tr>

                <form action="" method="POST">
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="username" class="form-label">Họ và tên: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="username" class="input-text" placeholder="Nhập họ và tên" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="email" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="email" name="email" class="input-text" placeholder="Nhập Email" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="tel" name="so_dien_thoai" class="input-text" placeholder="ex:0712345678"
                                pattern="[0]{1}[0-9]{9}">
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="dia_chi" class="form-label">Địa chỉ: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="dia_chi" class="input-text" placeholder="Nhập địa chỉ" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="ngay_sinh" class="form-label">Ngày sinh: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="ngay_sinh" class="input-text" required>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="password" class="form-label">Tạo mật khẩu: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="password" class="input-text" placeholder="Nhập mật khẩu"
                                required>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="confirm_password" class="form-label">Xác nhận mật khẩu: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="confirm_password" class="input-text"
                                placeholder="Nhập mật khẩu xác nhận" required>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Đăng ký" class="login-btn btn-primary btn">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <br>
                            <label for="" class="sub-text" style="font-weight: 280;">Bạn đã có tài khoản? </label>
                            <a href="/thesixhospital/login.php" class="hover-link1 non-style-link">Đăng nhập</a>
                            <br><br><br>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </center>
</body>

</html>