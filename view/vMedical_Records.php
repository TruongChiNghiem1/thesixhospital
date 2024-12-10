<?php
// Code by ThanhTong(2T)

include_once("../controller/BSDD/cUser.php");
$inforUser = new InforUser();

$id_ho_so_benh_an = $_GET['id'] ?? null;

if (!$id_ho_so_benh_an) {
    echo "<script>alert('Không tìm thấy ID Hồ Sơ Bệnh Án!'); window.history.back();</script>";
    exit;
}

$hoSo = $inforUser->getHoSoBenhAnById($id_ho_so_benh_an);

if (!$hoSo) {
    echo "<script>alert('Không tìm thấy Hồ Sơ Bệnh Án với ID đã chọn!'); window.history.back();</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hồ Sơ Bệnh Án</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
  
        .table-responsive {
            max-height: 500px; 
            overflow-y: auto; 
            overflow-x: auto; 
            border: 1px solid #dee2e6;
        }

        .table td, .table th {
            white-space: nowrap; 
            font-size: 14px; 
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Chi Tiết Hồ Sơ Bệnh Án</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td><strong>Bệnh Nhân</strong></td>
                    <td>
                        <?php
                        $benhNhan = $inforUser->getBenhNhanById($hoSo['id_benh_nhan']);
                        echo $benhNhan ? $benhNhan['ten_benh_nhan'] : "Không xác định";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Giới Tính</strong></td>
                    <td><?php echo $benhNhan['gioi_tinh']; ?></td>
                </tr>
                <tr>
                    <td><strong>Ngày Sinh</strong></td>
                    <td><?php echo $benhNhan['ngay_sinh']; ?></td>
                </tr>
                <tr>
                    <td><strong>Địa chỉ</strong></td>
                    <td><?php echo $benhNhan['dia_chi']; ?></td>
                </tr>
                <tr>
                    <td><strong>Mã Hồ Sơ</strong></td>
                    <td><?php echo $hoSo['ma_ho_so_benh_an']; ?></td>
                </tr>
                <tr>
                    <td><strong>Mô Tả</strong></td>
                    <td><?php echo $hoSo['mo_ta']; ?></td>
                </tr>
                <tr>
                    <td><strong>Chuẩn Đoán</strong></td>
                    <td><?php echo $hoSo['chuan_doan']; ?></td>
                </tr>
                <tr>
                    <td><strong>Ngày Khám</strong></td>
                    <td><?php echo $hoSo['ngay_kham']; ?></td>
                </tr>
                <tr>
                    <td><strong>Dị Ứng</strong></td>
                    <td><?php echo $hoSo['di_ung']; ?></td>
                </tr>
            </table>
        </div>
        <a href="BacSiDD.php?page=users" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
