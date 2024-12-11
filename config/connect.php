<<<<<<< HEAD
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
=======
<?php 
//
// try {
//     $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS, DBUTF8);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
class connect{
    function connectDB(){
        $conn = mysqli_connect("localhost", "root", "", "the_six_hospital");
        return $conn;
    }

    function closeDB($conn){
        mysqli_close($conn);
    }
 }

>>>>>>> eefcff8dac6ebf1e7d75e41b6e19f524c86955f0
?>