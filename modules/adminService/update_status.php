<?php
include '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $lich_id = $data['lich_id'];
    $status = $data['status'];

    // Cập nhật trạng thái lịch hẹn
    $conn = (new connect())->connectDB();
    $stmt = mysqli_prepare($conn, "UPDATE lich_hen SET trang_thai = ? WHERE id_lich_hen = ?");
    mysqli_stmt_bind_param($stmt, "ii", $status, $lich_id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
