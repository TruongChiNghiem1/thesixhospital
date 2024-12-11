<?php 

include_once("../model/mDonXinNghi.php");

class CDonXinNghi {
    public function selectDonXinNghi() {
        $mDonXinNghi = new DonXinNghi();
        return $mDonXinNghi->selectDonXinNghi();
    }

    public function selectDonXinNghiById($id_don_xin_nghi) {
        $mDonXinNghi = new DonXinNghi();
        return $mDonXinNghi->selectDonXinNghiById($id_don_xin_nghi);
    }

    public function insertDonXinNghi($id_nhan_vien, $ngay_nghi, $ly_do, $trang_thai = 3) {
        $mDonXinNghi = new DonXinNghi();
        return $mDonXinNghi->insertDonXinNghi($id_nhan_vien, $ngay_nghi, $ly_do, $trang_thai);
    }
}

?>