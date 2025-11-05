-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 05, 2025 lúc 07:38 PM
-- Phiên bản máy phục vụ: 9.1.0
-- Phiên bản PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lvtn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

DROP TABLE IF EXISTS `bai_viet`;
CREATE TABLE IF NOT EXISTS `bai_viet` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tieu_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duong_dan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tom_tat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `noi_dung` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinh_anh_dai_dien` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tac_gia_id` bigint UNSIGNED DEFAULT NULL,
  `chuyen_muc_id` bigint UNSIGNED DEFAULT NULL,
  `trang_thai` enum('nhap','xuat_ban','luu_tru') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'nhap',
  `luot_xem` int DEFAULT '0',
  `ngay_xuat_ban` datetime DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duong_dan` (`duong_dan`),
  KEY `tac_gia_id` (`tac_gia_id`),
  KEY `chuyen_muc_id` (`chuyen_muc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tieu_de` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinh_anh` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vi_tri` enum('home_hero','home_section','category_top','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'home_hero',
  `thu_tu` int DEFAULT '0',
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `hoat_dong` tinyint(1) DEFAULT '1',
  `nguoi_tao_id` bigint UNSIGNED DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_nguoi_tao` (`nguoi_tao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_san_pham`
--

DROP TABLE IF EXISTS `bien_the_san_pham`;
CREATE TABLE IF NOT EXISTS `bien_the_san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `ma_bien_the` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_chinh` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mau_sac` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_mau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_cm` decimal(4,1) DEFAULT NULL,
  `size_eu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_vach` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trong_luong_g` int DEFAULT NULL,
  `trong_luong_dong_goi` int DEFAULT NULL,
  `kich_thuoc_dong_goi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_nhap` decimal(12,2) DEFAULT '0.00',
  `gia_ban` decimal(12,2) NOT NULL,
  `gia_goc` decimal(12,2) DEFAULT NULL,
  `so_luong` int DEFAULT '0',
  `canh_bao_ton_kho` int DEFAULT '10',
  `trang_thai` enum('hien','an','ngung_kinh_doanh') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'hien',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_bien_the` (`ma_bien_the`),
  KEY `san_pham_id` (`san_pham_id`),
  KEY `idx_trangthai` (`trang_thai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hang` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint UNSIGNED NOT NULL,
  `bien_the_id` bigint UNSIGNED DEFAULT NULL,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuoc_tinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong` int NOT NULL,
  `don_gia` decimal(12,2) NOT NULL,
  `gia_goc` decimal(12,2) DEFAULT NULL,
  `giam_gia` decimal(12,2) NOT NULL DEFAULT '0.00',
  `thanh_tien` decimal(12,2) NOT NULL,
  `trang_thai_danh_gia` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `don_hang_id` (`don_hang_id`),
  KEY `bien_the_id` (`bien_the_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

DROP TABLE IF EXISTS `chi_tiet_gio_hang`;
CREATE TABLE IF NOT EXISTS `chi_tiet_gio_hang` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `gio_hang_id` bigint UNSIGNED NOT NULL,
  `bien_the_id` bigint UNSIGNED NOT NULL,
  `so_luong` int NOT NULL,
  `don_gia` decimal(12,2) NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_them` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_gio_bien_the` (`gio_hang_id`,`bien_the_id`),
  KEY `bien_the_id` (`bien_the_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_muc`
--

DROP TABLE IF EXISTS `chuyen_muc`;
CREATE TABLE IF NOT EXISTS `chuyen_muc` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duong_dan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cha_id` bigint UNSIGNED DEFAULT NULL,
  `thu_tu` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duong_dan` (`duong_dan`),
  KEY `cha_id` (`cha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia_san_pham`
--

DROP TABLE IF EXISTS `danh_gia_san_pham`;
CREATE TABLE IF NOT EXISTS `danh_gia_san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `bien_the_id` bigint UNSIGNED DEFAULT NULL,
  `nguoi_dung_id` bigint UNSIGNED DEFAULT NULL,
  `don_hang_id` bigint UNSIGNED DEFAULT NULL,
  `da_mua_hang` tinyint(1) DEFAULT '0',
  `diem` tinyint NOT NULL,
  `tieu_de` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinh_anh` json DEFAULT NULL,
  `video` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luot_thich` int DEFAULT '0',
  `tra_loi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngay_tra_loi` datetime DEFAULT NULL,
  `trang_thai` enum('cho_duyet','chap_nhan','tu_choi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cho_duyet',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `san_pham_id` (`san_pham_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `don_hang_id` (`don_hang_id`),
  KEY `idx_bien_the` (`bien_the_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE IF NOT EXISTS `danh_muc` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duong_dan` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinh_anh` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loai` enum('giay','phu_kien','bong','bo_suu_tap','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'giay',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `thu_tu` int DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duong_dan` (`duong_dan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

DROP TABLE IF EXISTS `dia_chi`;
CREATE TABLE IF NOT EXISTS `dia_chi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nguoi_dung_id` bigint UNSIGNED NOT NULL,
  `loai_dia_chi` enum('nha_rieng','van_phong','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'nha_rieng',
  `ho_ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xa_phuong` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quan_huyen` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinh_thanh` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quoc_gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'VN',
  `ma_buu_dien` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_dinh` tinyint(1) DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
CREATE TABLE IF NOT EXISTS `don_hang` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_don` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nguoi_dung_id` bigint UNSIGNED DEFAULT NULL,
  `ma_giam_gia_id` bigint UNSIGNED DEFAULT NULL,
  `trang_thai` enum('cho_xu_ly','da_thanh_toan','dong_goi','dang_giao','hoan_thanh','huy','hoan_tien') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cho_xu_ly',
  `trang_thai_tt` enum('chua_tt','da_tt','mot_phan','da_hoan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'chua_tt',
  `phuong_thuc_tt` enum('cod','the','chuyen_khoan','fundiin','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cod',
  `phuong_thuc_vc` enum('ghtk','grab','tai_cua_hang','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'ghtk',
  `ma_van_chuyen` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tam_tinh` decimal(12,2) NOT NULL DEFAULT '0.00',
  `giam_gia` decimal(12,2) NOT NULL DEFAULT '0.00',
  `diem_su_dung` int DEFAULT '0',
  `giam_gia_tu_diem` decimal(12,2) DEFAULT '0.00',
  `phi_vc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tong_tien` decimal(12,2) NOT NULL DEFAULT '0.00',
  `ghi_chu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ly_do_huy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thoi_gian_dat` datetime DEFAULT NULL,
  `ngay_giao_du_kien` date DEFAULT NULL,
  `ngay_hoan_thanh` datetime DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ten_nguoi_nhan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt_nguoi_nhan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xa_phuong` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quan_huyen` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinh_thanh` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quoc_gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'VN',
  `ma_buu_dien` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_don` (`ma_don`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `ma_giam_gia_id` (`ma_giam_gia_id`),
  KEY `idx_trangthai` (`trang_thai`),
  KEY `idx_ngaytao` (`ngay_tao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

DROP TABLE IF EXISTS `gio_hang`;
CREATE TABLE IF NOT EXISTS `gio_hang` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nguoi_dung_id` bigint UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` enum('dang_mua','da_dat','huy') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'dang_mua',
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_nguoi_dung` (`nguoi_dung_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `idx_session` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_pham`
--

DROP TABLE IF EXISTS `hinh_anh_san_pham`;
CREATE TABLE IF NOT EXISTS `hinh_anh_san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `san_pham_id` bigint UNSIGNED DEFAULT NULL,
  `bien_the_id` bigint UNSIGNED DEFAULT NULL,
  `duong_dan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_dinh` tinyint(1) DEFAULT '0',
  `thu_tu` int DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `san_pham_id` (`san_pham_id`),
  KEY `bien_the_id` (`bien_the_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_giam_gia`
--

DROP TABLE IF EXISTS `ma_giam_gia`;
CREATE TABLE IF NOT EXISTS `ma_giam_gia` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_chuong_trinh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `loai` enum('phan_tram','tien_mat','mien_phi_vc') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'phan_tram',
  `gia_tri` decimal(12,2) NOT NULL,
  `gia_tri_don_hang_toi_thieu` decimal(12,2) DEFAULT '0.00',
  `giam_toi_da` decimal(12,2) DEFAULT NULL,
  `ap_dung_cho` enum('tat_ca','khach_moi','khach_cu','thanh_vien_vip') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'tat_ca',
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `gioi_han_tong` int DEFAULT NULL,
  `gioi_han_user` int DEFAULT '1',
  `so_lan_da_dung` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_code` (`ma_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `so_dien_thoai` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xac_thuc_sdt` tinyint(1) DEFAULT '0',
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` enum('nam','nu','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` enum('quan_li','nhan_vien','khach_hang') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'khach_hang',
  `trang_thai` enum('hoat_dong','khoa','cho_xac_thuc') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'hoat_dong',
  `diem_tich_luy` int DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `so_dien_thoai` (`so_dien_thoai`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `email`, `email_verified_at`, `so_dien_thoai`, `xac_thuc_sdt`, `mat_khau`, `remember_token`, `ho_ten`, `avatar`, `ngay_sinh`, `gioi_tinh`, `vai_tro`, `trang_thai`, `diem_tich_luy`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'admin@example.com', '2025-10-28 08:48:49', '0123456789', 1, '$2y$12$krqQQJIjQRw5hk/o3EIhIOW00S1UYs4kvP5KJQ9OjXVZAm6q4Iwna', NULL, 'Quản trị viên', NULL, '1990-01-01', 'nam', 'quan_li', 'hoat_dong', 0, '2025-10-28 08:48:49', '2025-10-28 09:47:27'),
(3, 'nhanvien@example.com', NULL, '0987654321', 1, '$2y$12$ej8HDlbbK3EaPx82HePsMeRj0A.G01tUKa5s7HecBtCfM4hQJTYca', NULL, 'Nguyễn Văn Nhân Viên', NULL, NULL, 'nam', 'nhan_vien', 'hoat_dong', 0, '2025-10-29 16:47:32', '2025-10-29 16:47:32'),
(25, 'hiep2001@example.com', NULL, '09664128390', 0, '$2y$12$U132oDJPiyjbJ9wK3BzGA.dIhpGGPEyg13hfr9.hup4JGNhD9g0Xy', NULL, 'Hiep', NULL, NULL, 'nam', 'nhan_vien', 'khoa', 0, '2025-11-05 11:30:25', '2025-11-05 11:48:28'),
(26, 'hiep2001@gmail.com', NULL, '18290830128', 0, '$2y$12$QhCv14d6rY8a6PPa16Sjau2Erpym2GDSCVBilgWh2jLQ.VEifO7ai', NULL, 'Hiep', NULL, NULL, 'nam', 'nhan_vien', 'hoat_dong', 0, '2025-11-05 11:51:32', '2025-11-05 11:51:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_sku` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duong_dan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thuong_hieu_id` bigint UNSIGNED DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `video` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thong_tin_ky_thuat` json DEFAULT NULL,
  `huong_dan_bao_quan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `loai_san` enum('TF','AG','FG','IC','NA') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'NA',
  `gioi_tinh` enum('nam','nu','unisex') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'unisex',
  `thue` decimal(5,2) DEFAULT '0.00',
  `noi_bat` tinyint(1) DEFAULT '0',
  `luot_xem` int DEFAULT '0',
  `luot_ban` int DEFAULT '0',
  `diem_trung_binh` decimal(3,2) DEFAULT '0.00',
  `so_luong_danh_gia` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_sku` (`ma_sku`),
  UNIQUE KEY `duong_dan` (`duong_dan`),
  KEY `thuong_hieu_id` (`thuong_hieu_id`),
  KEY `idx_hoatdong_noibat` (`hoat_dong`,`noi_bat`),
  KEY `idx_luotxem` (`luot_xem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_toan`
--

DROP TABLE IF EXISTS `thanh_toan`;
CREATE TABLE IF NOT EXISTS `thanh_toan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint UNSIGNED NOT NULL,
  `loai_thanh_toan` enum('toan_bo','dat_coc','con_lai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'toan_bo',
  `phuong_thuc` enum('cod','the','chuyen_khoan','fundiin','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cod',
  `nha_cung_cap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_giao_dich` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_tien` decimal(12,2) NOT NULL,
  `phi_giao_dich` decimal(12,2) DEFAULT '0.00',
  `trang_thai` enum('cho_xu_ly','thanh_cong','that_bai','hoan_tien') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cho_xu_ly',
  `thoi_gian_tt` datetime DEFAULT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `du_lieu_goc` json DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_don_hang` (`don_hang_id`),
  KEY `don_hang_id` (`don_hang_id`),
  KEY `ma_giao_dich` (`ma_giao_dich`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

DROP TABLE IF EXISTS `thuong_hieu`;
CREATE TABLE IF NOT EXISTS `thuong_hieu` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duong_dan` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xuat_xu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thu_tu` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duong_dan` (`duong_dan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham` ADD FULLTEXT KEY `ft_ten_mota` (`ten`,`mo_ta`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `fk_baiviet_chuyenmuc` FOREIGN KEY (`chuyen_muc_id`) REFERENCES `chuyen_muc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_baiviet_nguoidung` FOREIGN KEY (`tac_gia_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_nguoidung` FOREIGN KEY (`nguoi_tao_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bien_the_san_pham`
--
ALTER TABLE `bien_the_san_pham`
  ADD CONSTRAINT `fk_bienthe_sanpham` FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ctdonhang_bienthe` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_san_pham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ctdonhang_donhang` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `fk_ctgiohang_bienthe` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_san_pham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ctgiohang_giohang` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danh_gia_san_pham`
--
ALTER TABLE `danh_gia_san_pham`
  ADD CONSTRAINT `fk_danhgia_bienthe` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_san_pham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_danhgia_nguoidung` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD CONSTRAINT `fk_diachi_nguoidung` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_donhang_magiamgia` FOREIGN KEY (`ma_giam_gia_id`) REFERENCES `ma_giam_gia` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_donhang_nguoidung` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_giohang_nguoidung` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD CONSTRAINT `fk_hinhanh_bienthe` FOREIGN KEY (`bien_the_id`) REFERENCES `bien_the_san_pham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sanpham_thuonghieu` FOREIGN KEY (`thuong_hieu_id`) REFERENCES `thuong_hieu` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
