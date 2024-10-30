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
        <div class="d-flex justify-content-end mb-3">
            <a type="button" class="btn btn-secondary me-3" href="/thesixhospital/adminIndex.php?m=services&a=list">Hủy <i class="fa-solid fa-xmark"></i></a>
            <button type="button" class="btn btn-primary">Lưu <i class="fa-solid fa-floppy-disk ms-2"></i></button>
        </div>
        <form>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Tên dịch vụ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dịch vụ tổng quát...">
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Giá gốc</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giá gốc"></input>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Giá giảm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Giá giảm"></input>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Chi tiết dịch vụ</label>
                <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="form-group mb-3">
                <label class="d-flex mb-2" for="exampleInputEmail1">Mô tả</label>
                <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
            </div>
        </form>
    </div>
</div>
