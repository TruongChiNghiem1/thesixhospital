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

    // Kiểm tra mật khẩu xác nhận
    if ($password != $confirm_password) {
        echo '<script type="text/javascript">alert("Không khớp mật khẩu!");</script>';
    } else {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $email_check_query = "SELECT * FROM nhan_vien WHERE email = ?";
        $stmt = mysqli_prepare($conn, $email_check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo '<script type="text/javascript">alert("Email này đã được sử dụng!");</script>';
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
                // Hiển thị thông báo thành công trước khi chuyển hướng
                echo '<script type="text/javascript">
                alert("Đăng ký thành công!");
                setTimeout(function(){
                    window.location.href = "/thesixhospital/login.php";
                }, 1000); // Chuyển hướng sau 3 giây
              </script>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Đăng ký</title>
    <style>
    .container {
        animation: transitionIn-X 0.5s;
    }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-3 shadow-sm" style="max-width: 500px; width: 100%; padding: 20px;">
            <h2 class="text-center mb-3">Đăng ký</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="ho_ten" class="form-label">Họ và tên</label>
                    <input type="text" name="ho_ten" class="form-control form-control-sm" placeholder="Nhập họ và tên"
                        required>
                    <span class="text-danger" id="ho_ten_error" style="display: none;"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Nhập Email"
                        required>
                    <span class="text-danger" id="email_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                    <input type="tel" name="so_dien_thoai" class="form-control form-control-sm"
                        placeholder="ex:0712345678" pattern="[0]{1}[0-9]{9}" required>
                    <span class="text-danger" id="so_dien_thoai_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" name="dia_chi" class="form-control form-control-sm" placeholder="Nhập địa chỉ"
                        required>
                    <span class="text-danger" id="dia_chi_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                    <input type="date" name="ngay_sinh" class="form-control form-control-sm" required>
                    <span class="text-danger" id="ngay_sinh_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Tạo mật khẩu</label>
                    <input type="password" name="password" class="form-control form-control-sm"
                        placeholder="Nhập mật khẩu" required>
                    <span class="text-danger" id="password_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" name="confirm_password" class="form-control form-control-sm"
                        placeholder="Xác nhận mật khẩu" required>
                    <span class="text-danger" id="confirm_password_error"></span> <!-- Thông báo lỗi -->
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-danger w-100 btn-sm">Đăng ký</button>
                </div>

                <div class="text-center mt-3">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="login.php" class="text-primary text-decoration-none">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
    <script src="/thesixhospital/assets/js/signup.js"></script>
</body>

</html>