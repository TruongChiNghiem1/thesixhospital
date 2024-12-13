<?php
require("../model/classdatabase.php");
require('handle.php');
$obj = new manage();
?>
<div class="col-12">
<h2 class="text-center">Thêm Lịch Hẹn</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="number" class="form-control" id="id_benh_nhan" name="id_benh_nhan" hidden readonly value="<?= htmlspecialchars($cate) ?>" required>
            <input type="number" class="form-control" id="loai_lich_dat" name="loai_lich_dat" hidden readonly value="2" required>
            <div class="form-group">
                <label for="ngay_gio">Thời gian:</label>
                <input type="datetime-local" class="form-control" id="ngay_gio" name="ngay_gio" required>
            </div>

            <div class="form-group">
                <label for="ghi_chu">Ghi chú:</label>
                <textarea class="form-control" id="ghi_chu" name="ghiChu" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="trang_thai">Trạng thái:</label>
                <select class="form-control" id="trang_thai" name="trang_thai" required>
                    <option value="1">Chờ bác sĩ</option>
                    <option value="2">Khám thành công</option>
                    <option value="3">Chờ khám</option>
                    <option value="4">Không thành công</option>
                </select>
            </div>
            <button type="submit" name="btThemLichHen" class="btn btn-primary">Thêm Lịch Hẹn</button>
        </form>

</div>