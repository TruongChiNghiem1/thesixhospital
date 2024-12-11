<?php
    session_start();
    if(!isset($_SESSION['isLoggedIn'])){
        header("Location: ../login.php");
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
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .container {
        width: 70%;
        margin: 10px auto;
    }
 
    /* body {
        text-align: center;
        color: green;
    } */
 
    h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 30px;
    }
</style>
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
                    <a href="" class="list-group-item list-group-item-action">Trang chủ</a>
                    <a href="../admin/index.php" class="list-group-item list-group-item-action">Quản lý nhân sự</a>
                    <a href="../view/view_schedule.php" class="list-group-item list-group-item-action">Phân lịch ca
                        trực</a>
                    <a href="view_approveleave.php" class="list-group-item list-group-item-action">Duyệt đơn nghỉ
                        phép</a>
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
                            <td style="border: 2px solid #ffff;">Trang chủ</td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-4" style="margin-top: 20px">
                        <div class="card border-success">
                            <div class="card-body bg-success text-white">
                            <div class="row">
                                <div class="col-3">
                                <i class="fa fa-user-tie fa-5x"></i>
                                </div>
                                <div class="col-9 text-right">
                                <h1>
                                    <?php
                                        include_once("../controller/admin.php");

                                        $p = new controllerAdmin();
                                        echo $p->getCountNhanVien();
                                    ?>
                                </h1>
                                <h4>Nhân sự</h4>
                                </div>
                            </div>
                            </div>
                            <a href="../admin/index.php" target="_blank">
                            <div class="card-footer bg-light text-success">
                                <span class="float-left">Chi tiết</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4" style="margin-top: 20px">
                    <div class="card border-danger">
                        <div class="card-body bg-danger text-white">
                        <div class="row">
                            <div class="col-3">
                            <i class="fa-regular fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                            <h1>
                                <?php
                                        include_once("../controller/admin.php");

                                        $p = new controllerAdmin();
                                        echo $p->getCountSchedule();
                                    ?>
                                    </h1>
                            <h4>Phân lịch làm việc</h4>
                            </div>
                        </div>
                        </div>
                        <a href="view_schedule.php" target="_blank">
                        <div class="card-footer bg-light text-danger">
                            <span class="float-left">Chi tiết</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        </a>
                    </div>
                    </div>
    
                    <div class="col-4" style="margin-top: 20px">
                    <div class="card border-info">
                        <div class="card-body bg-info text-white">
                        <div class="row">
                            <div class="col-3">
                            <i class="fa fa-suitcase fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                            <h1>
                                <?php
                                    include_once("../controller/admin.php");

                                    $p = new controllerAdmin();
                                    echo $p->getCountApproveLeave();
                                    ?>
                            </h1>
                            <h4>Đơn nghỉ phép</h4>
                            </div>
                        </div>
                        </div>
                        <a href="view_approveleave.php" target="_blank">
                        <div class="card-footer bg-light text-info">
                            <span class="float-left">Chi tiết</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        </a>
                    </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 0px;">
                    <div class="col-6">
                        <p style="margin: 50px; text-align: center;">Thống kê đơn nghỉ phép</p>
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="col-6">
                        <p style="margin: 50px; text-align: center;">Thống kê lịch làm việc</p>
                        <canvas id="barChart"></canvas>

                    </div>
                </div>


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
<script>

    <?php
        include_once("../controller/admin.php");

        $p = new controllerAdmin();
        $duyetThanhCong = $p->countScheduleByTrangThai(1);
        $duyetThatBai = $p->countScheduleByTrangThai(2);
        $choDuyet = $p->countScheduleByTrangThai(3);
        
    ?>

    let ctx = document.getElementById("pieChart").getContext("2d");
    $data = [<?php echo $duyetThanhCong ?>, <?php echo $duyetThatBai ?>, <?php echo $choDuyet ?>];

    let pieChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: [
                'Chờ duyệt',
                'Duyệt thành công',
                'Duyệt thất bại'
            ],
            datasets: [{
                label: 'Thống kê đơn nghỉ phép',
                data: $data,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
            },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Thống kê đơn nghỉ phép'
            }
            }
        },
    });
</script>

<script>

    <?php
        include_once("../controller/admin.php");

        $p = new controllerAdmin();
        $caSang = $p->countApproveLeaveByTrangThai(1);
        $caChieu = $p->countApproveLeaveByTrangThai(2);
        $caToi = $p->countApproveLeaveByTrangThai(3);
        $OT = $p->countApproveLeaveByTrangThai(4);
    ?>

    let barCtx = document.getElementById("barChart").getContext("2d");

    $dataAA = [<?php echo $caSang ?>, <?php echo $caChieu ?>, <?php echo $caToi ?>, <?php echo $OT ?>];
    console.log(<?php echo $caSang ?>);

    let barChart = new Chart(barCtx, {
        type: "bar",
        data: {
            labels: [
                "Ca Sáng",
                "Ca chiều",
                "Ca tối",
                "OT"
            ],
            datasets: [
                {
                    // label: "Thống kê ca trực",
                    data: $dataAA,
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(255, 123, 34)',
                    ],
                    borderWidth: 1
                },
        ]
            },
        options: {
            legend: {
                      display: false
                    },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    stepSize: 1
                    }
                }]
                }
        },
    });
</script>

</html>