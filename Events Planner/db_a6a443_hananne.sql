-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql5035.site4now.net
-- Generation Time: Nov 28, 2020 at 08:46 AM
-- Server version: 5.6.26-log
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a6a443_hananne`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `FirstName`, `LastName`, `Email`, `Password`, `Phone`) VALUES
(1, 'Hanan', 'Mohamed', 'hanan.n@gmail.com', 'Hanan@123', 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `EventDate` date NOT NULL,
  `StartTime` time(6) NOT NULL,
  `EndTime` time(6) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `ClientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `EventDate`, `StartTime`, `EndTime`, `EventName`, `ClientID`) VALUES
(1, '2020-12-07', '16:00:00.000000', '21:00:00.000000', 'Conference', 0),
(2, '2020-11-30', '14:00:00.000000', '18:00:00.000000', 'My wedding', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menucategory`
--

CREATE TABLE `menucategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menucategory`
--

INSERT INTO `menucategory` (`CategoryID`, `CategoryName`) VALUES
(1, 'Places'),
(2, 'Decorating'),
(3, 'Lights'),
(4, 'Music'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `MenuID` int(11) NOT NULL,
  `MenuName` varchar(100) NOT NULL,
  `Details` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Discount` float NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`MenuID`, `MenuName`, `Details`, `Price`, `Discount`, `CategoryID`) VALUES
(1, 'Hall_Of_Confernces', 'Location in Universtiy', 3000, 1, 1),
(2, 'Breakfast Menu', 'Touest\r\nCoffee\r\n', 200, 0.1, 5),
(3, 'Decore', 'Stages\r\nChairs\r\nTabels', 300, 0.2, 2),
(4, 'DJ', 'Classic Music', 150, 0.1, 4),
(5, 'Lights Type', 'Smart Lighting', 250, 0.1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reserv`
--

CREATE TABLE `reserv` (
  `ReservID` int(11) NOT NULL,
  `RDate` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `ClientID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserv`
--

INSERT INTO `reserv` (`ReservID`, `RDate`, `Status`, `ClientID`) VALUES
(1, '2020-11-28', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservtemp`
--

CREATE TABLE `reservtemp` (
  `MID` int(11) NOT NULL,
  `MenuName` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `ClientID` int(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservtemp`
--

INSERT INTO `reservtemp` (`MID`, `MenuName`, `Price`, `ClientID`, `ID`) VALUES
(5, 'Lights Type', 250, 1, 4),
(5, 'Lights Type', 250, 1, 5),
(5, 'Lights Type', 250, 1, 6),
(1, 'Hall_Of_Confernces', 3000, 1, 7),
(1, 'Hall_Of_Confernces', 3000, 1, 8),
(1, 'Hall_Of_Confernces', 3000, 1, 9),
(4, 'DJ', 150, 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `FK` (`ClientID`);

--
-- Indexes for table `menucategory`
--
ALTER TABLE `menucategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`MenuID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `reserv`
--
ALTER TABLE `reserv`
  ADD PRIMARY KEY (`ReservID`);

--
-- Indexes for table `reservtemp`
--
ALTER TABLE `reservtemp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MID` (`MID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menucategory`
--
ALTER TABLE `menucategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reserv`
--
ALTER TABLE `reserv`
  MODIFY `ReservID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservtemp`
--
ALTER TABLE `reservtemp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `menucategory` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
