<?php
// Code by ThanhTong(2T)

include_once "../model/mInfoNhanVien.php";

if (!file_exists("../model/mInfoNhanVien.php")) {
    die("File mInfoNhanVien không tồn tại.");
}

class BSDD {
    public function getNhanVienById($id) {
        $model = new mInfoNhanVien();
        return $model->selectNhanVienById($id);
    }
}

?>