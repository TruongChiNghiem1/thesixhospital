<?php 
    include_once("../controller/admin/list.php");

    $p = new selectInfomationBS();

    $result = $p->selectInfomationBS();

    if ($result){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='table' border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Tên</th>";
            echo "<th>Số điện thoại</th>";
            echo "<th>Email</th>";
            echo "<th>Hoạt động</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";

                echo"<td>
                        <a href='index.php?action=hrm&view=nhanVien&id=".$row['id']."'><button id='btn-view' type='button' class='btn btn-outline-primary' name='btn_click'>View</button></a>
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