-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 03:38 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `task1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `n_id` int(11) NOT NULL,
  `v_username` varchar(255) NOT NULL,
  `v_password` varchar(255) NOT NULL,
  `v_fullname` varchar(255) NOT NULL,
  `d_birth_of_day` date NOT NULL,
  `v_avatar` varchar(255) DEFAULT NULL,
  `f_is_active` int(1) DEFAULT NULL COMMENT '0-Inactive | 1-Active | 2-Deleted',
  `d_created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `d_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`n_id`, `v_username`, `v_password`, `v_fullname`, `d_birth_of_day`, `v_avatar`, `f_is_active`, `d_created_time`, `d_updated_time`) VALUES
(83, 'None24099', 'thuqui', 'Võ văn thứ', '2001-12-19', 'img/1944414.jpg', 0, '2021-10-03 12:21:11', '2021-10-03 19:21:11'),
(88, 'Thuqui1995', 'Thuqui1995', 'Võ văn thứ', '1992-12-29', 'img/13237414.jpg', 0, '2021-10-03 12:21:05', '2021-10-03 19:21:05'),
(89, 'admin1', 'admin1', 'admin111111333333', '1991-10-29', 'img/3300014.jpg', 0, '2021-10-03 12:21:24', '2021-10-03 19:21:24'),
(90, 'admin2', 'admin1', 'admin1', '1002-12-29', 'img/38586914.jpg', 0, '2021-09-29 17:03:24', NULL),
(111, 'None24099', 'thuqui', 'Võ Văn Thứ', '1995-02-01', 'img/25969214.jpg', 0, '2021-10-03 12:15:00', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`n_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
