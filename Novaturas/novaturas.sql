-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 07:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novaturas`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `countryId`) VALUES
(27, 'ASSS', 83),
(29, 'ASS', 83);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `name`, `latitude`, `longitude`, `countryId`) VALUES
(30, 'LVO', '56.845962995190554', '26.1945897368164', 88);

-- --------------------------------------------------------

--
-- Table structure for table `airportairlines`
--

CREATE TABLE `airportairlines` (
  `id` int(11) NOT NULL,
  `airportId` int(11) NOT NULL,
  `airlinesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airportairlines`
--

INSERT INTO `airportairlines` (`id`, `airportId`, `airlinesId`) VALUES
(26, 30, 29);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`) VALUES
(83, 'AF/AFG', 'Afghanistan'),
(84, 'AL/ALB', 'Albania'),
(85, 'DZ/DZA', 'Algeria'),
(94, 'DK/DNK', 'Denmark'),
(89, 'EE/EST', 'Estonia'),
(95, 'FI/FIN', 'Finland'),
(92, 'DE/DEU', 'Germany'),
(98, 'IT/ITA', 'Italy'),
(93, 'JP/JPN', 'Japan'),
(88, 'LV/LVA', 'Latvia'),
(86, 'LT/LTU', 'Lithuania'),
(96, 'NO/NOR', 'Norway'),
(90, 'PL/POL', 'Poland'),
(91, 'RU/RUS', 'Russia'),
(87, 'ES/ESP', 'Spain'),
(97, 'SE/SWE', 'Sweden');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`latitude`,`longitude`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `airportairlines`
--
ALTER TABLE `airportairlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airportId` (`airportId`),
  ADD KEY `airlinesId` (`airlinesId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`iso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `airportairlines`
--
ALTER TABLE `airportairlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airlines`
--
ALTER TABLE `airlines`
  ADD CONSTRAINT `airlines_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`);

--
-- Constraints for table `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `airport_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`);

--
-- Constraints for table `airportairlines`
--
ALTER TABLE `airportairlines`
  ADD CONSTRAINT `airportairlines_ibfk_1` FOREIGN KEY (`airportId`) REFERENCES `airport` (`id`),
  ADD CONSTRAINT `airportairlines_ibfk_2` FOREIGN KEY (`airlinesId`) REFERENCES `airlines` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
