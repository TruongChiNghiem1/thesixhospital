<?php
// Code by ThanhTong(2T)
include_once("../controller/BSDD/cUser.php");
$user = new UserController();
$data = $user->viewUser();

if (!$data) {
    die("Không thể lấy dữ liệu từ cơ sở dữ liệu.");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin bệnh nhân</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
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

        .hidden {
            display: none;
        }

        .dropdown-menu {
            min-width: 200px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Quản lý thông tin bệnh nhân</h1>


        <?php if ($data && mysqli_num_rows($data) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="appointmentTable">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tòng cute</td>
                        <td>0982954794</td>
                        <td>30/10/2024</td>
                        <td>
                            <span class="badge badge-danger">Nam</span>
                        </td>
                        <td>Quảng Ninh</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="BacSiDD.php?page=medical_records">Xem hồ sơ bệnh án</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addNutritionMenuModal">Thêm thực đơn dinh dưỡng cho bệnh nhân</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lê Thị Hương</td>
                        <td>0499751594</td>
                        <td>30/10/2024</td>
                        <td>
                            <span class="badge badge-success">Nữ</span>
                        </td>
                        <td>Bắc Kinh</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Xem hồ sơ bệnh án</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addNutritionMenuModal">Thêm thực đơn dinh dưỡng</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


            <div class="text-right mb-3">
                <a href="BacSiDD.php?page=add_thucdon" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Thêm Thực Đơn Cho Bệnh Nhân
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="appointmentTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Khách hàng</th>
                            <th>Điện thoại</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Thực đơn</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($data)): ?>

                            <?php
                            $gioi_tinh = $row['gioi_tinh'] == 1 ? "Nam" : "Nữ";
                            $color = $row['gioi_tinh'] == 1 ? "badge-success" : "badge-danger";
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['ten_benh_nhan']; ?></td>
                                <td><?php echo $row['so_dien_thoai']; ?></td>
                                <td><?php echo $row['ngay_sinh']; ?></td>
                                <td>
                                    <span class="badge <?php echo $color; ?>"><?php echo $gioi_tinh; ?></span>
                                </td>
                                <td><?php echo $row['dia_chi']; ?></td>
                                <td><?php echo $row['ma_thuc_don']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning btn-sm update-btn"
                                            data-id="<?= $row['id_benh_nhan'] ?>" data-status="<?= $row['ma_thuc_don'] ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <a href="delete_benhnhan.php?id=<?= $row['id_thuc_don_dinh_duong'] ?>"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </a>

                                        <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="BacSiDD.php?page=medical_records&id=<?= $row['id_ho_so_benh_an'] ?>">Xem hồ sơ
                                                bệnh án</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++; endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <div class="d-flex justify-content-between mt-3">
                <div>
                    <span id="pageInfo">Trang 1/1</span>
                </div>
                <div>
                    <nav aria-label="Page navigation" id="pagination">
                        <ul class="pagination">
                            <li class="page-item disabled" id="prevItem">
                                <a class="page-link" href="#" onclick="changePage(-1)">«</a>
                            </li>
                            <li class="page-item active" id="pageNum">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item" id="nextItem">
                                <a class="page-link" href="#" onclick="changePage(1)">»</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php else: ?>
            <p class="text-center">Không có dữ liệu bệnh nhân nào.</p>
        <?php endif; ?>
    </div>

    <!-- Modal Cập Nhật Mã Thực Đơn -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Cập nhật mã thực đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="statusForm" action="update_nutrition_menu.php" method="post">
                        <input type="hidden" name="id_benh_nhan" id="id_benh_nhan">
                        <div class="form-group">
                            <label for="status">Mã Thực Đơn</label>
                            <input type="text" name="status" class="form-control" id="status" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm mt-3">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
         document.querySelectorAll('.update-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const status = this.getAttribute('data-status');

                // Cập nhật thông tin vào modal
                document.getElementById('id_benh_nhan').value = id;
                document.getElementById('status').value = status;

                // Mở modal
                $('#updateStatusModal').modal('show');
            });
        });
        let currentPage = 0; // Trang hiện tại
        const rowsPerPage = 5; // Số hàng trên mỗi trang
        const rows = document.querySelectorAll("#appointmentTable tbody tr"); // Tất cả các hàng
        const totalPages = Math.ceil(rows.length / rowsPerPage); // Tổng số trang

        function updatePagination() {
            document.getElementById("pageInfo").innerText = `Trang ${currentPage + 1}/${totalPages}`;
            document.getElementById("prevItem").classList.toggle("disabled", currentPage === 0);
            document.getElementById("nextItem").classList.toggle("disabled", currentPage === totalPages - 1);
        }

        function displayRows() {
            const start = currentPage * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.classList.add("hidden");
                if (index >= start && index < end) {
                    row.classList.remove("hidden");
                }
            });
        }

        function changePage(direction) {
            currentPage += direction;
            if (currentPage < 0) currentPage = 0;
            if (currentPage >= totalPages) currentPage = totalPages - 1;
            displayRows();
            updatePagination();
        }

        displayRows();
        updatePagination();
    </script>

</body>
</html>
