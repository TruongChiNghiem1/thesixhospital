<?php 
include 'model/category.php';

if (isset($_GET["a"])) {
    $a = $_GET["a"];

    switch ($a) {
        case 'create':
            include 'modules/category/create.php';
            break;
        case 'edit':
            include 'modules/category/edit.php';
            break;
        case 'delete':
            include 'modules/category/delete.php';
            break;
        case 'list':
            include 'modules/category/list.php';
            break;
        default:
            include 'modules/category/list.php';
    }
} else {
    include 'modules/category/list.php';
}
?>