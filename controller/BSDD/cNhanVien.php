<?php
// Code by ThanhTong(2T)
    include_once "../model/mNhanVien.php";

    class NhanVienBS
    {
        public function selectNhanVien()
        {
            $nhanVien = new NhanVien();
            $data = $nhanVien->selectNhanVien();
            return $data;
        }

        public function selectNhanVienById($id)
        {
            $nhanVien = new NhanVien();
            $data = $nhanVien->selectNhanVienById($id);
            return $data;
        }
    }
    
?>