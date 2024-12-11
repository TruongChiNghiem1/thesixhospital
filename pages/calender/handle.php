<?php
require('../../model/classdatabase.php'); // Đảm bảo đúng đường dẫn

if (isset($_POST["btThemLichHen"])) {
    $ngay_gio = $_POST["ngay_gio"];
    $loai_lich_hen = $_POST["loai_lich_hen"];
    $trang_thai = $_POST["trang_thai"];
    $id_benh_nhan = $_POST["id_benh_nhan"];
    $id_nhan_vien = $_POST["id_nhan_vien"];
    $loai_lich_dat = $_POST["loai_lich_dat"];
    $ghi_chu = $_POST["ghi_chu"];

    $object = new manage();

    // Thêm lịch hẹn vào cơ sở dữ liệu
    $sql_them_lich_hen = "INSERT INTO lich_hen (ngay_gio, loai_lich_hen, trang_thai, id_benh_nhan, id_nhan_vien, loai_lich_dat, ghiChu) VALUES ('$ngay_gio', '$loai_lich_hen', '$trang_thai', '$id_benh_nhan', '$id_nhan_vien', '$loai_lich_dat', '$ghi_chu')";
    if ($object->adddata($sql_them_lich_hen)) {
        echo "<script>alert('Thêm lịch hẹn thành công');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Thêm lịch hẹn không thành công');</script>";
    }
}
?>
