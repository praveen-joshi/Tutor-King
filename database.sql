-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2020 at 09:50 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `sno` int NOT NULL,
  `student_eml` varchar(100) NOT NULL,
  `tutor_eml` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `subject` varchar(100) NOT NULL,
  `sname` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`sno`, `student_eml`, `tutor_eml`, `name`, `subject`, `sname`, `status`) VALUES
(200, 'praveenjoshi9999@gmail.com', 'rahul@gmail.com', 'Rahul', 'indore', 'praveen Joshi', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `tutor` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`tutor`, `subject`, `video`) VALUES
('rahul@gmail.com', 'php', 'tvideo/JOKE.3gp'),
('rahul@gmail.com', 'C++', 'tvideo/VID-20160601-WA0000.mp4'),
('rahul@gmail.com', 'java', 'tvideo/1.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sno` int NOT NULL,
  `nm` text NOT NULL,
  `gender` text NOT NULL,
  `eid` varchar(100) NOT NULL,
  `ct` text NOT NULL,
  `ad` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `profile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sno`, `nm`, `gender`, `eid`, `ct`, `ad`, `pwd`, `profile`) VALUES
(25, 'praveen Joshi', 'male', 'praveenjoshi9999@gmail.com', 'indore', '53,manik chowk indore near rajwada', '123456', 'sphoto/IMG_20200322_132647-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `sno` int NOT NULL,
  `nm` text NOT NULL,
  `gender` text NOT NULL,
  `ct` text NOT NULL,
  `ph` int NOT NULL,
  `eid` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `hq` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `coll` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `profile` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`sno`, `nm`, `gender`, `ct`, `ph`, `eid`, `pwd`, `hq`, `coll`, `profile`) VALUES
(20, 'Rahul', 'male', 'indore', 99999999, 'rahul@gmail.com', '123456', 'B.Tech', 'Sviit', 'tphoto/1-s2.0-S092040830280010X-f07-01-9780444500007.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `student_eml` (`student_eml`,`tutor_eml`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `eid` (`eid`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
