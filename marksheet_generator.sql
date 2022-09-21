-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 07:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marksheet_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` int(11) NOT NULL,
  `institutionname` varchar(225) NOT NULL,
  `institutionlocation` varchar(225) NOT NULL,
  `institutiondesciption` varchar(225) NOT NULL,
  `institutionlogo` varchar(225) NOT NULL,
  `classteacher` varchar(225) NOT NULL,
  `classteachersign` varchar(225) NOT NULL,
  `hod` varchar(225) NOT NULL,
  `hodsign` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `institutionname`, `institutionlocation`, `institutiondesciption`, `institutionlogo`, `classteacher`, `classteachersign`, `hod`, `hodsign`) VALUES
(1, 'PILLAI COLLEGE OF ARTS, COMMERCE AND SCIENCE', 'New Panvel', 'NAAC Accredited \'A\' Grade', 'logo.png', 'NAHEZ SAKHARKAR', 'sign1.png', 'SAKHARKAR NAHEZ', 'sign2.png'),
(2, 'PILLAI COLLEGE OF ARTS, COMMERCE AND SCIENCE', 'New Panvel', 'NAAC Accredited \'A\' Grade', 'logo.png', 'NAHEZ SAKHARKAR', 'sign1.png', 'SAKHARKAR NAHEZ', 'sign2.png'),
(3, 'PILLAI COLLEGE OF ARTS, COMMERCE AND SCIENCE', 'New Panvel', 'NAAC Accredited A Grade', 'logo.png', 'NAHEZ SAKHARKAR', 'sign1.png', 'NAAC Accredited A Grade', 'sign2.png'),
(4, 'PILLAI COLLEGE OF ARTS, COMMERCE AND SCIENCE', 'New Panvel', 'sefwdqqr', 'logo.png', 'NAHEZ SAKHARKAR', 'sign1.png', 'sefwdqqr', 'sign2.png');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) NOT NULL,
  `grade` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `percent` varchar(225) NOT NULL,
  `remark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `grade`, `total`, `percent`, `remark`) VALUES
(1, 'A', '857/1050', '81.62%', 'Successful'),
(2, 'B', '249/400', '62.25%', 'Successful'),
(3, 'C', '92/225', '40.89%', 'Unsuccessful'),
(4, 'B', '119/164', '72.56%', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `marksheets`
--

CREATE TABLE `marksheets` (
  `id` int(100) NOT NULL,
  `studentname` varchar(225) NOT NULL,
  `mothername` varchar(225) NOT NULL,
  `rollno` varchar(225) NOT NULL,
  `class` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `merit` varchar(225) NOT NULL,
  `semester` varchar(225) NOT NULL,
  `madeby` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marksheets`
--

INSERT INTO `marksheets` (`id`, `studentname`, `mothername`, `rollno`, `class`, `department`, `merit`, `semester`, `madeby`, `status`, `time`) VALUES
(1, 'NAHEZ MANSOOR SAKHARKAR', 'NAGEENA', '9212', 'B', 'Bsc. Computer Science : ', 'TY', 'V', 'nahezsakharkar@gmail.com', 'Posted', '2021-09-19 10:32:54.000000'),
(2, 'SHARUKH KHAN', 'FATIMA', 'SRK02', 'A', 'Bsc. Computer Science : ', '8th', 'II', 'nahezsakharkar@gmail.com', 'Pending', '2021-09-19 15:46:40.000000'),
(3, 'ATIF ASLAM', 'REHANA', 'ATAS', 'A', 'Bsc. Singing : ', '3rd', 'I', 'tauqirkhan@gmail.com', 'Posted', '2021-09-19 18:03:52.000000'),
(4, 'RAJU RAJSTOGI', 'POOJA', '3261', 'A', 'Bsc. Computer Science : ', '11TH', 'I', 'nahezsakharkar@gmail.com', 'Posted', '2021-09-20 04:41:06.000000');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `email` varchar(225) NOT NULL,
  `passwd` varchar(225) NOT NULL,
  `question` varchar(225) NOT NULL,
  `answer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`email`, `passwd`, `question`, `answer`) VALUES
('alishashaikh@gmail.com', 'Allumasiha123', '', ''),
('nahezsakharkar@gmail.com', 'Nahez1234', 'What is my Nickname ?', 'Naiju'),
('sharukhkhan@gmail.com', 'Srk123', '', ''),
('tauqirkhan@gmail.com', 'Tauqir123', 'My Favorite Singer ?', 'Atif Aslam'),
('yashpednekar@gmail.com', 'Meow123', 'My Gamer Tag ?', 'Blaze');

-- --------------------------------------------------------

--
-- Table structure for table `subject1`
--

CREATE TABLE `subject1` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject1`
--

INSERT INTO `subject1` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'AD', 'ANDROID DEVELOPMENT', '45/60', '33/50', '34/40', '112/150', 'B'),
(2, 'Phy', 'Physics', '34/50', '23/30', '15/20', '72/100', 'B'),
(3, 'VT', 'Vocal Training', '5/10', '34/60', '3/5', '42/75', 'B'),
(4, 'Phy', 'Physics', '96/99', '12/20', '11/45', '119/164', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `subject2`
--

CREATE TABLE `subject2` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject2`
--

INSERT INTO `subject2` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'GP', 'GAME PROGRAMMING', '60/60', '33/50', '34/40', '120/150', 'A'),
(2, 'Che', 'Chemestry', '47/50', '23/30', '15/20', '85/100', 'O'),
(3, 'PT', 'Pitch Training', '6/10', '34/60', '3/5', '31/75', 'C'),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject3`
--

CREATE TABLE `subject3` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject3`
--

INSERT INTO `subject3` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'INS', 'NETWORK SECURITY', '50/60', '45/50', '35/40', '130/150', 'O'),
(2, 'Mat', 'Maths', '20/50', '10/30', '10/20', '40/100', 'C'),
(3, 'RB', 'Resonance Building', '7/10', '11/60', '1/5', '19/75', 'F'),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject4`
--

CREATE TABLE `subject4` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject4`
--

INSERT INTO `subject4` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'WS', 'WEB SERVICES', '34/60', '40/50', '34/40', '108/150', 'B'),
(2, 'Mar', 'Marathi', '30/50', '12/30', '10/20', '52/100', 'B'),
(3, '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject5`
--

CREATE TABLE `subject5` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject5`
--

INSERT INTO `subject5` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'STQA', 'SOFTWARE TESTING', '51/60', '32/50', '40/40', '123/150', 'A'),
(2, '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject6`
--

CREATE TABLE `subject6` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject6`
--

INSERT INTO `subject6` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'LNX', 'LINUX', '46/60', '42/50', '38/40', '126/150', 'A'),
(2, '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject7`
--

CREATE TABLE `subject7` (
  `id` int(10) NOT NULL,
  `code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `theory` varchar(225) NOT NULL,
  `practical` varchar(225) NOT NULL,
  `internal` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `grade` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject7`
--

INSERT INTO `subject7` (`id`, `code`, `name`, `theory`, `practical`, `internal`, `total`, `grade`) VALUES
(1, 'EI', 'EMOTIONAL INTELLIGENCE', '58/60', '50/50', '30/40', '138/150', 'O'),
(2, '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `pfp` varchar(225) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `surname`, `email`, `passwd`, `dob`, `phone`, `profession`, `institution`, `pfp`, `datetime`) VALUES
('Alisha', 'Shaikh', 'alishashaikh@gmail.com', 'Allumasiha123', '0000-00-00', '', 'Singer', 'T-Series', 'pfp-placeholder.png', '2021-09-08 18:30:00'),
('Nahez', 'Sakharkar', 'nahezsakharkar@gmail.com', 'Nahez1234', '2001-10-10', '9769326135', 'Computer Science Professor', 'Pillai College', '1632112775_Nahez.jpg', '2021-09-08 18:30:00'),
('Sharukh', 'Khan', 'sharukhkhan@gmail.com', 'Srk123', '1965-11-02', '', 'Actor', 'Bollywood', '1631201365_Sharukh.jpg', '2021-09-08 18:30:00'),
('Tauqir', 'Khan', 'tauqirkhan@gmail.com', 'Tauqir123', '2000-09-05', '8108554466', 'Singer', 'Saregamapa', '1631134273_Tauqir.jpeg', '2021-09-08 18:30:00'),
('Yash', 'Pednekar', 'yashpednekar@gmail.com', 'Meow123', '2002-04-01', '9967541232', 'Gamer', 'Twitch', 'pfp-placeholder.png', '2021-09-08 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheets`
--
ALTER TABLE `marksheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `subject1`
--
ALTER TABLE `subject1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject2`
--
ALTER TABLE `subject2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject3`
--
ALTER TABLE `subject3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject4`
--
ALTER TABLE `subject4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject5`
--
ALTER TABLE `subject5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject6`
--
ALTER TABLE `subject6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject7`
--
ALTER TABLE `subject7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marksheets`
--
ALTER TABLE `marksheets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject1`
--
ALTER TABLE `subject1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject2`
--
ALTER TABLE `subject2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject3`
--
ALTER TABLE `subject3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject4`
--
ALTER TABLE `subject4`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject5`
--
ALTER TABLE `subject5`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject6`
--
ALTER TABLE `subject6`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject7`
--
ALTER TABLE `subject7`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
