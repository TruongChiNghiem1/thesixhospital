<?php
include '../../config/connect.php';
if (isset($_GET['doctor_id'])) {
    $doctorId = $_GET['doctor_id'];

    $conn = (new connect())->connectDB();

    $stmt = $conn->prepare("SELECT ngay_lam FROM lich_lam_viec WHERE id_nhan_vien = ? AND ngay_lam >= CURDATE() ORDER BY ngay_lam ASC LIMIT 5");
    $stmt->bind_param("i", $doctorId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $availableDates = [];

        while ($row = $result->fetch_assoc()) {
            $availableDates[] = $row['ngay_lam'];
        }

        header('Content-Type: application/json');
        echo json_encode($availableDates);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Có lỗi xảy ra, vui lòng thử lại.']);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'doctor_id không hợp lệ.']);
    exit;
}