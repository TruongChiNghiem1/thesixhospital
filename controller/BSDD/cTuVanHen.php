<?php
// Code by ThanhTong(2T)
include_once "../model/tuvanhen.php";

class cTuVanHen {
    public function validateDates($fromDate, $toDate) {
        if ($fromDate && !strtotime($fromDate)) {
            return "Ngày bắt đầu không hợp lệ.";
        }
    
        if ($toDate && !strtotime($toDate)) {
            return "Ngày kết thúc không hợp lệ.";
        }
    
        return null;
    }
    
    public function select($fromDate = null, $toDate = null) {
        $error = $this->validateDates($fromDate, $toDate);
        if ($error) {
            return $error;
        }
    
        $mTuVanHen = new modelTuVanHen();
        $data = $mTuVanHen->selectLichHen($fromDate, $toDate);
    
        if ($data === null || mysqli_num_rows($data) == 0) {
            return "Không có dữ liệu lịch hẹn trong phạm vi này.";
        }
    
        return $data;
    }

    public function insert($idBenhNhan, $ngayGio, $ghiChu) {
        $mTuVanHen = new modelTuVanHen();
        $result = $mTuVanHen->insertLichHen($idBenhNhan, $ngayGio, $ghiChu);
    
        if ($result === null) {
            return "Có lỗi xảy ra khi thêm lịch hẹn.";
        }
    
        return "Thêm lịch hẹn thành công.";
    }


    public function delete($id) {
        $mTuVanHen = new modelTuVanHen();
        $result = $mTuVanHen->deleteLichHen($id);
    
        if ($result === null) {
            return "Có lỗi xảy ra khi xóa lịch hẹn.";
        }
    
        return "Xóa lịch hẹn thành công.";
    }

    public function update($id, $trangThai) {
        $mTuVanHen = new modelTuVanHen();
        
        $result = $mTuVanHen->updateLichHen($id, $trangThai);
       
        if ($result === false) {
            return "Có lỗi xảy ra khi cập nhật lịch hẹn.";
        }
        
        return "Cập nhật lịch hẹn thành công.";
    }
    
    
}
?>
