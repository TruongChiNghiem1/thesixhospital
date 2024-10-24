<?php 
include 'model/product.php';

if (isset($_GET["a"])) {
    $a = $_GET["a"];

    switch ($a) {
        case 'create':
            include 'modules/product/create.php';
            break;
        case 'edit':
            include 'modules/product/edit.php';
            break;
        case 'delete':
            include 'modules/product/delete.php';
            break;
        case 'list':
            include 'modules/product/list.php';
            break;
        default:
            include 'modules/product/list.php';
    }
} else {
    include 'modules/product/list.php';
}
?>