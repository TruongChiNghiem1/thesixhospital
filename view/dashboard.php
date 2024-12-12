<?php

    session_start();

    $id = $_SESSION['id'];
    $ten_nhan_vien = $_SESSION['ho_ten'];

  

?>

<div class="bg-white rounded p-4 shadow-sm">
    <h3 class="font-weight-bold text-primary">Chào mừng, <?php echo $ten_nhan_vien;?>!</h3>
    <p>Chúc bạn có một ngày làm việc hiệu quả và tràn đầy năng lượng!</p>

    <!-- Carousel/Slide with Autoplay -->
    <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndiAcators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..\assets\images\bsdd1.jpg" alt="Image 1" class="d-block w-100"
                    style="height: 400px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img src="..\assets\images\bsdd2.jpg" alt="Image 2" class="d-block w-100"
                    style="height: 400px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="carousel-item">
                <img src="..\assets\images\bsdd3.jpg" alt="Image 3" class="d-block w-100"
                    style="height: 400px; object-fit: cover; border-radius: 8px;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>