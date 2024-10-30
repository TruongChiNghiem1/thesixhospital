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

    <title>Lịch sử đặt lịch</title>
    <style>
    .popup {
        animation: transitionIn-Y-bottom 0.5s;
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
                                    <img src="/thesixhospital/img/user.png" alt="" width="100%"
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
                            <a href="profile.php" class="non-style-link-menu ">
                                <i class="fa-solid fa-user menu-icon"></i>
                                <p class="menu-text">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-active ">
                        <div>
                            <a href="#" class="non-style-link-menu  non-style-link-menu-active">
                                <i class="fa-solid fa-bookmark menu-icon"></i>
                                <p class="menu-text">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <div>
                            <a href="MedicalRecords.php" class="non-style-link-menu">
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
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php"><button class="btn" style="margin-left:20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Lịch sử đặt lịch</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/img/calendar.svg" width="100%"></button>
                    </td>


                </tr>

                <!-- <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>
                        </a>
                        </div>
                    </td>
                </tr> -->

                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <br>
                                <br>
                                <br>
                                <br>
                                <table width="93%" class="sub-table scrolldown" border="0" style="border:none">

                                    <tbody>

                                        <tr>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">

                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                            Mã đặt lịch: OC-000-1
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ chuyên khoa<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Đau đầu thường xuyên
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn ">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a><button class="login-btn btn-primary-soft btn ">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
                                                            </button></a>
                                                    </div>



                                                </div>
                                            </td>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">

                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                            Mã đặt lịch: OC-000-1
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ sinh dưỡng<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Ăn hoài không mập :D
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn ">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a><button class="login-btn btn-primary-soft btn ">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
                                                            </button></a>
                                                    </div>

                                                </div>
                                            </td>
                                            <td style="width: 25%;">
                                                <div class="dashboard-items search-items">

                                                    <div style="width:100%;">
                                                        <div class="h3-search">
                                                            Ngày đặt lịch: 29/10/2024<br>
                                                            Mã đặt lịch: OC-000-1
                                                        </div>
                                                        <div><img class="h3-img"
                                                                src="/thesixhospital/assets/images/lovepik-professional-doctor-image-png-image_400996861_wh1200.png"
                                                                alt=""></div>
                                                        <div class="h1-search">
                                                            Bác sĩ sức khỏe<br>
                                                        </div>
                                                        <div class="h3-search">
                                                            Tình trạng: Đau đầu thường xuyên
                                                        </div>
                                                        <br>
                                                        <div class="h3-search">
                                                            Bác sĩ: Cao Việt
                                                        </div>
                                                        <div class="h4-search">
                                                            Giờ bắt đầu: <b>@18:00</b> (24h)
                                                        </div>
                                                        <br>
                                                        <a><button class="btn-primary-soft btn">
                                                                <font class="tn-in-text">Hủy lịch</font>
                                                            </button></a>
                                                        <a><button class="btn-primary-soft btn">
                                                                <font class="tn-in-text">Thay đổi lịch</font>
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



            </table>
        </div>
    </div>


</body>

</html>