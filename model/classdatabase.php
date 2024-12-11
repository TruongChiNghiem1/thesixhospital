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

    public function themDonThuoc($so_luong,$ghi_chu,$id_benh_nhan,$ngay,$id_ho_so_benh_an)
    {
        $sql = "insert into don_thuoc(so_luong, ghi_chu, id_benh_nhan, ngay, id_ho_so_benh_an) values('$so_luong', '$ghi_chu', '$id_benh_nhan', '$ngay', '$id_ho_so_benh_an')";
        return $this->adddata($sql);
    }    

    public function xoaHSBA($id)
    {
        $sql = "delete from ho_so_benh_an where id_ho_so_benh_an='$id'";
        return $this->deletedata($sql);
    }

    

}



?>