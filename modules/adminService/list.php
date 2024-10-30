    <nav class="ms-2 mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách dịch vụ</li>
        </ol>
    </nav>
<div class="bg-white border-main">
        <div class="p-5">
        <div class="d-flex justify-content-center mt-3 mb-4">
            <h3>Danh sách dịch vụ</h3>
        </div>
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-primary" href="/thesixhospital/adminIndex.php?m=services&a=create">Thêm mới <i class="fa-solid fa-plus"></i></a>
        </div>
        <table id="adminServiceTable" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">Mã dịch vụ</th>
                <th>Tên dịch vụ</th>
                <th>Giá gốc</th>
                <th>Giá giảm</th>
                <th>Ngày tạo</th>
                <th class="text-center">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = 1; $i < 50; $i++) { ?>
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td><a class="text-decoration-none" href="/thesixhospital/adminIndex.php?m=services&a=create">Dịch vụ khám sức khỏe lái xe <?php echo $i ?></a></td>
                <td>440.000 VNĐ</td>
                <td>250.000 VNĐ</td>
                <td>31/10/2024</td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>
</div>
