CREATE TABLE `facilitycalendar` (
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
) ENGINE=InnoDB AUTO_INCREMENT=1535 DEFAULT CHARSET=latin1;
