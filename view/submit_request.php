<?php
// Code by ThanhTong(2T)

session_start();
include_once("../controller/BSDD/cDonXinNghi.php");

$donXinNghi = new DonXinNghi();

if (isset($_POST['btnSubmit'])) {
    $id_nhan_vien = $_POST['id_nhan_vien'];
    $ngay_nghi = $_POST['ngay_nghi'];
    $ly_do = $_POST['ly_do_nghi'];

    $result = $donXinNghi->insertDonXinNghi($id_nhan_vien, $ngay_nghi, $ly_do, 1);

    if ($result) {
        echo "<script>alert('Gửi đơn xin nghỉ thành công.');</script>";
    } else {
        echo "<script>alert('Gửi đơn xin nghỉ thất bại.');</script>";
    }

    header("Location: BacSiDD.php?page=request");
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Đơn Xin Nghỉ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        .btn-view {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Gửi Đơn Xin Nghỉ</h2>
        <form action="#" method="POST" id="guiDonXinNghiForm">
            <table class="table table-bordered">
                <tr>
                    <td><label for="id_nhan_vien">Nhân Viên</label></td>
                    <td>
                        <input type="text" name="id_nhan_vien" class="form-control" value="<?php echo htmlspecialchars($_SESSION['id']); ?>" readonly required>
                    </td>
                </tr>
                <tr>
                    <td><label for="ngay_nghi">Ngày Nghỉ</label></td>
                    <td>
                        <input type="date" name="ngay_nghi" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="ly_do_nghi">Lý Do Nghỉ</label></td>
                    <td>
                        <textarea name="ly_do_nghi" class="form-control" rows="3" placeholder="Nhập lý do nghỉ..." required></textarea>
                    </td>
                </tr>

                <!-- Submit -->
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnSubmit" class="btn btn-primary" value="Gửi Đơn">
                        <a href="BacSiDD.php?page=view_BacSiDD" class="btn btn-secondary btn-view">Xem Đơn Xin Nghỉ</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>