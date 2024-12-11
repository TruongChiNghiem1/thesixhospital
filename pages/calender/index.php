<?php
require('../model/classdatabase.php'); // Đảm bảo đúng đường dẫn
$obj = new manage();

// Tính toán ngày đầu và cuối của tuần hiện tại
$today = new DateTime();
$startOfWeek = clone $today->modify(('Sunday' == $today->format('l')) ? 'this week' : 'last Sunday');
$endOfWeek = clone $startOfWeek->modify('+6 days');
$startOfWeek = $startOfWeek->format('Y-m-d');
$endOfWeek = $endOfWeek->format('Y-m-d');

// Lấy danh sách lịch hẹn trong tuần hiện tại từ cơ sở dữ liệu
$sql_lich_hen = "SELECT * FROM lich_hen WHERE DATE(ngay_gio) BETWEEN '$startOfWeek' AND '$endOfWeek' ORDER BY ngay_gio";
$lich_hen = $obj->getdata($sql_lich_hen);

// In ra truy vấn và kết quả để kiểm tra
echo '<pre>';
echo 'Truy vấn SQL: ' . $sql_lich_hen . "\n";
print_r($lich_hen);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lịch Hẹn Theo Tuần</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Lịch Hẹn Theo Tuần</h2>

        <form method="post" class="mb-5">
            <div class="form-group">
                <label for="ngay_gio">Ngày Giờ:</label>
                <input type="datetime-local" class="form-control" id="ngay_gio" name="ngay_gio" required>
            </div>
            <div class="form-group">
                <label for="loai_lich_hen">Loại Lịch Hẹn:</label>
                <select class="form-control" id="loai_lich_hen" name="loai_lich_hen" required>
                    <option value="1">Dịch vụ</option>
                    <option value="2">Bác sĩ dinh dưỡng</option>
                    <option value="3">Bác sĩ sức khỏe</option>
                    <option value="4">Chuyên khoa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="trang_thai">Trạng Thái:</label>
                <select class="form-control" id="trang_thai" name="trang_thai" required>
                    <option value="1">Chờ bác sĩ</option>
                    <option value="2">Chờ khám</option>
                    <option value="3">Khám thành công</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_benh_nhan">ID Bệnh Nhân:</label>
                <input type="number" class="form-control" id="id_benh_nhan" name="id_benh_nhan" required>
            </div>
            <div class="form-group">
                <label for="id_nhan_vien">ID Nhân Viên:</label>
                <input type="number" class="form-control" id="id_nhan_vien" name="id_nhan_vien" required>
            </div>
            <div class="form-group">
                <label for="loai_lich_dat">Loại Lịch Đặt:</label>
                <select class="form-control" id="loai_lich_dat" name="loai_lich_dat" required>
                    <option value="1">Bệnh nhân đặt</option>
                    <option value="2">Nhân viên đặt</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ghi_chu">Ghi Chú:</label>
                <textarea class="form-control" id="ghi_chu" name="ghi_chu" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="btThemLichHen">Thêm Lịch Hẹn</button>
        </form>

        <h3 class="text-center mb-4">Lịch Hẹn Tuần Từ <?php echo $startOfWeek; ?> Đến <?php echo $endOfWeek; ?></h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Ngày Giờ</th>
                    <th>Loại Lịch Hẹn</th>
                    <th>Trạng Thái</th>
                    <th>ID Bệnh Nhân</th>
                    <th>ID Nhân Viên</th>
                    <th>Loại Lịch Đặt</th>
                    <th>Ghi Chú</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($lich_hen) {
                    foreach ($lich_hen as $lich) {
                        echo '
                        <tr>
                            <td>' . $lich["ngay_gio"] . '</td>
                            <td>' . $lich["loai_lich_hen"] . '</td>
                            <td>' . $lich["trang_thai"] . '</td>
                            <td>' . $lich["id_benh_nhan"] . '</td>
                            <td>' . $lich["id_nhan_vien"] . '</td>
                            <td>' . $lich["loai_lich_dat"] . '</td>
                            <td>' . $lich["ghiChu"] . '</td>
                            <td>
                                <form method="post" action="xoa_lich_hen.php" style="display:inline;">
                                    <input type="hidden" name="id_lich_hen" value="' . $lich["id_lich_hen"] . '">
                                    <button type="submit" name="btnXoa" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc muốn xóa lịch hẹn này không?\')">Xóa</button>
                                </form>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="8" class="text-center">Không có lịch hẹn nào trong tuần này</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="path/to/bootstrap.js"></script>
</body>
</html>
