<?php
// Code by ThanhTong(2T)
include_once("../config/connect.php");

class InforUser
{

    public function selecthosobenhan(){
        $p = new connect();
        $conn = $p->connectDB();
        if ($conn) {
            $query = "SELECT * FROM ho_so_benh_an";
            $result = mysqli_query($conn, $query);
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }
    public function selectInfomationUser()
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM benh_nhan 
                  INNER JOIN ho_so_benh_an ON benh_nhan.id_benh_nhan = ho_so_benh_an.id_benh_nhan
                  INNER JOIN thuc_don_dinh_duong ON ho_so_benh_an.id_ho_so_benh_an = thuc_don_dinh_duong.id_ho_so_benh_an";
            $result = mysqli_query($conn, $query);
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function selectUserById($id_benh_nhan)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM benh_nhan WHERE id_benh_nhan = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_benh_nhan);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateUser($id_benh_nhan, $ma_thuc_don)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "UPDATE thuc_don_dinh_duong 
                  INNER JOIN ho_so_benh_an ON thuc_don_dinh_duong.id_ho_so_benh_an = ho_so_benh_an.id_ho_so_benh_an
                  INNER JOIN benh_nhan ON ho_so_benh_an.id_benh_nhan = benh_nhan.id_benh_nhan
                  SET thuc_don_dinh_duong.ma_thuc_don = ?
                  WHERE benh_nhan.id_benh_nhan = ?";

            $stmt = $conn->prepare($query);

            $stmt->bind_param("si", $ma_thuc_don, $id_benh_nhan);

            $result = $stmt->execute();
            $stmt->close();
            $p->closeDB($conn);

            return $result;
        } else {
            return null;
        }
    }


    public function deleteUser($id_thuc_don_dinh_duong)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "DELETE FROM thuc_don_dinh_duong WHERE id_thuc_don_dinh_duong = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_thuc_don_dinh_duong);
            $result = $stmt->execute();

            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function addMaThucDonForUser($id_benh_nhan, $ma_thuc_don)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "INSERT INTO thuc_don_dinh_duong (id_ho_so_benh_an, ma_thuc_don) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $id_benh_nhan, $ma_thuc_don);
            $result = $stmt->execute();
            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function addUser($id_benh_nhan, $ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $sdt, $email)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "INSERT INTO benh_nhan (id_benh_nhan, ho_ten, ngay_sinh, gioi_tinh, dia_chi, sdt, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("isssssi", $id_benh_nhan, $ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $sdt, $email);
            $result = $stmt->execute();
            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }


    public function addThucDonDinhDuong($ma_thuc_don, $ngay_an, $buoi_an, $id_ho_so_benh_an, $id_nhan_vien)
{
    $p = new connect();
    $conn = $p->connectDB();

    if ($conn) {
        $query = "INSERT INTO thuc_don_dinh_duong (ngay_an, buoi_an, id_ho_so_benh_an, ma_thuc_don)
                  VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("ssis", $ngay_an, $buoi_an, $id_ho_so_benh_an, $ma_thuc_don);


        $result = $stmt->execute();

        $stmt->close();
        $p->closeDB($conn);

        return $result; 
    } else {
        return null;
    }
}

    


    public function selectMedicalRecords($id_benh_nhan)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM ho_so_benh_an WHERE id_benh_nhan = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_benh_nhan);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result;
        } else {
            return null;
        }
    }

    public function addHoSoBenhAn($ma_ho_so_benh_an, $mota, $chuan_doan, $ngay_kham, $di_ung, $id_benh_nhan)
{
    $p = new connect();
    $conn = $p->connectDB();

    if ($conn) {
        $query = "INSERT INTO ho_so_benh_an (ma_ho_so_benh_an, mo_ta, chuan_doan, ngay_kham, di_ung, id_benh_nhan)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $ma_ho_so_benh_an, $mota, $chuan_doan, $ngay_kham, $di_ung, $id_benh_nhan);
        $result = $stmt->execute();
        $stmt->close();
        $p->closeDB($conn);

        return $result;
    } else {
        return null; 
    }
}

    public function getHoSoBenhAnById($id_ho_so_benh_an)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM ho_so_benh_an WHERE id_ho_so_benh_an = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_ho_so_benh_an);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getBenhNhanById($id_benh_nhan)
    {
        $p = new connect();
        $conn = $p->connectDB();

        if ($conn) {
            $query = "SELECT * FROM benh_nhan WHERE id_benh_nhan = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_benh_nhan);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $p->closeDB($conn);
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

}
?>