<?php
include 'model/adminService.php';

if (isset($_GET["a"])) {
    $a = $_GET["a"];
    switch ($a) {
        case 'list':
            include 'modules/adminService/list.php';
            break;
        case 'create':
            include 'modules/adminService/create.php';
            break;
        case 'list-calendar':
            include 'modules/adminService/listCalendar.php';
            break;
        case 'detail-calendar':
            include 'modules/adminService/detailCalendar.php';
            break;
        case 'delete':
            include 'modules/adminService/delete.php';
            break;
        case 'edit':
            include 'modules/adminService/edit.php';
            break;
        default:
            include 'modules/adminService/list.php';
    }
}
?>