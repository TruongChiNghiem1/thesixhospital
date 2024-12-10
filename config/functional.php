<?php 
function check_id($module) {
    if(!isset($_GET['id'])) {
        header("location:adminIndex.php?m=$module");
        exit;
    }

    $id = $_GET['id'];
    if(!is_numeric($id)) {
        header("location:adminIndex.php?m=$module");
        exit;
    }

    return $id;
}

function check_input ($text) {
    $text = trim($text);
    $text = htmlspecialchars($text);
    $text = addslashes($text);
    return $text;
}

function check_name_image ($image) {
    $position_first_dot = strpos($image, ".");
    $image_name = substr($image, 0, $position_first_dot);
    $post_last_dot = strrpos($image, ".") + 1;
    $image_extension = substr($image, $post_last_dot);

    $image = $image_name . "." . $image_extension;
    $image = strtolower($image);
    $image = preg_replace('/\s+/', '-', $image);;
    return time() . "_" . $image;
}
?>