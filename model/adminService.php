<?php
$errors = array();

if (isset($_POST["create"])) {
    if (empty($_POST["service_name"])) {
        $errors[] = "Vui lòng nhập tên dịch vụ";
    }

    if (empty($_POST["original_price"])) {
        $errors[] = "Vui lòng nhập giá gốc";
    }

    if (empty($_POST["discount_price"])) {
        $errors[] = "Vui lòng nhập giá giảm";
    }

    if (empty($_POST["service_details"])) {
        $errors[] = "Vui lòng nhập chi tiết dịch vụ";
    }

    if (empty($_POST["description"])) {
        $errors[] = "Vui lòng nhập mô tả";
    }

    if (empty($errors)) {
        $service["name"] = check_input($_POST["service_name"]);
        $service["original_price"] = check_input($_POST["original_price"]);
        $service["discount_price"] = check_input($_POST["discount_price"]);
        $service["service_details"] = check_input($_POST["service_details"]);
        $service["description"] = check_input($_POST["description"]);
        $service["created_at"] = date(DATETIME);

        // Giả sử có hàm kiểm tra trùng lặp
        $result = duplicate_service($service["name"]);

        if ($result) {
            create_service($service);
            header("location:adminIndex.php?m=services&a=list&message=Thêm dịch vụ thành công");
            exit();
        } else {
            $errors[] = "Dịch vụ đã tồn tại. Vui lòng nhập dịch vụ khác.";
        }
    }
}
?>