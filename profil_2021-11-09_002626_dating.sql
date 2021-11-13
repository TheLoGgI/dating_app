/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS profil;
CREATE TABLE `profil` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `partnerSex` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(2) DEFAULT 'Da',
  `proffession` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `profilImage` varchar(255) DEFAULT '/uploads/defualtProfil.jpg',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO profil(userId,firstname,surname,sex,partnerSex,city,country,proffession,birthday,description,profilImage) VALUES(1,'Katrine','Jørgensen','female','non-binary',' Vredsted','DK','Model','1999-12-06','Katrine Jørgensen er en female der søger efter en non-binary partner','../uploads/profil/profilimage1-katrine-resized830x961-.jpg'),(2,'Malte','Aakjær','male','Female','Odder','Da',NULL,'1994-01-10','sdffsdfsad sadfdsaasddf asdfsdaf','../uploads/defualtProfil.jpg'),(3,'Jesper','Nissen','male','female',' DK','US','Kigger','1999-12-06','COUNT COOUNT CONUNT CONUNT OCNOTUN CONOCHEO ONDONIU','../uploads/profil/profilimage1-katrine.jpg'),(4,'johanne','johanne','male','Female','Aarhus','Da',NULL,'1994-01-10','description description description description','/uploads/defualtProfil.jpg'),(5,'karla','karla','male','Female','Aarhus','Da',NULL,'1994-01-10',NULL,'/uploads/defualtProfil.jpg'),(6,'Michala','Nissen','female','female','Hobro','DK','Rolespilskriger','1996-10-27','profil profil profil profil','/uploads/defualtProfil.jpg'),(7,'anders','anders','male','Female','Aarhus','Da',NULL,'1994-01-10',NULL,'/uploads/defualtProfil.jpg'),(8,'emilie','emilie','male','Female','Aarhus','Da',NULL,'1994-01-10',NULL,'/uploads/defualtProfil.jpg'),(9,'olli','aakjær','female','male','skive','Da',NULL,'2014-11-20',NULL,'/uploads/defualtProfil.jpg'),(10,'Henrik','Valle','male','female','Ikast','Da',NULL,'2000-06-02',NULL,'/uploads/defualtProfil.jpg'),(11,'mathias','aron','male','female','greenå','Da',NULL,'1997-06-02',NULL,'/uploads/defualtProfil.jpg');