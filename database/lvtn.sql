-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 20, 2026 lúc 08:54 PM
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
  `tom_tat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `noi_dung` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinh_anh_dai_dien` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tac_gia_id` bigint UNSIGNED DEFAULT NULL,
  `chuyen_muc_id` bigint UNSIGNED DEFAULT NULL,
  `trang_thai` enum('nhap','xuat_ban','luu_tru') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'nhap',
  `ngay_xuat_ban` datetime DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tac_gia_id` (`tac_gia_id`),
  KEY `chuyen_muc_id` (`chuyen_muc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `tieu_de`, `tom_tat`, `noi_dung`, `hinh_anh_dai_dien`, `tac_gia_id`, `chuyen_muc_id`, `trang_thai`, `ngay_xuat_ban`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'Adidas Falcon nổi bật mùa Hè với phối màu color block', 'Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng chừng...', 'Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào mùa Hè khiến giới trẻ yêu thích không thôi. Tưởng chừng đã kết thúc nhưng chưa dừng lại ở đó, adidas lại tiếp tục khiến các tín đồ thời trang phải đứng ngồi không yên khi sắp sửa \"tung chiêu\" với một phiên bản đặc biệt mới toanh.\r\nPhối Màu Cực \"Gắt\" Đón Thu Đông\r\n\r\nPhiên bản mới này không chỉ là sự tiếp nối xu hướng mà còn mang hơi hướng của mùa Thu Đông sắp tới.\r\n\r\n    Thiết kế: Vẫn giữ nguyên form dáng chunky đặc trưng, tôn lên vẻ năng động và cá tính.\r\n\r\n    Điểm nhấn: Lần này, hãng chọn các tone màu trầm ấm và nổi bật đan xen, tạo nên sự tương phản thú vị:\r\n\r\n        Phần thân giày có thể sẽ kết hợp giữa các màu như xanh navy đậm (dark navy), xám lông chuột (charcoal grey), đi cùng các chi tiết màu cam cháy (burnt orange) hoặc vàng mù tạt (mustard yellow) để tạo điểm nhấn thị giác mạnh mẽ.\r\n\r\n    Chất liệu: Vẫn là sự kết hợp quen thuộc của lưới (mesh), da lộn (suede) và da tổng hợp (synthetic leather), đảm bảo độ thoải mái và thoáng khí nhưng thêm chút \"texture\" để phù hợp với tiết trời se lạnh hơn.\r\n\r\n🔥 Falcon - Chiếc \"It-Sneaker\" Đáng Sở Hữu\r\n\r\nVới tốc độ ra mắt các phiên bản mới và độ phủ sóng của mình, adidas Falcon đã chứng minh vị thế là một trong những mẫu \"it-sneaker\" của năm. Sự đa dạng trong phối màu và tính ứng dụng cao giúp nó dễ dàng kết hợp với nhiều phong cách khác nhau, từ sporty-chic, streetwear cá tính cho đến outfit thường ngày.\r\n\r\nCác fan của dòng Falcon đã bắt đầu rục rịch \"lùng sục\" thông tin về ngày ra mắt chính thức. Hãy cùng chờ đón xem phiên bản mới này sẽ tạo nên cơn sốt như thế nào trong những tháng cuối năm nhé!', 'uploads/posts/yvNAAMnANmstMunSF5vQ1Ag2ESnDQlJEinQ8JOcR.jpg', NULL, 1, 'xuat_ban', '2025-11-05 00:00:00', '2025-11-13 16:04:49', '2025-11-13 16:28:24'),
(2, '\"Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình', 'Là một trong những đôi giày chạy bộ tốt nhất vào những năm 1994, 1995, Saucony vừa có màn trở lại vô cùng ấn...', 'Là một trong những đôi giày chạy bộ tốt nhất vào những năm 1994, 1995, Saucony vừa có màn trở lại vô cùng ấn tượng với việc hồi sinh mẫu giày huyền thoại Aya Runner.\r\n👟 Aya Runner: Huyền Thoại Tái Xuất\r\n\r\nSau một thời gian dài vắng bóng, sự trở lại của Aya Runner không chỉ làm thỏa mãn những người hâm mộ lâu năm mà còn thu hút một thế hệ sneakerhead mới.\r\n\r\n    Nguồn gốc: Aya Runner lần đầu ra mắt vào năm 1994, được đánh giá cao trong giới chạy bộ vì hiệu suất và sự thoải mái. \"Aya\" trong tiếng Nhật có nghĩa là \"nhanh\", thể hiện đúng tinh thần của một đôi giày đua (racing shoe) thời bấy giờ.\r\n\r\n    Phong cách Retro: Giữ nguyên thiết kế cổ điển của thập niên 90, Aya Runner mới mang đậm chất retro runner đang thịnh hành. Đôi giày nổi bật với sự kết hợp đa chất liệu:\r\n\r\n        Thân giày: Sử dụng chất liệu lưới (mesh) thoáng khí cùng với da lộn (suede) và da tổng hợp (synthetic leather) tạo nên cấu trúc chắc chắn và lớp ngoài bắt mắt.\r\n\r\n        Phối màu: Phiên bản tái xuất thường được ra mắt với các tông màu nổi bật và năng động, chẳng hạn như sự kết hợp giữa màu cam, tím hoặc các màu sắc tương phản mạnh mẽ, rất phù hợp với xu hướng thời trang mùa hè/thu.\r\n\r\n    Công nghệ: Đôi giày vẫn sử dụng bộ đệm EVA (hoặc TPU dày) và đế ngoài (outsole) cơ bản nhưng mang tính biểu tượng, tập trung vào cảm giác êm ái và độ ổn định cần thiết cho một đôi giày chạy bộ cổ điển.\r\n\r\nSự trở lại của Aya Runner là minh chứng cho thấy phong trào \"giày chạy bộ cổ điển\" (retro runner) đang ngày càng phát triển mạnh mẽ, khi các thương hiệu liên tục đưa những mẫu giày hiệu suất cao trong quá khứ trở lại thành một phần của thời trang đường phố (streetwear).', 'uploads/posts/YYAndvijuWu8OpmB6WZMdQydz3ZVrca9tJCB8eyr.jpg', 1, 1, 'xuat_ban', '2025-11-12 00:00:00', '2025-11-13 16:08:06', '2025-12-19 02:04:28'),
(3, 'Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt', '<p>Là một trong những mẫu giày retro có nhiều phối màu gradient đẹp nhất từ trước đến nay, Nike Vapormax Plus vừa có màn trở lại...</p>', '<p>Là một trong những mẫu giày retro có nhiều phối màu gradient đẹp nhất từ trước đến nay, Nike Vapormax Plus vừa có màn trở lại vô cùng ấn tượng với những phiên bản chuyển sắc \"chết người\" dành cho cả nam và nữ. 💜 Pha Lê Tím Mộng Mơ: Sắc Màu Mới Hút Hồn Tiếp nối sự thành công của các bản màu chuyển sắc (gradient) kinh điển như \"Sunset\" hay \"Grape\", Nike đã tung ra các phối màu mới, tiếp tục khai thác thế mạnh đặc trưng của dòng giày này: Gradient Độc Đáo: Điểm nhấn lớn nhất là phần thân giày được làm từ neoprene và mesh, thực hiện kỹ thuật chuyển màu (fade) mượt mà. Một trong những phiên bản nổi bật nhất là sự kết hợp giữa màu tím hoa cà (Lilac) và xanh da trời nhạt (University Blue), tạo cảm giác mộng mơ, quyến rũ và rất phù hợp với không khí mùa Hè/Thu. Các phiên bản khác cũng không kém phần cá tính với sự pha trộn giữa đỏ rực (Bright Crimson), cam cháy (Vivid Orange) và xanh Baltic (Baltic Blue), mang đến vẻ ngoài năng động, \"cực gắt\". Thiết Kế \"Lai\" Hoàn Hảo: Đôi giày vẫn giữ nguyên bộ khung nhựa đặc trưng của Air Max Plus (thường được gọi là TN), mang đến vẻ ngoài hầm hố và đậm chất retro của thập niên 90. Phần đế được thay thế bằng công nghệ VaporMax Air hiện đại với các túi khí độc lập, trong suốt, tạo cảm giác như đang \"bước đi trên không khí\" và làm tăng thêm vẻ ngoài futuristic (viễn tưởng) cho tổng thể. ✨ Lý Do Vapormax Plus Luôn Là \"Must-Have\" Sự trở lại lần này củng cố vị thế của Vapormax Plus trong giới sneakerhead. Nó không chỉ là sự kết hợp hài hòa giữa di sản và công nghệ mà còn là tuyên ngôn thời trang mạnh mẽ, dễ dàng nổi bật trong mọi outfit streetwear. Với những bản gradient tuyệt đẹp và độc đáo này, Nike Vapormax Plus hứa hẹn sẽ là một trong những đôi giày được săn đón nhất trong nửa cuối năm nay.</p>', 'uploads/posts/KqnwyCkf2ITvhvbIz375hbXz5dTHhiGVQWl2xWje.jpg', NULL, 1, 'xuat_ban', '2025-12-25 00:00:00', '2025-11-13 16:20:56', '2025-12-24 13:39:28');

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
  `vi_tri` enum('home_hero','home_section','category_top','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'home_hero',
  `thu_tu` int DEFAULT '0',
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `hoat_dong` tinyint(1) DEFAULT '1',
  `nguoi_tao_id` bigint UNSIGNED DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_nguoi_tao` (`nguoi_tao_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `tieu_de`, `mo_ta`, `hinh_anh`, `vi_tri`, `thu_tu`, `ngay_bat_dau`, `ngay_ket_thuc`, `hoat_dong`, `nguoi_tao_id`, `ngay_tao`) VALUES
(1, 'Slider 1', 'Banner trang chủ slider 1', 'images/slideshow_1.jpg', 'home_hero', 1, NULL, NULL, 1, 1, '2025-12-05 20:09:00'),
(2, 'Slider 2', 'Banner trang chủ slider 2', 'images/slideshow_2.jpg', 'home_hero', 2, NULL, NULL, 1, 1, '2025-12-05 20:09:00'),
(3, 'Bộ sưu tập', 'Bộ sưu tập', 'images/shoes/block_home_category1_grande.jpg', 'home_section', 1, NULL, NULL, 1, 1, '2025-12-05 20:09:00'),
(4, 'Thương hiệu', 'Thương hiệu', 'images/shoes/block_home_category2_grande.jpg', 'home_section', 2, NULL, NULL, 1, 1, '2025-12-05 20:09:00'),
(5, 'Blog', 'Banner blog', 'images/shoes/block_home_category3_grande.jpg', 'home_section', 3, NULL, NULL, 1, 1, '2025-12-05 20:09:00');

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
  `size_eu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_nhap` decimal(12,2) DEFAULT '0.00',
  `gia_ban` decimal(12,2) NOT NULL,
  `so_luong` int DEFAULT '0',
  `canh_bao_ton_kho` int DEFAULT '10',
  `trang_thai` enum('hien','an','ngung_kinh_doanh') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'hien',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_bien_the` (`ma_bien_the`),
  KEY `san_pham_id` (`san_pham_id`),
  KEY `idx_trangthai` (`trang_thai`)
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the_san_pham`
--

INSERT INTO `bien_the_san_pham` (`id`, `san_pham_id`, `ma_bien_the`, `hinh_anh_chinh`, `mau_sac`, `ma_mau`, `size_eu`, `gia_nhap`, `gia_ban`, `so_luong`, `canh_bao_ton_kho`, `trang_thai`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(68, 54, 'A08_Đen_40', NULL, 'Đen', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(69, 54, 'A08_Đen_38', NULL, 'Đen', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(70, 54, 'A08_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(71, 53, 'A07_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(72, 53, 'A07_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(73, 53, 'A07_Đen_40', NULL, 'Đen', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(74, 53, 'A07_Đen_37', NULL, 'Đen', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(75, 53, 'A07_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(76, 52, 'A06_Đen_40', NULL, 'Đen', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(77, 52, 'A06_Đen_38', NULL, 'Đen', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(78, 52, 'A06_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(79, 51, 'A05_Đen_40', NULL, 'Đỏ', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:52:21'),
(80, 51, 'A05_Đen_38', NULL, 'Đỏ', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:52:09'),
(81, 51, 'A05_Đen_35', NULL, 'Đỏ', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:52:01'),
(82, 50, 'A04_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(83, 50, 'A04_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(84, 50, 'A04_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(85, 49, 'A03_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(86, 49, 'A03_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(87, 49, 'A03_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(88, 47, 'A02_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(89, 47, 'A02_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(90, 47, 'A02_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(91, 46, 'A01_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(92, 46, 'A01_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(93, 46, 'A01_Đen_40', NULL, 'Đen', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(94, 46, 'A01_Đen_37', NULL, 'Đen', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(95, 46, 'A01_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(96, 54, 'A08_Trắng_40', NULL, 'Trắng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(97, 54, 'A08_Trắng_38', NULL, 'Trắng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(98, 54, 'A08_Trắng_35', NULL, 'Trắng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(99, 53, 'A07_Trắng_44', NULL, 'Be', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:58:41'),
(100, 53, 'A07_Trắng_42', NULL, 'Be', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:58:49'),
(101, 53, 'A07_Trắng_40', NULL, 'Be', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:58:58'),
(102, 53, 'A07_Trắng_37', NULL, 'Be', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:59:09'),
(103, 53, 'A07_Trắng_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:59:15'),
(104, 52, 'A06_Trắng_40', NULL, 'Trắng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(105, 52, 'A06_Trắng_38', NULL, 'Trắng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(106, 52, 'A06_Trắng_35', NULL, 'Trắng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(107, 51, 'A05_Trắng_40', NULL, 'Trắng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(108, 51, 'A05_Trắng_38', NULL, 'Trắng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(109, 51, 'A05_Trắng_35', NULL, 'Trắng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(110, 50, 'A04_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(111, 50, 'A04_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(112, 50, 'A04_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(113, 49, 'A03_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(114, 49, 'A03_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(115, 49, 'A03_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(116, 47, 'A02_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(117, 47, 'A02_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(118, 47, 'A02_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(119, 46, 'A01_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(120, 46, 'A01_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(121, 46, 'A01_Trắng_40', NULL, 'Trắng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(122, 46, 'A01_Trắng_37', NULL, 'Trắng', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(123, 46, 'A01_Trắng_35', NULL, 'Trắng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:33:41'),
(124, 54, 'A08_Xanh_40', NULL, 'Xanh dương', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(125, 54, 'A08_Xanh_38', NULL, 'Xanh dương', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(126, 54, 'A08_Xanh_35', NULL, 'Xanh dương', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(127, 53, 'A07_Xanh_44', NULL, 'Xanh dương', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(128, 53, 'A07_Xanh_42', NULL, 'Xanh dương', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(129, 53, 'A07_Xanh_40', NULL, 'Xanh dương', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(130, 53, 'A07_Xanh_37', NULL, 'Xanh dương', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(131, 53, 'A07_Xanh_35', NULL, 'Xanh dương', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(132, 52, 'A06_Xanh_40', NULL, 'Xanh dương', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(133, 52, 'A06_Xanh_38', NULL, 'Xanh dương', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(134, 52, 'A06_Xanh_35', NULL, 'Xanh dương', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(135, 51, 'A05_Xanh_40', NULL, 'Xanh dương', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(136, 51, 'A05_Xanh_38', NULL, 'Xanh dương', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(137, 51, 'A05_Xanh_35', NULL, 'Xanh dương', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(138, 50, 'A04_Xanh_44', NULL, 'Xanh lá', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:49:44'),
(139, 50, 'A04_Xanh_42', NULL, 'Xanh lá', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:49:52'),
(140, 50, 'A04_Xanh_39', NULL, 'Xanh lá', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 12:49:58'),
(141, 49, 'A03_Xanh_44', NULL, 'Xanh dương', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(142, 49, 'A03_Xanh_42', NULL, 'Xanh dương', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(143, 49, 'A03_Xanh_39', NULL, 'Xanh dương', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(144, 47, 'A02_Xanh_44', NULL, 'Xanh dương', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(145, 47, 'A02_Xanh_42', NULL, 'Xanh dương', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(146, 47, 'A02_Xanh_39', NULL, 'Xanh dương', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(147, 46, 'A01_Xanh_44', NULL, 'Xanh dương', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(148, 46, 'A01_Xanh_42', NULL, 'Xanh dương', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(149, 46, 'A01_Xanh_40', NULL, 'Xanh dương', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(150, 46, 'A01_Xanh_37', NULL, 'Xanh dương', NULL, '37', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(151, 46, 'A01_Xanh_35', NULL, 'Xanh dương', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 19:33:41', '2026-01-20 19:41:53'),
(195, 58, 'N04_Be_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(196, 59, 'N05_Be_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(197, 60, 'N06_Be_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(198, 58, 'N04_Hồng_35', NULL, 'Hồng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(199, 59, 'N05_Hồng_35', NULL, 'Hồng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(200, 60, 'N06_Hồng_35', NULL, 'Hồng', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(201, 58, 'N04_Be_38', NULL, 'Be', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(202, 59, 'N05_Be_38', NULL, 'Be', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(203, 60, 'N06_Be_38', NULL, 'Be', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(204, 58, 'N04_Hồng_38', NULL, 'Hồng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(205, 59, 'N05_Hồng_38', NULL, 'Hồng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(206, 60, 'N06_Hồng_38', NULL, 'Hồng', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(207, 58, 'N04_Be_40', NULL, 'Be', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(208, 59, 'N05_Be_40', NULL, 'Be', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(209, 60, 'N06_Be_40', NULL, 'Be', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(210, 58, 'N04_Hồng_40', NULL, 'Hồng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(211, 59, 'N05_Hồng_40', NULL, 'Hồng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(212, 60, 'N06_Hồng_40', NULL, 'Hồng', NULL, '40', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(226, 55, 'N01_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(227, 56, 'N02_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(228, 57, 'N03_Trắng_39', NULL, 'Trắng', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(229, 55, 'N01_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(230, 56, 'N02_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(231, 57, 'N03_Đen_39', NULL, 'Đen', NULL, '39', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(232, 55, 'N01_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(233, 56, 'N02_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(234, 57, 'N03_Trắng_42', NULL, 'Trắng', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(235, 55, 'N01_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(236, 56, 'N02_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(237, 57, 'N03_Đen_42', NULL, 'Đen', NULL, '42', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(238, 55, 'N01_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(239, 56, 'N02_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(240, 57, 'N03_Trắng_44', NULL, 'Trắng', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(241, 55, 'N01_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(242, 56, 'N02_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(243, 57, 'N03_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(257, 61, 'N07_Be_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(258, 62, 'N08_Be_35', NULL, 'Be', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(259, 61, 'N07_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(260, 62, 'N08_Đen_35', NULL, 'Đen', NULL, '35', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(261, 61, 'N07_Be_38', NULL, 'Be', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(262, 62, 'N08_Be_38', NULL, 'Be', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(263, 61, 'N07_Đen_38', NULL, 'Đen', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(264, 62, 'N08_Đen_38', NULL, 'Đen', NULL, '38', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(265, 61, 'N07_Be_41', NULL, 'Be', NULL, '41', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(266, 62, 'N08_Be_41', NULL, 'Be', NULL, '41', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(267, 61, 'N07_Đen_41', NULL, 'Đen', NULL, '41', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(268, 62, 'N08_Đen_41', NULL, 'Đen', NULL, '41', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(269, 61, 'N07_Be_44', NULL, 'Be', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(270, 62, 'N08_Be_44', NULL, 'Be', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(271, 61, 'N07_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49'),
(272, 62, 'N08_Đen_44', NULL, 'Đen', NULL, '44', 4000000.00, 5000000.00, 20, 10, 'hien', '2026-01-20 20:34:49', '2026-01-20 20:34:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `don_hang_id`, `bien_the_id`, `ten_san_pham`, `thuoc_tinh`, `hinh_anh`, `so_luong`, `don_gia`, `gia_goc`, `giam_gia`, `thanh_tien`, `trang_thai_danh_gia`) VALUES
(81, 73, NULL, 'SL 72 OG SHOES', 'Hồng / 35', 'storage/products/c3Jkfwjny9myRRfiinkzkMagrJLLKDIXaDxvKvTY.png', 1, 5000000.00, 0.00, 0.00, 5000000.00, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_muc`
--

DROP TABLE IF EXISTS `chuyen_muc`;
CREATE TABLE IF NOT EXISTS `chuyen_muc` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thu_tu` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyen_muc`
--

INSERT INTO `chuyen_muc` (`id`, `ten`, `mo_ta`, `thu_tu`, `hoat_dong`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'Bài viết của trang', NULL, 1, 1, '2025-11-13 15:23:16', '2025-11-13 15:23:16'),
(2, 'Bài viết của người dùng', NULL, 2, 1, '2025-11-13 15:29:41', '2025-11-13 15:29:41');

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
  `luot_thich` int DEFAULT '0',
  `tra_loi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngay_tra_loi` datetime DEFAULT NULL,
  `trang_thai` enum('cho_duyet','chap_nhan','tu_choi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'chap_nhan',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `san_pham_id` (`san_pham_id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `don_hang_id` (`don_hang_id`),
  KEY `idx_bien_the` (`bien_the_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia_san_pham`
--

INSERT INTO `danh_gia_san_pham` (`id`, `san_pham_id`, `bien_the_id`, `nguoi_dung_id`, `don_hang_id`, `da_mua_hang`, `diem`, `tieu_de`, `noi_dung`, `hinh_anh`, `luot_thich`, `tra_loi`, `ngay_tra_loi`, `trang_thai`, `ngay_tao`) VALUES
(1, 52, NULL, 30, NULL, 0, 5, NULL, '123123', NULL, 0, NULL, NULL, 'chap_nhan', '2026-01-20 11:45:14'),
(2, 52, NULL, 30, NULL, 0, 5, NULL, '123123', NULL, 0, NULL, NULL, 'cho_duyet', '2026-01-20 11:47:59'),
(3, 52, NULL, 30, NULL, 0, 5, 'sản phẩm tốt', 'chất vải vừa vặn và tốt', NULL, 0, NULL, NULL, 'cho_duyet', '2026-01-20 11:57:20'),
(4, 52, NULL, 30, NULL, 0, 3, 'sản phẩm tốt', 'chất liệu tốt', NULL, 0, NULL, NULL, 'cho_duyet', '2026-01-20 11:58:57'),
(5, 52, NULL, 30, NULL, 0, 3, 'sản phẩm tốt', 'đánh giá nè', NULL, 0, NULL, NULL, 'chap_nhan', '2026-01-20 12:00:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

DROP TABLE IF EXISTS `danh_muc`;
CREATE TABLE IF NOT EXISTS `danh_muc` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cha_id` int UNSIGNED DEFAULT NULL,
  `ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `cha_id`, `ten`, `mo_ta`, `hoat_dong`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(5, NULL, 'Danh Mục Sản Phẩm', NULL, 1, '2025-11-13 11:15:26', '2025-11-13 11:15:26'),
(6, 5, 'Thương hiệu', NULL, 1, '2025-11-13 11:16:17', '2025-11-13 11:16:17'),
(7, 5, 'Size', NULL, 1, '2025-11-13 11:16:37', '2025-11-13 11:16:46'),
(8, 5, 'Màu sắc', NULL, 1, '2025-11-13 11:16:54', '2025-11-13 11:17:03'),
(10, 5, 'Giới tính', NULL, 1, '2026-01-05 11:04:11', '2026-01-05 11:13:03');

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
  `ngay_cap_nhat` timestamp NULL DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`id`, `nguoi_dung_id`, `loai_dia_chi`, `ho_ten`, `so_dien_thoai`, `dia_chi_1`, `dia_chi_2`, `xa_phuong`, `quan_huyen`, `tinh_thanh`, `quoc_gia`, `ma_buu_dien`, `ghi_chu`, `mac_dinh`, `ngay_cap_nhat`, `ngay_tao`) VALUES
(2, 26, 'nha_rieng', 'Hiep123', '18290830128', '675 trần xuân soạn', NULL, 'tân hưng', '7', 'TPHCM', 'VN', NULL, NULL, 1, '2025-11-23 19:04:24', '2025-11-23 18:22:38'),
(3, 26, 'nha_rieng', 'Hiep123', '18290830128', '180 cao lỗ', NULL, '4', '8', 'TPHCM', 'VN', NULL, NULL, 0, '2025-11-23 19:04:24', '2025-11-23 18:35:56'),
(4, 1, 'nha_rieng', 'QL', '0123456789', 'cao lo', NULL, '4', '8', 'tphcm', 'VN', NULL, NULL, 1, '2025-12-18 19:13:39', '2025-12-05 11:45:05'),
(5, 1, 'nha_rieng', 'QL', '0123456789', '123', '123', '123', '123', '123', 'VN', NULL, NULL, 0, '2025-12-18 19:13:39', '2025-12-18 18:41:05'),
(6, 30, 'nha_rieng', 'hinh tanh hiep', '097897989', '10 huynh tinh cua', NULL, '19', 'binh thanh', 'TPHCM', 'VN', NULL, NULL, 0, '2026-01-05 15:30:38', '2026-01-05 14:21:21'),
(7, 30, 'nha_rieng', 'hinh tanh hiep', '534534', '345435', NULL, 'phu dien', 'thap muoi', 'dong thap', 'VN', NULL, NULL, 1, '2026-01-05 15:30:21', '2026-01-05 15:30:21');

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
  `trang_thai_tt` enum('chua_tt','da_tt') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'chua_tt',
  `phuong_thuc_tt` enum('cod','vnpay') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phuong_thuc_vc` enum('ghtk','grab','tai_cua_hang','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'ghtk',
  `phi_ship` decimal(12,2) NOT NULL DEFAULT '0.00',
  `giam_gia` decimal(12,2) NOT NULL DEFAULT '0.00',
  `diem_su_dung` int DEFAULT '0',
  `tong_tien` decimal(12,2) NOT NULL DEFAULT '0.00',
  `ghi_chu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_don` (`ma_don`),
  KEY `nguoi_dung_id` (`nguoi_dung_id`),
  KEY `ma_giam_gia_id` (`ma_giam_gia_id`),
  KEY `idx_trangthai` (`trang_thai`),
  KEY `idx_ngaytao` (`ngay_tao`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_don`, `nguoi_dung_id`, `ma_giam_gia_id`, `trang_thai`, `trang_thai_tt`, `phuong_thuc_tt`, `phuong_thuc_vc`, `phi_ship`, `giam_gia`, `diem_su_dung`, `tong_tien`, `ghi_chu`, `thoi_gian_dat`, `ngay_giao_du_kien`, `ngay_hoan_thanh`, `ngay_tao`, `ngay_cap_nhat`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_1`, `dia_chi_2`, `xa_phuong`, `quan_huyen`, `tinh_thanh`, `quoc_gia`) VALUES
(73, 'DH2026012000073', NULL, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 30000.00, 0.00, 0, 5030000.00, NULL, '2026-01-20 07:32:27', '2026-01-23', NULL, '2026-01-20 07:32:27', '2026-01-20 07:35:29', 'hiep', '123123', 'chao lua', NULL, NULL, NULL, NULL, 'VN'),
(74, 'DH2026012000074', 30, 4, 'da_thanh_toan', 'da_tt', 'vnpay', 'ghtk', 50000.00, 100000.00, 0, 4950000.00, NULL, '2026-01-20 08:04:35', '2026-01-27', NULL, '2026-01-20 08:04:35', '2026-01-20 08:09:34', 'hinh tanh hiep', '64645645', '345435', NULL, NULL, NULL, NULL, 'VN'),
(75, 'DH2026012000075', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:15:04', '2026-01-27', NULL, '2026-01-20 08:15:04', '2026-01-20 08:20:43', 'hinh tanh hiep', '123123', '345435', NULL, NULL, NULL, NULL, 'VN'),
(76, 'DH2026012000076', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:21:16', '2026-01-27', NULL, '2026-01-20 08:21:16', '2026-01-20 08:21:50', 'hinh tanh hiep', '435345', '345435', NULL, NULL, NULL, NULL, 'VN'),
(77, 'DH2026012000077', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:22:37', '2026-01-27', NULL, '2026-01-20 08:22:37', '2026-01-20 08:22:54', 'hinh tanh hiep', '234', '345435', NULL, NULL, NULL, NULL, 'VN'),
(78, 'DH2026012000078', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:24:00', '2026-01-27', NULL, '2026-01-20 08:24:00', '2026-01-20 08:24:21', 'hinh tanh hiep', '23423', '345435', NULL, NULL, NULL, NULL, 'VN'),
(79, 'DH2026012000079', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:33:10', '2026-01-27', NULL, '2026-01-20 08:33:10', '2026-01-20 08:33:32', 'hinh tanh hiep', '123123', '345435', NULL, NULL, NULL, NULL, 'VN'),
(80, 'DH2026012000080', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:34:43', '2026-01-27', NULL, '2026-01-20 08:34:43', '2026-01-20 08:35:07', 'hinh tanh hiep', '213', '345435', NULL, NULL, NULL, NULL, 'VN'),
(81, 'DH2026012000081', 30, NULL, 'huy', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:36:12', '2026-01-27', NULL, '2026-01-20 08:36:12', '2026-01-20 08:38:06', 'hinh tanh hiep', '42342', '345435', NULL, NULL, NULL, NULL, 'VN'),
(82, 'DH2026012000082', 30, NULL, 'cho_xu_ly', 'chua_tt', NULL, 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 08:47:59', '2026-01-27', NULL, '2026-01-20 08:47:59', '2026-01-20 08:47:59', 'hinh tanh hiep', '435', '345435', NULL, NULL, NULL, NULL, 'VN'),
(83, 'DH2026012000083', 30, 4, 'cho_xu_ly', 'chua_tt', 'cod', 'ghtk', 50000.00, 100000.00, 0, 4950000.00, NULL, '2026-01-20 08:49:08', '2026-01-27', NULL, '2026-01-20 08:49:08', '2026-01-20 08:49:23', 'hinh tanh hiep', '42342', '345435', NULL, NULL, NULL, NULL, 'VN'),
(84, 'DH2026012000084', 30, NULL, 'cho_xu_ly', 'chua_tt', NULL, 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:11:13', '2026-01-27', NULL, '2026-01-20 09:11:13', '2026-01-20 09:11:13', 'hinh tanh hiep', '4324234', '345435', NULL, NULL, NULL, NULL, 'VN'),
(85, 'DH2026012000085', 30, NULL, 'cho_xu_ly', 'chua_tt', NULL, 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:12:41', '2026-01-27', NULL, '2026-01-20 09:12:41', '2026-01-20 09:12:41', 'hinh tanh hiep', '23423', '345435', NULL, NULL, NULL, NULL, 'VN'),
(86, 'DH2026012000086', 30, NULL, 'cho_xu_ly', 'chua_tt', NULL, 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:14:17', '2026-01-27', NULL, '2026-01-20 09:14:17', '2026-01-20 09:14:17', 'hinh tanh hiep', '23423', '345435', NULL, NULL, NULL, NULL, 'VN'),
(87, 'DH2026012000087', 30, NULL, 'da_thanh_toan', 'da_tt', 'vnpay', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:16:07', '2026-01-27', NULL, '2026-01-20 09:16:07', '2026-01-20 09:32:36', 'hinh tanh hiep', '234234', '345435', NULL, NULL, NULL, NULL, 'VN'),
(88, 'DH2026012000088', 30, NULL, 'da_thanh_toan', 'da_tt', 'vnpay', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:17:30', '2026-01-27', NULL, '2026-01-20 09:17:30', '2026-01-20 09:25:32', 'hinh tanh hiep', '23423', '345435', NULL, NULL, NULL, NULL, 'VN'),
(89, 'DH2026012000089', 30, NULL, 'cho_xu_ly', 'chua_tt', 'vnpay', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:37:02', '2026-01-27', NULL, '2026-01-20 09:37:02', '2026-01-20 09:42:08', 'hinh tanh hiep', '213124', '345435', NULL, NULL, NULL, NULL, 'VN'),
(90, 'DH2026012000090', 30, NULL, 'cho_xu_ly', 'chua_tt', NULL, 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:42:50', '2026-01-27', NULL, '2026-01-20 09:42:50', '2026-01-20 09:42:50', 'hinh tanh hiep', '31231', '345435', NULL, NULL, NULL, NULL, 'VN'),
(91, 'DH2026012000091', 30, NULL, 'cho_xu_ly', 'chua_tt', 'cod', 'ghtk', 50000.00, 0.00, 0, 5050000.00, NULL, '2026-01-20 09:50:51', '2026-01-27', NULL, '2026-01-20 09:50:51', '2026-01-20 09:50:51', 'hinh tanh hiep', '123', '345435', NULL, NULL, NULL, NULL, 'VN');

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `nguoi_dung_id`, `session_id`, `trang_thai`, `ghi_chu`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(75, 30, NULL, 'dang_mua', NULL, '2026-01-20 02:52:16', '2026-01-20 02:52:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_pham`
--

DROP TABLE IF EXISTS `hinh_anh_san_pham`;
CREATE TABLE IF NOT EXISTS `hinh_anh_san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bien_the_id` bigint UNSIGNED DEFAULT NULL,
  `duong_dan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_dinh` tinyint(1) DEFAULT '0',
  `thu_tu` int DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bien_the_id` (`bien_the_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_pham`
--

INSERT INTO `hinh_anh_san_pham` (`id`, `bien_the_id`, `duong_dan`, `mo_ta`, `mac_dinh`, `thu_tu`, `ngay_tao`) VALUES
(50, 91, 'storage/products/m0rHzL4iZ4yVEIP8tiulwEA2GMnFir0jhcmkNJP7.png', NULL, 0, 0, '2026-01-20 12:36:24'),
(51, 91, 'storage/products/G9vapporNeYhYWpFYpI7epgS61eZVYpkdTCDq8KF.png', NULL, 0, 0, '2026-01-20 12:36:41'),
(52, 144, 'storage/products/QD8siMMxhYtBmyWeWXjqrsZOhMcuBKXEeLOzEtRw.png', NULL, 0, 0, '2026-01-20 12:43:40'),
(53, 144, 'storage/products/D2xl422lrrYD3DmjmtPtnOmQZ2qEN8ChgCrOVVCS.png', NULL, 0, 0, '2026-01-20 12:43:51'),
(54, 85, 'storage/products/R6jR7v44Zw0SOB7e2EHjwjYCuv9LmkhfIgckUCYX.png', NULL, 0, 0, '2026-01-20 12:45:34'),
(55, 85, 'storage/products/pxaMfZPf4KVSBjImmWIpCCtiWMwDOWSv7QQSCehH.png', NULL, 0, 0, '2026-01-20 12:45:48'),
(56, 82, 'storage/products/6dEh4QhQ8pnaEsXqcpzJYxv1BX5rkUvJ8Cvujv2m.png', NULL, 0, 0, '2026-01-20 12:46:51'),
(57, 82, 'storage/products/V3GKH4TBLrDwGyYDkwBoX2HDxpc6Dk2PBfivAceI.png', NULL, 0, 0, '2026-01-20 12:47:00'),
(58, 138, 'storage/products/t4toPban5vScVSoDDIHW2oVEitKVAoXDK1sefqEU.png', NULL, 0, 0, '2026-01-20 12:49:07'),
(59, 138, 'storage/products/j4UUAlu1bD0JLymMpGM0tpJmq8FGfEcHhe8Otlti.png', NULL, 0, 0, '2026-01-20 12:49:16'),
(62, 76, 'storage/products/vQ2sxK3Clkf1NBBpmtLX4ioL5lnhgkVQgSichghd.png', NULL, 0, 0, '2026-01-20 12:53:57'),
(63, 76, 'storage/products/N1km5Owy1SrsLNo7MuwAlk9CAsWMNUitSDLBTFKk.png', NULL, 0, 0, '2026-01-20 12:54:06'),
(64, 99, 'storage/products/1ZjIMJXAyPy4he8HL8IBk0A4XykXUxkY1U04sr5o.png', NULL, 0, 0, '2026-01-20 12:58:10'),
(65, 99, 'storage/products/M6Eli0d1bEgrR9RSMVLnsBxPqsuBRcs8t4lh6yeX.png', NULL, 0, 0, '2026-01-20 12:58:17'),
(66, 68, 'storage/products/l1etG7VJMa8i3OcPLXKWLEn0DVtnuGMlTcYamFIV.png', NULL, 0, 0, '2026-01-20 13:04:16'),
(67, 68, 'storage/products/qq3HGOq1rkf5BocAlsFBgUYgSE3gSmBLsvOTvDqz.png', NULL, 0, 0, '2026-01-20 13:04:22'),
(68, 79, 'storage/products/VJAMzJWqXuFTZYpZPtyzibT53OacAOWH0LdjuQvn.png', NULL, 0, 0, '2026-01-20 13:06:53'),
(69, 79, 'storage/products/GoQgbX2bJcZsFUowxGYDAd9waT77Dz30BUboNL3O.png', NULL, 0, 0, '2026-01-20 13:07:04'),
(71, 226, 'storage/products/oBduNRTRkpE1FaRavrba6q4eGOjWH4DWnsJ7YcU9.png', NULL, 0, 0, '2026-01-20 13:35:25'),
(72, 227, 'storage/products/T0Niibcrvtt21hVflc0CurS5AXzFaIj7oAz8SLNy.png', NULL, 0, 0, '2026-01-20 13:38:08'),
(73, 227, 'storage/products/P9dxJa035SFtMN2rqhyxXgF96ODCM1rc8ilQcAQb.png', NULL, 0, 0, '2026-01-20 13:38:15'),
(74, 228, 'storage/products/0CAwnjWEx0y0jBwEDRSoyeam58H0YHXSZPGWVwkl.png', NULL, 0, 0, '2026-01-20 13:40:15'),
(75, 228, 'storage/products/edDi4Tkl5e1hC2Uj59tD2v4PDSPXYlRB1trJUbVw.png', NULL, 0, 0, '2026-01-20 13:40:22'),
(76, 198, 'storage/products/UfztHxqPzG5i2ZpBi0tA70B1VulDvgDLUnZ1siNz.png', NULL, 0, 0, '2026-01-20 13:42:06'),
(77, 198, 'storage/products/53JjHj4KWtc1p9zRE9TCuINXOvbCpsgdb1NwdJ7h.png', NULL, 0, 0, '2026-01-20 13:42:13'),
(78, 199, 'storage/products/RU6nOfJ7AQP4d7w2W7W0mUuATYtIPJoeghGH96eT.png', NULL, 0, 0, '2026-01-20 13:43:57'),
(79, 199, 'storage/products/2okFxbS9odpDA324QH9xRdM83PVFO9iGlcspmuvo.png', NULL, 0, 0, '2026-01-20 13:44:07'),
(80, 197, 'storage/products/yrm9J4NPeURKNFDtqbKsfxV0jnGwhasuXbBOvQou.png', NULL, 0, 0, '2026-01-20 13:44:26'),
(81, 197, 'storage/products/Rx2SGtx09c2iA65KkFlunwNiLG08qJMtXj2h1DVi.png', NULL, 0, 0, '2026-01-20 13:44:32'),
(84, 258, 'storage/products/5T9EwFrwUogIDEPRydlwQwFJ7hJB4BlxSanaYXcS.png', NULL, 0, 0, '2026-01-20 13:46:36'),
(85, 258, 'storage/products/fNhE1KVh5ea8CeV79EtloczRyfrg25fbd45VeAcI.png', NULL, 0, 0, '2026-01-20 13:46:44'),
(86, 259, 'storage/products/Xplz3wrGa25Q6FgsrXalwDhUvD2Ur6SBhZNSkTI2.png', NULL, 0, 0, '2026-01-20 13:47:10'),
(87, 259, 'storage/products/0Fg83MCQ5VlwBHGgF0MHboTkx1GfDWfRRVURwikH.png', NULL, 0, 0, '2026-01-20 13:47:16');

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
  `loai` enum('phan_tram','tien_mat') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_tri` decimal(12,2) NOT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `so_lan_da_dung` int DEFAULT '0',
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma_code` (`ma_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ma_giam_gia`
--

INSERT INTO `ma_giam_gia` (`id`, `ma_code`, `ten_chuong_trinh`, `mo_ta`, `loai`, `gia_tri`, `ngay_bat_dau`, `ngay_ket_thuc`, `so_lan_da_dung`, `hoat_dong`, `ngay_tao`) VALUES
(1, 'SALE10', 'Giảm 10%', 'Giảm giá 10% cho đơn hàng từ 500k', 'phan_tram', 10.00, '2025-12-01 00:00:00', '2025-12-31 00:00:00', 0, 1, '2025-12-05 18:04:06'),
(4, 'GIAM100K', NULL, NULL, 'tien_mat', 100000.00, '2026-01-20 00:00:00', '2026-01-21 00:00:00', 0, 1, '2026-01-20 08:02:59');

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
  `ho_ten` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` enum('nam','nu','khac') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` enum('super_admin','quan_li','nhan_vien','khach_hang') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'khach_hang',
  `trang_thai` enum('hoat_dong','khoa','cho_xac_thuc') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'hoat_dong',
  `diem_tich_luy` int DEFAULT '0',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `so_dien_thoai` (`so_dien_thoai`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `email`, `email_verified_at`, `so_dien_thoai`, `xac_thuc_sdt`, `mat_khau`, `ho_ten`, `avatar`, `ngay_sinh`, `gioi_tinh`, `vai_tro`, `trang_thai`, `diem_tich_luy`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 'admin@example.com', '2025-10-28 08:48:49', '0123456789', 1, '$2y$12$Ks.0hOF7KLHnw3UX/4Y89eA9MOCrzupel2P6EEzhXyybfvs7n9YOm', 'QL', NULL, '1990-01-01', 'nam', 'super_admin', 'hoat_dong', 0, '2025-10-28 08:48:49', '2025-11-19 17:34:46'),
(26, 'hiep2001@gmail.com', NULL, '18290830128', 0, '$2y$12$/doBuiX5UHLd0QpJLXzC6.JG0ZRQRS4lL.zEp70nIHu6wjemotgra', 'Hiep1234', NULL, '2025-11-27', 'nam', 'khach_hang', 'hoat_dong', 0, '2025-11-05 11:51:32', '2025-11-23 19:31:41'),
(27, 'hiep113@gmail.com', NULL, NULL, 0, '$2y$12$coO/0Lzy32jLkZgcpB75Nu9mFrBj2anniqHupwC3oEoiLRUYqMILm', 'HIEP', NULL, NULL, 'nu', 'quan_li', 'hoat_dong', 0, '2025-11-08 06:43:15', '2025-11-23 15:46:12'),
(28, 'hiepnhanvien@gmail.com', NULL, '8089103992', 0, '$2y$12$RUcYYXL6KIwUr3zTS/QwuezU8vhJYzYl/1EWSPZIF45EwlRuPIA8u', 'Hiệp nhân viên', NULL, NULL, 'nam', 'nhan_vien', 'hoat_dong', 0, '2025-11-23 15:48:35', '2026-01-20 00:33:38'),
(29, 'hiepne@gmail.com', NULL, NULL, 0, '$2y$12$7J0Geqp5ECHnbVPygoCagO5ndltRdcUntoORCOGefg6VITITUMPde', 'Hiep', NULL, NULL, NULL, 'khach_hang', 'hoat_dong', 0, '2025-12-18 17:35:53', '2025-12-18 17:35:53'),
(30, 'hinhtanhiep1810@gmail.com', NULL, NULL, 0, '$2y$12$S6WvcsOXMo1uINGESw/gT.aHpwXV.mngGTstC9oHiyXOsBXorzKmu', 'hinh tanh hiep', NULL, NULL, 'nam', 'khach_hang', 'hoat_dong', 0, '2025-12-18 19:57:09', '2026-01-05 14:20:09'),
(31, 'htruc2706@gmail.com', NULL, '129830912903', 0, '$2y$12$UrNZj5TzJ4ZMIA3G870GSeQ86gkhRu403HcYVk01cmTumvXWqhyPi', 'truc', NULL, NULL, NULL, 'khach_hang', 'hoat_dong', 0, '2025-12-27 07:02:39', '2025-12-27 07:03:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ma_sku` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_muc_id` int UNSIGNED DEFAULT NULL,
  `thuong_hieu_id` bigint UNSIGNED DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  KEY `thuong_hieu_id` (`thuong_hieu_id`),
  KEY `idx_hoatdong_noibat` (`hoat_dong`,`noi_bat`),
  KEY `idx_luotxem` (`luot_xem`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_sku`, `ten`, `danh_muc_id`, `thuong_hieu_id`, `mo_ta`, `gioi_tinh`, `thue`, `noi_bat`, `luot_xem`, `luot_ban`, `diem_trung_binh`, `so_luong_danh_gia`, `hoat_dong`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(46, 'A01', 'Samba OG', NULL, 2, NULL, 'unisex', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-17 13:05:43', '2026-01-20 12:59:49'),
(47, 'A02', 'Grand Court 2.0', NULL, 2, NULL, 'nam', 10.00, 1, 0, 0, 0.00, 0, 1, '2026-01-17 14:45:16', '2026-01-17 15:21:06'),
(49, 'A03', 'CLOUDFOAM FLEX RAPIDFIT SHOES', NULL, 2, NULL, 'nam', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-17 16:01:18', '2026-01-17 16:48:54'),
(50, 'A04', 'Barreda Shoes', NULL, 2, NULL, 'nam', 10.00, 1, 0, 0, 0.00, 0, 1, '2026-01-17 16:09:46', '2026-01-17 16:09:46'),
(51, 'A05', 'TOKYO MJ SHOES', NULL, 2, NULL, 'nu', 10.00, 1, 0, 0, 0.00, 0, 1, '2026-01-17 16:34:43', '2026-01-20 13:00:02'),
(52, 'A06', 'SL 72 OG SHOES', NULL, 2, NULL, 'nu', 10.00, 1, 0, 0, 0.00, 0, 1, '2026-01-17 16:45:44', '2026-01-20 12:20:23'),
(53, 'A07', 'VL Court Base', NULL, 2, NULL, 'unisex', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 12:20:05', '2026-01-20 12:23:39'),
(54, 'A08', 'HANDBALL SPEZIAL', NULL, 2, NULL, 'nu', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 12:21:36', '2026-01-20 13:03:07'),
(55, 'N01', 'Nike Air Force 1 \'07', NULL, 3, NULL, 'nam', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:11:20', '2026-01-20 13:12:36'),
(56, 'N02', 'NikeCourt Royale 2 Next Nature', NULL, 3, NULL, 'nam', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:12:25', '2026-01-20 13:12:42'),
(57, 'N03', 'Nike Vapor Pro 3', NULL, 3, NULL, 'nam', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:18:05', '2026-01-20 13:18:05'),
(58, 'N04', 'Nike Cortez Leather', NULL, 3, NULL, 'nu', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:21:33', '2026-01-20 13:21:33'),
(59, 'N05', 'Nike Air Force 1 \'07 Premium', NULL, 3, NULL, 'nu', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:22:36', '2026-01-20 13:22:36'),
(60, 'N06', 'Nike Air Superfly', NULL, 3, NULL, 'nu', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:24:34', '2026-01-20 13:24:34'),
(61, 'N07', 'Nike SB Force 58', NULL, 3, NULL, 'unisex', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:28:33', '2026-01-20 13:28:33'),
(62, 'N08', 'Nike Court Vision Low', NULL, 3, NULL, 'unisex', 10.00, 0, 0, 0, 0.00, 0, 1, '2026-01-20 13:29:02', '2026-01-20 13:29:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_toan`
--

DROP TABLE IF EXISTS `thanh_toan`;
CREATE TABLE IF NOT EXISTS `thanh_toan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `don_hang_id` bigint UNSIGNED NOT NULL,
  `loai_thanh_toan` enum('toan_bo','dat_coc','con_lai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'toan_bo',
  `phuong_thuc` enum('cod','vnpay') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cod',
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
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hoat_dong` tinyint(1) DEFAULT '1',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay_cap_nhat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `danh_muc_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thuonghieu_danhmuc` (`danh_muc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id`, `ten`, `logo`, `mo_ta`, `hoat_dong`, `ngay_tao`, `ngay_cap_nhat`, `danh_muc_id`) VALUES
(2, 'Adidas', 'images/brands/adidas.png', 'Thương hiệu giày thể thao nổi tiếng toàn cầu.', 1, '2025-11-08 22:50:24', '2025-11-12 20:38:25', NULL),
(3, 'Nike', 'storage/brands/fLw9jc3COz92m0IFf8clThsUIyI9AXJOlWkmD7oH.png', 'Thương hiệu giày thể thao từ Hoa Kỳ', 1, '2025-11-12 12:02:41', '2025-11-19 10:23:57', NULL);

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
  ADD CONSTRAINT `fk_sanpham_thuonghieu` FOREIGN KEY (`thuong_hieu_id`) REFERENCES `thuong_hieu` (`id`) ON DELETE RESTRICT;

--
-- Các ràng buộc cho bảng `thanh_toan`
--
ALTER TABLE `thanh_toan`
  ADD CONSTRAINT `fk_thanh_toan_don_hang` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD CONSTRAINT `fk_thuonghieu_danhmuc` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
