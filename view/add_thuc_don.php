<?php
// Code by ThanhTong(2T)
session_start();
include_once("../controller/BSDD/cUser.php");
$inforUser = new InforUser();

$benhNhanResult = $inforUser->selectInfomationUser();
$queryMonAn = "SELECT * FROM mon_an";
$conn = (new connect())->connectDB();
$monAnResult = mysqli_query($conn, $queryMonAn);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thực Đơn Dinh Dưỡng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Thêm Thực Đơn Dinh Dưỡng</h2>
        <form action="#" method="POST" enctype="multipart/form-data" id="addThucDonForm">
            <table class="table table-bordered">
                <tr>
                    <td><label for="ma_thuc_don">Mã Thực Đơn</label></td>
                    <td>
                        <select name="ma_thuc_don" class="form-control" required>
                            <?php
                            $queryThucDon = "SELECT ma_thuc_don FROM mon_an";
                            $thucDonResult = mysqli_query($conn, $queryThucDon);
                            while ($row = mysqli_fetch_assoc($thucDonResult)) {
                                echo "<option value='{$row['ma_thuc_don']}'>{$row['ma_thuc_don']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="ngay_an">Ngày Ăn</label></td>
                    <td><input type="date" name="ngay_an" class="form-control" required></td>
                </tr>

                <tr>
                    <td><label for="buoi_an">Buổi Ăn</label></td>
                    <td>
                        <select name="buoi_an" class="form-control" required>
                            <option value="Sáng">Sáng</option>
                            <option value="Trưa">Trưa</option>
                            <option value="Tối">Tối</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_ho_so_benh_an">Hồ Sơ Bệnh Án</label></td>
                    <td>
                        <select name="id_ho_so_benh_an" class="form-control" required>
                            <?php
                            include_once("InforUser.php");
                            $inforUser = new InforUser();
                            $ho_so_benh_an_result = $inforUser->selecthosobenhan(); 
                            while ($row = mysqli_fetch_assoc($ho_so_benh_an_result)) {
                                echo "<option value='{$row['id_ho_so_benh_an']}'>{$row['id_ho_so_benh_an']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_nhan_vien">Nhân Viên</label></td>
                    <td>
                        <!-- <select name="id_nhan_vien" class="form-control" required>
                            <?php
                            $nhan_vien_result = mysqli_query($conn, "SELECT * FROM nhan_vien"); // Query lấy nhân viên từ bả
                            while ($row = mysqli_fetch_assoc($nhan_vien_result)) {
                                echo "<option value='{$row['id_nhan_vien']}'>{$row['id']}</option>";
                            }
                            ?>
                        </select> -->
                        <input type="text" name="id_nhan_vien" class="form-control" value="<?php echo $_SESSION['ho_ten']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnSubmit" class="btn btn-primary" value="Lưu">
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php

if (isset($_POST['btnSubmit'])) {
    // $id = 
    $ma_thuc_don = $_POST['ma_thuc_don'];
    $ngay_an = $_POST['ngay_an'];
    $buoi_an = $_POST['buoi_an'];
    $id_ho_so_benh_an = $_POST['id_ho_so_benh_an'];
    $id_nhan_vien = $_SESSION['id'];
    // $id_monan = $_POST['id_monan'];

    $inforUser = new InforUser();
    $result = $inforUser->addThucDonDinhDuong($ma_thuc_don, $ngay_an, $buoi_an, $id_ho_so_benh_an, $id_nhan_vien);

    if ($result) {
        echo "<script>alert('Thêm thực đơn thành công.')</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra khi thêm thực đơn.')</script>";
    }

    echo "<script>window.location.href = 'BacSiDD.php?page=users';</script>";
}

?>

</html>