DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS appointment;

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docId` int(11) DEFAULT NULL,
  `cardNo` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT NULL,
  `reason` varchar(500) NOT NULL,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `reasonPat` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS doctorspecilization;

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `specilization` varchar(100) NOT NULL,
  `privilege` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS labreport;

CREATE TABLE `labreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardNo` int(11) NOT NULL,
  `docId` int(50) NOT NULL,
  `tid` int(50) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `testDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hema` varchar(1000) NOT NULL,
  `para` varchar(1000) NOT NULL,
  `urin` varchar(1000) NOT NULL,
  `sero` varchar(1000) NOT NULL,
  `chem` varchar(1000) NOT NULL,
  `bact` varchar(1000) NOT NULL,
  `response` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS medication;

CREATE TABLE `medication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `adDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS notifications;

CREATE TABLE `notifications` (
  `notid` int(11) NOT NULL AUTO_INCREMENT,
  `clerkId` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  PRIMARY KEY (`notid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS privilege;

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS rooms;

CREATE TABLE `rooms` (
  `roomNo` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `docId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tblcontactus;

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT NULL,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL,
  `IsRead` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tblmedicalhistory;

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tblpatient;

CREATE TABLE `tblpatient` (
  `cardNo` int(10) NOT NULL AUTO_INCREMENT,
  `clerkId` int(10) DEFAULT NULL,
  `patfname` varchar(50) DEFAULT NULL,
  `patlname` varchar(50) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `upDated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cardNo`)
) ENGINE=InnoDB AUTO_INCREMENT=1033 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS userlog;

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` varchar(255) DEFAULT NULL,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tryDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  `priv` int(3) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS xultrareport;

CREATE TABLE `xultrareport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardNo` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `patfname` varchar(50) NOT NULL,
  `patlname` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `testDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `diag` varchar(500) NOT NULL,
  `plan` varchar(500) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;



