<?php
include_once("../controller/admin.php");
$p = new controllerAdmin();
$userId = isset($_GET['id']) ? $_GET['id'] : null;
$schedule = $userId ? $p->selectScheduleById($userId) : null;
$tblCompany = $p->GetAllCaTruc($userId);



if ($tblCompany) {
    if (mysqli_num_rows($tblCompany) > 0) { 
        echo "<option value=''>Vui lòng chọn ca trực</option>";
        while ($row = mysqli_fetch_assoc($tblCompany)) {
            // Xác định ca trực cho từng dòng
            if ($row["ca_lam"] == 1) {
                $caLam = 'Ca sáng';
            } elseif ($row["ca_lam"] == 2) {
                $caLam = 'Ca chiều';
            } else {
                $caLam = 'Ca tối';
            }

            // Kiểm tra chọn ca trực hiện tại
            $selected = ($row['ca_lam'] == $schedule['ca_lam']) ? "selected" : "";

            // Hiển thị <option>
            echo "<option $selected value='" . $row['ca_lam'] . "'>$caLam</option>";
        }
    } else {
        echo "<option value=''>Không có dữ liệu</option>";
    }
} else {
    echo "<option value=''>Lỗi truy xuất dữ liệu</option>";
}
?>
