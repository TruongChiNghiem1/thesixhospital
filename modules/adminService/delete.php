<?php
$id = check_id('services');
delete($id);
header('location:adminIndex.php?m=services&a=list');
exit;