<?php 
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["name"])) {
        $errors[] = "Please enter name";
    }

    if (empty($errors)) {
        $category["name"] = check_input($_POST["name"]);
        $category["created_at"] = date(DATETIME);
        
        $result = duplicate($category["name"]);

        if ($result) {
            create ($category);

            header("location:index.php?m=category");
            exit();
        } else {
            $errors[] = "Category is exist. Please enter other category";
        }
    }
}
?>

<h1 class="title">Category - Create</h1>

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
            <td>Name</td>
            <td><input type="text" name="name" <?php 
                if (isset($_POST["name"])) {
                    echo 'value="'.$_POST["name"].'"';
                }
            ?>></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="create" value="Create" ></td>
        </tr>
    </table>
</form>