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
// include_once('../../model/service.php');

$results = getListCalendar();
$doctors = getDoctors();


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

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($results as $row) : ?>
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
                    </td>

                    <td>
                        <?php
                                                switch ($row['trang_thai']) {
                                                    case 1:
                                                        echo '<span class="text-warning">Chờ bác sĩ</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="text-primary">Chờ khám</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="text-success">Khám thành công</span>';
                                                        break;
                                                    case 4:
                                                        echo '<span class="text-danger">Từ chối</span>';
                                                        break;
                                                }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Sửa lịch khám</h3>
                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</a>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <label for="txtDate">Ngày đặt lịch</label>
                        <input type="date" class="form-control" id="txtDate" />
                        <span id="tbDate" class="text-danger">*</span>
                    </div>

                    <div class="col-sm-12">
                        <label for="txtChuyenKhoa" class="mt-3">Thời gian</label>
                        <select id="txtChuyenKhoa" class="form-select">
                            <option value="" hidden selected>Chọn thời gian</option>
                            <option value="8h">8h</option>
                            <option value="10h">10h</option>
                            <option value="13h">13h</option>
                            <option value="15h">15h</option>
                            <option value="17h">17h</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger col-sm-12" data-bs-dismiss="modal" id="btnSave">
                        Xác nhận thay đổi
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>