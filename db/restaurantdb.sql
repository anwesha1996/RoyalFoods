-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 12:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurantdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogindetails`
--

CREATE TABLE IF NOT EXISTS `tbl_adminlogindetails` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userimage` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminlogindetails`
--

INSERT INTO `tbl_adminlogindetails` (`userid`, `username`, `password`, `userimage`) VALUES
(1, 'admin', 'admin', '10f591b100ca221264fb5c99291a40a5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companybanner`
--

CREATE TABLE IF NOT EXISTS `tbl_companybanner` (
  `company_bannerid` int(11) NOT NULL,
  `company_banner` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companybanner`
--

INSERT INTO `tbl_companybanner` (`company_bannerid`, `company_banner`, `company_id`) VALUES
(1, 'c9a2801274d6eb5179428dc0be8ca2f9.jpg', 1),
(2, 'e20c4ae8ae6b4ccf9f7a98a82a1932ba.jpg', 1),
(3, 'ff957df6cd8cc51cd0ebfb735a8ec4c9.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companydetails`
--

CREATE TABLE IF NOT EXISTS `tbl_companydetails` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(500) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_mobile` varchar(50) NOT NULL,
  `company_landline` varchar(50) NOT NULL,
  `company_website` varchar(50) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `company_service` varchar(50) NOT NULL,
  `company_logo` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companydetails`
--

INSERT INTO `tbl_companydetails` (`company_id`, `company_name`, `company_address`, `company_email`, `company_mobile`, `company_landline`, `company_website`, `company_type`, `company_service`, `company_logo`) VALUES
(1, 'Foods Day', '359,Sahid Nager, bhubaneswar', 'foodsday@gmail.com', '9856321478', '0674-6444607', 'interface.com', 'Family Restaurant/bar', 'Online Food Ordering System', 'ad8ae1cac47068cfe4aae73043dbfd20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_customerdetails` (
  `customerid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `emailid` varchar(150) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobileno` varchar(150) NOT NULL,
  `area` varchar(150) NOT NULL,
  `landmark` varchar(150) NOT NULL,
  `customerstatus` varchar(150) NOT NULL,
  `orderdate` date NOT NULL,
  `ordertime` varchar(150) NOT NULL,
  `delhiverydate` date NOT NULL,
  `delhiverytime` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customerdetails`
--

INSERT INTO `tbl_customerdetails` (`customerid`, `name`, `emailid`, `address`, `mobileno`, `area`, `landmark`, `customerstatus`, `orderdate`, `ordertime`, `delhiverydate`, `delhiverytime`, `city`) VALUES
(63, 'Prajna', 'prajna@inss.in', 'Saheed nagar', '789-654-1230', 'Sahid Nager', 'bapu opticals', 'New', '2016-07-02', '01.37 PM', '2016-11-11', '12:30 PM', 'Bhubaneswar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_itemdetails` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemtype` varchar(50) NOT NULL,
  `itemstatus` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemdetails`
--

INSERT INTO `tbl_itemdetails` (`itemid`, `itemname`, `itemtype`, `itemstatus`) VALUES
(2, 'APPETIZER', 'Veg', 'Active'),
(4, 'VEG SOUP', 'Veg', 'Active'),
(6, 'CHICKEN SOUP', 'Non-Veg', 'Active'),
(7, 'CHINESE STATER VEG', 'Veg', 'Active'),
(11, 'CHINESE STATER NON-VEG ', 'Non-Veg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_orderdetails` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `subitemid` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`orderid`, `customerid`, `subitemid`, `quantity`, `price`, `totalprice`) VALUES
(52, 63, 10, '2', 15, 130),
(53, 63, 12, '5', 20, 130);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subitemdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_subitemdetails` (
  `subitemid` int(11) NOT NULL,
  `subitemname` varchar(100) NOT NULL,
  `itemprice` float NOT NULL,
  `subitemimage` varchar(150) NOT NULL,
  `subitemstatus` varchar(50) NOT NULL,
  `itemid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subitemdetails`
--

INSERT INTO `tbl_subitemdetails` (`subitemid`, `subitemname`, `itemprice`, `subitemimage`, `subitemstatus`, `itemid`) VALUES
(10, 'ROASTER PAPAD', 15, '08f6dfac307e7a02b8774a0bf1c7fbca.jpg', 'Active', 2),
(12, 'FRIED PAPAD', 20, '4f97ebc495dce71711701aca77083bff.jpg', 'Active', 2),
(13, 'MASALA PAPAD', 30, '87239332feacae578f6bfc7fb85877b6.jpg', 'Active', 2),
(14, 'MIX RAITA', 70, 'd21a224cd5a5307a68189f77c00c3f21.jpg', 'Active', 2),
(15, 'GREEN SALAD', 50, '4381d2268638b65cfe39de2b4fb2ead1.jpg', 'Active', 2),
(16, 'SPECIAL PAPAD', 100, '33fa580a6c8faf1b5abc78b0e9b1c4e6.jpg', 'Active', 2),
(17, 'TOMATO SOUP', 75, 'c838d1403ccaab43df617ae1711fed26.jpg', 'Active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogindetails`
--
ALTER TABLE `tbl_adminlogindetails`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_companybanner`
--
ALTER TABLE `tbl_companybanner`
  ADD PRIMARY KEY (`company_bannerid`), ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_companydetails`
--
ALTER TABLE `tbl_companydetails`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_customerdetails`
--
ALTER TABLE `tbl_customerdetails`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `tbl_itemdetails`
--
ALTER TABLE `tbl_itemdetails`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`orderid`), ADD KEY `customerid` (`customerid`), ADD KEY `subitemid` (`subitemid`);

--
-- Indexes for table `tbl_subitemdetails`
--
ALTER TABLE `tbl_subitemdetails`
  ADD PRIMARY KEY (`subitemid`), ADD KEY `itemid` (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_companybanner`
--
ALTER TABLE `tbl_companybanner`
  MODIFY `company_bannerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_companydetails`
--
ALTER TABLE `tbl_companydetails`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_customerdetails`
--
ALTER TABLE `tbl_customerdetails`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_itemdetails`
--
ALTER TABLE `tbl_itemdetails`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_subitemdetails`
--
ALTER TABLE `tbl_subitemdetails`
  MODIFY `subitemid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_companybanner`
--
ALTER TABLE `tbl_companybanner`
ADD CONSTRAINT `tbl_companybanner_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_companydetails` (`company_id`);

--
-- Constraints for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
ADD CONSTRAINT `tbl_orderdetails_ibfk_2` FOREIGN KEY (`subitemid`) REFERENCES `tbl_subitemdetails` (`subitemid`),
ADD CONSTRAINT `tbl_orderdetails_ibfk_3` FOREIGN KEY (`customerid`) REFERENCES `tbl_customerdetails` (`customerid`);

--
-- Constraints for table `tbl_subitemdetails`
--
ALTER TABLE `tbl_subitemdetails`
ADD CONSTRAINT `tbl_subitemdetails_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `tbl_itemdetails` (`itemid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
