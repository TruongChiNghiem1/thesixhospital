<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Lịch Hẹn Bệnh Nhân</title>
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
        <h1 class="text-center">Lịch Hẹn Bệnh Nhân</h1>

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
                    <tr>
                        <td>1</td>
                        <td>Tòng cute</td>
                        <td>0982954794</td>
                        <td>30/10/2024 14:00</td>
                        <td>
                            <span class="badge badge-danger">Chưa chăm sóc</span>
                        </td>
                        <td>Cần tư vấn về thực đơn cho người gầy</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lê Thị Hương</td>
                        <td>0499751594</td>
                        <td>30/10/2024 15:00</td>
                        <td>
                            <span class="badge badge-success">Đã chăm sóc</span>
                        </td>
                        <td>Cần tư vấn về thực đơn cho người béo phì</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
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
            document.querySelector('.page-item.active').classList.remove('active');
            document.querySelectorAll('.page-item')[1 + currentPage].classList.add('active');

            document.querySelector('.page-item.disabled').classList.toggle('disabled', currentPage === 0);
            document.querySelectorAll('.page-item')[2].classList.toggle('disabled', currentPage === totalPages - 1);
        }

        displayRows();
    </script>
</body>

</html>
