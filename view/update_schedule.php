<!doctype html>
<html lang="en">
<head>
    <title>Update Schedule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Schedule</h2>
        <?php
            // Include your database connection and functions
            include_once("../controller/admin.php");
            $p = new controllerAdmin();

            // Get the schedule ID from the query string
            $idLich = isset($_GET['id']) ? $_GET['id'] : null;
            if ($idLich) {
                // Fetch schedule details from the database
                $schedule = $p->selectScheduleById($idLich);

                if ($schedule) {
                    $selectedId = $schedule['id_nhan_vien'];
                    $ngayTruc = $schedule['ngay_lam'];
                    $caTruc = $schedule['ca_lam'];
                    $ghiChu = $schedule['ghi_chu'];
                    $name = $schedule['ho_ten'];
                } else {
                    echo "<div class='alert alert-warning mt-3'>Không tìm thấy lịch trực với ID này.</div>";
                }
            } else {
                echo "<div class='alert alert-warning mt-3'>ID lịch trực không hợp lệ.</div>";
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Hidden input for the schedule ID -->
            <input type="hidden" name="idLich" value="<?php echo htmlspecialchars($idLich); ?>">

            <div class="form-group">
                <label for="chonTenNV">Tên nhân viên</label>
                <select name="chonTenNV" class="form-control">
                    <?php
                        include("optionTenNV.php"); // Populate dropdown options with employee names and IDs
                        // Select the current employee based on $selectedId
                        
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtNgayTruc">Ngày trực</label>
                <input type="date" name="txtNgayTruc" class="form-control" value="<?php echo htmlspecialchars($ngayTruc); ?>" required>
            </div>

            <div class="form-group">
                <label for="chonCaTruc">Ca trực</label>
                <select name="chonCaTruc" class="form-control">
                    <?php
                        include("optionCaTruc.php"); // Populate dropdown options for shifts
                        // Select the current shift based on $caTruc

                        // echo "<option value='$caTruc' selected>$currentLoaiTaiKhoan</option>";   
                        
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtGhiChu">Ghi chú</label>
                <input type="text" name="txtGhiChu" class="form-control" value="<?php echo htmlspecialchars($ghiChu); ?>" required>
            </div>

            <button type="submit" name="btnSubmit" class="btn btn-primary">Cập nhật ca trực</button>
        </form>
    </div>

    <?php
        if (isset($_POST['btnSubmit'])) {
            $idLich = isset($_POST['idLich']) ? $_POST['idLich'] : null;
            $selectedId = isset($_POST['chonTenNV']) ? $_POST['chonTenNV'] : null;
            $ngayTruc = $_POST['txtNgayTruc'];
            $caTruc = $_POST['chonCaTruc'];
            $ghiChu = $_POST['txtGhiChu'];
            
            if ($idLich && $selectedId && $ngayTruc && $caTruc) {
                if ($p->updateSchedule($idLich, $selectedId, $ngayTruc, $caTruc, $ghiChu)) {
                    echo "<div class='alert alert-success mt-3'>Cập nhật lịch trực thành công</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Cập nhật lịch trực thất bại</div>";
                }
            } else {
                echo "<div class='alert alert-warning mt-3'>Vui lòng điền đầy đủ thông tin</div>";
            }
        }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
