<?php
    include_once("..\config\connect.php");

    class modalAdmin {
        public function selectInfomationBS() {
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn){
                $sql = "SELECT * FROM nhanvien";
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