<?php

    include_once("../controller/admin.php");

    $p = new controllerAdmin();


    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $nhanVien = $p->selectIDInfomationBS($userId);
    }

    if ($nhanVien && mysqli_num_rows($nhanVien) > 0) {
        $row = mysqli_fetch_assoc($nhanVien);
    }
    echo '<form action="" method="post" enctype="multipart/form-data">';
    echo '<table class="table table-bordered">';

    echo '<tr>';
    echo '<td><label for="txtCodeID">Mã nhân viên</label></td>';
    echo '<td><input type="text" name="txtCodeID" class="form-control" value="'.$row['code'].'" placeholder="Mã nhân viên" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtHoTen">Họ và tên</label></td>';
    echo '<td><input type="text" name="txtHoTen" class="form-control" value="'.$row['ho_ten'].'" placeholder="Họ và tên" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtEmail">Email</label></td>';
    echo '<td><input type="email" name="txtEmail" class="form-control" value="'.$row['email'].'" placeholder="Email" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtUser">Tên đăng nhập</label></td>';
    echo '<td><input type="text" name="txtUser" class="form-control" value="'.$row['username'].'" placeholder="Tên đăng nhập" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtPass">Mật khẩu</label></td>';
    echo '<td><input type="password" name="txtPass" class="form-control" value="********" placeholder="Mật khẩu" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtSDT">Số điện thoại</label></td>';
    echo '<td><input type="text" name="txtSDT" class="form-control" value="'.$row['so_dien_thoai'].'" placeholder="Số điện thoại" required></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="txtNgaySinh">Ngày sinh</label></td>';
    echo '<td><input type="date" name="txtNgaySinh" value="'.$row['ngay_sinh'].'" class="form-control"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td><label for="chonChucVu">Chức vụ</label></td>';
    echo '<td>';
    echo '<select name="chonChucVu" class="form-control">';
    include("optionChucVu.php");
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td colspan="2">';
    echo '<input type="submit" name="btnSubmit" class="btn btn-primary" value="Cập nhật nhân viên">';
    echo '</td>';
    echo '</tr>';
    
    echo '</table>';
    echo '</form>';


    if(isset($_POST['btnSubmit'])){
        $code = $_POST['txtCodeID'];
        $name = $_POST['txtHoTen'];
        $email = $_POST['txtEmail'];
        $user = $_POST['txtUser'];
        $pass = $_POST['txtPass'];
        $phone = $_POST['txtSDT'];
        $date = $_POST['txtNgaySinh'];
        $loaiNV = $_POST['chonChucVu'];
        $userId = $_GET['id'];

        if ($p->updateNhanVien($userId, $code, $name, $email, $user, $pass, $phone, $date, $loaiNV)) {
            echo "<script>alert('Cập nhật nhân viên thành công');</script>";
            echo "<script>window.location.href = 'index.php?action=hrm';</script>";
        } 
        else {
            echo "<script>alert('Cập nhật nhân viên thất bại');</script>";
            
        }

    }
?>
