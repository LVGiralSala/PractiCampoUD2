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

-- Volcando estructura para tabla practicampo.codigo_graduacion
CREATE TABLE IF NOT EXISTS `codigo_graduacion` (
  `id` varchar(20) DEFAULT NULL,
  `nombre_estudiante` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.codigo_graduacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `codigo_graduacion` DISABLE KEYS */;
REPLACE INTO `codigo_graduacion` (`id`, `nombre_estudiante`) VALUES
	('kj454aogzB59E', 'Cristian Pérez');
/*!40000 ALTER TABLE `codigo_graduacion` ENABLE KEYS */;

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
  CONSTRAINT `fk_direccion_usuario_nomenclatura_urbana_9` FOREIGN KEY (`id_prefijo_cardinal_placa`) REFERENCES `nomenclatura_urbana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.direccion_usuario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `direccion_usuario` DISABLE KEYS */;
REPLACE INTO `direccion_usuario` (`id`, `id_tipo_via_1`, `id_tipo_via_2`, `id_prefijo_num_via`, `id_complemento_via`, `id_prefijo_compl_via`, `id_prefijo_cardinal`, `id_prefijo_placa_1`, `id_complemento_placa`, `id_prefijo_compl_placa`, `id_prefijo_cardinal_placa`, `id_tipo_ubicacion`, `id_tipo_residencia`, `id_prefijo_ubicacion`, `num_placa_1`, `num_placa_2`, `num_via`, `num_residencia`, `num_prefijo_ubicacion`, `nombre_ubicacion`, `datos_adicionales`, `updated_at`, `created_at`) VALUES
	(1, 2, NULL, 14, 47, 47, 47, 11, NULL, NULL, NULL, NULL, 47, NULL, '41', '9', '2', '(NULL)', NULL, '', NULL, '2020-02-16 00:00:00', NULL),
	(8652348, 1, NULL, NULL, 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '41b', '36', '98', NULL, NULL, '', '502', '2020-02-16 23:36:34', '2020-02-16 23:36:34'),
	(30569841, 3, NULL, NULL, 47, 7, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, '23', '01', '26', NULL, NULL, '', '102', '2020-02-16 23:38:34', '2020-02-16 23:38:34'),
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
  `id_programa_academico` int(11) NOT NULL,
  `codigo_espacio_academico` int(11) NOT NULL,
  `espacio_academico` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_estudios_1` int(11) DEFAULT '0',
  `plan_estudios_2` int(11) DEFAULT '0',
  `tipo_espacio` varchar(50) DEFAULT NULL,
  `extramural` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programa_academico_espacio_academico` (`id_programa_academico`),
  CONSTRAINT `fk_programa_academico_espacio_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.espacio_academico: ~135 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `id_programa_academico`, `codigo_espacio_academico`, `espacio_academico`, `plan_estudios_1`, `plan_estudios_2`, `tipo_espacio`, `extramural`) VALUES
	(1, 81, 2346, 'Gestión comercial', 344, 244, 'Teórico-Práctica', 1),
	(2, 81, 2328, 'Cuencas', 344, NULL, 'Teórico-Práctica', 1),
	(3, 81, 2324, 'Residuos líquidos ', 344, 244, 'Teórico-Práctica', 1),
	(4, 81, 2334, 'Operación de plantas y estaciones de bombeo', 344, 244, 'Teórico-Práctica', 1),
	(5, 81, 2323, 'Gestión ambiental II', 344, NULL, 'Teórico-Práctica', 1),
	(6, 81, 2312, 'Ecología', 344, 244, 'Teórico-Práctica', 1),
	(7, 81, 2319, 'Calidad del agua ', 344, 244, 'Teórico-Práctica', 1),
	(8, 81, 2331, 'Residuos sólidos', 344, 244, 'Teórico-Práctica', 1),
	(9, 81, 2327, 'Gestión ambiental I', 344, NULL, 'Teórico-Práctica', 1),
	(10, 81, 2325, 'Administración ambiental y desarrollo local', 344, 244, 'Teórico-Práctica', 1),
	(11, 81, 2341, 'Servicio público de energía', 344, 244, 'Teórico-Práctica', 1),
	(12, 181, 2112, 'Fundamentos de química', 349, 249, 'Teórico-Práctica', 1),
	(13, 181, 11809, 'Química sanitaria', 349, 249, 'Teórico-Práctica', 1),
	(14, 181, 11811, 'Procesos unitarios I', 349, 249, 'Teórico-Práctica', 1),
	(15, 181, 11802, 'Ecología humana', 349, 249, 'Teórico-Práctica', 1),
	(16, 181, 2509, 'Sociedad y ambiente', 349, 249, 'Teórico-Práctica', 1),
	(17, 181, 11817, 'Plantas de tratamiento para agua potable', 349, 249, 'Teórico-Práctica', 1),
	(18, 181, 11820, 'Plantas de tratamiento para agua residual', 349, 249, 'Teórico-Práctica', 1),
	(19, 181, 2531, 'Emisiones atmosféricas', 349, 249, 'Teórico-Práctica', 1),
	(20, 181, 11812, 'Calidad del aire', 349, 249, 'Teórico-Práctica', 1),
	(21, 181, 11814, 'Tratamiento y disposición de residuos sólidos', 349, 249, 'Teórico-Práctica', 1),
	(22, 181, 11821, 'Salida integrada', 349, 249, 'Teórico-Práctica', 1),
	(23, 181, 11804, 'Zoonosis y epidemiología', 349, 249, 'Teórico-Práctica', 1),
	(24, 181, 11836, 'Elementos de planificación territorial', 349, 249, 'Teórico-Práctica', 1),
	(25, 181, 2539, 'Saneamiento urbano y rural', 349, 249, 'Teórico-Práctica', 1),
	(26, 181, 11816, 'Política sanitaria', 349, 249, 'Teórico-Práctica', 1),
	(27, 181, 11810, 'Acueductos', 349, 249, 'Teórico-Práctica', 1),
	(28, 181, 2027, 'Fundamentos de ecología', 349, 249, 'Teórico-Práctica', 1),
	(29, 10, 2137, 'Práctica integrada I', 342, 242, 'Teórico-Práctica', 1),
	(30, 10, 2166, 'Evaluación ambiental', 342, 242, 'Teórico-Práctica', 1),
	(31, 10, 2162, 'Silvicultura comunitaria', 342, 242, 'Teórico-Práctica', 1),
	(32, 10, 2119, 'Geología y geomorfología', 342, 242, 'Teórico-Práctica', 1),
	(33, 10, 2160, 'Ordenamiento territorial', 342, 242, 'Teórico-Práctica', 1),
	(34, 10, 2113, 'Introducción a la ingeniería forestal', 342, 242, 'Teórico-Práctica', 1),
	(35, 10, 2126, 'Percepción remota e interpretación de imágenes', 342, 242, 'Teórico-Práctica', 1),
	(36, 10, 2175, 'Áreas protegidas', 342, 242, 'Teórico-Práctica', 1),
	(37, 10, 2109, 'Micorrizas', 342, 242, 'Teórico-Práctica', 1),
	(38, 10, 2127, 'Suelos I', 342, 242, 'Teórico-Práctica', 1),
	(39, 10, 2132, 'Dendrología II', 342, 242, 'Teórico-Práctica', 1),
	(40, 10, 2163, 'Silvicultura de bosques naturales', 342, 242, 'Teórico-Práctica', 1),
	(41, 10, 2117, 'Fertilización y fertilizantes', 342, 242, 'Teórico-Práctica', 1),
	(42, 10, 2128, 'Química de productos forestales', 342, 242, 'Teórico-Práctica', 1),
	(43, 10, 2148, 'Aprovechamiento forestal', 342, 242, 'Teórico-Práctica', 1),
	(44, 10, 2116, 'Sistemas agroforestales', 342, 242, 'Teórico-Práctica', 1),
	(45, 10, 2161, 'Estructuras de la madera', 342, 242, 'Teórico-Práctica', 1),
	(46, 10, 2124, 'Dendrología I', 342, 242, 'Teórico-Práctica', 1),
	(47, 10, 2179, 'Práctica integrada III', 342, 242, 'Teórico-Práctica', 1),
	(48, 10, 2152, 'Modelamiento de fenómenos biológicos', 342, 242, 'Teórico-Práctica', 1),
	(49, 10, 2170, 'Biología de la conservación', 342, 242, 'Teórico-Práctica', 1),
	(50, 10, 2177, 'Gestión del riesgo', 342, 242, 'Teórico-Práctica', 1),
	(51, 10, 2111, 'Biología general', 342, 242, 'Teórico-Práctica', 1),
	(52, 10, 2154, 'Propiedades de la madera', 342, 242, 'Teórico-Práctica', 1),
	(53, 10, 2115, 'Botánica taxonómica', 342, 242, 'Teórico-Práctica', 1),
	(54, 10, 2156, 'Extensión forestal', 342, 242, 'Teórico-Práctica', 1),
	(55, 10, 2134, 'Fisiología forestal', 342, 242, 'Teórico-Práctica', 1),
	(56, 10, 2147, 'Conservación de suelos', 342, 242, 'Teórico-Práctica', 1),
	(57, 10, 2155, 'Fitomejoramiento', 342, 242, 'Teórico-Práctica', 1),
	(58, 10, 2173, 'Ordenación de bosques', 342, 242, 'Teórico-Práctica', 1),
	(59, 10, 2130, 'Ecología forestal avanzada', 342, 242, 'Teórico-Práctica', 1),
	(60, 10, 2146, 'Sanidad forestal', 342, 242, 'Teórico-Práctica', 1),
	(61, 10, 2139, 'Hidrología', 342, 242, 'Teórico-Práctica', 1),
	(62, 10, 2165, 'Ingeniería del riego', 342, 242, 'Teórico-Práctica', 1),
	(63, 10, 2133, 'Suelos II', 342, 242, 'Teórico-Práctica', 1),
	(64, 10, 2167, 'Industrias forestales I', 342, 242, 'Teórico-Práctica', 1),
	(65, 10, 2138, 'Mediciones forestales', 342, 242, 'Teórico-Práctica', 1),
	(66, 10, 2149, 'Silvicultura de plantaciones', 342, 242, 'Teórico-Práctica', 1),
	(67, 10, 2174, 'Industrias forestales II', 342, 242, 'Teórico-Práctica', 1),
	(69, 10, 2159, 'Práctica integrada II', 342, 242, 'Teórico-Práctica', 1),
	(70, 10, 2153, 'Cuencas hidrográficas', 342, 242, 'Teórico-Práctica', 1),
	(71, 10, 2158, 'Desarrollo y medio ambiente', 342, 242, 'Teórico-Práctica', 1),
	(74, 32, 2043, 'Topografía automatizada', 341, 241, 'Teórico-Práctica', 1),
	(75, 32, 2042, 'Tránsito y transportes ', 341, 241, 'Teórico-Práctica', 1),
	(76, 32, 2005, 'Planimetría', 341, 241, 'Teórico-Práctica', 1),
	(77, 32, 2031, 'Mecánica de suelos', 341, 241, 'Teórico-Práctica', 1),
	(78, 32, 2044, 'Pavimentos', 341, 241, 'Teórico-Práctica', 1),
	(79, 32, 2025, 'Geología y geomorfología', 341, 241, 'Teórico-Práctica', 1),
	(80, 32, 2045, 'Análisis y gestión del riesgo', 341, 241, 'Teórico-Práctica', 1),
	(81, 32, 2041, 'Levantamientos especiales', 341, 241, 'Teórico-Práctica', 1),
	(82, 31, 2238, 'Cartografía digital ', 243, NULL, 'Teórico-Práctica', 1),
	(83, 31, 19604, 'Levantamientos altimétricos', NULL, NULL, 'Teórico-Práctica', 1),
	(84, 31, 19606, 'Topografía de vías', NULL, NULL, 'Teórico-Práctica', 1),
	(85, 31, 2228, 'Localización de vías', 243, NULL, 'Teórico-Práctica', 1),
	(86, 31, 2249, 'Arqueoastronomía', 243, NULL, 'Teórico-Práctica', 1),
	(87, 31, 2232, 'Fotogrametría y fotointerpretación', 243, NULL, 'Teórico-Práctica', 1),
	(88, 31, 2245, 'Geodesia posicional', 243, NULL, 'Teórico-Práctica', 1),
	(89, 31, 2251, 'Uso del vehículo aéreo no tripulado-vant en la ingeniería', 243, NULL, 'Teórico-Práctica', 1),
	(90, 31, 2221, 'Diseño geométrico de vías', 243, NULL, 'Teórico-Práctica', 1),
	(91, 31, 19601, 'Levantamientos planimétricos', NULL, NULL, 'Teórico-Práctica', 1),
	(92, 180, 2703, 'Introducción a la ingeniería ambiental', 347, 247, 'Teórico-Práctica', 1),
	(93, 180, 2716, 'Geología y geomorfología', 347, 247, 'Teórico-Práctica', 1),
	(94, 180, 2720, 'Suelos', 347, 247, 'Teórico-Práctica', 1),
	(95, 180, 2724, 'Química ambiental aplicada', 347, 247, 'Teórico-Práctica', 1),
	(96, 180, 2727, 'Ecología analítica', 347, 247, 'Teórico-Práctica', 1),
	(97, 180, 2728, 'Contaminación ambiental I', 347, 247, 'Teórico-Práctica', 1),
	(98, 180, 2729, 'Hidráulica', 347, 247, 'Teórico-Práctica', 1),
	(99, 180, 2733, 'Ordenamiento territorial rural', 347, 247, 'Teórico-Práctica', 1),
	(100, 180, 2734, 'Contaminación ambiental II', 347, 247, 'Teórico-Práctica', 1),
	(101, 180, 2735, 'Tecnologías apropiadas I', 347, 247, 'Teórico-Práctica', 1),
	(102, 180, 2736, 'Hidrogeología', 347, 247, 'Teórico-Práctica', 1),
	(103, 180, 2739, 'Tecnologías apropiadas II', 347, 247, 'Teórico-Práctica', 1),
	(104, 180, 2746, 'Evaluación ambiental II', 347, 247, 'Teórico-Práctica', 1),
	(105, 180, 2742, 'Evaluación ambiental I', 347, 247, 'Teórico-Práctica', 1),
	(106, 180, 2743, 'Manejo técnico ambiental', 347, 247, 'Teórico-Práctica', 1),
	(107, 180, 2730, 'Fisicoquímica de fluidos', 347, 247, 'Teórico-Práctica', 1),
	(108, 180, 2726, 'Hidrología', 347, 247, 'Teórico-Práctica', 1),
	(109, 85, 2525, 'Tratamiento de agua para consumo humano', 246, NULL, 'Teórico-Práctica', 1),
	(110, 85, 2526, 'Residuos líquidos', 246, NULL, 'Teórico-Práctica', 1),
	(111, 85, 2503, 'Introducción al saneamiento ambiental', 246, NULL, 'Teórico-Práctica', 1),
	(112, 85, 2507, 'Topografía', 246, NULL, 'Teórico-Práctica', 1),
	(113, 85, 2524, 'Fundamentos acueductos y alcantarillados', 246, NULL, 'Teórico-Práctica', 1),
	(114, 85, 2519, 'Calidad del agua ', 246, NULL, 'Teórico-Práctica', 1),
	(115, 85, 2520, 'Zoonosis', 246, NULL, 'Teórico-Práctica', 1),
	(116, 85, 2528, 'Organización comunitaria', 246, NULL, 'Teórico-Práctica', 1),
	(117, 85, 2534, 'Administración municipal', 246, NULL, 'Teórico-Práctica', 1),
	(118, 85, 2532, 'Residuos Sólidos', 246, NULL, 'Teórico-Práctica', 1),
	(119, 85, 2027, 'Fundamentos de ecología', 246, NULL, 'Teórico-Práctica', 1),
	(120, 85, 2509, 'Sociedad y ambiente', 246, NULL, 'Teórico-Práctica', 1),
	(121, 85, 2506, 'Hidráulica', 246, NULL, 'Teórico-Práctica', 1),
	(122, 85, 2543, 'Salida integrada', 246, NULL, 'Teórico-Práctica', 1),
	(123, 85, 2539, 'Saneamiento urbano y rural', 246, NULL, 'Teórico-Práctica', 1),
	(124, 1, 7019, 'Deporte formativo', 348, 248, 'Teórico-Práctica', 1),
	(125, 1, 7021, 'Desarrollo organizacional', 348, 248, 'Teórico-Práctica', 1),
	(126, 1, 7032, 'Recreación', 348, 248, 'Teórico-Práctica', 1),
	(127, 1, 7046, 'Deporte de alto rendimiento', 348, 248, 'Teórico-Práctica', 1),
	(128, 1, 7050, 'Escenarios y entornos deportivos', 348, 248, 'Teórico-Práctica', 1),
	(129, 185, 2443, 'Administración de recursos naturales ', 345, 245, 'Teórico-Práctica', 1),
	(130, 185, 2429, 'Factores de riesgo ambiental en salud pública', 345, 245, 'Teórico-Práctica', 1),
	(131, 185, 2418, 'Problemas y alternativas ambientales', 345, 245, 'Teórico-Práctica', 1),
	(132, 185, 2408, 'Sociedad y ambiente', 345, 245, 'Teórico-Práctica', 1),
	(133, 185, 2439, 'Planificación ambiental territorial ', 245, NULL, 'Teórico-Práctica', 1),
	(134, 185, 19101, 'Planificación ambiental territorial ', 345, NULL, 'Teórico-Práctica', 1),
	(135, 185, 2434, 'Vulnerabilidad y riesgos ', 345, 245, 'Teórico-Práctica', 1),
	(136, 185, 2403, 'Introducción a la administración ambiental', 345, 245, 'Teórico-Práctica', 1),
	(137, 185, 2413, 'Organización comunitaria', 345, 245, 'Teórico-Práctica', 1),
	(999, 999, 0, 'N/A', 0, 0, 'N/A', 1);
/*!40000 ALTER TABLE `espacio_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `abrev` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.estado: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
REPLACE INTO `estado` (`id`, `estado`, `abrev`) VALUES
	(1, 'Activo', 'Act.'),
	(2, 'Inactivo', 'Inact.'),
	(3, 'Aprobado', 'Aprob.'),
	(4, 'Desaprobado', 'Desap.'),
	(5, 'Pendiente', 'Pend.');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.estudiantes_solicitud_practica
CREATE TABLE IF NOT EXISTS `estudiantes_solicitud_practica` (
  `id` int(11) NOT NULL DEFAULT '0',
  `num_identificacion` bigint(20) NOT NULL,
  `cod_estudiantil` bigint(20) NOT NULL,
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '0',
  `id_solicitud_practica` int(11) NOT NULL DEFAULT '0',
  `nombres` varchar(50) NOT NULL DEFAULT '0',
  `apellidos` varchar(50) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date NOT NULL,
  `eps` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `aprob_terminos_condiciones` bit(1) NOT NULL DEFAULT b'0',
  `verificacion_asistencia` bit(1) NOT NULL DEFAULT b'0',
  `permiso_padres` blob NOT NULL,
  `seguro_estudiantil` blob NOT NULL,
  `documento_adicional_1` blob NOT NULL,
  `documento_adicional_2` blob NOT NULL,
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

-- Volcando estructura para tabla practicampo.lugar_practica
CREATE TABLE IF NOT EXISTS `lugar_practica` (
  `id` int(11) NOT NULL,
  `lugar_practica` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.lugar_practica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `lugar_practica` DISABLE KEYS */;
REPLACE INTO `lugar_practica` (`id`, `lugar_practica`) VALUES
	(1, 'Bogotá D.C'),
	(2, 'Fuera de Bogota D.C');
/*!40000 ALTER TABLE `lugar_practica` ENABLE KEYS */;

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

-- Volcando estructura para tabla practicampo.programa_academico
CREATE TABLE IF NOT EXISTS `programa_academico` (
  `id` int(11) NOT NULL,
  `programa_academico` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.programa_academico: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `programa_academico` DISABLE KEYS */;
REPLACE INTO `programa_academico` (`id`, `programa_academico`) VALUES
	(1, 'Administración deportiva'),
	(10, 'Ingeniería forestal'),
	(31, 'Tecnología en levantamientos topográficos'),
	(32, 'Ingeniería topográfica'),
	(81, 'Tecnología en gestión ambiental'),
	(85, 'Tecnología en saneamiento ambiental'),
	(180, 'Ingeniería ambiental'),
	(181, 'Ingeniería sanitaria'),
	(185, 'Administración ambiental'),
	(999, 'N/A');
/*!40000 ALTER TABLE `programa_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.proyeccion_preliminar
CREATE TABLE IF NOT EXISTS `proyeccion_preliminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_transporte_rp_1` int(11) DEFAULT NULL,
  `id_tipo_transporte_rp_2` int(11) DEFAULT NULL,
  `id_tipo_transporte_rp_3` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_1` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_2` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_3` int(11) DEFAULT NULL,
  `id_programa_academico` int(11) DEFAULT NULL,
  `id_docente_responsable` bigint(20) DEFAULT NULL,
  `id_espacio_academico` int(11) DEFAULT NULL,
  `id_peridodo_academico` int(11) DEFAULT NULL,
  `id_semestre_asignatura` int(11) DEFAULT NULL,
  `id_tipo_zona_transitar` int(11) DEFAULT NULL,
  `ruta_principal` blob,
  `destino_rp` varchar(255) DEFAULT NULL,
  `ruta_alterna` blob,
  `destino_ra` varchar(255) DEFAULT NULL,
  `lugar_salida_rp` blob,
  `lugar_salida_ra` blob,
  `lugar_regreso_rp` blob,
  `lugar_regreso_ra` blob,
  `fecha_salida_aprox_rp` date DEFAULT NULL,
  `fecha_salida_aprox_ra` date NOT NULL,
  `fecha_regreso_aprox_rp` date DEFAULT NULL,
  `fecha_regreso_aprox_ra` date DEFAULT NULL,
  `num_estudiantes_aprox` int(11) DEFAULT NULL,
  `num_acompaniantes` int(11) DEFAULT NULL,
  `observ_coordinador` blob,
  `observ_decano` blob,
  `det_recorrido_interno_rp` blob,
  `det_recorrido_interno_ra` blob,
  `det_tipo_transporte_rp_1` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_1` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_2` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_3` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_rp_1` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_rp_2` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_rp_3` varchar(50) DEFAULT NULL,
  `vlr_otro_tipo_transporte_rp_1` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_rp_2` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_rp_3` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_1` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_2` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_3` bigint(20) DEFAULT NULL,
  `det_tipo_transporte_rp_2` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_rp_3` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_1` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_2` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_3` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_ra_1` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_ra_2` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_ra_3` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_rp_1` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_rp_2` varchar(50) DEFAULT NULL,
  `docen_respo_trasnporte_rp_3` varchar(50) DEFAULT NULL,
  `num_paradas_trayecto` int(11) DEFAULT NULL,
  `cantidad_grupos` int(11) DEFAULT NULL,
  `grupo_1` int(11) DEFAULT NULL,
  `grupo_2` int(11) DEFAULT NULL,
  `grupo_3` int(11) DEFAULT NULL,
  `grupo_4` int(11) DEFAULT NULL,
  `duracion_num_dias_ra` int(11) DEFAULT NULL,
  `duracion_num_dias_rp` int(11) DEFAULT NULL,
  `conf_curricul_plan_pract_rp` bit(1) DEFAULT NULL,
  `conf_curricul_plan_pract_ra` bit(1) DEFAULT NULL,
  `viaticos_estudiantes` int(11) DEFAULT NULL,
  `viaticos_docente` int(11) DEFAULT NULL,
  `costo_total_transporte` int(11) DEFAULT NULL,
  `cant_transporte_rp` int(11) DEFAULT NULL,
  `cant_transporte_ra` int(11) DEFAULT NULL,
  `capac_transporte_rp_1` int(11) DEFAULT NULL,
  `capac_transporte_rp_2` int(11) DEFAULT NULL,
  `capac_transporte_rp_3` int(11) DEFAULT NULL,
  `capac_transporte_ra_1` int(11) DEFAULT NULL,
  `capac_transporte_ra_2` int(11) DEFAULT NULL,
  `capac_transporte_ra_3` int(11) DEFAULT NULL,
  `exclusiv_tiempo_rp_1` tinyint(1) DEFAULT NULL,
  `exclusiv_tiempo_rp_2` tinyint(1) DEFAULT NULL,
  `exclusiv_tiempo_rp_3` tinyint(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_1` tinyint(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_2` tinyint(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_3` tinyint(4) DEFAULT NULL,
  `areas_acuaticas_rp` bit(1) DEFAULT NULL,
  `areas_acuaticas_ra` bit(1) DEFAULT NULL,
  `alturas_rp` bit(1) DEFAULT NULL,
  `alturas_ra` bit(1) DEFAULT NULL,
  `riesgo_biologico_rp` bit(1) DEFAULT NULL,
  `riesgo_biologico_ra` bit(1) DEFAULT NULL,
  `espacios_confinados_rp` bit(1) DEFAULT NULL,
  `espacios_confinados_ra` bit(1) DEFAULT NULL,
  `aprobacion_coordinador` int(11) DEFAULT NULL,
  `aprobacion_decano` int(11) DEFAULT NULL,
  `valor_estimado_transporte_rp` bigint(25) DEFAULT NULL,
  `valor_estimado_transporte_ra` bigint(25) DEFAULT NULL,
  `fecha_diligenciamiento` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyeccion_preliminar_users_idx` (`id_docente_responsable`),
  KEY `fk_proyeccion_preliminar_espacio_academico_idx` (`id_espacio_academico`),
  KEY `fk_proyeccion_preliminar_tipo_transporte_idx` (`id_tipo_transporte_rp_1`),
  KEY `fk_proyeccion_preliminar_periodo_academico_idx` (`id_peridodo_academico`),
  KEY `fk_proyeccion_preliminar_semestre_asignatura_idx` (`id_semestre_asignatura`),
  KEY `fk_proyeccion_preliminar_tipo_zona_transitar_idx` (`id_tipo_zona_transitar`),
  KEY `fk_proyeccion_preliminar_estado_coord_idx` (`aprobacion_coordinador`),
  KEY `fk_proyeccion_preliminar_estado_dec_idx` (`aprobacion_decano`),
  KEY `fk_proyeccion_preliminar_programa_academico_idx` (`id_programa_academico`),
  CONSTRAINT `fk_proyeccion_preliminar_espacio_academico` FOREIGN KEY (`id_espacio_academico`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_coord` FOREIGN KEY (`aprobacion_coordinador`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_dec` FOREIGN KEY (`aprobacion_decano`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_periodo_academico` FOREIGN KEY (`id_peridodo_academico`) REFERENCES `periodo_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_programa_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_semestre_asignatura` FOREIGN KEY (`id_semestre_asignatura`) REFERENCES `semestre_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_tipo_transporte` FOREIGN KEY (`id_tipo_transporte_rp_1`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_tipo_zona_transitar` FOREIGN KEY (`id_tipo_zona_transitar`) REFERENCES `tipo_zona_transitar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_users` FOREIGN KEY (`id_docente_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.proyeccion_preliminar: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion_preliminar` DISABLE KEYS */;
REPLACE INTO `proyeccion_preliminar` (`id`, `id_tipo_transporte_rp_1`, `id_tipo_transporte_rp_2`, `id_tipo_transporte_rp_3`, `id_tipo_transporte_ra_1`, `id_tipo_transporte_ra_2`, `id_tipo_transporte_ra_3`, `id_programa_academico`, `id_docente_responsable`, `id_espacio_academico`, `id_peridodo_academico`, `id_semestre_asignatura`, `id_tipo_zona_transitar`, `ruta_principal`, `destino_rp`, `ruta_alterna`, `destino_ra`, `lugar_salida_rp`, `lugar_salida_ra`, `lugar_regreso_rp`, `lugar_regreso_ra`, `fecha_salida_aprox_rp`, `fecha_salida_aprox_ra`, `fecha_regreso_aprox_rp`, `fecha_regreso_aprox_ra`, `num_estudiantes_aprox`, `num_acompaniantes`, `observ_coordinador`, `observ_decano`, `det_recorrido_interno_rp`, `det_recorrido_interno_ra`, `det_tipo_transporte_rp_1`, `otro_tipo_transporte_ra_1`, `otro_tipo_transporte_ra_2`, `otro_tipo_transporte_ra_3`, `otro_tipo_transporte_rp_1`, `otro_tipo_transporte_rp_2`, `otro_tipo_transporte_rp_3`, `vlr_otro_tipo_transporte_rp_1`, `vlr_otro_tipo_transporte_rp_2`, `vlr_otro_tipo_transporte_rp_3`, `vlr_otro_tipo_transporte_ra_1`, `vlr_otro_tipo_transporte_ra_2`, `vlr_otro_tipo_transporte_ra_3`, `det_tipo_transporte_rp_2`, `det_tipo_transporte_rp_3`, `det_tipo_transporte_ra_1`, `det_tipo_transporte_ra_2`, `det_tipo_transporte_ra_3`, `docen_respo_trasnporte_ra_1`, `docen_respo_trasnporte_ra_2`, `docen_respo_trasnporte_ra_3`, `docen_respo_trasnporte_rp_1`, `docen_respo_trasnporte_rp_2`, `docen_respo_trasnporte_rp_3`, `num_paradas_trayecto`, `cantidad_grupos`, `grupo_1`, `grupo_2`, `grupo_3`, `grupo_4`, `duracion_num_dias_ra`, `duracion_num_dias_rp`, `conf_curricul_plan_pract_rp`, `conf_curricul_plan_pract_ra`, `viaticos_estudiantes`, `viaticos_docente`, `costo_total_transporte`, `cant_transporte_rp`, `cant_transporte_ra`, `capac_transporte_rp_1`, `capac_transporte_rp_2`, `capac_transporte_rp_3`, `capac_transporte_ra_1`, `capac_transporte_ra_2`, `capac_transporte_ra_3`, `exclusiv_tiempo_rp_1`, `exclusiv_tiempo_rp_2`, `exclusiv_tiempo_rp_3`, `exclusiv_tiempo_ra_1`, `exclusiv_tiempo_ra_2`, `exclusiv_tiempo_ra_3`, `areas_acuaticas_rp`, `areas_acuaticas_ra`, `alturas_rp`, `alturas_ra`, `riesgo_biologico_rp`, `riesgo_biologico_ra`, `espacios_confinados_rp`, `espacios_confinados_ra`, `aprobacion_coordinador`, `aprobacion_decano`, `valor_estimado_transporte_rp`, `valor_estimado_transporte_ra`, `fecha_diligenciamiento`, `created_at`, `updated_at`) VALUES
	(4, 4, NULL, NULL, 1, NULL, NULL, 999, 1038410523, 10, 1, 10, NULL, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F27272F4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F48616369656E64612B4D6973696F6E65732C2B4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B4372612E2B372B2532332532333430622D35332C2B426F676F742543332541312F40342E353435303332322C2D37342E343636383739342C31332E32357A2F646174613D21346D323621346D323521316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663664313961663635633361663A30783432623239643561303437653039303821326D322131642D37342E343435323336213264342E35383431393521316D3521316D312131733078386533663133616566383466623236333A30786531353234623930303061396366656521326D322131642D37342E34343939363939213264342E353439393721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'Hacienda Misiones', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F27272F4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F48616369656E64612B4D6973696F6E65732C2B4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B4372612E2B372B2532332532333430622D35332C2B426F676F742543332541312F40342E353435303332322C2D37342E343636383739342C31332E32357A2F646174613D21346D323621346D323521316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663664313961663635633361663A30783432623239643561303437653039303821326D322131642D37342E343435323336213264342E35383431393521316D3521316D312131733078386533663133616566383466623236333A30786531353234623930303061396366656521326D322131642D37342E34343939363939213264342E353439393721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'Impro arroz', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', '2020-09-08', 40, 2, _binary 0x507275656261, NULL, _binary 0x2244494120554E4F0D0A53414C49444120444520424F474F544120363A303020612E206D2E0D0A434F52524547494D49454E544F204C4120564943544F5249419648414349454E4441204D4953494F4E455320393A303020612E6D2E0D0A4445534159554E4F20393A333020612E206D2E0D0A4D45444943494F4E2044452043415544414C2031313A303020612E206D2E0D0A424F4341544F4D412031323A3330206D2E0D0A414C4D5545525A4F20313A333020702E206D2E0D0A5245434F525249444F20484944524F454CC943545249434120323A303020702E206D2E0D0A41524D41444F2044452043414D50494E4720343A303020702E206D2E0D0A43454E4120373A303020702E206D2E0D0A50524553454E54414349D34E204445204156414E4345532054524142414A4F20383A303020702E6D2E0D0A44494120444F530D0A4445534159554E4F20373A303020612E206D2E0D0A5245434F525249444F204D495241444F522053414E5441204C5543494120393A303020612E206D2E0D0A414C4D5545525A4F2031323A333020702E206D2E0D0A424F53515545204E41545552414C20524F424C4520313A333020702E206D2E0D0A5245534552564F52494F2C2055534F2044454C205355454C4F20323A303020702E206D2E0D0A5245475245534F2041205A4F4E412044452043414D50494E4720333A303020702E206D2E0D0A50554E544F2044452043414D50494E4720353A303020702E206D2E0D0A4D415041532044454C205445525249544F52494F2031303A303020612E206D2E0D0A5245434F525249444F2048414349454E444120592042454E45464943494F2031313A303020612E206D2E204C4F4D42524943554C5449564F2031313A333020612E206D2E0D0A504554524F474C49464F532031323A303020702E206D2E0D0A414C4D5545525A4F20313A303020702E206D2E0D0A43554C5449564F5320323A303020702E206D2E0D0A5245534556455241202D204D494E4120333A303020702E206D2E0D0A5245534552564F52494F20333A333020702E206D2E0D0A5054415220343A303020702E206D2E0D0A504F52544F4E20343A333020702E206D2E0D0A53414C494441204120424F474F544120343A333020702E206D2E0D0A4C4C4547414441204120424F474F544120373A303020702E206D2E22, _binary 0x426F676F74612028456469666963696F20536162696F2043616C64617329202D2056696C6C61766963656E63696F202D20506F746F73ED2028496D70726F204172726F7A29202D2041636163696173202D202056696C6C61766963656E63696F202D20426F676F74612028456469666963696F20536162696F2043616C64617329, 'carretera destapada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carretera destapada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 501, 502, NULL, NULL, 1, 1, b'1', b'1', NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, 40, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, '2020-03-04', '2020-03-04 22:12:46', '2020-04-23 16:37:08'),
	(6, 1, NULL, NULL, 1, NULL, NULL, 999, 1038410523, 5, 1, 10, NULL, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F27272F4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F48616369656E64612B4D6973696F6E65732C2B4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B4372612E2B372B2532332532333430622D35332C2B426F676F742543332541312F40342E353435303332322C2D37342E343636383739342C31332E32357A2F646174613D21346D323621346D323521316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663664313961663635633361663A30783432623239643561303437653039303821326D322131642D37342E343435323336213264342E35383431393521316D3521316D312131733078386533663133616566383466623236333A30786531353234623930303061396366656521326D322131642D37342E34343939363939213264342E353439393721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'Hacienda Misiones', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F27272F4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F48616369656E64612B4D6973696F6E65732C2B4D6573697461732B64656C2B436F6C6567696F2C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B4372612E2B372B2532332532333430622D35332C2B426F676F742543332541312F40342E353435303332322C2D37342E343636383739342C31332E32357A2F646174613D21346D323621346D323521316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663664313961663635633361663A30783432623239643561303437653039303821326D322131642D37342E343435323336213264342E35383431393521316D3521316D312131733078386533663133616566383466623236333A30786531353234623930303061396366656521326D322131642D37342E34343939363939213264342E353439393721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'Impro Arroz', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', '2020-09-08', 60, 1, _binary 0x70727565626120323320616272696C, NULL, _binary 0x2244494120554E4F0D0A53414C49444120444520424F474F544120363A303020612E206D2E0D0A434F52524547494D49454E544F204C4120564943544F5249419648414349454E4441204D4953494F4E455320393A303020612E6D2E0D0A4445534159554E4F20393A333020612E206D2E0D0A4D45444943494F4E2044452043415544414C2031313A303020612E206D2E0D0A424F4341544F4D412031323A3330206D2E0D0A414C4D5545525A4F20313A333020702E206D2E0D0A5245434F525249444F20484944524F454CC943545249434120323A303020702E206D2E0D0A41524D41444F2044452043414D50494E4720343A303020702E206D2E0D0A43454E4120373A303020702E206D2E0D0A50524553454E54414349D34E204445204156414E4345532054524142414A4F20383A303020702E6D2E0D0A44494120444F530D0A4445534159554E4F20373A303020612E206D2E0D0A5245434F525249444F204D495241444F522053414E5441204C5543494120393A303020612E206D2E0D0A414C4D5545525A4F2031323A333020702E206D2E0D0A424F53515545204E41545552414C20524F424C4520313A333020702E206D2E0D0A5245534552564F52494F2C2055534F2044454C205355454C4F20323A303020702E206D2E0D0A5245475245534F2041205A4F4E412044452043414D50494E4720333A303020702E206D2E0D0A50554E544F2044452043414D50494E4720353A303020702E206D2E0D0A4D415041532044454C205445525249544F52494F2031303A303020612E206D2E0D0A5245434F525249444F2048414349454E444120592042454E45464943494F2031313A303020612E206D2E204C4F4D42524943554C5449564F2031313A333020612E206D2E0D0A504554524F474C49464F532031323A303020702E206D2E0D0A414C4D5545525A4F20313A303020702E206D2E0D0A43554C5449564F5320323A303020702E206D2E0D0A5245534556455241202D204D494E4120333A303020702E206D2E0D0A5245534552564F52494F20333A333020702E206D2E0D0A5054415220343A303020702E206D2E0D0A504F52544F4E20343A333020702E206D2E0D0A53414C494441204120424F474F544120343A333020702E206D2E0D0A4C4C4547414441204120424F474F544120373A303020702E206D2E22, _binary 0x426F676F74612028456469666963696F20536162696F2043616C64617329202D2056696C6C61766963656E63696F202D20506F746F73ED2028496D70726F204172726F7A29202D2041636163696173202D202056696C6C61766963656E63696F202D20426F676F74612028456469666963696F20536162696F2043616C64617329, 'carretera destapada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carretera destapada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 504, NULL, NULL, NULL, 1, 1, b'1', b'1', NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, 20, NULL, NULL, 2, 2, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, '2020-03-04', '2020-03-05 02:21:41', '2020-04-23 16:36:49'),
	(14, 1, NULL, NULL, 1, NULL, NULL, 999, 1038410523, 9, 3, 10, NULL, _binary 0x424F474F54C12D2053414E544120524F5341204445204F534F532D20594152554D414C2D204D4F4E54454C4942414E4F2D20434F52524547494D49454E544F20424F434153204445205552452D20434F52524547494D49454E544F2056494C4C41204D4152CD412D204D4F4E544552CD412D2054494552524120414C54412D20454D42414C534520444520555252412D2053414E204245524E4152444F2044454C205649454E544F2D204C4F524943412D20494E4D4544494143494F4E4553204445204C4F524943412D20434F52524547494D49454E544F2044452053414E5441204352555A2D2053414E20414E5445524F2D20424148CD41204445204349535054412D20424F53434F4E49412D20424F474F54C1, 'CORREGIMIENTO DE SANTA CRUZ', _binary 0x424F474F54C12D2053414E544120524F5341204445204F534F532D20594152554D414C2D204D4F4E54454C4942414E4F2D20434F52524547494D49454E544F20424F434153204445205552452D20434F52524547494D49454E544F2056494C4C41204D4152CD412D204D4F4E544552CD412D2054494552524120414C54412D20454D42414C534520444520555252412D2053414E204245524E4152444F2044454C205649454E544F2D204C4F524943412D20494E4D4544494143494F4E4553204445204C4F524943412D20434F52524547494D49454E544F2044452053414E5441204352555A2D2053414E20414E5445524F2D20424148CD41204445204349535054412D20424F53434F4E49412D20424F474F54C1, 'CORREGIMIENTO DE SANTA CRUZ', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-09', '2020-09-09', '2020-09-17', '2020-09-17', 65, NULL, _binary 0x707275656261, NULL, _binary 0x392064652073656D7469656D6272653A20446573706C617A616D69656E746F20426F676F74E120612053616E746120526F7361206465206F736F733B203130206465207365707469656D6272653A205669736973746120706C616E617463696F6E20666F72657374616C207920646573706C617A616D69656E746F2061204D6F74656C6962616E6F3B203131206465207365707469656D6272652076697369737461206120436572726F204D61746F736F2D20436F72726567696D69656E746F2064652064652053616E206A6F73652064652055726520792056696C6C61204D617269613B2031322044657A706C617A616D69656E746F20612054696572726120416C7461207920766973697461206120656D62616C736520646520557272613B20313320566973697461207465636E696361206120706C616E617463696F6E65732064652043616E6775726F793B203134207365707469656D6272653A20446573706C617A616D69656E746F20612053616E204265726E6172646F2064656C205669656E746F2079207265636F727269646F207465636E69636F20706F72206D616E676C617265733B203135206465205365707469656D6272653A446573706C617A616D69656E746F2061204C6F726963612079207669736974612074E9636E69636120612070726F796563746F206167726F666F72657374616C65733B20313620446573706C617A616D69656E746F2061204261686961206465204369737061746120282053616E20416E7465726F29202079207265636F727269646F206D616E676C6172657320792072696F2053696EFA3B20313720446573706C7A616D69656E746F202053616E20416E7465726F206120426F676F74E1, _binary 0x392064652073656D7469656D6272653A20446573706C617A616D69656E746F20426F676F74E120612053616E746120526F7361206465206F736F733B203130206465207365707469656D6272653A205669736973746120706C616E617463696F6E20666F72657374616C207920646573706C617A616D69656E746F2061204D6F74656C6962616E6F3B203131206465207365707469656D6272652076697369737461206120436572726F204D61746F736F2D20436F72726567696D69656E746F2064652064652053616E206A6F73652064652055726520792056696C6C61204D617269613B2031322044657A706C617A616D69656E746F20612054696572726120416C7461207920766973697461206120656D62616C736520646520557272613B20313320566973697461207465636E696361206120706C616E617463696F6E65732064652043616E6775726F793B203134207365707469656D6272653A20446573706C617A616D69656E746F20612053616E204265726E6172646F2064656C205669656E746F2079207265636F727269646F207465636E69636F20706F72206D616E676C617265733B203135206465205365707469656D6272653A446573706C617A616D69656E746F2061204C6F726963612079207669736974612074E9636E69636120612070726F796563746F206167726F666F72657374616C65733B20313620446573706C617A616D69656E746F2061204261686961206465204369737061746120282053616E20416E7465726F29202079207265636F727269646F206D616E676C6172657320792072696F2053696EFA3B20313720446573706C7A616D69656E746F202053616E20416E7465726F206120426F676F74E1, 'df', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 502, NULL, NULL, NULL, 8, 8, b'1', b'1', NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, 40, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 7000000, 7500000, '2020-04-23', '2020-04-23 08:09:56', '2020-04-23 16:37:45'),
	(15, 2, NULL, NULL, 2, NULL, NULL, 999, 79418769, 51, 1, 1, NULL, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F556E6976657273696461642B44697374726974616C2C2B436172726572612B372C2B426F676F742543332541312F53696C76616E69612C2B43756E64696E616D617263612F546962616375792C2B43756E64696E616D617263612F436572726F2B5175696E696E692C2B546962616375792C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B436172726572612B372C2B426F676F742543332541312F40342E343234393232312C2D37342E3339383739322C31312E37357A2F646174613D21346D333221346D333121316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663066663237353736376230313A30783233306266663661356436656262313821326D322131642D37342E33393934343332213264342E3338363732383721316D3521316D312131733078386533663162613831393232376631643A30783732353431643465626233653066393621326D322131642D37342E3435323534213264342E33343738333721316D3521316D312131733078386533663162303638326337333735353A30783265623838373163343238323836363621326D322131642D37342E3435323534213264342E33343738333721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'CERRO QUININÍ 2', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F6469722F556E6976657273696461642B44697374726974616C2C2B436172726572612B372C2B426F676F742543332541312F53696C76616E69612C2B43756E64696E616D617263612F546962616375792C2B43756E64696E616D617263612F436572726F2B5175696E696E692C2B546962616375792C2B43756E64696E616D617263612F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732C2B436172726572612B372C2B426F676F742543332541312F40342E343234393232312C2D37342E3339383739322C31312E37357A2F646174613D21346D333221346D333121316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521316D3521316D312131733078386533663066663237353736376230313A30783233306266663661356436656262313821326D322131642D37342E33393934343332213264342E3338363732383721316D3521316D312131733078386533663162613831393232376631643A30783732353431643465626233653066393621326D322131642D37342E3435323534213264342E33343738333721316D3521316D312131733078386533663162303638326337333735353A30783265623838373163343238323836363621326D322131642D37342E3435323534213264342E33343738333721316D3521316D312131733078386533663961323836643539386264353A30786464663134393034613837646662343721326D322131642D37342E30363534353237213264342E3632383130343521336530, 'CERRO QUININÍ 2', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-12', '2020-09-13', '2020-09-12', '2020-09-12', 35, NULL, _binary 0x7072756562612032, _binary 0x64677364666773666867, _binary 0x424F474F54C12D2053494C56414E49412D20544942414355592D20434552524F205155494E494ECD2D20424F474F54C1, _binary 0x424F474F54C12D2053494C56414E49412D20544942414355592D20434552524F205155494E494ECD2D20424F474F54C1, 'prueba 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prueba2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 302, 402, NULL, NULL, 1, 1, b'1', b'1', NULL, NULL, NULL, 1, 1, 36, NULL, NULL, 36, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 5500000, 4500000, '2020-04-23', '2020-04-23 19:12:29', '2020-04-29 20:19:05'),
	(20, 2, 4, NULL, 2, 2, 1, 10, 79418769, 51, 3, 10, NULL, _binary 0x7361646661736466, 'afsdf', _binary 0x73616572, 'serf', _binary 0x61647366, _binary 0x73616566, _binary 0x61736466, _binary 0x73616572, '2020-05-13', '2020-04-28', '2020-05-21', '2020-05-07', 32, NULL, NULL, NULL, _binary 0x66, _binary 0x73616572, 'sadf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdf', NULL, 'saedf', 'eswr', 'wer', NULL, 'mmmmm', 'vvvvvv', NULL, 'xxxxx', NULL, NULL, 1, 34, NULL, NULL, NULL, 10, 9, b'1', b'1', NULL, NULL, NULL, NULL, NULL, 34, 23, NULL, 23, 243, 322, 1, 1, NULL, 1, 1, 1, b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', 5, 5, NULL, NULL, '2020-05-17', '2020-05-18 00:53:32', '2020-05-18 00:53:32');
/*!40000 ALTER TABLE `proyeccion_preliminar` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.roles: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Decano'),
	(3, 'Asistente Decanatura'),
	(4, 'Coordinador Proyecto'),
	(5, 'Docente'),
	(6, 'Vicerrectoria Administrativa'),
	(7, 'Transportador');
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
  `si_capital` bit(1) DEFAULT b'0',
  `tiene_resolucion` bit(1) DEFAULT b'0',
  `num_cdp` bigint(20) DEFAULT '0',
  `fecha_resolucion` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_regreso` date DEFAULT NULL,
  `num_estudiantes` int(11) DEFAULT '0',
  `num_radicado_financiera` int(11) DEFAULT '0',
  `num_acompaniantes` int(11) DEFAULT '0',
  `lugar_salida` varchar(50) DEFAULT NULL,
  `lugar_regreso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitud_practica_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  KEY `fk_solicitud_practica_estado_idx` (`id_estado_solicitud_practica`),
  CONSTRAINT `fk_solicitud_practica_estado` FOREIGN KEY (`id_estado_solicitud_practica`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_practica_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.solicitud_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.solicitud_transporte
CREATE TABLE IF NOT EXISTS `solicitud_transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitud_practica` int(11) NOT NULL,
  `nombre_conductor` varchar(255) DEFAULT NULL,
  `celular_conductor` bigint(20) DEFAULT NULL,
  `email_conductor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitud_transporte_solicitud_practica_idx` (`id_solicitud_practica`),
  CONSTRAINT `fk_solicitud_transporte_solicitud_practica` FOREIGN KEY (`id_solicitud_practica`) REFERENCES `solicitud_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.solicitud_transporte: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_transporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_transporte` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_transporte: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_transporte` DISABLE KEYS */;
REPLACE INTO `tipo_transporte` (`id`, `tipo_transporte`) VALUES
	(1, 'Bus'),
	(2, 'Buseta'),
	(3, 'Camioneta'),
	(4, 'Otro');
/*!40000 ALTER TABLE `tipo_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo.tipo_vinculacion
CREATE TABLE IF NOT EXISTS `tipo_vinculacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vinculacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.tipo_vinculacion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_vinculacion` DISABLE KEYS */;
REPLACE INTO `tipo_vinculacion` (`id`, `tipo_vinculacion`) VALUES
	(1, 'Docente catedra (contrato)'),
	(2, 'Docente catedra (Honorario)'),
	(3, 'Docente medio tiempo ocasional'),
	(4, 'Docenete tiempo completo ocasional'),
	(5, 'Docente planta compartido'),
	(6, 'Docente planta tiempo completo'),
	(7, 'Transportador');
/*!40000 ALTER TABLE `tipo_vinculacion` ENABLE KEYS */;

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
  `id_role` int(11) NOT NULL,
  `id_tipo_identificacion` int(11) NOT NULL,
  `id_tipo_vinculacion` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_espacio_academico_1` int(11) NOT NULL,
  `id_espacio_academico_2` int(11) DEFAULT NULL,
  `id_espacio_academico_3` int(11) DEFAULT NULL,
  `id_espacio_academico_4` int(11) DEFAULT NULL,
  `id_espacio_academico_5` int(11) DEFAULT NULL,
  `id_espacio_academico_6` int(11) DEFAULT NULL,
  `id_programa_academico_coord` int(11) DEFAULT NULL,
  `usuario` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  KEY `fk_users_tipo_identificacion_idx` (`id_tipo_identificacion`),
  KEY `fk_users_espacio_academico_1_idx` (`id_espacio_academico_1`),
  KEY `fk_users_espacio_academico_2_idx` (`id_espacio_academico_2`),
  KEY `fk_users_espacio_academico_3_idx` (`id_espacio_academico_3`),
  KEY `fk_users_espacio_academico_4_idx` (`id_espacio_academico_4`),
  KEY `fk_users_espacio_academico_5_idx` (`id_espacio_academico_5`),
  KEY `fk_users_espacio_academico_6_idx` (`id_espacio_academico_6`),
  KEY `fk_users_estado` (`id_estado`),
  KEY `fk_users_tipo_vinculacion_idx` (`id_tipo_vinculacion`),
  KEY `fk_users_programa_academico_idx` (`id_programa_academico_coord`),
  CONSTRAINT `fk_users_espacio_academico_2` FOREIGN KEY (`id_espacio_academico_2`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_espacio_academico_3` FOREIGN KEY (`id_espacio_academico_3`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_espacio_academico_4` FOREIGN KEY (`id_espacio_academico_4`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_espacio_academico_5` FOREIGN KEY (`id_espacio_academico_5`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_espacio_academico_6` FOREIGN KEY (`id_espacio_academico_6`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_users_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_programa_academico` FOREIGN KEY (`id_programa_academico_coord`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_vinculacion` FOREIGN KEY (`id_tipo_vinculacion`) REFERENCES `tipo_vinculacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_tipo_vinculacion`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `id_programa_academico_coord`, `usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(30314801, 5, 1, 1, 1, 5, 9, 47, NULL, NULL, NULL, 999, 'emontesr', 'Emilia', NULL, 'Montes', 'Rojas', 3154269895, 7289645, 'lauritagiraldo.s@gmail.com.co', NULL, '$2y$10$JyWtQxOKKx9W2eWBn2yCduyRCcSU4W5YF6gErdNfeJ6B.Ti.Gl1S6', NULL, '2020-02-27 02:52:56', '2020-02-27 02:52:56'),
	(30569841, 4, 1, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, 81, 'jposadam', 'Jairo', NULL, 'Posada', 'Martinez', 3152695487, 3216956, 'jposadam@udistrital.edu.co', NULL, '$2y$10$ZNaeSKLtN/17lX6SVEmP2.TetVJQuvjBQTR93LLyat6B1VpuXOuI.', NULL, '2020-02-27 02:53:02', '2020-02-27 02:53:02'),
	(52527490, 4, 1, 1, 1, 58, 66, NULL, NULL, NULL, NULL, 10, 'npbonzap', 'Niria', 'Pastora', 'Bonza', 'Perez', 5711748, 5711748, 'npbonzap@udistrital.edu.co', NULL, '$2y$10$LXwvSEa5esmKWD52sV.dRukGlS6ZTiFEq0Oe/mqk122xJfjWsu3IO', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(63589653, 5, 1, 1, 1, 32, NULL, NULL, NULL, NULL, NULL, 999, 'lsanin63', 'Lorena', NULL, 'Sanín', NULL, 3005236987, NULL, 'lsanin63@udistrital.edu.co', NULL, '$2y$10$TEuN2hTLIEpiJapMcr6weOnrGjKkDtS1CU6Vt0fA5W2EQ.OzyGEr2', NULL, '2020-05-04 02:31:21', '2020-05-04 02:31:21'),
	(79418769, 5, 1, 1, 1, 51, NULL, NULL, NULL, NULL, NULL, 999, 'cagarciav', 'Cesar', 'Augusto', 'Garcia', 'Valbuena', 5472365, 5472365, 'cagarciav@udistrital.edu.co', NULL, '$2y$10$rT54iBkqRKdycG78y8ypvO6u3L6uNST9kPkTZgqwn8pGA5dbdO93.', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(310698563, 2, 1, 3, 1, 10, NULL, NULL, NULL, NULL, NULL, 999, 'fussar', 'Freddy', NULL, 'Ussa', 'Rodriguez', 3156984569, 4523698, 'fussar@udistrital.edu.co', NULL, '$2y$10$r.oFd571jYk5PM4ycnfnr.OP1mV5HocwmN9z9Flt69qjeWnO6wRbi', NULL, '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 3, 1, 6, 1, 4, 999, NULL, NULL, NULL, NULL, 999, 'arojasc', 'Alejandro', NULL, 'Rojas', 'Castro', 32569874536, 5632121, 'arojasc@udistrital.edu.co', NULL, '$2y$10$zX5X9sIdU6OgWDABgq7G2uQKji/mGgZSIi0TfZpMzUn4zbKv2S1be', NULL, '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 1, 1, 1, 1, 136, 132, 137, 131, NULL, NULL, 999, 'lvgiraldos', 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 3107964434, 4125679, 'lvgiraldos@udistrital.edu.co', NULL, '$2y$10$V/4DkEVqMJNNXiHyUY42sOqTSRHtfhJAoOViAeoVxzbFwvj72ELg.', NULL, '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
