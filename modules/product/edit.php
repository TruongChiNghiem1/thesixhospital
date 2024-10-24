<?php 
$id = check_id ('product');

$errors = array();

$current = detail ($id);

$categories = select_category();

if (isset($_POST["edit"])) {
    if (empty($_POST["name"])) {
        $errors[] = "Please enter name";
    }

    if (empty($_POST["price"])) {
        $errors[] = "Please enter price";
    }

    if (empty($_POST["intro"])) {
        $errors[] = "Please enter intro";
    }

    if (empty($_POST["content"])) {
        $errors[] = "Please enter content";
    }

    if (empty($errors)) {
        $product["name"] = check_input($_POST["name"]);
        $product["price"] = check_input($_POST["price"]);
        $product["intro"] = check_input($_POST["intro"]);
        $product["content"] = check_input($_POST["content"]);
        $product["category_id"] = check_input($_POST["category_id"]);
        $product["updated_at"] = date(DATETIME);
        $product["id"] = $id;
        
        $result = duplicate($product["name"], $id);

        if ($result) {

            if (empty($_FILES["image"]["name"])) {
                $product["image"] = $current["image"];
            } else {
                $file_path_old_image = 'assets/images/'.$current["image"];
                if (file_exists($file_path_old_image)) {
                    unlink($file_path_old_image);
                }

                $image_name = check_name_image($_FILES["image"]["name"]);
                $image_tmp_name = $_FILES["image"]["tmp_name"];
                $product["image"] = $image_name;
                move_uploaded_file($image_tmp_name, 'assets/images/'.$image_name);
            }

            edit ($product);

            header("location:index.php?m=product");
            exit();
        } else {
            $errors[] = "Product is exist. Please enter other product";
        }
    }
}
?>

<h1 class="title">Product - Create</h1>

<?php if (!empty($errors)) { ?>
<div class="error">
    <?php 
    foreach ($errors as $errors) {
        echo "<li>$errors</li>";
    } 
    ?>
</div>
<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Category</td>
            <td>
                <select name="category_id" id="">
                    <?php 
                    foreach ($categories as $category) { 
                        $selected = $category["id"] == $current["category_id"] ? 'selected' : '';
                    ?>
                    <option <?php echo $selected ?> value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" <?php 
                if (isset($_POST["name"])) {
                    echo 'value="'.$_POST["name"].'"';
                } else {
                    echo 'value="'.$current["name"].'"';
                }
            ?>></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" <?php 
                if (isset($_POST["price"])) {
                    echo 'value="'.$_POST["price"].'"';
                } else {
                    echo 'value="'.$current["price"].'"';
                }
            ?>></td>
        </tr>
        <tr>
            <td>Intro</td>
            <td><textarea name="intro"><?php 
                if (isset($_POST["intro"])) {
                    echo $_POST["intro"];
                } else {
                    echo $current["intro"];
                }
            ?></textarea></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><textarea name="content"><?php 
                if (isset($_POST["content"])) {
                    echo $_POST["content"];
                } else {
                    echo $current["content"];
                }
            ?></textarea></td>
        </tr>
        <tr>
            <td>Image current</td>
            <td><img src="assets/images/<?php echo $current["image"] ?>" width="70px"></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="edit" value="Edit" ></td>
        </tr>
    </table>
</form>