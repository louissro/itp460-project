-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2023 at 11:31 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itp460_team3`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`) VALUES
(1, 'Pro Ember Data');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `feature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`) VALUES
(1, 'cushioned seats'),
(2, 'windows'),
(3, 'dim lighting'),
(4, '24 hours'),
(5, 'printer'),
(6, 'conference table'),
(7, 'ergonomic chairs'),
(8, 'private meeting rooms'),
(9, 'courtyard'),
(10, 'cafeteria'),
(11, 'computers'),
(12, 'reclinable chairs'),
(13, 'natural lighting'),
(15, 'studying stairwell'),
(16, 'multilevel'),
(17, 'vending machines'),
(18, 'outdoor seating'),
(19, 'long tables'),
(20, 'noise proof windows');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `libraryName` varchar(255) DEFAULT NULL,
  `numOfPods` int(11) DEFAULT NULL,
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `libraryFeatures` int(11) DEFAULT NULL,
  `picture` text,
  `picture4` text,
  `picture3` text,
  `picture2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `libraryName`, `numOfPods`, `description`, `location`, `libraryFeatures`, `picture`, `picture4`, `picture3`, `picture2`) VALUES
(1, 'Doheny Library', 5, 'Doheny Library is known for its traditional atmosphere and silent surroundings. Although the library is numerous floors, there are only a few halls designated for studying.  ', 'Center Campus', 1, 'Doheny_Inside.jpeg', 'Doheny_Outside2.jpeg', 'Doheny_Outside.jpeg', 'Doheny_Inside2.jpeg'),
(2, 'Ronald Tutor Hall', 5, 'RTH is on the southern part of campus and serves as a reliable study spot for its multiple floors of lounge areas.', 'East Campus', 10, 'RTH_1.jpeg', 'RTH_Outside.jpeg', 'RTH_3.jpeg', 'RTH_2.jpeg'),
(3, 'Leavey Library', 5, 'Leavey Library provides a state-of-the-art learning environment for students and faculty at the University of Southern California.', 'North-East Campus', 4, 'Leavey_Inside.jpeg', 'Leavey_Inside2.webp', 'Leavey_Side.jpeg', 'Leavey_Outside.jpeg'),
(4, 'Jill and Frank Fertitta Hall ', 5, 'Intensely collaborative and interactive utilizing the latest technology to provide abundant support spaces creating the student-centric environment with social gathering, food services, lounges, and study space.', 'South-East Campus', 8, 'Fertitta_Inside.jpeg', 'Fertitta_Outside.png', 'Fertitta_Inside3.jpeg', 'Fertitta_Inside2.jpeg'),
(5, 'Accounting Library', 5, 'The Accounting Library is in a secluded spot on campus that allows for peace and quiet. On the cozier side, the library has private study rooms that allow for collaboration.', 'East Campus; Leventhal', 11, 'Accounting_Inside1.webp', 'Accounting_Outside.jpeg', 'Accounting_Inside3.webp', 'Accounting_Inside2.webp'),
(6, 'Law Library', 5, 'Open until 11PM, the Law Library is a tucked away library perfect for late night, quiet studying. ', 'South-East Campus; Gould', 19, 'Law_1.jpeg', 'Law_Outside.jpeg', 'Law_3.jpeg', 'Law_2.jpeg'),
(7, 'Hoose Library', 5, 'Quiet library that is secluded and quiet.', 'South-East Campus; Mudd Hall', 3, 'Hoose_Image1.jpeg', 'Hoose_Outside.webp', 'Hoose_Image3.jpeg', 'Hoose_Image2.webp'),
(8, 'VPD', 5, 'Public policy building that has plenty of open study tables and comfortable chairs in the lobby and bottom floors of the building.', 'South-East Campus', 1, 'VPD_Inside1.jpeg', 'VPD_Outside.jpeg', 'VPD_Inside3.jpeg', 'VPD_Inside2.jpeg'),
(9, 'Annenberg Digital Media Lab', 5, 'The DML is a quiet area on the third floor of the Annenberg building dedicated to coworking.', 'West Campus; Annenberg', 13, 'Annenberg_1.jpeg', 'Annenberg_Outside.jpeg', 'Annenberg_3.jpeg', 'Annenberg_2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `library_features`
--

CREATE TABLE `library_features` (
  `id` int(11) NOT NULL,
  `libraryID` int(11) DEFAULT NULL,
  `featureID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_features`
--

INSERT INTO `library_features` (`id`, `libraryID`, `featureID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 10),
(5, 2, 9),
(6, 3, 4),
(7, 3, 5),
(8, 3, 6),
(9, 3, 7),
(10, 4, 8),
(11, 4, 8),
(12, 4, 10),
(13, 4, 1),
(14, 4, 11),
(15, 4, 12),
(16, 4, 2),
(17, 4, 13),
(18, 5, 11),
(19, 5, 8),
(20, 5, 5),
(21, 6, 19),
(22, 6, 8),
(23, 6, 5),
(24, 6, 1),
(25, 7, 3),
(26, 7, 20),
(27, 8, 1),
(28, 8, 15),
(29, 8, 16),
(30, 8, 13),
(31, 8, 18),
(32, 8, 17),
(33, 9, 13),
(34, 9, 11),
(35, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date` text,
  `library_id` int(11) DEFAULT NULL,
  `time` text,
  `room` int(3) DEFAULT NULL,
  `student_email` text,
  `student_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `library_id`, `time`, `room`, `student_email`, `student_name`) VALUES
(12, '5/3', 5, '7:00AM', 1, 'asperez@usc.edu', 'Ashley Perez'),
(14, '5/10', 9, '6:30AM', 1, 'asperez@usc.edu', 'Ashley Perez'),
(16, '5/10', 9, '6:30AM', 2, 'asperez@usc.edu', 'Ashley Perez'),
(17, '5/3', 3, '7:00AM', 1, 'asperez@usc.edu', 'Ashley Perez'),
(32, '5/3', 1, '7:30AM', 1, 'asperez@usc.edu', 'Ashley Perez'),
(34, '5/3', 3, '7:00AM', 2, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libraryFeatures` (`libraryFeatures`);

--
-- Indexes for table `library_features`
--
ALTER TABLE `library_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_id` (`libraryID`),
  ADD KEY `feature_id` (`featureID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_id` (`library_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `library_features`
--
ALTER TABLE `library_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`libraryFeatures`) REFERENCES `library_features` (`id`);

--
-- Constraints for table `library_features`
--
ALTER TABLE `library_features`
  ADD CONSTRAINT `library_features_ibfk_1` FOREIGN KEY (`libraryID`) REFERENCES `library` (`id`),
  ADD CONSTRAINT `library_features_ibfk_2` FOREIGN KEY (`featureID`) REFERENCES `features` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `library` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
