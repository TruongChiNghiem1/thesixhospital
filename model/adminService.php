<?php
function delete($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM dich_vu WHERE id_dich_vu = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function get_service_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu WHERE id_dich_vu = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function update_service($id, $data) {
    global $conn;
    $stmt = $conn->prepare("UPDATE dich_vu SET ten_dich_vu = :ten_dich_vu, gia_goc = :gia_goc, gia_giam = :gia_giam, chi_tiet = :chi_tiet, mo_ta = :mo_ta, hinh_anh = :hinh_anh WHERE id_dich_vu = :id");
    $stmt->bindParam(':ten_dich_vu', $data["ten_dich_vu"]);
    $stmt->bindParam(':gia_goc', $data["gia_goc"]);
    $stmt->bindParam(':gia_giam', $data["gia_giam"]);
    $stmt->bindParam(':chi_tiet', $data["chi_tiet"]);
    $stmt->bindParam(':mo_ta', $data["mo_ta"]);
    $stmt->bindParam(':hinh_anh', $data["hinh_anh"]);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function duplicate_service($name) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu WHERE ten_dich_vu = :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() === 0; // Trả về true nếu không trùng lặp
}

function create_service($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO dich_vu (ten_dich_vu, gia_goc, gia_giam, chi_tiet, mo_ta, created_at, hinh_anh) VALUES (:ten_dich_vu, :gia_goc, :gia_giam, :chi_tiet, :mo_ta, :created_at, :hinh_anh)");
    $stmt->bindParam(':ten_dich_vu', $data["ten_dich_vu"]);
    $stmt->bindParam(':gia_goc', $data["gia_goc"]);
    $stmt->bindParam(':gia_giam', $data["gia_giam"]);
    $stmt->bindParam(':chi_tiet', $data["chi_tiet"]);
    $stmt->bindParam(':mo_ta', $data["mo_ta"]);
    $stmt->bindParam(':created_at', $data["created_at"]);
    $stmt->bindParam(':hinh_anh', $data["hinh_anh"]);
    $stmt->execute();
}

function getListCalendar() {
    global $conn;
    $query = "
        SELECT 
            lh.id_lich_hen,
            bn.ten_benh_nhan,
            bn.so_dien_thoai,
            dv.ten_dich_vu,
            dv.gia_goc,
            lh.ngay_gio,
            nv.ho_ten AS bac_si,
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

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>