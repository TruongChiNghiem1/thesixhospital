<?php
// Code by ThanhTong(2T)
include_once("../config/connect.php");

class NhanVien
{
    public function selectNhanVien()
    {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $sql = "SELECT * FROM nhan_vien";
            $result = mysqli_query($conn, $sql);
            $p->closeDB($conn);
            return $result;
        } else {
            return false;
        }
    }

    public function selectNhanVienById($id)
    {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $sql = "SELECT * FROM nhan_vien WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $p->closeDB($conn);
            return $result;
        } else {
            return false;
        }
    }
}

?>
