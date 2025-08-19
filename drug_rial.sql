-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 09:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug_rial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(300) NOT NULL,
  `a_email` varchar(300) NOT NULL,
  `a_password` varchar(500) NOT NULL,
  `a_dp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`, `a_dp`) VALUES
(1, 'admin', 'admin@gmail.com', '12', 'upload/pexels-bithin-raj-2763927.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_date` date NOT NULL,
  `m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `cart_qty` varchar(300) NOT NULL,
  `cart_total_amount` varchar(500) NOT NULL,
  `cart_updated_date` date NOT NULL,
  `cart_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `cat_posted_-date` date NOT NULL,
  `cat_updated_date` date NOT NULL,
  `cat_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_posted_-date`, `cat_updated_date`, `cat_status`) VALUES
(11, 'TABLETS ', '2023-06-14', '2023-06-23', 'Active'),
(12, 'SUSPENSIONS ', '2023-06-14', '2023-06-14', 'Active'),
(13, 'OINTMENT', '2023-06-14', '2023-06-14', 'Active'),
(14, 'LOTIONS ', '2023-06-14', '0000-00-00', 'Active'),
(15, 'DROPS', '2023-06-14', '0000-00-00', 'Active'),
(16, 'GENERALS ', '2023-06-14', '0000-00-00', 'Active'),
(18, '', '2023-06-28', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_age` int(11) NOT NULL,
  `c_gender` varchar(200) NOT NULL,
  `c_email` varchar(500) NOT NULL,
  `c_phone` bigint(20) NOT NULL,
  `c_password` varchar(300) NOT NULL,
  `c_address` varchar(500) NOT NULL,
  `c_city` varchar(200) NOT NULL,
  `c_state` varchar(300) NOT NULL,
  `c_pin` varchar(200) NOT NULL,
  `c_dp` varchar(500) NOT NULL,
  `c_created_date` date NOT NULL,
  `c_updated_date` date NOT NULL,
  `c_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(300) NOT NULL,
  `e_email` varchar(300) NOT NULL,
  `e_password` varchar(300) NOT NULL,
  `e_phone` bigint(20) NOT NULL,
  `e_address` varchar(500) NOT NULL,
  `e_dp` varchar(500) NOT NULL,
  `e_created_date` date NOT NULL,
  `e_updated_date` date NOT NULL,
  `e_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_name`, `e_email`, `e_password`, `e_phone`, `e_address`, `e_dp`, `e_created_date`, `e_updated_date`, `e_status`) VALUES
(2, 'nithesh', 'employee@gmail.com', '123', 7909209834, 'kerala', 'upload/wallpaperflare.com_wallpaper (4).jpg', '2023-06-12', '0000-00-00', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_date` date NOT NULL,
  `o_id` int(11) NOT NULL,
  `f_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `m_date` date NOT NULL,
  `m_title` varchar(300) NOT NULL,
  `m_description` varchar(500) NOT NULL,
  `m_image` varchar(500) NOT NULL,
  `m_mrp` varchar(300) NOT NULL,
  `m_batch_no` varchar(500) NOT NULL,
  `m_manufacture` varchar(300) NOT NULL,
  `m_expiry_date` date NOT NULL,
  `m_qty` varchar(500) NOT NULL,
  `m_updated_date` date NOT NULL,
  `m_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `cat_id`, `e_id`, `m_date`, `m_title`, `m_description`, `m_image`, `m_mrp`, `m_batch_no`, `m_manufacture`, `m_expiry_date`, `m_qty`, `m_updated_date`, `m_status`) VALUES
(9, 11, 2, '2023-06-21', 'dolo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi exercitationem deleniti, repudiandae delectus animi quisquam. Ex ut officiis natus repellendus.', 'upload/IMG-20230620-WA0005.jpg', '20', '1235', 'pvt lmtd', '0000-00-00', '10', '2023-06-23', 'unavailable'),
(10, 11, 2, '2023-06-21', 'dolo', 'drug', 'upload/IMG-20230620-WA0006.jpg', '50', '1234', 'nvt lmtd', '2025-10-21', '20', '0000-00-00', 'posted'),
(11, 11, 2, '2023-06-21', 'dolo', 'drug', 'upload/IMG-20230620-WA0007.jpg', '60', '1234', 'pvt lmtd', '2024-11-21', '15', '0000-00-00', 'posted'),
(12, 11, 2, '2023-06-21', 'dolo', 'drug', 'upload/IMG-20230620-WA0008.jpg', '70', '1234', 'nvt lmtd', '2024-06-21', '14', '0000-00-00', 'posted'),
(13, 11, 2, '2023-06-21', 'dolo', 'drug', 'upload/IMG-20230620-WA0009.jpg', '55', '1234', 'pvt lmtd', '2024-11-15', '10', '0000-00-00', 'posted'),
(14, 12, 2, '2023-06-21', 'suspension ', 'drug', 'upload/IMG-20230620-WA0050.jpg', '30', '1234', 'nvt lmtd', '0000-00-00', '10', '2023-06-21', 'available'),
(16, 12, 2, '2023-06-21', 'suspension ', 'drug', 'upload/IMG-20230620-WA0093.jpg', '60', '12345', 'pvt lmtd', '2024-10-16', '50ml', '0000-00-00', 'posted'),
(17, 12, 2, '2023-06-21', 'suspension ', 'drug', 'upload/IMG-20230620-WA0094.jpg', '60', '120', 'pvt lmtd', '2025-10-15', '50ml', '0000-00-00', 'posted'),
(18, 12, 2, '2023-06-21', 'suspension ', 'drug', 'upload/IMG-20230620-WA0092.jpg', '60', '123', 'pvt lmtd', '2024-10-16', '50ml', '0000-00-00', 'posted'),
(19, 13, 2, '2023-06-21', 'ointment', 'cream', 'upload/IMG-20230620-WA0119.jpg', '60', '1234', 'pvt lmtd', '2025-02-05', '50ml', '0000-00-00', 'posted'),
(20, 13, 2, '2023-06-21', 'ointment', 'cream', 'upload/IMG-20230620-WA0118.jpg', '60', '123', 'pvt lmtd', '2024-10-16', '150ml', '0000-00-00', 'posted'),
(21, 13, 2, '2023-06-21', 'ointment', 'cream', 'upload/IMG-20230620-WA0117.jpg', '60', '456', 'nvt lmtd', '2024-10-17', '50ml', '0000-00-00', 'posted'),
(22, 13, 2, '2023-06-21', 'ointment', 'cream', 'upload/IMG-20230620-WA0116.jpg', '60', '175', 'nvt lmtd', '2024-11-21', '50ml', '0000-00-00', 'posted'),
(23, 14, 2, '2023-06-21', 'lotions', 'lotions', 'upload/IMG-20230620-WA0053.jpg', '60', '2345', 'nvt lmtd', '2024-06-05', '50ml', '0000-00-00', 'posted'),
(24, 14, 2, '2023-06-21', 'lotions', 'lotions', 'upload/IMG-20230620-WA0080.jpg', '60', '3455', 'nvt lmtd', '2024-10-21', '50ml', '0000-00-00', 'posted'),
(25, 14, 2, '2023-06-21', 'lotions', 'lotions', 'upload/IMG-20230620-WA0079.jpg', '60', '1287', 'nvt lmtd', '2024-10-16', '50ml', '0000-00-00', 'posted'),
(27, 16, 2, '2023-06-23', 'general', '', 'upload/0ca08975d8f89d0c758f8326e2659651.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(28, 16, 2, '2023-06-23', 'general', '', 'upload/0df22f8bd00b6cc757a3cd2b97ba950b.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(29, 16, 2, '2023-06-23', 'general', '', 'upload/1c9a57bbbf5b2a0db6d0762b5d9e6189.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(30, 16, 2, '2023-06-23', 'general', '', 'upload/3d646575544ff3d5245043883c9d36aa.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(31, 16, 2, '2023-06-23', 'general', '', 'upload/4c62fe4a084063a495560b8a3f59bfb8.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(32, 16, 2, '2023-06-23', 'general', '', 'upload/6d5cbb1ed92a0722f556493261f40ed0.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(33, 16, 2, '2023-06-23', 'general', '', 'upload/6d532fd7be9f6c9451e4722f53718d4d.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(34, 16, 2, '2023-06-23', 'general', '', 'upload/7c656b588f0cdde17fda63cbc1291085.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(35, 15, 2, '2023-06-23', 'drops', '', 'upload/6ea534339bdee2d0f2302f92e48f4064.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(36, 15, 2, '2023-06-23', 'drops', '', 'upload/41a4403f26f1b9831b81b3c9f1931927.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(37, 15, 2, '2023-06-23', 'drops', '', 'upload/66e3fe24ab3ba694c5655d0e57844bf9.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(38, 15, 2, '2023-06-23', 'drops', '', 'upload/98c35c790cdfd7f5cb2da501092c7b0a.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(39, 15, 2, '2023-06-23', 'drops', '', 'upload/0269beb7b2c0ebff12316ae30519fc3f.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(40, 15, 2, '2023-06-23', 'drops', '', 'upload/12448e69513b2a12de8062d7ccdfe6b8.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(41, 14, 2, '2023-06-23', 'lotions', '', 'upload/IMG-20230620-WA0066.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(42, 14, 2, '2023-06-23', 'lotions', '', 'upload/IMG-20230620-WA0067.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(43, 14, 2, '2023-06-23', 'lotions', '', 'upload/IMG-20230620-WA0071.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(44, 12, 2, '2023-06-23', 'suspension ', '', 'upload/IMG-20230620-WA0030.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(45, 12, 2, '2023-06-23', 'suspension ', '', 'upload/IMG-20230620-WA0032.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(46, 12, 2, '2023-06-23', 'suspension ', '', 'upload/IMG-20230620-WA0042.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(47, 13, 2, '2023-06-23', 'ointment', '', 'upload/IMG-20230620-WA0098.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(48, 13, 2, '2023-06-23', 'ointment', '', 'upload/IMG-20230620-WA0099.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(49, 13, 2, '2023-06-23', 'ointment', '', 'upload/IMG-20230620-WA0101.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted'),
(50, 13, 2, '2023-06-23', 'ointment', '', 'upload/IMG-20230620-WA0103.jpg', '', '', '', '0000-00-00', '', '0000-00-00', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `o_qty` varchar(300) NOT NULL,
  `o_total_amount` varchar(500) NOT NULL,
  `o_name` varchar(300) NOT NULL,
  `o_phone` bigint(25) NOT NULL,
  `o_email` varchar(400) NOT NULL,
  `o_address` varchar(500) NOT NULL,
  `o_city` varchar(300) NOT NULL,
  `o_pin` varchar(300) NOT NULL,
  `o_state` varchar(300) NOT NULL,
  `o_updated_date` date NOT NULL,
  `o_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_date` date NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_type` varchar(300) NOT NULL,
  `p_tid` varchar(300) NOT NULL,
  `p_amount` varchar(500) NOT NULL,
  `p_updated_date` date NOT NULL,
  `p_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_email` (`a_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
