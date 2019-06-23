CREATE TABLE `PriestServices` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `PriestId` int(11) DEFAULT NULL,
  `Eventdate` date DEFAULT NULL,
  `Hours` varchar(100) DEFAULT NULL,
  `Comments` varchar(250) DEFAULT NULL,
  `CompletedIndicator` varchar(100) DEFAULT NULL,
  `CompletedOn` date DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
