<?php 
    include_once("../controller/admin.php");

    $p = new controllerAdmin();    

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $nhanVien = $p->selectApproveleaveById($userId);
    
        if ($nhanVien && mysqli_num_rows($nhanVien) > 0) {
            $row = mysqli_fetch_assoc($nhanVien);
            if ($row["trang_thai"] == 1) {
                $chucVu = 'Quản Trị';
            } elseif($row["trang_thai"] == 2) {
                $chucVu = 'Bác sĩ sức khoẻ';
            }
            else{
                $chucVu = 'Bác sĩ dinh dưỡng';
            }
            
            if($row['trang_thai'] == 3){
                $btn_thanhcong = "<button name='btn_chapnhan' type='submit' class='btn btn-primary mr-2'>Chấp nhận</button>";
                $btn_thatbai = "<button name='btn_tuchoi' type='submit' class='btn btn-danger'>Từ chối</button>";
            }
            elseif($row['trang_thai'] == 1){
                $btn_thanhcong = "Đã duyệt bài thành công";
                $btn_thatbai = "";
            }
            elseif($row['trang_thai'] == 2){
                $btn_thatbai = "Đã từ chối bài duyệt";
                $btn_thanhcong = "";
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
            echo"<form method='POST'>";
            echo "<table class='table' border='1'>";
            echo "<tr>";

            echo "<div class='card-container'>"; 
            echo "<div class='card custom-card'>"; 
            echo "<div class='text-center mt-3'>"; 
            echo "</div>";
            echo "<div class='card-body text-center'>"; 
            echo "<h4 class='card-title'>Thông tin chi tiết nhân viên</h4>";
            echo "<p class='card-text'><strong>Mã nhân viên:</strong> " . $row["code"] . "</p>";
            echo "<p class='card-text'><strong>Họ tên:</strong> " . $row["ho_ten"] . "</p>";
            echo "<p class='card-text'><strong>Ngày nghỉ:</strong> " . $row["ngay_nghi"] . "</p>";
            echo "<p class='card-text'><strong>Giới tính:</strong> " . ($row['gioi_tinh'] == 1 ? 'Nam' : 'Nữ') . "</p>";
            echo "<p class='card-text'><strong>Chức vụ:</strong> " . $chucVu . "</p>";  
            echo "<p class='card-text'><strong>Lý do nghỉ:</strong> " . $row["ly_do_nghi"] . "</p>";
            echo $btn_thanhcong;
            echo $btn_thatbai;
            echo "</div>"; 
            echo "</div>"; 
            echo "</div>"; 

            echo "</tr>";
            echo "</table>";
            echo"</form>";
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
    } 
    else {
        echo "<div class='container'>";
        echo "<p class='text-center'>ID nhân viên không hợp lệ.</p>";
        echo "</div>";

}

if(isset($_POST['btn_chapnhan'])){
    $p->updateApproveleaveStatus($userId, 1);
    echo "<script>window.location.href = 'view_approveleave.php?action=blog';</script>";
}
else if(isset($_POST['btn_tuchoi'])){
    $p->updateApproveleaveStatus($userId, 2);
    echo "<script>window.location.href = 'view_approveleave.php?action=blog';</script>";
}

?>