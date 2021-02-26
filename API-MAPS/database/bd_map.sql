-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_map
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_map`
--

DROP TABLE IF EXISTS `tbl_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_map` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_map`
--

LOCK TABLES `tbl_map` WRITE;
/*!40000 ALTER TABLE `tbl_map` DISABLE KEYS */;
INSERT INTO `tbl_map` VALUES (1,'Luis Automotiva Mecânica e Elétrica','R. Frei Gaspar, 3313 - Centro, São Vicente - SP, 11350-000','Oficina',-23.9541,-46.4085),(2,'Centro Automotivo Santa Edwiges','Av. Luís Horneaux de Moura, 311 - Jardim Paraiso, São Vicente - SP, 11370-501','Oficina',-23.9529,-46.3775),(3,'Centro Automotivo Perninha','R. Prof. Francisco Di Domênico, 1330 - Radio Clube, Santos - SP, 11086-001','Oficina',-23.9388,-46.3796),(4,'Vicente Centro Automotivo','R. Odair Müler de Azevedo Marquês, 397 - Vila Margarida, São Vicente - SP, 11330-690','Oficina',-23.9687,-46.4093),(5,'Centro Automotivo Pamplona','Av. Martins Fontes, 80 - Catiapoã, São Vicente - SP, 11390-200','Oficina',-23.9635,-46.3831),(6,'A Elite Mecanica Automotiva','Av. Augusto Severo, 715 - Parque Sao Vicente, São Vicente - SP, 11360-300','Oficina',-23.9506,-46.3999);
/*!40000 ALTER TABLE `tbl_map` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-26 17:40:15
