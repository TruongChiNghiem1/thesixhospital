<?php
require('../model/classdatabase.php');

if (isset($_POST["btThemDonThuoc"])) {
    $id_ho_so_benh_an = $_POST["id_ho_so_benh_an"];
    $id_benh_nhan = $_POST["id_benh_nhan"];
    $id_thuoc = $_POST['id_thuoc'];
    $ngay = date("Y-m-d");
    $ghi_chu = $_POST['ghi_chu'];
    $object = new manage();

    foreach ($_POST["ten_thuoc"] as $key => $id_thuoc) {
        $so_luong = $_POST["so_luong"][$key];
        $cach_dung = $_POST["ghi_chu"][$key];
        $ghi_chu = "Cách dùng: $cach_dung"; 

        if ($object->themDonThuoc($so_luong, $id_thuoc, $ghi_chu, $id_benh_nhan, $ngay, $id_ho_so_benh_an)) {
            echo "<script>alert('Kê đơn thuốc thành công');</script>";
        } else {
            echo "<script>alert('Kê đơn thuốc không thành công');</script>";
        }
    }
}
?>
