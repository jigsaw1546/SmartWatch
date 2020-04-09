-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 เม.ย. 2020 เมื่อ 07:43 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwatch`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `cart_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `members`
--

CREATE TABLE `members` (
  `mem_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `mem_fname` varchar(40) NOT NULL COMMENT 'ชื่อ',
  `mem_lname` varchar(40) NOT NULL COMMENT 'นามสกุล',
  `mem_email` varchar(80) NOT NULL COMMENT 'อีเมลล์',
  `mem_tel` varchar(10) NOT NULL COMMENT 'เบอร์',
  `mem_address` varchar(100) NOT NULL COMMENT 'ที่อยู่',
  `mem_username` varchar(30) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `mem_password` varchar(60) NOT NULL COMMENT 'รหัสผ่าน',
  `mem_create_at` varchar(15) NOT NULL,
  `mem_status` enum('admin','personnel','user') NOT NULL DEFAULT 'user' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `members`
--

INSERT INTO `members` (`mem_id`, `mem_fname`, `mem_lname`, `mem_email`, `mem_tel`, `mem_address`, `mem_username`, `mem_password`, `mem_create_at`, `mem_status`) VALUES
(1, 'demo', 'demo', 'demo@demo.com', '0814567899', '1001/32 Thailand', 'demo', '$2y$10$OsBJKA6tkMFg4LZ7hUy89.B.pi1jVcJAApi5UoXPWfqWPe8JQ9xdy', '2020-04-08', 'user'),
(2, 'admin', 'admin', 'admin@admin.com', '0894969999', '-', 'admin', '$2y$10$1Psji12WhAwbKQ8YYgIXL.CW8kRXKRt9fG6ORTWTU2hPZdeLBWQem', '2020-04-08', 'user');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL COMMENT 'รหัสข่าว',
  `new_title` varchar(30) NOT NULL COMMENT 'หัวข้อข่าว',
  `new_image` varchar(100) NOT NULL COMMENT 'รูปข่าว',
  `new_date` date NOT NULL COMMENT 'วันที่ลงข่าว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_image`, `new_date`) VALUES
(1, 'new 出来', '15818806584306.png', '2020-02-18'),
(2, 'xs', '15818815805616.png', '2020-02-18');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `order_shipping` varchar(2) NOT NULL,
  `price_total` int(8) NOT NULL,
  `order_status` int(1) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `payment_file` varchar(100) NOT NULL,
  `payment_price` varchar(10) NOT NULL,
  `payment_bank` varchar(50) NOT NULL,
  `payment_Detail` text NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `payment_status` enum('ตรวจสอบ','ชำระเรียบร้อย') NOT NULL DEFAULT 'ตรวจสอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_detail` varchar(500) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_tag` varchar(30) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_image`, `product_code`, `product_price`, `product_tag`, `product_date`) VALUES
(1, 'Galaxy Watch 42mm eSim GOLD', 'สะท้อนตัวตน\r\nเลือกเปลี่ยนสาย Galaxy Watch ได้ตามต้องการ เพื่อให้เข้ากับการแต่งกายหรืออารมณ์ของคุณก่อนออกจากบ้าน นอกจากนี้ ยังสามารถเลือกสายนาฬิกาแบบซิลิโคนน้ำหนักเบาที่มีมาให้ หรือจะจับคู่กับสายนาฬิกาที่คุณชื่นชอบก็ทำได้ ด้วยขนาดมาตรฐาน 20 มม. สำหรับนาฬิการุ่นหน้าปัด 42 มม. หรือ เลือกสายนาฬิการขนาด 22 มม. สำหรับนาฬิการุ่นหน้าปัด 46 มม', '15806692336213.webp', 'SM-R815FZD', 11900.00, 'Sumsung', '2020-02-04'),
(2, 'Galaxy Watch 42mm eSim BLACK', 'สะท้อนตัวตน เลือกเปลี่ยนสาย Galaxy Watch ได้ตามต้องการ เพื่อให้เข้ากับการแต่งกายหรืออารมณ์ของคุณก่อนออกจากบ้าน นอกจากนี้ ยังสามารถเลือกสายนาฬิกาแบบซิลิโคนน้ำหนักเบาที่มีมาให้ หรือจะจับคู่กับสายนาฬิกาที่คุณชื่นชอบก็ทำได้ ด้วยขนาดมาตรฐาน 20 มม. สำหรับนาฬิการุ่นหน้าปัด 42 มม. หรือ เลือกสายนาฬิการขนาด 22 มม. สำหรับนาฬิการุ่นหน้าปัด 46 มม\r\n\r\n', '15806743187180.webp', 'SM-R815FZK', 12000.00, 'Sumsung', '2020-02-04'),
(3, 'Galaxy Watch Active 2 Stainles', 'มีการขยายพื้นที่บนหน้าจอ Galaxy Watch Active 2 ให้ใหญ่ขึ้นและออกแบบตัวเรือนให้เข้ากับหน้าจอ อีกทั้งหน้าจอเป็นระบบสัมผัส\r\nและเป็นสีดำสนิท ช่วยให้สั่งการควบคุมได้อย่างเร็ว (Quick Control) และให้คุณมองเห็นข้อมูลได้ชัดเจน', '15818448311797.webp', 'SM-R830NSD', 11900.00, 'Sumsung', '2020-02-18'),
(4, 'Galaxy Watch Active 2 Stainles', 'มีการขยายพื้นที่บนหน้าจอ Galaxy Watch Active 2 ให้ใหญ่ขึ้นและออกแบบตัวเรือนให้เข้ากับหน้าจอ อีกทั้งหน้าจอเป็นระบบสัมผัส\r\nและเป็นสีดำสนิท ช่วยให้สั่งการควบคุมได้อย่างเร็ว (Quick Control) และให้คุณมองเห็นข้อมูลได้ชัดเจน', '15818449412302.webp', 'SM-R835FSK', 12900.00, 'Sumsung', '2020-02-18'),
(5, 'Samsung galaxy fit  black', 'ผลักดันตัวเองให้มากขึ้นไปอีกยามที่คุณตั้งเป้าหมายการออกกำลังกาย Galaxy Fit สามารถกันน้ำได้ถึง 5ATM* คุณสามารถใส่มันออกกำลังกายในที่แจ้งได้โดยไม่ต้องกลัวว่าฝนอีกต่อไป', '15818450148687.webp', 'SM-R370NZK', 3290.00, 'Sumsung', '2020-02-18'),
(6, 'Galaxy Watch 46mm eSim', 'หน้าปัดนาฬิกาทำงานตลอดเวลาแม้ไม่ต้องกดปุ่มหรือหมุนขอบหน้าปัดของ Galaxy Watch โดยตั้งค่าจอ AMOLED ให้หน้าปัดทำงานตลอดเวลา เพื่อให้คุณดูเวลาได้เสมอทั้งกลางวันและกลางคืน', '15818451381012.webp', 'SM-R805FZS', 12900.00, 'Sumsung', '2020-02-18'),
(7, 'Apple Watch Series 4 Gold', 'จอภาพ Retina แบบติดตลอด\r\nคุณไม่จำเป็นต้องยกข้อมือหรือแตะหน้าจอเพื่อดูเวลาหรือข้อมูลอื่นๆ บนหน้าปัดนาฬิกาอีกต่อไป เพราะวันนี้จอภาพจะ\r\nไม่มีวันหลับ สิ่งที่คุณต้องทำก็เพียงเหลือบมองเพื่อดูเวลาหรือตัววัดการออกกำลังกายของคุณแค่นั้นเอง', '15819736431388.png', 'AP-WS4GP44', 15800.00, 'Apple', '2020-02-19'),
(9, 'Galaxy Watch 42mm eSim BLACK', 'xxx', '15829577658024.webp', 'SM-R815FZK', 15800.00, 'Sumsung', '2020-03-02'),
(12, 'test Tag Xiaomi', 'test Tag', '15862074294323.jpg', '000', 0.00, 'Xiaomi', '2020-04-09'),
(13, 'test Tag2 Huawei', 'test Tag2', '15862074668136.jpg', '00', 0.00, 'Huawei', '2020-04-09'),
(14, 'test Tag3 Moov', 'test Tag3', '15862074941442.jpg', '00', 0.00, 'Moov', '2020-04-09'),
(15, 'test Tag4 Amazfit', 'test Tag4', '15862075277245.jpg', '00', 0.00, 'Amazfit', '2020-04-09');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product_tag`
--

CREATE TABLE `product_tag` (
  `product_tag_id` int(11) NOT NULL,
  `product_tag_name` varchar(50) NOT NULL,
  `product_tag_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product_tag`
--

INSERT INTO `product_tag` (`product_tag_id`, `product_tag_name`, `product_tag_date`) VALUES
(1, 'Sumsung', '2020-04-08'),
(2, 'Apple', '2020-04-08'),
(3, 'TicWatch', '2020-04-09'),
(4, 'Xiaomi', '2020-04-09'),
(5, 'Amazfit', '2020-04-09'),
(6, 'Huawei', '2020-04-09'),
(7, 'Moov', '2020-04-09'),
(8, 'Fitbit', '2020-04-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสข่าว', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `product_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
