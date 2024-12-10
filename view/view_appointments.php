<?php
// Code by ThanhTong(2T)
include_once "../controller/bsdd/cTuVanHen.php";

// Kiểm tra nếu file tồn tại
if (!file_exists("../controller/bsdd/cTuVanHen.php")) {
    die("File cTuVanHen.php không tồn tại.");
}

// Khởi tạo và lấy dữ liệu
$p = new cTuVanHen();
$data = $p->select();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Lịch Hẹn Bệnh Nhân</title>
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
        <h1 class="text-center">Lịch Hẹn Bệnh Nhân</h1>

        <!-- Bộ lọc theo ngày -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="fromDate">Từ ngày:</label>
                <input type="date" class="form-control" id="fromDate">
            </div>
            <div class="col-md-6">
                <label for="toDate">Đến ngày:</label>
                <input type="date" class="form-control" id="toDate">
            </div>
        </div>

        <?php if ($data && mysqli_num_rows($data) > 0): ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="appointmentTable">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Điện thoại</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($data)):
                            switch ($row['trang_thai']) {
                                case '1':
                                    $statusClass = 'badge-danger';
                                    $statusText = 'chờ bác sĩ';
                                    break;
                                case '2':
                                    $statusClass = 'badge-success';
                                    $statusText = 'khám thành công';
                                    break;
                                default:
                                    $statusClass = 'badge-warning';
                                    $statusText = 'chờ khám';
                                    break;
                            }
                            ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['ten_benh_nhan']) ?></td>
                        <td><?= htmlspecialchars($row['so_dien_thoai']) ?></td>
                        <td><?= htmlspecialchars($row['ngay_gio']) ?></td>
                        <td><span class="badge <?= $statusClass ?>"><?= $statusText ?></span></td>
                        <td><?= htmlspecialchars($row['ghiChu']) ?></td>
                        <td>
                            <!-- Nút Cập nhật trạng thái -->
                            <button type="button" class="btn btn-warning btn-sm update-btn"
                                data-id="<?= $row['id_lich_hen'] ?>" data-status="<?= $row['trang_thai'] ?>">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Nút Xóa -->
                            <a href="delete_appointment.php?id=<?= $row['id_lich_hen'] ?>"
                                class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Phân trang -->
        <div class="d-flex justify-content-between mt-3">
            <span id="pageInfo">Trang 1/1</span>
            <div>
                <button class="btn btn-primary btn-sm" onclick="changePage(-1)" id="prevPage">Trước</button>
                <button class="btn btn-primary btn-sm" onclick="changePage(1)" id="nextPage">Tiếp</button>
            </div>
        </div>
        <?php else: ?>
        <p class="text-center">Không có lịch hẹn nào.</p>
        <?php endif; ?>
    </div>

    <!-- Modal cập nhật trạng thái -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="statusForm" action="update_status.php" method="post">
                        <input type="hidden" name="appointment_id" id="appointment_id">
                        <div class="form-group">
                            <label for="status">Trạng thái:</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="1">Chờ bác sĩ</option>
                                <option value="2">Khám thành công</option>
                                <option value="3">Chờ khám</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm mt-3">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script>
    // Sự kiện cho nút Cập nhật
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', function() {
            const appointmentId = this.getAttribute('data-id');
            const status = this.getAttribute('data-status');

            // Điền dữ liệu vào trong modal
            document.getElementById('appointment_id').value = appointmentId;
            document.getElementById('status').value = status;

            // Mở modal
            $('#updateStatusModal').modal('show');
        });
    });

    // Phân trang
    let currentPage = 0;
    const rowsPerPage = 5;
    const rows = document.querySelectorAll("#appointmentTable tbody tr");
    const totalPages = Math.ceil(rows.length / rowsPerPage);

    function changePage(direction) {
        currentPage += direction;

        if (currentPage < 0) {
            currentPage = 0;
        } else if (currentPage >= totalPages) {
            currentPage = totalPages - 1;
        }

        displayRows();
    }

    function displayRows() {
        const start = currentPage * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach((row, index) => {
            row.classList.add('hidden');
            if (index >= start && index < end) {
                row.classList.remove('hidden');
            }
        });

        document.getElementById("pageInfo").innerText = `Trang ${currentPage + 1}/${totalPages}`;

        document.getElementById("prevPage").disabled = currentPage === 0;
        document.getElementById("nextPage").disabled = currentPage === totalPages - 1;
    }

    displayRows();
    </script>
</body>

</html>