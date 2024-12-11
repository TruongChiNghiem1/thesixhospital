<?php
// Code by ThanhTong(2T)
include_once("../config/connect.php");

class mInfoNhanVien{
    public function selectNhanVienById($id_nhan_vien){
        $p = new connect();
        $conn = $p->connectDB();
        if($conn){
            $query = "SELECT * FROM nhan_vien WHERE id_nhan_vien = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_nhan_vien);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result->fetch_assoc();
        }else{
            return null;
        }
    }
}

?>