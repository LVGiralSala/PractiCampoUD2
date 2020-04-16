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
  PRIMARY KEY (`id`),
  KEY `fk_programa_academico_espacio_academico` (`id_programa_academico`),
  CONSTRAINT `fk_programa_academico_espacio_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.espacio_academico: ~135 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `id_programa_academico`, `codigo_espacio_academico`, `espacio_academico`, `plan_estudios_1`, `plan_estudios_2`, `tipo_espacio`) VALUES
	(1, 81, 2346, 'Gestión comercial', 344, 244, 'Teórico-Práctica'),
	(2, 81, 2328, 'Cuencas', 344, NULL, 'Teórico-Práctica'),
	(3, 81, 2324, 'Residuos líquidos ', 344, 244, 'Teórico-Práctica'),
	(4, 81, 2334, 'Operación de plantas y estaciones de bombeo', 344, 244, 'Teórico-Práctica'),
	(5, 81, 2323, 'Gestión ambiental II', 344, NULL, 'Teórico-Práctica'),
	(6, 81, 2312, 'Ecología', 344, 244, 'Teórico-Práctica'),
	(7, 81, 2319, 'Calidad del agua ', 344, 244, 'Teórico-Práctica'),
	(8, 81, 2331, 'Residuos sólidos', 344, 244, 'Teórico-Práctica'),
	(9, 81, 2327, 'Gestión ambiental I', 344, NULL, 'Teórico-Práctica'),
	(10, 81, 2325, 'Administración ambiental y desarrollo local', 344, 244, 'Teórico-Práctica'),
	(11, 81, 2341, 'Servicio público de energía', 344, 244, 'Teórico-Práctica'),
	(12, 181, 2112, 'Fundamentos de química', 349, 249, 'Teórico-Práctica'),
	(13, 181, 11809, 'Química sanitaria', 349, 249, 'Teórico-Práctica'),
	(14, 181, 11811, 'Procesos unitarios I', 349, 249, 'Teórico-Práctica'),
	(15, 181, 11802, 'Ecología humana', 349, 249, 'Teórico-Práctica'),
	(16, 181, 2509, 'Sociedad y ambiente', 349, 249, 'Teórico-Práctica'),
	(17, 181, 11817, 'Plantas de tratamiento para agua potable', 349, 249, 'Teórico-Práctica'),
	(18, 181, 11820, 'Plantas de tratamiento para agua residual', 349, 249, 'Teórico-Práctica'),
	(19, 181, 2531, 'Emisiones atmosféricas', 349, 249, 'Teórico-Práctica'),
	(20, 181, 11812, 'Calidad del aire', 349, 249, 'Teórico-Práctica'),
	(21, 181, 11814, 'Tratamiento y disposición de residuos sólidos', 349, 249, 'Teórico-Práctica'),
	(22, 181, 11821, 'Salida integrada', 349, 249, 'Teórico-Práctica'),
	(23, 181, 11804, 'Zoonosis y epidemiología', 349, 249, 'Teórico-Práctica'),
	(24, 181, 11836, 'Elementos de planificación territorial', 349, 249, 'Teórico-Práctica'),
	(25, 181, 2539, 'Saneamiento urbano y rural', 349, 249, 'Teórico-Práctica'),
	(26, 181, 11816, 'Política sanitaria', 349, 249, 'Teórico-Práctica'),
	(27, 181, 11810, 'Acueductos', 349, 249, 'Teórico-Práctica'),
	(28, 181, 2027, 'Fundamentos de ecología', 349, 249, 'Teórico-Práctica'),
	(29, 10, 2137, 'Práctica integrada I', 342, 242, 'Teórico-Práctica'),
	(30, 10, 2166, 'Evaluación ambiental', 342, 242, 'Teórico-Práctica'),
	(31, 10, 2162, 'Silvicultura comunitaria', 342, 242, 'Teórico-Práctica'),
	(32, 10, 2119, 'Geología y geomorfología', 342, 242, 'Teórico-Práctica'),
	(33, 10, 2160, 'Ordenamiento territorial', 342, 242, 'Teórico-Práctica'),
	(34, 10, 2113, 'Introducción a la ingeniería forestal', 342, 242, 'Teórico-Práctica'),
	(35, 10, 2126, 'Percepción remota e interpretación de imágenes', 342, 242, 'Teórico-Práctica'),
	(36, 10, 2175, 'Áreas protegidas', 342, 242, 'Teórico-Práctica'),
	(37, 10, 2109, 'Micorrizas', 342, 242, 'Teórico-Práctica'),
	(38, 10, 2127, 'Suelos I', 342, 242, 'Teórico-Práctica'),
	(39, 10, 2132, 'Dendrología II', 342, 242, 'Teórico-Práctica'),
	(40, 10, 2163, 'Silvicultura de bosques naturales', 342, 242, 'Teórico-Práctica'),
	(41, 10, 2117, 'Fertilización y fertilizantes', 342, 242, 'Teórico-Práctica'),
	(42, 10, 2128, 'Química de productos forestales', 342, 242, 'Teórico-Práctica'),
	(43, 10, 2148, 'Aprovechamiento forestal', 342, 242, 'Teórico-Práctica'),
	(44, 10, 2116, 'Sistemas agroforestales', 342, 242, 'Teórico-Práctica'),
	(45, 10, 2161, 'Estructuras de la madera', 342, 242, 'Teórico-Práctica'),
	(46, 10, 2124, 'Dendrología I', 342, 242, 'Teórico-Práctica'),
	(47, 10, 2179, 'Práctica integrada III', 342, 242, 'Teórico-Práctica'),
	(48, 10, 2152, 'Modelamiento de fenómenos biológicos', 342, 242, 'Teórico-Práctica'),
	(49, 10, 2170, 'Biología de la conservación', 342, 242, 'Teórico-Práctica'),
	(50, 10, 2177, 'Gestión del riesgo', 342, 242, 'Teórico-Práctica'),
	(51, 10, 2111, 'Biología general', 342, 242, 'Teórico-Práctica'),
	(52, 10, 2154, 'Propiedades de la madera', 342, 242, 'Teórico-Práctica'),
	(53, 10, 2115, 'Botánica taxonómica', 342, 242, 'Teórico-Práctica'),
	(54, 10, 2156, 'Extensión forestal', 342, 242, 'Teórico-Práctica'),
	(55, 10, 2134, 'Fisiología forestal', 342, 242, 'Teórico-Práctica'),
	(56, 10, 2147, 'Conservación de suelos', 342, 242, 'Teórico-Práctica'),
	(57, 10, 2155, 'Fitomejoramiento', 342, 242, 'Teórico-Práctica'),
	(58, 10, 2173, 'Ordenación de bosques', 342, 242, 'Teórico-Práctica'),
	(59, 10, 2130, 'Ecología forestal avanzada', 342, 242, 'Teórico-Práctica'),
	(60, 10, 2146, 'Sanidad forestal', 342, 242, 'Teórico-Práctica'),
	(61, 10, 2139, 'Hidrología', 342, 242, 'Teórico-Práctica'),
	(62, 10, 2165, 'Ingeniería del riego', 342, 242, 'Teórico-Práctica'),
	(63, 10, 2133, 'Suelos II', 342, 242, 'Teórico-Práctica'),
	(64, 10, 2167, 'Industrias forestales I', 342, 242, 'Teórico-Práctica'),
	(65, 10, 2138, 'Mediciones forestales', 342, 242, 'Teórico-Práctica'),
	(66, 10, 2149, 'Silvicultura de plantaciones', 342, 242, 'Teórico-Práctica'),
	(67, 10, 2174, 'Industrias forestales II', 342, 242, 'Teórico-Práctica'),
	(69, 10, 2159, 'Práctica integrada II', 342, 242, 'Teórico-Práctica'),
	(70, 10, 2153, 'Cuencas hidrográficas', 342, 242, 'Teórico-Práctica'),
	(71, 10, 2158, 'Desarrollo y medio ambiente', 342, 242, 'Teórico-Práctica'),
	(74, 32, 2043, 'Topografía automatizada', 341, 241, 'Teórico-Práctica'),
	(75, 32, 2042, 'Tránsito y transportes ', 341, 241, 'Teórico-Práctica'),
	(76, 32, 2005, 'Planimetría', 341, 241, 'Teórico-Práctica'),
	(77, 32, 2031, 'Mecánica de suelos', 341, 241, 'Teórico-Práctica'),
	(78, 32, 2044, 'Pavimentos', 341, 241, 'Teórico-Práctica'),
	(79, 32, 2025, 'Geología y geomorfología', 341, 241, 'Teórico-Práctica'),
	(80, 32, 2045, 'Análisis y gestión del riesgo', 341, 241, 'Teórico-Práctica'),
	(81, 32, 2041, 'Levantamientos especiales', 341, 241, 'Teórico-Práctica'),
	(82, 31, 2238, 'Cartografía digital ', 243, NULL, 'Teórico-Práctica'),
	(83, 31, 19604, 'Levantamientos altimétricos', NULL, NULL, 'Teórico-Práctica'),
	(84, 31, 19606, 'Topografía de vías', NULL, NULL, 'Teórico-Práctica'),
	(85, 31, 2228, 'Localización de vías', 243, NULL, 'Teórico-Práctica'),
	(86, 31, 2249, 'Arqueoastronomía', 243, NULL, 'Teórico-Práctica'),
	(87, 31, 2232, 'Fotogrametría y fotointerpretación', 243, NULL, 'Teórico-Práctica'),
	(88, 31, 2245, 'Geodesia posicional', 243, NULL, 'Teórico-Práctica'),
	(89, 31, 2251, 'Uso del vehículo aéreo no tripulado-vant en la ingeniería', 243, NULL, 'Teórico-Práctica'),
	(90, 31, 2221, 'Diseño geométrico de vías', 243, NULL, 'Teórico-Práctica'),
	(91, 31, 19601, 'Levantamientos planimétricos', NULL, NULL, 'Teórico-Práctica'),
	(92, 180, 2703, 'Introducción a la ingeniería ambiental', 347, 247, 'Teórico-Práctica'),
	(93, 180, 2716, 'Geología y geomorfología', 347, 247, 'Teórico-Práctica'),
	(94, 180, 2720, 'Suelos', 347, 247, 'Teórico-Práctica'),
	(95, 180, 2724, 'Química ambiental aplicada', 347, 247, 'Teórico-Práctica'),
	(96, 180, 2727, 'Ecología analítica', 347, 247, 'Teórico-Práctica'),
	(97, 180, 2728, 'Contaminación ambiental I', 347, 247, 'Teórico-Práctica'),
	(98, 180, 2729, 'Hidráulica', 347, 247, 'Teórico-Práctica'),
	(99, 180, 2733, 'Ordenamiento territorial rural', 347, 247, 'Teórico-Práctica'),
	(100, 180, 2734, 'Contaminación ambiental II', 347, 247, 'Teórico-Práctica'),
	(101, 180, 2735, 'Tecnologías apropiadas I', 347, 247, 'Teórico-Práctica'),
	(102, 180, 2736, 'Hidrogeología', 347, 247, 'Teórico-Práctica'),
	(103, 180, 2739, 'Tecnologías apropiadas II', 347, 247, 'Teórico-Práctica'),
	(104, 180, 2746, 'Evaluación ambiental II', 347, 247, 'Teórico-Práctica'),
	(105, 180, 2742, 'Evaluación ambiental I', 347, 247, 'Teórico-Práctica'),
	(106, 180, 2743, 'Manejo técnico ambiental', 347, 247, 'Teórico-Práctica'),
	(107, 180, 2730, 'Fisicoquímica de fluidos', 347, 247, 'Teórico-Práctica'),
	(108, 180, 2726, 'Hidrología', 347, 247, 'Teórico-Práctica'),
	(109, 85, 2525, 'Tratamiento de agua para consumo humano', 246, NULL, 'Teórico-Práctica'),
	(110, 85, 2526, 'Residuos líquidos', 246, NULL, 'Teórico-Práctica'),
	(111, 85, 2503, 'Introducción al saneamiento ambiental', 246, NULL, 'Teórico-Práctica'),
	(112, 85, 2507, 'Topografía', 246, NULL, 'Teórico-Práctica'),
	(113, 85, 2524, 'Fundamentos acueductos y alcantarillados', 246, NULL, 'Teórico-Práctica'),
	(114, 85, 2519, 'Calidad del agua ', 246, NULL, 'Teórico-Práctica'),
	(115, 85, 2520, 'Zoonosis', 246, NULL, 'Teórico-Práctica'),
	(116, 85, 2528, 'Organización comunitaria', 246, NULL, 'Teórico-Práctica'),
	(117, 85, 2534, 'Administración municipal', 246, NULL, 'Teórico-Práctica'),
	(118, 85, 2532, 'Residuos Sólidos', 246, NULL, 'Teórico-Práctica'),
	(119, 85, 2027, 'Fundamentos de ecología', 246, NULL, 'Teórico-Práctica'),
	(120, 85, 2509, 'Sociedad y ambiente', 246, NULL, 'Teórico-Práctica'),
	(121, 85, 2506, 'Hidráulica', 246, NULL, 'Teórico-Práctica'),
	(122, 85, 2543, 'Salida integrada', 246, NULL, 'Teórico-Práctica'),
	(123, 85, 2539, 'Saneamiento urbano y rural', 246, NULL, 'Teórico-Práctica'),
	(124, 1, 7019, 'Deporte formativo', 348, 248, 'Teórico-Práctica'),
	(125, 1, 7021, 'Desarrollo organizacional', 348, 248, 'Teórico-Práctica'),
	(126, 1, 7032, 'Recreación', 348, 248, 'Teórico-Práctica'),
	(127, 1, 7046, 'Deporte de alto rendimiento', 348, 248, 'Teórico-Práctica'),
	(128, 1, 7050, 'Escenarios y entornos deportivos', 348, 248, 'Teórico-Práctica'),
	(129, 185, 2443, 'Administración de recursos naturales ', 345, 245, 'Teórico-Práctica'),
	(130, 185, 2429, 'Factores de riesgo ambiental en salud pública', 345, 245, 'Teórico-Práctica'),
	(131, 185, 2418, 'Problemas y alternativas ambientales', 345, 245, 'Teórico-Práctica'),
	(132, 185, 2408, 'Sociedad y ambiente', 345, 245, 'Teórico-Práctica'),
	(133, 185, 2439, 'Planificación ambiental territorial ', 245, NULL, 'Teórico-Práctica'),
	(134, 185, 19101, 'Planificación ambiental territorial ', 345, NULL, 'Teórico-Práctica'),
	(135, 185, 2434, 'Vulnerabilidad y riesgos ', 345, 245, 'Teórico-Práctica'),
	(136, 185, 2403, 'Introducción a la administración ambiental', 345, 245, 'Teórico-Práctica'),
	(137, 185, 2413, 'Organización comunitaria', 345, 245, 'Teórico-Práctica'),
	(999, 999, 0, 'N/A', 0, 0, 'N/A');
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

-- Volcando datos para la tabla practicampo.programa_academico: ~9 rows (aproximadamente)
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
  `ruta_principal` varchar(8000) DEFAULT NULL,
  `destino_rp` varchar(255) DEFAULT NULL,
  `ruta_alterna` varchar(8000) DEFAULT NULL,
  `destino_ra` varchar(255) DEFAULT NULL,
  `lugar_salida_rp` varchar(8000) DEFAULT NULL,
  `lugar_salida_ra` varchar(8000) DEFAULT NULL,
  `lugar_regreso_rp` blob,
  `lugar_regreso_ra` blob,
  `fecha_salida_aprox_rp` date DEFAULT NULL,
  `fecha_salida_aprox_ra` date DEFAULT NULL,
  `fecha_regreso_aprox_rp` date DEFAULT NULL,
  `fecha_regreso_aprox_ra` date DEFAULT NULL,
  `num_estudiantes_aprox` int(11) DEFAULT NULL,
  `num_acompaniantes` int(11) DEFAULT NULL,
  `observ_coordinador` varchar(8000) DEFAULT NULL,
  `observ_decano` varchar(8000) DEFAULT NULL,
  `det_recorrido_interno_rp` varchar(8000) DEFAULT NULL,
  `det_recorrido_interno_ra` varchar(8000) DEFAULT NULL,
  `det_tipo_transporte_rp_1` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_rp_2` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_rp_3` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_1` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_2` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_ra_3` varchar(50) DEFAULT NULL,
  `num_paradas_trayecto` int(11) DEFAULT NULL,
  `cantidad_grupos` int(11) DEFAULT NULL,
  `grupo_1` int(11) DEFAULT NULL,
  `grupo_2` int(11) DEFAULT NULL,
  `grupo_3` int(11) DEFAULT NULL,
  `grupo_4` int(11) DEFAULT NULL,
  `duracion_num_dias` int(11) DEFAULT NULL,
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
  `aprobacion_coordinador` int(11) DEFAULT NULL,
  `aprobacion_decano` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo.proyeccion_preliminar: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion_preliminar` DISABLE KEYS */;
REPLACE INTO `proyeccion_preliminar` (`id`, `id_tipo_transporte_rp_1`, `id_tipo_transporte_rp_2`, `id_tipo_transporte_rp_3`, `id_tipo_transporte_ra_1`, `id_tipo_transporte_ra_2`, `id_tipo_transporte_ra_3`, `id_programa_academico`, `id_docente_responsable`, `id_espacio_academico`, `id_peridodo_academico`, `id_semestre_asignatura`, `id_tipo_zona_transitar`, `ruta_principal`, `destino_rp`, `ruta_alterna`, `destino_ra`, `lugar_salida_rp`, `lugar_salida_ra`, `lugar_regreso_rp`, `lugar_regreso_ra`, `fecha_salida_aprox_rp`, `fecha_salida_aprox_ra`, `fecha_regreso_aprox_rp`, `fecha_regreso_aprox_ra`, `num_estudiantes_aprox`, `num_acompaniantes`, `observ_coordinador`, `observ_decano`, `det_recorrido_interno_rp`, `det_recorrido_interno_ra`, `det_tipo_transporte_rp_1`, `det_tipo_transporte_rp_2`, `det_tipo_transporte_rp_3`, `det_tipo_transporte_ra_1`, `det_tipo_transporte_ra_2`, `det_tipo_transporte_ra_3`, `num_paradas_trayecto`, `cantidad_grupos`, `grupo_1`, `grupo_2`, `grupo_3`, `grupo_4`, `duracion_num_dias`, `viaticos_estudiantes`, `viaticos_docente`, `costo_total_transporte`, `cant_transporte_rp`, `cant_transporte_ra`, `capac_transporte_rp_1`, `capac_transporte_rp_2`, `capac_transporte_rp_3`, `capac_transporte_ra_1`, `capac_transporte_ra_2`, `capac_transporte_ra_3`, `exclusiv_tiempo_rp_1`, `exclusiv_tiempo_rp_2`, `exclusiv_tiempo_rp_3`, `exclusiv_tiempo_ra_1`, `exclusiv_tiempo_ra_2`, `exclusiv_tiempo_ra_3`, `aprobacion_coordinador`, `aprobacion_decano`, `fecha_diligenciamiento`, `created_at`, `updated_at`) VALUES
	(2, 1, NULL, NULL, 1, NULL, NULL, 1, 1038410523, 10, 2, 8, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Hacienda Misiones - Corregimiento La Victoria', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Impro Arroz', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 80, 2, NULL, NULL, 'DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m.', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'carretera destapada', NULL, NULL, 'carretera destapada', NULL, NULL, NULL, NULL, 502, 501, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 40, NULL, NULL, 40, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, 4, 5, '2020-03-03', '2020-03-03 21:10:56', '2020-03-03 21:10:56'),
	(4, NULL, NULL, NULL, 1, NULL, NULL, 1, 1038410523, 70, 3, 10, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Hacienda Misiones', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Impro arroz', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 40, 2, NULL, NULL, '"DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m."', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'carretera destapada', NULL, NULL, 'carretera destapada', NULL, NULL, NULL, NULL, 501, 502, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 20, NULL, NULL, 40, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, 5, 5, '2020-03-04', '2020-03-04 22:12:46', '2020-03-04 22:12:46'),
	(5, 2, 1, NULL, 1, NULL, NULL, 1, 1038410523, 129, 3, 10, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Hacienda Misiones', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Impro Arroz', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 40, 2, NULL, NULL, '"DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m."', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'carretera destapada', 'carretera destapada', NULL, 'carretera destapada', NULL, NULL, NULL, NULL, 502, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 20, 22, NULL, 40, NULL, NULL, 1, NULL, NULL, 2, NULL, NULL, 5, 5, '2020-03-04', '2020-03-05 00:34:58', '2020-03-05 00:34:58'),
	(6, 2, 2, 2, 1, NULL, NULL, 1, 1038410523, 81, 3, 10, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Hacienda Misiones', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Impro Arroz', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 60, 1, NULL, NULL, '"DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m."', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'carretera destapada', 'carretera destapada', 'carretera destapada', 'carretera destapada', NULL, NULL, NULL, NULL, 504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 20, 20, 20, 60, NULL, NULL, 2, NULL, NULL, 2, NULL, NULL, 5, 5, '2020-03-04', '2020-03-05 02:21:41', '2020-03-05 02:21:41'),
	(7, 2, 2, 2, 1, NULL, NULL, 1, 1038410523, 103, 3, 10, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'H M', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'I A', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 60, 2, NULL, NULL, '"DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m."', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, NULL, NULL, 504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 20, 20, 20, 60, NULL, NULL, 1, 1, 1, 1, NULL, NULL, 5, 5, '2020-03-04', '2020-03-05 02:39:49', '2020-03-05 02:39:49'),
	(8, 1, NULL, NULL, 3, NULL, NULL, 1, 1038410523, 91, 3, 10, NULL, 'https://www.google.com/maps/dir/\'\'/Mesitas+del+Colegio,+Cundinamarca/Hacienda+Misiones,+Mesitas+del+Colegio,+Cundinamarca/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.5450322,-74.4668794,13.25z/data=!4m26!4m25!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3f6d19af65c3af:0x42b29d5a047e0908!2m2!1d-74.445236!2d4.584195!1m5!1m1!1s0x8e3f13aef84fb263:0xe1524b9000a9cfee!2m2!1d-74.4499699!2d4.54997!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Misiones', 'https://www.google.com/maps/dir/\'\'/Villavicencio,+Meta/inproarroz,+Potos%C3%AD+-+Puerto+Gait%C3%A1n,+Villavicencio,+Meta/Acac%C3%ADas,+Meta/Villavicencio,+Meta/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas,+Cra.+7+%23%2340b-53,+Bogot%C3%A1/@4.4291527,-74.1174515,11.75z/data=!4m38!4m37!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3e28982796cbb1:0xc56d718cc7ba3b8!2m2!1d-73.533767!2d4.0700857!1m5!1m1!1s0x8e3e394b4905d8d7:0xeee95c38c6c1e4dc!2m2!1d-73.766129!2d3.991663!1m5!1m1!1s0x8e3e2ddfba283211:0x537e40041d7b20c2!2m2!1d-73.6376905!2d4.1513822!1m5!1m1!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!2m2!1d-74.0654527!2d4.6281045!3e0', 'Arroz', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', 'https://www.google.com/maps/place/Universidad+Distrital+Francisco+Jos%C3%A9+de+Caldas/@4.6281098,-74.0676414,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a286d598bd5:0xddf14904a87dfb47!8m2!3d4.6281045!4d-74.0654527', _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, _binary 0x68747470733A2F2F7777772E676F6F676C652E636F6D2F6D6170732F706C6163652F556E6976657273696461642B44697374726974616C2B4672616E636973636F2B4A6F732543332541392B64652B43616C6461732F40342E363238313039382C2D37342E303637363431342C31377A2F646174613D21336D312134623121346D3521336D342131733078386533663961323836643539386264353A30786464663134393034613837646662343721386D32213364342E363238313034352134642D37342E30363534353237, '2020-09-07', '2020-09-07', '2020-09-08', NULL, 80, 2, NULL, NULL, '"DIA UNO\r\nSALIDA DE BOGOTA 6:00 a. m.\r\nCORREGIMIENTO LA VICTORIA–HACIENDA MISIONES 9:00 a.m.\r\nDESAYUNO 9:30 a. m.\r\nMEDICION DE CAUDAL 11:00 a. m.\r\nBOCATOMA 12:30 m.\r\nALMUERZO 1:30 p. m.\r\nRECORRIDO HIDROELÉCTRICA 2:00 p. m.\r\nARMADO DE CAMPING 4:00 p. m.\r\nCENA 7:00 p. m.\r\nPRESENTACIÓN DE AVANCES TRABAJO 8:00 p.m.\r\nDIA DOS\r\nDESAYUNO 7:00 a. m.\r\nRECORRIDO MIRADOR SANTA LUCIA 9:00 a. m.\r\nALMUERZO 12:30 p. m.\r\nBOSQUE NATURAL ROBLE 1:30 p. m.\r\nRESERVORIO, USO DEL SUELO 2:00 p. m.\r\nREGRESO A ZONA DE CAMPING 3:00 p. m.\r\nPUNTO DE CAMPING 5:00 p. m.\r\nMAPAS DEL TERRITORIO 10:00 a. m.\r\nRECORRIDO HACIENDA Y BENEFICIO 11:00 a. m. LOMBRICULTIVO 11:30 a. m.\r\nPETROGLIFOS 12:00 p. m.\r\nALMUERZO 1:00 p. m.\r\nCULTIVOS 2:00 p. m.\r\nRESEVERA - MINA 3:00 p. m.\r\nRESERVORIO 3:30 p. m.\r\nPTAR 4:00 p. m.\r\nPORTON 4:30 p. m.\r\nSALIDA A BOGOTA 4:30 p. m.\r\nLLEGADA A BOGOTA 7:00 p. m."', 'Bogota (Edificio Sabio Caldas) - Villavicencio - Potosí (Impro Arroz) - Acacias -  Villavicencio - Bogota (Edificio Sabio Caldas)', 'n/a prueba update', NULL, NULL, 'n/a prueba update', NULL, NULL, NULL, NULL, 304, 306, 309, 301, NULL, NULL, NULL, NULL, 3, 3, 40, NULL, NULL, 40, NULL, NULL, 1, NULL, NULL, 2, NULL, NULL, 5, 5, '2020-03-05', '2020-03-05 21:08:10', '2020-03-05 22:15:46');
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

-- Volcando datos para la tabla practicampo.tipo_transporte: ~3 rows (aproximadamente)
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
  `id_role` int(11) NOT NULL DEFAULT '2',
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '1',
  `id_tipo_vinculacion` int(11) NOT NULL DEFAULT '1',
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
  CONSTRAINT `fk_users_espacio_academico_1` FOREIGN KEY (`id_espacio_academico_1`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_2` FOREIGN KEY (`id_espacio_academico_2`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_3` FOREIGN KEY (`id_espacio_academico_3`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_4` FOREIGN KEY (`id_espacio_academico_4`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_5` FOREIGN KEY (`id_espacio_academico_5`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_espacio_academico_6` FOREIGN KEY (`id_espacio_academico_6`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tipo_vinculacion` FOREIGN KEY (`id_tipo_vinculacion`) REFERENCES `tipo_vinculacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo.users: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_tipo_vinculacion`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 4, 2, 10, 117, NULL, NULL, NULL, NULL, 'LV32', 'Luisa', NULL, 'Garcia', 'Lopez', 3195693569, NULL, 'Lvgiraldos@gmail.com', NULL, '$2y$10$uFngpVjfCVSw.vk6DtcLqOs8Y0z7ViO3VZdDIQtw2GJAa56fsoz3G', '55QPeKoNPJ41WkvHHpFbax5bMIaGHnZG9ib1UeAVEibGe8iOdzHvB4IIhRlZ', '2020-01-17 01:40:42', '2020-02-17 03:18:50'),
	(8652348, 5, 1, 1, 1, 23, 36, 117, 27, 82, 128, 'criverag', 'Cesar', NULL, 'Rivera', 'Gomez', 3015698745, 5684512, 'criverag@udistrital.edu.co', NULL, '$2y$10$Er4bk9.yD9pFnKrKOyzGB.Erwrd4XFHCUkNR5/90HHdyNQo8C6.iW', NULL, '2020-02-27 02:52:29', '2020-02-27 02:52:29'),
	(30314801, 5, 1, 1, 1, 10, 49, NULL, NULL, NULL, NULL, 'emontesr', 'Emilia', NULL, 'Montes', 'Rojas', 3154269895, 7289645, 'lauritagiraldo.s@gmail.com.co', NULL, '$2y$10$JyWtQxOKKx9W2eWBn2yCduyRCcSU4W5YF6gErdNfeJ6B.Ti.Gl1S6', NULL, '2020-02-27 02:52:56', '2020-02-27 02:52:56'),
	(30569841, 4, 1, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, 'jposadam', 'Jairo', NULL, 'Posada', 'Martinez', 3152695487, 3216956, 'jposadam@udistrital.edu.co', NULL, '$2y$10$ZNaeSKLtN/17lX6SVEmP2.TetVJQuvjBQTR93LLyat6B1VpuXOuI.', NULL, '2020-02-27 02:53:02', '2020-02-27 02:53:02'),
	(32589654, 6, 3, 1, 2, 10, 114, 97, 36, NULL, NULL, 'pyepes', 'Paula', NULL, 'Yepes', NULL, 3217896532, 55555, 'pyepes@gmail.com', NULL, '$2y$10$3BtjxquKd6O8E13ju99pouzAVl71w1WV0aN/1G/BtCoiNVLb4I2B2', NULL, '2020-02-26 22:03:46', '2020-03-02 19:13:43'),
	(56896554, 5, 1, 1, 1, 136, 132, 137, 131, 130, 135, 'jescobar', 'Julian', NULL, 'Escobar', NULL, 3216589654, 5698745, 'jescobar@udistrital.edu.co', NULL, '$2y$10$ghzdCkshA/SvbM5e9VejNOtsa.lEgGclZHFqgywjxc5aLSpT6HLFO', NULL, '2020-04-14 19:15:36', '2020-04-14 19:15:36'),
	(58963236, 5, 1, 1, 1, 10, 56, 49, 36, NULL, NULL, 'lbuitrago', 'Lina', 'Paola', 'Buitrago', NULL, 3215689632, 5789663, 'lbuitrago@udistrital.edu.co', NULL, '$2y$10$OOZRkKWA9e9XyFp2nuLwo.oV9PtyI2wGn6nacZYesxjiXBDcSC76K', NULL, '2020-03-13 01:19:47', '2020-03-13 01:19:47'),
	(85365213, 7, 1, 1, 1, 999, NULL, NULL, NULL, NULL, NULL, 'andresquintero', 'Andres', 'Luis', 'Quintero', 'Zuluaga', 3152369563, 5489632, 'andresquintero@gmail.com', NULL, '$2y$10$.7bcv00FImy3IFmfDViVguZsHw8CfvDTW4fZoEtdT4FF.QA3kUmy2', NULL, '2020-02-27 02:56:39', '2020-02-27 02:56:39'),
	(89532648, 5, 2, 1, 1, 54, NULL, NULL, NULL, NULL, NULL, 'andres.linaresr', 'Giovanny', NULL, 'Linares', NULL, 3192614057, 4128659, 'andres.linaresr@gmail.com', NULL, '$2y$10$TzbQSTx5bZUREc2UOdjNt.m4G7EuxHGHvK9TqiBK7yzc1m1.fABp2', NULL, '2020-04-01 15:04:53', '2020-04-01 15:04:53'),
	(310698563, 2, 1, 3, 1, 10, NULL, NULL, NULL, NULL, NULL, 'fussar', 'Freddy', NULL, 'Ussa', 'Rodriguez', 3156984569, 4523698, 'fussar@udistrital.edu.co', NULL, '$2y$10$r.oFd571jYk5PM4ycnfnr.OP1mV5HocwmN9z9Flt69qjeWnO6wRbi', NULL, '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 3, 1, 6, 1, 10, NULL, NULL, NULL, NULL, NULL, 'arojasc', 'Alejandro', NULL, 'Rojas', 'Castro', 32569874536, 5632121, 'arojasc@udistrital.edu.co', NULL, '$2y$10$zX5X9sIdU6OgWDABgq7G2uQKji/mGgZSIi0TfZpMzUn4zbKv2S1be', NULL, '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 1, 1, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, 'lvgiraldos', 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 3107964434, 4125679, 'lvgiraldos@udistrital.edu.co', NULL, '$2y$10$V/4DkEVqMJNNXiHyUY42sOqTSRHtfhJAoOViAeoVxzbFwvj72ELg.', NULL, '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
