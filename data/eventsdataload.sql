INSERT INTO `events` (`title`,  `start_event`, `end_event`, `createdon`,`createdby`) VALUES
('Suprabatham, Vishnu Sahasranamam','2019-06-08 09:00:00','2019-06-08 10:00:00',NOW(),'SYSTEM'),
('Suprabatham, Vishnu Sahasranamam','2019-06-15 09:00:00','2019-06-15 10:00:00',NOW(),'SYSTEM'),
('Suprabatham, Vishnu Sahasranamam','2019-06-22 09:00:00','2019-06-22 10:00:00',NOW(),'SYSTEM'),
('Suprabatham, Vishnu Sahasranamam','2019-06-29 09:00:00','2019-06-29 10:00:00',NOW(),'SYSTEM');

/*
CREATE TABLE `Events` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Start_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `End_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Createdon` datetime NOT NULL,
  `Createdby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/