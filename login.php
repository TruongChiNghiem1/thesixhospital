<?php
    // error_reporting(0);
    require_once 'config/connect.php';
    include_once("controller/admin.php");
    session_start();

    if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true){
        if (strpos($_SESSION['loai_nhan_vien'], 1) !== false) {
            header("location: admin/index.php");
        } elseif (strpos($_SESSION['loai_nhan_vien'], 2) !== false) {
            header("Location: BSSucKhoe.php");
        } elseif(strpos($_SESSION['loai_nhan_vien'], 3) !== false){
            header("Location: view/BacSiDD.php");
        }
        exit;
    }


    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $p = new controllerAdmin();
        $account = $p->loginUser($username, $password);
        // echo $account;
        if($account){
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['id'] = $account['id'];
            $_SESSION['username'] = $account['username'];
            $_SESSION['ho_ten'] = $account['ho_ten'];
            $_SESSION['loai_nhan_vien'] = $account['loai_nhan_vien'];
       
            if (strpos($account['loai_nhan_vien'], 1) !== false) {
                header("Location: admin/index.php");
            } elseif (strpos($account['loai_nhan_vien'], 2) !== false) {
                header("Location: BacSiSK.php");
            } elseif(strpos($account['loai_nhan_vien'], 3) !== false){
                header("Location: view/BacSiDD.php");
            }
            exit;
        }
        else{
            echo "Đăng nhập sai";
        }
    }
// require_once 'config/app.php';
// require_once 'config/connect.php';
// $errors = array();
// if (isset($_POST["login"])) {
//     if (empty($_POST["username"])) {
//         $errors[] = "Please enter username";
//     }
//     if (empty($_POST["password"])) {
//         $errors[] = "Please enter password";
//     }
//     if (empty($errors)) {
//         $username = $_POST["username"];
//         $password = md5($_POST["password"]);
//         $stmt = $conn->prepare("SELECT * FROM nhan_vien WHERE username = :username AND password = :password AND level = 1");
//         $stmt->bindParam(":username", $username, PDO::PARAM_STR);
//         $stmt->bindParam(":password", $password, PDO::PARAM_STR);
//         $stmt->execute();
//         if ($stmt->rowCount() == 1) {
//             $_SESSION["admin"] = $username;
//             header("location:index.php");
//             exit();
//         } else {
//             $errors[] = "Member doesn't exist or you aren't admin";
//         }
//     }
// }

?>

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
    <?php if (!empty($errors)) { ?>
        <div class="error">
            <?php
            foreach ($errors as $errors) {
                echo "<li>$errors</li>";
            }
            ?>
        </div>
    <?php } ?>
    <center>
        <div class="container">
            <table border="0" style="margin: 0;padding: 0;width: 60%;">
                <tr>
                    <td>
                        <p class="header-text">Đăng nhập</p>
                    </td>
                </tr>
                <div class="form-body">
                    <form action="" method="POST">
                        <tr>
                            <td class="label-td">
                                <label for="username" class="form-label">Email: </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td">
                                <input type="text" name="username" class="input-text" placeholder="Nhập email" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td">
                                <label for="password" class="form-label">Mật khẩu: </label>
                            </td>
                        </tr>

                        <tr>
                            <td class="label-td">
                                <input type="password" name="password" class="input-text" placeholder="Nhập mật khẩu"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td><br>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="login" value="Đăng nhập">
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