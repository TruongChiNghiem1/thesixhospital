<?php
// Kết nối tới cơ sở dữ liệu
include('../../config/connect.php');
session_start();
$database = new connect();
$conn = $database->connectDB();
// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công. Vui lòng kiểm tra lại tệp connect.php.");
}
if (!isset($_SESSION['id'])) {
    // Nếu chưa đăng nhập, chuyển hướng tới trang đăng nhập
    header("Location: /thesixhospital/login.php");
    exit();
}


// Lấy ID người dùng từ session
$id = $_SESSION['id'];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$query = "SELECT ho_ten, email FROM nhan_vien WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($ho_ten, $email);
$stmt->fetch();
$stmt->close();

// -------

include_once('../../model/adminService.php');
$result = getListCalendar();
$doctors = getDoctors();



// Kiểm tra nếu có tham số 'id' trong URL
// Kiểm tra nếu form đã được gửi (khi người dùng nhấn nút "Hủy lịch")
if (isset($_POST['id_lich_hen'])) {
    $id_lich_hen = $_POST['id_lich_hen'];

    // Câu lệnh SQL để xóa lịch hẹn có trạng thái "Chờ khám" (trạng thái = 2)
    $query = "DELETE FROM lich_hen WHERE id_lich_hen = ? AND trang_thai = 2";

    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($query);

    // Kiểm tra nếu chuẩn bị truy vấn thành công
    if ($stmt === false) {
        die('Error preparing statement: ' . $conn->error);
    }

    // Liên kết tham số
    $stmt->bind_param('i', $id_lich_hen); // 'i' cho kiểu integer

    // Thực thi truy vấn
    if ($stmt->execute()) {
        // Nếu xóa thành công, chuyển hướng lại trang mà không cần f5
        echo "<script>
                alert('Lịch hẹn đã được hủy.');
                window.location.href = ' /thesixhospital/modules/patient/MyBooking.php'; // Hoặc trang bạn muốn làm mới
              </script>";
        exit; // Đảm bảo dừng việc thực thi mã tiếp theo
    } else {
        // Nếu có lỗi
        echo "Lỗi khi hủy lịch hẹn: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();
}

// Đóng kết nối
$conn->close();

// include_once('../../model/service.php');


// $results = getListCalendar_BN();
// if (!empty($results)) {
// foreach ($results as $item) {
// // Hiển thị dữ liệu lịch hẹn
// echo $item['ten_benh_nhan'] . ' - ' . $item['ten_dich_vu'] . '<br>';
// }
// } else {
// echo "Không có lịch hẹn nào.";
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesixhospital/assets/css/animations.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/main.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/admin.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="/thesixhospital/assets/css/lsdl.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <title>Lịch sử đặt lịch</title>
    <style>
    .popup {
        animation: transitionIn-Y-bottom 0.5s;
    }

    .sub-table {
        animation: transitionIn-Y-bottom 0.5s;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu" style="background-color: #343a40;">
            <table class="menu-container" border="0">
                <table border="0" class="profile-container">
                    <tr>
                        <td width="30%" style="padding-left:20px">
                            <img src="/thesixhospital/assets/images/logo.jpg" alt="" width="30%"
                                style="border-radius:50%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="profile-title"
                                style="color: white; text-align: center; padding-top: 10px; padding-bottom: 10px; font-size: 25px;">
                                <?php echo htmlspecialchars($ho_ten); ?></p>
                            <p class="profile-subtitle "
                                style="color: white; text-align: center;  padding-bottom: 10px; font-size: 17px;">
                                <?php echo htmlspecialchars($email); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <a href="/thesixhospital/logout.php"><input type="button" value="Đăng xuất"
                                    class="btn btn-danger"></a>
                        </td>
                    </tr>
                </table>
                <tr class="menu-row">
                    <td class="menu-active">
                        <div>
                            <a href="profile.php?id=<?php echo $_SESSION["id"]; ?>" class="non-style-link-menu"
                                style="color: white;">
                                <i class="fa-solid fa-user menu-icon" style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Thông tin cá nhân</p>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="#" class="non-style-link-menu " style="color: white;">
                                <i class="fa-solid fa-bookmark menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Lịch sử đặt lịch</p>
                            </a>
                        </div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="">
                        <div>
                            <a href="MedicalRecords.php?id=<?php echo $_SESSION["id"]; ?>" class="non-style-link-menu"
                                style="color: white;">
                                <i class="fa-solid fa-book-medical menu-icon"
                                    style="padding-top:5px; padding-bottom: 5px;"></i>
                                <p class="menu-text" style="padding-top:5px; padding-bottom: 5px;">Hồ sơ bệnh án</p>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    <td width="13%">
                        <a href="/thesixhospital/index.php?id=<?php echo $_SESSION["id"]; ?>"><button class="btn"
                                style="margin-left:20px;">
                                <font class="tn-in-text">Trang chủ</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Lịch sử đặt lịch</p>

                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            2024-10-29 </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label"><img src="/thesixhospital/assets/images/calendar.svg"
                                width="100%"></button>
                    </td>


                </tr>

                <!-- <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">
                        <div class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule a Session</div>
                        <a href="?action=add-session&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">Add a Session</font></button>
                        </a>
                        </div>
                    </td>
                </tr> -->

                <tr>
                    <td colspan="4">
                        <center>
                            <div class="bg-white border-main" style="padding: 0px 50px;">
                                <div class="p-5">
                                    <div class="d-flex justify-content-center mt-3 mb-4">
                                        <h3 style="font-size: 30px;">Lịch đặt dịch vụ</h3>
                                    </div>

                                    <table id="adminServiceTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã lịch</th>
                                                <th>Dịch vụ khám</th>
                                                <th>Tổng</th>
                                                <th>Ngày khám</th>
                                                <th>Bác sĩ phụ trách</th>
                                                <th>Trạng thái</th>
                                                <th>Hủy lịch đặt</th>
                                                <th>Thay đổi lịch</th> <!-- Cột Thay đổi lịch -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['id_lich_hen']; ?></td>
                                                <td><?php echo htmlspecialchars($row['ten_dich_vu']); ?></td>
                                                <td><?php echo htmlspecialchars($row['gia_goc']); ?> VNĐ</td>
                                                <td><?php echo date('d/m/Y', strtotime($row['ngay_gio'])); ?></td>
                                                <td>
                                                    <?php
                                                        switch ($row['loai_nhan_vien']) {
                                                            case 2:
                                                                echo '<span class="text-warning">Bác sĩ chuyên khoa</span>';
                                                                break;
                                                            case 3:
                                                                echo '<span class="text-primary">Bác sĩ sức khỏe</span>';
                                                                break;
                                                            case 4:
                                                                echo '<span class="text-success">Bác sĩ dinh dưỡng</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="text-muted">Chưa xác định</span>';
                                                                break;
                                                        }
                                                        ?>
                                                </td>

                                                <td>
                                                    <?php
                                                        switch ($row['trang_thai']) {
                                                            case 2:
                                                                echo '<span class="text-warning">Chờ bác sĩ</span>';
                                                                break;
                                                            case 3:
                                                                echo '<span class="text-primary">Chờ khám</span>';
                                                                break;
                                                            case 4:
                                                                echo '<span class="text-success">Khám thành công</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="text-muted">Chưa xác định</span>';
                                                                break;
                                                        }
                                                        ?>
                                                </td>

                                                <td>
                                                    <?php if ($row['trang_thai'] == 2) : // Chỉ hiển thị nút "Hủy lịch" khi trạng thái là "Chờ khám" 
                                                        ?>
                                                    <form method="POST" action="MyBooking.php">
                                                        <input type="hidden" name="id_lich_hen"
                                                            value="<?php echo $row['id_lich_hen']; ?>">
                                                        <input type="submit" class="HL" value="Hủy lịch">
                                                    </form>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($row['trang_thai'] == 2) : // Chỉ hiển thị nút "Thay đổi" khi trạng thái là "Chờ bác sĩ" 
                                                        ?>
                                                    <!-- Nút Thay đổi -->
                                                    <button class="btn btn-warning TDL" id="changeButton"
                                                        data-id="<?php echo $row['id_lich_hen']; ?>"
                                                        data-dich-vu="<?php echo $row['ten_dich_vu']; ?>"
                                                        data-gia="<?php echo $row['gia_goc']; ?>"
                                                        data-ngay-gio="<?php echo $row['ngay_gio']; ?>">Thay
                                                        đổi</button>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- Modal Thay đổi lịch -->


                                </div>
                            </div>



                        </center>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:200px;">
                <div class="modal-header">
                    <h3 class="modal-title" style="text-align: center" id="changeBookingModalLabel">Thay đổi lịch
                        hẹn</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="width: 30px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="MyBooking.php" id="changeBookingForm">
                        <input type="hidden" name="id_lich_hen" id="modal_id_lich_hen">
                        <div class="form-group">
                            <label for="ten_dich_vu">Tên dịch vụ</label>
                            <input type="text" class="form-control" name="ten_dich_vu" id="modal_ten_dich_vu">
                        </div>
                        <div class="form-group">
                            <label for="gia_goc">Giá dịch vụ</label>
                            <input type="number" class="form-control" name="gia_goc" id="modal_gia_goc">
                        </div>
                        <div class="form-group">
                            <label for="ngay_gio">Ngày giờ khám</label>
                            <input type="datetime-local" class="form-control" name="ngay_gio" id="modal_ngay_gio">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('#changeButton').forEach(button => {
    button.addEventListener('click', function() {
        // Lấy các giá trị từ data attributes
        const id = this.getAttribute('data-id');
        const dichVu = this.getAttribute('data-dich-vu');
        const gia = this.getAttribute('data-gia');
        const ngayGio = this.getAttribute('data-ngay-gio');

        // Cập nhật giá trị vào modal
        document.getElementById('modal_id_lich_hen').value = id;
        document.getElementById('modal_ten_dich_vu').value = dichVu;
        document.getElementById('modal_gia_goc').value = gia;
        document.getElementById('modal_ngay_gio').value = ngayGio;

        // Mở modal
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
});
</script>

</html>