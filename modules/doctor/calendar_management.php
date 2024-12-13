<div class="container">
        <h2 class="text-center mb-4">Quản Lý Lịch Làm Việc</h2>
        
        <!-- Form thêm lịch làm việc -->
        <div class="mb-4">
            <h4>Thêm Lịch Làm Việc</h4>
            <form id="work-schedule-form">
                <div class="mb-3">
                    <label for="date" class="form-label">Ngày</label>
                    <input type="date" class="form-control" id="date" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Giờ</label>
                    <input type="time" class="form-control" id="time" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Số điện thoại </label>
                    <input type="number" class="form-control" id="sdt" rows="3" required></input>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Họ và tên </label>
                    <input type="text" class="form-control" id="hvt" disabled rows="3" required></input>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô Tả</label>
                    <textarea class="form-control" id="description" rows="3" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>

        <!-- Bảng hiển thị lịch làm việc -->
        <h4>Danh Sách Lịch Làm Việc</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Giờ</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody id="schedule-list">
                <!-- Danh sách lịch làm việc sẽ được thêm vào đây -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap và Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Mảng để lưu trữ lịch làm việc
        let schedule = [];

        // Hàm thêm lịch làm việc
        document.getElementById("work-schedule-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Ngăn chặn reload trang
            const date = document.getElementById("date").value;
            const time = document.getElementById("time").value;
            const description = document.getElementById("description").value;

            // Thêm lịch làm việc vào mảng
            schedule.push({ date, time, description });
            renderSchedule();
            this.reset(); // Đặt lại form
        });

        // Hàm hiển thị lịch làm việc
        function renderSchedule() {
            const scheduleList = document.getElementById("schedule-list");
            scheduleList.innerHTML = ""; // Xóa danh sách hiện tại

            schedule.forEach((item, index) => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${item.date}</td>
                    <td>${item.time}</td>
                    <td>${item.description}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editSchedule(${index})"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="deleteSchedule(${index})"><i class="bi bi-trash"></i></button>
                    </td>
                `;
                scheduleList.appendChild(row);
            });
        }

        // Hàm xóa lịch làm việc
        function deleteSchedule(index) {
            schedule.splice(index, 1); // Xóa phần tử khỏi mảng
            renderSchedule(); // Cập nhật danh sách
        }

        // Hàm sửa lịch làm việc
        function editSchedule(index) {
            const item = schedule[index];
            document.getElementById("date").value = item.date;
            document.getElementById("time").value = item.time;
            document.getElementById("description").value = item.description;

            // Xóa phần tử cũ khỏi mảng
            deleteSchedule(index);
        }
    </script>