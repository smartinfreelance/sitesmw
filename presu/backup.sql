-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Volcando datos para la tabla smw_presupuestos.categorias_gastos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_gastos` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.gastos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.presupuestos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
INSERT INTO `presupuestos` (`id`, `nombre`, `monto_estimado`, `monto_real`, `fecha_inicio`, `fecha_fin`, `actual`, `estado`, `fecha_alta`) VALUES
	(1, 'Diciembre', 2000, 1990, '0000-00-00', '1993-10-12', 1, 0, '2015-12-03 11:30:23'),
	(2, 'Diciembre2', 2000, 1990, '0000-00-00', '1991-01-02', 1, 0, '2015-12-03 11:30:56'),
	(3, 'Diciembre2', 2000, 1990, '1990-10-10', '1990-10-12', 1, 0, '2015-12-03 11:31:27'),
	(4, 'Diciembre2', 2000, 1990, '1990-10-10', '1990-10-13', 1, 0, '2015-12-03 11:31:46');
/*!40000 ALTER TABLE `presupuestos` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.presupuestos_gastos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `presupuestos_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos_gastos` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.roles_usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles_usuarios` DISABLE KEYS */;
INSERT INTO `roles_usuarios` (`id`, `nombre`, `estado`, `fecha_alta`) VALUES
	(1, 'admin', 0, '2015-12-02 18:37:44'),
	(2, 'user standard', 0, '2015-12-02 18:38:00');
/*!40000 ALTER TABLE `roles_usuarios` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando datos para la tabla smw_presupuestos.usuarios_presupuestos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios_presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios_presupuestos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
