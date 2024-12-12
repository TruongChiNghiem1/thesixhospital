<?php
if (isset($_GET["a"]) && $_GET["a"] === 'edit' && isset($_GET["id"])) {
    $id = $_GET["id"];
    $service = get_service_by_id($id); // Lấy thông tin dịch vụ theo ID

    if (!$service) {
        echo "Dịch vụ không tồn tại.";
        exit;
    }

    $errors = array();

    if (isset($_POST["update"])) {
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
            $image_path = $service['hinh_anh']; // Giữ nguyên hình ảnh cũ nếu không upload mới
        }

        if (empty($errors)) {
            // Cập nhật thông tin dịch vụ
            $service["ten_dich_vu"] = check_input($_POST["ten_dich_vu"]);
            $service["gia_goc"] = check_input($_POST["gia_goc"]);
            $service["gia_giam"] = check_input($_POST["gia_giam"]);
            $service["chi_tiet"] = check_input($_POST["chi_tiet"]);
            $service["mo_ta"] = check_input($_POST["mo_ta"]);
            $service["hinh_anh"] = $image_path; // Lưu đường dẫn hình ảnh

            update_service($id, $service);
            echo '<script type="text/javascript">
                    window.location.href = "/thesixhospital/adminIndex.php?m=services&a=list&message=Cập nhật dịch vụ thành công";
                  </script>';
        }
    }
}
?>

<div>
    <nav class="ms-2 mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/thesixhospital/adminIndex.php?m=services&a=list">Danh sách dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa dịch vụ</li>
        </ol>
    </nav>
    <div class="bg-white border-main">
        <div class="p-5">
            <div class="d-flex justify-content-center mt-3 mb-4">
                <h3>Sửa dịch vụ</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="d-flex justify-content-end mb-3">
                    <a type="button" class="btn btn-secondary me-3" href="/thesixhospital/adminIndex.php?m=services&a=list">Hủy <i class="fa-solid fa-xmark"></i></a>
                    <button type="submit" class="btn btn-primary" name="update">Cập nhật <i class="fa-solid fa-floppy-disk ms-2"></i></button>
                </div>
                <?php if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
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
                           value="<?php echo htmlspecialchars($service['ten_dich_vu']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="gia_goc">Giá gốc</label>
                    <input type="text" class="form-control" name="gia_goc" id="gia_goc" placeholder="Giá gốc"
                           value="<?php echo htmlspecialchars($service['gia_goc']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="gia_giam">Giá giảm</label>
                    <input type="text" class="form-control" name="gia_giam" id="gia_giam" placeholder="Giá giảm"
                           value="<?php echo htmlspecialchars($service['gia_giam']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="chi_tiet">Chi tiết dịch vụ</label>
                    <textarea class="form-control" name="chi_tiet" id="chi_tiet"><?php echo htmlspecialchars($service['chi_tiet']); ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="mo_ta">Mô tả</label>
                    <textarea class="form-control" name="mo_ta" id="mo_ta"><?php echo htmlspecialchars($service['mo_ta']); ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="d-flex mb-2" for="hinh_anh">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh" id="hinh_anh" accept="image/*">
                    <img src="<?php echo $service['hinh_anh']; ?>" alt="Hình ảnh dịch vụ" width="300px" class="mt-2"/>
                </div>
            </form>
        </div>
    </div>
</div>
