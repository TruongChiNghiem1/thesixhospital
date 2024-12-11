<!-- // Code by ThanhTong(2T) -->


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thực Đơn</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
       
        .card-body {
            max-height: 500px;
            overflow-y: auto; 
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once("../controller/BSDD/cMenu.php");
    $menu = new MenuBS();
    $id = $_GET['id'];
    $data = $menu->selectMenuById($id);
    if ($data) {
        $menuData = $data;
    } else {
        die("Không thể lấy dữ liệu từ cơ sở dữ liệu.");
    }
    $maMonAn = $menuData['ma_mon_an'];
    $tenMonAn = $menuData['ten_mon_an'];
    $chiSoDinhDuong = $menuData['chi_so_dinh_duong'];
    $idNguoiTao = $menuData['id_nguoi_tao'];
    $maThucDon = $menuData['ma_thuc_don'];
    $ghiChu = $menuData['ghi_chu'];
    
    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Sửa Thực Đơn</h2>
            </div>
            <div class="card-body">
                <form id="addMenuForm" method="POST">
                    <div class="form-group">
                        <label for="maMonAn">Mã Món Ăn</label>
                        <input type="text" class="form-control" id="maMonAn" name="maMonAn" required 
                               value="<?php echo htmlspecialchars($maMonAn); ?>">
                    </div>
                    <div class="form-group">
                        <label for="tenMonAn">Tên Món Ăn</label>
                        <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" required 
                               value="<?php echo htmlspecialchars($tenMonAn); ?>">
                    </div>
                    <div class="form-group">
                        <label for="chiSoDinhDuong">Chỉ Số Dinh Dưỡng</label>
                        <input type="text" class="form-control" id="chiSoDinhDuong" name="chiSoDinhDuong" required 
                               value="<?php echo htmlspecialchars($chiSoDinhDuong); ?>">
                    </div>
                    <div class="form-group">
                        <label for="idNguoiTao">ID Người Tạo</label>
                        <input type="text" class="form-control" id="idNguoiTao" name="idNguoiTao" required  readonly
                        value="<?php echo $_SESSION['id']; ?>">
                    </div>
                    <div class="form-group
                        <label for="maThucDon">Mã Thực Đơn</label>
                        <input type="text" class="form-control" id="maThucDon" name="maThucDon" required 
                               value="<?php echo htmlspecialchars($maThucDon); ?>">
                    </div>
                    <div class="form-group">
                        <label for="ghiChu">Ghi Chú</label>
                        <textarea class="form-control" id="ghiChu" name="ghiChu"><?php echo htmlspecialchars($ghiChu); ?></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="add_menu">Sửa</button>
                        <a href="/thesixhospital/view/BacSiDD.php?page=menu" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


<?php
$id = $_GET['id'];
if (isset($_POST['add_menu'])) {
    $maMonAn = $_POST['maMonAn'];
    $tenMonAn = $_POST['tenMonAn'];
    $chiSoDinhDuong = $_POST['chiSoDinhDuong'];
    $idNguoiTao = $_POST['idNguoiTao'];
    $maThucDon = $_POST['maThucDon'];
    $ghiChu = $_POST['ghiChu'];
    // $ngayTao = date('Y-m-d H:i:s');

    include_once("../controller/BSDD/cMenu.php");
    $menu = new MenuBS();
    $result = $menu->updateMenu($id ,$maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon, $ghiChu);
    echo "<script>alert('Sửa thực đơn thành công');</script>";
    echo "<script>window.location.href = 'BacSiDD.php?page=menu';</script>";

    if ($result) {
        echo "<script>alert('Thêm thực đơn thành công');</script>";
        echo "<script>window.location.href = 'BacSiDD.php?page=menu';</script>";
    } else {
        echo "<script>alert('Lỗi khi thêm thực đơn. Vui lòng thử lại.');</script>";
    }
}
?>
</html>
