<div>
    <nav class="ms-2 mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Danh sách dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới dịch vụ</li>
        </ol>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-center mt-3 mb-4">
            <h3>Thêm mới dịch vụ</h3>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary">Thêm mới <i class="fa-solid fa-plus"></i></button>
        </div>
        <table id="adminServiceTable" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">Mã dịch vụ</th>
                <th>Tên dịch vụ</th>
                <th>Giá gốc</th>
                <th>Giá giảm</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = 1; $i < 50; $i++) { ?>
                <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td>Dịch vụ khám sức khỏe lái xe <?php echo $i ?></td>
                    <td>440.000 VNĐ</td>
                    <td>250.000 VNĐ</td>
                    <td>31/10/2024</td>
                    <td>
                        <button type="button" class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>
