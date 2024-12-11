<?php
// Code by ThanhTong(2T)
session_start();

include_once "../controller/BSDD/cDonXinNghi.php";

// Kiểm tra nếu file tồn tại
if (!file_exists("../controller/BSDD/cDonXinNghi.php")) {
    die("File cDonXinNghi.php không tồn tại.");
}

// Khởi tạo và lấy dữ liệu
$donXinNghi = new DonXinNghi();
$data = $donXinNghi->selectDonXinNghi();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Đơn Xin Nghỉ</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS, Popper.js và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .table-responsive {
        margin-top: 20px;
    }

    .badge-status {
        font-weight: bold;
    }

    .badge-danger {
        background-color: #f44336;
        color: white;
    }

    .badge-success {
        background-color: #4caf50;
        color: white;
    }

    .badge-warning {
        background-color: #ff9800;
        color: white;
    }

    .hidden {
        display: none;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh Sách Đơn Xin Nghỉ</h1>

        <!-- Bộ lọc theo trạng thái -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="filterStatus">Lọc theo trạng thái:</label>
                <select class="form-control" id="filterStatus">
                    <option value="all">Tất cả</option>
                    <option value="1">Chờ Duyệt</option>
                    <option value="2">Đã Duyệt</option>
                    <option value="3">Bị Từ Chối</option>
                </select>
            </div>
        </div>

        <?php if ($data && mysqli_num_rows($data) > 0): ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="leaveRequestTable">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nhân Viên</th>
                        <th>Ngày Nghỉ</th>
                        <th>Lý Do</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($data)):
                            switch ($row['trang_thai']) {
                                case '1':
                                    $statusClass = 'badge-warning';
                                    $statusText = 'Duyệt thành công';
                                    break;
                                case '2':
                                    $statusClass = 'badge-success';
                                    $statusText = 'Duyệt thất bại';
                                    break;
                                case '3':
                                    $statusClass = 'badge-danger';
                                    $statusText = 'Chờ duyệt';
                                    break;
                                default:
                                    $statusClass = '';
                                    $statusText = 'Không xác định';
                                    break;
                            }
                            ?>
                    <tr data-status="<?= $row['trang_thai'] ?>">
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['ho_ten']) ?></td>
                        <td><?= htmlspecialchars($row['ngay_nghi']) ?></td>
                        <td><?= htmlspecialchars($row['ly_do_nghi']) ?></td>
                        <td><span class="badge <?= $statusClass ?>"><?= $statusText ?></span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>
        <p class="text-center">Không có đơn xin nghỉ nào.</p>
        <?php endif; ?>
    </div>

    <script>
    // Lọc theo trạng thái
    document.getElementById('filterStatus').addEventListener('change', function() {
        const status = this.value;
        const rows = document.querySelectorAll('#leaveRequestTable tbody tr');

        rows.forEach(row => {
            if (status === 'all' || row.getAttribute('data-status') === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Xử lý duyệt và từ chối
    document.querySelectorAll('.approve-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Bạn có chắc muốn duyệt đơn này?')) {
                window.location.href = `approve_leave.php?id=${id}`;
            }
        });
    });

    document.querySelectorAll('.reject-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Bạn có chắc muốn từ chối đơn này?')) {
                window.location.href = `reject_leave.php?id=${id}`;
            }
        });
    });
    </script>
</body>

</html>
