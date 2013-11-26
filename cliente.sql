CREATE TABLE `cliente` (
  `idcliente` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `apellido` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `contrasenia` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `correo` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;