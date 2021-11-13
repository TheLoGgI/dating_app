/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `userId` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signed_up` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO users(userId,email,password,signed_up) VALUES(1,'katrine@gmail.com','$2y$10$FHCPYqnxfp4/OrtCyi2a3uZdSzBYFJ9oaMgLOw7eGhh/JSYkD9j8u','2021-10-17'),(2,'malte@gmail.com','$2y$10$5dD1vbqCqSNKRE3Y4NLGHea0RsFJDnw0J5j1DLi8e1didLHElWeBW','2021-10-30'),(3,'jesper@gmail.com','Jesperpassword','2021-10-30'),(4,'johanne@gmail.com','johannepassword','2021-10-30'),(5,'karla@gmail.com','karlapassword','2021-10-30'),(6,'michala@gmail.com','michalapassword','2021-10-30'),(7,'anders@gmail.com','anderspassword','2021-10-30'),(8,'emilie@gmail.com','emiliepassword','2021-10-30'),(9,'olli@gmail.com','olli','2021-11-07'),(10,'henrikvalle@gmail.com','$2y$10$K7ek7fZG961MfMFQdKEfdeRngTrDnV7e1.B/DoMRAIgjZvg4/ncGu','2021-11-08'),(11,'aron@gmail.com','$2y$10$j9.mYGa9NAVuoxZZoLGOluxFcgc/HzzaPVy1Dg.5S5GkmGfzjV4.W','2021-11-09');