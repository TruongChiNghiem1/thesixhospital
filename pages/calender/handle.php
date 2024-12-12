<?php
    if(isset($_POST["btnUpdate"]))
    {
        $chuan_doan = $_POST["chuan_doan"];
        $mo_ta = $_POST["mo_ta"];
        $ngay_kham = $_POST["ngay_kham"];
        $id_benh_nhan = $_POST["id_benh_nhan"];
        $object = new manage();
        if($object->themHoSoBenhAn( $chuan_doan, $mo_ta, $ngay_kham, $id_benh_nhan)) {
            echo "<script>alert('THÊM THÀNH CÔNG')</script>";
        }
        else
        {
            echo "<script>alert('THÊM KHÔNG THÀNH CÔNG')</script>";
        }
    }
    
    
?>
