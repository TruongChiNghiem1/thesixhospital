<?php
require('../model/classdatabase.php');
$obj = new manage();
$result = $obj->selectLich();
?>
<div class="col-12">
    <h2 class="text-center pb-4">LỊCH HẸN</h2>
    <table class="table table-hover table-bordered mt-2">
        <thead>
            <tr>
                <th>STT</th>
                <th>Thời gian</th>
                <th>Bệnh nhân</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $results) { 
                // Đặt tên và màu sắc cho trạng thái
                $statusText = '';
                $statusClass = '';
                switch ($results["trang_thai"]) {
                    case '1':
                        $statusText = 'Chờ bác sĩ';
                        $statusClass = 'badge bg-warning';
                        break;
                    case '2':
                        $statusText = 'Khám thành công';
                        $statusClass = 'badge bg-success';
                        break;
                    case '3':
                        $statusText = 'Chờ khám';
                        $statusClass = 'badge bg-primary';
                        break;
                        case '4':
                            $statusText = 'Không thành công';
                            $statusClass = 'badge bg-danger';
                            break;
                    default:
                        $statusText = 'Không rõ';
                        $statusClass = 'badge bg-secondary';
                        break;
                }
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= htmlspecialchars($results["ngay_gio"]) ?></td>
                    <td><?= htmlspecialchars($results["ten_benh_nhan"]) ?></td>
                    <td><?= htmlspecialchars($results["ghiChu"]) ?></td>
                    <td><span class="<?= $statusClass ?>"><?= $statusText ?></span></td>
                    <td>
                        <a href="index.php?page=updateLich&cate=<?= $results["id_lich_hen"] ?>" class="btn border">
                            <img src="/thesixhospital/assets/images/arrow-bar-up.svg" alt="" style="width:20px; height: 20px">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
