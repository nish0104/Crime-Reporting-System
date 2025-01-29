-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_reporting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `complainants`
--

DROP TABLE IF EXISTS `complainants`;
CREATE TABLE `complainants` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(14) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainants`
--

INSERT INTO `complainants` (`id`, `name`, `address`, `contact`, `emailid`, `password`) VALUES
(1, 'Admin', 'abcdefg', 9874563215, 'admin123@gmail.com', 'admin123'),
(2, 'Vaishnavi Gheewala', 'xyz', 8745963256, 'vg12@gmail.com', 'vaishu12');

-- --------------------------------------------------------

--
-- Table structure for table `police_officer`
--

DROP TABLE IF EXISTS `police_officer`;
CREATE TABLE `police_officer` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `contactno` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police_officer`
--

INSERT INTO `police_officer` (`id`, `station_id`, `name`, `designation`, `contactno`) VALUES
(1, 1, 'Ram', 'Sub Inspector', 9658741236),
(2, 2, 'Isha', 'Inspector', 9568741234);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contactno` bigint(14) NOT NULL,
  `createpassword` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `emailid`, `contactno`, `createpassword`, `confirmpassword`) VALUES
(1, 'Admin', 'admin', 'admin123@gmail.com', 9874563215, 'admin123', 'admin123'),
(2, 'Vaishnavi Gheewala', 'vaishu', 'vg12@gmail.com', 8745963256, 'vaishu12', 'vaishu12');

-- --------------------------------------------------------

--
-- Table structure for table `report_crime`
--

DROP TABLE IF EXISTS `report_crime`;
CREATE TABLE `report_crime` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'Anonymous',
  `todaydate` date NOT NULL,
  `type_of_crime` text NOT NULL,
  `incident` varchar(50) NOT NULL,
  `criminaldetail` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_crime`
--

INSERT INTO `report_crime` (`id`, `username`, `todaydate`, `type_of_crime`, `incident`, `criminaldetail`, `img`) VALUES
(1, 'Admin', '2022-09-26', 'Cyber Crime', 'xyzabc', 'abcdef', 'cybercrime.jpeg'),
(2, 'Anonymous', '2022-09-28', 'Robbery', 'mnopqrst', 'abcdef', 'robbery.jpeg'),
(3, 'Anonymous', '2022-09-28', 'Domestic Violence/Abuse', 'abc', 'hijklm', 'domesticviolence.jpeg'),
(4, 'vaishu', '2022-09-30', 'Car Jacking', 'abc', 'xyz', 'carjacking.jpeg'),
(5, 'Admin', '2022-10-02', 'Burglary', 'mno', 'abc', 'burglary.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `address`) VALUES
(1, 'Adajan Police Station', 'abcdef'),
(2, 'Athwalines Police Station', 'xyzmno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complainants`
--
ALTER TABLE `complainants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_officer`
--
ALTER TABLE `police_officer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_crime`
--
ALTER TABLE `report_crime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complainants`
--
ALTER TABLE `complainants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `police_officer`
--
ALTER TABLE `police_officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_crime`
--
ALTER TABLE `report_crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `police_officer`
--
ALTER TABLE `police_officer`
  ADD CONSTRAINT `police_officer_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
