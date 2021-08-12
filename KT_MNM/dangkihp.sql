-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2021 lúc 04:40 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dangkihp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(20) NOT NULL,
  `mamon` varchar(20) NOT NULL,
  `soluongsv` int(11) NOT NULL,
  `soluongdk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`malop`, `mamon`, `soluongsv`, `soluongdk`) VALUES
('lh1', 'mh1', 80, 0),
('lh2', 'mh2', 80, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamon` varchar(20) NOT NULL,
  `tenmon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamon`, `tenmon`) VALUES
('mh1', 'Toán cao cấp'),
('mh2', 'Lập trình căn bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendn` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `loaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tendn`, `matkhau`, `loaitk`) VALUES
('sinhvien1', 'sinhvien1', 0),
('sinhvien2', 'sinhvien2', 0),
('sinhvien3', 'sinhvien3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_lop`
--

CREATE TABLE `taikhoan_lop` (
  `tendn` varchar(20) NOT NULL,
  `malop` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`,`mamon`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `masinhvien` (`soluongdk`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamon`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendn`);

--
-- Chỉ mục cho bảng `taikhoan_lop`
--
ALTER TABLE `taikhoan_lop`
  ADD PRIMARY KEY (`tendn`,`malop`),
  ADD KEY `malop` (`malop`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`mamon`) REFERENCES `monhoc` (`mamon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan_lop`
--
ALTER TABLE `taikhoan_lop`
  ADD CONSTRAINT `taikhoan_lop_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_lop_ibfk_2` FOREIGN KEY (`tendn`) REFERENCES `taikhoan` (`tendn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
