<div class="container mt-4">
        <h2 class="text-center mb-4">Cài Đặt Tài Khoản</h2>
        
        <!-- Form chỉnh sửa thông tin cá nhân -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Chỉnh Sửa Thông Tin Cá Nhân</div>
            <div class="card-body">
                <form id="personal-info-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>

        <!-- Form đổi mật khẩu -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Đổi Mật Khẩu</div>
            <div class="card-body">
                <form id="password-change-form">
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Mật Khẩu Hiện Tại</label>
                        <input type="password" class="form-control" id="current-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" id="new-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" id="confirm-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
                </form>
            </div>
        </div>

        <!-- Cài đặt thông báo -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Cài Đặt Thông Báo</div>
            <div class="card-body">
                <form id="notification-settings-form">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="email-notifications">
                        <label for="email-notifications" class="form-check-label">Nhận thông báo qua Email</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="sms-notifications">
                        <label for="sms-notifications" class="form-check-label">Nhận thông báo qua SMS</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="app-notifications">
                        <label for="app-notifications" class="form-check-label">Nhận thông báo trên ứng dụng</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Cài Đặt</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Xử lý form cài đặt thông tin cá nhân
        document.getElementById("personal-info-form").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Thông tin cá nhân đã được lưu.");
            // Thêm mã xử lý lưu thông tin cá nhân
        });

        // Xử lý form đổi mật khẩu
        document.getElementById("password-change-form").addEventListener("submit", function(event) {
            event.preventDefault();
            const newPassword = document.getElementById("new-password").value;
            const confirmPassword = document.getElementById("confirm-password").value;

            if (newPassword === confirmPassword) {
                alert("Mật khẩu đã được đổi thành công.");
                // Thêm mã xử lý đổi mật khẩu
            } else {
                alert("Mật khẩu xác nhận không khớp. Vui lòng kiểm tra lại.");
            }
        });

        // Xử lý form cài đặt thông báo
        document.getElementById("notification-settings-form").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Cài đặt thông báo đã được lưu.");
            // Thêm mã xử lý lưu cài đặt thông báo
        });
    </script>