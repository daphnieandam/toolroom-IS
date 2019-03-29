-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 03:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `borrower` int(11) NOT NULL,
  `tools` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `borrower`, `tools`, `qty`, `time`, `returned`) VALUES
(1, 444, 1, 2, '2019-03-28 14:16:52', '2019-03-30'),
(2, 444, 1, 2, '2019-03-28 14:13:54', '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `stud_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `section` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`stud_id`, `firstname`, `lastname`, `section`, `department`, `position`, `phone_number`, `email`, `address`) VALUES
(444, 'zx', 'zx', 1, 1, 1, '09214748364', 'jungel5thyr@yahoo.com', 'lj');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'BSBA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(2, 'daphnie', 'andam', 'andamdaphnie@gmail.com', 'adminon', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `pen_id` int(11) NOT NULL,
  `pen_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`pen_id`, `pen_name`) VALUES
(1, 'community service');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `borrower` int(11) NOT NULL,
  `tools` int(11) NOT NULL,
  `qy` varchar(11) NOT NULL,
  `penalty` int(100) DEFAULT NULL,
  `timecharge` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `borrower`, `tools`, `qy`, `penalty`, `timecharge`) VALUES
(1, 444, 1, '1', 1, '2019-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `pos_name`) VALUES
(1, 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL,
  `sec_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`) VALUES
(1, '3A');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(11) NOT NULL,
  `toolname` varchar(100) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `toolname`, `price`, `quantity`) VALUES
(1, 'crimper', '100.00', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `tools` (`tools`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `department` (`department`),
  ADD KEY `section` (`section`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`pen_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `tools` (`tools`),
  ADD KEY `penalty` (`penalty`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `pen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`borrower`) REFERENCES `borrower` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`tools`) REFERENCES `tools` (`tool_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrower_ibfk_3` FOREIGN KEY (`section`) REFERENCES `section` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrower_ibfk_4` FOREIGN KEY (`position`) REFERENCES `position` (`pos_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penalty`
--
ALTER TABLE `penalty`
  ADD CONSTRAINT `penalty_ibfk_1` FOREIGN KEY (`borrower`) REFERENCES `borrower` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penalty_ibfk_2` FOREIGN KEY (`tools`) REFERENCES `tools` (`tool_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penalty_ibfk_4` FOREIGN KEY (`penalty`) REFERENCES `penalties` (`pen_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
