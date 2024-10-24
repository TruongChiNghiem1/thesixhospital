<?php 
$categories = index ();
?>


<h1 class="title">Category - List</h1>

<table class="content-table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Created At</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    <?php 
        $i = 0;
        foreach ($categories as $category) { 
            $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $category["name"] ?></td>
        <td><?php echo date("d-m-Y", strtotime($category["created_at"])) ?></td>
        <td><a onClick="return check_delete()" href="index.php?m=category&a=delete&id=<?php echo $category["id"] ?>">Delete</a></td>
        <td><a href="index.php?m=category&a=edit&id=<?php echo $category["id"] ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table>