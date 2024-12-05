<?php
$errors = array();

if (isset($_POST["create"])) {
    // Kiểm tra các trường nhập liệu
    if (empty($_POST["ten_dich_vu"])) {
        $errors[] = "Vui lòng nhập tên dịch vụ";
    }

    if (empty($_POST["gia_goc"])) {
        $errors[] = "Vui lòng nhập giá gốc";
    }

    if (empty($_POST["gia_giam"])) {
        $errors[] = "Vui lòng nhập giá giảm";
    }

    if (empty($_POST["chi_tiet"])) {
        $errors[] = "Vui lòng nhập chi tiết dịch vụ";
    }

    if (empty($_POST["mo_ta"])) {
        $errors[] = "Vui lòng nhập mô tả";
    }

    // Kiểm tra upload hình ảnh
    if (isset($_FILES["hinh_anh"]) && $_FILES["hinh_anh"]["error"] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES["hinh_anh"]["tmp_name"];
        $image_name = basename($_FILES["hinh_anh"]["name"]);
        $upload_dir = "assets/images/uploads/";
        $image_path = $upload_dir . $image_name;

        // Kiểm tra nếu thư mục tồn tại, nếu không thì tạo mới
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Di chuyển hình ảnh vào thư mục
        if (!move_uploaded_file($image_tmp_name, $image_path)) {
            $errors[] = "Không thể tải hình ảnh lên.";
        }
    } else {
        $errors[] = "Vui lòng chọn hình ảnh.";
    }

    if (empty($errors)) {
        // Lưu trữ thông tin dịch vụ
        $service["ten_dich_vu"] = check_input($_POST["ten_dich_vu"]);
        $service["gia_goc"] = check_input($_POST["gia_goc"]);
        $service["gia_giam"] = check_input($_POST["gia_giam"]);
        $service["chi_tiet"] = check_input($_POST["chi_tiet"]);
        $service["mo_ta"] = check_input($_POST["mo_ta"]);
        $service["created_at"] = date('Y-m-d H:i:s');
        $service["hinh_anh"] = $image_path; // Lưu đường dẫn hình ảnh

        // Kiểm tra trùng lặp
        if (duplicate_service($service["ten_dich_vu"])) {
            create_service($service);
            echo '<script type="text/javascript">
                    window.location.href = "/thesixhospital/adminIndex.php?m=services&a=list&message=Thêm dịch vụ thành công";
                  </script>';
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
            <form action="" method="post" enctype="multipart/form-data">

                <div class="d-flex justify-content-end mb-3">
                    <a type="button" class="btn btn-secondary me-3" href="/thesixhospital/adminIndex.php?m=services&a=list">Hủy <i class="fa-solid fa-xmark"></i></a>
                    <button type="submit" class="btn btn-primary" name="create">Lưu <i class="fa-solid fa-floppy-disk ms-2"></i></button>
                </div>
                <?php if (!empty($errors)) { ?>
                    <div class="error text-danger mb-3">
                        <ul>
                            <?php
                            foreach ($errors as $error) {
                                echo "<li>$error</li>";
                            }
                            ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="ten_dich_vu">Tên dịch vụ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="ten_dich_vu" id="ten_dich_vu" placeholder="Dịch vụ tổng quát..."
                        <?php if (isset($_POST["ten_dich_vu"])) echo 'value="'.htmlspecialchars($_POST["ten_dich_vu"]).'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="gia_goc">Giá gốc</label>
                    <input type="text" class="form-control" name="gia_goc" id="gia_goc" placeholder="Giá gốc"
                        <?php if (isset($_POST["gia_goc"])) echo 'value="'.htmlspecialchars($_POST["gia_goc"]).'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="gia_giam">Giá giảm</label>
                    <input type="text" class="form-control" name="gia_giam" id="gia_giam" placeholder="Giá giảm"
                        <?php if (isset($_POST["gia_giam"])) echo 'value="'.htmlspecialchars($_POST["gia_giam"]).'"'; ?>>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="chi_tiet">Chi tiết dịch vụ</label>
                    <textarea class="form-control" name="chi_tiet" id="chi_tiet"><?php if (isset($_POST["chi_tiet"])) echo htmlspecialchars($_POST["chi_tiet"]); ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="mo_ta">Mô tả</label>
                    <textarea class="form-control" name="mo_ta" id="mo_ta"><?php if (isset($_POST["mo_ta"])) echo htmlspecialchars($_POST["mo_ta"]); ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="hinh_anh">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh" id="hinh_anh" accept="image/*">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
function duplicate_service($name) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM dich_vu WHERE ten_dich_vu = :name");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() === 0; // Trả về true nếu không trùng lặp
}

function create_service($data) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO dich_vu (ten_dich_vu, gia_goc, gia_giam, chi_tiet, mo_ta, created_at, hinh_anh) VALUES (:ten_dich_vu, :gia_goc, :gia_giam, :chi_tiet, :mo_ta, :created_at, :hinh_anh)");
    $stmt->bindParam(':ten_dich_vu', $data["ten_dich_vu"]);
    $stmt->bindParam(':gia_goc', $data["gia_goc"]);
    $stmt->bindParam(':gia_giam', $data["gia_giam"]);
    $stmt->bindParam(':chi_tiet', $data["chi_tiet"]);
    $stmt->bindParam(':mo_ta', $data["mo_ta"]);
    $stmt->bindParam(':created_at', $data["created_at"]);
    $stmt->bindParam(':hinh_anh', $data["hinh_anh"]);
    $stmt->execute();
}
?>
