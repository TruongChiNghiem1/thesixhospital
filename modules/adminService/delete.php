<?php
$id = check_id('services');
delete($id);
//header('location:/thesixhospital/adminIndex.php?m=services&a=list');
echo '<script type="text/javascript">
            window.location.href = "/thesixhospital/adminIndex.php?m=services&a=list";
          </script>';
exit;