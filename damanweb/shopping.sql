-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 مايو 2025 الساعة 19:11
-- إصدار الخادم: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- بنية الجدول `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_img` varchar(200) NOT NULL,
  `pro_price` varchar(200) NOT NULL,
  `pro_section` varchar(200) NOT NULL,
  `pro_descrip` varchar(1000) NOT NULL,
  `pro_size` varchar(200) NOT NULL,
  `pro_unv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `product`
--

INSERT INTO `product` (`id`, `pro_name`, `pro_img`, `pro_price`, `pro_section`, `pro_descrip`, `pro_size`, `pro_unv`) VALUES
(24, 'العلوم ', '4172_2119_562_3801_product_6.png', 'الدائري الغربي', 'مستشفيات', 'من اقوى المستشفيات التخصصيه', 'للتواصل عبر الرقم الاتي 77099942', 'تم عقد الاتفاق'),
(25, 'الام', '1516_lgaqua.JPG', 'الصافيه', 'مستشفيات', 'يعالج امراض السرطان', 'للتواصل عبر الرقم الاتي 77099942', 'تم عقد الاتفاق'),
(26, 'بناطل', '2092_4890_shopping6.jpg', 'الستين', 'خدماتنا', 'لديه قسم علاج السرطان', 'للتواصل عبر الرقم الاتي 77099942', 'تم عقد الاتفاق'),
(27, 'الحياة', '3874_4197_jeans.JPG', 'غرب العاصمه', 'خدماتنا', 'يعالج الامراض المزمنه', 'للتواصل عبر الرقم الاتي 77099942', 'قيد الاتفاق'),
(33, 'الاربي', '1516_lgaqua.JPG', 'الرباط', 'الاشعه', 'لديه قسم علاج السرطان', 'للتواصل عبر الرقم الاتي 77099942', 'تم عقد الاتفاق'),
(34, 'الرباط', '1516_lgaqua.JPG', 'امام برج صنعاء', 'مرافق صحيه', 'لديه قسم الغسيل 24 ساعه', 'للتواصل عبر الرقم الاتي 77099942', 'تم عقد الاتفاق'),
(38, 'الحلم', '1516_lgaqua.JPG', 'المرقع امام مطعم الصنعاني', 'مستشفيات', 'صيدبيمنبمنيم', 'للتواصل عبر الرقم الاتي 77099942', 'تم العقد معاه');

-- --------------------------------------------------------

--
-- بنية الجدول `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `section`
--

INSERT INTO `section` (`id`, `section_name`, `img`) VALUES
(1, 'مستشفيات', '2953_1532614680.png'),
(2, 'مرافق صحيه', '1516_lgaqua.JPG'),
(3, 'خدماتنا', '2092_4890_shopping6.jpg'),
(10, 'الصيدليات', 'asfd.png'),
(12, 'الاشعه', 'سس.png');

-- --------------------------------------------------------

--
-- بنية الجدول `slider`
--

CREATE TABLE `slider` (
  `id` int(200) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `slider`
--

INSERT INTO `slider` (`id`, `image_path`) VALUES
(1, 'shopping6.jpg'),
(2, 'lgaqua.JPG');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `phon` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `AddDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Active` bit(1) NOT NULL DEFAULT b'1',
  `Role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`ID`, `UserName`, `Password`, `phon`, `Email`, `AddDate`, `Active`, `Role`) VALUES
(5, 'Abdullah_Al-Amrany', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'admin@gmail.com', '2025-02-18 02:12:48', b'1', 'admin'),
(6, 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 0, '', '2025-02-19 00:09:16', b'1', 'user'),
(9, 'zzz', 'cb990257247b592eaaed54b84b32d96b7904fd95', 0, 'zzz@gmail.com', '2025-02-19 03:48:44', b'1', 'user'),
(10, 'x123', '76028462b3ec05267dd142a0e93a401318bb7704', 0, 'x123@gmail.com', '2025-02-19 21:41:57', b'1', 'user'),
(11, 'ahmed_alahnomi', '013dcaa210ea79594b0d19727983e250ae2bf628', 0, 'hhnn487@gmail.com', '2025-02-19 21:53:10', b'1', 'admin'),
(12, 'aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 0, 'aa@gmail.com', '2025-04-19 14:28:57', b'1', 'user'),
(13, 'xxx', 'b60d121b438a380c343d5ec3c2037564b82ffef3', 770999042, '', '2025-04-19 15:17:58', b'1', 'user'),
(14, 'aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 770999042, '', '2025-05-24 17:25:40', b'1', 'user'),
(15, 'عبدالله العمراني', 'c0c5da3972e884ecdb72c3be5218b16beaab67b0', 2147483647, '', '2025-05-26 15:57:33', b'1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
