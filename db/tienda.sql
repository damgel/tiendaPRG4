CREATE DATABASE  IF NOT EXISTS `tienda` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `tienda`;
-- MySQL dump 10.13  Distrib 5.6.12, for Win64 (x86_64)
--
-- Host: localhost    Database: tienda
-- ------------------------------------------------------
-- Server version	5.6.12

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_ct` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ct` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ct` date DEFAULT NULL,
  `activo_ct` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ct`),
  UNIQUE KEY `id_ct_UNIQUE` (`id_ct`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'CAMISAS','2013-11-16','N'),(2,'ZAPATOS','2013-11-10','S'),(3,'PANTALONES','2013-11-10','S'),(4,'ELECTRODOMESTICO','2013-11-10','S'),(5,'OTROS','2013-11-10','S'),(6,'CAMISAS','2013-11-16','N');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `apellido` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `contrasenia` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'jose','guillen','damgel','destiny'),(2,'ariel','ramirez','ary123','destiny123'),(3,'carlos','roberto','crobert','123456'),(4,'juan jose','ayala','juanjo','123456');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_p` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_p` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion_p` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `categoria_p` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_p` float DEFAULT '0',
  `activo_p` varchar(2) COLLATE utf8_spanish_ci DEFAULT 'N',
  `existencia_p` int(11) DEFAULT NULL,
  `fecha_p` date DEFAULT NULL,
  `marca_p` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_p` float DEFAULT '0',
  PRIMARY KEY (`id_p`),
  UNIQUE KEY `id_p_UNIQUE` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (2,'Images/productos/camisa1.jpg','camisa sport OFF','hecha con los productos de mejor calidad en el mundo','CAMISAS',60.5,'N',0,'2013-11-16','gucci',10),(3,'Images/productos/zapato1.jpg','zapatos','calidad mundial garantizada','ZAPATOS',36.17,'S',100,'2013-11-16','polo',10),(13,'Images/productos/527eb966d64ba102506.jpg','camisa sport','testing testing testing ','CAMISAS',17.25,'S',NULL,'2013-11-20','adidas',10),(14,'Images/productos/5280096c4410611-(70)b.jpg','New Jacket','three pieces jacket','CAMISAS',120.99,'S',NULL,'2013-11-20','nike',10),(17,'Images/productos/5287c0fbec473Telefono.jpg','TELEFONO CLASICO','BRAND NEW PRODUCT','CAMISAS',125,'S',NULL,'2013-11-23',NULL,10),(18,'Images/productos/5287c130cd9432566829399_86e0600664_m_thumb.jpg','producto de prueba','BRAND NEW PRODUCT','ELECTRODOMESTICO',54.0514,'S',NULL,'2013-11-16',NULL,10),(19,'Images/productos/5287c2e416fe7htc-desire_0.jpg','0000 TELEFONO','BRAND NEW TELEFONO','ELECTRODOMESTICO',125,'S',NULL,'2013-11-16','HTC',10),(20,'Images/productos/5287c3c576f58ADS.JPG','BLACKBERRY','BLACKBERRY SD152-01','ELECTRODOMESTICO',150,'S',NULL,'2013-11-16','BB',10);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tienda'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-16 21:56:43
