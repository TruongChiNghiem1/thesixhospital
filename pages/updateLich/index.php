<?php
    require('../model/classdatabase.php');
    require('handle.php');
if (isset($_GET['cate'])) {
    $cate = $_GET['cate']; 
    $obj = new manage();
    $result = $obj->detailLich($cate); 
    
    if ($result) {
        ?>

        <form method="post" enctype="multipart/form-data">
            <h3 class="text-center my-4">CẬP NHẬT LỊCH HẸN</h3>
            <input type="hidden" name="id" value="<?= htmlspecialchars($result[0]['id_lich_hen']) ?>">
            <table class="table table-bordered">
                <tr>
                    <td>Ngày giờ</td>
                    <td>
                        <input type="datetime-local" class="form-control" name="ngay_gio" value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($result[0]['ngay_gio']))) ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên bệnh nhân</td>
                    <td>
                        <input type="text" class="form-control" name="ten_benh_nhan" readonly value="<?= htmlspecialchars($result[0]['ten_benh_nhan']) ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    <td>
                        <textarea class="form-control" name="ghi_chu"><?= htmlspecialchars($result[0]['ghiChu']) ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select class="form-control" name="trang_thai">
                            <option value="1" <?= $result[0]['trang_thai'] == '1' ? 'selected' : '' ?>>Chờ bác sĩ</option>
                            <option value="2" <?= $result[0]['trang_thai'] == '2' ? 'selected' : '' ?>>Khám thành công</option>
                            <option value="3" <?= $result[0]['trang_thai'] == '3' ? 'selected' : '' ?>>Chờ khám</option>
                            <option value="4" <?= $result[0]['trang_thai'] == '3' ? 'selected' : '' ?>>Khám không thành công</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div  class="row d-flex justify-content-center">
                <input type="submit" name="btSua" class="btn bg-dark text-white" style="width: 200px" value="Cập nhật">
            </div>
        </form>
        <?php
    } else {
        echo "Không tìm thấy lịch hẹn.";
    }
} else {
    echo "Không có ID lịch hẹn được cung cấp.";
}
?>
