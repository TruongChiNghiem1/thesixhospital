<div class="container-fluid bg-white rounded p-4 shadow-sm mt-4">
        <div class="row">
            <h5 class="text-center mb-4">LỊCH LÀM VIỆC</h5>
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 rounded">
                <div class="navbar-collapse d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <input type="date" id="currentDate" class="form-control mr-3" style="width: 180px;">
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="#"><i class="bi bi-calendar-event"></i> Hiện tại</a>
                        <a class="nav-item nav-link" href="#"><i class="bi bi-printer"></i> In lịch</a>
                        <a class="nav-item nav-link" href="#"><i class="bi bi-arrow-left"></i> Trở về</a>
                        <a class="nav-item nav-link" href="#"><i class="bi bi-arrow-right"></i> Tiếp</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
                <table class="table schedule-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Ca học</th>
                            <th>Thứ 2<br>28/10/2024</th>
                            <th>Thứ 3<br>29/10/2024</th>
                            <th>Thứ 4<br>30/10/2024</th>
                            <th>Thứ 5<br>31/10/2024</th>
                            <th>Thứ 6<br>01/11/2024</th>
                            <th>Thứ 7<br>02/11/2024</th>
                            <th>Chủ nhật<br>03/11/2024</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day-header bg-dark text-white">Sáng</td>
                            <td class="time-slot">
                                <div class="event morning">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td class="time-slot">
                                <div class="event morning">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú: 
                                </div>
                            </td>
                            <td></td>
                            <td class="time-slot">
                                <div class="event morning">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                            <td class="time-slot">
                                <div class="event morning">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day-header bg-dark text-white">Chiều</td>
                            <td></td>
                            <td></td>
                            <td class="time-slot">
                                <div class="event afternoon">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                            <td class="time-slot">
                                <div class="event afternoon">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="day-header bg-dark text-white">Tối</td>
                            <td></td>
                            <td></td>
                            <td class="time-slot">
                                <div class="event afternoon">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                            <td class="time-slot">
                                <div class="event afternoon">
                                    Phòng: DHHTTT17ATT<br>
                                    Giờ: 4 - 6<br>
                                    Mã Phòng: 422001506603<br>
                                    Số bệnh nhân: 10 <br>
                                    Ghi chú:
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const today = new Date();
        const formattedDate = today.toISOString().substr(0, 10); 
        document.getElementById("currentDate").value = formattedDate;
    </script>