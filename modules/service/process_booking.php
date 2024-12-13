<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    $id_dich_vu = $_POST['id_dich_vu'];

    $date_time = $date . ' ' . ($time === 'morning' ? '08:00:00' : '14:00:00');

    $patient_id = $_SESSION['id'] ?? null;

    if (isset($patient_id)) {
        $conn = (new connect())->connectDB();

        $stmt = mysqli_prepare($conn,"INSERT INTO lich_hen (ngay_gio, loai_lich_hen, trang_thai, id_benh_nhan, ghichu, id_nhan_vien, id_dich_vu) VALUES (?, 1, 1, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssi", $date_time, $patient_id, $notes, $doctor_id, $id_dich_vu);

        if (mysqli_stmt_execute($stmt)) {
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
?>
