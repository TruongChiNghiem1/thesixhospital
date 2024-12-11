<?php 
    include_once("../controller/admin.php");

    $p = new controllerAdmin();

    
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = 5;
    
    $tblNhanVien = $p->selectApproveleaveByPage($page, $limit);


    $totalNhanVien = $p->getCountApproveLeave();
    $totalPages = ceil($totalNhanVien / $limit);


    if ($tblNhanVien){
        if(mysqli_num_rows($tblNhanVien) > 0){
            echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'\n            integrity='sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==' \n            crossorigin='anonymous' referrerpolicy='no-referrer' />";
            
            echo "<style>
                .pagination {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                }
                .pagination a {
                    color: #999;
                    text-decoration: none;
                    padding: 2px 10px;
                    font-size: 15px;
                }
                .pagination a.active {
                    color: #000;
                    font-weight: bold;
                }
                .pagination .next {
                    font-size: 20px;
                    color: #999;
                    cursor: pointer;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-left: 10px;
                }
            </style>";

            echo "<table class='table' border='1'>";
            echo "<tr>";
            echo "<th>Tên</th>";
            echo "<th>Lý do xin nghĩ</th>";
            echo "<th>Trạng thái</th>";
            echo "<th>Hoạt động</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($tblNhanVien)){
                echo "<tr>";
                echo "<td>" . $row['ho_ten'] . "</td>";
                echo "<td>" . $row['ly_do_nghi'] . "</td>";

                $trangthai = $row["trang_thai"];
        $buttonClass = '';

        
        switch ($trangthai) {
            case '1':
                $buttonClass = 'btn btn-success'; 
                $trangthai = 'Đã duyệt';
                break;
            case '2':
                $buttonClass = 'btn btn-danger';
                $trangthai = 'Từ chối'; 
                break;
            case '3':
                $buttonClass = 'btn btn-warning'; 
                $trangthai = 'Chờ duyệt';
                break;
            default:
                $buttonClass = 'btn btn-secondary'; 
        }
        echo "<td><button class='$buttonClass' disabled>$trangthai</button></td>"; 
                echo"<td>
                        <a href='view_approveleave.php?action=hrm&approveApplication=nhanVien&id=".$row['id_don_xin_nghi']."'><button id='btn-approveApplication' type='button' class='btn btn-outline-primary' name='btn_click'>Duyệt đơn</button></a>    
                    </td>";
                echo "</tr>";
            }
            echo "</table>";

            // Hiển thị phân trang
            echo "<div class='pagination' style='margin-top: 10px;'>";

            // Hiển thị nút "Trang trước"
            if ($page > 1) {
                $prevPage = $page - 1;
                echo "<a href='view_approveleave.php?action=hrm&page=$prevPage' class='prev'><i class='fa-solid fa-arrow-left-long'></i></a>";
            }

            // Hiển thị các số trang
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'active' : '';
                echo "<a href='view_approveleave.php?action=hrm&page=$i' class='$activeClass'>$i</a>";
            }

            // Hiển thị nút "Trang tiếp theo"
            if ($page < $totalPages) {
                $nextPage = $page + 1;
                echo "<a href='view_approveleave.php?action=hrm&page=$nextPage' class='next'><i class='fa-solid fa-arrow-right-long'></i></a>";
            }

            echo "</div>";
            // mysqli_free_result($result);
        }
        else {
            echo "No records matching your query were found.";
        }
        
    }
        
?>