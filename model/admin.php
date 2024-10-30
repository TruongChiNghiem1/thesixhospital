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

        public function selectIDInfomationBS($id){
            $p = new connect();
            $conn = $p->connectDB();

            if ($conn){
                $sql = "SELECT * FROM nhanvien WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                $p->closeDB($conn);
                return $result;
            }
            else {
                return false;
            }
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