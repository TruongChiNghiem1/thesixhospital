<?php
function index() {
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "SELECT * FROM dich_vu ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    return $services;
}

function get_service_by_id($id) {
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "SELECT * FROM dich_vu WHERE id_dich_vu = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function indexExId($id) {
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "SELECT * FROM dich_vu WHERE id_dich_vu != ? ORDER BY created_at DESC LIMIT 4");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    return $services;
}
function getDoctors() {
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "SELECT id, ho_ten, loai_nhan_vien FROM nhan_vien WHERE loai_nhan_vien IN (2, 3, 4)";
    $result = mysqli_query($conn, $query);

    $doctors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
    return $doctors;
}