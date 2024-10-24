<?php 
$products = index ();
?>


<h1 class="title">Product - List</h1>

<table class="content-table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Created At</td>
        <td>Category</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    <?php 
        $i = 0;
        foreach ($products as $product) { 
            $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $product["name"] ?></td>
        <td><?php echo number_format($product["price"], 0, "", ".") ?> VND</td>
        <td><?php echo date("d-m-Y", strtotime($product["created_at"])) ?></td>
        <td><?php echo $product["category_name"] ?></td>
        <td><a onClick="return check_delete()" href="index.php?m=product&a=delete&id=<?php echo $category["id"] ?>">Delete</a></td>
        <td><a href="index.php?m=product&a=edit&id=<?php echo $product["id"] ?>">Edit</a></td>
    </tr>
    <?php } ?>
</table>