<?php
include_once("../controller/admin.php");
$p = new controllerAdmin();
$userId = isset($_GET['id']) ? $_GET['id'] : null;
$currentLoaiTaiKhoan = $userId ? $p->getChucVuByUserId($userId) : null;
$tblCompany = $p->getAllChucVu();

if ($tblCompany) {
    if (mysqli_num_rows($tblCompany) > 0) { 
        echo "<option value=''>Vui lòng chọn chức vụ</option>";
        while ($row = mysqli_fetch_assoc($tblCompany)) {
            // Xác định chức vụ cho từng dòng
            if ($row["loai_nhan_vien"] == 1) {
                $chucVu = 'Quản Trị';
            } elseif ($row["loai_nhan_vien"] == 2) {
                $chucVu = 'Bác sĩ sức khoẻ';
            } elseif ($row["loai_nhan_vien"] == 3) {
                $chucVu = 'Bác sĩ dinh dưỡng';
            }
            elseif ($row["loai_nhan_vien"] == 4) {
                $chucVu = 'Chuyên khoa';
            }
            // Kiểm tra chọn chức vụ hiện tại
            $selected = ($row['loai_nhan_vien'] == $currentLoaiTaiKhoan) ? "selected" : "";

            // Hiển thị <option>
            echo "<option $selected value='" . $row['loai_nhan_vien'] . "'>$chucVu</option>";
        }
    } else {
        echo "<option value=''>Không có dữ liệu</option>";
    }
} else {
    echo "<option value=''>Lỗi truy xuất dữ liệu</option>";
}
?>
