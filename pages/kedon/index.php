<?php
    require('handle.php');
    $obj = new manage();
    $result = $obj->hoSoBenhAn($cate);

    $sql_loai_thuoc = "SELECT * FROM loai_thuoc";
    $loai_thuoc = $obj->getdata($sql_loai_thuoc);

    $sql_medicines = "SELECT * FROM thuoc";
    $medicines = $obj->getdata($sql_medicines);

    if ($result) {
        echo '
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">THÔNG TIN BỆNH NHÂN</h3>
                    <table class="table table-hover table-bordered">
                        <tr><th>Họ và tên</th><td>' . $result[0]["ten_benh_nhan"] . '</td></tr>
                        <tr><th>Ngày sinh</th><td>' . $result[0]["ngay_sinh"] . '</td></tr>
                        <tr><th>Địa chỉ</th><td>' . $result[0]["dia_chi"] . '</td></tr>
                        <tr><th>Số điện thoại</th><td>' . $result[0]["so_dien_thoai"] . '</td></tr>
                        <tr><th>Giới tính</th><td>' . $result[0]["gioi_tinh"] . '</td></tr>
                    </table>
                </div>
            </div>

            <div class = "row">
                <div class="col-12">
                    <h3 class="text-center">CHẨN ĐOÁN</h3>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>Ngày khám</th>
                            <th>Chẩn đoán</th>
                            <th>Kết luận</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>' . $result[0]["ngay_kham"] . '</td>
                                <td>' . $result[0]["chuan_doan"] . '</td>
                                <td>' . $result[0]["mo_ta"] . '</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <h3 class="text-center">KÊ ĐƠN</h3>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_ho_so_benh_an" value="' . $result[0]["id_ho_so_benh_an"] . '">
                        <input type="hidden" name="id_benh_nhan" value="' . $result[0]["id_benh_nhan"] . '">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>Loại thuốc</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Cách dùng</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody id="medicineRows">
                                <tr>
                                    <td>
                                        <select class="form-control text-center loai-thuoc" onchange="loadMedicineOptions(this)">
                                            <option value="">-- Chọn loại thuốc --</option>';
                                            foreach ($loai_thuoc as $loai) {
                                                echo '<option value="' . $loai["id_loai_thuoc"]  . '">' . $loai["ten_loai_thuoc"] . '</option>';
                                            }
                                        echo '</select>
                                    </td>
                                    <td>
                                        <select class="form-control text-center ten-thuoc" name="ten_thuoc[]" required>
                                            <option value="">-- Chọn thuốc --</option>
                                        </select>
                                    </td>
                                    <td><input type="number" name="so_luong[]" class="form-control" min="1" required></td>
                                    <td><input type="text" name="ghi_chu[]" class="form-control" required></td>
                                    <td><button type="button" class="btn border" onclick="removeRow(this)"><img src ="/thesixhospital/assets/images/trash3.svg" alt="" style="width:20px; height: 20px"></button></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn bg-success text-white me-5 px-4" onclick="addRow()">Thêm thuốc</button>
                        <input type="submit" class="btn bg-dark text-white my-4 px-5" name="btThemDonThuoc" value="Kê đơn" />
                    </form>
                </div>
            </div>
        ';
    }
?>
<script>
var allMedicines = <?php echo json_encode($medicines); ?>;
function addRow() {
    var row = `
        <tr>
            <td>
                <select class="form-control text-center loai-thuoc" onchange="loadMedicineOptions(this)">
                    <option value="">-- Chọn loại thuốc --</option>`;
                    <?php foreach ($loai_thuoc as $loai) { ?>
                        row += '<option value="<?php echo $loai["id_loai_thuoc"]; ?>"><?php echo $loai["ten_loai_thuoc"]; ?></option>';
                    <?php } ?>
                row += `
                </select>
            </td>
            <td>
                <select class="form-control text-center ten-thuoc" name="ten_thuoc[]" required>
                    <option value="">-- Chọn thuốc --</option>
                </select>
            </td>
            <td><input type="number" name="so_luong[]" class="form-control" required></td>
            <td><input type="text" name="ghi_chu[]" class="form-control" required></td>
            <td><button type="button" class="btn border" onclick="removeRow(this)"><img src ="/thesixhospital/assets/images/trash3.svg" alt="" style="width:20px; height: 20px"></button></td>
        </tr>`;
    document.getElementById('medicineRows').insertAdjacentHTML('beforeend', row);
}
function removeRow(button) {
    button.closest('tr').remove();
}
function loadMedicineOptions(selectElement) {
    var loaiThuocId = selectElement.value;
    var row = selectElement.closest('tr');
    var tenThuocSelect = row.querySelector('.ten-thuoc');
    tenThuocSelect.innerHTML = '<option value="">-- Chọn thuốc --</option>';

    allMedicines.forEach(function(medicine) {
        if (medicine.loai_thuoc == loaiThuocId) {
            var option = `<option value="${medicine.id_thuoc}">${medicine.ten_thuoc}</option>`;
            tenThuocSelect.insertAdjacentHTML('beforeend', option);
        }
    });
}
</script>
