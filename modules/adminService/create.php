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
            ?>
                <script type="text/javascript">
                    window.location.href = "/thesixhospital/adminIndex.php?m=services&a=list&message=Thêm dịch vụ thành công"
                </script>
            <?php
//            header("location:index.php?m=services&a=list&message=Thêm dịch vụ thành công");
//            exit();
        } else {
            $errors[] = "Dịch vụ đã tồn tại. Vui lòng nhập dịch vụ khác.";
        }
    }
}
?>

<div>
    <nav class="ms-2 mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/thesixhospital/adminIndex.php?m=services&a=list">Danh sách dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới dịch vụ</li>
        </ol>
    </nav>
    <div class="bg-white border-main">
        <div class="p-5">
            <div class="d-flex justify-content-center mt-3 mb-4">
                <h3>Thêm mới dịch vụ</h3>
            </div>
            <form action="" method="post">

            <div class="d-flex justify-content-end mb-3">
                <a type="button" class="btn btn-secondary me-3" href="/thesixhospital/adminIndex.php?m=services&a=list">Hủy <i class="fa-solid fa-xmark"></i></a>
                <button type="submit" class="btn btn-primary" name="create">Lưu <i class="fa-solid fa-floppy-disk ms-2"></i></button>
            </div>
            <?php if (!empty($errors)) { ?>
                <div class="error text-danger mb-3">
                    <?php
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    ?>
                </div>
            <?php } ?>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="service_name">Tên dịch vụ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Dịch vụ tổng quát..."
                        <?php if (isset($_POST["service_name"])) echo 'value="'.$_POST["service_name"].'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="original_price">Giá gốc</label>
                    <input type="text" class="form-control" name="original_price" id="original_price" placeholder="Giá gốc"
                        <?php if (isset($_POST["original_price"])) echo 'value="'.$_POST["original_price"].'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="discount_price">Giá giảm</label>
                    <input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="Giá giảm"
                        <?php if (isset($_POST["discount_price"])) echo 'value="'.$_POST["discount_price"].'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="service_details">Chi tiết dịch vụ</label>
                    <textarea class="form-control" name="service_details" id="service_details"><?php if (isset($_POST["service_details"])) echo $_POST["service_details"]; ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="description">Mô tả</label>
                    <textarea class="form-control" name="description" id="description"><?php if (isset($_POST["description"])) echo $_POST["description"]; ?></textarea>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
function duplicate_service($name) {
    // Hàm kiểm tra trùng lặp dịch vụ
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM service WHERE name = :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() === 0; // Trả về true nếu không trùng lặp
}

function create_service($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO service (name, original_price, discount_price, service_details, description, created_at) VALUES (:name, :original_price, :discount_price, :service_details, :description, :created_at)");
    $stmt->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmt->bindParam(':original_price', $data["original_price"], PDO::PARAM_STR);
    $stmt->bindParam(':discount_price', $data["discount_price"], PDO::PARAM_STR);
    $stmt->bindParam(':service_details', $data["service_details"], PDO::PARAM_STR);
    $stmt->bindParam(':description', $data["description"], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $data["created_at"], PDO::PARAM_STR);
    return $stmt->execute();
}
?>
