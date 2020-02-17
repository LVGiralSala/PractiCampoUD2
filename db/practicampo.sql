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

-- Volcando estructura para tabla practicampo.direccion_usuario
CREATE TABLE IF NOT EXISTS `direccion_usuario` (
  `id` bigint(20) NOT NULL,
  `id_tipo_via_1` int(11) NOT NULL,
  `id_tipo_via_2` int(11) DEFAULT NULL,
  `id_prefijo_num_via` int(11) DEFAULT NULL,
  `id_complemento_via` int(11) DEFAULT NULL,
  `id_prefijo_compl_via` int(11) DEFAULT NULL,
  `id_prefijo_cardinal` int(11) DEFAULT NULL,
  `id_prefijo_placa_1` int(11) DEFAULT NULL,
  `id_complemento_placa` int(11) DEFAULT NULL,
  `id_prefijo_compl_placa` int(11) DEFAULT NULL,
  `id_prefijo_cardinal_placa` int(11) DEFAULT NULL,
  `id_tipo_ubicacion` int(11) DEFAULT NULL,
  `id_tipo_residencia` int(11) DEFAULT NULL,
  `id_prefijo_ubicacion` int(11) DEFAULT NULL,
  `num_placa_1` varchar(4) NOT NULL DEFAULT '',
  `num_placa_2` varchar(4) NOT NULL DEFAULT '',
  `num_via` varchar(4) NOT NULL DEFAULT '',
  `num_residencia` varchar(255) DEFAULT NULL,
  `num_prefijo_ubicacion` int(11) DEFAULT NULL,
  `nombre_ubicacion` varchar(50) DEFAULT '',
  `datos_adicionales` varchar(255) DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_1_idx` (`id_tipo_via_1`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_2_idx` (`id_tipo_via_2`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_3_idx` (`id_prefijo_num_via`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_4_idx` (`id_complemento_via`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_5_idx` (`id_prefijo_compl_via`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_6_idx` (`id_prefijo_cardinal`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_7_idx` (`id_prefijo_placa_1`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_8_idx` (`id_complemento_placa`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_9_idx` (`id_prefijo_cardinal_placa`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_10_idx` (`id_tipo_ubicacion`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_11_idx` (`id_tipo_residencia`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_12_idx` (`id_prefijo_compl_placa`),
  KEY `fk_direccion_usuario_nomenclatura_urbana_13_idx` (`id_prefijo_ubicacion`),
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_1` FOREIGN KEY (`id_tipo_via_1`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_10` FOREIGN KEY (`id_tipo_ubicacion`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_11` FOREIGN KEY (`id_tipo_residencia`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_12` FOREIGN KEY (`id_prefijo_compl_placa`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_13` FOREIGN KEY (`id_prefijo_ubicacion`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_2` FOREIGN KEY (`id_tipo_via_2`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_3` FOREIGN KEY (`id_prefijo_num_via`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_4` FOREIGN KEY (`id_complemento_via`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_5` FOREIGN KEY (`id_prefijo_compl_via`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_6` FOREIGN KEY (`id_prefijo_cardinal`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_7` FOREIGN KEY (`id_prefijo_placa_1`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_8` FOREIGN KEY (`id_complemento_placa`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_9` FOREIGN KEY (`id_prefijo_cardinal_placa`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_usuario_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.direccion_usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion_usuario` DISABLE KEYS */;
REPLACE INTO `direccion_usuario` (`id`, `id_tipo_via_1`, `id_tipo_via_2`, `id_prefijo_num_via`, `id_complemento_via`, `id_prefijo_compl_via`, `id_prefijo_cardinal`, `id_prefijo_placa_1`, `id_complemento_placa`, `id_prefijo_compl_placa`, `id_prefijo_cardinal_placa`, `id_tipo_ubicacion`, `id_tipo_residencia`, `id_prefijo_ubicacion`, `num_placa_1`, `num_placa_2`, `num_via`, `num_residencia`, `num_prefijo_ubicacion`, `nombre_ubicacion`, `datos_adicionales`, `updated_at`, `created_at`) VALUES
	(1, 2, NULL, 14, 47, 47, 47, 11, NULL, NULL, NULL, NULL, 47, NULL, '41', '9', '2', '(NULL)', NULL, '', NULL, '2020-02-16 00:00:00', NULL),
	(8652348, 1, NULL, NULL, 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '41b', '36', '98', NULL, NULL, '', '502', '2020-02-16 23:36:34', '2020-02-16 23:36:34'),
	(30569841, 3, NULL, NULL, 47, 7, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '23', '01', '26', NULL, NULL, '', '102', '2020-02-16 23:38:34', '2020-02-16 23:38:34'),
	(85365213, 1, NULL, NULL, 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, 45, NULL, '45', '23', '32', NULL, NULL, '', '2', '2020-02-16 23:46:10', '2020-02-16 23:46:10'),
	(310698563, 5, NULL, NULL, 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '23', '89', '45', NULL, NULL, '', '405', '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 4, NULL, NULL, 6, 10, NULL, NULL, NULL, NULL, NULL, NULL, 45, NULL, '12c', '41', '36', NULL, NULL, '', '3', '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 2, NULL, NULL, 47, 47, NULL, NULL, NULL, NULL, NULL, NULL, 45, NULL, '41A', '09', '2d', NULL, NULL, '', '3', '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `direccion_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.elemento_nomenclatura
CREATE TABLE IF NOT EXISTS `elemento_nomenclatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elemento_nomenclatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.elemento_nomenclatura: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `elemento_nomenclatura` DISABLE KEYS */;
REPLACE INTO `elemento_nomenclatura` (`id`, `elemento_nomenclatura`) VALUES
	(1, 'Tipo de vía'),
	(2, 'Nombre de vía'),
	(3, 'Prefijo'),
	(4, 'Complemento'),
	(5, 'Prefijo cardinal'),
	(6, 'Tipo ubicación'),
	(7, 'Tipo residencia'),
	(8, 'Prefijo Ubicación'),
	(9, 'Otro');
/*!40000 ALTER TABLE `elemento_nomenclatura` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.espacio_academico
CREATE TABLE IF NOT EXISTS `espacio_academico` (
  `id` int(11) NOT NULL,
  `espacio_academico` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.espacio_academico: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `espacio_academico`) VALUES
	(1, 'N/A'),
	(2020, 'Topografía'),
	(2434, 'Vulnerabilidad y riesgos');
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

-- Volcando estructura para tabla practicampo.estudiantes_solicitud_practica
CREATE TABLE IF NOT EXISTS `estudiantes_solicitud_practica` (
  `id` int(11) NOT NULL DEFAULT '0',
  `num_identificacion` bigint(20) NOT NULL,
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '0',
  `id_solicitud_practica` int(11) NOT NULL DEFAULT '0',
  `nombres` varchar(50) NOT NULL DEFAULT '0',
  `apellidos` varchar(50) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date NOT NULL,
  `eps` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `aprob_terminos_condiciones` bit(1) NOT NULL DEFAULT b'0',
  `verificacion_asistencia` bit(1) NOT NULL DEFAULT b'0',
  `permiso_padres` varbinary(8000) NOT NULL DEFAULT 'b''0''',
  PRIMARY KEY (`id`),
  KEY `fk_estudiantes_solicitud_practica_tipo_identificacion_idx` (`id_tipo_identificacion`),
  KEY `fk_estudiantes_solicitud_practica_solicitud_practica_idx` (`id_solicitud_practica`),
  CONSTRAINT `fk_estudiantes_solicitud_practica_solicitud_practica` FOREIGN KEY (`id_solicitud_practica`) REFERENCES `solicitud_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiantes_solicitud_practica_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.estudiantes_solicitud_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiantes_solicitud_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiantes_solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.herramientas_equipos_practica
CREATE TABLE IF NOT EXISTS `herramientas_equipos_practica` (
  `id` int(11) NOT NULL,
  `nombre_elemento` varchar(50) NOT NULL DEFAULT '',
  `id_solicitud_practica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_herramientas_equipos_solicitud_practica_idx` (`id_solicitud_practica`),
  CONSTRAINT `fk_herramientas_equipos_solicitud_practica` FOREIGN KEY (`id_solicitud_practica`) REFERENCES `solicitud_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.herramientas_equipos_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `herramientas_equipos_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `herramientas_equipos_practica` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.nomenclatura_urbana: ~47 rows (aproximadamente)
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
	(46, 6, 'Barrio', 'BRR'),
	(47, 9, '-', '-');
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

-- Volcando estructura para tabla practicampo.periodo_academico
CREATE TABLE IF NOT EXISTS `periodo_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_academico` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.periodo_academico: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `periodo_academico` DISABLE KEYS */;
REPLACE INTO `periodo_academico` (`id`, `periodo_academico`) VALUES
	(1, 'I'),
	(2, 'II'),
	(3, 'III');
/*!40000 ALTER TABLE `periodo_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.proyeccion_preliminar
CREATE TABLE IF NOT EXISTS `proyeccion_preliminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_transporte` int(11) DEFAULT NULL,
  `id_proyecto_curricular` int(11) DEFAULT NULL,
  `id_docente_responsable` bigint(20) DEFAULT NULL,
  `id_espacio_academico` int(11) DEFAULT NULL,
  `id_peridodo_academico` int(11) DEFAULT NULL,
  `id_semestre_asignatura` int(11) DEFAULT NULL,
  `id_tipo_zona_transitar` int(11) DEFAULT NULL,
  `ruta_principal` varchar(255) DEFAULT NULL,
  `ruta_alterna` varchar(255) DEFAULT NULL,
  `lugar_salida` varchar(255) DEFAULT NULL,
  `lugar_regreso` varchar(255) DEFAULT NULL,
  `fecha_salida_aprox` date DEFAULT NULL,
  `fecha_regreso_aprox` date DEFAULT NULL,
  `num_estudiantes_aprox` int(11) DEFAULT NULL,
  `num_acompaniantes` int(11) DEFAULT NULL,
  `observ_coordinador` varchar(8000) DEFAULT NULL,
  `observ_decano` varchar(8000) DEFAULT NULL,
  `det_recorrido_interno` varchar(8000) DEFAULT NULL,
  `det_tipo_transporte` varchar(50) DEFAULT NULL,
  `num_paradas_trayecto` int(11) DEFAULT NULL,
  `grupo_1` int(11) DEFAULT NULL,
  `grupo_2` int(11) DEFAULT NULL,
  `grupo_3` int(11) DEFAULT NULL,
  `grupo_4` int(11) DEFAULT NULL,
  `duracion_num_dias` int(11) DEFAULT NULL,
  `viaticos_estudiantes` int(11) DEFAULT NULL,
  `viaticos_docente` int(11) DEFAULT NULL,
  `costo_total_transporte` int(11) DEFAULT NULL,
  `cant_transporte` int(11) DEFAULT NULL,
  `capac_transporte` int(11) DEFAULT NULL,
  `exclusiv_tiempo` bit(1) DEFAULT NULL,
  `aprobacion_coordinador` bit(1) DEFAULT NULL,
  `aprobacion_decano` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyeccion_preliminar_users_idx` (`id_docente_responsable`),
  KEY `fk_proyeccion_preliminar_espacio_academico_idx` (`id_espacio_academico`),
  KEY `fk_proyeccion_preliminar_tipo_transporte_idx` (`id_tipo_transporte`),
  KEY `fk_proyeccion_preliminar_proyecto_curricular_idx` (`id_proyecto_curricular`),
  KEY `fk_proyeccion_preliminar_periodo_academico_idx` (`id_peridodo_academico`),
  KEY `fk_proyeccion_preliminar_semestre_asignatura_idx` (`id_semestre_asignatura`),
  KEY `fk_proyeccion_preliminar_tipo_zona_transitar_idx` (`id_tipo_zona_transitar`),
  CONSTRAINT `fk_proyeccion_preliminar_espacio_academico` FOREIGN KEY (`id_espacio_academico`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_periodo_academico` FOREIGN KEY (`id_peridodo_academico`) REFERENCES `periodo_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_proyecto_curricular` FOREIGN KEY (`id_proyecto_curricular`) REFERENCES `proyecto_curricular` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_semestre_asignatura` FOREIGN KEY (`id_semestre_asignatura`) REFERENCES `semestre_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_tipo_transporte` FOREIGN KEY (`id_tipo_transporte`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_tipo_zona_transitar` FOREIGN KEY (`id_tipo_zona_transitar`) REFERENCES `tipo_zona_transitar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_users` FOREIGN KEY (`id_docente_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.proyeccion_preliminar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion_preliminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyeccion_preliminar` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.proyecto_curricular
CREATE TABLE IF NOT EXISTS `proyecto_curricular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_curricular` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.proyecto_curricular: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proyecto_curricular` DISABLE KEYS */;
REPLACE INTO `proyecto_curricular` (`id`, `proyecto_curricular`) VALUES
	(1, 'Administración Ambiental'),
	(2, 'Ingeniería Forestal');
/*!40000 ALTER TABLE `proyecto_curricular` ENABLE KEYS */;

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

-- Volcando estructura para tabla practicampo.semestre_asignatura
CREATE TABLE IF NOT EXISTS `semestre_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semestre_asignatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.semestre_asignatura: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `semestre_asignatura` DISABLE KEYS */;
REPLACE INTO `semestre_asignatura` (`id`, `semestre_asignatura`) VALUES
	(1, 'I'),
	(2, 'II'),
	(3, 'III'),
	(4, 'IV'),
	(5, 'V'),
	(6, 'VI'),
	(7, 'VII'),
	(8, 'VIII'),
	(9, 'IX'),
	(10, 'X');
/*!40000 ALTER TABLE `semestre_asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.solicitud_practica
CREATE TABLE IF NOT EXISTS `solicitud_practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyeccion_preliminar` int(11) DEFAULT NULL,
  `id_estado_solicitud_practica` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_regreso` date DEFAULT NULL,
  `num_estudiantes` int(11) DEFAULT '0',
  `num_acompaniantes` int(11) DEFAULT '0',
  `lugar_salida` varchar(50) DEFAULT NULL,
  `lugar_regreso` varchar(50) DEFAULT NULL,
  `nombre_conductor` varchar(255) DEFAULT NULL,
  `celular_conductor` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitud_practica_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  KEY `fk_solicitud_practica_estado_idx` (`id_estado_solicitud_practica`),
  CONSTRAINT `fk_solicitud_practica_estado` FOREIGN KEY (`id_estado_solicitud_practica`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_practica_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.solicitud_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_certificacion
CREATE TABLE IF NOT EXISTS `tipo_certificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_certificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_certificacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_certificacion` DISABLE KEYS */;
REPLACE INTO `tipo_certificacion` (`id`, `tipo_certificacion`) VALUES
	(1, 'Constancia salida'),
	(2, 'Constancia asistencia');
/*!40000 ALTER TABLE `tipo_certificacion` ENABLE KEYS */;

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

-- Volcando estructura para tabla practicampo.tipo_transporte
CREATE TABLE IF NOT EXISTS `tipo_transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_transporte` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_transporte: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_transporte` DISABLE KEYS */;
REPLACE INTO `tipo_transporte` (`id`, `tipo_transporte`) VALUES
	(1, 'Bus'),
	(2, 'Buseta'),
	(3, 'Camioneta');
/*!40000 ALTER TABLE `tipo_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_zona_transitar
CREATE TABLE IF NOT EXISTS `tipo_zona_transitar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_zona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_zona_transitar: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_zona_transitar` DISABLE KEYS */;
REPLACE INTO `tipo_zona_transitar` (`id`, `tipo_zona`) VALUES
	(1, 'Rural'),
	(2, 'Urbana'),
	(3, 'Rural - Urbana');
/*!40000 ALTER TABLE `tipo_zona_transitar` ENABLE KEYS */;

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
  `usuario` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_residencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` bigint(20) NOT NULL,
  `telefono` bigint(20) DEFAULT NULL,
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

-- Volcando datos para la tabla practicampo.users: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_categoria`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `direccion_residencia`, `celular`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 8, 2, 2020, 2020, NULL, NULL, NULL, NULL, 'LV32', 'Luisa', NULL, 'Garcia', 'Lopez', '', 3195693569, NULL, 'Lauritagiraldo.s@gmail.com', NULL, '$2y$10$uFngpVjfCVSw.vk6DtcLqOs8Y0z7ViO3VZdDIQtw2GJAa56fsoz3G', '5kpGcRawaRWUUETw50pXTSKvDBmAPWCHWdCgOfBPMAx2SVJjzI9R0ddAQAYg', '2020-01-17 01:40:42', '2020-02-17 03:18:50'),
	(8652348, 5, 1, 3, 1, 2434, NULL, NULL, NULL, NULL, NULL, 'criverag', 'Cesar', NULL, 'Rivera', 'Gomez', 'Avenida 98 Bis Este # 41B - 36 APTO 502', 3015698745, 5684512, 'criverag@udistrital.edu.co', NULL, '$2y$10$TL8M9LS8chslOqiMS.aMC.IXnF6L6ZkfVeM3.G6Ecj085Zz3LX7fa', NULL, '2020-02-16 23:36:34', '2020-02-16 23:36:34'),
	(30569841, 4, 1, 8, 1, 2434, NULL, NULL, NULL, NULL, NULL, 'jposadam', 'Jairo', NULL, 'Posada', 'Martinez', 'Carrera 26 - Este # 23 - 01 APTO 102', 3152695487, 3216956, 'jposadam@udistrital.edu.co', NULL, '$2y$10$OmDRQEUkm6I/PtOfk56jFuLd6WbQlyRn27wmkEkOmDwYaqgCa.RIG', NULL, '2020-02-16 23:38:34', '2020-02-16 23:38:34'),
	(85365213, 6, 1, 13, 1, 2434, NULL, NULL, NULL, NULL, NULL, 'josequintero', 'Jose', 'Luis', 'Quintero', 'Zuluaga', 'Avenida 32 Bis Este # 45 - 23 PI 2', 3152369563, 5489632, 'josequintero@gmail.com', NULL, '$2y$10$BA.5BTwcUjHnmzMmsDRiTO75kYbWntQdnduUH2Jah.9WxTBdZu6aK', NULL, '2020-02-16 23:46:10', '2020-02-16 23:46:10'),
	(310698563, 2, 1, 8, 1, 2434, NULL, NULL, NULL, NULL, NULL, 'fussar', 'Freddy', NULL, 'Ussa', 'Rodriguez', 'Transversal 45 Bis Norte # 23 - 89 APTO 405', 3156984569, 4523698, 'fussar@udistrital.edu.co', NULL, '$2y$10$r.oFd571jYk5PM4ycnfnr.OP1mV5HocwmN9z9Flt69qjeWnO6wRbi', NULL, '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 3, 1, 4, 1, 2434, NULL, NULL, NULL, NULL, NULL, 'arojasc', 'Alejandro', NULL, 'Rojas', 'Castro', 'Diagonal 36 Bis Sur # 12C - 41 PI 3', 32569874536, 5632121, 'arojasc@udistrital.edu.co', NULL, '$2y$10$zX5X9sIdU6OgWDABgq7G2uQKji/mGgZSIi0TfZpMzUn4zbKv2S1be', NULL, '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 1, 1, 8, 1, 2020, NULL, NULL, NULL, NULL, NULL, 'lvgiraldos', 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 'Calle 2D - - # 41A - 09 PI 3', 3107964434, 4125679, 'lvgiraldos@udistrital.edu.co', NULL, '$2y$10$V/4DkEVqMJNNXiHyUY42sOqTSRHtfhJAoOViAeoVxzbFwvj72ELg.', NULL, '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
