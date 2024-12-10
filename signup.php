<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/signup.css">

    <title>Đăng ký</title>
    <style>
    .container {
        animation: transitionIn-X 0.5s;
    }
    </style>
</head>

<body>
    <center>
        <div class="container">
            <table border="0" style="width: 69%;">
                <tr>
                    <td colspan="2">
                        <p class="header-text">Đăng ký</p>
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST">
                        <td class="label-td" colspan="2">
                            <label for="newfullname" class="form-label">Họ và tên: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="newfullname" class="input-text" placeholder="Nhập họ và tên" required>
                    </td>

                </tr>
                <tr>
                    <form action="" method="POST">
                        <td class="label-td" colspan="2">
                            <label for="newemail" class="form-label">Email: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="email" name="newemail" class="input-text" placeholder="Nhập Email" required>
                    </td>

                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="tele" class="form-label">Số điện thoại: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="tel" name="tele" class="input-text" placeholder="ex:0712345678"
                            pattern="[0]{1}[0-9]{9}">
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST">
                        <td class="label-td" colspan="2">
                            <label for="diachi" class="form-label">Địa chỉ: </label>
                        </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="email" name="diachi" class="input-text" placeholder="Nhập địa chỉ" required>
                    </td>

                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="newpassword" class="form-label">Tạo mật khẩu: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="newpassword" class="input-text" placeholder="Nhập mật khẩu"
                            required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="comfirmpassword" class="form-label">Xác nhận mật khẩu: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="comfirmpassword" class="input-text"
                            placeholder="Nhập mật khẩu xác nhận" required>
                    </td>
                </tr>

                <tr>

                    <td colspan="2">


                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="Đăng ký" class="login-btn btn-primary btn">
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Bạn đã có tài khoản&#63; </label>
                        <a href="login.php" class="hover-link1 non-style-link">Đăng nhập</a>
                        <br><br><br>
                    </td>
                </tr>

                </form>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>