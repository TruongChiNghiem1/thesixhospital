<?php 
// Code by ThanhTong(2T)
  
  include_once("../controller/BSDD/cUser.php");
  $inforUser = new InforUser();
  $result = $inforUser->deleteUser($_GET['id']);

  if ($result) {
        echo "<script>alert('Xóa bệnh nhân thành công.');</script>";
        echo "<script>window.location.href = 'BacSiDD.php?page=users';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra khi xóa bệnh nhân.');</script>";
        echo "<script>window.location.href = 'BacSiDD.php?page=users';</script>";
    }
?>