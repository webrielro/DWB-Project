-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2023 at 09:14 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcvshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `AdminUserID` int NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`AdminUserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`AdminUserID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'admin', '$2y$10$l7l7HTgkbzmPECse610DvODIjtFEsN17Eeoit0LeXGArcZuV7iN96', 'Admin', 'Test', 'admin@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`CartID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
CREATE TABLE IF NOT EXISTS `cartitem` (
  `CartItemID` int NOT NULL,
  `CartID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`CartItemID`),
  KEY `CartID` (`CartID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DatePosted` date NOT NULL,
  `IsLatest` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NewsID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `Title`, `Content`, `DatePosted`, `IsLatest`) VALUES
(1, 'Guardians of Style: Choosing the Perfect Mobile Cover for Fashion and Function', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-01', 1),
(2, 'Beyond Protection: Exploring Innovative Features in Modern Mobile Covers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-05', 1),
(3, 'DIY Trends: Personalizing Your Phone with Creative Mobile Cover Designs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-10', 1),
(4, 'Guardians of Style: Choosing the Perfect Mobile Cover for Fashion and Function', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-01', 0),
(5, 'Beyond Protection: Exploring Innovative Features in Modern Mobile Covers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-05', 0),
(6, 'DIY Trends: Personalizing Your Phone with Creative Mobile Cover Designs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu libero egestas, dictum risus ac, consectetur risus...', '2023-12-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `Price` decimal(10,2) NOT NULL,
  `StockQuantity` int NOT NULL,
  `ImagePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsRecommended` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Description`, `Price`, `StockQuantity`, `ImagePath`, `IsRecommended`) VALUES
(1, 'Product Name 1', 'High-quality red mobile cover', '250.00', 10, '/Mcvshop/img/prod1.png', 1),
(2, 'Product Name 2', 'Stylish green mobile cover', '250.00', 15, '/Mcvshop/img/prod2.png', 1),
(3, 'Product Name 3', 'Vibrant orange mobile cover', '250.00', 20, '/Mcvshop/img/prod3.png', 1),
(4, 'Product Name 1', 'Durable blue mobile cover', '300.00', 20, '/Mcvshop/img/prod1.png', 0),
(5, 'Product Name 2', 'Elegant purple mobile cover', '280.00', 18, '/Mcvshop/img/prod2.png', 0),
(6, 'Product Name 3', 'Classic black mobile cover', '270.00', 25, '/Mcvshop/img/prod3.png', 0),
(7, 'Product Name 4', 'Durable blue mobile cover', '300.00', 20, '/Mcvshop/img/prod4.png', 0),
(8, 'Product Name 5', 'Elegant purple mobile cover', '280.00', 18, '/Mcvshop/img/prod5.png', 0),
(9, 'Product Name 6', 'Classic black mobile cover', '270.00', 25, '/Mcvshop/img/prod1.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StreetAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostalCode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
