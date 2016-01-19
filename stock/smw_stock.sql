-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para smw
CREATE DATABASE IF NOT EXISTS `smw` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smw`;


-- Volcando estructura para tabla smw.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw.categorias: ~6 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Almacen', 0, '2015-04-24 23:12:53'),
	(2, 'Bazar', 0, '2015-04-24 23:12:53'),
	(3, 'Limpieza', 0, '2015-04-24 23:12:53'),
	(4, 'Verduleria', 0, '2015-04-24 23:12:53'),
	(5, 'Carniceria', 0, '2015-04-24 23:12:53'),
	(6, 'Bebidas', 0, '2015-04-24 23:12:53');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


-- Volcando estructura para tabla smw.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` double NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `stock_min` int(11) NOT NULL DEFAULT '0',
  `stock_max` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw.productos: ~12 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `id_categoria`, `precio`, `stock`, `stock_min`, `stock_max`, `estado`, `fecha_alta`) VALUES
	(1, 'Arroz Ala 1KG', 1, 8.5, 29, 10, 100, 0, '2015-04-24 23:51:44'),
	(2, 'Fideos Martona 500g', 1, 10.6, 65, 25, 150, 0, '2015-04-24 23:51:44'),
	(3, 'Repasador 50x50', 2, 29.9, 60, 5, 80, 0, '2015-04-24 23:51:44'),
	(4, 'Escobillon 1.25mts', 2, 24.9, 15, 8, 40, 0, '2015-04-24 23:51:45'),
	(5, 'Detergente 300ml', 3, 19.08, 10, 15, 80, 0, '2015-04-24 23:51:45'),
	(6, 'Lavandina Pura 1Lt', 3, 10.65, 25, 12, 35, 0, '2015-04-24 23:51:45'),
	(7, 'Frutillas 500grms', 4, 20.89, 20, 8, 20, 0, '2015-04-24 23:51:45'),
	(8, 'Cebolla Blanca 1Kg', 4, 10.9, 15, 12, 30, 0, '2015-04-24 23:51:45'),
	(9, 'Vacio 1Kg', 5, 70.3, 100, 50, 120, 0, '2015-04-24 23:51:45'),
	(10, 'Asado 1Kg', 5, 99.9, 80, 60, 150, 0, '2015-04-24 23:51:45'),
	(11, 'Vino Cosecha', 6, 65.9, 34, 25, 80, 0, '2015-04-24 23:51:45'),
	(12, 'Champagne LeNoir', 6, 190.34, 45, 12, 40, 0, '2015-04-24 23:51:45');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


-- Volcando estructura para tabla smw.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw.roles: ~6 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Visitante', 0, '2015-04-24 23:11:21'),
	(2, 'Invitado', 0, '2015-04-24 23:11:21'),
	(3, 'Supervisor', 0, '2015-04-24 23:11:21'),
	(4, 'Administrador', 0, '2015-04-24 23:11:21'),
	(5, 'WebMaster', 0, '2015-04-24 23:11:22'),
	(6, 'Director', 0, '2015-04-24 23:11:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla smw.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT '0',
  `password` varchar(50) DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `id_rol` tinyint(4) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw.usuarios: ~12 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `apellido`, `id_rol`, `dni`, `fecha_nac`, `mail`, `estado`, `fecha_alta`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Martin', 'Medina', 4, 22445588, '1988-01-18', 'info@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(2, 'visita', 'e10adc3949ba59abbe56e057f20f883e', 'Alfonso', 'Roncaglia', 1, 23456598, '1965-03-13', 'visita@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(3, 'invitado', 'e10adc3949ba59abbe56e057f20f883e', 'Marta', 'Rominez', 2, 98655487, '1977-03-07', 'invitado@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(4, 'visita2', 'e10adc3949ba59abbe56e057f20f883e', 'Lucas', 'Di Stefano', 1, 32546598, '1990-01-20', 'visita2@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(5, 'invitado2', 'e10adc3949ba59abbe56e057f20f883e', 'Alberto', 'Dobal', 2, 45123265, '1995-10-04', 'invitado2@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(6, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'Javier', 'Smith', 4, 54653221, '1994-04-10', 'admin2@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(7, 'webmaster', 'e10adc3949ba59abbe56e057f20f883e', 'Santiago', 'Rodriguez', 5, 21546598, '1989-09-21', 'webmaster@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(8, 'webmaster2', 'e10adc3949ba59abbe56e057f20f883e', 'Solange', 'Gonzalez', 5, 32655487, '1978-03-25', 'webmaster2@smartinweb.com', 0, '2015-04-24 23:23:18'),
	(9, 'director', 'e10adc3949ba59abbe56e057f20f883e', 'Carla', 'Gomez', 6, 32542121, '1981-03-31', 'director@smartinweb.com', 0, '2015-04-24 23:23:19'),
	(10, 'director2', 'e10adc3949ba59abbe56e057f20f883e', 'Maria', 'Lopez', 6, 65985421, '1986-12-30', 'director2@smartinweb.com', 0, '2015-04-24 23:23:19'),
	(11, 'supervisor', 'e10adc3949ba59abbe56e057f20f883e', 'Laura', 'Aldana', 3, 32542121, '1987-11-08', 'supervisor@smartinweb.com', 0, '2015-04-24 23:23:19'),
	(12, 'supervisor2', 'e10adc3949ba59abbe56e057f20f883e', 'Cristian', 'Rovira', 3, 65985421, '1982-03-11', 'supervisor2@smartinweb.com', 0, '2015-04-24 23:23:19');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
