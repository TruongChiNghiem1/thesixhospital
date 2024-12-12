<?php
include '../../config/connect.php';
include '../../model/adminService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lich_id = $_POST['lich_id'];
    $doctor_id = $_POST['doctor_id'];
    $status = $_POST['status'];

    // Cập nhật bác sĩ và trạng thái lịch hẹn
    $conn = (new connect())->connectDB();
    $stmt = mysqli_prepare($conn, "UPDATE lich_hen SET id_nhan_vien = ? WHERE id_lich_hen = ?");
    mysqli_stmt_bind_param($stmt, "iii", $doctor_id, $lich_id);
    mysqli_stmt_execute($stmt);

    // Chuyển hướng về danh sách lịch
    header("Location: /thesixhospital/adminIndex.php?m=services&a=list-calendar");
    exit();
}
?>
