
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/bootstrap.min.css?v=5" >
    <link rel="stylesheet" href="/thesixhospital/assets/css/theme.min.css" >
    <link rel="stylesheet" href="/thesixhospital/assets/css/bootstrap.css" >
    <script src="/thesixhospital/assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/thesixhospital/assets/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/thesixhospital/assets/css/style.css?v=5" >
    
    <title>Bác sĩ sức khỏe</title>
    <style>
        ul,a {
            list-style: none;
            text-decoration: none;
            color: black;
        }
        li{
            margin-top: 30px;
        }
        .left, .right{
            min-height: 1000px;
        }
        .main{
            min-height: 850px;
            
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-light">
        <div class="row">
                <div class="col-md-2 bg-white rounded-3 left">
                    <div class="logo">
                        <div class="row">
                            <div class="col-4">
                                <img src="/thesixhospital/assets/images/logo.jpg" alt="Logo" class=""style="width: 90px; height: 60px;">
                            </div>
                            <div class="col-8 d-flex align-items-center justify-content-center">
                                THE SIX HOSPITAL
                            </div>

                        </div>
                    </div>
                    <ul>
                        <li><a href="index.php?page=dashboard"><img src="/thesixhospital/assets/images/dashboard.svg" alt="" style="width:30px; height: 30px"> Bảng điều khiển</a></li>
                        <li><a href="index.php?page=patient"><img src="/thesixhospital/assets/images/patient.svg" alt="" style="width:30px; height: 30px"> Bệnh nhân</a></li>
                        <li><a href="index.php?page=calender"><img src="/thesixhospital/assets/images/patient.svg" alt="" style="width:30px; height: 30px"> Lịch hẹn</a></li>
                        <li><a href="index.php?page=examination"><img src="/thesixhospital/assets/images/exam.svg" alt="" style="width:30px; height: 30px"> Khám bệnh</a></li>
                        <li><a href="index.php?page=report"><img src="/thesixhospital/assets/images/statistical.svg" alt="" style="width:30px; height: 30px"> Thống kê</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-10 right">
                    <div class="row bg-white rounded-3 mx-1 py-2">
                        <div class="col-9">

                        </div>

                        <div class="col-md-3 d-flex justify-content-end align-items-center">
                            <span class="me-3">Nguyễn Trường Sơn</span>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"><img src="/thesixhospital/assets/images/bacsi.png" class="rounded-circle border border-2" style="width:70px;height:70px;" alt=""></a>
                                <ul class="dropdown-menu mt-5">
                                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                                    <li><a class="dropdown-item" href="#">Quyền riêng tư</a></li>
                                    <li><a class="dropdown-item" href="#">Tùy chọn</a></li>
                                    <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>    
                    </div>

                    <div class="row bg-white rounded-3 mx-1 px-5 py-4 mt-3 main ">
