-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 06:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nationalmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `age`, `gender`, `address`, `tele`, `username`, `password`, `regDate`, `updationDate`) VALUES
(100, 'Abdi', 'Tadese', '21', 'Male', 'Gimbi', '0900000000', 'abdi', '123456', '2021-06-21 15:44:38', '13-04-2021 11:27:01PM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `docId` int(11) DEFAULT NULL,
  `cardNo` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT NULL,
  `reason` varchar(500) NOT NULL,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `reasonPat` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `docId`, `cardNo`, `appointmentDate`, `appointmentTime`, `postingDate`, `reason`, `userStatus`, `doctorStatus`, `reasonPat`, `status`) VALUES
(24, 5, 1001, '2021-06-30', '4:00 AM', '2021-06-21 08:57:50', 'qwerth', 1, 0, 'Headech', 1),
(26, 5, 1001, '2021-06-30', '3:00 PM', '2021-06-20 22:45:04', 'on', 1, 0, 'please', 1),
(27, 5, 1001, '2021-06-30', '12:30 PM', '2021-06-20 22:50:13', 'Naaf hin qaqqabamu', 1, 0, 'pl', 1),
(28, 5, 1001, '2021-06-30', '3:00 PM', '2021-06-20 23:11:06', 'Naaf hin qaqqabamu', 1, 0, 'well', 1),
(29, 5, 1001, '2021-06-26', '11:00 AM', '2021-06-22 06:59:42', 'Naaf hin qaqqabamu', 1, 0, 'Mataatu na dhukkuba', 1),
(30, 5, 1001, '2021-06-26', '11:00 AM', '2021-06-22 07:01:01', 'fsdssfsdsdsdsds', 1, 0, 'Maalif namana', 1),
(31, 5, 1001, '2028-01-07', '9:00 AM', '2028-01-01 04:32:16', 'fsdssfsdsdsdsds', 1, 0, 'Headche', 1),
(32, 5, 1001, '2033-07-20', '10:30 AM', '2033-07-20 06:10:06', '', 1, 1, 'Head', 1),
(33, 5, 1036, '2033-07-22', '9:00 AM', '2033-07-20 04:34:44', 'Hojiin qaba', 1, 0, 'Mataatu na dhukkuba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 03:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 03:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 03:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 03:39:26', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 03:41:18', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 05:07:53', '0000-00-00 00:00:00'),
(11, 'Dentist', '2021-05-21 09:14:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `specilization` varchar(100) NOT NULL,
  `privilege` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `age`, `gender`, `address`, `tele`, `specilization`, `privilege`, `regDate`, `updationDate`) VALUES
(1, 'Bayisa', 'Wake', 21, 'Male', 'Nekemte', '0930434567', '', 2, '2033-07-20 08:16:32', '2033-07-20 07:16:32'),
(2, 'Moti', 'Amanu', 29, 'Male', 'Nekemte', '0945654543', '', 4, '2033-07-21 21:39:02', '2033-07-21 08:39:02'),
(3, 'Milkiyas', 'Tesfayee', 20, 'Male', 'Gimbi', '0947250634', '', 5, '2033-07-21 21:03:54', '2033-07-21 08:03:54'),
(4, 'Seenaa', 'Amantee', 20, 'Male', 'Gimbi', '0923434556', '', 7, '2033-07-21 20:22:38', '2033-07-21 07:22:38'),
(5, 'Bayisaa', 'Bultum', 29, 'Male', 'Nekemte', '0930434556', 'General Physician', 3, '2021-05-31 04:39:38', '0000-00-00 00:00:00'),
(6, 'Ayyantu', 'Gammadaa', 35, 'Female', 'Gimbi', '0912434565', 'Homeopath', 3, '2021-06-28 05:23:11', '0000-00-00 00:00:00'),
(7, 'Ayana', 'Bulcha', 34, 'Male', 'Nekemte', '0987787878', 'Dermatologist', 3, '2021-06-28 08:48:32', '2021-06-28 07:48:32'),
(8, 'Meti', 'Ayano', 29, 'Female', 'Nekemte', '0978677676', 'Dentist', 3, '2021-06-28 06:51:08', '0000-00-00 00:00:00'),
(10, 'Bahilu', 'Abera', 20, 'Male', 'Hawasa', '0912131415', 'Gynecologist/Obstetrician', 3, '2028-01-01 06:04:08', '0000-00-00 00:00:00'),
(12, 'Abdi', 'Tadese', 23, 'Male', 'Nekemte', '0923232323', '', 1, '2022-11-15 05:21:58', '2022-11-15 03:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `labreport`
--

CREATE TABLE `labreport` (
  `id` int(11) NOT NULL,
  `cardNo` int(11) NOT NULL,
  `docId` int(50) NOT NULL,
  `tid` int(50) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `testDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hema` varchar(1000) NOT NULL,
  `para` varchar(1000) NOT NULL,
  `urin` varchar(1000) NOT NULL,
  `sero` varchar(1000) NOT NULL,
  `chem` varchar(1000) NOT NULL,
  `bact` varchar(1000) NOT NULL,
  `response` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labreport`
--

INSERT INTO `labreport` (`id`, `cardNo`, `docId`, `tid`, `patfname`, `patlname`, `age`, `gender`, `testDate`, `hema`, `para`, `urin`, `sero`, `chem`, `bact`, `response`, `status`) VALUES
(1, 1001, 5, 3, 'Gamachis', 'Girma', 56, 'Female', '2021-06-21 13:34:41', 'Blood group', '', '', '', '', '', '+VE', 0),
(2, 1000, 5, 3, 'Sefu', 'Yaya', 24, 'Male', '2021-06-21 13:34:41', '', '', 'Test for kidney', '', '', '', 'It is ok', 0),
(3, 1000, 5, 3, 'Sefu', 'Yaya', 24, 'Male', '2021-06-21 13:34:41', 'rest in peace', '', '', '', '', '', 'OK', 0),
(4, 1001, 5, 3, 'Gamachis', 'Girma', 56, 'Female', '2021-06-21 13:34:41', '', 'Stool exam', '', '', '', '', 'Positive', 0),
(5, 1000, 5, 3, 'Sefu', 'Yaya', 24, 'Male', '2021-06-21 13:34:41', 'Blood group', '', '', '', '', '', '+VE', 0),
(6, 1000, 5, 3, 'Sefu', 'Yaya', 24, 'Male', '2021-06-21 13:34:41', 'Blood group', '', '', '', '', '', 'O', 0),
(7, 1001, 5, 3, 'Gamachis', 'Girma', 56, 'Female', '2021-06-21 13:34:41', '', '', '', 'HIV Test', '', '', '+VE', 0),
(8, 1028, 5, 3, 'Lensa', 'Gamtaa', 28, 'Female', '2021-06-21 13:34:41', 'CBC', '', '', '', '', '', 'H+', 0),
(9, 1001, 5, 3, 'Gamachis', 'Girma', 56, 'Male', '2021-06-21 13:56:14', '', 'stool', '', '', '', '', 'No problem', 0),
(10, 1000, 5, 3, 'Sefu', 'Yaya', 24, 'Male', '2021-06-22 08:02:20', '', 'stool test', '', '', '', '', '-ve', 0),
(11, 1036, 5, 3, 'Chala', 'Gemeda', 20, 'Male', '2033-07-20 17:28:05', '', '', 'check pedal test', '', '', '', '+VE', 0),
(12, 1038, 5, 3, 'Geta', 'Get', 12, 'Male', '2022-06-17 09:23:42', 'test', 'tset', 'stts', 'test', 'tstst', 'ttt', '-Ve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `cardNo` int(11) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `docId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `drugname` text NOT NULL,
  `dose` text NOT NULL,
  `medstrength` text NOT NULL,
  `administ` text NOT NULL,
  `duration` text NOT NULL,
  `docComment` varchar(500) NOT NULL,
  `pharComment` varchar(500) NOT NULL,
  `adDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `cardNo`, `patfname`, `patlname`, `age`, `gender`, `docId`, `pid`, `drugname`, `dose`, `medstrength`, `administ`, `duration`, `docComment`, `pharComment`, `adDate`, `status`) VALUES
(1, 1000, 'Sefu', 'Yaya', 24, 'Male', 5, 2, 'Diclofenac', '2tab', '500mg', '1m 2m2m2m2m', '5day', 'Make it fast', 'okokokoko', '2021-06-21 13:21:41', 0),
(2, 1000, 'Sefu', 'Yaya', 24, 'Male', 5, 2, 'Ibu', '3 strip', '500mg', 'Ganamaaf galgalaa ija tokko tokko', '5', 'Yaadan qabu', '', '2021-06-21 13:21:41', 0),
(3, 1001, 'Gamachis', 'Girma', 56, 'Female', 5, 2, 'Diclofenac', '3 strip ', ' 500 mg', '1 at Morning and 1 at night after dinner', '5 days', 'No', 'Please take accordingly!', '2021-06-21 13:21:41', 0),
(4, 1001, 'Gamachis', 'Girma', 56, 'Female', 5, 2, '', '', 'HIV test', '', '', '', '', '2021-06-21 13:21:41', 0),
(5, 1001, 'Gamachis', 'Girma', 56, 'Female', 5, 2, 'paractamol', '1 strip', '500mg', '! @ morning and 1 @ night', '5', 'Seeraan kennif immoo. mucaa firaatii', 'Take care of yourself', '2021-06-21 13:21:41', 0),
(6, 1028, 'Lensa', 'Gamtaa', 28, 'Female', 5, 2, 'Diclofenace', '1 strip', '500mg', 'Ganamaf galgalaa ija tokko tokko.', '', '', 'Addarakee seeraan fudhadhuu', '2021-06-21 13:21:41', 0),
(7, 1028, 'Lensa', 'Gamtaa', 28, 'Female', 5, 2, 'diclo', '1 strip', '50mg', 'Ganamaf galgalaa ija tokko tokko.', '5', 'Seeraan kenniif', 'Addarakee seeraan fudhadhuu', '2021-06-21 13:21:41', 0),
(8, 1001, 'Gamachis', 'Girma', 56, 'Male', 5, 2, 'Ibu', '12', '500mg', 'one after breakfast and one after dinner', '5dya', 'well', 'Please take accordingly', '2021-06-21 13:21:41', 0),
(9, 1001, 'Gamachis', 'Girma', 56, 'Male', 5, 0, '1', '1', '1', '', '1', '1', '', '2021-06-21 00:14:35', 1),
(10, 1036, 'Chala', 'Gemeda', 20, 'Male', 5, 2, 'Ibu', '2strip', '500mg', 'asdfddffdf', '5', 'Adaraakee sirritti itt himi', 'csddfg', '2033-07-20 17:26:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `userid` varchar(50) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `userid`, `posted_by`, `post_date`, `update_date`) VALUES
(5, ' Lorem ipsum', 'OK Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12', 'Admin', '2022-11-15 06:11:00', '2022-11-15 07:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notid` int(11) NOT NULL,
  `clerkId` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notid`, `clerkId`, `docId`, `pid`, `patfname`, `patlname`) VALUES
(1, 1, 8, 1000, 'Sefu', 'Yaya'),
(3, 1, 6, 1007, 'Sara', 'Lammaa'),
(4, 1, 5, 1037, 'Geremu', 'Abdisa'),
(5, 1, 5, 1038, 'Geta', 'Get');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Clerk'),
(3, 'Doctor'),
(4, 'Pharmacist'),
(5, 'Technician'),
(6, 'Patient'),
(7, 'Radiologist');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomNo` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `docId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomNo`, `Status`, `docId`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 1, 7),
(4, 1, 8),
(5, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL,
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 15:53:48', 'vfdsfgfd', '2019-11-10 15:54:04', 1),
(4, 'ABdisa', 'abdi@gmail.com', 989898989, 'It is good ', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 1000, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2021-05-03 15:43:25'),
(3, 1001, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2021-05-21 01:20:10'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 01:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 01:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 11:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 15:50:23'),
(8, 6, '70/80', '120', '56', '36', 'Decilofenac 250 mg for 5 days\r\nibuprofune 500 mg for 5 day', '2021-04-11 09:11:06'),
(9, 1, '60/70', '50', '60', '35.5', 'diclofenac 250mg for 2 days', '2021-04-17 19:39:40'),
(10, 1, '12', '12', '12', '34', 'diclofenac gel for 5 days', '2021-04-17 18:18:28'),
(11, 1000, '120/54', '123', '56', '35', 'ytreytetr', '2021-05-03 15:49:26'),
(12, 1000, '70/80', '50', '12', '32', 'Ibupfor', '2021-05-03 17:02:42'),
(13, 1036, '12', '12', '23', '45', 'asdefdfgfgf', '2033-07-20 17:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `cardNo` int(10) NOT NULL,
  `clerkId` int(10) DEFAULT NULL,
  `patfname` varchar(50) DEFAULT NULL,
  `patlname` varchar(50) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `upDated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`cardNo`, `clerkId`, `patfname`, `patlname`, `age`, `gender`, `tele`, `address`, `regDate`, `upDated`) VALUES
(1000, 2, 'Sefu', 'Yaya', 24, 'Male', '0931641348', 'Finfinne', '2021-05-03 03:23:58', '0000-00-00 00:00:00'),
(1001, 2, 'Gamachis', 'Girma', 56, 'Male', '09128765', 'Gimbi', '2021-05-03 04:45:20', '2021-06-06 09:47:34'),
(1002, 100, 'Bikila', 'Ahmed', 23, 'Male', '0978787878', 'Nekemte', '2021-05-25 22:15:11', '0000-00-00 00:00:00'),
(1003, 100, 'Kennessa', 'Tolosa', 21, 'Male', '090989898', 'Nekemte', '2021-05-25 22:22:05', '0000-00-00 00:00:00'),
(1004, 100, 'Guddataa', 'Dabalaa', 45, 'Male', '0978766787', 'Nekemte', '2021-05-25 22:22:37', '0000-00-00 00:00:00'),
(1005, 100, 'Sena', 'Bayisa', 67, 'Female', '0917121234', 'Nekemte', '2021-05-25 22:23:14', '0000-00-00 00:00:00'),
(1006, 100, 'Chaltu', 'Ayyansaa', 78, 'Female', '0967878787', 'Nekemte', '2021-05-25 22:23:44', '0000-00-00 00:00:00'),
(1007, 100, 'Sara', 'Lammaa', 56, 'Female', '0987787667', 'Arjo', '2021-05-25 22:24:27', '0000-00-00 00:00:00'),
(1008, 100, 'Gammadaa', 'Booboo', 45, 'Male', '098778765', 'Nekemte', '2021-05-25 22:25:28', '0000-00-00 00:00:00'),
(1009, 100, 'Meti', 'Garrumma', 34, 'Female', '0978765445', 'Nekemte', '2021-05-25 22:25:58', '0000-00-00 00:00:00'),
(1010, 100, 'Hawii', 'Baqqalee', 78, 'Female', '0923543456', 'Jimmaa', '2021-05-25 22:26:36', '0000-00-00 00:00:00'),
(1011, 100, 'Bontu', 'Gamtaa', 15, 'Female', '0978761232', 'Gida Ayana', '2021-05-27 00:27:13', '0000-00-00 00:00:00'),
(1012, 100, 'Lensa', 'Girma', 45, 'Female', '0912121212', 'Gimbii', '2021-05-27 00:28:52', '0000-00-00 00:00:00'),
(1013, 100, 'Asaffaa', 'Hirpha', 28, 'Male', '0956454321', 'Gimbii', '2021-05-27 00:30:13', '0000-00-00 00:00:00'),
(1014, 100, 'Chaltu', 'Bookaa', 10, 'Female', '0978878787', 'Gida Ayana', '2021-05-27 01:03:13', '0000-00-00 00:00:00'),
(1015, 100, 'Bikiltu', 'Bulti', 56, 'Female', '0912324565', 'Gimbii', '2021-05-27 02:31:35', '0000-00-00 00:00:00'),
(1016, 100, 'Beekaa', 'Daniel', 45, 'Male', '0915151519', 'Gida Ayana', '2021-05-27 03:43:49', '0000-00-00 00:00:00'),
(1017, 100, 'Lalisaa', 'Assaffaa', 23, 'Male', '0978765655', 'Gimbii', '2021-05-27 03:53:05', '0000-00-00 00:00:00'),
(1018, 100, 'Senaa', 'Garrammuu', 78, 'Female', '0915151515', 'Gimbii', '2021-05-27 03:53:50', '0000-00-00 00:00:00'),
(1019, 100, 'Lata', 'Ebisa', 15, 'Male', '0914141417', 'Gimbii', '2021-05-27 04:26:37', '0000-00-00 00:00:00'),
(1020, 100, 'Alamu', 'Mangasha', 26, 'Male', '0941467567', 'Gimbii', '2021-05-27 04:32:10', '0000-00-00 00:00:00'),
(1021, 100, 'Alamu', 'Girma', 23, 'Male', '0914141414', 'Gida Ayana', '2021-05-27 04:35:59', '0000-00-00 00:00:00'),
(1022, 100, 'Aster', 'Garmaamaa', 12, 'Female', '0913131313', 'Gida Ayana', '2021-05-27 04:42:34', '0000-00-00 00:00:00'),
(1023, 100, 'Lensa', 'Hirpha', 28, 'Female', '0912121212', 'Jarte', '2021-05-27 04:42:50', '0000-00-00 00:00:00'),
(1024, 100, 'Meti', 'Abara', 9, 'Female', '0920874532', 'Nekemte', '2021-05-27 04:55:23', '0000-00-00 00:00:00'),
(1025, 100, 'Hana', 'Tilahun', 67, 'Female', '', 'Nekemte', '2021-05-27 04:57:25', '0000-00-00 00:00:00'),
(1026, 100, 'Gadise', 'Dhaba', 90, 'Female', '', 'Nekemte', '2021-05-27 04:58:53', '0000-00-00 00:00:00'),
(1027, 100, 'Girma', 'Amante', 34, 'Male', '0987676565', 'Nekemte', '2021-05-28 01:25:47', '0000-00-00 00:00:00'),
(1028, 100, 'Lensa', 'Gamtaa', 28, 'Female', '0930434556', 'Gimbii', '2021-05-30 01:38:29', '0000-00-00 00:00:00'),
(1029, 100, 'Sara', 'Etefa', 25, 'Female', '0912120909', 'Nekemte', '2021-06-06 22:36:40', '0000-00-00 00:00:00'),
(1030, 100, 'Meti', 'Gamtaa', 34, 'Female', '0930434556', 'Nekemte', '2021-06-06 22:38:24', '0000-00-00 00:00:00'),
(1031, 100, 'Tolosa', 'Yaya', 12, 'Male', '09000000000', 'Nekemte', '2021-06-08 01:03:21', '0000-00-00 00:00:00'),
(1032, 1, 'Ayansa', 'Adugna', 89, 'Male', '0931234556', 'H.G.Wollega', '2021-06-22 06:56:24', '0000-00-00 00:00:00'),
(1033, 1, 'Geremu', 'Seifu', 19, 'Male', '0912873456', 'Nekemte', '2028-01-01 05:51:44', '2028-01-01 06:01:57'),
(1034, 1, 'Geremu', 'Gamtaa', 6, 'Male', '091', 'Nekemte', '2028-01-01 05:58:43', '0000-00-00 00:00:00'),
(1035, 1, 'Geremu', 'Gamtaa', 23, 'Male', '0912544612', 'Nekemte', '2028-01-01 06:00:06', '0000-00-00 00:00:00'),
(1036, 1, 'Chala', 'Gemeda', 20, 'Male', '0931285501', 'Dambidolo', '2033-07-20 04:17:55', '0000-00-00 00:00:00'),
(1037, 1, 'Geremu', 'Abdisa', 12, 'Male', '0912121213', 'Arjo', '2033-07-20 05:09:16', '0000-00-00 00:00:00'),
(1038, 1, 'Geta', 'Get', 12, 'Male', '0909090909', 'Gimbii', '2022-06-17 08:21:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` varchar(255) DEFAULT NULL,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tryDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`, `tryDate`) VALUES
(420, 12, 'abdi', 0x3a3a3100000000000000000000000000, '15-11-2022 12:13:51 PM', '15-11-2022 12:14:34 PM', 1, ''),
(421, 12, 'abdi', 0x3a3a3100000000000000000000000000, '15-11-2022 12:14:45 PM', '15-11-2022 12:25:28 PM', 1, ''),
(422, NULL, 'clerk', 0x3a3a3100000000000000000000000000, NULL, NULL, 0, '15-11-2022 12:14:53 PM'),
(423, 12, 'abdi', 0x3a3a3100000000000000000000000000, '15-11-2022 12:36:51 PM', NULL, 1, ''),
(424, NULL, 'wqertyui', 0x3a3a3100000000000000000000000000, NULL, NULL, 0, '15-11-2022 12:44:23 PM'),
(425, NULL, 'bayisa1', 0x3a3a3100000000000000000000000000, NULL, NULL, 0, '15-11-2022 06:30:00 PM'),
(426, NULL, 'clerk', 0x3a3a3100000000000000000000000000, NULL, NULL, 0, '15-11-2022 06:37:15 PM'),
(427, 12, 'abdi', 0x3132372e302e302e3100000000000000, '23-11-2022 07:35:48 AM', '23-11-2022 08:01:35 AM', 1, ''),
(428, NULL, 'gameg', 0x3a3a3100000000000000000000000000, NULL, NULL, 0, '23-11-2022 08:01:44 AM'),
(429, 12, 'abdi', 0x3a3a3100000000000000000000000000, '23-11-2022 08:01:53 AM', '23-11-2022 08:02:07 AM', 1, ''),
(430, 1001, 'gameg', 0x3a3a3100000000000000000000000000, '23-11-2022 08:02:13 AM', NULL, 1, ''),
(431, 12, 'abdi', 0x3a3a3100000000000000000000000000, '07-12-2022 06:38:01 PM', '07-12-2022 06:38:07 PM', 1, ''),
(432, 1, 'clerk', 0x3a3a3100000000000000000000000000, '07-12-2022 06:38:25 PM', '07-12-2022 06:45:58 PM', 1, ''),
(433, 12, 'abdi', 0x3a3a3100000000000000000000000000, '07-12-2022 06:40:26 PM', NULL, 1, ''),
(434, 5, 'bayisa1', 0x3a3a3100000000000000000000000000, '07-12-2022 06:46:12 PM', '07-12-2022 06:48:20 PM', 1, ''),
(435, 2, 'pharms', 0x3a3a3100000000000000000000000000, '07-12-2022 06:48:35 PM', '07-12-2022 06:50:26 PM', 1, ''),
(436, 3, 'tech', 0x3a3a3100000000000000000000000000, '07-12-2022 06:50:43 PM', '07-12-2022 06:51:40 PM', 1, ''),
(437, 1000, 'abdis', 0x3a3a3100000000000000000000000000, '07-12-2022 06:51:52 PM', '07-12-2022 06:53:04 PM', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `images` text NOT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  `priv` int(3) NOT NULL,
  `status` int(2) NOT NULL,
  `active_now` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `password`, `images`, `regDate`, `updationDate`, `priv`, `status`, `active_now`) VALUES
(2, 1, 'clerk', 'clerk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1638727395.png', '2021-05-02 13:00:15', '2021-05-30 22:01:21', 2, 1, 0),
(8, 1001, 'gameg', 'tolosa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1659123633.png', '2021-05-02 06:39:18', '2021-05-30 22:12:01', 6, 1, 1),
(9, 5, 'bayisa1', 'basyisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1659177570.png', '2021-05-02 06:52:18', '2021-05-30 22:03:33', 3, 1, 0),
(23, 12, 'abdi', 'abdi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1638743048.png', '2021-05-03 13:16:34', '2022-07-29 04:29:27', 1, 1, 1),
(25, 3, 'tech', 'tech@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1659010111.png', '2021-05-19 03:19:50', '2021-05-30 22:09:58', 5, 1, 0),
(26, 4, 'radio', 'radiologist@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2021-05-20 04:52:57', '2021-06-21 02:08:46', 7, 1, 0),
(34, 2, 'pharms', 'phars@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1659010111.png', '2021-05-20 03:25:14', '2021-05-30 22:05:28', 4, 1, 0),
(36, 1000, 'abdis', 'game@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2021-06-21 04:35:57', '0000-00-00 00:00:00', 6, 1, 0),
(37, 1036, 'chala', 'chala@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2033-07-20 04:31:50', '0000-00-00 00:00:00', 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_managements`
--

CREATE TABLE `web_managements` (
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `telegram` text NOT NULL,
  `linkedin` text NOT NULL,
  `titles` text NOT NULL,
  `zone` text NOT NULL,
  `region` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_managements`
--

INSERT INTO `web_managements` (`header`, `footer`, `facebook`, `twitter`, `telegram`, `linkedin`, `titles`, `zone`, `region`, `telephone`, `email`) VALUES
('The Header', '2023 Footer. All rights reserved!', 'https://www.facebook.com/handlers', 'https://www.twitter.com/handlers', 'https://t.me/handlers', 'https://www.linkedin.com/l/handlers', 'Miiltoo Medium Clinic', 'Gimbi, West Wollega', 'Oromia Region', '+25190000001', 'username@domain.com');

-- --------------------------------------------------------

--
-- Table structure for table `xultrareport`
--

CREATE TABLE `xultrareport` (
  `id` int(11) NOT NULL,
  `cardNo` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `testDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diag` varchar(500) NOT NULL,
  `plan` varchar(500) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xultrareport`
--

INSERT INTO `xultrareport` (`id`, `cardNo`, `docId`, `rid`, `patfname`, `patlname`, `age`, `gender`, `testDate`, `diag`, `plan`, `status`) VALUES
(1, 1000, 5, 4, 'Sefu', 'Yaya', '24', 'Male', '2021-06-21 14:49:32', 'Leg', 'Done', 0),
(2, 1001, 5, 4, 'Gamachis', 'Girma', '56', 'Female', '2021-06-21 14:49:32', 'HAnd', 'Ilaaleera', 0),
(3, 1001, 5, 4, 'Gamachis', 'Girma', '56', 'Male', '2021-06-21 15:01:39', 'leg scan', 'oj', 0),
(4, 1001, 5, 4, 'Gamachis', 'Girma', '56', 'Male', '2021-06-21 15:03:13', 'hands pl', 'ok', 0),
(5, 1000, 5, 4, 'Sefu', 'Yaya', '24', 'Male', '2021-06-21 15:18:43', 'hand check', 'ok', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labreport`
--
ALTER TABLE `labreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notid`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`cardNo`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `xultrareport`
--
ALTER TABLE `xultrareport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `labreport`
--
ALTER TABLE `labreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `cardNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `xultrareport`
--
ALTER TABLE `xultrareport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
