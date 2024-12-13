<?php
class manage extends doctor
{
    public function selectBenhNhan($id='')
    {
        if($id)
            $sql="select * from benhnhan bn join ho_so_benh_an hs on bn.id_benhnhan = hs.id_benhnhan where id_benhnhan='$id'";
        else
            $sql="select * from benhnhan";
        return $this->getdata($sql);
    }

    public function listBenhNhan($id='')
    {
        if($id)
            $sql = "select *  from benh_nhan where id_benh_nhan = '$id'";
        return $this->getdata($sql);
    }

    public function hoSoBenhAn($id=''){
        if($id){
            $sql = " select * from benh_nhan bn left join ho_so_benh_an hs on bn.id_benh_nhan = hs.id_benh_nhan where id_ho_so_benh_an = '$id'";
            return $this->getdata($sql);
        }
    }
    
    public function themHoSoBenhAn( $chuan_doan, $mo_ta, $ngay_kham, $id_benh_nhan)
    {
        $sql = "insert into ho_so_benh_an (chuan_doan, mo_ta, ngay_kham,id_benh_nhan) VALUES ('$chuan_doan','$mo_ta','$ngay_kham','$id_benh_nhan')";
        return $this->adddata($sql);
    }

    public function themDonThuoc($so_luong, $id_thuoc,$ghi_chu,$id_benh_nhan,$ngay,$id_ho_so_benh_an)
    {
        $sql = "insert into don_thuoc(so_luong, id_thuoc, cach_dung, id_benh_nhan, ngay, id_ho_so_benh_an) values('$so_luong', $id_thuoc, '$ghi_chu', '$id_benh_nhan', '$ngay', '$id_ho_so_benh_an')";
        return $this->adddata($sql);
    }    

    public function xoaHSBA($id)
    {
        $sql = "delete from ho_so_benh_an where id_ho_so_benh_an='$id'";
        return $this->deletedata($sql);
    }

    public function selectLich(){
        $sql = "select * from lich_hen lh inner join benh_nhan bn on lh.id_benh_nhan = bn.id_benh_nhan where id_nhan_vien = '3' order by ngay_gio desc limit 20";
        return $this->getdata($sql);
    }
    
    public function detailLich($id=''){
        $sql = "select * from lich_hen lh inner join benh_nhan bn on lh.id_benh_nhan = bn.id_benh_nhan where id_lich_hen = '$id'";
        return $this->getdata($sql);
    }

    public function updateLich($id='',$ngay_gio, $ten_benh_nhan, $trang_thai, $ghiChu){
        $sql = "update lich_hen inner join benh_nhan on lich_hen.id_benh_nhan = benh_nhan.id_benh_nhan set ngay_gio = '$ngay_gio', ten_benh_nhan = '$ten_benh_nhan', trang_thai = '$trang_thai', ghiChu = '$ghiChu' where id_lich_hen = '$id'";
        return $this->updatedata($sql);
    }

    public function searchBenhNhan($id=''){
        $sql = "select * from benh_nhan where so_dien_thoai like '%$id%' or ten_benh_nhan like '%$id%' or email like '%$id%'";
        return $this->getdata($sql);
    }

   
        public function themLichHen($id_benh_nhan, $ngay_gio, $trang_thai, $ghiChu, $loai_lich_dat) {
            $sql = "INSERT INTO lich_hen (id_benh_nhan, ngay_gio, trang_thai, ghiChu, loai_lich_dat) VALUES ('$id_benh_nhan', '$ngay_gio', '$trang_thai','ghiChu', '$loai_lich_dat')";
            return $this->adddata($sql);
        }
    }
    




?>