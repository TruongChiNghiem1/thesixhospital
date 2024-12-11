<?php
require_once 'config/connect.php'; // Bao gồm tệp kết nối

$database = new connect();
$conn = $database->connectDB();
// Kiểm tra kết nối
if (!isset($conn)) {
    die("Kết nối không được định nghĩa. Hãy kiểm tra tệp connect.php.");
}

// Hàm kiểm tra email đã tồn tại hay chưa
function isEmailExists($conn, $email) {
    $stmt = $conn->prepare("SELECT email FROM dangky WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $stmt->close();
        return true; // Email đã tồn tại
    } else {
        $stmt->close();
        return false; // Email chưa tồn tại
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $mat_khau = $_POST['mat_khau'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra email đã tồn tại hay chưa
    if (isEmailExists($conn, $email)) {
        echo "<script>alert('Email đã tồn tại!');</script>";
    } else {
        // Kiểm tra mật khẩu xác nhận
        if ($mat_khau !== $confirm_password) {
            echo "<script>alert('Mật khẩu không khớp!')</script>";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào DB
            $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);

            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare("INSERT INTO dangky (ho_ten, email, so_dien_thoai, dia_chi, ngay_sinh, mat_khau) VALUES (?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
            }

            // Gắn kết các tham số
            $stmt->bind_param("ssssss", $ho_ten, $email, $so_dien_thoai, $dia_chi, $ngay_sinh, $hashed_password);

            // Thực thi câu lệnh và kiểm tra kết quả
            if ($stmt->execute()) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }
}
// Đóng kết nối
$conn->close();
