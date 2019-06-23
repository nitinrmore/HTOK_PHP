CREATE TABLE `FacilityReservation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `FacilityId` int(11) DEFAULT NULL,
  `Eventdate` datetime DEFAULT NULL,
  `Hours` varchar(100) DEFAULT NULL,
  `Comments` varchar(250) DEFAULT NULL,
  `CompletedIndicator` varchar(100) DEFAULT NULL,
  `CompletedOn` datetime DEFAULT NULL,
  `Completedby` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
