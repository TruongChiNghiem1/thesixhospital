<div>
    <nav class="ms-2 mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/thesixhospital/adminIndex.php?m=services&a=list-calendar">Lịch đặt dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đặt lịch</li>
        </ol>
    </nav>
<div class="bg-white border-main">
    <div class="p-5">
        <div class="d-flex justify-content-center mt-3 mb-4">
            <h3>Chi tiết đặt lịch</h3>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a type="button" class="btn btn-secondary me-3" href="/thesixhospital/adminIndex.php?m=services&a=list">Hủy <i class="fa-solid fa-xmark"></i></a>
            <button type="button" class="btn btn-primary">Lưu <i class="fa-solid fa-floppy-disk ms-2"></i></button>
        </div>
        <form>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Nguyễn Văn A" readonly>
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" disabled>
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Số điện thoại <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="0859774418" readonly>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="a@gmail.com" readonly>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
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
                <label class="d-flex mb-2" for="exampleInputEmail1">Ngày khám <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="2024-11-20">
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Chọn thời gian <span class="text-danger">*</span></label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Chọn thời gian</option>
                    <option value="1" selected>Buổi sáng </option>
                    <option value="2">Buổi chiều</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Ghi chú <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="10">Tôi có tiền sử bệnh hoen suyễn</textarea>
            </div>
        </form>
    </div>
</div>
