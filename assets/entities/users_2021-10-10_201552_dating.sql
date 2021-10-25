/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `profilId` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signed_up` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_profil_users` (`profilId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO users(userId,profilId,email,password,signed_up) VALUES(5,1,'lasse@gmail.com','1a1dc91c907325c69271ddf0c944bc72','2021-10-07'),(6,2,'kastrup@anders.dk','b8051988e1bb0ca8a4d6ee0e041fee8c','2021-10-10'),(7,3,'soennergaard@line.dk','6438c669e0d0de98e6929c2cc0fac474','2021-10-10');