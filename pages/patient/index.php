<?php
require("../model/classdatabase.php");
$keyword = ''; 

if (isset($_POST['btSearch'])) {
    $keyword = $_POST['gsearch'];
}

if (!empty($keyword)) {
    $keyword = urlencode($keyword); 
    $obj = new manage();
    $results = $obj->searchBenhNhan($keyword);
}
?>
<div class="col-md-12">
    <div class="row text-center">
        <h2>BỆNH NHÂN</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="post">
                <div class="row my-4">
                    <div class="col-2">
                        <button type="submit" name="btSearch" class="btn bg-dark text-white w-100">Tìm kiếm</button>
                    </div>
                    <div class="col-10">
                        <input type="search" id="gsearch" name="gsearch" class="form-control w-100">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (!empty($keyword)) { 
        if ($results) {
            echo "<div class='row my-4'><h3 class='text-center'>KẾT QUẢ TÌM KIẾM</h3>";
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
                    </tr>
                </thead>";

            foreach ($results as $key => $result) {
                $gioiTinh = ($result['gioi_tinh'] == 1) ? 'Nam' : 'Nữ'; // Hiển thị 1 là Nam, 2 là Nữ
                echo "
                    <tbody>
                        <tr>
                            <td>" . ($key + 1) . "</td>
                            <td>{$result['ma_benh_nhan']}</td>
                            <td>{$result['ten_benh_nhan']}</td>
                            <td>{$gioiTinh}</td>
                            <td>{$result['ngay_sinh']}</td>
                            <td>{$result['so_dien_thoai']}</td>
                            <td>
                                <a href='index.php?page=prescribe&cate=" . $result['id_benh_nhan'] . "' class='btn btn-dark text-black'><img src='/thesixhospital/assets/images/eye.svg' alt='' style='width:20px; height: 20px'></a>
                            </td>
                        </tr>
                    </tbody>";
            }
            echo "</table></div>";
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm nào phù hợp');</script>";
        }
    }
    ?>

    <div class="row mt-4">
        <h3 class="text-center">DANH SÁCH BỆNH NHÂN</h3>
        <?php
        $obj = new doctor();
        $sql = "SELECT * FROM benh_nhan";
        $result = $obj->getdata($sql);

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
                    </tr>
                </thead>";
        foreach ($result as $key => $results) {
            $gioiTinh = ($results['gioi_tinh'] == 1) ? 'Nam' : 'Nữ'; // Hiển thị 1 là Nam, 2 là Nữ
            echo "
                <tbody>
                    <tr>
                        <td>" . ($key + 1) . "</td>
                        <td>{$results['ma_benh_nhan']}</td>
                        <td>{$results['ten_benh_nhan']}</td>
                        <td>{$gioiTinh}</td>
                        <td>{$results['ngay_sinh']}</td>
                        <td>{$results['so_dien_thoai']}</td>
                        <td>
                            <a href='index.php?page=prescribe&cate=" . $results['id_benh_nhan'] . "' class='btn btn-dark text-black'><img src='/thesixhospital/assets/images/eye.svg' alt='' style='width:20px; height: 20px'></a>
                        </td>
                    </tr>
                </tbody>";
        }
        echo "</table>";
        ?>
    </div>
</div>
