<?php
    class doctor{

        public function connect(){
            $connect = new mysqli("localhost","root","","the_six_hospital");
            if($connect){
                return $connect;
            }
            else{
                echo "Kết nối không thành công";
                exit();
            }
        }

        //Đóng database
        public function unconnect($connect){
            mysqli_close($connect);
        }
        public function getdata($sql){
            $link = $this->connect();
            $data = array();
            $result = $link->query($sql);
            if($result->num_rows){
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            $this->unconnect($link);
            return $data;
        }

        public function deletedata($sql)
        {
            $link = $this->connect();
            if ($link->query($sql)) {
                $this->unconnect($link);
                return 1;
            } else {
                $this->unconnect($link);
                return 0;
            }
        }

        public function adddata($sql){
            $link=$this->connect();
            if($link->query($sql))
                return 1;
            else
                return 0;
        }
        public function updatedata($sql){
            $link=$this->connect();
            if($link->query($sql))
                return 1;
            else
                return 0;
        }

    }
?>