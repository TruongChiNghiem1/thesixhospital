<?php
    error_reporting(0);
    include_once("model/admin.php");
    include_once("../model/admin.php");
    
    class controllerAdmin{

        function selectInfomationBS(){
            $p = new modalAdmin();
            $result = $p->selectInfomationBS();
            return $result;
        }

        function selectIDInfomationBS($id){
            $p = new modalAdmin();
            $result = $p->selectIDInfomationBS($id);
            return $result;
        }

        function getNhanVienByPage($page, $limit){
            $p = new modalAdmin();
            $tblNhanVien = $p->selectNhanVienByPage($page, $limit);
            return $tblNhanVien;
        }

        public function getCountNhanVien() {
            $model = new modalAdmin();
            $count = $model->countNhanVien();
            return $count;
        }

        function getAllChucVu(){
            $p = new modalAdmin();
            $tblCompany = $p->selectAllChucVu();
            return $tblCompany;
        } 
        
        function getChucVuByUserId($userId) {
            $p = new modalAdmin();
            return $p->selectChucVuByUserId($userId);
        }

        function checkUserName($hoTen, $email, $sdt, $username){
            $p = new modalAdmin();
            $tblNhanVien = $p->checkUserName($hoTen, $email, $sdt, $username);
            return $tblNhanVien;
        }

        function insertNhanVien($codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV){
            $p = new modalAdmin();
            $result = $p-> insertNhanVien($codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV);
            return $result;
        }

        function updateNhanVien($userId, $codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV){
            $p = new modalAdmin();
            $result = $p->updateNhanVien($userId, $codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV);
            return $result;
        }

        public function deleteNhanVienByID($userId){
            $p = new modalAdmin();
            $result = $p->deleteNhanVienByID($userId);
            return $result;
        }

        public function loginUser($username, $password) {
            $p = new modalAdmin();  
            $user = $p->loginUser($username, $password);
            return $user;
        }

        public function selectApproveleaveByPage($page, $limit){
            $model = new modalAdmin();
            return $model->selectApproveleaveByPage($page, $limit);
        }

        public function selectApproveleaveById($idApproveleave) {
            $model = new modalAdmin();
            return $model->selectApproveleaveById($idApproveleave);
        }

        public function updateApproveleaveStatus($idApproveleave, $trangThai) {
            $model = new modalAdmin();
            return $model->updateApproveleaveStatus($idApproveleave, $trangThai);
        }
        
        public function selectScheduleByPage($page, $limit){
            $model = new modalAdmin();
            return $model->selectScheduleByPage($page, $limit);
        }

        public function selectscheduleById($idApproveleave) {
            $model = new modalAdmin();
            return $model->selectscheduleById($idApproveleave);
        }

        public function deleteScheduleById($userId){
            $p = new modalAdmin();
            $result = $p->deleteScheduleById($userId);
            return $result;
        }
        
    }
?>