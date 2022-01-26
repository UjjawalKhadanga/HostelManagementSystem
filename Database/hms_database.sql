-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 07:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_database`
--
CREATE DATABASE IF NOT EXISTS `hms_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hms_database`;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `Hostel` varchar(10) NOT NULL,
  `Room` varchar(10) NOT NULL,
  `Availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`Hostel`, `Room`, `Availability`) VALUES
('Nako', '1', 1),
('Nako', '2', 0),
('Nako', '3', 1),
('Nako', '4', 1),
('Nako', '5', 1),
('Nako', '6', 1),
('Nako', '7', 1),
('Nako', '8', 1),
('Nako', '9', 1),
('Nako', '10', 1),
('Prashar', '1', 1),
('Prashar', '2', 1),
('Prashar', '3', 1),
('Prashar', '4', 1),
('Prashar', '5', 1),
('Prashar', '6', 0),
('Prashar', '7', 1),
('Prashar', '8', 1),
('Prashar', '9', 1),
('Prashar', '10', 1),
('Suvalsar', '1', 0),
('Suvalsar', '2', 1),
('Suvalsar', '3', 1),
('Suvalsar', '4', 1),
('Suvalsar', '5', 1),
('Suvalsar', '6', 1),
('Suvalsar', '7', 1),
('Suvalsar', '8', 1),
('Suvalsar', '9', 1),
('Suvalsar', '10', 1),
('Chandrataa', '1', 1),
('Chandrataa', '2', 1),
('Chandrataa', '3', 1),
('Chandrataa', '4', 1),
('Chandrataa', '5', 1),
('Chandrataa', '6', 1),
('Chandrataa', '7', 1),
('Chandrataa', '8', 1),
('Chandrataa', '9', 1),
('Chandrataa', '10', 1),
('Beaskund', '1', 1),
('Beaskund', '2', 1),
('Beaskund', '3', 1),
('Beaskund', '4', 1),
('Beaskund', '5', 1),
('Beaskund', '6', 1),
('Beaskund', '7', 1),
('Beaskund', '8', 1),
('Beaskund', '9', 1),
('Beaskund', '10', 1),
('Gaurikund', '1', 1),
('Gaurikund', '2', 1),
('Gaurikund', '3', 1),
('Gaurikund', '4', 1),
('Gaurikund', '5', 1),
('Gaurikund', '6', 1),
('Gaurikund', '7', 0),
('Gaurikund', '8', 1),
('Gaurikund', '9', 0),
('Gaurikund', '10', 1),
('Suraj Tal', '1', 1),
('Suraj Tal', '2', 1),
('Suraj Tal', '3', 1),
('Suraj Tal', '4', 1),
('Suraj Tal', '5', 1),
('Suraj Tal', '6', 1),
('Suraj Tal', '7', 1),
('Suraj Tal', '8', 1),
('Suraj Tal', '9', 1),
('Suraj Tal', '10', 0),
('Dashir', '1', 1),
('Dashir', '2', 1),
('Dashir', '3', 1),
('Dashir', '4', 1),
('Dashir', '5', 0),
('Dashir', '6', 1),
('Dashir', '7', 1),
('Dashir', '8', 1),
('Dashir', '9', 1),
('Dashir', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

DROP TABLE IF EXISTS `studentdata`;
CREATE TABLE IF NOT EXISTS `studentdata` (
  `Name` varchar(50) NOT NULL,
  `RollNo` varchar(7) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Hostel` varchar(10) DEFAULT NULL,
  `Room` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`RollNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`Name`, `RollNo`, `Branch`, `Email`, `Password`, `Hostel`, `Room`) VALUES
('Niharika Batra', 'A20006', 'MA', 'a20006@students.iitmandi.ac.in', '', 'Nako', '2'),
('Aditya Sood', 'B20077', 'CSE', 'b20077@students.iitmandi.ac.in', '', 'Prashar', '6'),
('Dev Prajapat', 'B20093', 'CSE', 'b20093@students.iitmandi.ac.in', '', 'Gaurikund', '7'),
('Gokul Goyal', 'B20100', 'CSE', 'b20100@students.iitmandi.ac.in', '', 'Suvalsar', '1'),
('Karan Baraik', 'B20110', 'CSE', 'b20110@students.iitmandi.ac.in', '', 'Suraj Tal', '10'),
('Sachin Mahawar', 'B20129', 'CSE', 'b20129@students.iitmandi.ac.in', '', 'Dashir', '5'),
('Ujjawal Khadanga', 'B20139', 'CSE', 'b20139@students.iitmandi.com', '', 'Gaurikund', '9');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
