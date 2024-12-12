<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $doctor_id = $_POST['doctor_id'];

    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    $id_dich_vu = $_POST['id_dich_vu'];

    // Chuyển đổi thời gian thành định dạng datetime
    $date_time = $date . ' ' . ($time === 'morning' ? '08:00:00' : '14:00:00');

    // Lấy ID bệnh nhân từ session (giả sử đã lưu khi đăng nhập)
    $patient_id = $_SESSION['id'] ?? null;
    // Kiểm tra nếu bệnh nhân đã đăng nhập
    if (isset($patient_id)) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO lich_hen (ngay_gio, loai_lich_hen, trang_thai, id_benh_nhan, ghichu, id_nhan_vien, id_dich_vu) VALUES (:ngay_gio, 1, 1, :id_benh_nhan, :ghiChu, :id_nhan_vien, :id_dich_vu)");
        $stmt->bindParam(':ngay_gio', $date_time);
        $stmt->bindParam(':id_benh_nhan', $patient_id);
        $stmt->bindParam(':ghiChu', $notes);
        $stmt->bindParam(':id_nhan_vien', $doctor_id);
        $stmt->bindParam(':id_dich_vu', $id_dich_vu);

        if ($stmt->execute()) {
            echo "Đặt lịch thành công!";
            echo "<script type='text/javascript'>
                    window.location.href = '/thesixhospital/index.php?m=service&a=detail&id=$id_dich_vu&message=Đặt lịch thành công!';
                  </script>";
            exit();
        } else {
            echo "Có lỗi xảy ra, vui lòng thử lại.";
            echo "<script type='text/javascript'>
                    window.location.href = '/thesixhospital/index.php?m=service&a=detail&id=$id_dich_vu&message=Có lỗi xảy ra, vui lòng thử lại.';
                  </script>";
            exit();
        }
    } else {
        echo "Vui lòng đăng nhập trước khi đặt lịch.";
        header("location: /thesixhospital/login.php");
        exit();
    }
}