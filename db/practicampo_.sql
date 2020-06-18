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


-- Volcando estructura de base de datos para practicampo_
CREATE DATABASE IF NOT EXISTS `practicampo_` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `practicampo_`;

-- Volcando estructura para tabla practicampo_.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.categoria: ~13 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampo_.costos_proyeccion
CREATE TABLE IF NOT EXISTS `costos_proyeccion` (
  `id_proyeccion_preliminar` int(11) NOT NULL,
  `vlr_materiales_rp` bigint(20) DEFAULT NULL,
  `vlr_materiales_ra` bigint(20) DEFAULT NULL,
  `viaticos_estudiantes_rp` bigint(20) DEFAULT NULL,
  `viaticos_estudiantes_ra` bigint(20) DEFAULT NULL,
  `viaticos_docente_rp` bigint(20) DEFAULT NULL,
  `viaticos_docente_ra` bigint(20) DEFAULT NULL,
  `costo_total_transporte_menor_rp` bigint(20) DEFAULT NULL,
  `costo_total_transporte_menor_ra` bigint(20) DEFAULT NULL,
  `valor_estimado_transporte_rp` bigint(20) DEFAULT NULL,
  `valor_estimado_transporte_ra` bigint(20) DEFAULT NULL,
  `total_presupuesto_rp` bigint(20) DEFAULT NULL,
  `total_presupuesto_ra` bigint(20) DEFAULT NULL,
  KEY `fk_costos_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  CONSTRAINT `fk_costos_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.costos_proyeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `costos_proyeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `costos_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.docentes_practica
CREATE TABLE IF NOT EXISTS `docentes_practica` (
  `id_proyeccion_preliminar` int(11) NOT NULL,
  `num_doc_docente_acomp_1` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_2` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_3` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_4` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_5` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_6` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_7` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_8` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_9` bigint(20) DEFAULT NULL,
  `num_doc_docente_acomp_10` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_1` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_2` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_3` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_4` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_5` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_6` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_7` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_8` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_9` bigint(20) DEFAULT NULL,
  `num_doc_docente_apoyo_10` bigint(20) DEFAULT NULL,
  `docente_acomp_1` varchar(100) DEFAULT '',
  `docente_acomp_2` varchar(100) DEFAULT '',
  `docente_acomp_3` varchar(100) DEFAULT '',
  `docente_acomp_4` varchar(100) DEFAULT '',
  `docente_acomp_5` varchar(100) DEFAULT '',
  `docente_acomp_6` varchar(100) DEFAULT '',
  `docente_acomp_7` varchar(100) DEFAULT '',
  `docente_acomp_8` varchar(100) DEFAULT '',
  `docente_acomp_9` varchar(100) DEFAULT '',
  `docente_acomp_10` varchar(100) DEFAULT '',
  `docente_apoyo_1` varchar(100) DEFAULT '',
  `docente_apoyo_2` varchar(100) DEFAULT '',
  `docente_apoyo_3` varchar(100) DEFAULT '',
  `docente_apoyo_4` varchar(100) DEFAULT '',
  `docente_apoyo_5` varchar(100) DEFAULT '',
  `docente_apoyo_6` varchar(100) DEFAULT '',
  `docente_apoyo_7` varchar(100) DEFAULT '',
  `docente_apoyo_8` varchar(100) DEFAULT '',
  `docente_apoyo_9` varchar(100) DEFAULT '',
  `docente_apoyo_10` varchar(100) DEFAULT '',
  `num_docentes_acomp` int(11) NOT NULL,
  `num_docentes_apoyo` int(11) NOT NULL,
  KEY `fk_docente_practica_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  CONSTRAINT `fk_docente_practica_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.docentes_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `docentes_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentes_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.espacio_academico
CREATE TABLE IF NOT EXISTS `espacio_academico` (
  `id` int(11) NOT NULL,
  `id_programa_academico` int(11) NOT NULL,
  `codigo_espacio_academico` int(11) NOT NULL,
  `espacio_academico` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_estudios_1` int(11) DEFAULT '0',
  `plan_estudios_2` int(11) DEFAULT '0',
  `tipo_espacio` varchar(50) DEFAULT NULL,
  `electiva` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programa_academico_espacio_academico` (`id_programa_academico`),
  CONSTRAINT `fk_programa_academico_espacio_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.espacio_academico: ~135 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `id_programa_academico`, `codigo_espacio_academico`, `espacio_academico`, `plan_estudios_1`, `plan_estudios_2`, `tipo_espacio`, `electiva`) VALUES
	(1, 81, 2346, 'Gestión comercial', 344, 244, 'Teórico-Práctica', b'0'),
	(2, 81, 2328, 'Cuencas', 344, NULL, 'Teórico-Práctica', b'0'),
	(3, 81, 2324, 'Residuos líquidos ', 344, 244, 'Teórico-Práctica', b'0'),
	(4, 81, 2334, 'Operación de plantas y estaciones de bombeo', 344, 244, 'Teórico-Práctica', b'0'),
	(5, 81, 2323, 'Gestión ambiental II', 344, NULL, 'Teórico-Práctica', b'0'),
	(6, 81, 2312, 'Ecología', 344, 244, 'Teórico-Práctica', b'0'),
	(7, 81, 2319, 'Calidad del agua ', 344, 244, 'Teórico-Práctica', b'0'),
	(8, 81, 2331, 'Residuos sólidos', 344, 244, 'Teórico-Práctica', b'0'),
	(9, 81, 2327, 'Gestión ambiental I', 344, NULL, 'Teórico-Práctica', b'0'),
	(10, 81, 2325, 'Administración ambiental y desarrollo local', 344, 244, 'Teórico-Práctica', b'0'),
	(11, 81, 2341, 'Servicio público de energía', 344, 244, 'Teórico-Práctica', b'0'),
	(12, 181, 2112, 'Fundamentos de química', 349, 249, 'Teórico-Práctica', b'0'),
	(13, 181, 11809, 'Química sanitaria', 349, 249, 'Teórico-Práctica', b'0'),
	(14, 181, 11811, 'Procesos unitarios I', 349, 249, 'Teórico-Práctica', b'0'),
	(15, 181, 11802, 'Ecología humana', 349, 249, 'Teórico-Práctica', b'0'),
	(16, 181, 2509, 'Sociedad y ambiente', 349, 249, 'Teórico-Práctica', b'0'),
	(17, 181, 11817, 'Plantas de tratamiento para agua potable', 349, 249, 'Teórico-Práctica', b'0'),
	(18, 181, 11820, 'Plantas de tratamiento para agua residual', 349, 249, 'Teórico-Práctica', b'0'),
	(19, 181, 2531, 'Emisiones atmosféricas', 349, 249, 'Teórico-Práctica', b'0'),
	(20, 181, 11812, 'Calidad del aire', 349, 249, 'Teórico-Práctica', b'0'),
	(21, 181, 11814, 'Tratamiento y disposición de residuos sólidos', 349, 249, 'Teórico-Práctica', b'0'),
	(22, 181, 11821, 'Salida integrada', 349, 249, 'Teórico-Práctica', b'0'),
	(23, 181, 11804, 'Zoonosis y epidemiología', 349, 249, 'Teórico-Práctica', b'0'),
	(24, 181, 11836, 'Elementos de planificación territorial', 349, 249, 'Teórico-Práctica', b'0'),
	(25, 181, 2539, 'Saneamiento urbano y rural', 349, 249, 'Teórico-Práctica', b'0'),
	(26, 181, 11816, 'Política sanitaria', 349, 249, 'Teórico-Práctica', b'0'),
	(27, 181, 11810, 'Acueductos', 349, 249, 'Teórico-Práctica', b'0'),
	(28, 181, 2027, 'Fundamentos de ecología', 349, 249, 'Teórico-Práctica', b'1'),
	(29, 10, 2137, 'Práctica integrada I', 342, 242, 'Teórico-Práctica', b'0'),
	(30, 10, 2166, 'Evaluación ambiental', 342, 242, 'Teórico-Práctica', b'0'),
	(31, 10, 2162, 'Silvicultura comunitaria', 342, 242, 'Teórico-Práctica', b'0'),
	(32, 10, 2119, 'Geología y geomorfología', 342, 242, 'Teórico-Práctica', b'0'),
	(33, 10, 2160, 'Ordenamiento territorial', 342, 242, 'Teórico-Práctica', b'0'),
	(34, 10, 2113, 'Introducción a la ingeniería forestal', 342, 242, 'Teórico-Práctica', b'0'),
	(35, 10, 2126, 'Percepción remota e interpretación de imágenes', 342, 242, 'Teórico-Práctica', b'0'),
	(36, 10, 2175, 'Áreas protegidas', 342, 242, 'Teórico-Práctica', b'0'),
	(37, 10, 2109, 'Micorrizas', 342, 242, 'Teórico-Práctica', b'0'),
	(38, 10, 2127, 'Suelos I', 342, 242, 'Teórico-Práctica', b'0'),
	(39, 10, 2132, 'Dendrología II', 342, 242, 'Teórico-Práctica', b'0'),
	(40, 10, 2163, 'Silvicultura de bosques naturales', 342, 242, 'Teórico-Práctica', b'0'),
	(41, 10, 2117, 'Fertilización y fertilizantes', 342, 242, 'Teórico-Práctica', b'0'),
	(42, 10, 2128, 'Química de productos forestales', 342, 242, 'Teórico-Práctica', b'0'),
	(43, 10, 2148, 'Aprovechamiento forestal', 342, 242, 'Teórico-Práctica', b'0'),
	(44, 10, 2116, 'Sistemas agroforestales', 342, 242, 'Teórico-Práctica', b'0'),
	(45, 10, 2161, 'Estructuras de la madera', 342, 242, 'Teórico-Práctica', b'0'),
	(46, 10, 2124, 'Dendrología I', 342, 242, 'Teórico-Práctica', b'0'),
	(47, 10, 2179, 'Práctica integrada III', 342, 242, 'Teórico-Práctica', b'0'),
	(48, 10, 2152, 'Modelamiento de fenómenos biológicos', 342, 242, 'Teórico-Práctica', b'0'),
	(49, 10, 2170, 'Biología de la conservación', 342, 242, 'Teórico-Práctica', b'0'),
	(50, 10, 2177, 'Gestión del riesgo', 342, 242, 'Teórico-Práctica', b'0'),
	(51, 10, 2111, 'Biología general', 342, 242, 'Teórico-Práctica', b'1'),
	(52, 10, 2154, 'Propiedades de la madera', 342, 242, 'Teórico-Práctica', b'0'),
	(53, 10, 2115, 'Botánica taxonómica', 342, 242, 'Teórico-Práctica', b'0'),
	(54, 10, 2156, 'Extensión forestal', 342, 242, 'Teórico-Práctica', b'0'),
	(55, 10, 2134, 'Fisiología forestal', 342, 242, 'Teórico-Práctica', b'0'),
	(56, 10, 2147, 'Conservación de suelos', 342, 242, 'Teórico-Práctica', b'0'),
	(57, 10, 2155, 'Fitomejoramiento', 342, 242, 'Teórico-Práctica', b'0'),
	(58, 10, 2173, 'Ordenación de bosques', 342, 242, 'Teórico-Práctica', b'0'),
	(59, 10, 2130, 'Ecología forestal avanzada', 342, 242, 'Teórico-Práctica', b'0'),
	(60, 10, 2146, 'Sanidad forestal', 342, 242, 'Teórico-Práctica', b'0'),
	(61, 10, 2139, 'Hidrología', 342, 242, 'Teórico-Práctica', b'0'),
	(62, 10, 2165, 'Ingeniería del riego', 342, 242, 'Teórico-Práctica', b'0'),
	(63, 10, 2133, 'Suelos II', 342, 242, 'Teórico-Práctica', b'0'),
	(64, 10, 2167, 'Industrias forestales I', 342, 242, 'Teórico-Práctica', b'0'),
	(65, 10, 2138, 'Mediciones forestales', 342, 242, 'Teórico-Práctica', b'0'),
	(66, 10, 2149, 'Silvicultura de plantaciones', 342, 242, 'Teórico-Práctica', b'0'),
	(67, 10, 2174, 'Industrias forestales II', 342, 242, 'Teórico-Práctica', b'0'),
	(69, 10, 2159, 'Práctica integrada II', 342, 242, 'Teórico-Práctica', b'0'),
	(70, 10, 2153, 'Cuencas hidrográficas', 342, 242, 'Teórico-Práctica', b'0'),
	(71, 10, 2158, 'Desarrollo y medio ambiente', 342, 242, 'Teórico-Práctica', b'0'),
	(74, 32, 2043, 'Topografía automatizada', 341, 241, 'Teórico-Práctica', b'1'),
	(75, 32, 2042, 'Tránsito y transportes ', 341, 241, 'Teórico-Práctica', b'1'),
	(76, 32, 2005, 'Planimetría', 341, 241, 'Teórico-Práctica', b'1'),
	(77, 32, 2031, 'Mecánica de suelos', 341, 241, 'Teórico-Práctica', b'1'),
	(78, 32, 2044, 'Pavimentos', 341, 241, 'Teórico-Práctica', b'1'),
	(79, 32, 2025, 'Geología y geomorfología', 341, 241, 'Teórico-Práctica', b'1'),
	(80, 32, 2045, 'Análisis y gestión del riesgo', 341, 241, 'Teórico-Práctica', b'0'),
	(81, 32, 2041, 'Levantamientos especiales', 341, 241, 'Teórico-Práctica', b'1'),
	(82, 31, 2238, 'Cartografía digital ', 243, NULL, 'Teórico-Práctica', b'0'),
	(83, 31, 19604, 'Levantamientos altimétricos', NULL, NULL, 'Teórico-Práctica', b'0'),
	(84, 31, 19606, 'Topografía de vías', NULL, NULL, 'Teórico-Práctica', b'0'),
	(85, 31, 2228, 'Localización de vías', 243, NULL, 'Teórico-Práctica', b'0'),
	(86, 31, 2249, 'Arqueoastronomía', 243, NULL, 'Teórico-Práctica', b'0'),
	(87, 31, 2232, 'Fotogrametría y fotointerpretación', 243, NULL, 'Teórico-Práctica', b'0'),
	(88, 31, 2245, 'Geodesia posicional', 243, NULL, 'Teórico-Práctica', b'0'),
	(89, 31, 2251, 'Uso del vehículo aéreo no tripulado-vant en la ingeniería', 243, NULL, 'Teórico-Práctica', b'0'),
	(90, 31, 2221, 'Diseño geométrico de vías', 243, NULL, 'Teórico-Práctica', b'0'),
	(91, 31, 19601, 'Levantamientos planimétricos', NULL, NULL, 'Teórico-Práctica', b'0'),
	(92, 180, 2703, 'Introducción a la ingeniería ambiental', 347, 247, 'Teórico-Práctica', b'0'),
	(93, 180, 2716, 'Geología y geomorfología', 347, 247, 'Teórico-Práctica', b'0'),
	(94, 180, 2720, 'Suelos', 347, 247, 'Teórico-Práctica', b'0'),
	(95, 180, 2724, 'Química ambiental aplicada', 347, 247, 'Teórico-Práctica', b'0'),
	(96, 180, 2727, 'Ecología analítica', 347, 247, 'Teórico-Práctica', b'0'),
	(97, 180, 2728, 'Contaminación ambiental I', 347, 247, 'Teórico-Práctica', b'0'),
	(98, 180, 2729, 'Hidráulica', 347, 247, 'Teórico-Práctica', b'0'),
	(99, 180, 2733, 'Ordenamiento territorial rural', 347, 247, 'Teórico-Práctica', b'0'),
	(100, 180, 2734, 'Contaminación ambiental II', 347, 247, 'Teórico-Práctica', b'0'),
	(101, 180, 2735, 'Tecnologías apropiadas I', 347, 247, 'Teórico-Práctica', b'0'),
	(102, 180, 2736, 'Hidrogeología', 347, 247, 'Teórico-Práctica', b'0'),
	(103, 180, 2739, 'Tecnologías apropiadas II', 347, 247, 'Teórico-Práctica', b'0'),
	(104, 180, 2746, 'Evaluación ambiental II', 347, 247, 'Teórico-Práctica', b'0'),
	(105, 180, 2742, 'Evaluación ambiental I', 347, 247, 'Teórico-Práctica', b'0'),
	(106, 180, 2743, 'Manejo técnico ambiental', 347, 247, 'Teórico-Práctica', b'0'),
	(107, 180, 2730, 'Fisicoquímica de fluidos', 347, 247, 'Teórico-Práctica', b'0'),
	(108, 180, 2726, 'Hidrología', 347, 247, 'Teórico-Práctica', b'0'),
	(109, 85, 2525, 'Tratamiento de agua para consumo humano', 246, NULL, 'Teórico-Práctica', b'0'),
	(110, 85, 2526, 'Residuos líquidos', 246, NULL, 'Teórico-Práctica', b'0'),
	(111, 85, 2503, 'Introducción al saneamiento ambiental', 246, NULL, 'Teórico-Práctica', b'0'),
	(112, 85, 2507, 'Topografía', 246, NULL, 'Teórico-Práctica', b'0'),
	(113, 85, 2524, 'Fundamentos acueductos y alcantarillados', 246, NULL, 'Teórico-Práctica', b'0'),
	(114, 85, 2519, 'Calidad del agua ', 246, NULL, 'Teórico-Práctica', b'0'),
	(115, 85, 2520, 'Zoonosis', 246, NULL, 'Teórico-Práctica', b'0'),
	(116, 85, 2528, 'Organización comunitaria', 246, NULL, 'Teórico-Práctica', b'0'),
	(117, 85, 2534, 'Administración municipal', 246, NULL, 'Teórico-Práctica', b'0'),
	(118, 85, 2532, 'Residuos Sólidos', 246, NULL, 'Teórico-Práctica', b'0'),
	(119, 85, 2027, 'Fundamentos de ecología', 246, NULL, 'Teórico-Práctica', b'1'),
	(120, 85, 2509, 'Sociedad y ambiente', 246, NULL, 'Teórico-Práctica', b'0'),
	(121, 85, 2506, 'Hidráulica', 246, NULL, 'Teórico-Práctica', b'0'),
	(122, 85, 2543, 'Salida integrada', 246, NULL, 'Teórico-Práctica', b'0'),
	(123, 85, 2539, 'Saneamiento urbano y rural', 246, NULL, 'Teórico-Práctica', b'0'),
	(124, 1, 7019, 'Deporte formativo', 348, 248, 'Teórico-Práctica', b'0'),
	(125, 1, 7021, 'Desarrollo organizacional', 348, 248, 'Teórico-Práctica', b'0'),
	(126, 1, 7032, 'Recreación', 348, 248, 'Teórico-Práctica', b'0'),
	(127, 1, 7046, 'Deporte de alto rendimiento', 348, 248, 'Teórico-Práctica', b'0'),
	(128, 1, 7050, 'Escenarios y entornos deportivos', 348, 248, 'Teórico-Práctica', b'0'),
	(129, 185, 2443, 'Administración de recursos naturales ', 345, 245, 'Teórico-Práctica', b'0'),
	(130, 185, 2429, 'Factores de riesgo ambiental en salud pública', 345, 245, 'Teórico-Práctica', b'0'),
	(131, 185, 2418, 'Problemas y alternativas ambientales', 345, 245, 'Teórico-Práctica', b'0'),
	(132, 185, 2408, 'Sociedad y ambiente', 345, 245, 'Teórico-Práctica', b'0'),
	(133, 185, 2439, 'Planificación ambiental territorial ', 245, NULL, 'Teórico-Práctica', b'0'),
	(134, 185, 19101, 'Planificación ambiental territorial ', 345, NULL, 'Teórico-Práctica', b'0'),
	(135, 185, 2434, 'Vulnerabilidad y riesgos ', 345, 245, 'Teórico-Práctica', b'0'),
	(136, 185, 2403, 'Introducción a la administración ambiental', 345, 245, 'Teórico-Práctica', b'0'),
	(137, 185, 2413, 'Organización comunitaria', 345, 245, 'Teórico-Práctica', b'0'),
	(999, 999, 0, 'N/A', 0, 0, 'N/A', b'0');
/*!40000 ALTER TABLE `espacio_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `abrev` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.estado: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
REPLACE INTO `estado` (`id`, `estado`, `abrev`) VALUES
	(1, 'Activo', 'Act.'),
	(2, 'Inactivo', 'Inact.'),
	(3, 'Aprobado', 'Aprob.'),
	(4, 'Desaprobado', 'Desap.'),
	(5, 'Pendiente', 'Pend.'),
	(6, 'Realizada', 'Hecho');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.materiales_herramientas_proyeccion
CREATE TABLE IF NOT EXISTS `materiales_herramientas_proyeccion` (
  `id_proyeccion_preliminar` int(11) NOT NULL,
  `det_materiales_rp` varchar(50) DEFAULT NULL,
  `det_materiales_ra` varchar(50) DEFAULT NULL,
  `det_herramientas_rp` varchar(50) DEFAULT NULL,
  `det_herramientas_ra` varchar(50) DEFAULT NULL,
  `det_equipos_rp` varchar(50) DEFAULT NULL,
  `det_equipos_ra` varchar(50) DEFAULT NULL,
  KEY `fk_materiales_herramientas_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  CONSTRAINT `fk_materiales_herramientas_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.materiales_herramientas_proyeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `materiales_herramientas_proyeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiales_herramientas_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo_.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo_.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.periodo_academico
CREATE TABLE IF NOT EXISTS `periodo_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_academico` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.periodo_academico: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `periodo_academico` DISABLE KEYS */;
REPLACE INTO `periodo_academico` (`id`, `periodo_academico`) VALUES
	(1, 'I'),
	(2, 'II'),
	(3, 'III');
/*!40000 ALTER TABLE `periodo_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.programa_academico
CREATE TABLE IF NOT EXISTS `programa_academico` (
  `id` int(11) NOT NULL,
  `programa_academico` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.programa_academico: ~10 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampo_.proyeccion_preliminar
CREATE TABLE IF NOT EXISTS `proyeccion_preliminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL DEFAULT '0',
  `id_programa_academico` int(11) DEFAULT NULL,
  `id_espacio_academico` int(11) DEFAULT NULL,
  `id_peridodo_academico` int(11) DEFAULT NULL,
  `id_semestre_asignatura` int(11) DEFAULT NULL,
  `id_docente_responsable` bigint(20) DEFAULT NULL,
  `ruta_principal` blob,
  `destino_rp` varchar(255) DEFAULT NULL,
  `ruta_alterna` blob,
  `destino_ra` varchar(255) DEFAULT NULL,
  `det_recorrido_interno_rp` blob,
  `det_recorrido_interno_ra` blob,
  `lugar_salida_rp` blob,
  `lugar_salida_ra` blob,
  `lugar_regreso_rp` blob,
  `lugar_regreso_ra` blob,
  `fecha_salida_aprox_rp` date DEFAULT NULL,
  `fecha_salida_aprox_ra` date NOT NULL,
  `fecha_regreso_aprox_rp` date DEFAULT NULL,
  `fecha_regreso_aprox_ra` date DEFAULT NULL,
  `duracion_num_dias_ra` int(11) DEFAULT NULL,
  `duracion_num_dias_rp` int(11) DEFAULT NULL,
  `num_estudiantes_aprox` int(11) DEFAULT NULL,
  `cantidad_grupos` int(11) DEFAULT NULL,
  `grupo_1` int(11) DEFAULT NULL,
  `grupo_2` int(11) DEFAULT NULL,
  `grupo_3` int(11) DEFAULT NULL,
  `grupo_4` int(11) DEFAULT NULL,
  `confirm_creador` bit(1) DEFAULT NULL,
  `confirm_coord` bit(1) DEFAULT NULL,
  `confirm_electiva_coord` bit(1) DEFAULT NULL,
  `confirm_asistD` bit(1) DEFAULT NULL,
  `observ_coordinador` blob,
  `observ_decano` blob,
  `aprobacion_coordinador` int(11) DEFAULT NULL,
  `id_coordinador_aprob` bigint(20) DEFAULT NULL,
  `aprobacion_decano` int(11) DEFAULT NULL,
  `id_decano_aprob` bigint(20) DEFAULT NULL,
  `aprobacion_asistD` int(11) DEFAULT NULL,
  `id_asistD_aprob` bigint(20) DEFAULT NULL,
  `aprobacion_consejo_facultad` int(11) DEFAULT NULL,
  `cod_presup_tesoreria` bigint(20) DEFAULT NULL,
  `id_asistD_aprob_consejo` bigint(20) DEFAULT NULL,
  `fecha_diligenciamiento` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyeccion_preliminar_users_idx` (`id_docente_responsable`),
  KEY `fk_proyeccion_preliminar_espacio_academico_idx` (`id_espacio_academico`),
  KEY `fk_proyeccion_preliminar_periodo_academico_idx` (`id_peridodo_academico`),
  KEY `fk_proyeccion_preliminar_semestre_asignatura_idx` (`id_semestre_asignatura`),
  KEY `fk_proyeccion_preliminar_estado_coord_idx` (`aprobacion_coordinador`),
  KEY `fk_proyeccion_preliminar_estado_dec_idx` (`aprobacion_decano`),
  KEY `fk_proyeccion_preliminar_programa_academico_idx` (`id_programa_academico`),
  KEY `fk_proyeccion_preliminar_estado_asistD_idx` (`aprobacion_asistD`),
  KEY `fk_proyeccion_preliminar_estado_cons_facultad_idx` (`aprobacion_consejo_facultad`),
  KEY `fk_proyeccion_preliminar_estado_idx` (`id_estado`),
  CONSTRAINT `fk_proyeccion_preliminar_espacio_academico` FOREIGN KEY (`id_espacio_academico`) REFERENCES `espacio_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_asistD` FOREIGN KEY (`aprobacion_asistD`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_cons_facultad` FOREIGN KEY (`aprobacion_consejo_facultad`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_coord` FOREIGN KEY (`aprobacion_coordinador`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_estado_dec` FOREIGN KEY (`aprobacion_decano`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_periodo_academico` FOREIGN KEY (`id_peridodo_academico`) REFERENCES `periodo_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_programa_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_semestre_asignatura` FOREIGN KEY (`id_semestre_asignatura`) REFERENCES `semestre_asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyeccion_preliminar_users` FOREIGN KEY (`id_docente_responsable`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.proyeccion_preliminar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion_preliminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyeccion_preliminar` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.riesgos_amenazas_practica
CREATE TABLE IF NOT EXISTS `riesgos_amenazas_practica` (
  `id_proyeccion_preliminar` int(11) NOT NULL,
  `areas_acuaticas_rp` bit(1) NOT NULL DEFAULT b'0',
  `areas_acuaticas_ra` bit(1) NOT NULL DEFAULT b'0',
  `alturas_rp` bit(1) NOT NULL DEFAULT b'0',
  `alturas_ra` bit(1) NOT NULL DEFAULT b'0',
  `riesgo_biologico_rp` bit(1) NOT NULL DEFAULT b'0',
  `riesgo_biologico_ra` bit(1) NOT NULL DEFAULT b'0',
  `espacios_confinados_rp` bit(1) NOT NULL DEFAULT b'0',
  `espacios_confinados_ra` bit(1) NOT NULL DEFAULT b'0',
  `plan_contingencia_rp` json NOT NULL,
  `plan_contingencia_ra` json NOT NULL,
  KEY `fk_riesgos_amenazas_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  CONSTRAINT `fk_riesgos_amenazas_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.riesgos_amenazas_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `riesgos_amenazas_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `riesgos_amenazas_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampo_.roles: ~7 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampo_.semestre_asignatura
CREATE TABLE IF NOT EXISTS `semestre_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semestre_asignatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.semestre_asignatura: ~10 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampo_.solicitud_practica
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

-- Volcando datos para la tabla practicampo_.solicitud_practica: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.solicitud_transporte
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

-- Volcando datos para la tabla practicampo_.solicitud_transporte: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_transporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.tipo_certificacion
CREATE TABLE IF NOT EXISTS `tipo_certificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_certificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.tipo_certificacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_certificacion` DISABLE KEYS */;
REPLACE INTO `tipo_certificacion` (`id`, `tipo_certificacion`) VALUES
	(1, 'Constancia salida'),
	(2, 'Constancia asistencia');
/*!40000 ALTER TABLE `tipo_certificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.tipo_identificacion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
REPLACE INTO `tipo_identificacion` (`id`, `tipo_identificacion`, `sigla`) VALUES
	(1, 'Cédula de Ciudadanía', 'C.C'),
	(2, 'Cédula de Extranjería', 'C.E'),
	(3, 'Pasaporte', 'PAS');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.tipo_transporte
CREATE TABLE IF NOT EXISTS `tipo_transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_transporte` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.tipo_transporte: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_transporte` DISABLE KEYS */;
REPLACE INTO `tipo_transporte` (`id`, `tipo_transporte`) VALUES
	(1, 'Bus'),
	(2, 'Buseta'),
	(3, 'Camioneta'),
	(4, 'Otro');
/*!40000 ALTER TABLE `tipo_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.tipo_vinculacion
CREATE TABLE IF NOT EXISTS `tipo_vinculacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vinculacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.tipo_vinculacion: ~7 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampo_.transporte_proyeccion
CREATE TABLE IF NOT EXISTS `transporte_proyeccion` (
  `id_proyeccion_preliminar` int(11) NOT NULL,
  `id_tipo_transporte_rp_1` int(11) NOT NULL,
  `id_tipo_transporte_rp_2` int(11) DEFAULT NULL,
  `id_tipo_transporte_rp_3` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_1` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_2` int(11) DEFAULT NULL,
  `id_tipo_transporte_ra_3` int(11) DEFAULT NULL,
  `otro_tipo_transporte_rp_1` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_rp_2` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_rp_3` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_1` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_2` varchar(50) DEFAULT NULL,
  `otro_tipo_transporte_ra_3` varchar(50) DEFAULT NULL,
  `det_tipo_transporte_rp_1` blob,
  `det_tipo_transporte_rp_2` blob,
  `det_tipo_transporte_rp_3` blob,
  `det_tipo_transporte_ra_1` blob,
  `det_tipo_transporte_ra_2` blob,
  `det_tipo_transporte_ra_3` blob,
  `vlr_otro_tipo_transporte_rp_1` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_rp_2` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_rp_3` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_1` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_2` bigint(20) DEFAULT NULL,
  `vlr_otro_tipo_transporte_ra_3` bigint(20) DEFAULT NULL,
  `docen_respo_trasnporte_rp_1` varchar(150) DEFAULT NULL,
  `docen_respo_trasnporte_rp_2` varchar(150) DEFAULT NULL,
  `docen_respo_trasnporte_rp_3` varchar(150) DEFAULT NULL,
  `docen_respo_trasnporte_ra_1` varchar(150) DEFAULT NULL,
  `docen_respo_trasnporte_ra_2` varchar(150) DEFAULT NULL,
  `docen_respo_trasnporte_ra_3` varchar(150) DEFAULT NULL,
  `capac_transporte_rp_1` int(11) DEFAULT NULL,
  `capac_transporte_rp_2` int(11) DEFAULT NULL,
  `capac_transporte_rp_3` int(11) DEFAULT NULL,
  `capac_transporte_ra_1` int(11) DEFAULT NULL,
  `capac_transporte_ra_2` int(11) DEFAULT NULL,
  `capac_transporte_ra_3` int(11) DEFAULT NULL,
  `exclusiv_tiempo_rp_1` bit(1) DEFAULT NULL,
  `exclusiv_tiempo_rp_2` bit(1) DEFAULT NULL,
  `exclusiv_tiempo_rp_3` bit(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_1` bit(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_2` bit(1) DEFAULT NULL,
  `exclusiv_tiempo_ra_3` bit(1) DEFAULT NULL,
  `cant_transporte_rp` int(11) DEFAULT NULL,
  `cant_transporte_ra` int(11) DEFAULT NULL,
  KEY `fk_transporte_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  KEY `fk_transporte_tipo_transporte_rp_idx` (`id_tipo_transporte_rp_1`),
  KEY `fk_transporte_tipo_transporte_ra_idx` (`id_tipo_transporte_ra_1`),
  CONSTRAINT `fk_transporte_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transporte_tipo_transporte_ra` FOREIGN KEY (`id_tipo_transporte_ra_1`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transporte_tipo_transporte_rp` FOREIGN KEY (`id_tipo_transporte_rp_1`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampo_.transporte_proyeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `transporte_proyeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transporte_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampo_.users
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

-- Volcando datos para la tabla practicampo_.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_tipo_vinculacion`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `id_programa_academico_coord`, `usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(30314801, 5, 1, 1, 1, 51, 9, 47, NULL, NULL, NULL, 999, 'emontesr', 'Emilia', NULL, 'Montes', 'Rojas', 3154269895, 7289645, 'lauritagiraldo.s@gmail.com.co', NULL, '$2y$10$JyWtQxOKKx9W2eWBn2yCduyRCcSU4W5YF6gErdNfeJ6B.Ti.Gl1S6', NULL, '2020-02-27 02:52:56', '2020-02-27 02:52:56'),
	(30569841, 4, 1, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, 81, 'jposadam', 'Jairo', NULL, 'Posada', 'Martinez', 3152695487, 3216956, 'jposadam@udistrital.edu.co', NULL, '$2y$10$ZNaeSKLtN/17lX6SVEmP2.TetVJQuvjBQTR93LLyat6B1VpuXOuI.', NULL, '2020-02-27 02:53:02', '2020-02-27 02:53:02'),
	(52527490, 4, 1, 1, 1, 58, 66, NULL, NULL, NULL, NULL, 10, 'npbonzap', 'Niria', 'Pastora', 'Bonza', 'Perez', 5711748, 5711748, 'npbonzap@udistrital.edu.co', NULL, '$2y$10$LXwvSEa5esmKWD52sV.dRukGlS6ZTiFEq0Oe/mqk122xJfjWsu3IO', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(63589653, 5, 1, 1, 2, 32, 51, NULL, NULL, NULL, NULL, 999, 'lsanin63', 'Lorena', NULL, 'Sanín', NULL, 3005236987, NULL, 'lsanin63@udistrital.edu.co', NULL, '$2y$10$TEuN2hTLIEpiJapMcr6weOnrGjKkDtS1CU6Vt0fA5W2EQ.OzyGEr2', NULL, '2020-05-04 02:31:21', '2020-05-04 02:31:21'),
	(79418769, 5, 1, 1, 1, 51, NULL, NULL, NULL, NULL, NULL, 10, 'cagarciav', 'Cesar', 'Augusto', 'Garcia', 'Valbuena', 5472365, 5472365, 'cagarciav@udistrital.edu.co', NULL, '$2y$10$rT54iBkqRKdycG78y8ypvO6u3L6uNST9kPkTZgqwn8pGA5dbdO93.', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(310698563, 2, 1, 3, 1, 10, NULL, NULL, NULL, NULL, NULL, 999, 'fussar', 'Freddy', NULL, 'Ussa', 'Rodriguez', 3156984569, 4523698, 'fussar@udistrital.edu.co', NULL, '$2y$10$r.oFd571jYk5PM4ycnfnr.OP1mV5HocwmN9z9Flt69qjeWnO6wRbi', NULL, '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 3, 1, 6, 1, 4, 999, NULL, NULL, NULL, NULL, 999, 'arojasc', 'Alejandro', NULL, 'Rojas', 'Castro', 32569874536, 5632121, 'arojasc@udistrital.edu.co', NULL, '$2y$10$zX5X9sIdU6OgWDABgq7G2uQKji/mGgZSIi0TfZpMzUn4zbKv2S1be', NULL, '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 1, 1, 1, 1, 136, 132, 137, 131, NULL, NULL, 999, 'lvgiraldos', 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 3107964434, 4125679, 'lvgiraldos@udistrital.edu.co', NULL, '$2y$10$V/4DkEVqMJNNXiHyUY42sOqTSRHtfhJAoOViAeoVxzbFwvj72ELg.', NULL, '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
