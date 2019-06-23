INSERT INTO `HTOK`.`Users`
(`Username`,`Password`,`UserProfileId`,`Firstname`,`Lastname`,`Email`,`Phone`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
('nitin','9003d1df22eb4d3820015070385194c8','1','nitin','more','nitinmtesting@gmail.com','5027121284',NOW(),'INITIAL LOAD',NULL,NULL),
('Test123','cc03e747a6afbbcbf8be7668acfebee5','1','Test','123','Test@test.com','',NOW(),'INITIAL LOAD',NULL,NULL),
('Nidhi','9003d1df22eb4d3820015070385194c8','3','Nidhi','More','Test@yahoo.com','',NOW(),'INITIAL LOAD',NULL,NULL),
('priest1','9003d1df22eb4d3820015070385194c8','2','priest','','priest@gmail.com','',NOW(),'INITIAL LOAD',NULL,NULL),
('factman','9003d1df22eb4d3820015070385194c8','3','facility manager','','fman@gmail.com','',NOW(),'INITIAL LOAD',NULL,NULL),
('admin','9003d1df22eb4d3820015070385194c8','4','admin','','admin@gmail.com','',NOW(),'INITIAL LOAD',NULL,NULL),
('subkir','972ae52621668f045e61bd75160131e8','4','Kirthi','Vasan','subkir70@gmail.com','5027274825',NOW(),'INITIAL LOAD',NULL,NULL);


INSERT INTO `HTOK`.`Facility`
(`Facilityname`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
( 'Big Hall', NOW(), 'INITIAL LOAD', NULL, NULL),
('Small Hall 1', NOW(), 'INITIAL LOAD', NULL, NULL),
('Small Hall 2', NOW(), 'INITIAL LOAD', NULL, NULL);


INSERT INTO `HTOK`.`ImageLibrary`
(`ImageName`,`ImageTitle`,`ImageType`,`IsActive`)
VALUES
('Annual2019.jpg', 'Annual2019', 'Banner', '1'),
('Priests.jpg', 'Priests', 'Banner', '1'),
('Temple.jpg', 'Temple', 'Banner', '1'),
('Tirupati.jpg', 'Tirupati', 'deities', '1'),
('Garuda.jpg', 'Garuda', 'deities', '1'),
('Ganesh.jpg', 'Ganesh', 'deities', '1'),
('Murshaka.jpg', 'Murshaka', 'deities', '1'),
('Shiva.jpg', 'Shiva', 'deities', '1'),
('Nandi.jpg', 'Nandi', 'deities', '1'),
('Durga.jpg', 'Durga', 'deities', '1'),
('Parvati.jpg', 'Parvati', 'deities', '1'),
('(Murugan.jpg', 'Murugan', 'deities', '1'),
('Laxmi.jpg', 'Laxmi', 'deities', '1'),
('Bhudevi.jpg', 'Bhudevi', 'deities', '1'),
('RadhaKrishna.jpg', 'RadhaKrishna', 'deities', '1'),
('SiyaRam.jpg', 'SiyaRam', 'deities', '1'),
('Hanuman.jpg', 'Hanuman', 'deities', '1'),
('Saraswati.jpg', 'Saraswati', 'deities', '1'),
('Ambaji.jpg', 'Ambaji', 'deities', '1'),
('Mahavir.jpg', 'Mahavir', 'deities', '1'),
('Navgrah1.jpg', 'Navgrah', 'deities', '1'),
('Navgrah2.jpg', 'Navgrah', 'deities', '1'),
('myom.png', 'OM', 'uploads', '0'),
('om-black.png', 'OM', 'uploads', '0');

INSERT INTO `HTOK`.`Priest`
(`Priestname`,`Phone`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
('Shri Rajendra Kumar Joshi', '502-420-9977', NOW(), 'INITIAL LOAD', NULL, NULL),
('Shri Srinivasan Kannan', '502-424-5158', NOW(), 'INITIAL LOAD', NULL, NULL);

INSERT INTO `HTOK`.`PujaType`
(`PujaDescription`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
('Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Ganesh Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Rama Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Ambaji Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Krishna Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Shiva Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Durga Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Navagraha Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Visalakshi Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Saraswathi Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Lakshmi Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Bhudevi Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Balaji Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Subramanya Abhishekam', NOW(), 'INITIAL LOAD', NULL, NULL),
('Ganesh Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Rama Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Ambaji Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Krishna Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Shiva Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Durga Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Navagraha Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Visalakshi Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Saraswathi Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Lakshmi Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Bhudevi Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Balaji Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Subramanya Archana', NOW(), 'INITIAL LOAD', NULL, NULL),
('Anjaneya Archana', NOW(), 'INITIAL LOAD', NULL, NULL);

INSERT INTO `HTOK`.`Status`
(`StatusDescription`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
('Pending', NOW(), 'INITIAL LOAD', NULL, NULL),
('Reserved', NOW(), 'INITIAL LOAD', NULL, NULL),
('Completed', NOW(), 'INITIAL LOAD', NULL, NULL),
('Cancelled', NOW(), 'INITIAL LOAD', NULL, NULL),
('Resubmit', NOW(), 'INITIAL LOAD', NULL, NULL),
('Confirmed', NOW(), 'INITIAL LOAD', NULL, NULL),
('Returned', NOW(), 'INITIAL LOAD', NULL, NULL),
('Read', NOW(), 'INITIAL LOAD', NULL, NULL),
('Active', NOW(), 'INITIAL LOAD', NULL, NULL);

INSERT INTO `HTOK`.`UserProfile`
(`UserProfileDescription`,`Createdon`,`Createdby`,`Updatedon`,`Updatedby`)
VALUES
('Devotee', NOW(), 'INITIAL LOAD', NULL, NULL),
('Priest', NOW(), 'INITIAL LOAD', NULL, NULL),
('FacilityManager', NOW(), 'INITIAL LOAD', NULL, NULL),
('Admin', NOW(), 'INITIAL LOAD', NULL, NULL);


