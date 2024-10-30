<?php 
$users = index ();
?>

<h1 class="title">User - List</h1>

<table class="content-table">
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Level</td>
        <td>Created At</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    <?php 
        $i = 0;
        foreach ($users as $user) { 
            $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $user["username"] ?></td>
        <td><?php echo $user["level"] == 1 ? 'Admin' : 'Member' ?></td>
        <td><?php echo date("d-m-Y", strtotime($user["created_at"])) ?></td>
        <td><a onClick="return check_delete()" href="index.php?m=user&a=delete&id=<?php echo $user["id"] ?>">Delete</a></td>
        <td><a href="index.php?m=user&a=edit&id=<?php echo $user["id"] ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table>