<?php
    include_once("../model/admin.php");
    
    class selectInfomationBS{
        function selectInfomationBS(){
            $p = new modalAdmin();
            $result = $p->selectInfomationBS();
            return $result;
        }
    }
?>