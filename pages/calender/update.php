<?php
require('../../model/classdatabase.php');
$obj = new manage();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $obj->detailLich($id); // Pass the appointment ID to the method

    if ($result) {
        echo "Appointment Details:<br>";
        echo "Thời gian: " . htmlspecialchars($result['ngay_gio']) . "<br>";
        echo "Bệnh nhân: " . htmlspecialchars($result['ten_benh_nhan']) . "<br>";
        echo "Ghi chú: " . htmlspecialchars($result['ghiChu']) . "<br>";
        echo "Trạng thái: " . htmlspecialchars($result['trang_thai']) . "<br>";
    } else {
        echo "Không tìm thấy lịch hẹn.";
    }
} else {
    echo "Không có ID lịch hẹn được cung cấp.";
}
?>
