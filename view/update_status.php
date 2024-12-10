<?php
// Code by ThanhTong(2T)
include_once "../controller/bsdd/cTuVanHen.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $status = $_POST['status'];

    if (in_array($status, ['1', '2', '3'])) {
        $p = new cTuVanHen();
        if ($p->update($appointment_id, $status)) {
            header("Location: BacSiDD.php?page=appointments");
            exit();
        } else {
            echo "Cập nhật trạng thái không thành công.";
        }
    } else {
        echo "Trạng thái không hợp lệ.";
    }
} else {
    echo "Không có dữ liệu gửi đến.";
}
?>
