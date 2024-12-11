<?php
include_once("../controller/admin.php");
$p = new controllerAdmin();

// Lấy ID của nhân viên hiện tại (nếu có)
$userId = isset($_GET['id']) ? $_GET['id'] : null;
$schedule = $userId ? $p->selectScheduleById($userId) : null;

// Lấy danh sách tất cả nhân viên
$tblCompany = $p->GetAllTenNV();


if ($tblCompany) {
    if (mysqli_num_rows($tblCompany) > 0) { 
        echo "<option value=''>Vui lòng chọn nhân viên</option>";
        while ($row = mysqli_fetch_assoc($tblCompany)) {
            // Kiểm tra nếu nhân viên hiện tại được chọn
            $selected = ($row['id'] == $schedule['id_nhan_vien']) ? "selected" : "";
            
            // Hiển thị <option> với ID mờ và chỉ dùng tên khi chọn
            echo "<option $selected value='" . $row['id'] . "'>" . htmlspecialchars($row['ho_ten']) . " <span class='id-mute'>(" . $row['code'] . ")</span></option>";
        }
    } else {
        echo "<option value=''>Không có dữ liệu</option>";
    }
} else {
    echo "<option value=''>Lỗi truy xuất dữ liệu</option>";
}


?>


