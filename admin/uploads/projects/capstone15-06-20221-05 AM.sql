# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.13-MariaDB)
# Database: capstone
# Generation Time: 2022-06-14 20:05:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fyp_proposal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fyp_proposal`;

CREATE TABLE `fyp_proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student1_id` int(11) NOT NULL,
  `student2_id` int(11) NOT NULL,
  `student3_id` int(11) NOT NULL,
  `student4_id` int(11) DEFAULT NULL,
  `student5_id` int(11) DEFAULT NULL,
  `project_name` varchar(32) NOT NULL DEFAULT '',
  `proposal_file` varchar(100) NOT NULL DEFAULT '',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `student1_id` (`student1_id`),
  KEY `student2_id` (`student2_id`),
  KEY `student3_id` (`student3_id`),
  KEY `student4_id` (`student4_id`),
  KEY `student5_id` (`student5_id`),
  CONSTRAINT `fyp_proposal_ibfk_1` FOREIGN KEY (`student1_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fyp_proposal_ibfk_2` FOREIGN KEY (`student2_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fyp_proposal_ibfk_3` FOREIGN KEY (`student3_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fyp_proposal_ibfk_4` FOREIGN KEY (`student4_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fyp_proposal_ibfk_5` FOREIGN KEY (`student5_id`) REFERENCES `student` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
