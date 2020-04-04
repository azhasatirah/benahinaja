-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 04:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `benahinaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_akses`
--

CREATE TABLE IF NOT EXISTS `log_akses` (
  `login_id` int(10) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datelogin` date NOT NULL,
  `timelogin` time NOT NULL,
  `timelogout` time NOT NULL,
  `status` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_akses`
--

INSERT INTO `log_akses` (`login_id`, `username`, `datelogin`, `timelogin`, `timelogout`, `status`, `hak_akses`) VALUES
(0, '	', '2020-03-30', '17:40:45', '00:00:00', '1', '	'),
(0, 'admin', '2020-03-24', '16:05:29', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:48:51', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:49:28', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:50:32', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:52:17', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:52:51', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '06:53:38', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '07:19:10', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '07:21:51', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '07:22:38', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '07:23:13', '00:00:00', '1', ''),
(0, 'admin', '2020-03-29', '07:23:37', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:46:30', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:47:43', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:47:49', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:48:38', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:53:01', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '13:59:48', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '14:07:09', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '14:17:33', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '14:26:47', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '14:39:29', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '14:39:37', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '14:40:50', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:15:50', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:16:23', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:18:45', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:20:53', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:31:56', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:39:09', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:41:53', '00:00:00', '1', 'admin'),
(0, 'admin', '2020-03-30', '16:57:54', '00:00:00', '1', ''),
(0, 'admin', '2020-03-30', '16:58:18', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-29', '07:24:06', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '13:53:10', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '13:59:57', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '14:00:36', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '14:07:20', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '14:17:43', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '14:26:59', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '14:39:46', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '14:40:30', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '16:16:34', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '16:21:02', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '16:27:12', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '16:41:47', '00:00:00', '1', 'admin'),
(0, 'supplier', '2020-03-30', '16:58:10', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '16:58:28', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:19:43', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:22:33', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:26:02', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:27:20', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:32:34', '00:00:00', '1', 'supplier'),
(0, 'supplier', '2020-03-30', '17:32:42', '00:00:00', '1', 'supplier'),
(0, 'supplier', '2020-03-30', '17:32:50', '00:00:00', '1', 'supplier'),
(0, 'supplier', '2020-03-30', '17:34:30', '00:00:00', '1', 'supplier'),
(0, 'supplier', '2020-03-30', '17:35:32', '00:00:00', '1', 'supplier'),
(0, 'supplier', '2020-03-30', '17:39:09', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:39:16', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:40:05', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:47:47', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:47:58', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:48:40', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:49:42', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:49:51', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:50:42', '00:00:00', '1', ''),
(0, 'supplier', '2020-03-30', '17:50:50', '00:00:00', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_login`
--

CREATE TABLE IF NOT EXISTS `master_login` (
`login_id` int(10) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(10) NOT NULL,
  `hak_akses` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_login`
--

INSERT INTO `master_login` (`login_id`, `username`, `password`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `hak_akses`) VALUES
(1, 'admin', 'admin', 1, '2019-11-07', 1, '2019-11-07', 1, 'admin'),
(2, 'tukang', 'tukang', 1, '2020-03-03', 1, '2020-03-03', 1, 'tukang'),
(3, 'customer', 'customer', 1, '2020-03-18', 1, '2020-03-25', 1, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_akses`
--
ALTER TABLE `log_akses`
 ADD PRIMARY KEY (`login_id`,`username`,`datelogin`,`timelogin`);

--
-- Indexes for table `master_login`
--
ALTER TABLE `master_login`
 ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_login`
--
ALTER TABLE `master_login`
MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
