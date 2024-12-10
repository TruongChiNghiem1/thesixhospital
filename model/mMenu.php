<?php
// Code by ThanhTong(2T)
include_once("../config/connect.php");

class modalMenu
{
    public function selectMenu()
    {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $sql = "SELECT * FROM mon_an";
            $result = mysqli_query($conn, $sql);
            $p->closeDB($conn);
            return $result;
        } else {
            return false;
        }
    }

    public function insertMenu($maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao,$maThucDon, $ghiChu)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {

            $ngayTao = date('Y-m-d H:i:s');

            $sql = "INSERT INTO `mon_an` (`ma_mon_an`, `ten_mon_an`, `chi_so_dinh_duong`, `id_nguoi_tao`, `ngay_tao`,`ma_thuc_don`, `ghi_chu`) 
                        VALUES ('$maMonAn', '$tenMonAn', '$chiSoDinhDuong', '$idNguoiTao', '$ngayTao', '$maThucDon', '$ghiChu')";

            $result = mysqli_query($conn, $sql);


            $p->closeDB($conn);

            return $result;
        } else {
            return false;
        }
    }


    public function updateMenu($id, $maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao,$maThucDon, $ghiChu)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $sql = "UPDATE `mon_an` SET 
                        `ma_mon_an` = '$maMonAn',
                        `ten_mon_an` = '$tenMonAn',
                        `chi_so_dinh_duong` = '$chiSoDinhDuong',
                        `id_nguoi_tao` = '$idNguoiTao',
                        `ma_thuc_don` = '$maThucDon',
                        `ghi_chu` = '$ghiChu'
                        WHERE `id_mon_an` = $id";
            $result = mysqli_query($conn, $sql);
            $p->closeDB($conn);

            return $result;
        } else {
            return false;
        }
    }


    public function deleteMenu($id)
    {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $sql = "DELETE FROM mon_an WHERE id_mon_an = $id";
            $result = mysqli_query($conn, $sql);
            $p->closeDB($conn);
            return $result;
        } else {
            return false;
        }
    }

    public function selectMenuById($id)
    {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $sql = "SELECT * FROM mon_an WHERE id_mon_an = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $p->closeDB($conn);
            return $row;
        } else {
            return false;
        }
    }
}




?>