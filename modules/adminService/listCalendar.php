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
                <th>Dịch vụ khám</th>
                <th>Tổng</th>
                <th>Ngày khám</th>
                <th>Bác sĩ phụ trách</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = 1; $i < 50; $i++) { ?>
                <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td><a class="text-decoration-none" href="/thesixhospital/adminIndex.php?m=services&a=create-calendar">Trương Chí Nghiệm <?php echo $i ?></a></td>
                    <td>Dịch vụ khám sức khỏe lái xe</td>
                    <td>250.000 VNĐ</td>
                    <td>31/10/2024</td>
                    <td><span class="text-danger">Chưa có bác sĩ</span></td>
                    <td><span class="text-danger">Đang chờ bác sĩ</span></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPhanCong<?php echo $i ?>">Phân công</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="modalPhanCong<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chọn bác sĩ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group mb-3">
                                        <label class="d-flex mb-2" for="exampleInputEmail1">Chọn bác sĩ</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Chọn bác sĩ</option>
                                            <option value="1">Trương Chí Nghiệm</option>
                                            <option value="2">Cao Thanh Việt</option>
                                            <option value="3">Nguyễn Nhật Tùng</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>
