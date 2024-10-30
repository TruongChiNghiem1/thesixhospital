<?php 
include 'model/user.php';

if (isset($_GET["a"])) {
    $a = $_GET["a"];

    switch ($a) {
        case 'create':
            include 'modules/user/create.php';
            break;
        case 'edit':
            include 'modules/user/edit.php';
            break;
        case 'delete':
            include 'modules/user/delete.php';
            break;
        case 'list':
            include 'modules/user/list.php';
            break;
        default:
            include 'modules/user/list.php';
    }
} else {
    include 'modules/user/list.php';
}
?>