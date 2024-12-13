<?php
    require('../model/classdatabase.php');
    include('handle.php');
    $obj = new doctor();

    if (isset($cate)) {
        $sql = "SELECT * FROM benh_nhan bn 
                JOIN ho_so_benh_an hs ON bn.id_benh_nhan = hs.id_benh_nhan 
                WHERE bn.id_benh_nhan = '$cate'";
        $obj = new manage();
        $result = $obj->getdata($sql);
    }
    $a = "select * from benh_nhan where id_benh_nhan ='$cate'";
    $b = $obj->getdata($a);
    if ($result) {
        $current_date = date("Y-m-d");
        echo '
            <div class="row">
                <div class="col-6">
                    <h3 class="text-center">THÔNG TIN BỆNH NHÂN</h3>
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
                    </table>

                    <h3 class="text-center">DANH SÁCH LẦN KHÁM</h3>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Ngày khám</th>
                                <th>Chẩn đoán</th>
                                <th>Kết luận</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach ($result as $row) {
                                echo '
                                    <tr>
                                        <td>' . $row["ngay_kham"] . '</td>
                                        <td>' . $row["chuan_doan"] . '</td>
                                        <td>' . $row["mo_ta"] . '</td>
                                        <td>
                                            <a href="index.php?page=kedon&cate=' . $row["id_ho_so_benh_an"] . '" class="btn border">
                                                <img src="/thesixhospital/assets/images/capsule.svg" alt="" style="width:20px; height: 20px">
                                            </a>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="id_ho_so_benh_an" value="' . $row["id_ho_so_benh_an"] . '">
                                                <button type="submit" name="btnXoa" class="btn border" onclick="return confirm(\'Bạn có chắc muốn xóa hồ sơ này không?\')">
                                                    <img src="/thesixhospital/assets/images/file-earmark-x.svg" alt="" style="width:20px; height: 20px">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            echo '
                        </tbody>
                    </table>
                </div>

                <div class="col-6">
                    <form method="post" enctype="multipart/form-data">
                        <table class="table table-hover table-bordered mt-5">
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
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn bg-dark text-white my-4" name="btThem" value="Thêm hồ sơ" />
                        </div>
                    </form>
                </div>
            </div>';
    }
    else{
        $current_date = date("Y-m-d");
        echo '
            <div class="row">
                <div class="col-6">
                    <h3 class="text-center">THÔNG TIN BỆNH NHÂN</h3>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Họ và tên</td>
                            <td>' . $b[0]["ten_benh_nhan"] . '</td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td>' . $b[0]["ngay_sinh"] . '</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>' . $b[0]["dia_chi"] . '</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>' . $b[0]["so_dien_thoai"] . '</td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>' . $b[0]["gioi_tinh"] . '</td>
                        </tr>
                    </table>

                    <h3 class="text-center">DANH SÁCH LẦN KHÁM</h3>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Ngày khám</th>
                                <th>Chẩn đoán</th>
                                <th>Kết luận</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach ($result as $row) {
                                echo '
                                    <tr>
                                        <td>' . $row["ngay_kham"] . '</td>
                                        <td>' . $row["chuan_doan"] . '</td>
                                        <td>' . $row["mo_ta"] . '</td>
                                        <td>
                                            <a href="index.php?page=kedon&cate=' . $row["id_ho_so_benh_an"] . '" class="btn border">
                                                <img src="/thesixhospital/assets/images/capsule.svg" alt="" style="width:20px; height: 20px">
                                            </a>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="id_ho_so_benh_an" value="' . $row["id_ho_so_benh_an"] . '">
                                                <button type="submit" name="btnXoa" class="btn border" onclick="return confirm(\'Bạn có chắc muốn xóa hồ sơ này không?\')">
                                                    <img src="/thesixhospital/assets/images/file-earmark-x.svg" alt="" style="width:20px; height: 20px">
                                                </button>
                                            </form>
                                        </td>
                                    </tr>';
                                }
                            echo '
                        </tbody>
                    </table>
                </div>

                <div class="col-6">
                    <form method="post" enctype="multipart/form-data">
                        <table class="table table-hover table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th>Ngày khám</th>
                                    <th>Chẩn đoán</th>
                                    <th>Kết luận</th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type="number" class="form-control" name="id_benh_nhan" value="' . $b[0]["id_benh_nhan"] . '" hidden required>
                                <tr>
                                    <td><input type="date" class="form-control" name="ngay_kham" value="' . $current_date . '" required></td>
                                    <td><input type="text" class="form-control" name="chuan_doan" required></td>
                                    <td><textarea name="mo_ta" class="form-control"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn bg-dark text-white my-4" name="btThem" value="Thêm hồ sơ" />
                        </div>
                    </form>
                </div>
            </div>';
    }

    if (isset($_POST["btnXoa"])) {
        $id_ho_so_benh_an = $_POST["id_ho_so_benh_an"];
        $manageObj = new manage();
        if ($manageObj->xoaHSBA($id_ho_so_benh_an)) {
            echo "<script>alert('Xóa hồ sơ bệnh án thành công!');</script>";
            echo "<meta http-equiv='refresh' content='0'>"; // Thêm dòng này để refresh trang sau khi xóa thành công
        } else {
            echo "<script>alert('Xóa hồ sơ bệnh án không thành công!');</script>";
        }
    }
?>
