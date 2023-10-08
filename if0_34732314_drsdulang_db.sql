-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 02:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34732314_drsdulang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `ID` int(11) NOT NULL,
  `Admin_email` varchar(200) NOT NULL,
  `Admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`ID`, `Admin_email`, `Admin_password`) VALUES
(1, 'lili@gmail.com', '19bdd9de2d359abe3c922fa23c5a4aaa'),
(2, 'ahmad@gmail.com', '3458ae18100f81fb139326635813956a'),
(3, 'akmal03@gmail.com', '3458ae18100f81fb139326635813956a'),
(4, 'syafiq@gmail.com', '87efee97528597dce5b1700136a4cd48');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `Cart_id` int(11) NOT NULL,
  `EMAIL_COL` varchar(255) NOT NULL,
  `pack_name` varchar(100) NOT NULL,
  `Note` varchar(255) NOT NULL,
  `Colour_theme` varchar(50) NOT NULL,
  `Date_Majlis` date NOT NULL,
  `Dulang_total` int(11) NOT NULL,
  `Total_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`Cart_id`, `EMAIL_COL`, `pack_name`, `Note`, `Colour_theme`, `Date_Majlis`, `Dulang_total`, `Total_Price`) VALUES
(71, 'bruh911@gmail.com', 'Dulang Hantaran Open Package B', '', 'Choose Colour', '0000-00-00', 1, 30.00),
(72, 'bruh911@gmail.com', 'Dulang Hantaran Open Package A', '', 'Choose Colour', '0000-00-00', 1, 25.00),
(73, 'ad3@gmail.com', 'Dulang Hantaran Hidden Package B', '', 'Choose Colour', '0000-00-00', 1, 30.00),
(74, 'syafiquser@gmail.com', 'Dulang Hantaran Hidden Package A', '', 'Choose Colour', '0000-00-00', 1, 25.00),
(75, 'syafiquser@gmail.com', 'Dulang Hantaran Hidden Package A', '', 'Choose Colour', '0000-00-00', 1, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `ID` int(50) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `recipient_id` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `Order_id` int(11) NOT NULL,
  `EMAIL_COL` varchar(255) NOT NULL,
  `Pack_name` varchar(255) NOT NULL,
  `Note` varchar(255) NOT NULL,
  `Colour_Theme` varchar(100) NOT NULL,
  `Date_Majlis` date NOT NULL,
  `Total_Dulang` int(100) NOT NULL,
  `Total_price` decimal(10,2) NOT NULL,
  `Order_status` varchar(20) NOT NULL,
  `Disp_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`Order_id`, `EMAIL_COL`, `Pack_name`, `Note`, `Colour_Theme`, `Date_Majlis`, `Total_Dulang`, `Total_price`, `Order_status`, `Disp_Status`) VALUES
(28, 'akmalsoberi03@gmail.com', 'Dulang Hantaran Open Package Exclusive', 'saja test', 'Red', '2023-08-31', 2, 76.00, 'Confirmed', 'Off'),
(30, 'sheikh16@gmail.com', 'Dulang Hantaran Hidden Package B', 'Adjust bgi nmpk modern', 'Red', '2023-09-07', 1, 30.00, 'Confirmed', 'Off'),
(31, 'arnab@gmail.com', 'Dulang Hantaran Hidden Package Exclusive', 'bagi warna merah cerah', 'Red', '2023-08-03', 10, 350.00, 'Confirmed', 'Off'),
(32, 'arnab@gmail.com', 'Dulang Hantaran Hidden Package Exclusive', 'bagi warna merah cerah', 'Red', '2023-08-03', 10, 350.00, 'Confirmed', 'On'),
(33, 'Gial46@gmail.com', 'Dulang Hantaran Open Package B', 'Bunga lebih kembang dan menyerlah', 'Navy Blue', '2023-08-23', 4, 120.00, 'Confirmed', 'On'),
(34, 'li@gmail.com', 'Dulang Hantaran Open Package A', 'bunga matahari nk banyak', 'Red', '2023-08-23', 7, 175.00, 'Confirmed', 'Off'),
(35, 'Aminah46@gmail.com', 'Dulang Hantaran Open Package B', 'bunga', 'green', '2023-08-24', 3, 90.00, 'Confirmed', 'Off'),
(36, 'Ali46@gmail.com', 'Dulang Hantaran Hidden Package Exclusive', 'bunga', 'Red', '2023-08-01', 3, 105.00, 'Confirmed', 'On'),
(37, 'Akmalsoberi03@gmail.com', 'Dulang Hantaran Hidden Package A', '-', 'Navy Blue', '2023-08-11', 1, 25.00, 'Confirmed', 'Off'),
(38, 'ad3@gmail.com', 'Dulang Hantaran Hidden Package B', 'secepat mungki hntr', 'green', '2023-08-07', 1, 30.00, 'Confirmed', 'On'),
(39, 'Akmalsoberi03@gmail.com', 'Dulang Hantaran Hidden Package Exclusive', 'bunga kembang', 'Red', '2023-08-24', 2, 70.00, 'not confirmed', 'On'),
(40, 'li@gmail.com', 'Dulang Hantaran Hidden Package A', 'Yhf', 'Navy Blue', '2023-08-09', 1, 25.00, 'not confirmed', 'On'),
(41, 'bruh911@gmail.com', 'Dulang Hantaran Hidden Package A', 'qq', 'Red', '2023-09-13', 2, 50.00, 'Confirmed', 'Off'),
(42, 'bruh911@gmail.com', 'Dulang Hantaran Open Package B', '', 'Choose Colour', '0000-00-00', 1, 30.00, 'Not Confirmed', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `package_tbl`
--

CREATE TABLE `package_tbl` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(200) NOT NULL,
  `pack_price` varchar(200) NOT NULL,
  `r_price` decimal(10,2) NOT NULL,
  `pack_details` varchar(400) NOT NULL,
  `pack_image1` varchar(255) NOT NULL,
  `pack_image2` varchar(255) NOT NULL,
  `pack_image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_tbl`
--

INSERT INTO `package_tbl` (`pack_id`, `pack_name`, `pack_price`, `r_price`, `pack_details`, `pack_image1`, `pack_image2`, `pack_image3`) VALUES
(1, 'Dulang Hantaran Hidden Package A', 'RM 25.00/Dulang', 25.00, 'Can choose the color of the fabric that is available | can choose the color of flower that is available | Random Dulang', 'HiddenA1.jpeg', 'HiddenA2.jpeg', 'HiddenA3.jpeg'),
(2, 'Dulang Hantaran Hidden Package B', 'RM 30.00/Dulang', 30.00, 'Can choose the color of the fabric that is available | can choose type of Dulang | can choose the flower that is available', 'HiddenB1.jpeg', 'HiddenB2.jpeg', 'HiddenB3.jpeg'),
(3, 'Dulang Hantaran Hidden Package Exclusive', 'RM 35.00/Dulang', 35.00, 'Can choose the flower that is available | can choose the fabric that is available | Exclusive Dulang gold ', 'HiddenExclu1.jpeg', 'HiddenExclu2.jpeg', 'HiddenExclu3.jpeg'),
(4, 'Dulang Hantaran Open Package A', 'Rm 25.00/Dulang', 25.00, 'Include Dulang and Gubahan', 'OpenA1.jpeg', 'OpenA2.jpeg', 'OpenA3.jpeg'),
(5, 'Dulang Hantaran Open Package B', 'Rm 30.00/DUlang', 30.00, 'ring Dulang | dowry | bracelet etc RM 30/Dulang', 'OpenB1.jpeg', 'OpenB2.jpeg', 'OpenB3.jpeg'),
(6, 'Dulang Hantaran Open Package Exclusive', 'RM 38.00/Dulang', 38.00, 'Include Dulang and Gubahan', 'OpenExclu1.jpeg', 'OpenExclu2.jpeg', 'OpenExclu3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_tbl`
--

CREATE TABLE `product_stock_tbl` (
  `ID` int(11) NOT NULL,
  `Pack_Ex_Hid` int(255) NOT NULL,
  `Pack_A_Hid` int(255) NOT NULL,
  `Pack_B_Hid` int(255) NOT NULL,
  `Pack_Ex_Opn` int(255) NOT NULL,
  `Pack_A_Opn` int(255) NOT NULL,
  `Pack_B_Opn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_stock_tbl`
--

INSERT INTO `product_stock_tbl` (`ID`, `Pack_Ex_Hid`, `Pack_A_Hid`, `Pack_B_Hid`, `Pack_Ex_Opn`, `Pack_A_Opn`, `Pack_B_Opn`) VALUES
(1, 51, 46, 46, 50, 50, 46);

-- --------------------------------------------------------

--
-- Table structure for table `staffdetail`
--

CREATE TABLE `staffdetail` (
  `ID` int(11) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `StaffContactNo` int(100) NOT NULL,
  `StaffGender` varchar(50) NOT NULL,
  `StaffEmail` varchar(50) NOT NULL,
  `StaffPassword` varchar(50) NOT NULL,
  `StaffJoinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffdetail`
--

INSERT INTO `staffdetail` (`ID`, `StaffName`, `StaffContactNo`, `StaffGender`, `StaffEmail`, `StaffPassword`, `StaffJoinDate`) VALUES
(1, 'name', 3866453, 'Male', 'dysf@gmail.com', '1234', '2023-09-05'),
(2, 'named', 3837, 'Female', 'dysfwsedg@gmail.com', '1423', '2023-09-13'),
(4, 'stafftest', 91282928, 'Male', 'teststaff@gmail.com', '123', '2021-09-23'),
(5, 'stafftesttwo', 912829, 'Male', 'teststaff2@gmail.com', '123', '2021-09-24'),
(6, 'testdtafftest', 683455, 'Male', 'testgagd@gmail.com', '123', '2012-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `ID` int(11) NOT NULL,
  `NAME_COL` varchar(200) NOT NULL,
  `EMAIL_COL` varchar(200) NOT NULL,
  `PASSWORD_COL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`ID`, `NAME_COL`, `EMAIL_COL`, `PASSWORD_COL`) VALUES
(11, 'Sheikh Amirul Aiman', 'sheikh16@gmail.com', '3458ae18100f81fb139326635813956a'),
(12, 'arnab', 'arnab@gmail.com', '2668ca7fe79a4dcf26a0e0d8d3683ed4'),
(13, 'Giah', 'Gial46@gmail.com', 'fb7b25d02a3750b32125d5b0a09990ac'),
(14, 'li', 'li@gmail.com', '19bdd9de2d359abe3c922fa23c5a4aaa'),
(15, 'Akmal', 'Akmalsoberi03@gmail.com', 'd9d903644249642d9edda1b3a8fd4d27'),
(16, 'Aminah', 'Aminah46@gmail.com', '3bcace3cb24f7dc93a146ba63a94f077'),
(17, 'Ahmad Danial Bin Muhammad Burhanuddin', 'ahmaddanial36x@gmail.com', '3458ae18100f81fb139326635813956a'),
(18, 'Ali', 'Ali46@gmail.com', '6f6b41ae1ff5ab84a4878be3373cbb62'),
(19, 'ADRIANA', 'ad3@gmail.com', '87efee97528597dce5b1700136a4cd48'),
(20, 'syafiq', 'syafiquser@gmail.com', '87efee97528597dce5b1700136a4cd48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`Cart_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `package_tbl`
--
ALTER TABLE `package_tbl`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `product_stock_tbl`
--
ALTER TABLE `product_stock_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staffdetail`
--
ALTER TABLE `staffdetail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staffdetail`
--
ALTER TABLE `staffdetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
