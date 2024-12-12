<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <?php
  session_start();
  ?>
  <body>
      <div class="container-fluid">
            <div class="row flex-nowrap">
                <?php
                include '../leftMenu.php';
                ?>
<!--                <div class="col-md-3 border-right" style="height: 100vh"   >-->
<!--                    <!-- <div class="d-flex justify-content-between align-items-center"> -->
<!--                        <div class="logo d-flex justify-content-between align-items-center mt-5">-->
<!--                            <a href="index.html"><img src="..\assets\images\logo.jpg" alt="Logo" srcset="" style="width: 100px; height: 100px; border-radius: 50%; padding-right: 10px;"></a>-->
<!--                            <h4>Admintrator <span>admin@gmail.com</span></h4>-->
<!--                        </div>-->
<!---->
<!--                        <div style="width: 100%; display: flex; justify-content: center;">-->
<!--                            <button type="button" class="btn btn-primary w-75" data-mdb-ripple-init>log out</button>-->
<!--                        </div>-->
<!--                                     -->
<!--                        -->
<!--                    <div class="list-group b4-bordor mt-3">-->
<!--                        <a href="../admin/index.php" class="list-group-item list-group-item-action">Trang chủ</a>-->
<!--                        <a href="../admin/index.php" class="list-group-item list-group-item-action">Quản lý nhân sự</a>-->
<!--                        <a href="../view/view_schedule.php"  class="list-group-item list-group-item-action">Phân lịch ca trực</a>-->
<!--                        <a href="../admin/index.php" class="list-group-item list-group-item-action">Duyệt đơn nghỉ phép</a>-->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->
                
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr class="d-flex">
                                <th class="d-flex align-items-center mr-auto w-75" style="border-bottom: 2px solid #ffff;">
                                    <input type="search" class="form-control rounded mr-2" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-primary" data-mdb-ripple-init>Tìm</button>             
                                </th>

                                <th class="d-flex align-items-center" style="border-bottom: 2px solid #ffff;">
                                    <span class="mr-3">Ngày hôm nay <br> <span>13/12/2024</span></span>
                                    <div class="border border-dark background-color rounded p-2" >
                                        <i class="bi bi-calendar-event-fill "></i>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td style="border: 2px solid #ffff;">Phân lịch ca trực</td>
                            </tr>
                            <tr>
                            <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label for="chonTenNV">Tên nhân viên</label></td>
                    <td>
                        <select name="chonTenNV" class="form-control">
                            <?php
                                include("optionTenNV.php");
                            ?>
                        </select>
                    </td>
                </tr>    
                <tr>
                    <td><label for="txtNgayTruc">Ngày trực</label></td>
                    <td><input type="date" name="txtNgayTruc" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="chonCaTruc">Ca trực</label></td>
                        <td>
                            <select name="chonCaTruc" class="form-control">
                                <?php
                                    include("optionCaTruc.php");
                                ?>
                            </select>
                        </td>
                        <tr>
                            <td><label for="txtGhiChu">Ghi chú</label></td>
                            <td><input type="text" name="txtGhiChu" class="form-control" required></td>
                        </tr>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btnSubmit" class="btn btn-primary" value="Thêm ca trực">
                    </td>
                </tr>
            </table>
        </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
      </div>

      <?php
    include_once("../controller/admin.php");
    $p = new controllerAdmin();

    if (isset($_POST['btnSubmit'])) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $selectedId = isset($_POST['chonTenNV']) ? $_POST['chonTenNV'] : null;
            $ngayTruc = $_POST['txtNgayTruc'];
            $caTruc = $_POST['chonCaTruc'];
            $ghiChu = $_POST['txtGhiChu'];

            if ($selectedId && $ngayTruc && $caTruc) {
                if ($p->insertSchedule($selectedId, $ngayTruc, $caTruc, $ghiChu)) {
                    echo "<div class='alert alert-success mt-3'>Thêm lịch trực thành công</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Thêm lịch trực thất bại</div>";
                }
            } else {
                echo "<div class='alert alert-warning mt-3'>Vui lòng điền đầy đủ thông tin.</div>";
            }
        }
    }
    ?>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="/thesixhospital/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>