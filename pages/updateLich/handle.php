<?php

$obj = new manage();

if (isset($_POST["btSua"])) {
    $ngay_gio = $_POST["ngay_gio"];
    $trang_thai = $_POST["trang_thai"];
    $ten_benh_nhan = $_POST["ten_benh_nhan"];
    $ghi_chu = $_POST["ghi_chu"];

    $result = $obj->updateLich($cate, $ngay_gio, $ten_benh_nhan, $trang_thai, $ghi_chu);
    if ($result) {
        echo '<script>alert("Cập nhật thành công");</script>';
    } else {
        echo '<script>alert("Cập nhật thất bại");</script>';
    }
}
?>
