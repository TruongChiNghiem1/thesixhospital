<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Profile</title>
    <style>
    .dashbord-tables {
        animation: transitionIn-Y-over 0.5s;
    }

    .filter-container {
        animation: transitionIn-X 0.5s;
    }

    .sub-table {
        animation: transitionIn-Y-bottom 0.5s;
    }
    </style>


</head>

<body>

    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="/thesixhospital/assets/images/logo.jpg" alt="" width="100%"
                                        style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Cao Dương Quốc Việt</p>
                                    <p class="profile-subtitle">Caoviet@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href=""><input type="button" value="Log out" class="btn btn-danger"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <div>
                            <a href="profile.php" class="non-style-link-menu">
                                <i class="fa-solid fa-user menu-icon"></i>
                                <p class="menu-text">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <div>
                            <a href="MyBooking.php" class="non-style-link-menu ">
                                <i class="fa-solid fa-bookmark menu-icon"></i>
                                <p class="menu-text">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-active">
                        <div>
                            <a href="#" class="non-style-link-menu non-style-link-menu-active">
                                <i class="fa-solid fa-book-medical menu-icon"></i>
                                <p class="menu-text">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">Scheduled Sessions</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <div>
                            <a href="appointment.php" class="non-style-link-menu">

                                <p class="menu-text">My Bookings</p>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>


        <a class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php"><button class="btn" style="margin-left: 20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Hồ sơ bệnh án</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">

                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/img/calendar.svg" width="100%"></button>
                    </td>
                </tr>


                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <br>
                                <br>
                                <table width="93%" class="sub-table scrolldown" border="0" style="border:none">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <center>
                                                    <div>
                                                        <table width="100%" border="0"
                                                            style="padding: 50px;border:none">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 25%;">
                                                                        <div class="HSBA">
                                                                            <div style="width:100%">
                                                                                <div class="">
                                                                                    <h1 style="text-align: center;">Bệnh
                                                                                        Án</h1>

                                                                                </div>

                                                                                <hr>
                                                                                <div class="">
                                                                                    <img style="width: 200px; height: 200px; margin-top: 20px; margin-left: 50px;"
                                                                                        src="/thesixhospital/assets/images/Screenshot 2024-10-29 224352.png"
                                                                                        alt="">

                                                                                    <p
                                                                                        style="float: right; margin-right: 100px;">
                                                                                        Ngày lập:
                                                                                        10/29/2024 <br> Mã hồ sơ:
                                                                                        2424525</p><br> <br>

                                                                                    <p style=" margin-left: 50px;">
                                                                                        Họ tên:
                                                                                        Trương Chí
                                                                                        Nghiệm</p>
                                                                                    <p style="margin-left: 50px;">
                                                                                        Mã bệnh nhân:
                                                                                        BC1234124</p>
                                                                                    <p style="margin-left: 50px;">
                                                                                        Tình trạng bệnh án:
                                                                                        Đái tháo đường</p>
                                                                                    <p style="margin-left: 50px;">
                                                                                        Tên bác sĩ:
                                                                                        Cao Trí Kiệt</p>

                                                                                </div>
                                                                                <br>
                                                                                <a href="booking.php?id=1"><button
                                                                                        class="login-btn btn-primary-soft btn "
                                                                                        style="padding-top:11px;padding-bottom:11px;width:100%">
                                                                                        <font class="tn-in-text">Đánh
                                                                                            giá và nhận xét bác sĩ
                                                                                        </font>
                                                                                    </button></a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </center>
                    </td>
                </tr>
            </table>
    </div>
    <br><br>




</body>

</html>