<?php 
    include_once("../modules/admin/list.php");

    $p = new selectInfomationBS();

    $result = $p->selectInfomationBS();

    if ($result){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='table' border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";

                echo"<td>
                        <button id='btn-view' type='button' class='btn btn-outline-primary'>View</button>
                        <button id='btn-add' type='button' class='btn btn-outline-primary'>Add</button>
                        <button id='btn-rm' type='button' class='btn btn-outline-primary'>Remove</button>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
        else {
            echo "No records matching your query were found.";
        }
    }
        
?>