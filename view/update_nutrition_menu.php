<?php
// Code by ThanhTong(2T)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_benh_nhan = $_POST['id_benh_nhan'];
    $status = $_POST['status'];
    include_once("../controller/BSDD/cUser.php");
    $user = new UserController();
    $result = $user->updateUser($id_benh_nhan, $status);

    if ($result) {


        echo "<script>alert('Cập nhật thành công.');</script>";
        echo "<script>window.location.href = 'BacSiDD.php?page=users';</script>";
    } else {
        echo "Cập nhật thất bại.";
    }
}
?>
