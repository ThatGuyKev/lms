-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2019 at 02:21 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdetails`
--

DROP TABLE IF EXISTS `bookdetails`;
CREATE TABLE IF NOT EXISTS `bookdetails` (
  `ID` int(10) NOT NULL,
  `bookID` int(20) NOT NULL,
  `Annotation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AR_Level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AR_Points` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Binding` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Illustrator` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Interest_Level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Lexile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `List_Price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Publication_Date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Reading_Level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Reading_Recovery_Level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Teachers_College` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Word_Count` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Guided_Reading_Level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `bookID` (`bookID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookdetails`
--

INSERT INTO `bookdetails` (`ID`, `bookID`, `Annotation`, `AR_Level`, `AR_Points`, `Binding`, `Illustrator`, `Interest_Level`, `Lexile`, `List_Price`, `Publication_Date`, `Publisher`, `Reading_Level`, `Reading_Recovery_Level`, `Teachers_College`, `Word_Count`, `Guided_Reading_Level`) VALUES
(1, 17, ' GSDGHSD', ' GSHSD', ' GFSGHSD', ' GSDGS', ' GSDFGS', ' fsdfs', ' GSDGD', ' HREWTSDG', ' GSDFGS', ' GSDSG', ' GSDDGSF', ' GSDGS', ' GSDFGS', ' SDFGSG', '1');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Author` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Grade_Level` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fiction_Nonfiction_F_NF` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Page_Count` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Genre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Condi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrowed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`bookID`),
  UNIQUE KEY `ISBN` (`ISBN`),
  KEY `ISBN_2` (`ISBN`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `ISBN`, `Title`, `Author`, `Grade_Level`, `Fiction_Nonfiction_F_NF`, `Page_Count`, `Language`, `Location`, `Genre`, `Condi`, `borrowed`) VALUES
(17, '978-0-7097-2440-7', 'Early Readers Three Read Along Stories', 'brown watson', 'reception, 1', 'VD', '52', 'Arabic', 'House', 'Kids', '', NULL),
(16, '978-0-7097-2401-8', 'My First Words and Pictures', 'brown watson', 'reception, 1', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '978-0-7097-2266-3', 'My First Phonics', 'brown watson', 'reception, 1', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '978-0-7097-2423-0', 'First Words', 'brown watson', 'reception', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '978-0-7097-0865-0', 'My First Picture Dictionary', 'brown watson', 'reception , 1', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '978-0-7097-1876-5', 'Bill The Postman', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '978-0-7097-1875-8', 'Tom The Vet', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '978-0-7097-1874-1', 'Jack The Farmer', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '978-0-7097-1877-2', 'Dan The Fireman', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '978-0-7097-1700-3', 'Little Lamb', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '978-0-7097-1697-6', 'Puppy Dog', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '978-0-7097-1698-3', 'Kitty Cat', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '978-0-7097-1699-0', 'Daisy Duck', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '978-0-7097-1617-4', 'Toby The Truck', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '978-0-7097-1614-3', 'Tom The Tractor', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '978-0-7097-1615-0', 'Danny the Digger', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(1, '978-0-7097-1616-7', 'Freddie The Fire Engine', 'brown watson', 'receptin', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(19, '978-0-7097-2438-4', 'Early Readers Three Read Along Stories', 'brown watson', 'reception, 1', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(20, '978-0-7097-2437-7', 'Early Readers Three Read Along Stories', 'brown watson', 'reception, 1', 'F', NULL, NULL, NULL, NULL, NULL, NULL),
(21, '978-0-7097-2225-0', 'The Big Book of How When and Why', 'brown watson', '5, 6', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(22, '978-0-7097-2223-6', 'The Big Book of Animals', 'brown watson', '5,6', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(23, '978-0-7097-2222-9', 'The Big Book of Science', 'brown watson', '5,6', 'NF', NULL, NULL, NULL, NULL, NULL, NULL),
(24, '5345', 'Esra', 'Ahmed', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `borrowID` int(20) NOT NULL AUTO_INCREMENT,
  `studentID` int(20) NOT NULL,
  `bookID` int(20) NOT NULL,
  `issueDate` date NOT NULL,
  `returned` tinyint(1) NOT NULL,
  `returnDate` date DEFAULT NULL,
  PRIMARY KEY (`borrowID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowID`, `studentID`, `bookID`, `issueDate`, `returned`, `returnDate`) VALUES
(2, 3, 17, '2019-05-20', 1, '2019-05-20'),
(3, 11, 17, '2019-05-20', 1, '2019-05-20'),
(4, 40, 1, '2019-05-20', 1, '2019-05-20'),
(5, 40, 7, '2019-05-20', 1, '2019-05-20'),
(6, 544, 1, '2019-05-20', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listOfBorrowedBooks` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM AUTO_INCREMENT=545 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `gender`, `class`, `listOfBorrowedBooks`) VALUES
(1, 'Ahmed Abdalla Albashir', 'Male', 'PHP', 'A Song of Ice and Fire'),
(2, 'Hafsa', 'Female', 'CSS', NULL),
(4, 'Bahrain', NULL, NULL, NULL),
(5, 'Cambodia', NULL, NULL, NULL),
(6, 'Cameroon', NULL, NULL, NULL),
(7, 'Denmark', NULL, NULL, NULL),
(8, 'Djibouti', NULL, NULL, NULL),
(9, 'East Timor', NULL, NULL, NULL),
(10, 'Ecuador', NULL, NULL, NULL),
(11, 'Falkland Islands (Malvinas)', NULL, NULL, NULL),
(12, 'Faroe Islands', NULL, NULL, NULL),
(13, 'Gabon', NULL, NULL, NULL),
(14, 'Gambia', NULL, NULL, NULL),
(15, 'Haiti', NULL, NULL, NULL),
(16, 'Heard and Mc Donald Islands', NULL, NULL, NULL),
(17, 'Iceland', NULL, NULL, NULL),
(18, 'India', NULL, NULL, NULL),
(19, 'Jamaica', NULL, NULL, NULL),
(20, 'Japan', NULL, NULL, NULL),
(21, 'Kenya', NULL, NULL, NULL),
(22, 'Kiribati', NULL, NULL, NULL),
(23, 'Lao People\'s Democratic Republic', NULL, NULL, NULL),
(24, 'Latvia', NULL, NULL, NULL),
(25, 'Macau', NULL, NULL, NULL),
(26, 'Macedonia', NULL, NULL, NULL),
(27, 'Namibia', NULL, NULL, NULL),
(28, 'Nauru', NULL, NULL, NULL),
(29, 'Oman', NULL, NULL, NULL),
(30, 'Pakistan', NULL, NULL, NULL),
(31, 'Palau', NULL, NULL, NULL),
(32, 'Qatar', NULL, NULL, NULL),
(33, 'Reunion', NULL, NULL, NULL),
(34, 'Romania', NULL, NULL, NULL),
(35, 'Saint Kitts and Nevis', NULL, NULL, NULL),
(36, 'Saint Lucia', NULL, NULL, NULL),
(37, 'Taiwan', NULL, NULL, NULL),
(38, 'Tajikistan', NULL, NULL, NULL),
(39, 'Uganda', NULL, NULL, NULL),
(40, 'Ukraine', NULL, NULL, NULL),
(41, 'Vanuatu', NULL, NULL, NULL),
(42, 'Vatican City State', NULL, NULL, NULL),
(43, 'Wallis and Futuna Islands', NULL, NULL, NULL),
(44, 'Western Sahara', NULL, NULL, NULL),
(45, 'Yemen', NULL, NULL, NULL),
(46, 'Yugoslavia', NULL, NULL, NULL),
(47, 'Zaire', NULL, NULL, NULL),
(48, 'Zambia', NULL, NULL, NULL),
(543, 'egasd', 'Male', 'fas', NULL),
(3, 'Nora', 'Female', 'Python', NULL),
(544, 'Esra Abdalla Albashir', 'Female', 'C++, Python', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `administrator` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `name`, `administrator`) VALUES
(1, 'ahmed', 'ahmed', 'ahmed', 1),
(4, 'admin', 'admin', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
