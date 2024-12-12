<?php
$results = getListCalendar();
$doctors = getDoctors(); // Lấy danh sách bác sĩ
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
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-primary" href="/thesixhospital/adminIndex.php?m=services&a=create">Thêm mới <i class="fa-solid fa-plus"></i></a>
        </div>
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
            <?php foreach ($results as $row): ?>
                <tr>
                    <td class="text-center"><?php echo $row['id_lich_hen']; ?></td>
                    <td><a class="text-decoration-none" href="/thesixhospital/adminIndex.php?m=services&a=detail-calendar&id=<?php echo $row['id_lich_hen']; ?>"><?php echo htmlspecialchars($row['ten_benh_nhan']); ?></a></td>
                    <td><?php echo htmlspecialchars($row['so_dien_thoai']); ?></td>
                    <td><?php echo htmlspecialchars($row['ten_dich_vu']); ?></td>
                    <td><?php echo htmlspecialchars($row['gia_goc']); ?> VNĐ</td>
                    <td><?php echo date('d/m/Y', strtotime($row['ngay_gio'])); ?></td>
                    <td><?php echo $row['bac_si'] ? htmlspecialchars($row['bac_si']) : '<span class="text-danger">Chưa có bác sĩ</span>'; ?></td>
                    <td>
                        <?php
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
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        if ($row['trang_thai'] == 1) {
                            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPhanCong' . $row['id_lich_hen'] . '">Phân công</button>';
                        }
                        ?>
                        <button type="button" class="btn btn-danger">Từ chối</button>
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
                            <div class="modal-body">
                                <form action="/thesixhospital/modules/adminService/assign_doctor.php" method="POST">
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
                                    <div class="form-group mb-3">
                                        <label class="d-flex mb-2" for="status">Trạng thái</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="1">Chờ bác sĩ</option>
                                            <option value="2">Chờ khám</option>
                                            <option value="3">Khám thành công</option>
                                            <option value="4">Từ chối</option>
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
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
