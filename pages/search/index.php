<?php
     $keyword = isset($_GET['cate']) ? $_GET['cate'] : '';
     $obj = new manage();
     $results = $obj->searchBenhNhan($keyword);

     if ($results) {
        echo "
        <table class='table table-hover table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>STT</th>
                    <th scope='col'>MÃ BỆNH NHÂN</th>
                    <th scope='col'>HỌ TÊN</th>
                    <th scope='col'>GIỚI TÍNH</th>
                    <th scope='col'>NGÀY SINH</th>
                    <th scope='col'>ĐIỆN THOẠI</th>
                    <th scope='col'>HSBA</th>
                    <th scope='col'>KÊ ĐƠN</th>
                </tr>
            </thead>";

            echo "
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{$results[0]['ma_benh_nhan']}</td>
                        <td>{$results[0]['ten_benh_nhan']}</td>
                        <td>{$results[0]['gioi_tinh']}</td>
                        <td>{$results[0]['ngay_sinh']}</td>
                        <td>{$results[0]['so_dien_thoai']}</td>

                        <td>
                            <a href = 'index.php?page=record&cate=".$results[0]['id_benh_nhan']."' class='btn btn-primary text-black'>XEM</a>
                        </td>
                        <td>
                            <a href = 'index.php?page=prescribe&cate=".$results[0]['id_benh_nhan']."' class='btn btn-danger text-black'>KÊ</a>
                        </td>
                    </tr>
                </tbody>
            ";
        echo "</table>";
     } else {
         echo "<p>Không tìm thấy sản phẩm nào phù hợp.</p>";
     }
?>