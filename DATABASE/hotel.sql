-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2021 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotel`
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
(1, 'admin', 'admin', 'Do Van Xuan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(11) NOT NULL,
  `name_hotel` text NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `place` text DEFAULT NULL,
  `soluongphong` int(11) DEFAULT NULL,
  `nhahang` tinyint(1) DEFAULT NULL,
  `phonghop` tinyint(1) DEFAULT NULL,
  `damcuoi` tinyint(1) DEFAULT NULL,
  `massage` tinyint(1) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name_hotel`, `phone`, `place`, `soluongphong`, `nhahang`, `phonghop`, `damcuoi`, `massage`, `mota`, `trangthai`, `img`) VALUES
(10, 'Bencoolen', '65-63360822', 'Singapore', 94, 1, 1, 1, 0, 'Chỉ cách Đường Orchard 3 phút đi bộ và cách Quảng trường Marina 5 phút lái xe.', 1, '1.jpg'),
(11, 'Selegie', '65-63456116', 'Rochor, Singapore', 130, 1, 1, 1, 1, 'Khách sạn này cách Trung tâm Mustafa 0,6 mi (1 km) và cách Khu mua sắm phố Bugis 0,7 mi (1,1 km).', 1, '2.jpg'),
(12, 'Park 22 Hotel Little India', '65-62917120', 'Little India, Singapore', 40, 0, 1, 0, 0, 'Cách Vườn bách thảo Gardens by the Bay và Sòng bạc Marina Bay Sands 10 phút lái xe.', 1, '3.jpg'),
(13, 'Heritage', '43-1232134', 'Lào', 43, 0, 1, 1, 0, 'Heritage ở trung tâm Lào, cách Haji Lane (Phố) 5 phút đi bộ.', 1, '4.jpg'),
(14, 'Khách Sạn FLC Quy Nhơn', '0388530075', 'Việt Nam', 96, 1, 0, 0, 1, 'Trải nghiệm chuyến nghỉ dưỡng đẳng cấp 5 sao tại đây.', 1, '5.jpg'),
(15, 'VinHolidays', '0388123126', 'Việt Nam', 67, 1, 1, 0, 0, 'vị trí ngay Grand World dễ đi lại tham quan vui chơi trong khu United Của Vin.', 1, '6.jpg'),
(16, 'Paos Sapa Leisure', '0388530004', 'Việt Nam', 97, 1, 1, 0, 1, 'Pao’s Sapa Leisure Hotel mang đến một chuyến nghỉ dưỡng nhẹ nhàng và thoải mái giữa một Sapa thơ mộng và trữ tình.', 1, '7.jpg'),
(17, 'Cam Ranh Resort', '038135345', 'Việt Nam', 68, 1, 0, 1, 1, 'Tọa lạc tại vị trí đẹp và sở hữu kiến trúc tinh tế, khu resort cao cấp', 1, '8.jpg'),
(18, 'Vinpearl Discovery', '073242523', 'Mông Cổ', 57, 0, 1, 0, 0, 'Sở hữu nhiều khu biệt thự nghỉ dưỡng sang trọng và cao cấp', 1, '9.jpg'),
(19, 'Sunset Sanato Phú Quốc Hotel', '038853234', 'Việt Nam', 66, 1, 0, 0, 0, 'Buffet sáng hàng ngày được thiết kế với nhiều món ăn đa dạng và thực đơn hấp dẫn\r\n', 1, '10.jpg'),
(20, 'Silk Path Grand Sapa Resort', '064367423', 'Việt Nam', 44, 1, 0, 0, 1, 'Ẩn mình trên ngọn đồi đẹp như tranh vẽ', 1, '11.jpg'),
(21, 'Resort Sài Gòn Côn Đảo', '0483453', 'Việt Nam', 40, 1, 1, 1, 1, 'Miễn phí đưa đón sân bay/cảng theo lịch trình của resort', 1, '12.jpg'),
(22, 'Love Pik', '23124366', 'Ấn Độ', 42, 1, 1, 1, 1, 'Ngay cạnh ven biển đầy sóng và gió.', 1, '13.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `tenkhach` text DEFAULT NULL,
  `gmail` varchar(100) NOT NULL,
  `hotel_name` text NOT NULL,
  `ngaydat` date DEFAULT NULL,
  `ngayketthuc` date DEFAULT NULL,
  `yeucau` text DEFAULT NULL,
  `chiphi` double DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel_info` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
