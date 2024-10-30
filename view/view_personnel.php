<?php 
    include_once("../controller/admin/list.php");

    $p = new selectInfomationBS();

    
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $nhanVien = $p->selectIDInfomationBS($userId);
    
    if ($nhanVien && mysqli_num_rows($nhanVien) > 0) {
        $row = mysqli_fetch_assoc($nhanVien);
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
        echo "<div class='card-body text-center'>"; 
        echo "<h4 class='card-title'>Thông tin chi tiết nhân viên</h4>";
        echo "<p class='card-text'><strong>ID:</strong> " . $row["id"] . "</p>";
        echo "<p class='card-text'><strong>Họ tên:</strong> " . $row["name"] . "</p>";
        echo "<p class='card-text'><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p class='card-text'><strong>Số điện thoại:</strong> " . $row["phone"] . "</p>";
        echo "<p class='card-text'><strong>Giới tính:</strong> " . ($row['sex'] == 'Nam' ? 'Nam' : 'Nữ') . "</p>";
        echo "<p class='card-text'><strong>Ngày sinh:</strong> " . $row["birthday"] . "</p>";
        echo "<p class='card-text'><strong>Chức vụ:</strong> " . ($row["staffType"] == 1 ? 'Bác sĩ dinh dưỡng' : 'Bác sĩ sức khoẻ') . "</p>";
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