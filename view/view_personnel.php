<?php 
    include_once("../controller/admin.php");

    $p = new controllerAdmin();

    
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $nhanVien = $p->selectIDInfomationBS($userId);
    
    if ($nhanVien && mysqli_num_rows($nhanVien) > 0) {
        $row = mysqli_fetch_assoc($nhanVien);
        if ($row["loai_nhan_vien"] == 1) {
            $chucVu = 'Quản Trị';
        } elseif($row["loai_nhan_vien"] == 2) {
            $chucVu = 'Bác sĩ sức khoẻ';
        }
        elseif($row["loai_nhan_vien"] == 3){
            $chucVu = 'Bác sĩ dinh dưỡng';
        }elseif($row["loai_nhan_vien"] == 4){
            $chucVu = 'Chuyên khoa';
        }
        
        echo "<style>
                .custom-card {
                    display: flex;
                    flex-direction: column; /* Sắp xếp các phần tử theo chiều dọc */
                    align-items: center; /* Căn giữa theo chiều ngang */
                    width: 600px;
                    border: 1px solid black; /* Màu sắc của border */
                    border-radius: 0.5rem; /* Đường viền bo tròn */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
                }
                .card-container {
                    display: flex;
                    justify-content: center; /* Căn giữa theo chiều ngang */
                    margin-top: 50px; /* Khoảng cách từ trên xuống */
                }
              </style>";
        echo "<table class='table' border='1'>";
        echo "<tr>";

        echo "<div class='card-container'>"; 
        echo "<div class='card custom-card'>"; 
        echo "<div class='text-center mt-3'>"; 
        echo "</div>";
        echo "<div class='card-body'>"; 
        echo "<h4 class='card-title'>Thông tin chi tiết nhân viên</h4>";
        echo "<p class='card-text'><strong>ID:</strong> " . $row["id"] . "</p>";
        echo "<p class='card-text'><strong>Mã nhân viên:</strong> " . $row["code"] . "</p>";
        echo "<p class='card-text'><strong>Họ tên:</strong> " . $row["ho_ten"] . "</p>";
        echo "<p class='card-text'><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p class='card-text'><strong>Username:</strong> " . $row["username"] . "</p>";
        echo "<p class='card-text'><strong>Password:</strong> " . $row["password"] . "</p>";
        echo "<p class='card-text'><strong>Số điện thoại:</strong> " . $row["so_dien_thoai"] . "</p>";
        echo "<p class='card-text'><strong>Giới tính:</strong> " . ($row['gioi_tinh'] == 1 ? 'Nam' : 'Nữ') . "</p>";
        echo "<p class='card-text'><strong>Ngày sinh:</strong> " . $row["ngay_sinh"] . "</p>";
        echo "<p class='card-text'><strong>Chức vụ:</strong> " . $chucVu . "</p>";
        echo "</div>"; 
        echo "</div>"; 
        echo "</div>"; 

        echo "</tr>";
        echo "</table>";
    } else {
        echo "<div class='container'>"; 
        echo "<p class='text-center'>Không tìm thấy thông tin nhân viên.</p>";

        // Kiểm tra xem có kết quả từ truy vấn 
        if ($nhanVien) {
            echo "<p class='text-center'>Kết quả truy vấn rỗng.</p>";
        } else {
            echo "<p class='text-center'>Lỗi khi thực hiện truy vấn hoặc kết nối.</p>";
        }
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<p class='text-center'>ID nhân viên không hợp lệ.</p>";
    echo "</div>";
}
?>