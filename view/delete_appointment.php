<?php
// Code by ThanhTong(2T)
include_once "../model/tuvanhen.php";
include_once "../controller/bsdd/cTuVanHen.php";

if (!file_exists("../model/tuvanhen.php")) {
    die("File tuvanhen.php không tồn tại.");
}


$p = new cTuVanHen();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $p->delete($id);
    echo "<script>alert('$result');</script>";
    echo "<script>window.location.href = 'BacSiDD.php?page=appointments';</script>";
}

?>