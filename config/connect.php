<?php
    class connect{
        function connectDB(){
            $conn = mysqli_connect("localhost", "root", "", "the_six_hospital");
            return $conn;
        }
    
        function closeDB($conn){
            mysqli_close($conn);
        }
    }
?>