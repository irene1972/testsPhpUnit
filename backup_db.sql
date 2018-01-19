-- MySQL dump 10.13  Distrib 5.6.33, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: testPooDB
-- ------------------------------------------------------
-- Server version	5.6.33-0ubuntu0.14.04.1

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
-- Table structure for table `Productos`
--

DROP TABLE IF EXISTS `Productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) COLLATE utf32_spanish2_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf32_spanish2_ci NOT NULL,
  `Link` varchar(250) COLLATE utf32_spanish2_ci NOT NULL,
  `Image` varchar(250) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `Precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Productos`
--

LOCK TABLES `Productos` WRITE;
/*!40000 ALTER TABLE `Productos` DISABLE KEYS */;
INSERT INTO `Productos` VALUES (1,'Producto Celular','ProductoCelular','Link 1','454293d40bbab6af91e4c738a2e3aeProducto1.jpg',100),(2,'Producto 2','Producto 2','Link 2','c4fcf1615d6a067bc7be91d5b11fd2Producto2.jpg',2),(3,'Barcelona','Camiseta Barcelona','CamisetaBarcelona','440bf6dadce9d16822c98e489c20c3BarcelonaMessi.jpg',50);
/*!40000 ALTER TABLE `Productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Remeras`
--

DROP TABLE IF EXISTS `Remeras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Remeras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) COLLATE utf32_spanish2_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf32_spanish2_ci NOT NULL,
  `Link` varchar(250) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `Image` varchar(250) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `Talle` varchar(250) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `Color` varchar(250) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `Precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Remeras`
--

LOCK TABLES `Remeras` WRITE;
/*!40000 ALTER TABLE `Remeras` DISABLE KEYS */;
INSERT INTO `Remeras` VALUES (1,'Lacoste','Scote V','LacosteScoteV','3cd7f6429ff13bd152287e8bb3fcacremeraLacosteScoteV.jpg','xl','Verde',100),(2,'BarcelonaMessi','Equipo Barcelona 10','BarcelonaMessi','0e82824dbeb71da94009956eb93a71BarcelonaMessi.jpg','XL','-',50);
/*!40000 ALTER TABLE `Remeras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-13 18:18:03
