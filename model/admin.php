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
                $string = "SELECT * FROM nhan_vien ORDER BY `id` DESC LIMIT $start, $limit";
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

        function countSchedule(){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn) {
                $string = "SELECT COUNT(*) AS total FROM don_xin_nghi";  
                $result = mysqli_query($conn, $string);
                $row = mysqli_fetch_assoc($result);
                $p->closeDB($conn);
                return $row['total'];  
            } else {
                return false;
            }
        }

        function countScheduleByTrangThai($trangThai){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn) {
                $string = "SELECT COUNT(*) AS total FROM don_xin_nghi WHERE trang_thai = $trangThai " ;  
                $result = mysqli_query($conn, $string);
                $row = mysqli_fetch_assoc($result);
                $p->closeDB($conn);
                return $row['total'];  
            } else {
                return false;
            }
        }

        function countApproveLeave(){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn) {
                $string = "SELECT COUNT(*) AS total FROM lich_lam_viec";  
                $result = mysqli_query($conn, $string);
                $row = mysqli_fetch_assoc($result);
                $p->closeDB($conn);
                return $row['total'];  
            } else {
                return false;
            }
        }

        function countApproveLeaveByCaLam($caLam){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn) {
                $string = "SELECT COUNT(*) AS total FROM lich_lam_viec WHERE ca_lam = $caLam";  
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

        function selectAllTenNV(){
            $p = new connect();
            $conn = $p->connectDB();
            if($conn){
                $string = "SELECT DISTINCT code, id, ho_ten FROM nhan_vien";
                $table = mysqli_query($conn, $string); 
                
                $p->closeDB($conn); 
                return $table;
            }else{
                return false;
            }
        }
    
        //
        function selectTenNVByUserId($userId) {
            $p = new connect();
            $conn = $p->connectDB();
            if ($conn) {
                $string = "SELECT code, id, ho_ten FROM nhan_vien WHERE id = '$userId' LIMIT 1";
                $result = mysqli_query($conn, $string);
                
                $p->closeDB($conn);
                if ($result && mysqli_num_rows($result) > 0) {
                    return mysqli_fetch_assoc($result)['code'];
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

                $sql = "SELECT * FROM nhan_vien WHERE code = '$code'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'code';
                }

                $sql = "SELECT * FROM nhan_vien WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'email';
                }
        
                $sql = "SELECT * FROM nhan_vien WHERE so_dien_thoai = '$sdt'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'phone'; 
                }
        
                $sql = "SELECT * FROM nhan_vien WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    return 'username';
                }
        
                return false;
            } else {
                return false;
            }
        }
        
        

        public function insertNhanVien($codeNV, $tenNV, $emailNV, $userNV, $passNV, $phoneNV, $dateNV, $chucVuNV){
            $p = new connect();
            $conn = $p->connectDB();

            $hashPass = $passNV;

            if($conn){
                $query = "INSERT INTO nhan_vien (code, ho_ten, email, so_dien_thoai, ngay_sinh, loai_nhan_vien, username, password) 
                           VALUES ('$codeNV', '$tenNV', '$emailNV', '$phoneNV', '$dateNV', '$chucVuNV', '$userNV', '$hashPass')";
                
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

            $hashPass = md5($passNV);

            if($conn){
                $string = "UPDATE nhan_vien SET code='$codeNV', ho_ten='$tenNV', email='$emailNV', so_dien_thoai='$phoneNV', ngay_sinh='$dateNV', 
                loai_nhan_vien='$chucVuNV', username='$userNV', password='$hashPass' WHERE id='$userId'";

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

            $hashPass = md5($password);

            if ($conn) {
                $query = "SELECT * FROM nhan_vien WHERE username = '$username' AND password = '$hashPass'";
                $result = mysqli_query($conn, $query);
                $p->closeDB($conn);
                if ($result && mysqli_num_rows($result) > 0) {
                    return mysqli_fetch_assoc($result); 
                }
            }
            return false;
        }

        public function selectApproveleaveByPage($page, $limit) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                $start = ($page - 1) * $limit;

                $stmt = $conn->prepare("
                    SELECT nhan_vien.*, don_xin_nghi.*
                    FROM don_xin_nghi 
                    LEFT JOIN nhan_vien ON don_xin_nghi.id_nhan_vien = nhan_vien.id
                    ORDER BY don_xin_nghi.id_don_xin_nghi DESC
                    LIMIT ?, ?
                ");
        
                if ($stmt) {
                    $stmt->bind_param("ii", $start, $limit);
        
                    $stmt->execute();

                    $result = $stmt->get_result();

                    $stmt->close();
                    $p->closeDB($conn);
        
                    return $result;
                } else {
                    $p->closeDB($conn);
                    return false;
                }
            } else {
                return false;
            }
        }
        
        public function selectApproveleaveById($idApproveleave) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                $string = "SELECT nhan_vien.*, don_xin_nghi.*
                            FROM don_xin_nghi
                            LEFT JOIN nhan_vien ON don_xin_nghi.id_nhan_vien = nhan_vien.id

                            WHERE don_xin_nghi.id_don_xin_nghi = '$idApproveleave'";
                $table = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $table;
            } else {
                return false; 
            }
        }

        public function updateApproveleaveStatus($idApproveleave, $trangThai) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                $string = "UPDATE don_xin_nghi SET trang_thai = '$trangThai' WHERE id_don_xin_nghi = '$idApproveleave'";
                $result = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $result;
            } else {
                return false; 
            }
        }

        public function selectScheduleByPage($page, $limit) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                $start = ($page - 1) * $limit;

                $stmt = $conn->prepare("
                    SELECT nhan_vien.*, lich_lam_viec.*
                    FROM lich_lam_viec
                    LEFT JOIN nhan_vien ON lich_lam_viec.id_nhan_vien = nhan_vien.id
                    ORDER BY lich_lam_viec.id_lich_lam_viec DESC
                    LIMIT ?, ?
                ");
        
                if ($stmt) {
                    $stmt->bind_param("ii", $start, $limit);
        
                    $stmt->execute();

                    $result = $stmt->get_result();

                    $stmt->close();
                    $p->closeDB($conn);
        
                    return $result;
                } else {
                    $p->closeDB($conn);
                    return false;
                }
            } else {
                return false;
            }
        }

        function selectAllCaTruc(){
            $p = new connect();
            $conn = $p->connectDB();
            if($conn){
                $string = "SELECT DISTINCT ca_lam FROM lich_lam_viec";
                $table = mysqli_query($conn, $string); 
                
                $p->closeDB($conn); 
                return $table;
            }else{
                return false;
            }
        }

        public function selectScheduleById($idschedule) {
    $p = new connect();
    $conn = $p->connectDB();

    if ($conn) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT nhan_vien.*, lich_lam_viec.*
                                FROM lich_lam_viec
                                LEFT JOIN nhan_vien ON lich_lam_viec.id_nhan_vien = nhan_vien.id
                                WHERE lich_lam_viec.id_lich_lam_viec = ?");
        $stmt->bind_param("i", $idschedule); // "i" indicates the parameter is an integer

        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $schedule = $result->fetch_assoc(); // Fetch the row as an associative array
            $stmt->close();
            $p->closeDB($conn);
            
            return $schedule;
        } else {
            $stmt->close();
            $p->closeDB($conn);
            return false; // No schedule found
        }
    } else {
        return false; // Database connection failed
    }
}


        public function insertSchedule($idNhanVien, $ngayTruc, $caTruc, $ghiChu) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO lich_lam_viec (`ngay_lam`, `ca_lam`, `id_nhan_vien`, `ghi_chu`) 
                                         VALUES (?, ?, ?, ?)");
        
                if ($stmt) {
                    // Bind parameters to the prepared statement
                    $stmt->bind_param("ssis", $ngayTruc, $caTruc, $idNhanVien, $ghiChu);
        
                    // Execute the statement
                    if ($stmt->execute()) {
                        $stmt->close();
                        $p->closeDB($conn);
                        return true; // Return true to indicate success
                    } else {
                        // Print error if the query fails
                        echo "Error: " . $stmt->error;
                        $stmt->close();
                        $p->closeDB($conn);
                        return false;
                    }
                } else {
                    // Print error if the prepared statement fails to prepare
                    echo "Error preparing statement: " . $conn->error;
                    $p->closeDB($conn);
                    return false;
                }
            } else {
                // Connection failed
                echo "Connection failed: " . $conn->connect_error;
                return false;
            }
        }
        
        public function deleteScheduleById($userId){
            $p = new connect();
            $conn = $p->connectDB();

            if($conn){
                $string = "DELETE FROM lich_lam_viec WHERE id_lich_lam_viec = '$userId'";
                $kq = mysqli_query($conn, $string);
                $p->closeDB($conn);
                return $kq;
            } else {
                return false;
            }
        }

        public function updateSchedule($idLich, $idNhanVien, $ngayTruc, $caTruc, $ghiChu) {
            $p = new connect();
            $conn = $p->connectDB();
        
            if ($conn) {
                // Use prepared statement for updating data
                $stmt = $conn->prepare("UPDATE lich_lam_viec 
                                         SET `ngay_lam` = ?, `ca_lam` = ?, `id_nhan_vien` = ?, `ghi_chu` = ? 
                                         WHERE `id_lich_lam_viec` = ?");
        
                if ($stmt) {
                    // Bind parameters: assuming `ngayTruc`, `caTruc`, `idNhanVien`, and `ghiChu` are strings, and `idLich` is an integer
                    $stmt->bind_param("ssiis", $ngayTruc, $caTruc, $idNhanVien, $ghiChu, $idLich);
        
                    if ($stmt->execute()) {
                        $stmt->close();
                        $p->closeDB($conn);
                        return true; // Success
                    } else {
                        echo "Error: " . $stmt->error;
                        $stmt->close();
                        $p->closeDB($conn);
                        return false; // Failure
                    }
                } else {
                    echo "Error preparing statement: " . $conn->error;
                    $p->closeDB($conn);
                    return false; // Preparation failed
                }
            } else {
                echo "Connection failed: " . $conn->connect_error;
                return false; // Connection failed
            }
        }
        
    }
?>