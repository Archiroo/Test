-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 05:45 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `directory`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_employees`
--

CREATE TABLE `db_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `emp_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_employees`
--

INSERT INTO `db_employees` (`emp_id`, `emp_name`, `emp_phone`, `emp_address`, `office_id`, `emp_image`) VALUES
(1, 'Nguyễn Minh Đức', '092 1111111', 'Hoa Lư, Ninh Bình', 1, 'anh_1.jpg'),
(2, 'Hồ Hồng Quân', '092 2222222', 'Quỳnh Lưu, Nghệ An', 3, 'anh_2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_office`
--

CREATE TABLE `db_office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_office`
--

INSERT INTO `db_office` (`office_id`, `office_name`, `office_phone`, `office_address`, `office_parent`) VALUES
(1, 'Khoa CNTT', '012 1111111', 'Nhà C1, Đại học Thủy Lợi', NULL),
(2, 'Khoa Kinh Tế', '012 2222222', 'Nhà B1, Đại học Thủy Lợi', NULL),
(3, 'Khoa Cơ Khí', '012 3333333', 'Nhà A2, Đại học Thủy Lợi', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user`
--

CREATE TABLE `db_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_user`
--

INSERT INTO `db_user` (`user_id`, `user_name`, `user_email`, `user_pass`, `status`, `user_code`) VALUES
(1, 'archiro', 'abc@gmail.com', '12345', 0, ''),
(2, 'abc', 'dec@gmail.com', '12345', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `office_id` (`office_id`);

--
-- Chỉ mục cho bảng `db_office`
--
ALTER TABLE `db_office`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `office_parent` (`office_parent`);

--
-- Chỉ mục cho bảng `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_office`
--
ALTER TABLE `db_office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `db_user`
--
ALTER TABLE `db_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_employees`
--
ALTER TABLE `db_employees`
  ADD CONSTRAINT `db_employees_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `db_office` (`office_id`);

--
-- Các ràng buộc cho bảng `db_office`
--
ALTER TABLE `db_office`
  ADD CONSTRAINT `db_office_ibfk_1` FOREIGN KEY (`office_parent`) REFERENCES `db_office` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
