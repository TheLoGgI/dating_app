/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS profil;
CREATE TABLE `profil` (
  `profilId` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `partnerSex` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(2) DEFAULT 'Da',
  `proffession` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`profilId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO profil(profilId,firstname,surname,sex,partnerSex,city,country,proffession,birthday,description) VALUES(1,'lasse',' aakjær','female','female','skive','Da',NULL,'1996-10-27',NULL),(2,'Anders','Kastrup','male','biseksual','Herning','Da',NULL,'1904-06-02',NULL),(3,'line','sønnergaard','female','male','København','Da',NULL,'1998-10-20',NULL);