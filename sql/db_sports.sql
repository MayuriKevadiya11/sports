-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 10:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher_detail`
--

CREATE TABLE IF NOT EXISTS `assign_teacher_detail` (
  `student_id` bigint(100) NOT NULL,
  `teacher_id` int(100) NOT NULL,
  PRIMARY KEY (`student_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `issue_detail`
--

CREATE TABLE IF NOT EXISTS `issue_detail` (
  `issue_id` int(100) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(100) NOT NULL,
  `teacher_id` int(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `issue_start_date` date NOT NULL,
  `issue_end_date` date NOT NULL,
`starting_time` varchar(12) NOT NULL,`ending_time` varchar(12) NOT NULL,    `student_description` varchar(25000) NOT NULL,
  `teacher_description` varchar(25000) DEFAULT 'Not Available',
  `status` varchar(50) DEFAULT 'not seen your request yet',
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
--


-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE IF NOT EXISTS `student_detail` (
  `student_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `student_gender` varchar(20) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_phone_no` bigint(20) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_email` (`student_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151290107001 ;



-- --------------------------------------------------------

--
-- Table structure for table `teacher_detail`
--

CREATE TABLE IF NOT EXISTS `teacher_detail` (
  `teacher_id` int(100) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_password` varchar(50) NOT NULL,
  `teacher_gender` varchar(10) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_phone_no` bigint(20) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_email` (`teacher_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=01 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
