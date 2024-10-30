<?php 
$id = check_id ('category');

$errors = array();

$category = detail ($id);

if (isset($_POST["edit"])) {
    if (empty($_POST["name"])) {
        $errors[] = "Please enter name";
    }

    if (empty($errors)) {
        $category["id"] = $id;
        $category["name"] = $_POST["name"];
        $category["updated_at"] = date(DATETIME);
        
        $result = duplicate($category["name"], $id);

        if ($result) {
            edit ($category);

            header("location:index.php?m=category");
            exit();
        } else {
            $errors[] = "Category is exist. Please enter other category";
        }
    }
}
?>

<h1 class="title">Category - Edit</h1>

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
                } else {
                    echo 'value="'.$category["name"].'"';
                }
            ?>></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="edit" value="Edit" ></td>
        </tr>
    </table>
</form>