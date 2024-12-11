<?php
// Code by ThanhTong(2T)
include_once "../controller/BSDD/cMenu.php";
$p = new MenuBS();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $result = $p->deleteMenu($id);

    echo "<script>alert('Đã xóa menu thành công: $result');</script>";
    echo "<script>window.location.href = 'BacSiDD.php?page=menu';</script>";
}
?>
