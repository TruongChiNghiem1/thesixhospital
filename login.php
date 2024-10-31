<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/login.css">

    <title>Đăng nhập</title>



</head>

<body>
    <center>
        <div class="container">
            <table border="0" style="margin: 0;padding: 0;width: 60%;">
                <tr>
                    <td>
                        <p class="header-text">Đăng nhập</p>
                    </td>
                </tr>
                <div class="form-body">

                    <tr>
                        <form action="" method="POST">
                            <td class="label-td">
                                <label for="useremail" class="form-label">Email: </label>
                            </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <input type="email" name="useremail" class="input-text" placeholder="Nhập email" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="userpassword" class="form-label">Mật khẩu: </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td">
                            <input type="Password" name="userpassword" class="input-text" placeholder="Nhập mật khẩu"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td><br>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Đăng nhập" class="login-btn btn-primary btn">
                        </td>
                    </tr>
                </div>
                <tr>
                    <td>
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Tôi chưa có tài khoản&#63; </label>
                        <a href="signup.php" class="hover-link1 non-style-link">Đăng ký</a>
                        <br><br><br>
                    </td>
                </tr>
                </form>
            </table>

        </div>
    </center>
</body>

</html>