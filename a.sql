-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 05:26 PM
-- Phiên bản máy phục vụ: 10.11.7-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_cap`
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
-- Cấu trúc bảng cho bảng `benh_nhan`
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
-- Đang đổ dữ liệu cho bảng `benh_nhan`
--

INSERT INTO `benh_nhan` (`id_benh_nhan`, `ma_benh_nhan`, `ten_benh_nhan`, `so_dien_thoai`, `email`, `password`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'BN1', 'Nguyen Van A', '0565662262', 'bna@gmail.com', '453453', 1, '2024-12-01', 'QNam', '2024-12-10 03:02:33', '2024-12-10 03:02:33'),
(2, 'BN2', 'Nhàn', '113', '2@', '', 2, '2024-12-09', 'QNgai', '2024-12-10 03:02:13', '2024-12-10 03:02:13'),
(3, 'BN3', 'Tiến', '114', '3@', '', 1, '2024-12-01', 'QNinh', '2024-12-10 03:02:20', '2024-12-10 03:02:20'),
(4, 'BN4', 'Hoàng', '0987654321', 'hoang@gmail.com', 'password123', 1, '1990-01-01', 'Hà Nội', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(5, 'BN5', 'Lan', '0987654322', 'lan@gmail.com', 'password123', 2, '1992-02-01', 'Hải Phòng', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(6, 'BN6', 'Hùng', '0987654323', 'hung@gmail.com', 'password123', 1, '1993-03-01', 'Đà Nẵng', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(7, 'BN7', 'Mai', '0987654324', 'mai@gmail.com', 'password123', 2, '1994-04-01', 'Nha Trang', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(8, 'BN8', 'Khanh', '0987654325', 'khanh@gmail.com', 'password123', 1, '1995-05-01', 'Cần Thơ', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(9, 'BN9', 'Thảo', '0987654326', 'thao@gmail.com', 'password123', 2, '1996-06-01', 'Vũng Tàu', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(10, 'BN10', 'Phúc', '0987654327', 'phuc@gmail.com', 'password123', 1, '1997-07-01', 'Bình Dương', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(11, 'BN11', 'Linh', '0987654328', 'linh@gmail.com', 'password123', 2, '1998-08-01', 'Hà Nội', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(12, 'BN12', 'Quân', '0987654329', 'quan@gmail.com', 'password123', 1, '1999-09-01', 'Hồ Chí Minh', '2024-12-12 23:02:22', '2024-12-12 23:02:22'),
(13, 'BN13', 'Thu', '0987654330', 'thu@gmail.com', 'password123', 2, '2000-10-01', 'Đà Nẵng', '2024-12-12 23:02:22', '2024-12-12 23:02:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
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
-- Cấu trúc bảng cho bảng `dich_vu`
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
-- Cấu trúc bảng cho bảng `don_thuoc`
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

--
-- Đang đổ dữ liệu cho bảng `don_thuoc`
--

INSERT INTO `don_thuoc` (`id_don_thuoc`, `ma_don_thuoc`, `ten_don_thuoc`, `so_luong`, `id_benh_nhan`, `id_nhan_vien`, `ngay`, `created_at`, `updated_at`, `id_ho_so_benh_an`) VALUES
(1, 'DT1', 'Thuốc giảm đau', 30, 4, 1, '2024-12-13', NULL, NULL, 5),
(2, 'DT2', 'Thuốc kháng sinh', 20, 5, 1, '2024-12-13', NULL, NULL, 6),
(3, 'DT3', 'Thuốc giảm huyết áp', 15, 6, 1, '2024-12-13', NULL, NULL, 7),
(4, 'DT4', 'Thuốc điều trị viêm họng', 25, 7, 1, '2024-12-13', NULL, NULL, 8),
(5, 'DT5', 'Thuốc chống viêm', 10, 8, 1, '2024-12-13', NULL, NULL, 9),
(6, 'DT6', 'Thuốc giảm sốt', 50, 9, 1, '2024-12-13', NULL, NULL, 10),
(7, 'DT7', 'Thuốc trị loét dạ dày', 40, 10, 1, '2024-12-13', NULL, NULL, 11),
(8, 'DT8', 'Thuốc trị cảm cúm', 30, 11, 1, '2024-12-13', NULL, NULL, 12),
(9, 'DT9', 'Thuốc hạ huyết áp', 15, 12, 1, '2024-12-13', NULL, NULL, 13),
(10, 'DT10', 'Thuốc trị hen suyễn', 35, 13, 1, '2024-12-14', NULL, NULL, 14),
(11, 'DT11', 'Thuốc trị tiểu đường', 60, 4, 1, '2024-12-14', NULL, NULL, 15),
(12, 'DT12', 'Thuốc trị viêm khớp', 10, 5, 1, '2024-12-14', NULL, NULL, 16),
(13, 'DT13', 'Thuốc trị mất ngủ', 20, 6, 1, '2024-12-14', NULL, NULL, 17),
(14, 'DT14', 'Thuốc trị trầm cảm', 30, 7, 1, '2024-12-14', NULL, NULL, 18),
(15, 'DT15', 'Thuốc trị viêm gan', 10, 8, 1, '2024-12-14', NULL, NULL, 19),
(16, 'DT16', 'Thuốc trị viêm mũi', 20, 9, 1, '2024-12-14', NULL, NULL, 20),
(17, 'DT17', 'Thuốc trị lo âu', 30, 10, 1, '2024-12-14', NULL, NULL, 21),
(18, 'DT18', 'Thuốc trị thoái hóa khớp', 25, 11, 1, '2024-12-14', NULL, NULL, 22),
(19, 'DT19', 'Thuốc trị thiếu máu', 40, 12, 1, '2024-12-14', NULL, NULL, 23),
(20, 'DT20', 'Thuốc trị lao phổi', 50, 13, 1, '2024-12-14', NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_thuoc-thuoc`
--

CREATE TABLE `don_thuoc-thuoc` (
  `id_don_thuoc` int(11) NOT NULL,
  `id_thuoc` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `cach_dung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_xin_nghi`
--

CREATE TABLE `don_xin_nghi` (
  `id_don_xin_nghi` int(11) NOT NULL,
  `id_nhan_vien` int(11) DEFAULT NULL,
  `ngay_nghi` date DEFAULT NULL,
  `ly_do_nghi` text DEFAULT NULL,
  `trang_thai` tinyint(3) NOT NULL COMMENT '1:Duyệt thành công\r\n2:Duyệt thất bại\r\n3:Chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `don_xin_nghi`
--

INSERT INTO `don_xin_nghi` (`id_don_xin_nghi`, `id_nhan_vien`, `ngay_nghi`, `ly_do_nghi`, `trang_thai`) VALUES
(3, 1, '2024-12-25', 'Đi đám cưới', 3),
(4, 2, '2024-12-26', 'Đi đám giỗ', 3),
(5, 2, '2024-12-27', 'Đi đám ma', 1),
(6, 3, '2024-12-28', 'Đi đám sinh nhật', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_so_benh_an`
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
-- Đang đổ dữ liệu cho bảng `ho_so_benh_an`
--

INSERT INTO `ho_so_benh_an` (`id_ho_so_benh_an`, `ma_ho_so_benh_an`, `mo_ta`, `chuan_doan`, `ngay_kham`, `di_ung`, `id_benh_nhan`) VALUES
(1, 'MBA1', 'bị đau rát nhồi máu cơ tim bla bla bla', 'Bệnh tim mạch', '2024-12-24 02:59:50', 'không có', 1),
(2, 'BA2', 'Bệnh điên', NULL, NULL, NULL, 2),
(3, 'BA3', 'Bệnh dại', NULL, NULL, NULL, 3),
(4, 'BA4', 'bị đau đầu', 'đau đầu', '2024-12-11 00:00:00', 'không có', NULL),
(5, 'BA4', 'jjjjjjjjjjjjjj', 'đau đầu', '2024-12-04 00:00:00', 'không có', NULL),
(6, 'MBA5', 'Bệnh cúm', 'Cúm mùa', '2024-12-13 09:00:00', 'không có', 4),
(7, 'MBA6', 'Bệnh đau lưng', 'Thoái hóa cột sống', '2024-12-13 09:30:00', 'không có', 5),
(8, 'MBA7', 'Bệnh viêm họng', 'Viêm họng cấp', '2024-12-13 10:00:00', 'không có', 6),
(9, 'MBA8', 'Bệnh mệt mỏi', 'Căng thẳng', '2024-12-13 10:30:00', 'không có', 7),
(10, 'MBA9', 'Bệnh đau bụng', 'Rối loạn tiêu hóa', '2024-12-13 11:00:00', 'không có', 8),
(11, 'MBA10', 'Bệnh sốt', 'Sốt siêu vi', '2024-12-13 11:30:00', 'không có', 9),
(12, 'MBA11', 'Bệnh đau dạ dày', 'Loét dạ dày', '2024-12-13 12:00:00', 'không có', 10),
(13, 'MBA12', 'Bệnh cảm lạnh', 'Cảm cúm', '2024-12-13 12:30:00', 'không có', 11),
(14, 'MBA13', 'Bệnh huyết áp', 'Huyết áp cao', '2024-12-13 13:00:00', 'không có', 12),
(15, 'MBA14', 'Bệnh hen suyễn', 'Hen suyễn', '2024-12-13 13:30:00', 'không có', 13),
(16, 'MBA15', 'Bệnh tiểu đường', 'Tiểu đường type 2', '2024-12-14 09:00:00', 'không có', 4),
(17, 'MBA16', 'Bệnh viêm khớp', 'Viêm khớp dạng thấp', '2024-12-14 09:30:00', 'không có', 5),
(18, 'MBA17', 'Bệnh mất ngủ', 'Mất ngủ', '2024-12-14 10:00:00', 'không có', 6),
(19, 'MBA18', 'Bệnh trầm cảm', 'Trầm cảm', '2024-12-14 10:30:00', 'không có', 7),
(20, 'MBA19', 'Bệnh viêm gan', 'Viêm gan B', '2024-12-14 11:00:00', 'không có', 8),
(21, 'MBA20', 'Bệnh viêm mũi', 'Viêm mũi dị ứng', '2024-12-14 11:30:00', 'không có', 9),
(22, 'MBA21', 'Bệnh rối loạn thần kinh', 'Rối loạn lo âu', '2024-12-14 12:00:00', 'không có', 10),
(23, 'MBA22', 'Bệnh đau khớp', 'Thoái hóa khớp', '2024-12-14 12:30:00', 'không có', 11),
(24, 'MBA23', 'Bệnh thiếu máu', 'Thiếu máu do thiếu sắt', '2024-12-14 13:00:00', 'không có', 12),
(25, 'MBA24', 'Bệnh lao phổi', 'Lao phổi', '2024-12-14 13:30:00', 'không có', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_hen`
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
-- Đang đổ dữ liệu cho bảng `lich_hen`
--

INSERT INTO `lich_hen` (`id_lich_hen`, `ngay_gio`, `loai_lich_hen`, `trang_thai`, `id_benh_nhan`, `id_nhan_vien`, `loai_lich_dat`, `ghiChu`) VALUES
(2, '2024-11-29 09:00:00', 2, '3', 2, 3, 1, 'Khách hàng yêu cầu tư vấn dinh dưỡng'),
(6, '2024-11-30 11:30:00', 3, '2', 3, 1, 1, 'Khám sức khỏe tiền hôn nhân'),
(7, '2024-12-01 09:00:00', 1, '3', 1, 1, 1, 'Khách hàng khám da liễu'),
(8, '2024-12-02 14:00:00', 2, '2', 3, 3, 1, 'Tư vấn chế độ ăn kiêng cho bệnh nhân'),
(9, '2024-12-03 16:00:00', 3, '2', 3, 3, 1, 'Khách hàng kiểm tra sức khỏe định kỳ'),
(10, '2024-12-04 08:00:00', 1, '3', 1, 3, 1, 'Lịch hẹn kiểm tra tiểu đường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_lam_viec`
--

CREATE TABLE `lich_lam_viec` (
  `id_lich_lam_viec` int(11) NOT NULL,
  `ngay_lam` date DEFAULT NULL,
  `ca_lam` varchar(255) DEFAULT NULL COMMENT '1: sáng, 2: Chiều, 3 Tối, 4 OT',
  `id_nhan_vien` int(11) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `lich_lam_viec`
--

INSERT INTO `lich_lam_viec` (`id_lich_lam_viec`, `ngay_lam`, `ca_lam`, `id_nhan_vien`, `ghi_chu`) VALUES
(1, '2024-12-19', '1', 1, 'ABC'),
(2, '2024-12-20', '2', 2, 'AAC'),
(3, '2024-12-21', '3', 3, 'ACC'),
(4, '2024-12-22', '4', 4, 'BBC'),
(5, '2024-12-31', '3', 5, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_thuoc`
--

CREATE TABLE `loai_thuoc` (
  `id_loai_thuoc` int(11) NOT NULL,
  `ma_loai_thuoc` varchar(255) DEFAULT NULL,
  `ten_loai_thuoc` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `loai_thuoc`
--

INSERT INTO `loai_thuoc` (`id_loai_thuoc`, `ma_loai_thuoc`, `ten_loai_thuoc`, `mo_ta`) VALUES
(1, 'LT001', 'Thuốc giảm đau', NULL),
(2, 'LT002', 'Kháng sinh', NULL),
(3, 'LT003', 'Thuốc điều trị viêm', NULL),
(4, 'LT004', 'Thuốc điều trị huyết áp', NULL),
(5, 'LT005', 'Thuốc điều trị tiểu đường', NULL),
(6, 'LT001', 'Thuốc giảm đau', NULL),
(7, 'LT002', 'Kháng sinh', NULL),
(8, 'LT003', 'Thuốc điều trị viêm', NULL),
(9, 'LT004', 'Thuốc điều trị huyết áp', NULL),
(10, 'LT005', 'Thuốc điều trị tiểu đường', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_an`
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
-- Đang đổ dữ liệu cho bảng `mon_an`
--

INSERT INTO `mon_an` (`id_mon_an`, `ma_mon_an`, `ten_mon_an`, `chi_so_dinh_duong`, `id_nguoi_tao`, `ngay_tao`, `ma_thuc_don`, `ghi_chu`) VALUES
(1, 'MA1', 'Cháo lưỡi', '123', 3, '2024-12-12 10:01:11', 'TD1', 'Món ăn dành cho người gầyyyyyy'),
(3, 'MMA003', 'Hành Tây', '333', 1, '2024-12-10 00:57:33', 'TD2', 'fffffff'),
(4, 'MMA004', 'Hehehehehe', '232e', 1, '2024-12-10 00:38:39', 'TD3', 'dddhfh'),
(6, 'MMA4', 'Cà tím', '222s', 1, '2024-12-10 01:13:51', 'TD1', 'đấ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
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
  `loai_nhan_vien` tinyint(4) NOT NULL COMMENT '1: Quản trị, 2: Bác sĩ sức khỏe, 3: Bác sĩ dinh dưỡng, 4 Chuyên khoa',
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `code`, `username`, `password`, `level`, `created_at`, `updated_at`, `ho_ten`, `so_dien_thoai`, `email`, `gioi_tinh`, `ngay_sinh`, `loai_nhan_vien`, `dia_chi`) VALUES
(1, 'NV001', 'admin1', '$2y$10$TN7zDKb1jY9Dmmi3JKujWebUXWdcSMQd5Pq5qHjA6jAeUWKECo9tG', 1, '2024-12-12 21:23:36', '2024-12-12 21:23:36', 'Admin', '088554774', 'admin1@gmail.com', 1, '2003-01-01', 1, ''),
(2, 'NV002', 'BSDD1', '26474700cd6a20343ac31cd5a9e1844a', NULL, '2024-12-12 21:26:17', '2024-12-12 21:26:17', 'Tòng', '0123456789', 'BSDD1@gmail.com', 2, '2024-12-01', 3, ''),
(3, 'NV003', 'BSSK1', '0d12a01a2692584087e2abb177f702be', NULL, '2024-12-12 21:25:59', '2024-12-12 21:25:59', 'Sơn', '0123456789', 'BSSK1@gmail.com', 1, '2024-12-13', 2, 'fff'),
(4, 'admin', 'admin', '$2y$10$v/DA7o4TgejiVmnKQL7OT.zGJoHDD/pzzLADxzmV.NWfLbVTfhv4q', NULL, NULL, NULL, 'admin', '0123456784', 'admin@gmail.com', NULL, '2024-12-01', 1, ''),
(5, 'CK01', 'CK1', '989e29c0f6bdfcd50c9f256b68260baa', 1, '2024-12-12 21:30:28', '2024-12-12 21:30:28', 'Trí', '0159987456', 'CK1@gmail.com', 1, '2024-12-02', 4, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuc_don_dinh_duong`
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
-- Đang đổ dữ liệu cho bảng `thuc_don_dinh_duong`
--

INSERT INTO `thuc_don_dinh_duong` (`id_thuc_don_dinh_duong`, `ngay_an`, `buoi_an`, `id_ho_so_benh_an`, `id_nhan_vien`, `ma_thuc_don`) VALUES
(2, '2024-12-01', 'Trưa', 2, NULL, 'TD1'),
(10, '2024-12-09', 'Trưa', 3, NULL, 'TD2'),
(15, '2024-12-13', 'Sáng', 1, NULL, 'TD2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuc_don_dinh_duong-mon_an`
--

CREATE TABLE `thuc_don_dinh_duong-mon_an` (
  `id_thuc_don_dinh_duong` int(11) NOT NULL,
  `id_mon_an` int(11) NOT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
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
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`id_thuoc`, `ma_thuoc`, `ten_thuoc`, `gia`, `so_luong`, `loai_thuoc`, `quoc_gia`, `nha_san_xuat`, `ngay_nhap`, `id_nguoi_them`) VALUES
(16, NULL, 'Paracetamol', 5000, NULL, 1, 'Vietnam', 'ABC Pharma', NULL, NULL),
(17, NULL, 'Ibuprofen', 7000, NULL, 1, 'USA', 'XYZ Pharma', NULL, NULL),
(18, NULL, 'Aspirin', 8000, NULL, 1, 'Germany', 'Bayer', NULL, NULL),
(19, NULL, 'Amoxicillin', 10000, NULL, 2, 'Vietnam', 'Tam Anh', NULL, NULL),
(20, NULL, 'Clindamycin', 15000, NULL, 2, 'USA', 'Pfizer', NULL, NULL),
(21, NULL, 'Omeprazole', 12000, NULL, 3, 'Germany', 'Novartis', NULL, NULL),
(22, NULL, 'Cetirizine', 6000, NULL, 3, 'Vietnam', 'Hapulico', NULL, NULL),
(23, NULL, 'Diphenhydramine', 7000, NULL, 3, 'USA', 'Johnson', NULL, NULL),
(24, NULL, 'Lorazepam', 18000, NULL, 3, 'UK', 'AstraZeneca', NULL, NULL),
(25, NULL, 'Metformin', 15000, NULL, 4, 'Vietnam', 'Mekophar', NULL, NULL),
(26, NULL, 'Losartan', 20000, NULL, 5, 'Japan', 'Eisai', NULL, NULL),
(27, NULL, 'Prednisolone', 17000, NULL, 3, 'Vietnam', 'Dai Loc', NULL, NULL),
(28, NULL, 'Ketoconazole', 9000, NULL, 3, 'USA', 'Bristol Myers', NULL, NULL),
(29, NULL, 'Hydrochlorothiazide', 6000, NULL, 4, 'India', 'Sun Pharma', NULL, NULL),
(30, NULL, 'Ciprofloxacin', 8000, NULL, 2, 'Germany', 'Bayer', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD PRIMARY KEY (`id_bang_cap`),
  ADD KEY `bang_cap_nhan_vien` (`id_nhan_vien`);

--
-- Chỉ mục cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  ADD PRIMARY KEY (`id_benh_nhan`) USING BTREE;

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danh_gia`) USING BTREE,
  ADD KEY `doi_tuong_dich_vu` (`id_doi_tuong_danh_gia`) USING BTREE,
  ADD KEY `nguoi_danh_gia` (`id_benh_nhan`) USING BTREE;

--
-- Chỉ mục cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id_dich_vu`) USING BTREE,
  ADD KEY `nguoi_tao` (`id_nguoi_tao`) USING BTREE;

--
-- Chỉ mục cho bảng `don_thuoc`
--
ALTER TABLE `don_thuoc`
  ADD PRIMARY KEY (`id_don_thuoc`) USING BTREE,
  ADD KEY `benh_nhan` (`id_benh_nhan`) USING BTREE,
  ADD KEY `ho_so_benh_an` (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `bac_si_ra_thuoc` (`id_nhan_vien`) USING BTREE;

--
-- Chỉ mục cho bảng `don_thuoc-thuoc`
--
ALTER TABLE `don_thuoc-thuoc`
  ADD PRIMARY KEY (`id_don_thuoc`,`id_thuoc`) USING BTREE,
  ADD KEY `noi_nhieu_nhieu_thuoc` (`id_thuoc`) USING BTREE;

--
-- Chỉ mục cho bảng `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  ADD PRIMARY KEY (`id_don_xin_nghi`) USING BTREE,
  ADD KEY `nhan_vien_nghi` (`id_nhan_vien`) USING BTREE;

--
-- Chỉ mục cho bảng `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  ADD PRIMARY KEY (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `FK_benh_nhan_hs` (`id_benh_nhan`) USING BTREE;

--
-- Chỉ mục cho bảng `lich_hen`
--
ALTER TABLE `lich_hen`
  ADD PRIMARY KEY (`id_lich_hen`) USING BTREE,
  ADD KEY `nhan_vien_kham` (`id_nhan_vien`) USING BTREE,
  ADD KEY `benh_nhan_dat_kham` (`id_benh_nhan`) USING BTREE;

--
-- Chỉ mục cho bảng `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  ADD PRIMARY KEY (`id_lich_lam_viec`) USING BTREE,
  ADD KEY `nhan_vien` (`id_nhan_vien`) USING BTREE;

--
-- Chỉ mục cho bảng `loai_thuoc`
--
ALTER TABLE `loai_thuoc`
  ADD PRIMARY KEY (`id_loai_thuoc`) USING BTREE;

--
-- Chỉ mục cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id_mon_an`) USING BTREE,
  ADD KEY `FK_nguoi_tao` (`id_nguoi_tao`) USING BTREE,
  ADD KEY `ma_thuc_don_pk` (`ma_thuc_don`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  ADD PRIMARY KEY (`id_thuc_don_dinh_duong`) USING BTREE,
  ADD KEY `thuc_don_ho_so_benh_an` (`id_ho_so_benh_an`) USING BTREE,
  ADD KEY `thuc_don_nhan_vien` (`id_nhan_vien`) USING BTREE,
  ADD KEY `ma_thuc_don_FK` (`ma_thuc_don`);

--
-- Chỉ mục cho bảng `thuc_don_dinh_duong-mon_an`
--
ALTER TABLE `thuc_don_dinh_duong-mon_an`
  ADD PRIMARY KEY (`id_thuc_don_dinh_duong`,`id_mon_an`) USING BTREE,
  ADD KEY `nhieu_nhieu_mon_an` (`id_mon_an`) USING BTREE;

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`id_thuoc`) USING BTREE,
  ADD KEY `fk_loai_thuoc` (`loai_thuoc`) USING BTREE,
  ADD KEY `FK_nhan_vien_them_thuoc` (`id_nguoi_them`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bang_cap`
--
ALTER TABLE `bang_cap`
  MODIFY `id_bang_cap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `benh_nhan`
--
ALTER TABLE `benh_nhan`
  MODIFY `id_benh_nhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danh_gia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id_dich_vu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_thuoc`
--
ALTER TABLE `don_thuoc`
  MODIFY `id_don_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  MODIFY `id_don_xin_nghi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  MODIFY `id_ho_so_benh_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `lich_hen`
--
ALTER TABLE `lich_hen`
  MODIFY `id_lich_hen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  MODIFY `id_lich_lam_viec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai_thuoc`
--
ALTER TABLE `loai_thuoc`
  MODIFY `id_loai_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id_mon_an` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  MODIFY `id_thuc_don_dinh_duong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `id_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD CONSTRAINT `bang_cap_nhan_vien` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `doi_tuong_danh_gia` FOREIGN KEY (`id_doi_tuong_danh_gia`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `doi_tuong_dich_vu` FOREIGN KEY (`id_doi_tuong_danh_gia`) REFERENCES `dich_vu` (`id_dich_vu`),
  ADD CONSTRAINT `nguoi_danh_gia` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`);

--
-- Các ràng buộc cho bảng `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD CONSTRAINT `nguoi_tao` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `don_thuoc`
--
ALTER TABLE `don_thuoc`
  ADD CONSTRAINT `bac_si_ra_thuoc` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `benh_nhan` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`),
  ADD CONSTRAINT `ho_so_benh_an` FOREIGN KEY (`id_ho_so_benh_an`) REFERENCES `ho_so_benh_an` (`id_ho_so_benh_an`);

--
-- Các ràng buộc cho bảng `don_thuoc-thuoc`
--
ALTER TABLE `don_thuoc-thuoc`
  ADD CONSTRAINT `noi_nhieu_nhieu_don_thuoc` FOREIGN KEY (`id_don_thuoc`) REFERENCES `don_thuoc` (`id_don_thuoc`),
  ADD CONSTRAINT `noi_nhieu_nhieu_thuoc` FOREIGN KEY (`id_thuoc`) REFERENCES `thuoc` (`id_thuoc`);

--
-- Các ràng buộc cho bảng `don_xin_nghi`
--
ALTER TABLE `don_xin_nghi`
  ADD CONSTRAINT `nhan_vien_nghi` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `ho_so_benh_an`
--
ALTER TABLE `ho_so_benh_an`
  ADD CONSTRAINT `FK_benh_nhan_hs` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`);

--
-- Các ràng buộc cho bảng `lich_hen`
--
ALTER TABLE `lich_hen`
  ADD CONSTRAINT `benh_nhan_dat_kham` FOREIGN KEY (`id_benh_nhan`) REFERENCES `benh_nhan` (`id_benh_nhan`),
  ADD CONSTRAINT `nhan_vien_kham` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `lich_lam_viec`
--
ALTER TABLE `lich_lam_viec`
  ADD CONSTRAINT `nhan_vien` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD CONSTRAINT `FK_nguoi_tao` FOREIGN KEY (`id_nguoi_tao`) REFERENCES `nhan_vien` (`id`);

--
-- Các ràng buộc cho bảng `thuc_don_dinh_duong`
--
ALTER TABLE `thuc_don_dinh_duong`
  ADD CONSTRAINT `thuc_don_ho_so_benh_an` FOREIGN KEY (`id_ho_so_benh_an`) REFERENCES `ho_so_benh_an` (`id_ho_so_benh_an`),
  ADD CONSTRAINT `thuc_don_nhan_vien` FOREIGN KEY (`ma_thuc_don`) REFERENCES `mon_an` (`ma_thuc_don`);

--
-- Các ràng buộc cho bảng `thuc_don_dinh_duong-mon_an`
--
ALTER TABLE `thuc_don_dinh_duong-mon_an`
  ADD CONSTRAINT `nhieu_nhieu_mon_an` FOREIGN KEY (`id_mon_an`) REFERENCES `mon_an` (`id_mon_an`);

--
-- Các ràng buộc cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `FK_nhan_vien_them_thuoc` FOREIGN KEY (`id_nguoi_them`) REFERENCES `nhan_vien` (`id`),
  ADD CONSTRAINT `fk_loai_thuoc` FOREIGN KEY (`loai_thuoc`) REFERENCES `loai_thuoc` (`id_loai_thuoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
