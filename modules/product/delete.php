<?php 
$id = check_id ('product');

$current = detail ($id);

$file_path_old_image = 'assets/images/'.$current["image"];
if (file_exists($file_path_old_image)) {
    unlink($file_path_old_image);
}

delete ($id);

header("location:index.php?m=product");
exit();
?>