-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 11:35 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_data`
--

CREATE TABLE `basic_data` (
  `decs` varchar(20) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_data`
--

INSERT INTO `basic_data` (`decs`, `value`) VALUES
('total sites visit', 302);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `reciver_user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender_user_id`, `reciver_user_id`, `amount`, `timestamp`) VALUES
(2, 11, 1, 10000, '2021-04-06 20:55:18'),
(3, 2, 4, 1000, '2021-04-06 21:31:38'),
(7, 1, 12, 100, '2021-04-06 21:38:08'),
(8, 1, 12, 100, '2021-04-06 21:39:33'),
(9, 1, 12, 100, '2021-04-06 21:41:13'),
(10, 1, 12, 100, '2021-04-06 21:42:06'),
(11, 1, 12, 1000, '2021-04-06 21:47:55'),
(12, 10, 1, 1000, '2021-04-07 07:50:32'),
(14, 1, 9, 5000, '2021-04-07 08:06:45'),
(15, 1, 12, 5000, '2021-04-07 15:21:14'),
(16, 10, 5, 3000, '2021-04-07 15:21:29'),
(17, 2, 3, 5000, '2021-04-07 15:21:41'),
(18, 8, 7, 5050, '2021-04-07 15:21:55'),
(19, 4, 13, 1230, '2021-04-07 20:41:21'),
(23, 1, 18, 1234, '2021-04-08 20:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `balance`) VALUES
(1, 'Shubham', 'Kothari', 'sk@sk.in', 46336),
(2, 'Aniket', 'Kurkute', 'ak@ak.com', 15000),
(3, 'Atul', 'gadekar', 'ag@ag.com', 13800),
(4, 'vishal', 'kutarkar', 'vk@vk.com', 18770),
(5, 'vinayak', 'thakur', 'vt@vt.com', 8000),
(6, 'vibhavi', 'patange', 'vp@vp.com', 5000),
(7, 'shreyika', 'mandale', 'sm@sm.com', 45050),
(8, 'kartik', 'rane', 'kr@kr.com', 24950),
(9, 'shivam', 'bhasin', 'sb@sb.com', 65000),
(10, 'Spandan', 'Londhe', 'sl@sl.com', 36000),
(11, 'Dharmesh', 'Kothari', 'dk@dk.com', 990000),
(12, 'Spider', 'man', 'spidy@marvel.com', 26000),
(13, 'hitman', 'show', 'hitman@himan.com', 13230),
(18, 'Sumit ', 'sakpal', 'sumit@sakpal.com', 13234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `reciver_user_id` (`reciver_user_id`),
  ADD KEY `sender_user_id` (`sender_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`reciver_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`sender_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
