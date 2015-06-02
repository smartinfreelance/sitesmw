-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para smw_taskadmin
CREATE DATABASE IF NOT EXISTS `smw_taskadmin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smw_taskadmin`;


-- Volcando estructura para tabla smw_taskadmin.acciones
CREATE TABLE IF NOT EXISTS `acciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.acciones: ~7 rows (aproximadamente)
DELETE FROM `acciones`;
/*!40000 ALTER TABLE `acciones` DISABLE KEYS */;
INSERT INTO `acciones` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Alta', 0, '2015-06-01 14:21:59'),
	(2, 'Modifica', 0, '2015-06-01 14:21:59'),
	(3, 'Asigna', 0, '2015-06-01 14:21:59'),
	(4, 'Elimina', 0, '2015-06-01 14:21:59'),
	(5, 'Nueva Accion Edit', 0, '2015-06-02 12:22:58'),
	(6, 'Nueva Accion Edit2', 1, '2015-06-02 12:55:44'),
	(7, 'Nueva Accion Edit2', 0, '2015-06-02 14:00:22');
/*!40000 ALTER TABLE `acciones` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.estados: ~5 rows (aproximadamente)
DELETE FROM `estados`;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Disponible', 0, '2015-06-01 14:23:47'),
	(2, 'En Desarrollo', 0, '2015-06-01 14:23:47'),
	(3, 'Chequeado OK', 0, '2015-06-01 14:23:47'),
	(4, 'Chequeado FAIL', 0, '2015-06-01 14:23:47'),
	(5, 'Finalizado', 0, '2015-06-01 14:23:47'),
	(6, 'Indispuesto2', 1, '2015-06-02 16:14:17'),
	(7, 'Indispuesto', 0, '2015-06-02 16:17:13'),
	(8, 'Indispuesto2', 0, '2015-06-02 16:17:30');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.proyectos: ~4 rows (aproximadamente)
DELETE FROM `proyectos`;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'SMartinWeb', 0, '2015-06-01 14:25:16'),
	(2, 'SMartin Stock', 0, '2015-06-01 14:25:16'),
	(3, 'SMartin TestTraining', 0, '2015-06-01 14:25:16'),
	(4, 'SMartin MorFast', 0, '2015-06-01 14:25:16'),
	(5, 'DePrueba2', 1, '2015-06-02 16:21:08'),
	(6, 'DePrueba', 0, '2015-06-02 16:29:01'),
	(7, 'DePrueba2', 0, '2015-06-02 16:54:35');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `id_superior` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.roles: ~3 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `id_superior`, `estado`, `fecha_alta`) VALUES
	(1, 'Administrador', 0, 0, '2015-06-01 14:26:09'),
	(2, 'Supervisor', 1, 0, '2015-06-01 14:26:09'),
	(3, 'Desarrollador', 2, 0, '2015-06-01 14:26:09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `demora` varchar(50) NOT NULL,
  `demora_actual` varchar(50) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL DEFAULT '4',
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.tasks: ~1 rows (aproximadamente)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `nombre`, `descripcion`, `demora`, `demora_actual`, `id_proyecto`, `id_tipo`, `id_estado`, `id_asignado`, `estado`, `fecha_alta`) VALUES
	(1, 'Armado de Bases de Datos', 'Se debera crear una base de datos destinada a albergar datos de usuarios', '2d 2h 20m', '0m', 1, 3, 1, 4, 0, '2015-06-01 14:36:05');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.tcomentarios
CREATE TABLE IF NOT EXISTS `tcomentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.tcomentarios: ~0 rows (aproximadamente)
DELETE FROM `tcomentarios`;
/*!40000 ALTER TABLE `tcomentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcomentarios` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.thistoriales
CREATE TABLE IF NOT EXISTS `thistoriales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log` varchar(150) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.thistoriales: ~0 rows (aproximadamente)
DELETE FROM `thistoriales`;
/*!40000 ALTER TABLE `thistoriales` DISABLE KEYS */;
/*!40000 ALTER TABLE `thistoriales` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.ttasks
CREATE TABLE IF NOT EXISTS `ttasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.ttasks: ~2 rows (aproximadamente)
DELETE FROM `ttasks`;
/*!40000 ALTER TABLE `ttasks` DISABLE KEYS */;
INSERT INTO `ttasks` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'Desarrollo', 0, '2015-06-01 14:27:10'),
	(2, 'Diseño Web', 0, '2015-06-01 14:27:10'),
	(3, 'Bases de Datos', 0, '2015-06-01 14:27:10'),
	(4, 'Nueva Task', 1, '2015-06-02 17:01:06'),
	(5, 'Nueva Task2', 0, '2015-06-02 17:04:41'),
	(6, 'Nueva Task', 0, '2015-06-02 17:05:19');
/*!40000 ALTER TABLE `ttasks` ENABLE KEYS */;


-- Volcando estructura para tabla smw_taskadmin.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla smw_taskadmin.usuarios: ~4 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `apellido`, `mail`, `id_rol`, `estado`, `fecha_alta`) VALUES
	(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', 'de Sistema', 'admin@taskadmin.com', 1, 0, '2015-06-01 14:28:46'),
	(2, 'supervisor', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', 'de Sistema', 'admin@taskadmin.com', 2, 0, '2015-06-01 14:28:46'),
	(3, 'desarrollador', '81dc9bdb52d04dc20036dbd8313ed055', 'Desarrollador', 'de Sistema', 'admin@taskadmin.com', 3, 0, '2015-06-01 14:28:46'),
	(4, 'noassigned', '81dc9bdb52d04dc20036dbd8313ed055', 'No', 'Asignado', '-', 3, 0, '2015-06-02 14:16:02');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
