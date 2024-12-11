<?php
// Code by ThanhTong(2T)

session_start();

$id = $_SESSION['id'];
// echo $id;
include_once("../controller/BSDD/cMenu.php");
include_once("../controller/BSDD/cNhanVien.php");

$nhanVien = new NhanVien();
$dt = $nhanVien->selectNhanVien();


if($dt && mysqli_num_rows($dt) > 0) {
    $row = mysqli_fetch_assoc($dt);
} else {
    die("Không thể lấy dữ liệu từ cơ sở dữ liệu.");
}
// echo $row["id"];

$menu = new MenuBS();
$data = $menu->selectMenu();
if ($data) {
    $menuData = $data;
} else {
    die("Không thể lấy dữ liệu từ cơ sở dữ liệu.");
}






?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thực đơn dinh dưỡng</title>
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
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Quản lý thực đơn dinh dưỡng</h1>

        <?php if ($data && mysqli_num_rows($data) > 0): ?>

        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                <i class="bi bi-plus-lg"></i> Thêm Thực Đơn
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="menuTable">
                <thead class="thead-light">
                    <tr>
                        <th>Mã Món Ăn</th>
                        <th>Tên Món Ăn</th>
                        <th>Chỉ Số Dinh Dưỡng</th>
                        <th>Ngày Tạo</th>
                        <th>Mã Thực Đơn</th>
                        <th>Ghi Chú</th>
                        <th>Thao Tác</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($data)): 

                        $ngaytao = $row["ngay_tao"];
                        $ngaytao = date("d-m-Y", strtotime($ngaytao));

                        ?>
                    <tr>
                        <td><?php echo $row["ma_mon_an"]; ?></td>
                        <td><?php echo $row["ten_mon_an"]; ?></td>
                        <td><?php echo $row["chi_so_dinh_duong"]; ?></td>
                        <td><?php echo $ngaytao; ?></td>
                        <td><?php echo $row["ma_thuc_don"]; ?></td>
                        <td><?php echo $row["ghi_chu"]; ?></td>
                        <!-- <td></td> -->
                        <td>
                            <a href="BacSiDD.php?page=update_menu&id=<?= $row['id_mon_an'] ?>"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="vDelete_menu.php?id=<?= $row['id_mon_an'] ?>"
                                class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <div>
                <span id="pageInfo">Trang 1/1</span>
            </div>
            <div>
                <nav aria-label="Page navigation" id="pagination">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" onclick="changePage(-1)">«</a></li>
                        <li class="page-item active"><a class="page-link" href="#" onclick="changePage(0)">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(1)">»</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php else: ?>
        <p class="text-center">Không có thực đơn nào.</p>
        <?php endif; ?>

    </div>
    <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Thêm Thực Đơn Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addMenuForm" method="POST">
                        <div class="form-group">
                            <label for="maMonAn">Mã Món Ăn</label>
                            <input type="text" class="form-control" id="maMonAn" name="maMonAn" required>
                        </div>
                        <div class="form-group">
                            <label for="tenMonAn">Tên Món Ăn</label>
                            <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" required>
                        </div>
                        <div class="form-group">
                            <label for="chiSoDinhDuong">Chỉ Số Dinh Dưỡng</label>
                            <input type="text" class="form-control" id="chiSoDinhDuong" name="chiSoDinhDuong" required>
                        </div>
                        <div class="form-group">
                            <label for="idNguoiTao">ID Người Tạo</label>
                            <input type="text" class="form-control" id="idNguoiTao" name="idNguoiTao" readonly
                                value="<?php echo $_SESSION['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="maThucDon">Mã Thực Đơn</label>
                            <input type="text" class="form-control" id="maThucDon" name="maThucDon" required>
                        </div>
                        <div class="form-group">
                            <label for="ghiChu">Ghi Chú</label>
                            <textarea class="form-control" id="ghiChu" name="ghiChu"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_menu">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php
    if(isset($_POST['add_menu'])) {
        $maMonAn = $_POST['maMonAn'];
        $tenMonAn = $_POST['tenMonAn'];
        $chiSoDinhDuong = $_POST['chiSoDinhDuong'];
        $idNguoiTao = $_POST['idNguoiTao'];
        $maThucDon = $_POST['maThucDon'];
        $ghiChu = $_POST['ghiChu'];
        // $ngayTao = date('Y-m-d H:i:s');

        $result = $menu->insertMenu($maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $maThucDon,$ghiChu);
        if ($result) {
            echo "<script>alert('Thêm thực đơn thành công');</script>";
            echo "<script>window.location.href = 'BacSiDD.php?page=menu';</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm thực đơn. Vui lòng thử lại.');</script>";
        }
    }

    

    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    let currentPage = 0;
    const rowsPerPage = 5;
    let rows = document.querySelectorAll("#menuTable tbody tr");
    let totalPages = Math.ceil(rows.length / rowsPerPage);

    const addMenuModal = new bootstrap.Modal(document.getElementById("addMenuModal"));
    const addMenuForm = document.getElementById("addMenuForm");




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
        document.querySelector('.page-item.active').classList.remove('active');
        document.querySelectorAll('.page-item')[1 + currentPage].classList.add('active');
        document.querySelector('.page-item.disabled').classList.toggle('disabled', currentPage === 0);
        document.querySelectorAll('.page-item')[2].classList.toggle('disabled', currentPage === totalPages - 1);
    }

    displayRows();
    </script>
</body>

</html>