CREATE TABLE `Facility` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Facilityname` varchar(250) DEFAULT NULL,
  `Createdon` date DEFAULT NULL,
  `Createdby` varchar(50) DEFAULT NULL,
  `Updatedon` date DEFAULT NULL,
  `Updatedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
