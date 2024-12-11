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
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gioi_tinh = $_POST['gioi_tinh']; // Nhận giới tính

    // Kiểm tra mật khẩu xác nhận
    if ($password != $confirm_password) {
        echo "Mật khẩu và mật khẩu xác nhận không khớp.";
    } else {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $email_check_query = "SELECT * FROM nhan_vien WHERE email = ?";
        $stmt = mysqli_prepare($conn, $email_check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "Email này đã tồn tại. Vui lòng chọn email khác.";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $created_at = date('Y-m-d H:i:s'); // Ngày tạo

            // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng nhan_vien
            $sql = "INSERT INTO nhan_vien (username, ho_ten, password, email, so_dien_thoai, dia_chi, ngay_sinh, gioi_tinh, created_at, loai_nhan_vien)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '5')";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssis", $email, $ho_ten, $password_hash, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $gioi_tinh, $created_at);

            // Thực thi câu lệnh
            if (mysqli_stmt_execute($stmt)) {
                echo "Đăng ký thành công!";
                header('Location: /thesixhospital/login.php');
                exit(); // Thêm exit để ngăn chặn việc thực thi thêm mã sau khi chuyển hướng
            } else {
                echo "Lỗi: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="/thesixhospital/assets/css/dataTables.bootstrap5.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/thesixhospital/assets/css/bootstrap.min.css"/>
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
                        <label for="ho_ten" class="form-label">Họ và tên: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="ho_ten" class="input-text" placeholder="Nhập họ và tên" required>
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
                        <input type="tel" name="so_dien_thoai" class="input-text" placeholder="ex:0712345678" pattern="[0]{1}[0-9]{9}" required>
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
                        <label for="gioi_tinh" class="form-label">Giới tính: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <select name="gioi_tinh" class="input-text" required>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="0">Khác</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="label-td" colspan="2">
                        <label for="password" class="form-label">Tạo mật khẩu: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="password" class="input-text" placeholder="Nhập mật khẩu" required>
                    </td>
                </tr>

                <tr>
                    <td class="label-td" colspan="2">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="confirm_password" class="input-text" placeholder="Xác nhận mật khẩu" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="btn-submit">Đăng ký</button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</center>
</body>
<script src="/thesixhospital/assets/js/jquery-3.7.1.js"></script>
<script src="/thesixhospital/assets/js/sweetalert2@11.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="/thesixhospital/assets/js/bootstrap.min.js"></script>
</html>
