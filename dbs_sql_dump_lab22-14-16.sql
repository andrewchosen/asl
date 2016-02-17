# ************************************************************
# Sequel Pro SQL dump
# Version 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: giantfis_asl
# Generation Time: 2016-02-15 01:50:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `date_created`, `bio`)
VALUES
	(7,'John','Doe','john@doe.com','$2a$08$isJA/H7vi21tdB2rCyYOO.rb0oJfIJxihNoFmcJi0UP07chXyO1kC','2016-02-12 13:12:26',NULL),
	(12,'Jane','Doe','jane@doe.com','$2a$08$3ugG/DQHXnWsQdB7lAgBr.Np/.gTPQcitnI2brDUoVx6DK/mFZ26G','2016-02-12 13:33:43',NULL),
	(14,'Andrew','Landcracker','','$2a$08$eVWAtaYqw68IP/dnvDhusuj9rkyLBh.qgDqZF2nBYqwYe5Aqd6316','2016-02-14 12:25:09','sfsdfds\r\n'),
	(15,'King','Ragnar','blah@blah.com','$2a$08$QFOQ69EuIMsPhrGt4eq9xe6vxitTDzYFpL6CuP9b13R0uLsekkcGu','2016-02-14 17:18:00',NULL),
	(16,'John','Doe','wasd@wasd.com','$2a$08$GpR16TvWR4gz81Za0j0UPuvOtw4QsRSWuehOYT3LiYZxhtBRyBTJK','2016-02-14 17:25:35',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
