<?php
// service.php
if (isset($_GET["a"]) && $_GET["a"] === 'detail' && isset($_GET["id"])) {
    $id = $_GET["id"];
    $service = get_service_by_id($id);

    if (!$service) {
        echo "Dịch vụ không tồn tại.";
        exit;
    }

    $indexExId = indexExId($id);
    $doctors = getDoctors();
}
?>

<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/thesixhospital/index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/thesixhospital/index.php?m=service">Dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($service['ten_dich_vu']); ?></li>
        </ol>
    </nav>
    <div class="row">
        <?php if (isset($_GET['message'])) { ?>
            <div class='alert alert-success' role='alert'><?php echo $_GET['message']; ?></div>
        <?php } ?>

        <div class="col-6 h_400px">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $service['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <h3><?php echo htmlspecialchars($service['ten_dich_vu']); ?></h3>
            <div class="d-flex align-items-center mt-3">
                <div class="me-2">
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star-half-stroke text-warning"></i>
                    (5)
                </div>
                <div class="me-2">|</div>
                <div>32 đánh giá</div>
            </div>
            <div class="d-flex w-75 mt-4">
                <p class="text-decoration-line-through me-2"><?php echo htmlspecialchars(number_format($service['gia_goc'], 0, ',', '.')); ?> VNĐ</p>
                <h3 class="text-danger pl-3"><?php echo htmlspecialchars(number_format($service['gia_giam'], 0, ',', '.')); ?> VNĐ</h3>
            </div>
            <div class="mt-3">
                <div class="WidgetTitle__WidgetTitleStyled-sc-12sadap-1 bPRVIq">Chi tiết</div>
                <div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">Khám tổng quát lâm sàn.</div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">Khám mắt.</div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">Khám tay mũi họng.</div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">Khám răng hàm mặt.</div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">Có kết quả ngay trong ngày.</div>
                </div>
            </div>
            <div class="d-flex mt-4">
                <?php if (!isset($_SESSION["id"])) { ?>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='login.php'">Đặt lịch ngay</button>
                <?php } else { ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDatLich">Đặt lịch ngay</button>
                <?php } ?>
            </div>

            <!-- Modal Đặt Lịch -->
            <div class="modal fade" id="modalDatLich" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chọn ngày lịch khám dịch vụ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/thesixhospital/index.php?m=service&a=booking-service" method="POST">
                                <input type="hidden" name="id_dich_vu" value="<?php echo $id; ?>"/>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="doctor">Chọn bác sĩ</label>
                                    <select class="form-select" name="doctor_id" id="doctor" required onchange="fetchAvailableDates(this.value)">
                                        <option selected disabled>Chọn bác sĩ</option>
                                        <?php foreach ($doctors as $doctor): ?>
                                            <option value="<?php echo $doctor['id']; ?>"><?php echo htmlspecialchars($doctor['ho_ten']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div id="available-dates" class="mb-3" style="display: none;">
                                    <label class="d-flex mb-2">Chọn ngày khám <span class="text-danger">*</span></label>
                                    <div id="dates-container"></div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="time">Chọn thời gian <span class="text-danger">*</span></label>
                                    <select class="form-select" name="time" id="time" required>
                                        <option selected disabled>Chọn thời gian</option>
                                        <option value="morning">Buổi sáng</option>
                                        <option value="afternoon">Buổi chiều</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="notes">Ghi chú <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="notes" id="notes" rows="10" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Đặt lịch</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5">
            <h4>Mô tả</h4>
            <?php echo $service['mo_ta']; ?>
        </div>

        <?php foreach($indexExId as $indexExI) { ?>
            <div class="col-sm-3 pb-4 mb-sm-0">
                <a class="text-decoration-none" href="/thesixhospital/index.php?m=service&a=detail&id=<?php echo $indexExI['id']; ?>">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $indexExI['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" class="card-img-top" alt="..." height="214px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($indexExI['ten_dich_vu']); ?></h5>
                            <div>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                (5)
                            </div>
                            <div class="d-flex justify-content-end w-100 mt-3">
                                <div class="d-flex justify-content-between w-100">
                                    <p class="text-decoration-line-through"><?php echo htmlspecialchars(number_format($indexExI['gia_goc'], 0, ',', '.')); ?> VNĐ</p>
                                    <p class="text-danger pl-3"><?php echo htmlspecialchars(number_format($indexExI['gia_giam'], 0, ',', '.')); ?> VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="d-flex justify-content-end">
        <a class="me-3 btn btn-primary" href="/thesixhospital/index.php?m=service">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
    </div>
</div>

<script>
    function fetchAvailableDates(doctorId) {
        if (doctorId) {
            // Gọi Ajax để lấy ngày làm việc của bác sĩ
            fetch(`/thesixhospital/modules/service/get_available_dates.php?doctor_id=${doctorId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const datesContainer = document.getElementById('dates-container');
                    datesContainer.innerHTML = ''; // Xóa nội dung cũ

                    if (data.error) {
                        console.error('Server error:', data.error);
                        alert(data.error); // Thông báo lỗi cho người dùng
                        return;
                    }

                    data.forEach(date => {
                        const radioButton = document.createElement('div');
                        radioButton.innerHTML = `
                    <input type="radio" name="date" value="${date}" required>
                    <label>${date}</label>
                `;
                        datesContainer.appendChild(radioButton);
                    });
                    document.getElementById('available-dates').style.display = 'block'; // Hiển thị phần chọn ngày
                })
                .catch(error => console.error('Error fetching available dates:', error));
        } else {
            document.getElementById('available-dates').style.display = 'none'; // Ẩn phần chọn ngày nếu không có bác sĩ
        }
    }

</script>
