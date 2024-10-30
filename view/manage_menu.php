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

        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                <i class="bi bi-plus-lg"></i> Thêm Thực Đơn
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="menuTable">
                <thead class="thead-light">
                    <tr>
                        <th>Mã Thực Đơn</th>
                        <th>Món Ăn</th>
                        <th>Chỉ Số Dinh Dưỡng</th>
                        <th>Trạng Thái</th>
                        <th>Ghi Chú</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>TD001</td>
                        <td>Salad Trái Cây</td>
                        <td>Calories: 150 kcal</td>
                        <td><span class="badge badge-success">Đang áp dụng</span></td>
                        <td>Thích hợp cho người giảm cân</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Sửa</button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Xoá</button>
                        </td>
                    </tr>
                    <tr>
                        <td>TD002</td>
                        <td>Cháo Yến Mạch</td>
                        <td>Calories: 200 kcal</td>
                        <td><span class="badge badge-danger">Ngừng áp dụng</span></td>
                        <td>Thích hợp cho người lớn tuổi</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Sửa</button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Xoá</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination and Page Info -->
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
    </div>

    <!-- Modal-->
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
                    <form id="addMenuForm">
                        <div class="form-group">
                            <label for="menuId">Mã Thực Đơn</label>
                            <input type="text" class="form-control" id="menuId" required>
                        </div>
                        <div class="form-group">
                            <label for="menuItem">Món Ăn</label>
                            <input type="text" class="form-control" id="menuItem" required>
                        </div>
                        <div class="form-group">
                            <label for="nutritionInfo">Chỉ Số Dinh Dưỡng</label>
                            <input type="text" class="form-control" id="nutritionInfo" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng Thái</label>
                            <select class="form-control" id="status">
                                <option value="active">Đang áp dụng</option>
                                <option value="inactive">Ngừng áp dụng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="notes">Ghi Chú</label>
                            <textarea class="form-control" id="notes"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addMenu()">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let currentPage = 0;
        const rowsPerPage = 5;
        let rows = document.querySelectorAll("#menuTable tbody tr");
        let totalPages = Math.ceil(rows.length / rowsPerPage);
        
        // Tạo thể hiện modal
        const addMenuModal = new bootstrap.Modal(document.getElementById("addMenuModal"));

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

        function addMenu() {
            const menuId = document.getElementById("menuId").value;
            const menuItem = document.getElementById("menuItem").value;
            const nutritionInfo = document.getElementById("nutritionInfo").value;
            const status = document.getElementById("status").value;
            const notes = document.getElementById("notes").value;

            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${menuId}</td>
                <td>${menuItem}</td>
                <td>${nutritionInfo}</td>
                <td><span class="badge ${status === "active" ? "badge-success" : "badge-danger"}">${status === "active" ? "Đang áp dụng" : "Ngừng áp dụng"}</span></td>
                <td>${notes}</td>
                <td>
                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Sửa</button>
                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Xoá</button>
                </td>`;
            
            document.querySelector("#menuTable tbody").appendChild(newRow);

            // Cập nhật phân trang
            rows = document.querySelectorAll("#menuTable tbody tr");
            totalPages = Math.ceil(rows.length / rowsPerPage);
            displayRows();
            
            // Đặt lại biểu mẫu
            document.getElementById("addMenuForm").reset();

            // Đóng modal
            addMenuModal.hide();
        }
    </script>
</body>

</html>
