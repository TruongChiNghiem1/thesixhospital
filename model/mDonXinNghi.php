<?php
session_start();
include_once("../config/connect.php");

class DonXinNghi {
    public function selectDonXinNghi() {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $query = "SELECT * FROM don_xin_nghi
            INNER JOIN nhan_vien ON don_xin_nghi.id_nhan_vien = nhan_vien.id
            WHERE don_xin_nghi.id_nhan_vien = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function selectDonXinNghiById($id_don_xin_nghi) {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $query = "SELECT * FROM don_xin_nghi WHERE id_don_xin_nghi = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_don_xin_nghi);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function insertDonXinNghi($id_nhan_vien, $ngay_nghi, $ly_do, $trang_thai = 3) {
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $query = "INSERT INTO don_xin_nghi (id_nhan_vien, ngay_nghi, ly_do_nghi, trang_thai) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                die("Chuẩn bị câu lệnh thất bại: " . $conn->error);
            }
            $stmt->bind_param("issi", $id_nhan_vien, $ngay_nghi, $ly_do, $trang_thai);
            if (!$stmt->execute()) {
                die("Thực thi câu lệnh thất bại: " . $stmt->error);
            }
            $stmt->close();
            $p->closeDB($conn);
            return true;
        } else {
            die("Kết nối cơ sở dữ liệu thất bại.");
        }
    }
    
}
?>
