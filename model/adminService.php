<?php

function index()
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "SELECT * FROM dich_vu ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    return $services;
}

function delete($id)
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "DELETE FROM dich_vu WHERE id_dich_vu = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function get_service_by_id($id)
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "SELECT * FROM dich_vu WHERE id_dich_vu = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function update_service($id, $data)
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "UPDATE dich_vu SET ten_dich_vu = ?, gia_goc = ?, gia_giam = ?, chi_tiet = ?, mo_ta = ?, hinh_anh = ? WHERE id_dich_vu = ?");
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssi",
        $data["ten_dich_vu"],
        $data["gia_goc"],
        $data["gia_giam"],
        $data["chi_tiet"],
        $data["mo_ta"],
        $data["hinh_anh"],
        $id
    );
    mysqli_stmt_execute($stmt);
}

function duplicate_service($name)
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "SELECT * FROM dich_vu WHERE ten_dich_vu = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) === 0; // Trả về true nếu không trùng lặp
}

function create_service($data)
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $stmt = mysqli_prepare($conn, "INSERT INTO dich_vu (ten_dich_vu, gia_goc, gia_giam, chi_tiet, mo_ta, created_at, hinh_anh) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param(
        $stmt,
        "sssssss",
        $data["ten_dich_vu"],
        $data["gia_goc"],
        $data["gia_giam"],
        $data["chi_tiet"],
        $data["mo_ta"],
        $data["created_at"],
        $data["hinh_anh"]
    );
    mysqli_stmt_execute($stmt);
}

function getListCalendar()
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "
        SELECT 
            lh.id_lich_hen,
            bn.ten_benh_nhan,
            bn.so_dien_thoai,
            dv.ten_dich_vu,
            dv.gia_goc,
            lh.ngay_gio,
            nv.loai_nhan_vien,
            lh.trang_thai
        FROM 
            lich_hen lh
        LEFT JOIN 
            benh_nhan bn ON lh.id_benh_nhan = bn.id_benh_nhan
        LEFT JOIN 
            dich_vu dv ON lh.loai_lich_hen = dv.id_dich_vu
        LEFT JOIN 
            nhan_vien nv ON lh.id_nhan_vien = nv.id
        ORDER BY 
            lh.ngay_gio DESC
    ";

    $result = mysqli_query($conn, $query);
    $calendar = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $calendar[] = $row;
    }
    return $calendar;
}
function getListCalendar_BN()
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB

    // Lấy ID nhân viên từ session
    $id = $_SESSION['id'];

    // Truy vấn chỉ lấy lịch hẹn của nhân viên đăng nhập
    $query = "
        SELECT 
            lh.id_lich_hen,
            bn.ten_benh_nhan,
            bn.so_dien_thoai,
            dv.ten_dich_vu,
            dv.gia_goc,
            lh.ngay_gio,
            nv.loai_nhan_vien,
            lh.trang_thai
        FROM 
            lich_hen lh
        LEFT JOIN 
            benh_nhan bn ON lh.id_benh_nhan = bn.id_benh_nhan
        LEFT JOIN 
            dich_vu dv ON lh.loai_lich_hen = dv.id_dich_vu
        LEFT JOIN 
            nhan_vien nv ON lh.id_nhan_vien = nv.id
        WHERE 
            lh.id_nhan_vien = ? -- Chỉ lấy lịch hẹn của nhân viên đăng nhập
        ORDER BY 
            lh.ngay_gio DESC
    ";

    // Chuẩn bị truy vấn và gán tham số
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id); // Gán giá trị $id (kiểu số nguyên)
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Xử lý kết quả truy vấn
    $calendar = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $calendar[] = $row;
        }
    }

    // Đóng kết nối
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $calendar; // Trả về danh sách lịch hẹn của nhân viên
}
function getDoctors()
{
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "SELECT id, ho_ten, loai_nhan_vien FROM nhan_vien WHERE loai_nhan_vien IN (2, 3, 4)";
    $result = mysqli_query($conn, $query);

    $doctors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
    return $doctors;
}