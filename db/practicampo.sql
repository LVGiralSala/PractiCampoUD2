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

-- Volcando estructura para tabla practicampo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.categoria: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
REPLACE INTO `categoria` (`id`, `categoria`) VALUES
	(1, 'PROFESOR ASISTENTE'),
	(2, 'PROFESOR ASISTENTE COMPLETO'),
	(3, 'PROFESOR ASOCIADO'),
	(4, 'PROFESOR ASOCIADO COMPLETO'),
	(5, 'PROFESOR AUXILIAR'),
	(6, 'PROFESOR AUXILIAR COMPLETO'),
	(7, 'PROFESOR TITULAR'),
	(8, 'PROFESOR TITULAR COMPLETO'),
	(9, 'TITULAR XIII'),
	(10, 'TITULAR XVII'),
	(11, 'TITULAR XVIII'),
	(12, 'TITULAR XIX'),
	(13, 'TITULAR XXII');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.elemento_nomenclatura
CREATE TABLE IF NOT EXISTS `elemento_nomenclatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elemento_nomenclatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.elemento_nomenclatura: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `elemento_nomenclatura` DISABLE KEYS */;
REPLACE INTO `elemento_nomenclatura` (`id`, `elemento_nomenclatura`) VALUES
	(1, 'Tipo de vía'),
	(2, 'Nombre de vía'),
	(3, 'Prefijo'),
	(4, 'Complemento'),
	(5, 'Prefijo cardinal'),
	(6, 'Tipo ubicación'),
	(7, 'Tipo residencia'),
	(8, 'Prefijo Ubicación');
/*!40000 ALTER TABLE `elemento_nomenclatura` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.espacio_academico
CREATE TABLE IF NOT EXISTS `espacio_academico` (
  `id` int(11) NOT NULL,
  `espacio_academico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.espacio_academico: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `espacio_academico`) VALUES
	(1, 'N/A'),
	(2020, 'Topografía');
/*!40000 ALTER TABLE `espacio_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.estado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
REPLACE INTO `estado` (`id`, `estado`) VALUES
	(1, 'Activo'),
	(2, 'Inactivo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

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

-- Volcando estructura para tabla practicampo.nomenclatura_urbana
CREATE TABLE IF NOT EXISTS `nomenclatura_urbana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_elemento_nomenclatura` int(11) DEFAULT NULL,
  `nomenclatura` varchar(50) NOT NULL,
  `abreviatura` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nomenclatura_urbana_elemento_nomenclatura_idx` (`id_elemento_nomenclatura`),
  CONSTRAINT `fk_nomenclatura_urbana_elemento_nomenclatura` FOREIGN KEY (`id_elemento_nomenclatura`) REFERENCES `elemento_nomenclatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.nomenclatura_urbana: ~46 rows (aproximadamente)
/*!40000 ALTER TABLE `nomenclatura_urbana` DISABLE KEYS */;
REPLACE INTO `nomenclatura_urbana` (`id`, `id_elemento_nomenclatura`, `nomenclatura`, `abreviatura`) VALUES
	(1, 1, 'Avenida', 'AV'),
	(2, 1, 'Calle', 'CL'),
	(3, 1, 'Carrera', 'CR'),
	(4, 1, 'Diagonal', 'DG'),
	(5, 1, 'Transversal', 'TV'),
	(6, 4, 'Bis', 'BIS'),
	(7, 5, 'Este', 'ESTE'),
	(8, 5, 'Norte', 'NORTE'),
	(9, 5, 'Oeste', 'OESTE'),
	(10, 5, 'Sur', 'SUR'),
	(11, 3, 'A', 'A'),
	(12, 3, 'B', 'B'),
	(13, 3, 'C', 'C'),
	(14, 3, 'D', 'D'),
	(15, 3, 'E', 'E'),
	(16, 3, 'F', 'F'),
	(17, 3, 'G', 'G'),
	(18, 3, 'H', 'H'),
	(19, 3, 'I', 'I'),
	(20, 3, 'J', 'J'),
	(21, 3, 'K', 'K'),
	(22, 3, 'L', 'L'),
	(23, 3, 'M', 'M'),
	(24, 3, 'N', 'N'),
	(25, 3, 'O', 'O'),
	(26, 3, 'P', 'P'),
	(27, 3, 'Q', 'Q'),
	(28, 3, 'R', 'R'),
	(29, 3, 'S', 'S'),
	(30, 3, 'T', 'T'),
	(31, 3, 'U', 'U'),
	(32, 3, 'V', 'V'),
	(33, 3, 'W', 'W'),
	(34, 3, 'X', 'X'),
	(35, 3, 'Y', 'Y'),
	(36, 3, 'Z', 'Z'),
	(37, 6, 'Conjunto', 'CONJ'),
	(38, 6, 'Edificio', 'ED'),
	(39, 8, 'Casa', 'CA'),
	(40, 7, 'Apartamento', 'APTO'),
	(41, 6, 'Manzana', 'MZ'),
	(42, 6, 'Conjunto Residencial', 'CON'),
	(43, 8, 'Interior', 'IN'),
	(44, 8, 'Torrre', 'TO'),
	(45, 7, 'Piso', 'PI'),
	(46, 6, 'Barrio', 'BRR');
/*!40000 ALTER TABLE `nomenclatura_urbana` ENABLE KEYS */;

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

-- Volcando estructura para tabla practicampo.proyeccion
CREATE TABLE IF NOT EXISTS `proyeccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyeccion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.proyeccion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion` DISABLE KEYS */;
REPLACE INTO `proyeccion` (`id`, `nombre_proyeccion`) VALUES
	(1, 'Bogota-Girardot');
/*!40000 ALTER TABLE `proyeccion` ENABLE KEYS */;

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
	(6, 'Transportador');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_identificacion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
REPLACE INTO `tipo_identificacion` (`id`, `tipo_identificacion`, `sigla`) VALUES
	(1, 'Cédula de Ciudadanía', 'C.C'),
	(2, 'Cédula de Extranjería', 'C.E'),
	(3, 'Pasaporte', 'PAS');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '2',
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '1',
  `id_categoria` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL DEFAULT '1',
  `id_espacio_academico_1` int(11) NOT NULL,
  `id_espacio_academico_2` int(11) DEFAULT NULL,
  `id_espacio_academico_3` int(11) DEFAULT NULL,
  `id_espacio_academico_4` int(11) DEFAULT NULL,
  `id_espacio_academico_5` int(11) DEFAULT NULL,
  `id_espacio_academico_6` int(11) DEFAULT NULL,
  `primer_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_users_roles_idx` (`id_role`),
  KEY `fk_users_categoria_idx` (`id_categoria`),
  KEY `fk_users_tipo_identificacion_idx` (`id_tipo_identificacion`),
  KEY `fk_users_espacio_academico_1_idx` (`id_espacio_academico_1`),
  KEY `fk_users_espacio_academico_2_idx` (`id_espacio_academico_2`),
  KEY `fk_users_espacio_academico_3_idx` (`id_espacio_academico_3`),
  KEY `fk_users_espacio_academico_4_idx` (`id_espacio_academico_4`),
  KEY `fk_users_espacio_academico_5_idx` (`id_espacio_academico_5`),
  KEY `fk_users_espacio_academico_6_idx` (`id_espacio_academico_6`),
  KEY `fk_users_estado` (`id_estado`),
  CONSTRAINT `fk_users_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_1` FOREIGN KEY (`id_espacio_academico_1`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_2` FOREIGN KEY (`id_espacio_academico_2`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_3` FOREIGN KEY (`id_espacio_academico_3`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_4` FOREIGN KEY (`id_espacio_academico_4`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_5` FOREIGN KEY (`id_espacio_academico_5`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_6` FOREIGN KEY (`id_espacio_academico_6`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.users: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_categoria`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `usuario`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 8, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 'LV32', 'Lauritagiraldo.s@gmail.com', NULL, '$2y$10$uFngpVjfCVSw.vk6DtcLqOs8Y0z7ViO3VZdDIQtw2GJAa56fsoz3G', 'RjUr1sJz0EAIAQspYmjif8hmvTzheBKV3ApmM0sG6AdnPmqeTukgnQBnVwki', '2020-01-17 01:40:42', '2020-01-30 22:52:30'),
	(2, 1, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Nefasto', NULL, 'NN', 'NN', 'Nefito', 'Nefito@gmail.com', NULL, '$2y$10$Ntmh4Drn23q3BVRqtNgseu8KqaszRNTFDC9VXXcSA53uhvxEuoNS.', NULL, '2020-01-21 00:20:06', '2020-01-21 00:20:06'),
	(3, 2, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Bongo ', 'Mauricio', 'NN', 'NN', 'Bongo', 'Bongo@gmail.com', NULL, '$2y$10$CHKtWQzULk8U2Bta4.yYNuL3OkAeVl0c3MV6dJbEIwv2eozYABrxm', NULL, '2020-01-24 21:04:54', '2020-01-24 21:04:54'),
	(4, 2, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Tane', 'Patricia', 'NN', 'NN', 'Tane', 'tane@gmail.com', NULL, '$2y$10$Ew.P8xgYh92cNceY1RWDc.IYEOkUHn3Ot3eUogs8MBZ1krpeVBJj.', NULL, '2020-01-24 21:18:32', '2020-01-24 21:18:32'),
	(5, 2, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Bestia', NULL, 'NN', 'nn', 'bestia', 'bestia@gmail.com', NULL, '$2y$10$ZTHdXDBbQStRVWi5IoMEPuI87yge2zIXnDtM.zXTp0QMDYKA7vCMa', NULL, '2020-01-24 21:23:23', '2020-01-24 21:23:23'),
	(6, 3, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'Kuzy', 'Pamasai', 'Giraldo', 'Linares', 'pamita', 'pamita@gmail.com', NULL, '$2y$10$MJIE2WVFha5ff7Hn4hfSR.3795aInju9SqV9Z/7BxiJWbcPevir2m', NULL, '2020-01-24 21:25:34', '2020-01-29 00:00:00'),
	(7, 4, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'qa', 'fe', 'va', 'zi', 'abcd', 'abcde@gmail.com', NULL, '$2y$10$xGPHxHvedNZhoERXdh1rDuWadBjm2Sj3N2pLLTvFcjus011tgU9ke', NULL, '2020-01-27 21:48:40', '2020-01-27 21:48:40'),
	(8, 2, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'es', 'bo', 'cu', 'um', 'gatos', 'gatos@gmail.com', NULL, '$2y$10$uGVJBOlpzfk/D28m3iETbesaAZ5.vFWlcqyOmZvo8cKzdLZHFsrIy', NULL, '2020-01-27 21:50:42', '2020-01-27 21:50:42'),
	(9, 2, 1, 1, 1, 2020, 2020, NULL, NULL, NULL, NULL, 'sa', 'le', 'me', 'ro', 'perros', 'perros@gmail.com', NULL, '$2y$10$jEmI.PmrhisIxORngV4rDeHjg37Y9kzdlwRsO5zMmeo2gvWS/y9Yy', NULL, '2020-01-27 21:54:17', '2020-01-27 21:54:17'),
	(12345678, 2, 1, 1, 2, 2020, 2020, NULL, NULL, NULL, NULL, 'gu', 'hi', 'jo', 'ke', 'Farol', 'farol@gmail.com', NULL, '$2y$10$dxukMxt9sI.K/mXqHB84tuqL5ds38CKIx8NzYc9oTKz2SE6Cg4NHW', NULL, '2020-01-27 22:15:33', '2020-01-27 22:15:33'),
	(80213850, 5, 1, 1, 2, 2020, 2020, NULL, NULL, NULL, NULL, 'andres', 'giovanny', 'linares', 'rabia', 'aglr', 'andres@gmail.com', NULL, '$2y$10$I.zzgVqvTcUtc5aAQAjBfeGbI7/PL2EF4GwIEXzVcOO7atMBZv8Ei', NULL, '2020-01-29 00:10:03', '2020-01-29 00:10:03'),
	(123456788, 2, 1, 1, 2, 2020, 2020, NULL, NULL, NULL, NULL, 'Maestro', 'sas', 'sas', 'Rochy', 'Rochy', 'Rochy@gmail.com', NULL, '$2y$10$.ynETJUa6C3mNvhL9tQ3COEt586QbyPipm24K/I.e4PttVJ1zgyt2', NULL, '2020-01-27 23:34:25', '2020-01-27 23:34:25'),
	(123456789, 2, 1, 1, 2, 2020, 2020, NULL, NULL, NULL, NULL, 'ta', 'mi', 'fe', 'vi', 'Kuzita', 'kuzita@gmail.com', NULL, '$2y$10$ER95EG3qwnfiJxXRpPo92.f6asmXdEpSYLMFFTHYSsDQGbfhqYVuq', NULL, '2020-01-27 23:26:54', '2020-01-27 23:26:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
