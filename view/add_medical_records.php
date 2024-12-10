<?php
// Code by ThanhTong(2T)
include_once("../controller/BSDD/cUser.php");
$inforUser = new InforUser();

$benhNhanResult = $inforUser->selectInfomationUser();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hồ Sơ Bệnh Án</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Thêm Hồ Sơ Bệnh Án</h2>
        <form action="#" method="POST" enctype="multipart/form-data" id="addHoSoForm">
            <table class="table table-bordered">
                <tr>
                    <td><label for="ma_ho_so_benh_an">Mã Hồ Sơ Bệnh Án</label></td>
                    <td>
                        <input type="text" name="ma_ho_so_benh_an" class="form-control" placeholder="Nhập mã hồ sơ bệnh án" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="mota">Mô Tả</label></td>
                    <td>
                        <textarea name="mota" class="form-control" rows="3" placeholder="Mô tả tình trạng bệnh..." required></textarea>
                    </td>
                </tr>

                <tr>
                    <td><label for="chuan_doan">Chuẩn Đoán</label></td>
                    <td>
                        <input type="text" name="chuan_doan" class="form-control" placeholder="Nhập chuẩn đoán" required>
                    </td>
                </tr>

                <tr>
                    <td><label for="ngay_kham">Ngày Khám</label></td>
                    <td>
                        <input type="date" name="ngay_kham" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="di_ung">Dị Ứng</label></td>
                    <td>
                        <input type="text" name="di_ung" class="form-control" placeholder="Nhập dị ứng (nếu có)" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_benh_nhan">Bệnh Nhân</label></td>
                    <td>
                        <select name="id_benh_nhan" class="form-control" required>
                            <option value="" disabled selected>-- Chọn Bệnh Nhân --</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($benhNhanResult)) {
                                echo "<option value='{$row['id_benh_nhan']}'>ID: {$row['id_benh_nhan']} - {$row['ten_benh_nhan']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <!-- Submit -->
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
    $ma_ho_so_benh_an = $_POST['ma_ho_so_benh_an'];
    $mota = $_POST['mota'];
    $chuan_doan = $_POST['chuan_doan'];
    $ngay_kham = $_POST['ngay_kham'];
    $di_ung = $_POST['di_ung'];
    $id_benh_nhan = $_POST['id_benh_nhan'];

    $inforUser = new InforUser();
    $result = $inforUser->addHoSoBenhAn($ma_ho_so_benh_an, $mota, $chuan_doan, $ngay_kham, $di_ung, $id_benh_nhan);

    if ($result) {
        echo "<script>alert('Thêm hồ sơ bệnh án thành công!')</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra khi thêm hồ sơ bệnh án!')</script>";
    }

    echo "<script>window.location.href = 'BacSiDD.php?page=';</script>";
}
?>

</html>
