-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 06:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `bid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `bdate` datetime DEFAULT current_timestamp(),
  `stage` int(11) DEFAULT 0,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `pic`) VALUES
('ของตกแต่ง', 'https://content.shopback.com/th/wp-content/uploads/2019/01/20133115/2.2.jpg'),
('อุปกรณ์ครัวและเครื่องใช้บนโต๊ะอาหาร', 'https://www.29shopping.com/img/cms/01_Kitchen.jpg'),
('อุปกรณ์จัดเก็บของใช้', 'https://www.furnitmall.com/wp-content/uploads/2020/01/12990669384_319360426.jpg'),
('อุปกรณ์ซักรีดและทำความสะอาด', 'https://s.isanook.com/wo/0/rp/r/w850/ya0xa0m1w0/aHR0cHM6Ly9zLmlzYW5vb2suY29tL3dvLzAvdWQvNDIvMjExOTQ1LzIxMTk0NS10aHVtYm5haWwuanBn.jpg'),
('เครื่องใช้ไฟฟ้า', 'https://www.scglogistics.co.th/wp-content/uploads/2021/03/SCG-Blog-2-Image-2-min-1500x1000.jpg'),
('เฟอร์นิเจอร์', 'https://files.vogue.co.th/uploads/ccbb2e922e5692376f22c90a6df3cc22.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `dlim` int(11) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `category`, `qty`, `dlim`, `cost`, `des`, `pic`, `price`) VALUES
(0, 'โต๊ะทำงาน', 'เฟอร์นิเจอร์', 10, 30, 79, 'LINNMON ลินมูน / ADILS อดิลส์, โต๊ะทำงาน  สีไวท์โอ๊ค/ดำ  100x60 ซม. เจาะรูไว้แล้ว เพื่อให้ประกอบขาโต๊ะได้ง่าย\nขาโต๊ะหมุนปรับได้ ให้โต๊ะสูงได้ระดับเดียวกันบนพื้นที่ไม่เรียบ', 'https://www.ikea.com/th/th/images/products/linnmon-adils-desk-white-stained-oak-effect-black__0977193_pe813435_s5.jpg?f=s', 790),
(1, 'โซฟา', 'เฟอร์นิเจอร์', 5, 30, 599, 'KLIPPAN คลิปปัน,  โซฟา2ที่นั่ง  วิสเล่ เทา  นุ่ม  ผ้าหุ้มซักได้', 'https://www.ikea.com/th/th/images/products/klippan-2-seat-sofa-vissle-grey__0820948_pe709146_s5.jpg?f=s', 5990),
(2, 'โต๊ะ', 'เฟอร์นิเจอร์', 5, 30, 179, 'LACK ลัค, โต๊ะขนาดกลาง น้ำตาลดำ 118x78 ซม.', 'https://www.ikea.com/th/th/images/products/lack-coffee-table-black-brown__57537_pe163119_s5.jpg?f=xl', 1790),
(3, 'เก้าอี้', 'เฟอร์นิเจอร์', 5, 30, 159, 'ELDBERGET เอลด์เบเรียต / MALSKÄR มัลแควร์,\r\nเก้าอี้หมุน  เบจ/ดำ', 'https://www.ikea.com/th/th/images/products/eldberget-malskaer-swivel-chair-beige-black__0814556_pe772637_s5.jpg?f=s', 1590),
(4, 'เบาะรองนั่ง', 'เฟอร์นิเจอร์', 10, 30, 19, 'PYNTEN พินเทน,\r\nเบาะรองนั่ง  เทาเข้ม  41x43 ซม.', 'https://www.ikea.com/th/th/images/products/pynten-seat-pad-dark-grey__0805853_pe769702_s5.jpg?f=s', 190),
(5, 'ตู้หนังสือ', 'เฟอร์นิเจอร์', 5, 30, 199, 'BILLY บิลลี่,\r\nตู้หนังสือ  ลายไม้โอ๊ค  80x28x106 ซม.', 'https://www.ikea.com/th/th/images/products/billy-bookcase-oak-effect__1097104_pe864732_s5.jpg?f=s', 1990),
(6, 'ตู้หนังสือ', 'เฟอร์นิเจอร์', 5, 30, 79, 'BAGGEBO บักเกบู,\r\nตู้หนังสือ  สีขาว  50x25x160 ซม.', 'https://www.ikea.com/th/th/images/products/baggebo-bookcase-white__0981552_pe815388_s5.jpg?f=s', 790),
(7, 'กล่องใส่ของ', 'อุปกรณ์จัดเก็บของใช้', 10, 30, 5, 'SOCKERBIT ซอคเกร์บิต,\r\nกล่องใส่ของ  สีขาว  19x26x15 ซม.', 'https://www.ikea.com/th/th/images/products/sockerbit-box-white__0910335_pe625947_s5.jpg?f=s', 50),
(8, 'กล่องใส่ของ', 'อุปกรณ์จัดเก็บของใช้', 10, 30, 12, 'SOCKERBIT ซอคเกร์บิต,\r\nกล่องพร้อมฝาปิด  สีขาว  38x25x15 ซม.', 'https://www.ikea.com/th/th/images/products/sockerbit-box-with-lid-white__0711181_pe728050_s5.jpg?f=s', 120),
(9, 'เก้าอี้', 'เฟอร์นิเจอร์', 5, 30, 899, 'STYRSPEL สตีร์สเปียล์,\r\nเก้าอี้สำหรับเล่นเกม  เทาเข้ม/เทา', 'https://www.ikea.com/th/th/images/products/styrspel-gaming-chair-dark-grey-grey__1115362_pe872046_s5.jpg?f=xl', 8990);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) DEFAULT NULL,
  `tel` varchar(12) NOT NULL,
  `firstlogin` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `sid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT 'user',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `bid` (`bid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD KEY `id` (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD KEY `sid` (`sid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `item` (`id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `supply_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
