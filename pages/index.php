<?php
    
    require("../model/doctor.php");
    session_start();
    require("layout/header.php");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 'trangchu';
    }
    if(isset($_GET['cate'])){
        $cate = $_GET['cate'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(file_exists("../pages/".$page."/index.php")){
        include("../pages/".$page."/index.php");
    }
    require("layout/footer.php");
?>