
    <div class="row-fluid">
        <h2 class="text-center mb-4">BẢNG ĐIỂU KHIỂN</h2>
        <div class="card bg-dark text-white" style="max-width: 100%;">
            <img src="/thesixhospital/assets/images/slider.jpg" class="card-img mw-100 " alt=""/>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.3)">
                <h5 class="card-title p-3">CHÀO MỪNG !</h5>
                <h2 class="card-subtitle p-3">BÁC SĨ SỨC KHỎE</h2>
                <p class="card-text p-3">
                    Cảm ơn bạn đã tham gia cùng chúng tôi. Chúng tôi luôn cố gắng cung cấp cho bạn dịch vụ hoàn chỉnh
                    Bạn có thể xem lịch trình hàng ngày, Đặt lịch hẹn với bệnh nhân tại nhà!
                </p>
                <a href="index.php?page=examination" class="btn btn-primary bg-dark rounded-2 m-3 px-5">KHÁM BỆNH</a>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-6 pl-0" >
            <h5 class="text-center mb-3">THỐNG KÊ</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card rounded-3">
                        <a href="#" class="btn bg-dark">
                            <div class="card-body text-center row">
                                
                                <div class="col-3 text-white">
                                    <span class="bi bi-chat-dots"> 
                                        <?php
                                            $obj = new doctor();
                                            $sql = "select count(*) as total from lich_hen where id_nhan_vien='3'";
                                            $a = $obj->getdata($sql);
                                            echo "".$a[0]["total"];
                                        ?>
                                    </span>
         
                                </div>

                                <div class="col-9 text-white">
                                    LỊCH HẸN
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card rounded-3 ">
                        <a href="#" class="btn bg-dark">
                            <div class="card-body text-center row">
                                <div class="col-3 text-white">
                                    <span class="bi bi-person-heart">
                                        <?php
                                            $obj = new doctor();
                                            $sql = "select count(*) as total from benh_nhan";
                                            $a = $obj->getdata($sql);
                                            echo "".$a[0]["total"];
                                        ?>
                                    </span>
                                </div>

                                <div class="col-9 text-white">
                                    TẤT CẢ BỆNH NHÂN
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card rounded-3">
                        <a href="#" class="btn bg-dark">
                            <div class="card-body text-center row">
                                <div class="col-3 text-white">
                                    <span class="bi bi-capsule">
                                        <?php
                                            $obj = new doctor();
                                            $sql = "select count(*) as total from don_thuoc";
                                            $a = $obj->getdata($sql);
                                            echo "".$a[0]["total"];
                                        ?>
                                    </span>
                                </div>

                                <div class="col-9 text-white">
                                    ĐƠN THUỐC
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card rounded-3">
                        <a href="#" class="btn bg-dark">
                            <div class="card-body text-center row">
                                <div class="col-3 text-white">
                                    <span class="bi bi-calendar-plus"> 
                                        <?php
                                            $obj = new doctor();
                                            $sql = "select count(*) as total from lich_hen where loai_lich_hen = '3'";
                                            $a = $obj->getdata($sql);
                                            echo "".$a[0]["total"];
                                        ?>
                                    </span>
                                </div>

                                <div class="col-9 text-white">
                                    LỊCH HẸN MỚI
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <h5 class="text-center mb-3">THÔNG BÁO MỚI NHẤT</h5>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Nội dung thông báo</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>08:00, 31/10/2024</td>
                        <td>Cuộc họp với trưởng khoa tại phòng 101.</td>
                        <td><span class="badge bg-info">Mới</span></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>14:00, 30/10/2024</td>
                        <td>Cập nhật lịch trực tuần tới.</td>
                        <td><span class="badge bg-warning">Đang chờ</span></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>09:00, 29/10/2024</td>
                        <td>Bổ sung hồ sơ bệnh án cho bệnh nhân A.</td>
                        <td><span class="badge bg-success">Hoàn thành</span></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>11:30, 28/10/2024</td>
                        <td>Thực hiện kiểm tra sức khỏe cho nhân viên.</td>
                        <td><span class="badge bg-info">Mới</span></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>15:45, 27/10/2024</td>
                        <td>Nhắc nhở về việc cập nhật thông tin bệnh nhân.</td>
                        <td><span class="badge bg-warning">Đang chờ</span></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>10:15, 26/10/2024</td>
                        <td>Cuộc hội thảo về các phương pháp điều trị mới.</td>
                        <td><span class="badge bg-success">Hoàn thành</span></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>09:00, 25/10/2024</td>
                        <td>Phát hành báo cáo tháng về hiệu suất làm việc.</td>
                        <td><span class="badge bg-success">Hoàn thành</span></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>16:00, 24/10/2024</td>
                        <td>Cập nhật thông tin thuốc mới cho hệ thống.</td>
                        <td><span class="badge bg-warning">Đang chờ</span></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
