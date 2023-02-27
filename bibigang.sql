-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2021 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bibigang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chiemdong`
--

CREATE TABLE `chiemdong` (
  `id` int(255) NOT NULL,
  `iding` int(255) NOT NULL,
  `diemdanh` int(255) NOT NULL,
  `bame` int(255) NOT NULL,
  `nongsan` int(11) NOT NULL,
  `chatcam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chiemdong`
--

INSERT INTO `chiemdong` (`id`, `iding`, `diemdanh`, `bame`, `nongsan`, `chatcam`) VALUES
(1, 24024, 0, 0, 0, 0),
(2, 30674, 0, 0, 0, 0),
(3, 21212, 0, 0, 0, 0),
(4, 1102, 0, 0, 0, 0),
(5, 22275, 0, 0, 0, 0),
(6, 6529, 0, 0, 0, 0),
(7, 13389, 0, 0, 0, 0),
(8, 23070, 0, 0, 0, 0),
(9, 8554, 0, 0, 0, 0),
(10, 13979, 0, 0, 0, 0),
(11, 2000, 0, 0, 0, 0),
(12, 14163, 0, 0, 0, 0),
(13, 16737, 0, 0, 0, 0),
(14, 40166, 0, 0, 0, 0),
(15, 36153, 0, 0, 0, 0),
(16, 2221, 0, 0, 0, 0),
(17, 35955, 0, 0, 0, 0),
(18, 30093, 0, 0, 0, 0),
(19, 40668, 0, 0, 0, 0),
(20, 40301, 0, 0, 0, 0),
(21, 35762, 0, 0, 0, 0),
(22, 40560, 0, 0, 0, 0),
(23, 25218, 0, 0, 0, 0),
(24, 28957, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemitem`
--

CREATE TABLE `diemitem` (
  `id` int(10) NOT NULL,
  `tenitem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemit` int(255) NOT NULL,
  `luuy` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemitem`
--

INSERT INTO `diemitem` (`id`, `tenitem`, `diemit`, `luuy`) VALUES
(1, 'cocain', 2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `iding` int(6) NOT NULL,
  `tening` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenthat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quequan` text COLLATE utf8_unicode_ci NOT NULL,
  `ngayvaogang` text COLLATE utf8_unicode_ci NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `iding`, `tening`, `chucvu`, `team`, `avatar`, `tenthat`, `namsinh`, `quequan`, `ngayvaogang`, `trn_date`) VALUES
(1, 24024, 'Carrot', '0', 'VIP', '', 'Lưu Quang Chương', '2001', '', '', '2021-10-15 15:05:25'),
(2, 30674, 'BiNgooo', '1', 'VIP', '', 'Bí Ngò', '2003', '', '', '2021-10-15 15:07:33'),
(3, 21212, 'Ken', '2', 'VIP', '', 'Khánh', '', '', '', '2021-10-15 15:07:54'),
(4, 1102, 'Mei Mei', '2', 'VIP', '', 'Minh', '', '', '', '2021-10-15 15:08:15'),
(5, 22275, 'Daddy', '2', 'VIP', '', '', '2001', '', '', '2021-10-15 15:08:31'),
(6, 6529, 'Ferb', '2', 'VIP', '', 'Đức Anh', '', '', '', '2021-10-15 15:08:54'),
(7, 13389, 'Phineas', '2', 'VIP', '', 'Tùng', '', '', '', '2021-10-15 15:09:16'),
(8, 23070, 'Anh Già', '2', 'VIP', '', 'Duy', '1989', '', '', '2021-10-15 15:09:33'),
(9, 8554, 'Hải AKa', '3', '1', '', 'Hải', '1995', '', '', '2021-10-15 15:10:06'),
(10, 13979, 'Tuấn Hii', '4', '1', '', 'Hoàng Minh Tuấn', '1999', '', '', '2021-10-15 15:10:38'),
(11, 2000, 'Min', '4', '1', '', 'Công', '2000', '', '', '2021-10-15 15:10:53'),
(12, 14163, 'Phương', '4', 'X', '', 'Đức Phương', '2002', '', '', '2021-10-15 15:11:49'),
(13, 16737, 'MC EAGLE', '4', 'X', '', 'Bùi Trần Phước Nguyên', '2002', '', '', '2021-10-15 15:12:05'),
(14, 40166, 'Ô Tân Vlog', '4', '1', '', 'Đặng Hồng Tân', '1995', '', '', '2021-10-15 15:12:20'),
(15, 5234, 'Bắc Gấu', '4', '1', '', 'Trương Văn Bắc', '1995', '', '', '2021-10-15 15:12:39'),
(16, 2221, 'Beo 10 Ngón', '4', '1', '', 'Võ Minh Vũ', '', '', '', '2021-10-15 15:13:21'),
(17, 35955, '2sickkk', '4', '2', '', 'Vĩ', '2003', '', '', '2021-10-15 15:14:40'),
(18, 30093, 'Quân', '4', '2', '', 'Quân', '1998', '', '', '2021-10-15 15:14:56'),
(19, 40668, 'Thiếu Gia', '4', '2', '', 'Sơn', '2004', '', '', '2021-10-15 15:15:58'),
(20, 40301, 'Cậu Cả An', '4', '1', '', 'An', '1987', '', '', '2021-10-15 15:16:16'),
(21, 35762, 'babynam', '4', '1', '', 'Nam', '2003', '', '', '2021-10-15 15:17:15'),
(22, 40560, 'L O U I S', '4', '1', '', 'Lê Đỗ Thành ', '1993', '', '', '2021-10-15 15:19:10'),
(23, 25218, 'JoeBiden Bịp', '4', '1', '', 'Tiến', '1995', '', '', '2021-10-15 15:19:40'),
(24, 28957, 'Ruby', '4', 'VIP', '', 'Nguyễn Phan Việt Dũng ', '1998', '', '', '2021-10-15 15:20:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `name_item`
--

CREATE TABLE `name_item` (
  `id` int(11) NOT NULL,
  `it_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `it_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `name_item`
--

INSERT INTO `name_item` (`id`, `it_name`, `show_name`, `img_item`, `it_data`) VALUES
(1, 'cocain', 'Cocain', '/img/coca.png', '2021-10-02'),
(2, 'mahoang', 'Ma Hoàng', '/img/mahoang.png', '2021-10-02'),
(3, 'cansa', 'Cần Sa', '/img/cansa.png', '2021-10-02'),
(4, 'anhtuc', 'Anh Túc', '/img/anhtuc.png', '2021-10-02'),
(5, 'thuocsung', 'Thuốc Súng', '/img/thuocsung.png', '0000-00-00'),
(6, 'tiening', 'Tiền ING', '/img/tiening.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `email`) VALUES
(1, '8554', '340ab11541b808d6c3c255beae81e34e', '2', 'hai@gmail.com'),
(3, 'anhgia', '28906770dd25136f95141602268c82fe', '2', 'hai@gmail.com'),
(4, '24024', '2d2d033fd0d735b715d58413ef6f457a', '2', 'hai@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vatpham`
--

CREATE TABLE `vatpham` (
  `id` int(255) NOT NULL,
  `iding` int(255) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sl` int(255) NOT NULL,
  `it_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vatpham`
--

INSERT INTO `vatpham` (`id`, `iding`, `item_name`, `item_sl`, `it_date`) VALUES
(8, 24024, 'mahoang', 20, '06:44:17 Tue-10-21'),
(9, 24024, 'anhtuc', 111, '06:48:12 Tue-10-21'),
(10, 24024, 'cocain', 112, '06:48:20 Tue-10-21'),
(11, 8554, 'cocain', 8, '06:48:20 Tue-10-21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chiemdong`
--
ALTER TABLE `chiemdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diemitem`
--
ALTER TABLE `diemitem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `name_item`
--
ALTER TABLE `name_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vatpham`
--
ALTER TABLE `vatpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chiemdong`
--
ALTER TABLE `chiemdong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `diemitem`
--
ALTER TABLE `diemitem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `name_item`
--
ALTER TABLE `name_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vatpham`
--
ALTER TABLE `vatpham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
