-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 01:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sailors`
--

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `BID` int(3) NOT NULL,
  `BNAME` varchar(10) NOT NULL,
  `COLOR` varchar(10) NOT NULL,
  `RATE` int(3) NOT NULL,
  `LENGTH` int(2) NOT NULL,
  `logKeeper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`BID`, `BNAME`, `COLOR`, `RATE`, `LENGTH`, `logKeeper`) VALUES
(101, 'Interlake', 'blue', 350, 30, 95),
(102, 'Interlake', 'red', 275, 23, 22),
(103, 'Clipper', 'green', 160, 15, 85),
(104, 'Marine', 'red', 195, 24, 22),
(105, 'Weekend Rx', 'white', 500, 43, 31),
(106, 'C#', 'red', 300, 27, 32),
(107, 'Bayside', 'white', 350, 32, 85),
(108, 'C++', 'blue', 100, 12, 95);

-- --------------------------------------------------------

--
-- Stand-in structure for view `busysailors`
-- (See below for the actual view)
--
CREATE TABLE `busysailors` (
`SID` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `busysailors2`
-- (See below for the actual view)
--
CREATE TABLE `busysailors2` (
`SID` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmpID` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `EmpRoleID` varchar(10) NOT NULL,
  `EmpLName` varchar(50) NOT NULL,
  `EmpFName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmpID`, `Password`, `EmpRoleID`, `EmpLName`, `EmpFName`) VALUES
('FLEENORV', 'MYTEST', 'ADMIN', 'FLEENOR', 'VICTORIA');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lazysailors`
-- (See below for the actual view)
--
CREATE TABLE `lazysailors` (
`SID` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `log_sailors`
--

CREATE TABLE `log_sailors` (
  `CHANGE_USER` int(50) NOT NULL,
  `BEFORE_RATING` int(2) NOT NULL,
  `AFTER_RATING` int(2) NOT NULL,
  `CHANGE_DESC` varchar(50) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_sailors`
--

INSERT INTO `log_sailors` (`CHANGE_USER`, `BEFORE_RATING`, `AFTER_RATING`, `CHANGE_DESC`, `DATE`) VALUES
(0, 3, 2, 'Sailor Record Update: old rating =  3 new rating =', '2019-04-05 08:53:30'),
(0, 2, 1, 'Sailor Record Update: old rating =  2 new rating =', '2019-04-05 09:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `BID` int(3) NOT NULL,
  `SID` int(2) NOT NULL,
  `forDate` date NOT NULL,
  `onDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`BID`, `SID`, `forDate`, `onDate`) VALUES
(101, 64, '2003-09-05', '2003-08-27'),
(101, 22, '2003-10-10', '2003-10-03'),
(102, 22, '2003-10-14', '2003-10-10'),
(102, 31, '2003-10-20', '2003-10-10'),
(102, 64, '2003-11-20', '2003-11-03'),
(103, 74, '2003-10-18', '2003-08-04'),
(103, 22, '2003-11-03', '2003-10-10'),
(103, 31, '2003-11-22', '2003-10-20'),
(104, 31, '2003-11-23', '2003-10-20'),
(105, 58, '2003-10-14', '2003-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `sailors`
--

CREATE TABLE `sailors` (
  `SID` int(2) NOT NULL,
  `SNAME` varchar(10) NOT NULL,
  `RATING` int(2) NOT NULL,
  `AGE` int(2) NOT NULL,
  `TRAINEE` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sailors`
--

INSERT INTO `sailors` (`SID`, `SNAME`, `RATING`, `AGE`, `TRAINEE`) VALUES
(22, 'Dustin', 7, 45, 85),
(29, 'Brutus', 1, 33, NULL),
(31, 'Lubber', 8, 55, 85),
(32, 'Andy', 8, 25, 31),
(58, 'Rusy', 10, 35, 32),
(64, 'Horatio', 7, 35, 22),
(71, 'Zorba', 10, 16, 32),
(74, 'Horatio', 9, 40, 95),
(85, 'Art', 3, 25, 29),
(95, 'Bob', 3, 63, NULL);

--
-- Triggers `sailors`
--
DELIMITER $$
CREATE TRIGGER `sailors` AFTER UPDATE ON `sailors` FOR EACH ROW BEGIN
INSERT into log_sailors VALUES (
    user(),
    OLD.RATING,
    NEW.RATING,
    CONCAT('Sailor Record Update: old rating =  ',OLD.RATING,' new rating = ', NEW.RATING),
    NOW()
);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `busysailors`
--
DROP TABLE IF EXISTS `busysailors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `busysailors`  AS  select `reservations`.`SID` AS `SID` from `reservations` ;

-- --------------------------------------------------------

--
-- Structure for view `busysailors2`
--
DROP TABLE IF EXISTS `busysailors2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `busysailors2`  AS  select `reservations`.`SID` AS `SID` from `reservations` ;

-- --------------------------------------------------------

--
-- Structure for view `lazysailors`
--
DROP TABLE IF EXISTS `lazysailors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lazysailors`  AS  select `s`.`SID` AS `SID` from (`sailors` `s` left join `reservations` `r` on((`s`.`SID` = `r`.`SID`))) where isnull(`r`.`SID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`BID`,`forDate`);

--
-- Indexes for table `sailors`
--
ALTER TABLE `sailors`
  ADD PRIMARY KEY (`SID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
