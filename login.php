<?php 
session_start();
require_once 'config/app.php';
require_once 'config/connect.php';

$errors = array();

if (isset($_POST["login"])) {
    if (empty($_POST["username"])) {
        $errors[] = "Please enter username";
    }

    if (empty($_POST["password"])) {
        $errors[] = "Please enter password";
    }

    if (empty($errors)) {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password AND level = 1");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $_SESSION["admin"] = $username;
            header("location:index.php");
            exit();
        } else {
            $errors[] = "Member doesn't exist or you aren't admin";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/myscript.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>

        <div class="content">
        <h1 class="title">Login</h1>

        <?php if (!empty($errors)) { ?>
        <div class="error">
            <?php 
            foreach ($errors as $errors) {
                echo "<li>$errors</li>";
            } 
            ?>
        </div>
        <?php } ?>

            <form action="" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="footer"></div>
    </div>
</body>
</html>