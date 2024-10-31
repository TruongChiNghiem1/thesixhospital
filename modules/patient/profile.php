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
        <div class="menu" style="background-color: #343a40;">
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
                                    <p class="profile-title" style="color: white;">Cao Dương Quốc Việt</p>
                                    <p class="profile-subtitle " style="color: white;">Caoviet@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="/thesixhospital/login.php"><input type="button" value="Đăng xuất"
                                            class="btn btn-danger"></a>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="#" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-user menu-icon"></i>
                                <p class="menu-text">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="MyBooking.php" class="non-style-link-menu " style="color: white;">
                                <i class="fa-solid fa-bookmark menu-icon"></i>
                                <p class="menu-text">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="MedicalRecords.php" class="non-style-link-menu" style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"></i>
                                <p class="menu-text">Hồ sơ bệnh án</p>
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
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Thông tin cá nhân</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/assets/images/calendar.svg"
                                width="100%"></button>
                    </td>


                </tr>

                <br>
                <center>

                    <div>
                        <table width="50%" class="sub-table scrolldown add-doc-form-container"
                            style="margin-left: 250px;" border="0">
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">
                                        Thông tin</p>

                                    <br>
                                    <hr><br>

                                </td>
                            </tr>

                            <tr>

                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Họ Tên: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    Cao Dương Quốc Việt<br><br>
                                </td>

                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    caoviet@gmail.com<br><br>
                                </td>
                            </tr>

                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Số điện thoại: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    0913998110<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Địa chỉ: </label>

                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    Gò vấp sài gòn<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Ngày sinh: </label>

                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    22-03-2003<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href=""><input type="button" value="Sửa thông tin"
                                            class="login-btn btn-primary-soft btn"></a>
                                </td>

                            </tr>
                        </table>
                    </div>
                </center>
            </table>
    </div>
    <br><br>




</body>

</html>