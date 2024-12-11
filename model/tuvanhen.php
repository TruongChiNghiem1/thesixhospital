<?php
// Code by ThanhTong(2T)

session_start();
include_once("../config/connect.php");

class modelTuVanHen
{
    public function selectLichHen($fromDate = null, $toDate = null)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM lich_hen 
                      INNER JOIN benh_nhan ON lich_hen.id_benh_nhan = benh_nhan.id_benh_nhan
                      WHERE loai_lich_hen = 2 AND id_nhan_vien = " . $_SESSION['id'];

            if ($fromDate && $toDate) {
                $query .= " AND DATE(lich_hen.ngay_gio) BETWEEN '$fromDate' AND '$toDate'";
            }

            $result = mysqli_query($conn, $query);
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }


    public function insertLichHen($idBenhNhan, $ngayGio, $ghiChu)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "INSERT INTO lich_hen (id_benh_nhan, ngay_gio, ghiChu, loai_lich_hen) 
                      VALUES ('$idBenhNhan', '$ngayGio', '$ghiChu', 2)";
            $result = mysqli_query($conn, $query);
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function deleteLichHen($id)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "DELETE FROM lich_hen WHERE id_lich_hen = $id";
            $result = mysqli_query($conn, $query);
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }
    public function updateLichHen($id, $trangThai) {
        $p = new connect();
        $conn = $p->connectDB();

        $sql = "UPDATE lich_hen SET trang_thai = ? WHERE id_lich_hen = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("si", $trangThai, $id);
            $result = $stmt->execute();
            $stmt->close();
        } else {
            return false;
        }
     
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>