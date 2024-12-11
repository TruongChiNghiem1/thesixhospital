<?php
// Code by ThanhTong(2T)
include_once("../model/InforUser.php");

class UserController {

    public function viewUser() {
        $inforUser = new InforUser();
        $result = $inforUser->selectInfomationUser();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function updateUser($id_benh_nhan, $maBenhNhan) {
        $inforUser = new InforUser();
        $result = $inforUser->updateUser($id_benh_nhan, $maBenhNhan);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Cập nhật thông tin người bệnh thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi cập nhật thông tin người bệnh."]);
        }
    }

    public function viewUserById($id_benh_nhan) {
        $inforUser = new InforUser();
        $result = $inforUser->selectUserById($id_benh_nhan);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    // public function addUser($ten_benh_nhan, $gioi_tinh, $ngay_sinh, $dia_chi, $sdt) {
    //     $inforUser = new InforUser();
    //     $result = $inforUser->addUser($ten_benh_nhan, $gioi_tinh, $ngay_sinh, $dia_chi, $sdt);

    //     if ($result) {

    //         return json_encode(["status" => "success", "message" => "Thêm người bệnh
    //         thành công."]);
    //     } else {
    //         return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi
    //         thêm người bệnh."]);
    //     }
    // }


    public function addMaThucDonForUser($id_benh_nhan, $ma_thuc_don) {
        $inforUser = new InforUser();
        $result = $inforUser->addMaThucDonForUser($id_benh_nhan, $ma_thuc_don);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Thêm mã thực đ
              ơn cho người bệnh thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi
              thêm mã thực đơn cho người bệnh."]);
        }
    }

    public function deleteUser($id_benh_nhan) {
        $inforUser = new InforUser();
        $result = $inforUser->deleteUser($id_benh_nhan);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Xóa người bệnh thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi xóa người bệnh."]);
        }
    }

    public function viewMedicalRecords($id_benh_nhan) {
        $inforUser = new InforUser();
        $result = $inforUser->selectMedicalRecords($id_benh_nhan);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function addUser($id_benh_nhan, $ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $sdt, $email) {
        $inforUser = new InforUser();
        $result = $inforUser->addUser($id_benh_nhan, $ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $sdt, $email);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Thêm người bệnh thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi thêm người bệnh."]);
        }
    }

    public function addThucDonDinhDuong( $ma_thuc_don, $ngay_an, $buoi_an, $id_nhan_vien, $id_benh_an) {
        $inforUser = new InforUser();
        $result = $inforUser->addThucDonDinhDuong( $ma_thuc_don, $ngay_an, $buoi_an, $id_nhan_vien, $id_benh_an);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Thêm thực đơn dinh dụng thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi thêm thực đơn dinh dụng."]);
        }
    }

    public function addHoSoBenhAn($ma_ho_so_benh_an, $mota, $chuan_doan, $ngay_kham, $di_ung, $id_benh_nhan) {
        $inforUser = new InforUser();
        $result = $inforUser->addHoSoBenhAn( $ma_ho_so_benh_an, $mota, $chuan_doan, $ngay_kham, $di_ung, $id_benh_nhan);

        if ($result) {
            return json_encode(["status" => "success", "message" => "Thêm hộ sở bệnh án thành công."]);
        } else {
            return json_encode(["status" => "error", "message" => "Có lỗi xảy ra khi thêm hộ sở bệnh án."]);
        }
    }

    public function viewHoSoBenhAnById($id_ho_so_benh_an) {
        $inforUser = new InforUser();
        $result = $inforUser->getHoSoBenhAnById($id_ho_so_benh_an);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
?>
