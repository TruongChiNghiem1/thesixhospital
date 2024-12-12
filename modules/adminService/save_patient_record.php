<?php
include '../../config/connect.php';
include '../../model/adminService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lich_id = $_POST['lich_id'];
    $description = $_POST['description'];
    $diagnosis = $_POST['diagnosis'];

    // Lưu hồ sơ bệnh án
    $conn = (new connect())->connectDB();
    $stmt = mysqli_prepare($conn, "INSERT INTO ho_so_benh_an (ma_ho_so_benh_an, mo_ta, chuan_doan, id_benh_nhan) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssi", $ma_ho_so, $description, $diagnosis, $benh_nhan_id);
    mysqli_stmt_execute($stmt);

    // Cập nhật trạng thái lịch hẹn thành đã khám
    $update_stmt = mysqli_prepare($conn, "UPDATE lich_hen SET trang_thai = 3 WHERE id_lich_hen = ?");
    mysqli_stmt_bind_param($update_stmt, "i", $lich_id);
    mysqli_stmt_execute($update_stmt);

    // Chuyển hướng về danh sách lịch
    header("Location: /thesixhospital/adminIndex.php?m=services&a=list-calendar");
    exit();
}
?>
