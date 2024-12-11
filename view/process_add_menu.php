<?php

include_once("../controller/BSDD/cMenu.php");
$menu = new MenuBS();

if (isset($_POST['add_menu'])) {
    $maMonAn = $_POST['maMonAn'];
    $tenMonAn = $_POST['tenMonAn'];
    $chiSoDinhDuong = $_POST['chiSoDinhDuong'];
    $idNguoiTao = $_POST['idNguoiTao'];
    $ghiChu = $_POST['ghiChu'];

    // Xử lý thêm thực đơn vào cơ sở dữ liệu
    $result = $menu->insertMenu($maMonAn, $tenMonAn, $chiSoDinhDuong, $idNguoiTao, $ghiChu);

    if ($result) {
        echo "Thêm thực đơn thành công";
    } else {
        echo "Lỗi khi thêm thực đơn. Vui lòng thử lại.";
    }
}
?>
