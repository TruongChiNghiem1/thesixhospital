<?php
    include("../config/connect.php");
    
    class modalAdmin {
        public function selectInfomationBS() {
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn){
                $sql = "SELECT * FROM nhan_vien";
                $result = mysqli_query($conn, $sql);
                $p->closeDB($conn);
                return $result;
            }
            else {
                return false;
            }
        }

        public function selectIDInfomationBS($id){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn){
                $sql = "SELECT * FROM nhan_vien WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                $p->closeDB($conn);
                return $result;
            }
            else {
                return false;
            }
        }

        function selectNhanVienByPage($page, $limit) {
            $p = new connect();
            $conn = $p->connectDB();
            if ($conn) {
                $start = ($page - 1) * $limit;
                $string = "SELECT * FROM nhan_vien LIMIT $start, $limit";
                $table = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $table;
            } else {
                return false;
            }
        }

        function countNhanVien(){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn) {
                $string = "SELECT COUNT(*) AS total FROM nhan_vien";  
                $result = mysqli_query($conn, $string);
                $row = mysqli_fetch_assoc($result);
                $p->closeDB($conn);
                return $row['total'];  
            } else {
                return false;
            }
        }

        function selectAllChucVu(){
            $p = new connect();
            $conn = $p->connectDB();
            if($conn){
                $string = "SELECT DISTINCT loai_nhan_vien FROM nhan_vien";
                $table = mysqli_query($conn, $string); 
                
                $p->closeDB($conn); 
                return $table;
            }else{
                return false;
            }
        }
    
        //
        function selectChucVuByUserId($userId) {
            $p = new connect();
            $conn = $p->connectDB();
            if ($conn) {
                $string = "SELECT loai_nhan_vien FROM nhan_vien WHERE id = '$userId' LIMIT 1";
                $result = mysqli_query($conn, $string);
                
                $p->closeDB($conn);
                if ($result && mysqli_num_rows($result) > 0) {
                    return mysqli_fetch_assoc($result)['loai_nhan_vien'];
                } else {
                    return null; 
                }
            } else {
                return false; 
            }
        }

        function checkUserName($code, $email, $sdt, $username) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {

                // Kiểm tra code trùng
                $sql = "SELECT * FROM nhan_vien WHERE code = '$code'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'code'; // Trùng code
                }

                // Kiểm tra email trùng
                $sql = "SELECT * FROM nhan_vien WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'email'; // Trùng email
                }
        
                // Kiểm tra số điện thoại trùng
                $sql = "SELECT * FROM nhan_vien WHERE so_dien_thoai = '$sdt'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'phone'; // Trùng số điện thoại
                }
        
                // Kiểm tra username trùng
                $sql = "SELECT * FROM nhan_vien WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'username'; // Trùng username
                }
        
                // Không có giá trị nào trùng
                return false;
            } else {
                return false; // Kết nối thất bại
            }
        }
        
        

        public function insertNhanVien($codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV){
            $p = new connect();
            $conn = $p->connectDB();

            if($conn){
                $query = "INSERT INTO nhan_vien (code, ho_ten, email, so_dien_thoai, ngay_sinh, loai_nhan_vien, username, password) 
                           VALUES ('$codeNV', '$tenNV', '$emailNV', '$phoneNV', '$dateNV', '$chucVuNV', '$userNV', '$passNV')";
                
                $kq = mysqli_query($conn, $query);
                if(!$kq){
                    echo mysqli_error($conn);
                    $p->closeDB($conn);
                    return $kq;
                }
                else{
                    return false;
                }
            }
        }

        function deleteNhanVienByID($userId){
            $p = new connect();
            $conn = $p->connectDB();

            if($conn){
                $string = "DELETE FROM nhan_vien WHERE id = '$userId'";
                $kq = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $kq;
            } else {
                return false;
            }
        }

        function updateNhanVien($userId, $codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV){
            $p = new connect();
            $conn = $p->connectDB();

            if($conn){
                $string = "UPDATE nhan_vien SET code='$codeNV', ho_ten='$tenNV', email='$emailNV', so_dien_thoai='$phoneNV', ngay_sinh='$dateNV', 
                loai_nhan_vien='$chucVuNV', username='$userNV', password='$passNV' WHERE id='$userId'";

                $kq = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $kq; 
            } else {
                return false;
            }
        }

        public function loginUser($username, $password) {
            $p = new connect();
            $conn = $p->connectDB();
            if ($conn) {
                $query = "SELECT * FROM nhan_vien WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $query);
                $p->closeDB($conn);
                if ($result && mysqli_num_rows($result) > 0) {
                    return mysqli_fetch_assoc($result); 
                }
            }
            return false;
        }

        public function selectSchedule() {
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn){
                $sql = "SELECT * FROM schedule";
                $result = mysqli_query($conn, $sql);
                $p->closeDB($conn);
                return $result;
            }
            else {
                return false;
            }
        }
    }
?>