<?php
$user_type = $_SESSION['loai_nhan_vien'] ?? null;
$user_id = $_SESSION['id'] ?? null;
if ($user_type == 1) {
    $results = getListCalendar();
} else if (in_array($user_type, [2, 3, 4])) {
    $results = getListCalendar($user_id);
}
$doctors = getDoctors();
?>

<nav class="ms-2 mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách lịch đặt dịch vụ</li>
    </ol>
</nav>
<div class="bg-white border-main">
    <div class="p-5">
        <div class="d-flex justify-content-center mt-3 mb-4">
            <h3>Danh sách lịch đặt dịch vụ</h3>
        </div>
<!--        <div class="d-flex justify-content-end">-->
<!--            --><?php //if ($user_type == 1): ?>
<!--                <a type="button" class="btn btn-primary" href="/thesixhospital/adminIndex.php?m=services&a=create">Thêm mới <i class="fa-solid fa-plus"></i></a>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
        <table id="adminServiceTable" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">Mã lịch</th>
                <th>Tên bệnh nhân</th>
                <th>Số điện thoại</th>
                <th>Dịch vụ khám</th>
                <th>Tổng</th>
                <th>Ngày khám</th>
                <th>Bác sĩ phụ trách</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row):
                $getOneNhanVien = selectIDInfomationBS($row['id_benh_nhan']);
                ?>
                <tr>
                    <td class="text-center"><?php echo $row['id_lich_hen']; ?></td>
                    <td><a class="text-decoration-none" href="/thesixhospital/adminIndex.php?m=services&a=detail-calendar&id=<?php echo $row['id_lich_hen']; ?>"><?php echo htmlspecialchars($getOneNhanVien['ho_ten']); ?></a></td>
                    <td><?php echo htmlspecialchars($getOneNhanVien['so_dien_thoai']); ?></td>
                    <td><?php echo htmlspecialchars($row['ten_dich_vu']); ?></td>
                    <td><?php echo htmlspecialchars($row['gia_goc']); ?> VNĐ</td>
                    <td><?php echo date('d/m/Y', strtotime($row['ngay_gio'])); ?></td>
                    <td><?php echo $row['bac_si'] ? htmlspecialchars($row['bac_si']) : '<span class="text-danger">Chưa có bác sĩ</span>'; ?></td>
                    <td>
                        <?php if($user_type == 1) { ?>
                        <select class="form-select status-select
                        <?php
                        switch ($row['trang_thai']) {
                            case 1:
                                echo 'text-warning';
                                break;
                            case 2:
                                echo 'text-primary';
                                break;
                            case 3:
                                echo 'text-success';
                                break;
                            case 4:
                                echo 'text-danger';
                                break;
                        }
                        ?>
                        " data-id="<?php echo $row['id_lich_hen']; ?>">
                            <?php
                            switch ($row['trang_thai']) {
                                case 1:
                                    echo '<option value="1" class="text-warning" selected>Chờ bác sĩ</option>';
                                    break;
                                case 2:
                                    echo '<option value="2" selected>Chờ khám</option>';
                                    break;
                                case 3:
                                    echo '<option value="3" selected>Khám thành công</option>';
                                    break;
                                case 4:
                                    echo '<option value="4" selected>Từ chối</option>';
                                    break;
                            }
                            ?>
                            <option value="1" class="text-warning">Chờ bác sĩ</option>
                            <option value="2" class="text-primary">Chờ khám</option>
                            <option value="3" class="text-success">Khám thành công</option>
                            <option value="4" class="text-danger">Từ chối</option>
                        </select>
                        <?php } else {
                            switch ($row['trang_thai']) {
                                case 1:
                                    echo '<span class="text-warning">Chờ bác sĩ</span>';
                                    break;
                                case 2:
                                    echo '<span class="text-primary">Chờ khám</span>';
                                    break;
                                case 3:
                                    echo '<span class="text-success">Khám thành công</span>';
                                    break;
                                case 4:
                                    echo '<span class="text-danger">Từ chối</span>';
                                    break;
                            }
                        } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($user_type == 1): // Quản trị viên ?>
                            <?php if ($row['trang_thai'] == 1): ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPhanCong<?php echo $row['id_lich_hen']; ?>">Phân công</button>
                            <?php endif; ?>
                        <?php elseif (in_array($user_type, [2, 3, 4]) && $row['id_nhan_vien'] == $user_id): // Bác sĩ ?>
                            <?php if ($row['trang_thai'] == 2): ?>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalKham<?php echo $row['id_lich_hen']; ?>">Khám</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>

                <!-- Modal Phân công -->
                <div class="modal fade" id="modalPhanCong<?php echo $row['id_lich_hen']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chọn bác sĩ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/thesixhospital/modules/adminService/assign_doctor.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="lich_id" value="<?php echo $row['id_lich_hen']; ?>">
                                    <div class="form-group mb-3">
                                        <label class="d-flex mb-2" for="doctor">Chọn bác sĩ</label>
                                        <select class="form-select" name="doctor_id" id="doctor" required>
                                            <option selected disabled>Chọn bác sĩ</option>
                                            <?php foreach ($doctors as $doctor): ?>
                                                <option value="<?php echo $doctor['id']; ?>"><?php echo htmlspecialchars($doctor['ho_ten']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Khám -->
                <div class="modal fade" id="modalKham<?php echo $row['id_lich_hen']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nhập hồ sơ bệnh án</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/thesixhospital/modules/adminService/save_patient_record.php" method="POST">
                                    <input type="hidden" name="lich_id" value="<?php echo $row['id_lich_hen']; ?>">
                                    <div class="form-group mb-3">
                                        <label for="description">Mô tả</label>
                                        <textarea class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="diagnosis">Chuẩn đoán</label>
                                        <textarea class="form-control" name="diagnosis" id="diagnosis" required></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-success">Lưu hồ sơ</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.querySelectorAll('.status-select').forEach(function(select) {
        select.addEventListener('change', function() {
            const status = this.value;
            const lichId = this.getAttribute('data-id');

            fetch('/thesixhospital/modules/adminService/update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    lich_id: lichId,
                    status: status
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Cập nhật trạng thái thành công');
                    } else {
                        console.error('Cập nhật trạng thái thất bại');
                    }
                })
                .catch((error) => {
                    console.error('Lỗi:', error);
                });
        });
    });
</script>
