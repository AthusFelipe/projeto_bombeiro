CREATE DATABASE  IF NOT EXISTS `intranet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `intranet`;
-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: intranet
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `nomeprodutos` varchar(45) DEFAULT NULL,
  `quantidadeprodutos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprodutos`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (11,'Atadura 5cm x 5cm',98),(12,'Gaze',100),(13,'Alcool 500ml',9),(14,'Atadura 15cm',96),(15,'Oxímetro',0),(16,'Esfignomanômetro',3),(17,'Agua sanitária 5 litros',4),(18,'Tala azul M',4),(19,'Tala laranja P',3),(20,'Soro fisiológico 100ml',50),(21,'Gaze Pacote 50 unidades',8),(22,'Gaze estéril pacote 10 unidades',10);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtosadicionados`
--

DROP TABLE IF EXISTS `produtosadicionados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtosadicionados` (
  `idadicionados` int(11) NOT NULL AUTO_INCREMENT,
  `idprodutos` int(11) DEFAULT NULL,
  `quantidadeprodutos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idadicionados`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtosadicionados`
--

LOCK TABLES `produtosadicionados` WRITE;
/*!40000 ALTER TABLE `produtosadicionados` DISABLE KEYS */;
INSERT INTO `produtosadicionados` VALUES (2,20,2),(3,21,1),(4,12,2),(5,21,1);
/*!40000 ALTER TABLE `produtosadicionados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtosretiradas`
--

DROP TABLE IF EXISTS `produtosretiradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtosretiradas` (
  `idretiradas` int(11) NOT NULL AUTO_INCREMENT,
  `idprodutos` int(11) DEFAULT NULL,
  `quantidaderetirada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idretiradas`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtosretiradas`
--

LOCK TABLES `produtosretiradas` WRITE;
/*!40000 ALTER TABLE `produtosretiradas` DISABLE KEYS */;
INSERT INTO `produtosretiradas` VALUES (33,11,1),(34,16,1),(35,15,1),(36,17,1),(37,15,1),(38,13,1),(39,12,1),(40,14,1),(41,12,1),(42,14,3),(43,18,1),(44,16,1),(45,19,2),(46,20,2),(47,21,3),(48,11,1),(49,21,1);
/*!40000 ALTER TABLE `produtosretiradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `idservicos` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoservicos` varchar(45) DEFAULT NULL,
  `dataservicos` date DEFAULT NULL,
  `horaservicos` varchar(11) DEFAULT NULL,
  `criadoem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idservicos`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (56,'DIURNO','2022-04-12','07:00','2022-04-10 03:40:06'),(57,'DIURNO','2022-04-13','07:00','2022-04-10 03:40:14'),(58,'DIURNO','2022-04-14','07:00','2022-04-10 03:40:21'),(62,'NOTURNO','2022-04-13','19:00','2022-04-10 13:17:02'),(63,'NOTURNO','2022-04-14','19:00','2022-04-10 13:17:18'),(64,'DIURNO','2022-04-15','07:00','2022-04-10 13:17:31'),(65,'NOTURNO','2022-04-15','19:00','2022-04-10 13:17:44'),(66,'DIURNO','2022-04-16','07:00','2022-04-10 13:17:56'),(67,'NOTURNO','2022-04-16','19:00','2022-04-10 13:18:06'),(68,'DIURNO','2022-04-17','07:00','2022-04-10 13:18:26'),(69,'NOTURNO','2022-04-17','19:00','2022-04-10 13:19:00'),(70,'DIURNO','2022-04-18','07:00','2022-04-10 13:19:09'),(71,'NOTURNO','2022-04-18','19:00','2022-04-10 13:19:18'),(72,'DIURNO','2022-04-19','07:00','2022-04-10 13:19:43'),(73,'NOTURNO','2022-04-19','19:00','2022-04-10 13:19:57'),(74,'DIURNO','2022-04-20','07:00','2022-04-10 14:00:40'),(75,'NOTURNO','2022-04-20','19:00','2022-04-10 14:00:49'),(76,'Diurno','2022-04-21','07:00','2022-04-10 19:24:18');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicosescala`
--

DROP TABLE IF EXISTS `servicosescala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicosescala` (
  `iservicosescala` int(11) NOT NULL AUTO_INCREMENT,
  `idservicos` int(11) DEFAULT NULL,
  `idmilitar1` int(11) DEFAULT NULL,
  `idmilitar2` int(11) DEFAULT NULL,
  `criadoem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`iservicosescala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicosescala`
--

LOCK TABLES `servicosescala` WRITE;
/*!40000 ALTER TABLE `servicosescala` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicosescala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicosvoluntario`
--

DROP TABLE IF EXISTS `servicosvoluntario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicosvoluntario` (
  `idservicosvoluntario` int(11) NOT NULL AUTO_INCREMENT,
  `idservicos` int(11) DEFAULT NULL,
  `idmilitar` int(11) DEFAULT NULL,
  PRIMARY KEY (`idservicosvoluntario`)
) ENGINE=InnoDB AUTO_INCREMENT=931 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicosvoluntario`
--

LOCK TABLES `servicosvoluntario` WRITE;
/*!40000 ALTER TABLE `servicosvoluntario` DISABLE KEYS */;
INSERT INTO `servicosvoluntario` VALUES (917,74,1),(918,75,1),(919,72,1),(920,73,1),(921,70,1),(922,71,1),(923,68,1),(927,57,1),(928,76,2),(929,74,2),(930,75,2);
/*!40000 ALTER TABLE `servicosvoluntario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `codfunc` int(11) NOT NULL AUTO_INCREMENT,
  `nomeusuario` varchar(45) NOT NULL,
  `senhausuario` varchar(45) NOT NULL,
  PRIMARY KEY (`codfunc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'athus','athus123'),(2,'felipe','felipe123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'intranet'
--

--
-- Dumping routines for database 'intranet'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-10 17:26:14
