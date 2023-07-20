-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2023 lúc 02:54 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nowfoodd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `taikhoan`, `matkhau`, `hoten`) VALUES
(1, 'admin', 'admin', 'Hưng Nguyễn'),
(2, 'admin1', 'admin1', 'Vũ Trung Quyền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `id_send` int(10) NOT NULL,
  `id_rec` int(10) NOT NULL,
  `messg` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `id_dh` int(10) NOT NULL,
  `ten_monan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(10) NOT NULL,
  `ten_ngd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `diachi` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongtien` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nd` int(11) NOT NULL,
  `id_nhahag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `ten_ngd`, `ngaydat`, `diachi`, `sdt`, `tongtien`, `id_nd`, `id_nhahag`) VALUES
(1, 'vũ', '2023-04-13', 'dfgdsg', '4578658', '40000', 11, 1),
(2, 'hải', '2023-04-13', 'sdfsdf', '546486', '141000', 11, 1),
(3, 'Vũ Trung Quyền', '2023-04-13', '62 Thanh Trì', '033778866', '140000', 14, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `id_monan` int(10) NOT NULL,
  `id_nh` int(10) NOT NULL,
  `ten_monan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`id_monan`, `id_nh`, `ten_monan`, `gia`, `mota`, `img`, `duyet`) VALUES
(10, 1, 'Mì trộn Indomi', '35000', 'Mì trộn Indomi', '3.jpg', 1),
(19, 1, 'Trà Sữa Royal tea', '35000', 'Trà Sữa Ngon', '4.jpg', 1),
(27, 1, 'Bún Bò Huế', '40000', 'Bún Bò Huế', '10.jpg', 1),
(28, 1, 'Viên Phô Mai', '20000', 'Viên Phô Mai', '7.jpg', 1),
(29, 1, 'Pizza Phô Mai', '35000', 'Pizza Phô Mai Ngon', '2.jpg', 0),
(30, 1, 'Bún Đậu Mắm Tôm', '35000', 'Bún Đậu Mắm Tôm', '9.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_nhahang`
--

CREATE TABLE `tk_nhahang` (
  `id` int(10) NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk_nhahang`
--

INSERT INTO `tk_nhahang` (`id`, `gmail`, `password`) VALUES
(1, 'vtq@gmail.com', '123'),
(2, 'vtd@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tt_nhahang`
--

CREATE TABLE `tt_nhahang` (
  `id_nhahg` int(10) NOT NULL,
  `ten_nhahg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_nhahg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tt_nhahang`
--

INSERT INTO `tt_nhahang` (`id_nhahg`, `ten_nhahg`, `sdt`, `email`, `diachi`, `chu_nhahg`) VALUES
(1, 'Cơm sườn nướng', '0996013030', 'vtq@gmail.com', '63 Tan triều', 'quyen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tt_user`
--

CREATE TABLE `tt_user` (
  `id_ngd` int(10) NOT NULL,
  `ten_ngd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `code` varchar(100) NOT NULL,
  `phonenumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `gmail`, `password`, `status`, `code`, `phonenumber`) VALUES
(10, 'koykk2011@gmail.com', '$2y$10$/EfVesxtHBfaFdlBkziw/uz1gd5ErplQptaY3PKxKS4j.69LWsXU6', 0, '360', NULL),
(11, 'vutrungkhoang@gmail.com', '$2y$10$97y6Ymg6S9P4N1MWIsPZWez5fh8ZvFSnGHGxMk8xfJHmbDUcQSYO.', 1, '940', NULL),
(14, 'vtquyen2k1@gmail.com', '$2y$10$Q3vDG6t2OgNTOocqpmFIV.9Qi4NG1NhmcMg8YC0nT/4aV.PkED6yS', 1, '758', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD KEY `id_dh` (`id_dh`),
  ADD KEY `id_mn` (`id_mn`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `id_nhahag` (`id_nhahag`),
  ADD KEY `id_nd` (`id_nd`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id_monan`),
  ADD KEY `id_nh` (`id_nh`);

--
-- Chỉ mục cho bảng `tk_nhahang`
--
ALTER TABLE `tk_nhahang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tt_nhahang`
--
ALTER TABLE `tt_nhahang`
  ADD KEY `id_nhahg` (`id_nhahg`);

--
-- Chỉ mục cho bảng `tt_user`
--
ALTER TABLE `tt_user`
  ADD KEY `id_ngd` (`id_ngd`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `id_monan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tk_nhahang`
--
ALTER TABLE `tk_nhahang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `id_dh` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_mn` FOREIGN KEY (`id_mn`) REFERENCES `monan` (`id_monan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `id_nd` FOREIGN KEY (`id_nd`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_nhahag` FOREIGN KEY (`id_nhahag`) REFERENCES `tk_nhahang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `id_nh` FOREIGN KEY (`id_nh`) REFERENCES `tk_nhahang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tt_nhahang`
--
ALTER TABLE `tt_nhahang`
  ADD CONSTRAINT `id_nhahg` FOREIGN KEY (`id_nhahg`) REFERENCES `tk_nhahang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tt_user`
--
ALTER TABLE `tt_user`
  ADD CONSTRAINT `id_ngd` FOREIGN KEY (`id_ngd`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
