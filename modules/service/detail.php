<?php
if (isset($_GET["a"]) && $_GET["a"] === 'detail' && isset($_GET["id"])) {
    $id = $_GET["id"];
    $service = get_service_by_id($id);

    if (!$service) {
        echo "Dịch vụ không tồn tại.";
        exit;
    }

    $indexExId = indexExId($id);
}

?>

<div class="container mt-3" >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/thesixhospital/index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/thesixhospital/index.php?m=service">Dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($service['ten_dich_vu']); ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-6 h_400px">
            <div id="carouselExampleIndicators" class="carousel slide">
<!--                <div class="carousel-indicators">-->
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
<!--                </div>-->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $service['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" class="card-img-top" alt="...">
                    </div>
<!--                    <div class="carousel-item">-->
<!--                        <img src="/thesixhospital/assets/images/service/1.jpg" class="card-img-top" alt="...">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img src="/thesixhospital/assets/images/service/2.png" class="card-img-top" alt="...">-->
<!--                    </div>-->
                </div>
<!--                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">-->
<!--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                    <span class="visually-hidden">Previous</span>-->
<!--                </button>-->
<!--                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">-->
<!--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                    <span class="visually-hidden">Next</span>-->
<!--                </button>-->
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
                <p class="text-decoration-line-through me-2"><?php echo htmlspecialchars($service['gia_goc']); ?> VNĐ</p>
                <h3 class="text-danger pl-3"><?php echo htmlspecialchars($service['gia_giam']); ?> VNĐ</h3>
            </div>
            <div class="mt-3" style="display: flex; flex-direction: column; gap: 8px;">
                <div class="WidgetTitle__WidgetTitleStyled-sc-12sadap-1 bPRVIq">Chi tiết</div>
                <div style="display: flex; flex-direction: column; gap: 4px;">
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">
                        <div class="me-2" style="display: flex; align-items: center; height: 21px; flex-shrink: 0;"><img width="16" height="16" src="https://salt.tikicdn.com/ts/upload/81/61/d4/92e63f173e7983b86492be159fe0cff4.png" alt="blue-check"></div>
                        Khám tổng quát lâm sàn.
                    </div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">
                        <div class="me-2" style="display: flex; align-items: center; height: 21px; flex-shrink: 0;"><img width="16" height="16" src="https://salt.tikicdn.com/ts/upload/81/61/d4/92e63f173e7983b86492be159fe0cff4.png" alt="blue-check"></div>
                        Khám mắt.
                    </div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">
                        <div class="me-2" style="display: flex; align-items: center; height: 21px; flex-shrink: 0;"><img width="16" height="16" src="https://salt.tikicdn.com/ts/upload/81/61/d4/92e63f173e7983b86492be159fe0cff4.png" alt="blue-check"></div>
                        Khám tay mũi họng.
                    </div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">
                        <div class="me-2" style="display: flex; align-items: center; height: 21px; flex-shrink: 0;"><img width="16" height="16" src="https://salt.tikicdn.com/ts/upload/81/61/d4/92e63f173e7983b86492be159fe0cff4.png" alt="blue-check"></div>
                        Khám răng hàm mặt.
                    </div>
                    <div class="HighlightInfo__HighlightInfoContentStyled-sc-1pr13u3-0 iVYaat d-flex align-items-center">
                        <div class="me-2" style="display: flex; align-items: center; height: 21px; flex-shrink: 0;"><img width="16" height="16" src="https://salt.tikicdn.com/ts/upload/81/61/d4/92e63f173e7983b86492be159fe0cff4.png" alt="blue-check"></div>
                        Có kết quả ngay trong ngày.
                    </div>
                </div>
            </div>
            <div class="d-flex mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Đặt lịch ngay</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nguyễn Văn A...">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                        <label class="form-check-label" for="inlineRadio1">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0123456789...">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="a@gmail.com...">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDatLich">Tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalDatLich" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chọn ngày lịch khám dịch vụ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Chọn bác sĩ</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Chọn bác sĩ</option>
                                        <option value="1">Trương Chí Nghiệm</option>
                                        <option value="2">Cao Thanh Việt</option>
                                        <option value="3">Nguyễn Nhật Tùng</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Chọn ngày khám <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0123456789...">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Chọn thời gian <span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Chọn thời gian</option>
                                        <option value="1">Buổi sáng </option>
                                        <option value="2">Buổi chiều</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="d-flex mb-2" for="exampleInputEmail1">Ghi chú <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="10"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="hideModalThongTin">Đóng</button>
                            <button type="button" class="btn btn-primary">Đặt lịch</button>
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
                <a class="text-decoration-none" href="/thesixhospital/index.php?m=service&a=detail">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $indexExI['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($indexExI['ten_dich_vu']); ?></h5>
                            <!--                    <p class="card-text">Khám sức khỏe lái xe là thủ tục bắt buộc khi muốn học, thi và đổi bằng lái ô tô...</p>-->
                            <div style="">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                (5)
                            </div>
                            <div class="d-flex justify-content-end w-100 mt-3">
                                <div class="d-flex justify-content-between w-75">
                                    <p class="text-decoration-line-through"><?php echo htmlspecialchars($indexExI['gia_goc']); ?> VNĐ</p>
                                    <p class="text-danger pl-3"><?php echo htmlspecialchars($indexExI['gia_giam']); ?> VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="d-flex justify-content-end">
        <a class="me-3 btn btn-primary" href="/thesixhospital/index.php?m=service" >Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
    </div>

</div>
