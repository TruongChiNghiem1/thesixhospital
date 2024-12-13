<?php
if (isset($_POST["btThemLichHen"])) {
    $id_benh_nhan = $_POST["id_benh_nhan"];
    $ngay_gio = $_POST["ngay_gio"];
    $trang_thai = $_POST["trang_thai"];
    $ghiChu = $_POST["ghi_chu"];
    $loai_lich_dat = $_POST["loai_lich_dat"];

    $obj = new manage();
    $result = $obj->themLichHen($id_benh_nhan, $ngay_gio, $trang_thai, $ghiChu, $loai_lich_dat);
    if ($result) {
        echo "<script>alert('Thêm lịch hẹn thành công!');</script>";
    } else {
        echo "<script>alert('Thêm lịch hẹn không thành công!');</script>";
    }
}
?>
