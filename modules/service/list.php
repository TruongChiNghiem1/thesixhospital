<?php 
$users = index ();
?>

<div class="container">
    <div class="d-flex justify-content-center mt-5 mb-4">
        <h3>Dịch vụ bệnh viện</h3>
    </div>
    <div class="d-flex w-100 justify-content-center">
        <form class="form-inline my-2 my-lg-0 w-50 d-flex">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><span class="text-nowrap ">Tìm kiếm</span></button>
        </form>
    </div>
    <div class="d-flex justify-content-end mb-4">
    <div class="dropdown">
        <button class="btn dropdown-toggle btn-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Sắp xếp
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Giá thấp đến cao</a></li>
            <li><a class="dropdown-item" href="#">Giá cao đến thấp</a></li>
            <li><a class="dropdown-item" href="#">A-z</a></li>
            <li><a class="dropdown-item" href="#">Z-a</a></li>
        </ul>
    </div>

    </div>
    <div class="row">
        <?php for($i = 0; $i < 11; $i++) { ?>
            <div class="col-sm-3 pb-4 mb-sm-0">
                <a class="text-decoration-none" href="/thesixhospital/index.php?m=service&a=detail">
                    <div class="card" style="width: 18rem;">
                        <img src="/thesixhospital/assets/images/service/kham-suc-khoe-lai-xe-2048x1365.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Dịch vụ khám sức khỏe lái xe</h5>
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
                                    <p class="text-decoration-line-through">440.000 VNĐ</p>
                                    <p class="text-danger pl-3">250.000 VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    <div class="d-flex justify-content-end mt-2">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item ">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item " aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">3</a></li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

