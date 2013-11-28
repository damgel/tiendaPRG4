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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `idcarrito` int(20) NOT NULL AUTO_INCREMENT,
  `id_p` int(20) DEFAULT NULL,
  `id_u` int(20) DEFAULT NULL,
  `nombre` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `precio` float DEFAULT '0',
  `cantidad` float DEFAULT '0',
  `subtotal` double DEFAULT '0',
  PRIMARY KEY (`idcarrito`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Camisas','2013-11-28','N'),(2,'Zapatos','2013-11-10','S'),(3,'Pantalones','2013-11-10','S'),(4,'Electronicos','2013-11-27','S'),(5,'Otros','2013-11-10','S'),(7,'Brand New','2013-11-16','S'),(8,'Sombreros','2013-11-27','S'),(9,'Accesorios','2013-11-27','S'),(10,'Belleza','2013-11-28','N');
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
  `fecha_nac` date DEFAULT NULL,
  `correo` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `compra_pendiente` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'jose','guillen','damgel','e703908953979aba5049ec2e83f4e104282abe84','1992-11-22','deakill@hotmail.com','79263016','5297084c3e6e1'),(3,'jose ariel','rivas','jrivas','e703908953979aba5049ec2e83f4e104282abe84','1994-07-14','jariel@yahoo.com','79263016','5296e25d6c5df');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `id_cl` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cl` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_cl` date DEFAULT NULL,
  `activo_cl` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cl`),
  UNIQUE KEY `id_cl_UNIQUE` (`id_cl`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (9,'BLANCO','2013-10-09','S'),(10,'AZUL','2013-10-09','S'),(11,'NEGRO','2013-10-09','S'),(12,'ROJO','2013-10-09','S'),(13,'VERDE','2013-10-09','S'),(14,'CELESTE','2013-10-09','S'),(15,'PERU','2013-10-09','S'),(16,'MORADO','2013-10-09','S'),(17,'ANARANJADO','2013-10-09','S'),(18,'ROSADO','2013-10-09','S');
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idcompra` int(20) NOT NULL AUTO_INCREMENT,
  `cod_compra` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `id_u` int(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cantidad_p` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`idcompra`),
  UNIQUE KEY `idcompra_UNIQUE` (`idcompra`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (85,'5297084c3e6e1',1,'2013-11-28 03:39:59',5,800);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_compra`
--

DROP TABLE IF EXISTS `detalles_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles_compra` (
  `idcompra_d` int(20) NOT NULL AUTO_INCREMENT,
  `id_u` int(20) DEFAULT NULL,
  `nombre_p` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `cod_compra` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idcompra_d`),
  UNIQUE KEY `idcompra_d` (`idcompra_d`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_compra`
--

LOCK TABLES `detalles_compra` WRITE;
/*!40000 ALTER TABLE `detalles_compra` DISABLE KEYS */;
INSERT INTO `detalles_compra` VALUES (209,1,'android daBeast2','5297084c3e6e1','2013-11-28 03:39:59'),(210,1,'0000 TELEFONO','5297084c3e6e1','2013-11-28 03:39:59'),(211,1,'BLACKBERRY','5297084c3e6e1','2013-11-28 03:39:59'),(212,1,'BLACKBERRY','5297084c3e6e1','2013-11-28 03:39:59'),(213,1,'TELEFONO CLASICO','5297084c3e6e1','2013-11-28 03:40:00');
/*!40000 ALTER TABLE `detalles_compra` ENABLE KEYS */;
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
  `tamanio_p` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color_p` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_p`),
  UNIQUE KEY `id_p_UNIQUE` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (3,'Images/productos/zapato1.jpg','zapatos','calidad mundial garantizada','-seleccione-',36.17,'S',0,'2013-11-28','nike',15,'S','BLANCO'),(13,'Images/productos/527eb966d64ba102506.jpg','camisa sport','testing testing testing ','Camisas',17.25,'N',500,'2013-11-28','adidas',10,'S','AZUL'),(14,'Images/productos/5280096c4410611-(70)b.jpg','New Jacket','three pieces jacket','Camisas',120.99,'S',500,'2013-11-28','nike',10,'M','NEGRO'),(17,'Images/productos/5287c0fbec473Telefono.jpg','TELEFONO CLASICO','BRAND NEW PRODUCT','Electronicos',125,'S',499,'2013-11-28','CLASSIC',10,'M','ROJO'),(18,'Images/productos/5287c130cd9432566829399_86e0600664_m_thumb.jpg','producto de prueba','BRAND NEW PRODUCT','Electronicos',54.0514,'S',500,'2013-11-23','Apple',10,'S','ROSADO'),(19,'Images/productos/5287c2e416fe7htc-desire_0.jpg','0000 TELEFONO','BRAND NEW TELEFONO','Electronicos',125,'S',498,'2013-11-17','HTC',10,'XE','AMARILLO'),(20,'Images/productos/5287c3c576f58ADS.JPG','BLACKBERRY','BLACKBERRY SD152-01','Electronicos',150,'S',482,'2013-11-17','BB',10,'XM','BLANCO'),(21,'Images/productos/528b919259dd5descarga.jpg','sombrero playa','palma','Sombreros',28,'S',498,'2013-11-19','ninguna',8,'XS','NEGRO'),(22,'Images/productos/3570-android.jpg','android daBeast','KITKAT VERSION','Electronicos',250,'S',489,'2013-11-28','google',150,'S','BLANCO'),(24,'../Images/productos/5291020a85e4bandroid_eating_apple.png','android daBeast2','KITKAT VERSION2','Electronicos',250,'S',488,'2013-11-28','google',100,'M','CELESTE');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas`
--

DROP TABLE IF EXISTS `tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tallas` (
  `id_ta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ta` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ta` date DEFAULT NULL,
  `activo_ta` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ta`),
  UNIQUE KEY `id_ta_UNIQUE` (`id_ta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas`
--

LOCK TABLES `tallas` WRITE;
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
INSERT INTO `tallas` VALUES (1,'S','2013-10-10','S'),(2,'M','2013-10-10','S'),(3,'X','2013-10-10','S'),(4,'XL','2013-10-10','S'),(5,'XM','2013-10-10','S'),(6,'XS','2013-10-10','S');
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
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

-- Dump completed on 2013-11-28  3:41:26
