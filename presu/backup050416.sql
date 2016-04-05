-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for smw_presupuestos
CREATE DATABASE IF NOT EXISTS `smw_presupuestos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smw_presupuestos`;


-- Dumping structure for table smw_presupuestos.categorias_gastos
CREATE TABLE IF NOT EXISTS `categorias_gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.categorias_gastos: ~0 rows (approximately)
/*!40000 ALTER TABLE `categorias_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_gastos` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `costo_real` double DEFAULT NULL,
  `costo_estimado_alto` double DEFAULT NULL,
  `costo_estimado_bajo` double DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_gastos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.gastos: ~0 rows (approximately)
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.presupuestos
CREATE TABLE IF NOT EXISTS `presupuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `monto_actual` double DEFAULT NULL,
  `monto_estimado` double DEFAULT NULL,
  `monto_final` double DEFAULT NULL,
  `fecha_inicio` double DEFAULT NULL,
  `fecha_fin` varchar(50) DEFAULT NULL,
  `fecha_actual` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.presupuestos: ~0 rows (approximately)
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.presupuestos_gastos
CREATE TABLE IF NOT EXISTS `presupuestos_gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_presupuesto` int(11) DEFAULT '0',
  `id_gasto` int(11) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_presu_gasto` (`id_presupuesto`),
  KEY `id_gasto_presu` (`id_gasto`),
  CONSTRAINT `id_presu_gasto` FOREIGN KEY (`id_presupuesto`) REFERENCES `presupuestos` (`id`),
  CONSTRAINT `id_gasto_presu` FOREIGN KEY (`id_gasto`) REFERENCES `gastos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.presupuestos_gastos: ~0 rows (approximately)
/*!40000 ALTER TABLE `presupuestos_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos_gastos` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.roles_usuarios
CREATE TABLE IF NOT EXISTS `roles_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.roles_usuarios: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles_usuarios` DISABLE KEYS */;
INSERT INTO `roles_usuarios` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Admin', 0, '2016-04-05 01:30:21'),
	(2, 'Supervisor', 0, '2016-04-05 01:33:09'),
	(3, 'Colaborador', 0, '2016-04-05 01:34:58'),
	(4, 'Premium', 0, '2016-04-05 01:35:05'),
	(5, 'Standard', 0, '2016-04-05 01:35:09'),
	(6, 'Invitado', 0, '2016-04-05 01:35:20');
/*!40000 ALTER TABLE `roles_usuarios` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nac` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.usuarios: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `id_rol`, `nombre`, `apellido`, `fecha_nac`, `usuario`, `password`, `estado`, `fecha_alta`) VALUES
	(1, 1, 'Admin', 'Admin', '18/01/1988', 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2016-04-05 01:36:26'),
	(2, 1, 'Admin', 'Martin', '18/01/1988', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2016-04-05 01:38:25');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Dumping structure for table smw_presupuestos.usuarios_presupuestos
CREATE TABLE IF NOT EXISTS `usuarios_presupuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_presupuesto` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_presupuesto` (`id_presupuesto`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `id_presupuesto` FOREIGN KEY (`id_presupuesto`) REFERENCES `presupuestos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smw_presupuestos.usuarios_presupuestos: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuarios_presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_presupuestos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
