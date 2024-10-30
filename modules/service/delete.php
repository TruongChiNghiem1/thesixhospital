<?php 
$id = check_id ('category');

delete ($id);

header("location:index.php?m=category");
exit();
?>