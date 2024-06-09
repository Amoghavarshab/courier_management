-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 01:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `courierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adlogin`
--

CREATE TABLE `adlogin` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adlogin`
--

INSERT INTO `adlogin` (`email`, `password`, `a_id`) VALUES
('admin1@gmail.com', '12345', 1),
('admin2@gmail.com', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pnumber` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `email`, `name`, `pnumber`) VALUES
(1, 'admin1@gmail.com', 'Admin1', 12345),
(2, 'admin2@gmail.com', 'Admin2', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `subject`, `msg`) VALUES
(5, 'mavs_1@gmail.com', 'LOST', 'MY package is lost'),
(103, 'ishu@gmail.com', 'Package Damage', 'MY package is damaged, do contact me ASAP');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `c_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `semail` varchar(50) DEFAULT NULL,
  `remail` varchar(50) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `rname` varchar(50) DEFAULT NULL,
  `sphone` varchar(20) DEFAULT NULL,
  `rphone` varchar(20) DEFAULT NULL,
  `saddress` varchar(50) DEFAULT NULL,
  `raddress` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `billno` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`c_id`, `u_id`, `semail`, `remail`, `sname`, `rname`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`, `date`) VALUES
(13, 12, 'anas@gmail.com', 'ishan@gmail.com', 'anas', 'ishaan', '123456', '654321', 'goa', 'noida', 5, 12, 'cddd.jpeg', '2022-01-18'),
(16, 13, 'mavs_1@gmail.com', 'shanu@gmail.com', 'maviya', 'shanu', '987654321', '987123456', 'delhi', 'pune', 5, 11, '2959860-science-fiction-artwork-robot___abstract-wallpapers.jpg', '2022-01-21'),
(17, 105, 'ishu@gmail.com', 'lisa@gmail.com', 'ishaan', 'lisa', '2147483647', '2474851756', 'noida', 'indore', 4, 10, 'fc.png', '2022-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `u_id`) VALUES
('anas@gmail.com', 'anas1', 12),
('mavs_1@gmail.com', 'mav1', 13),
('ishu@gmail.com', 'ishaan1', 105);

-- --------------------------------------------------------

--
-- Table structure for table `logss`
--

CREATE TABLE `logss` (
  `user_id` int(11) NOT NULL,
  `action_time` datetime NOT NULL,
  `action_performed` text NOT NULL,
  `action_performed_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logss`
--

INSERT INTO `logss` (`user_id`, `action_time`, `action_performed`, `action_performed_by`) VALUES
(104, '2022-01-19 01:09:29', 'USER DELETED', 'USER'),
(1, '2022-01-19 01:09:43', 'USER DELETED', 'USER'),
(105, '2022-01-21 18:02:07', 'USER CREATED', 'USER'),
(102, '2022-01-21 18:11:57', 'USER DELETED', 'USER'),
(14, '2022-01-21 18:13:06', 'USER CREATED', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pnumber` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `name`, `pnumber`) VALUES
(12, 'anas@gmail.com', 'mohd anas', 123456789),
(13, 'mavs_1@gmail.com', 'maviya hassan', 987654321),
(14, 'javed@gmail.com', 'S javed', 2118529630),
(105, 'ishu@gmail.com', 'ishaan', 2147483647);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `Customer_insert` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO Logss VALUES(NEW.u_id,NOW(),'USER CREATED','USER')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_deleted` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO Logss VALUES(OLD.u_id,NOW(),'USER DELETED','USER')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adlogin`
--
ALTER TABLE `adlogin`
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `billno` (`billno`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adlogin`
--
ALTER TABLE `adlogin`
  ADD CONSTRAINT `adlogin_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`);

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;
COMMIT;