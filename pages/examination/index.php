<?php
    if (isset($_POST["btThem"])) {
        $id_benh_nhan = $_POST["id_benh_nhan"];
        $ngay_kham = $_POST["ngay_kham"];
        $chuan_doan = $_POST["chuan_doan"];
        $mo_ta = $_POST["mo_ta"];
        $thuoc = $_POST["thuoc"];
        $so_luong = $_POST["so_luong"];
        $ghi_chu = $_POST["ghi_chu"];
        $ngay = $_POST["ngay"];
        $id_ho_so_benh_an = $_POST["id_ho_so_benh_an"];
    
        $object = new manage();
    
        // Thêm hồ sơ bệnh án
        $id_ho_so_benh_an = $object->themHoSoBenhAn($chuan_doan, $mo_ta, $ngay_kham, $id_benh_nhan);
    
        if ($id_ho_so_benh_an) {
            foreach ($thuoc as $id_thuoc => $data) {
                if (isset($data["selected"])) {
                    $so_luong = $data["so_luong"];
                    $cach_dung = $data["cach_dung"];
                    $object->themDonThuoc('$so_luong', '$ghi_chu', '$id_benh_nhan', '$ngay', '$id_ho_so_benh_an');
                }
            }
            echo "Thêm hồ sơ và đơn thuốc thành công.";
        } else {
            echo "Thêm thất bại.";
        }
    }
     
?>