<?php
$search = $_GET['search'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = 12;

$totalServices = countServices($search);
$totalPages = ceil($totalServices / $limit);
$services = index2($search, $page, $limit);
?>

<div class="container">
    <div class="d-flex justify-content-center mt-5 mb-4">
        <h3>Dịch vụ bệnh viện</h3>
    </div>
    <div class="d-flex w-100 justify-content-center">
        <form class="form-inline my-2 my-lg-0 w-50 d-flex" method="GET" action="http://localhost/thesixhospital/index.php?m=service">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Tìm kiếm" aria-label="Search" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><span class="text-nowrap">Tìm kiếm</span></button>
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
        <?php foreach($services as $service) { ?>
            <div class="col-sm-3 pb-4 mb-sm-0">
                <a class="text-decoration-none" href="/thesixhospital/index.php?m=service&a=detail&id=<?php echo $service['id_dich_vu']; ?>">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $service['hinh_anh'] ?? 'assets/images/logo.jpg'; ?>" class="card-img-top" height="214px" alt="<?php echo htmlspecialchars($service['ten_dich_vu']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($service['ten_dich_vu']); ?></h5>
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
                                    <p class="text-decoration-line-through"><?php echo htmlspecialchars(number_format($service['gia_goc'], 0, ',', '.')); ?> VNĐ</p>
                                    <p class="text-danger pl-3"><?php echo htmlspecialchars(number_format($service['gia_giam'], 0, ',', '.')); ?> VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="d-flex justify-content-end mt-2">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>&search=<?php echo htmlspecialchars($search); ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo min($totalPages, $page + 1); ?>&search=<?php echo htmlspecialchars($search); ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
