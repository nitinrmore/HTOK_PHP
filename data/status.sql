CREATE TABLE `Status` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(100) DEFAULT NULL,
  `Createdon` datetime DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` datetime DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
