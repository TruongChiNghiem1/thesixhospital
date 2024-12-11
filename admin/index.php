<?php
error_reporting(0);
include_once("controller/admin.php");
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../login.php");
    }else{
        if (strpos($_SESSION['loai_nhan_vien'], 2) !== false) {
            header("Location: BSSucKhoe.php");
        } elseif(strpos($_SESSION['loai_nhan_vien'], 3) !== false){
            header("Location: ../view/BacSiDD.php");
        }
    }

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 border-right" style="height: 100vh">
                <!-- <div class="d-flex justify-content-between align-items-center"> -->
                <div class="logo d-flex justify-content-between align-items-center mt-5">
                    <a href="index.html"><img src="..\assets\images\logo.jpg" alt="Logo" srcset=""
                            style="width: 100px; height: 100px; border-radius: 50%; padding-right: 10px;"></a>
                    <h4>Admintrator <span>admin@gmail.com</span></h4>
                </div>

                <div style="width: 100%; display: flex; justify-content: center;">
                    <form method="POST" style="width: 100%; display: flex; justify-content: center;">
                        <button name="btnLogout" type="submit" class="btn btn-primary w-75" data-mdb-ripple-init>
                            Log Out
                        </button>
                    </form>
                </div>

                     <?php
                            if (isset($_POST['btnLogout'])) {
                                echo "logout";
                                include_once("../logout.php");
                            }
                    ?>


                <div class="list-group b4-bordor mt-3">
                    <a href="../view/view_dashboard.php" class="list-group-item list-group-item-action">Trang chủ</a>
                    <a href="index.php" class="list-group-item list-group-item-action">Quản lý nhân sự</a>
                    <a href="../view/view_schedule.php" class="list-group-item list-group-item-action">Phân lịch ca
                        trực</a>
                    <a href="../view/view_approveleave.php" class="list-group-item list-group-item-action">Duyêt đơn
                        nghỉ phép</a>
                </div>


            </div>

            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr class="d-flex">
                            <th class="d-flex align-items-center mr-auto w-75" style="border-bottom: 2px solid #ffff;">
                                <input type="search" class="form-control rounded mr-2" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-primary" data-mdb-ripple-init>search</button>
                            </th>

                            <th class="d-flex align-items-center" style="border-bottom: 2px solid #ffff;">
                                <span class="mr-3">Today's date <br> <span>29/10/2024</span></span>
                                <div class="border border-dark background-color rounded p-2">
                                    <i class="bi bi-calendar-event-fill "></i>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td style="border: 2px solid #ffff;">
                                <a href="../view/add_personnel.php"><button id='btn-add' type='button'
                                        class='btn btn-outline-primary'>Thêm Nhân Viên</button></a>
                            </td>
                        </tr>
                        <tr>
                            <?php
                                if(isset($_GET['view']) && $_GET['view'] == 'nhanVien' && isset($_GET['id'])){
                                    $userId = $_GET['id'];
                                    include_once("../view/view_personnel.php");
                                }elseif(isset($_GET['update']) && $_GET['update'] == 'nhanVien' && isset($_GET['id'])){
                                    $userId = $_GET['id'];
                                    include_once("../view/update_personnel.php");
                                }else{
                                    include_once("../view/admin.php");
                                }
                                ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>