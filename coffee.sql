-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 01:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `action_log` varchar(15) NOT NULL,
  `des_log` varchar(100) NOT NULL,
  `date_log` datetime NOT NULL,
  `user_log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `action_log`, `des_log`, `date_log`, `user_log`) VALUES
(41, 'เพิ่มข้อมูล', 'เนื้อหมู', '2021-02-16 11:07:38', 'Mr. Thanawee'),
(42, 'เพิ่มข้อมูล', 'เนื้อหมู', '2021-02-16 11:08:59', 'Mr. Thanawee'),
(43, 'เพิ่มข้อมูล', 'เนื้อหมา', '2021-02-16 11:22:56', 'Mr. Thanawee'),
(44, 'เพิ่มข้อมูล', 'เนื้อควาย', '2021-02-16 11:29:11', 'Mr. Thanawee'),
(45, 'เพิ่มข้อมูล', 'ผงกัญชา', '2021-02-16 11:29:37', 'Mr. Thanawee'),
(46, 'เพิ่มข้อมูล', 'ผงกัญชา', '2021-02-16 11:31:14', 'Mr. Thanawee'),
(47, 'เพิ่มข้อมูล', 'sadasd', '2021-02-16 13:03:05', 'Mr. Thanawee'),
(48, 'เพิ่มข้อมูล', 'df', '2021-02-16 13:03:33', 'Mr. Thanawee'),
(49, 'เพิ่มข้อมูล', 'dfdf', '2021-02-16 13:03:54', 'Mr. Thanawee'),
(50, 'เพิ่มข้อมูล', 'นมผงเคด่วย', '2021-02-16 13:05:56', 'Mr. Thanawee'),
(51, 'เพิ่มข้อมูล', 'นมผงเคโคตรด่วย', '2021-02-16 13:08:22', 'Mr. Thanawee'),
(52, 'เปลี่ยนสถานะ', 'นมเย็น เป็น [status] = 2', '2021-02-16 13:42:52', 'Mr. Thanawee'),
(53, 'เปลี่ยนสถานะ', 'นมเย็น เป็น [status] = 1', '2021-02-16 15:04:46', 'Mr. Thanawee');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `id_login` varchar(20) NOT NULL,
  `password_login` varchar(20) NOT NULL,
  `name_login` varchar(30) NOT NULL,
  `phone_login` varchar(30) NOT NULL,
  `status_login` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `id_login`, `password_login`, `name_login`, `phone_login`, `status_login`) VALUES
(1, 'admin', 'admin', 'ADMIN!!', '0584441622', 'admin'),
(2, 'user', 'user', 'USER!!', '0815845563', 'user'),
(3, 'thanawee321', 'thanawee123', 'Mr. Thanawee', '0895480672', 'admin'),
(4, 'popmod321', 'popmod123', 'MO!!', '0985653241', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `material_coffee`
--

CREATE TABLE `material_coffee` (
  `id_mat_coffee` int(11) NOT NULL,
  `name_mat_coffee` varchar(50) NOT NULL,
  `have_qty_mat_coffee` double NOT NULL,
  `use_qty_mat_coffee` double NOT NULL,
  `total_qty_mat_coffee` double NOT NULL,
  `unit_mat_coffee` varchar(15) NOT NULL,
  `id_status_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_coffee`
--

INSERT INTO `material_coffee` (`id_mat_coffee`, `name_mat_coffee`, `have_qty_mat_coffee`, `use_qty_mat_coffee`, `total_qty_mat_coffee`, `unit_mat_coffee`, `id_status_mat`) VALUES
(1, 'นมสด', 10, 5, 5, 'กระป๋อง', 1),
(2, 'น้ำตาล', 0, 1, 0, 'กิโลกรัม', 2),
(3, 'ผงกาแฟ', 20, 3, 17, 'กิโลกรัม', 1),
(4, 'คอฟฟี่เมท', 3, 0.5, 2.5, 'กิโลกรัม', 1),
(5, 'ผงกัญชา', 5, 2, 3, 'ห่อ', 1),
(6, 'นมผง', 10, 5, 5, 'ถุง', 1),
(7, 'ผงกัญชา', 3, 2, 1, 'ห่อ', 1),
(8, 'นมผงเคด่วย', 16, 3, 13, 'ขวด', 1),
(9, 'นมผงเคโคตรด่วย', 4, 2, 2, 'ถุง', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material_food`
--

CREATE TABLE `material_food` (
  `id_mat_food` int(11) NOT NULL,
  `name_mat_food` varchar(50) NOT NULL,
  `have_qty_mat_food` double NOT NULL,
  `use_qty_mat_food` double NOT NULL,
  `total_qty_mat_food` int(11) NOT NULL,
  `unit_mat_food` varchar(15) NOT NULL,
  `id_status_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_food`
--

INSERT INTO `material_food` (`id_mat_food`, `name_mat_food`, `have_qty_mat_food`, `use_qty_mat_food`, `total_qty_mat_food`, `unit_mat_food`, `id_status_mat`) VALUES
(1, 'น่องไก่', 15, 3, 12, 'ชิ้น', 1),
(2, 'เส้นสปาเก็ตตี้', 5, 1, 4, 'ห่อ', 1),
(3, 'หมูแฮม', 3, 2, 1, 'ถุง', 1),
(4, 'พริกไท', 3, 3, 0, 'ขวด', 2),
(5, 'เนื้อหมู', 5, 3, 2, 'อัน', 1),
(8, 'เนื้อหมา', 45, 5, 40, 'อัน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `name_member` varchar(30) NOT NULL,
  `sur_member` varchar(30) NOT NULL,
  `phone_member` varchar(15) NOT NULL,
  `point_member` double NOT NULL,
  `status_member` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `name_member`, `sur_member`, `phone_member`, `point_member`, `status_member`) VALUES
(1, 'ไก่กา', 'อาลาเล่ย์', '0875983164', 0, 'vip');

-- --------------------------------------------------------

--
-- Table structure for table `product_coffee`
--

CREATE TABLE `product_coffee` (
  `id_product` int(11) NOT NULL,
  `coffee_product` varchar(50) NOT NULL,
  `hot_price` float NOT NULL,
  `ice_price` float NOT NULL,
  `id_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_coffee`
--

INSERT INTO `product_coffee` (`id_product`, `coffee_product`, `hot_price`, `ice_price`, `id_status`) VALUES
(1, 'คาปูชิโน่ ไรโน่ 2 สี', 50, 68, 2),
(3, 'นมเย็น', 0, 15, 1),
(4, 'เอสเปสโส', 50, 55, 2),
(5, 'ม็อกค่า', 40, 50, 1),
(6, 'อเมริกาโน่', 45, 50, 1),
(7, 'ลาเต้', 40, 50, 1),
(8, 'มัคคิอาโต้', 55, 60, 2),
(9, 'เฟร้บเป้', 60, 65, 2),
(10, 'อัฟโฟกาโต', 50, 60, 1),
(25, 'เอสเปสโส', 45, 45, 2),
(41, 'เอสเปสโส', 78, 78, 1),
(42, 'ชาโบราณ', 25, 40, 1),
(45, 'โกโก้', 25, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_food`
--

CREATE TABLE `product_food` (
  `id_product_food` int(11) NOT NULL,
  `food_product` varchar(30) NOT NULL,
  `food_price` double NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_food`
--

INSERT INTO `product_food` (`id_product_food`, `food_product`, `food_price`, `id_status`) VALUES
(1, 'นักเก็ตไก่ ไม้หมุน', 35, 1),
(2, 'เฟรนฟราย์', 20, 1),
(3, 'ไก่ทอด', 50, 1),
(4, 'ข้าวผัดอเมริกัน', 40, 1),
(5, 'ยำรวมมิตร ไชบรรชา', 55, 1),
(6, 'ลูกชิ้นทอด', 40, 1),
(7, 'ลาบหมู', 55, 1),
(8, 'ยำถั่วอัลม่อน', 70, 1),
(9, 'ลาบหมานรก', 95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_coffee`
--

CREATE TABLE `status_coffee` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_coffee`
--

INSERT INTO `status_coffee` (`id_status`, `status`) VALUES
(1, 'Online'),
(2, 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `status_material`
--

CREATE TABLE `status_material` (
  `id_status_mat` int(11) NOT NULL,
  `status_mat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_material`
--

INSERT INTO `status_material` (`id_status_mat`, `status_mat`) VALUES
(1, 'มีของ'),
(2, 'หมด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_coffee`
--
ALTER TABLE `material_coffee`
  ADD PRIMARY KEY (`id_mat_coffee`);

--
-- Indexes for table `material_food`
--
ALTER TABLE `material_food`
  ADD PRIMARY KEY (`id_mat_food`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `product_coffee`
--
ALTER TABLE `product_coffee`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_food`
--
ALTER TABLE `product_food`
  ADD PRIMARY KEY (`id_product_food`);

--
-- Indexes for table `status_coffee`
--
ALTER TABLE `status_coffee`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_material`
--
ALTER TABLE `status_material`
  ADD PRIMARY KEY (`id_status_mat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material_coffee`
--
ALTER TABLE `material_coffee`
  MODIFY `id_mat_coffee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `material_food`
--
ALTER TABLE `material_food`
  MODIFY `id_mat_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_coffee`
--
ALTER TABLE `product_coffee`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_food`
--
ALTER TABLE `product_food`
  MODIFY `id_product_food` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_coffee`
--
ALTER TABLE `status_coffee`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_material`
--
ALTER TABLE `status_material`
  MODIFY `id_status_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
