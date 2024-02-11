-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: reservasANB
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1~deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `reservas`
--

CREATE DATABASE IF NOT EXISTS `reservasANB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `reservasANB`;

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idtramo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_IDUSUARIO` (`idusuario`),
  KEY `FK_IDTRAMO` (`idtramo`),
  CONSTRAINT `FK_IDTRAMO` FOREIGN KEY (`idtramo`) REFERENCES `tramos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_IDUSUARIO` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES
(137,2,3,'2024-02-22'),
(180,1,1,'2024-02-21'),
(182,1,6,'2024-02-21'),
(184,3,5,'2024-02-21'),
(186,3,7,'2024-02-21'),
(187,2,4,'2024-02-21'),
(197,2,1,'2024-02-15'),
(198,2,2,'2024-02-15'),
(199,2,3,'2024-02-15'),
(200,2,4,'2024-02-15'),
(201,2,6,'2024-02-15'),
(202,2,5,'2024-02-15'),
(203,2,7,'2024-02-15');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramos`
--

DROP TABLE IF EXISTS `tramos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tramos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramos`
--

LOCK TABLES `tramos` WRITE;
/*!40000 ALTER TABLE `tramos` DISABLE KEYS */;
INSERT INTO `tramos` VALUES
(1,'9:00'),
(2,'10:00'),
(3,'11:00'),
(4,'12:00'),
(5,'13:00'),
(6,'14:00'),
(7,'15:00');
/*!40000 ALTER TABLE `tramos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'Arturo','arturonb51236@gmail.com','$2y$10$XnqXVUvO1UcYN74YBeP86.6k1gUEkhTreW1cICvXLf3QxDQ5/abUS'),
(2,'Prueba','prueba@gmail.com','$2y$10$EYY7dgD48KEfbEH4I8312ultH2CAp196Q6WjnbsbMX.dyihQvrpkK'),
(3,'Manuel Ortiz Pistacho','manu@gmail.com','$2y$10$QoOLGl/uWtob.9/PRzFB6.JWv1l1EW.MLMI3bbFt0vNLcYlV1daze'),
(4,'hola','hola@gmail.com','$2y$10$JyRRVMwoVjxIHzXyubCPg.ntpMcVozT675QBJ5M7rnbZY950y.wKu');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'reservasANB'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-12  0:02:01
