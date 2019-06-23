CREATE TABLE `PujaRequest` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `Gotra` varchar(100) DEFAULT NULL,
  `Nakshatra` varchar(100) DEFAULT NULL,
  `Names` varchar(100) DEFAULT NULL,
  `CompletedIndicator` varchar(100) DEFAULT NULL,
  `CompletedOn` date DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
