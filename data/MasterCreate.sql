DROP DATABASE IF EXISTS `HTOK`;

CREATE DATABASE `HTOK` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `HTOK`.`Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(45) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `HTOK`.`Facility` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Facilityname` varchar(250) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`FacilityCalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `facilityname` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(45) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`FacilityReservation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `FacilityId` int(11) DEFAULT NULL,
  `Eventdate` datetime DEFAULT NULL,
  `Hours` varchar(100) DEFAULT NULL,
  `Comments` varchar(250) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `CompletedIndicator` varchar(100) DEFAULT NULL,
  `CompletedOn` datetime DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`ImageLibrary` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` varchar(200) NOT NULL,
  `ImageTitle` varchar(200) NOT NULL,
  `ImageType` varchar(45) NOT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`Messages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Comments` varchar(250) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `StatusId` int(11) NOT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`Newsletter` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`Priest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Priestname` varchar(250) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`PriestCalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `priestname` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(45) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`PriestServices` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `PriestId` int(11) DEFAULT NULL,
  `ServiceDescription` varchar(100) DEFAULT NULL,
  `Eventdate` datetime DEFAULT NULL,
  `Hours` varchar(100) DEFAULT NULL,
  `Comments` varchar(250) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `CompletedIndicator` varchar(100) DEFAULT NULL,
  `CompletedOn` datetime DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`PujaRequest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `PujaTypeId` int(11) DEFAULT NULL,
  `Gotra` varchar(100) DEFAULT NULL,
  `Nakshatra` varchar(100) DEFAULT NULL,
  `Specificdate` datetime DEFAULT NULL,
  `Names` varchar(250) DEFAULT NULL,
  `Comments` varchar(250) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `Completedon` datetime DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`PujaType` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PujaDescription` varchar(100) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`Status` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`STG_DailyReciteData` (
  `recite` text,
  `start_time` text,
  `end_time` text,
  `weekday` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`STG_DayData` (
  `date` text,
  `weekday` text,
  `dayofmonth` text,
  `num_weekdayofmonth` text,
  `week_num` text,
  `datestring` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`STG_WeeklyAbhishekamData` (
  `Abhishekam` text,
  `start_time` text,
  `end_time` text,
  `week_num` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`UserProfile` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserProfileDescription` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `HTOK`.`Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `UserProfileId` int(11) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
