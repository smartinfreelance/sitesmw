-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para smw_site
CREATE DATABASE IF NOT EXISTS `smw_site` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smw_site`;


-- Volcando estructura para tabla smw_site.entradas_weblog
CREATE TABLE IF NOT EXISTS `entradas_weblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `articulo` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `imagen_thumb` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_site.entradas_weblog: ~0 rows (aproximadamente)
DELETE FROM `entradas_weblog`;
/*!40000 ALTER TABLE `entradas_weblog` DISABLE KEYS */;
/*!40000 ALTER TABLE `entradas_weblog` ENABLE KEYS */;


-- Volcando estructura para tabla smw_site.novedades
CREATE TABLE IF NOT EXISTS `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `articulo` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_site.novedades: ~0 rows (aproximadamente)
DELETE FROM `novedades`;
/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
