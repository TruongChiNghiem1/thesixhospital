<?php
    require('../model/classdatabase.php');
    $obj = new doctor();

    // Kiểm tra nếu có bệnh nhân (cate)
    if($cate){
        $sql = "SELECT * FROM benh_nhan bn 
                JOIN ho_so_benh_an hs ON bn.id_benh_nhan = hs.id_benh_nhan 
                WHERE bn.id_benh_nhan = '$cate'";
    }

    $result = $obj->getdata($sql);
    $a = "select * from benh_nhan where id_benh_nhan ='$cate'";
    $b = $obj->getdata($a);
    if($result){
        // Lấy ngày hiện tại
        $current_date = date("Y-m-d");

        echo '
            <h3 class="text-center">HỒ SƠ BỆNH ÁN</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Ho va ten</td>
                            <td>' . $result[0]["ten_benh_nhan"] . '</td>
                        </tr>
                        
                            <td>Ngay sinh</td>
                            <td>' . $result[0]["ngay_sinh"] . '</td>
                
                        <tr>
                            <td>Dia chi</td>
                            <td>' . $result[0]["dia_chi"] . '</td>
                        </tr>
                        <tr>
                            <td>So dien thoai</td>
                            <td>' . $result[0]["so_dien_thoai"] . '</td>
                        </tr>
                        <tr>
                            <td>Gioi tinh</td>
                            <td>' . $result[0]["gioi_tinh"] . '</td>
                        </tr>
                        <tr>
                            <td>Chieu cao</td>
                            <td>' . $result[0]["chieu_cao"] . '</td>
                        </tr>
                        <tr>
                            <td>Can nang</td>
                            <td>' . $result[0]["can_nang"] . '</td>
                        </tr>
                    </table>
                    <div class="">
                        <h3 class="text-center">DANH SÁCH LẦN KHÁM</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Ngày khám</th>
                                    <th>Chẩn đoán</th>
                                    <th>Kết luận</th>
                                    
                                </tr>
                            </thead>
                            <tbody>';
                            foreach($result as $row) {
                                echo '
                                <tr>
                                    <td>' . $row["ngay_kham"] . '</td>
                                    <td>' . $row["chuan_doan"] . '</td>
                                    <td>' . $row["mo_ta"] . '</td>
                                </tr>';
                            }

                            echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        ';
    }
    else{
        $current_date = date("Y-m-d");

        echo '
            <h3 class="text-center">HỒ SƠ BỆNH ÁN</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Ho va ten</td>
                            <td>' . $b[0]["ten_benh_nhan"] . '</td>
                        </tr>
                        
                            <td>Ngay sinh</td>
                            <td>' . $b[0]["ngay_sinh"] . '</td>
                
                        <tr>
                            <td>Dia chi</td>
                            <td>' . $b[0]["dia_chi"] . '</td>
                        </tr>
                        <tr>
                            <td>So dien thoai</td>
                            <td>' . $b[0]["so_dien_thoai"] . '</td>
                        </tr>
                        <tr>
                            <td>Gioi tinh</td>
                            <td>' . $b[0]["gioi_tinh"] . '</td>
                        </tr>
                        <tr>
                            <td>Chieu cao</td>
                            <td>' . $b[0]["chieu_cao"] . '</td>
                        </tr>
                        <tr>
                            <td>Can nang</td>
                            <td>' . $b[0]["can_nang"] . '</td>
                        </tr>
                    </table>
                    <div class="">
                        <h3 class="text-center mt-5">DANH SÁCH LẦN KHÁM</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Ngày khám</th>
                                    <th>Chẩn đoán</th>
                                    <th>Kết luận</th>
                                   
                                </tr>
                            </thead>
                            <tbody>';
                            echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        ';
        
    }
?>
