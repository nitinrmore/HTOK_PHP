CREATE TABLE `UserProfile` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserProfileDescription` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
