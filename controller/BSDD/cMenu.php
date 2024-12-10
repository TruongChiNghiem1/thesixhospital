<?php
// Code by ThanhTong(2T)
    include_once "../model/mMenu.php";


    class MenuBS{

       public function selectMenu(){
            $mMenu = new modalMenu();
            $result = $mMenu->selectMenu();
            return $result;
        }
        
        public function insertMenu($maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon, $ghiChu){
            $mMenu = new modalMenu();
            $result = $mMenu->insertMenu($maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon, $ghiChu);
            return $result;
        }

        public function updateMenu($id, $maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon, $ghiChu){
            $mMenu = new modalMenu();
            $result = $mMenu->updateMenu($id, $maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon, $ghiChu);
            return $result;
        }
        
        public function deleteMenu($id){
            $mMenu = new modalMenu();
            $result = $mMenu->deleteMenu($id);
            return $result;
        }

        public function selectMenuById($id){
            $mMenu = new modalMenu();
            $result = $mMenu->selectMenuById($id);
            return $result;
        }
    }
?>