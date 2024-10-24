<?php 
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["username"])) {
        $errors[] = "Please enter username";
    }

    if (empty($_POST["password"])) {
        $errors[] = "Please enter password";
    }

    if ($_POST["password"] != $_POST["confirm_password"]) {
        $errors[] = "Two password don't match";
    }

    if (empty($errors)) {
        $user["username"] = check_input($_POST["username"]);
        $user["password"] = md5($_POST["password"]);
        $user["level"] = $_POST["level"];
        $user["created_at"] = date(DATETIME);
        
        $result = duplicate($user["username"]);

        if ($result) {
            create ($user);

            header("location:index.php?m=user");
            exit();
        } else {
            $errors[] = "User is exist. Please enter other user";
        }
    }
}
?>

<h1 class="title">User - Create</h1>

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
            <td><input type="text" name="username" <?php 
                if (isset($_POST["username"])) {
                    echo 'value="'.$_POST["username"].'"';
                }
            ?>></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Confirm password</td>
            <td><input type="password" name="confirm_password"></td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <select name="level">
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="create" value="Create" ></td>
        </tr>
    </table>
</form>