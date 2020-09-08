-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 02:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheaptoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 NOT NULL,
  `describe` varchar(800) CHARACTER SET utf8 NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `modalcode` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `describe`, `category`, `price`, `userID`, `modalcode`) VALUES
(1, 'One Piece เล่ม 1', 'sal.jpg', 'วันพีช เป็นเรื่องราวในยุคทองของโจรสลัด โจรสลัดทุกคนมีเป้าหมายเดียวกันคือเพื่อค้นหา สมบัติที่เรียกว่า \"วันพีช\" ซึ่งผู้ใดสามารถค้นหาและครอบครองวันพีชอยู่ ผู้นั้นก็คือเจ้าแห่งโจรสลัด(ราชาโจรสลัด) โดยผู้ที่เคยครอบครองวันพีชนั้นมีอยู่คนเดียวตามที่เปิดเผยคือ เจ้าแห่งโจรสลัด โกลด์ ดี โรเจอร์ ซึ่งหลังจากที่ ได้ครอบครองวันพีซแล้ว โกลด์ ดี โรเจอร์ก็ได้มอบตัว และยอมรับโทษการประหารชีวิตที่เกาะโร๊คบ้านเกิดของตนนั่นเอง ', 'ผจญภัย', 45, 1, 'nzaOW9jbPz'),
(43, 'นารูโตะ เล่มที่ 2', '1556708720.jpg', 'นินจานะจ้ะ ', 'ต่อสู้', 65, 1, 'AdtCMZkLIp'),
(44, 'Hunter x Hunter เล่มที่ 2', '1556780575.jpg', 'ฮันเตอร์ ที่ออกเดินทางไปทั่วโลก เพื่อปฎิบัติภาระกิจที่ยากและ อันตราย เพื่อเพิ่มลำดับของตัวเอง ', 'ผจญภัย', 45, 3, 'cUh1v6l30k'),
(45, 'ผู้กล้าโล่', '1556796255.jpg', 'โลกต่างมิติที่กำลังจะล่มสลายนั้น ได้อัญเชิญเรียกเหล่าผู้กล้าจากต่างมิติมาเพื่อปกป้องโลกและขัดเภทภัยให้หมดไป ผู้กล้าทั้งสี่ได้รับอาวุธประจำตัวคนละชิ้น ดาบ หอก ธนู ', 'ผจญภัย', 50, 5, 'mp3ytKdK4P'),
(47, 'Reborn ครูสอนพิเศษจอมป่วน เล่มที่ 1', '1556972987.jpg', 'มือสอง สภาพดี 99% ไม่ยับไม่ขาด ', 'ดราม่า', 60, 1, 'F3Evi9G8Eb'),
(51, 'SuperMan', '1557334842.jpg', 'เพราะผมรวย', 'ต่อสู้', 250, 5, 'qjj9cXyueT'),
(52, 'Freezing', '1557334899.jpg', 'Freezing', 'ต่อสู้', 60, 5, 'fnasqYey3c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(35) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebookUrl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realname` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `tel`, `facebookUrl`, `realname`) VALUES
(1, 'test', '12345', 'sitthidsn@gmail.com', '0917374500', 'https://www.facebook.com/sitthi.thammawong', 'สิทธิซ่า หัวหน้าแก๊ง'),
(2, 'big', '1150', 'bigstth14@gmail.com', '0917374500', 'https://www.facebook.com/sitthi.thammawong', 'ซันจิ'),
(3, 'admin', '1234567', 'admin@za.com', '0123456789', 'https://www.facebook.com/sitthi.thammawong', 'แอดมินนะจ้ะ อิอิ'),
(4, 'electronic', '123', 'ZA@gmail.com', '0812345678', 'https://www.facebook.com/sitthi.thammawong', 'Sitthi Thammawong'),
(5, 'Piyapon', '123456789', 'gogorotop5@hotmail.com', '0881459012', 'https://www.facebook.com/PiyaponUdomwong', 'ปิยพล อุดมวงษ์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
