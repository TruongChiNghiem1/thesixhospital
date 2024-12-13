<?php
//
// try {
//     $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS, DBUTF8);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
class connect
{
    function connectDB()
    {
<<<<<<< HEAD
        $conn = mysqli_connect("localhost", "root", "", "a");
=======
        $conn = mysqli_connect("localhost", "root", "", "the_six_hospital");
>>>>>>> b0307964c697814fd963a160ccbe708c1a4d2ec9
        return $conn;
    }

    function closeDB($conn)
    {
        mysqli_close($conn);
    }
}