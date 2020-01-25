-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para practicampo
CREATE DATABASE IF NOT EXISTS `practicampo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `practicampo`;

-- Volcando estructura para tabla practicampo.espacio_academico
CREATE TABLE IF NOT EXISTS `espacio_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espacio_academico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.espacio_academico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
/*!40000 ALTER TABLE `espacio_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.roles: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Decano'),
	(3, 'Asistente Decanatura'),
	(4, 'Coordinador Proyecto'),
	(5, 'Docente'),
	(6, 'Tonsportador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_identificacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_vinculacion
CREATE TABLE IF NOT EXISTS `tipo_vinculacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vinculacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_vinculacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_vinculacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_vinculacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL DEFAULT '2',
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '0',
  `id_tipo_vinculacion` int(11) NOT NULL DEFAULT '0',
  `id_espacio_academico` int(11) NOT NULL DEFAULT '0',
  `primer_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_tipo_vinculacion`, `id_espacio_academico`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `usuario`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 'Laura', 'Vanessa', 'Giraldo ', 'Salazar', 'LV32', 'Lauritagiraldo.s@gmail.com', NULL, '$2y$10$uFngpVjfCVSw.vk6DtcLqOs8Y0z7ViO3VZdDIQtw2GJAa56fsoz3G', 'WTUBZfr0at6cGJzm3le3jqvhJ3gAX0SUVKjpFhAlYVF41Kdym7i9jGNjjJ3t', '2020-01-17 01:40:42', '2020-01-17 01:40:42'),
	(2, 1, 1, 1, 1, 'Nefasto', NULL, 'NN', 'NN', 'Nefito', 'Nefito@gmail.com', NULL, '$2y$10$Ntmh4Drn23q3BVRqtNgseu8KqaszRNTFDC9VXXcSA53uhvxEuoNS.', NULL, '2020-01-21 00:20:06', '2020-01-21 00:20:06'),
	(3, 2, 1, 1, 1, 'Bongo ', 'Mauricio', 'NN', 'NN', 'Bongo', 'Bongo@gmail.com', NULL, '$2y$10$CHKtWQzULk8U2Bta4.yYNuL3OkAeVl0c3MV6dJbEIwv2eozYABrxm', NULL, '2020-01-24 21:04:54', '2020-01-24 21:04:54'),
	(4, 2, 1, 1, 1, 'Tane', 'Patricia', 'NN', 'NN', 'Tane', 'tane@gmail.com', NULL, '$2y$10$Ew.P8xgYh92cNceY1RWDc.IYEOkUHn3Ot3eUogs8MBZ1krpeVBJj.', NULL, '2020-01-24 21:18:32', '2020-01-24 21:18:32'),
	(5, 2, 1, 1, 1, 'Bestia', NULL, 'NN', NULL, 'bestia', 'bestia@gmail.com', NULL, '$2y$10$ZTHdXDBbQStRVWi5IoMEPuI87yge2zIXnDtM.zXTp0QMDYKA7vCMa', NULL, '2020-01-24 21:23:23', '2020-01-24 21:23:23'),
	(6, 2, 1, 1, 1, 'Kuzy', 'Pamasai', 'NN', NULL, 'pamita', 'pamita@gmail.com', NULL, '$2y$10$MJIE2WVFha5ff7Hn4hfSR.3795aInju9SqV9Z/7BxiJWbcPevir2m', NULL, '2020-01-24 21:25:34', '2020-01-24 21:25:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
