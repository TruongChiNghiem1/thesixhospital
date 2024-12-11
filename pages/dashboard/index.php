<?php
    require('../model/classdatabase.php');
    include('handle.php');
    $obj = new doctor();

    // Kiểm tra nếu có bệnh nhân (cate)
    if ($cate) {
        $sql = "SELECT * FROM benh_nhan bn 
                JOIN ho_so_benh_an hs ON bn.id_benh_nhan = hs.id_benh_nhan 
                WHERE bn.id_benh_nhan = '$cate'";
    }

    $result = $obj->getdata($sql);

    // Lấy danh sách thuốc từ bảng thuoc
    $sql_medicines = "SELECT * FROM thuoc";
    $medicines = $obj->getdata($sql_medicines);

    if ($result) {
        // Lấy ngày hiện tại
        $current_date = date("Y-m-d");

        echo '
            <h3 class="text-center">THÔNG TIN BỆNH NHÂN</h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Họ và tên</td>
                            <td>' . $result[0]["ten_benh_nhan"] . '</td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td>' . $result[0]["ngay_sinh"] . '</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>' . $result[0]["dia_chi"] . '</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>' . $result[0]["so_dien_thoai"] . '</td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>' . $result[0]["gioi_tinh"] . '</td>
                        </tr>
                        <tr>
                            <td>Chiều cao</td>
                            <td>' . $result[0]["chieu_cao"] . '</td>
                        </tr>
                        <tr>
                            <td>Cân nặng</td>
                            <td>' . $result[0]["can_nang"] . '</td>
                        </tr>
                    </table>
                    <div class="">
                        <h3 class="text-center mt-5">CHẨN ĐOÁN</h3>
                        <form method="post" enctype="multipart/form-data">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ngày khám</th>
                                        <th>Chẩn đoán</th>
                                        <th>Kết luận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="number" class="form-control" name="id_benh_nhan" value="' . $result[0]["id_benh_nhan"] . '" hidden required>
                                    <tr>
                                        <td><input type="date" class="form-control" name="ngay_kham" value="' . $current_date . '" required></td>
                                        <td><input type="text" class="form-control" name="chuan_doan" required></td>
                                        <td><textarea name="mo_ta" class="form-control"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3 class="text-center mt-5">KÊ ĐƠN</h3>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã thuốc</th>
                                        <th>Tên thuốc</th>
                                        <th>Số lượng</th>
                                        <th>Cách dùng</th>
                                    </tr>
                                </thead>
                                <tbody>';
        

                                foreach ($medicines as $medicine) {
                                    echo '
                                        <tr>
                                            <td><input type="checkbox" name="thuoc[' . $medicine["id_thuoc"] . '][selected]" value="1"></td>
                                            <td>' . $medicine["ten_thuoc"] . '</td>
                                            <td><input type="number" name="thuoc[' . $medicine["id_thuoc"] . '][so_luong]" class="form-control"></td>
                                            <td><input type="text" name="thuoc[' . $medicine["id_thuoc"] . '][cach_dung]" class="form-control"></td>
                                        </tr>';
                                }

                                echo '
                                </tbody>
                            </table>
                            <input type="submit" class="btn bg-dark text-white my-4" name="btThem" value="Thêm hồ sơ" />
                        </form>
                    </div>
                </div>
            </div>
        ';
    }
?>
