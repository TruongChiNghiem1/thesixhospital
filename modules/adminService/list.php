<?php
function get_services() {
    $conn = (new connect())->connectDB(); // Kết nối đến DB
    $query = "SELECT * FROM dich_vu ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    return $services;
}
$services = get_services();
?>

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
        <?php if (isset($_GET['message'])) { ?>
                <?php
                echo "<div class='alert alert-success' role='alert'>" . $_GET['message'] . "</div>";
                ?>
        <?php } ?>
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-primary" href="/thesixhospital/adminIndex.php?m=services&a=create">Thêm mới <i class="fa-solid fa-plus"></i></a>
        </div>
        <table id="adminServiceTable" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th class="text-center">Mã dịch vụ</th>
                <th>Hình ảnh</th>
                <th>Tên dịch vụ</th>
                <th>Giá gốc</th>
                <th>Giá giảm</th>
                <th>Ngày tạo</th>
                <th class="text-center">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($services as $service) { ?>
                <tr>
                    <td class="text-center"><?php echo $service['id_dich_vu']; ?></td>
                    <td><img src="<?php echo $service['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" alt="<?php echo $service['ten_dich_vu']; ?>" width="100px"/></td>
                    <td><a class="text-decoration-none" href="/thesixhospital/adminIndex.php?m=services&a=detail&id=<?php echo $service['id_dich_vu']; ?>"><?php echo $service['ten_dich_vu']; ?></a></td>
                    <td><?php echo number_format($service['gia_goc'], 0, ',', '.') . ' VNĐ'; ?></td>
                    <td><?php echo number_format($service['gia_giam'], 0, ',', '.') . ' VNĐ'; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($service['created_at'])); ?></td>
                    <td class="text-center">
                        <a href="/thesixhospital/adminIndex.php?m=services&a=edit&id=<?php echo $service['id_dich_vu']; ?>" class="btn btn-warning">Sửa</a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(<?php echo $service['id_dich_vu']; ?>)">Xóa</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa dịch vụ này?"))
        {
            window.location.href = "/thesixhospital/adminIndex.php?m=services&a=delete&id=" + id;
        }
    }
</script>