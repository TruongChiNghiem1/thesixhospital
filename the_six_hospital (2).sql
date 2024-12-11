-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_six_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `bang_cap`
--

CREATE TABLE `bang_cap` (
  `id_bang_cap` int(11) NOT NULL,
  `ten_bang_cap` varchar(255) NOT NULL,
  `ngay_cap` date DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_nhan_vien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benh_nhan`
--

CREATE TABLE `benh_nhan` (
  `id_benh_nhan` int(11) NOT NULL,
  `ma_benh_nhan` varchar(255) NOT NULL,
  `ten_benh_nhan` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL COMMENT '1: nam, 2: nữ',
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `benh_nhan`
--

INSERT INTO `benh_nhan` (`id_benh_nhan`, `ma_benh_nhan`, `ten_benh_nhan`, `so_dien_thoai`, `email`, `password`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'BN1', 'Nguyen Van A', '0565662262', 'bna@gmail.com', '453453', 1, '2024-12-01', 'QNam', '2024-12-10 03:02:33', '2024-12-10 03:02:33'),
(2, 'BN2', 'Nhàn', '113', '2@', '', 2, '2024-12-09', 'QNgai', '2024-12-10 03:02:13', '2024-12-10 03:02:13'),
(3, 'BN3', 'Tiến', '114', '3@', '', 1, '2024-12-01', 'QNinh', '2024-12-10 03:02:20', '2024-12-10 03:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danh_gia` int(11) NOT NULL,
  `id_doi_tuong_danh_gia` int(11) NOT NULL,
  `loai_danh_gia` tinyint(4) NOT NULL COMMENT '1: Đánh giá dịch vụ, 2: Đánh giá bác sĩ dinh dưỡng, 3: Đánh giá bác sĩ sức khỏe, 4: Đánh giá chuyên khoa',
  `id_benh_nhan` int(11) NOT NULL,
  `diem_danh_gia` tinyint(4) NOT NULL COMMENT '1 - 5 Điểm',
  `binh_luan` text DEFAULT NULL,
  `ngay_danh_gia` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `id_dich_vu` int(11) NOT NULL,
  `gia_goc` varchar(255) DEFAULT NULL,
  `ten_dich_vu` varchar(255) NOT NULL,
  `gia_giam` varchar(255) DEFAULT NULL,
  `chi_tiet` text DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `id_nguoi_tao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `don_thuoc`
--

CREATE TABLE `don_thuoc` (
  `id_don_thuoc` int(11) NOT NULL,
  `ma_don_thuoc` varchar(255) DEFAULT NULL,
  `ten_don_thuoc` varchar(255) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `id_benh_nhan` int(11) DEFAULT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL COMMENT 'Bác sĩ tạo đơn thuốc',
  `ngay` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `id_ho_so_benh_an` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `don_thuoc-thuoc`
--

CREATE TABLE `don_thuoc-thuoc` (
  `id_don_thuoc` int(11) NOT NULL,
  `id_thuoc` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `cach_dung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `don_xin_nghi`
--

CREATE TABLE `don_xin_nghi` (
  `id_don_xin_nghi` int(11) NOT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `ngay_nghi` date DEFAULT NULL,
  `ly_do_nghi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ho_so_benh_an`
--

CREATE TABLE `ho_so_benh_an` (
  `id_ho_so_benh_an` int(11) NOT NULL,
  `ma_ho_so_benh_an` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `chuan_doan` text DEFAULT NULL,
  `ngay_kham` datetime DEFAULT NULL,
  `di_ung` text DEFAULT NULL,
  `id_benh_nhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ho_so_benh_an`
--

INSERT INTO `ho_so_benh_an` (`id_ho_so_benh_an`, `ma_ho_so_benh_an`, `mo_ta`, `chuan_doan`, `ngay_kham`, `di_ung`, `id_benh_nhan`) VALUES
(1, 'MBA1', 'bị đau rát nhồi máu cơ tim bla bla bla', 'Bệnh tim mạch', '2024-12-24 02:59:50', 'không có', 1),
(2, 'BA2', 'Bệnh điên', NULL, NULL, NULL, 2),
(3, 'BA3', 'Bệnh dại', NULL, NULL, NULL, 3),
(4, 'BA4', 'bị đau đầu', 'đau đầu', '2024-12-11 00:00:00', 'không có', NULL),
(5, 'BA4', 'jjjjjjjjjjjjjj', 'đau đầu', '2024-12-04 00:00:00', 'không có', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lich_hen`
--

CREATE TABLE `lich_hen` (
  `id_lich_hen` int(11) NOT NULL,
  `ngay_gio` datetime DEFAULT NULL,
  `loai_lich_hen` tinyint(4) DEFAULT NULL COMMENT '1:  dịch vụ, 2: bác sĩ dinh dưỡng, 3: bác sĩ sức khỏe, 4: chuyên khoa',
  `trang_thai` varchar(255) DEFAULT NULL COMMENT '1: chờ bác sĩ, 2: chờ khám, 3: Khám thành công',
  `id_benh_nhan` int(11) DEFAULT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `loai_lich_dat` tinyint(4) DEFAULT 1 COMMENT '1: bệnh nhân đặt, 2 nhân viên đặt',
  `ghiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lich_hen`
--

INSERT INTO `lich_hen` (`id_lich_hen`, `ngay_gio`, `loai_lich_hen`, `trang_thai`, `id_benh_nhan`, `id_nhan_vien`, `loai_lich_dat`, `ghiChu`) VALUES
(2, '2024-11-29 09:00:00', 2, '2', 2, 2, 1, 'Khách hàng yêu cầu tư vấn dinh dưỡng'),
(6, '2024-11-30 11:30:00', 3, '2', 3, 1, 1, 'Khám sức khỏe tiền hôn nhân'),
(7, '2024-12-01 09:00:00', 1, '3', 1, 1, 1, 'Khách hàng khám da liễu'),
(8, '2024-12-02 14:00:00', 2, '2', 3, 2, 1, 'Tư vấn chế độ ăn kiêng cho bệnh nhân'),
(9, '2024-12-03 16:00:00', 3, '2', 3, 2, 1, 'Khách hàng kiểm tra sức khỏe định kỳ'),
(10, '2024-12-04 08:00:00', 1, '3', 1, 2, 1, 'Lịch hẹn kiểm tra tiểu đường');

-- --------------------------------------------------------

--
-- Table structure for table `lich_lam_viec`
--

CREATE TABLE `lich_lam_viec` (
  `id_lich_lam_viec` int(11) NOT NULL,
  `ngay_lam` date DEFAULT NULL,
  `ca_lam` varchar(255) DEFAULT NULL COMMENT '1: sáng, 2: Chiều, 3 Tối, 4 OT',
  `id_nhan_vien` int(11) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `loai_thuoc`
--

CREATE TABLE `loai_thuoc` (
  `id_loai_thuoc` int(11) NOT NULL,
  `ma_loai_thuoc` varchar(255) DEFAULT NULL,
  `ten_loai_thuoc` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mon_an`
--

CREATE TABLE `mon_an` (
  `id_mon_an` int(11) NOT NULL,
  `ma_mon_an` varchar(255) DEFAULT NULL,
  `ten_mon_an` varchar(255) DEFAULT NULL,
  `chi_so_dinh_duong` varchar(255) DEFAULT NULL,
  `id_nguoi_tao` int(11) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `ma_thuc_don` varchar(255) NOT NULL,
  `ghi_chu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mon_an`
--

INSERT INTO `mon_an` (`id_mon_an`, `ma_mon_an`, `ten_mon_an`, `chi_so_dinh_duong`, `id_nguoi_tao`, `ngay_tao`, `ma_thuc_don`, `ghi_chu`) VALUES
(1, 'MA1', 'Cháo lưỡi', '123', 1, '2024-12-10 01:52:58', 'TD1', 'Món ăn dành cho người gầyyyyyy hasssssss'),
(3, 'MMA003', 'Hành Tây', '333', 1, '2024-12-10 00:57:33', 'TD2', 'fffffff'),
(4, 'MMA004', 'Hehehehehe', '232e', 1, '2024-12-10 00:38:39', 'TD3', 'dddhfh'),
(6, 'MMA4', 'Cà tím', '222s', 1, '2024-12-10 01:13:51', 'TD1', 'đấ'),
(7, 'MMA004', 'TaiTai', '33333333333', 1, '2024-12-09 19:53:57', 'TD3', 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT NULL COMMENT '1: nam, 2: nữ',
  `ngay_sinh` date DEFAULT NULL,
  `loai_nhan_vien` tinyint(4) NOT NULL COMMENT '1: Quản trị, 2: Bác sĩ sức khỏe, 3: Bác sĩ dinh dưỡng, 4 Chuyên khoa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `code`, `username`, `password`, `level`, `created_at`, `updated_at`, `ho_ten`, `so_dien_thoai`, `email`, `gioi_tinh`, `ngay_sinh`, `loai_nhan_vien`) VALUES
(1, 'NV001', 'admin', '25d55ad283aa400af464c76d713c07ad', 1, '2024-11-11 00:19:07', '2024-11-11 00:19:07', 'Admin', '088554774', 'admin@gmail.com', 1, '2003-01-01', 1),
(2, 'NV002', 'bsdd', 'bsdd', NULL, '2024-12-10 01:17:05', '2024-12-10 01:17:05', 'Tòng', '0123456789', 'd', 2, '2024-12-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `thuc_don_dinh_duong`
--

CREATE TABLE `thuc_don_dinh_duong` (
  `id_thuc_don_dinh_duong` int(11) NOT NULL,
  `ngay_an` varchar(255) DEFAULT NULL,
  `buoi_an` varchar(255) DEFAULT NULL,
  `id_ho_so_benh_an` int(11) DEFAULT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `ma_thuc_don` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `thuc_don_dinh_duong`
--

INSERT INTO `thuc_don_dinh_duong` (`id_thuc_don_dinh_duong`, `ngay_an`, `buoi_an`, `id_ho_so_benh_an`, `id_nhan_vien`, `ma_thuc_don`) VALUES
(2, '2024-12-01', 'Trưa', 2, NULL, 'TD1'),
(3, '2024-12-01', 'Trưa', 1, NULL, 'TD2'),
(10, '2024-12-09', 'Trưa', 3, NULL, 'TD2');

-- --------------------------------------------------------

--
-- Table structure for table `thuc_don_dinh_duong-mon_an`
--

CREATE TABLE `thuc_don_dinh_duong-mon_an` (
  `id_thuc_don_dinh_duong` int(11) NOT NULL,
  `id_mon_an` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `id_thuoc` int(11) NOT NULL,
  `ma_thuoc` varchar(255) DEFAULT NULL,
  `ten_thuoc` varchar(255) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `loai_thuoc` int(11) DEFAULT NULL,
  `quoc_gia` varchar(255) DEFAULT NULL,
  `nha_san_xuat` varchar(255) DEFAULT NULL,
  `ngay_nhap` datetime DEFAULT NULL,
  `id_nguoi_them` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD PRIMARY KEY (`id_bang_cap`),
  ADD KEY `bang_cap_nhan_vien` (`id_nhan_vien`);

--
-- Indexes for table `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD PRIMARY KEY (`id_benh_nhan`) USING BTREE;

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danh_gia`) USING BTREE,
  ADD KEY `doi_tuong_dich_vu` (`id_doi_tuong_danh_gia`) USING BTREE,
  ADD KEY `nguoi_danh_gia` (`id_benh_nhan`) USING BTREE;

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id_dich_vu`) USING BTREE,
  ADD KEY `nguoi_tao` (`id_nguoi_tao`) USING BTREE;

--
-- Indexes for table `don_thuoc`
--
ALTER TABLE `don_thuoc`
  ADD PRIMARY KEY (`id_don_thuoc`) USING BTREE,
  ADD KEY `benh_nhan` (`id_benh_nhan`) USING BTREE,
  ADD KEY `ho_so_benh_an` (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `bac_si_ra_thuoc` (`id_nhan_vien`) USING BTREE;

--
-- Indexes for table `don_thuoc-thuoc`
--
ALTER TABLE `don_thuoc-thuoc`
  ADD PRIMARY KEY (`id_don_thuoc`,`id_thuoc`) USING BTREE,
  ADD KEY `noi_nhieu_nhieu_thuoc` (`id_thuoc`) USING BTREE;

--
-- Indexes for table `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  ADD PRIMARY KEY (`id_don_xin_nghi`) USING BTREE,
  ADD KEY `nhan_vien_nghi` (`id_nhan_vien`) USING BTREE;

--
-- Indexes for table `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  ADD PRIMARY KEY (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `FK_benh_nhan_hs` (`id_benh_nhan`) USING BTREE;

--
-- Indexes for table `lich_hen`
--
ALTER TABLE `lich_hen`
  ADD PRIMARY KEY (`id_lich_hen`) USING BTREE,
  ADD KEY `nhan_vien_kham` (`id_nhan_vien`) USING BTREE,
  ADD KEY `benh_nhan_dat_kham` (`id_benh_nhan`) USING BTREE;

--
-- Indexes for table `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  ADD PRIMARY KEY (`id_lich_lam_viec`) USING BTREE,
  ADD KEY `nhan_vien` (`id_nhan_vien`) USING BTREE;

--
-- Indexes for table `loai_thuoc`
--
ALTER TABLE `loai_thuoc`
  ADD PRIMARY KEY (`id_loai_thuoc`) USING BTREE;

--
-- Indexes for table `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id_mon_an`) USING BTREE,
  ADD KEY `FK_nguoi_tao` (`id_nguoi_tao`) USING BTREE,
  ADD KEY `ma_thuc_don_pk` (`ma_thuc_don`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  ADD PRIMARY KEY (`id_thuc_don_dinh_duong`) USING BTREE,
  ADD KEY `thuc_don_ho_so_benh_an` (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `thuc_don_nhan_vien` (`id_nhan_vien`) USING BTREE,
  ADD KEY `ma_thuc_don_FK` (`ma_thuc_don`);

--
-- Indexes for table `thuc_don_dinh_duong-mon_an`
--
ALTER TABLE `thuc_don_dinh_duong-mon_an`
  ADD PRIMARY KEY (`id_thuc_don_dinh_duong`,`id_mon_an`) USING BTREE,
  ADD KEY `nhieu_nhieu_mon_an` (`id_mon_an`) USING BTREE;

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`id_thuoc`) USING BTREE,
  ADD KEY `fk_loai_thuoc` (`loai_thuoc`) USING BTREE,
  ADD KEY `FK_nhan_vien_them_thuoc` (`id_nguoi_them`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bang_cap`
--
ALTER TABLE `bang_cap`
  MODIFY `id_bang_cap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benh_nhan`
--
ALTER TABLE `benh_nhan`
  MODIFY `id_benh_nhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danh_gia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id_dich_vu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `don_thuoc`
--
ALTER TABLE `don_thuoc`
  MODIFY `id_don_thuoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  MODIFY `id_don_xin_nghi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  MODIFY `id_ho_so_benh_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lich_hen`
--
ALTER TABLE `lich_hen`
  MODIFY `id_lich_hen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  MODIFY `id_lich_lam_viec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_thuoc`
--
ALTER TABLE `loai_thuoc`
  MODIFY `id_loai_thuoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id_mon_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  MODIFY `id_thuc_don_dinh_duong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `id_thuoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD CONSTRAINT `bang_cap_nhan_vien` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `doi_tuong_danh_gia` FOREIGN KEY (`id_doi_tuong_danh_gia`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `doi_tuong_dich_vu` FOREIGN KEY (`id_doi_tuong_danh_gia`) REFERENCES `dich_vu` (`id_dich_vu`),
  ADD CONSTRAINT `nguoi_danh_gia` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`);

--
-- Constraints for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD CONSTRAINT `nguoi_tao` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `don_thuoc`
--
ALTER TABLE `don_thuoc`
  ADD CONSTRAINT `bac_si_ra_thuoc` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `benh_nhan` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`),
  ADD CONSTRAINT `ho_so_benh_an` FOREIGN KEY (`id_ho_so_benh_an`) REFERENCES `ho_so_benh_an` (`id_ho_so_benh_an`);

--
-- Constraints for table `don_thuoc-thuoc`
--
ALTER TABLE `don_thuoc-thuoc`
  ADD CONSTRAINT `noi_nhieu_nhieu_don_thuoc` FOREIGN KEY (`id_don_thuoc`) REFERENCES `don_thuoc` (`id_don_thuoc`),
  ADD CONSTRAINT `noi_nhieu_nhieu_thuoc` FOREIGN KEY (`id_thuoc`) REFERENCES `thuoc` (`id_thuoc`);

--
-- Constraints for table `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  ADD CONSTRAINT `nhan_vien_nghi` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  ADD CONSTRAINT `FK_benh_nhan_hs` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`);

--
-- Constraints for table `lich_hen`
--
ALTER TABLE `lich_hen`
  ADD CONSTRAINT `benh_nhan_dat_kham` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`),
  ADD CONSTRAINT `nhan_vien_kham` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  ADD CONSTRAINT `nhan_vien` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `mon_an`
--
ALTER TABLE `mon_an`
  ADD CONSTRAINT `FK_nguoi_tao` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nhan_vien` (`id`);

--
-- Constraints for table `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  ADD CONSTRAINT `thuc_don_ho_so_benh_an` FOREIGN KEY (`id_ho_so_benh_an`) REFERENCES `ho_so_benh_an` (`id_ho_so_benh_an`),
  ADD CONSTRAINT `thuc_don_nhan_vien` FOREIGN KEY (`ma_thuc_don`) REFERENCES `mon_an` (`ma_thuc_don`);

--
-- Constraints for table `thuc_don_dinh_duong-mon_an`
--
ALTER TABLE `thuc_don_dinh_duong-mon_an`
  ADD CONSTRAINT `nhieu_nhieu_mon_an` FOREIGN KEY (`id_mon_an`) REFERENCES `mon_an` (`id_mon_an`);

--
-- Constraints for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `FK_nhan_vien_them_thuoc` FOREIGN KEY (`id_nguoi_them`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `fk_loai_thuoc` FOREIGN KEY (`loai_thuoc`) REFERENCES `loai_thuoc` (`id_loai_thuoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
