<div class="col-md-12">
    <div class="row">
        <h2>BỆNH NHÂN</h2>
    </div>
    <div class="row">
        <?php
            $obj = new doctor();
            $sql = "SELECT * FROM benh_nhan";
            $result = $obj->getdata($sql);

            echo "
                <table class='table table-hover'>
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
                foreach ($result as $key => $results) {
                    echo "
                        <tbody>
                            <tr>
                                <td>".($key+1)."</td>
                                <td>{$results['ma_benh_nhan']}</td>
                                <td>{$results['ten_benh_nhan']}</td>
                                <td>{$results['gioi_tinh']}</td>
                                <td>{$results['ngay_sinh']}</td>
                                <td>{$results['so_dien_thoai']}</td>

                                <td>
                                    <a href = 'index.php?page=record&cate=".$results['id_benh_nhan']."' class='btn btn-primary text-black'>XEM</a>
                                </td>
                                <td>
                                    <a href = 'index.php?page=prescribe&cate=".$results['id_benh_nhan']."' class='btn btn-danger text-black'>KÊ</a>
                                </td>
                            </tr>
                        </tbody>
                    ";
                }
                echo "</table>";
        ?>
    </div>   
</div>
