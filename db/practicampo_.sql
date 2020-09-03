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


-- Volcando estructura de base de datos para practicampoud
CREATE DATABASE IF NOT EXISTS `practicampoud` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `practicampoud`;

-- Volcando estructura para tabla practicampoud.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.categoria: ~13 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampoud.costos_proyeccion
CREATE TABLE IF NOT EXISTS `costos_proyeccion` (
  `id` int(11) NOT NULL,
  `vlr_materiales_rp` bigint(20) DEFAULT '0',
  `vlr_materiales_ra` bigint(20) DEFAULT '0',
  `viaticos_estudiantes_rp` bigint(20) DEFAULT NULL,
  `viaticos_estudiantes_ra` bigint(20) DEFAULT NULL,
  `viaticos_docente_rp` bigint(20) DEFAULT NULL,
  `viaticos_docente_ra` bigint(20) DEFAULT NULL,
  `costo_total_transporte_menor_rp` bigint(20) DEFAULT '0',
  `costo_total_transporte_menor_ra` bigint(20) DEFAULT '0',
  `valor_estimado_transporte_rp` bigint(20) DEFAULT NULL,
  `valor_estimado_transporte_ra` bigint(20) DEFAULT NULL,
  `total_presupuesto_rp` bigint(20) DEFAULT NULL,
  `total_presupuesto_ra` bigint(20) DEFAULT NULL,
  KEY `fk_costos_proyeccion_preliminar_idx` (`id`),
  CONSTRAINT `fk_costos_proyeccion_preliminar` FOREIGN KEY (`id`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.costos_proyeccion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `costos_proyeccion` DISABLE KEYS */;
REPLACE INTO `costos_proyeccion` (`id`, `vlr_materiales_rp`, `vlr_materiales_ra`, `viaticos_estudiantes_rp`, `viaticos_estudiantes_ra`, `viaticos_docente_rp`, `viaticos_docente_ra`, `costo_total_transporte_menor_rp`, `costo_total_transporte_menor_ra`, `valor_estimado_transporte_rp`, `valor_estimado_transporte_ra`, `total_presupuesto_rp`, `total_presupuesto_ra`) VALUES
	(1, 150000, 100000, 5523000, 3682000, 1015500, 609300, 0, 0, 150, 200, 6538650, 4291500),
	(2, 35000, 0, 105200, 263000, 609300, 1827900, 0, 0, 1500000, 2500000, 2214500, 4590900);
/*!40000 ALTER TABLE `costos_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.docentes_practica
CREATE TABLE IF NOT EXISTS `docentes_practica` (
  `id` int(11) NOT NULL,
  `num_docentes_acomp` int(11) NOT NULL,
  `num_docentes_apoyo` int(11) NOT NULL,
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
  KEY `fk_docente_practica_proyeccion_preliminar_idx` (`id`),
  CONSTRAINT `fk_docente_practica_proyeccion_preliminar` FOREIGN KEY (`id`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.docentes_practica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `docentes_practica` DISABLE KEYS */;
REPLACE INTO `docentes_practica` (`id`, `num_docentes_acomp`, `num_docentes_apoyo`, `num_doc_docente_acomp_1`, `num_doc_docente_acomp_2`, `num_doc_docente_acomp_3`, `num_doc_docente_acomp_4`, `num_doc_docente_acomp_5`, `num_doc_docente_acomp_6`, `num_doc_docente_acomp_7`, `num_doc_docente_acomp_8`, `num_doc_docente_acomp_9`, `num_doc_docente_acomp_10`, `num_doc_docente_apoyo_1`, `num_doc_docente_apoyo_2`, `num_doc_docente_apoyo_3`, `num_doc_docente_apoyo_4`, `num_doc_docente_apoyo_5`, `num_doc_docente_apoyo_6`, `num_doc_docente_apoyo_7`, `num_doc_docente_apoyo_8`, `num_doc_docente_apoyo_9`, `num_doc_docente_apoyo_10`, `docente_acomp_1`, `docente_acomp_2`, `docente_acomp_3`, `docente_acomp_4`, `docente_acomp_5`, `docente_acomp_6`, `docente_acomp_7`, `docente_acomp_8`, `docente_acomp_9`, `docente_acomp_10`, `docente_apoyo_1`, `docente_apoyo_2`, `docente_apoyo_3`, `docente_apoyo_4`, `docente_apoyo_5`, `docente_apoyo_6`, `docente_apoyo_7`, `docente_apoyo_8`, `docente_apoyo_9`, `docente_apoyo_10`) VALUES
	(1, 1, 3, 52369546, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6359623, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ana Garcia Nuñez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Analia Suarez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 2, 1, 10385692, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4236520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Beatriz Lopez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Josefina Galindo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `docentes_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.espacio_academico
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
  KEY `fk_programa_academico_espacio_academico_idx` (`id_programa_academico`),
  CONSTRAINT `fk_programa_academico_espacio_academico` FOREIGN KEY (`id_programa_academico`) REFERENCES `programa_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.espacio_academico: ~138 rows (aproximadamente)
/*!40000 ALTER TABLE `espacio_academico` DISABLE KEYS */;
REPLACE INTO `espacio_academico` (`id`, `id_programa_academico`, `codigo_espacio_academico`, `espacio_academico`, `plan_estudios_1`, `plan_estudios_2`, `tipo_espacio`, `electiva`) VALUES
	(1, 1, 7019, 'Deporte Formativo', 248, 348, 'T/P', b'0'),
	(2, 1, 7021, 'Desarrollo Organizacional', 248, 348, 'T/P', b'0'),
	(3, 1, 7046, 'Deporte de Alto Rendimiento', 248, 348, 'T/P', b'0'),
	(4, 1, 7050, 'Escenarios y Entornos Deportivos', 248, 348, 'T/P', b'0'),
	(5, 1, 7058, 'Organización de Eventos Recreo-Deportivos y Culturales', 248, 348, 'T/P', b'0'),
	(6, 10, 2111, 'Biología General', 242, 342, 'T/P', b'0'),
	(7, 10, 2113, 'Introducción a la Ingeniería Forestal', 242, 342, 'T/P', b'0'),
	(8, 10, 2115, 'Botánica Taxonómica', 242, 342, 'T/P', b'0'),
	(9, 10, 2116, 'Sistemas Agroforestales', 242, 342, 'T/P', b'1'),
	(10, 10, 2119, 'Geologia y Geomorfología', 242, 342, 'T/P', b'0'),
	(11, 10, 2124, 'Dendrología I', 242, 342, 'T/P', b'0'),
	(12, 10, 2126, 'Percepción Remota e Interpretación de Imágenes', 242, 342, 'T/P', b'0'),
	(13, 10, 2127, 'Suelos I', 242, 342, 'T/P', b'0'),
	(14, 10, 2128, 'Química de Productos Forestales', 242, 342, 'T/P', b'0'),
	(15, 10, 2130, 'Ecología Forestal Avanzada', 242, 342, 'T/P', b'0'),
	(16, 10, 2132, 'Dendrología II', 242, NULL, 'T/P', b'0'),
	(17, 10, 2133, 'Suelos II', 242, 342, 'T/P', b'0'),
	(18, 10, 2134, 'Fisiología Forestal', 242, 342, 'T/P', b'0'),
	(19, 10, 2138, 'Mediciones Forestales', 242, 342, 'T/P', b'0'),
	(20, 10, 2139, 'Hidrología', 242, 342, 'T/P', b'0'),
	(21, 10, 2146, 'Sanidad Forestal', 242, 342, 'T/P', b'0'),
	(22, 10, 2147, 'Conservación de Suelos', 242, 342, 'T/P', b'0'),
	(23, 10, 2148, 'Aprovechamiento Forestal', 242, 342, 'T/P', b'0'),
	(24, 10, 2149, 'Silvicultura de Plantaciones', 242, 342, 'T/P', b'0'),
	(25, 10, 2152, 'Modelamiento de Fenómenos Biológicos', 242, 342, 'T/P', b'0'),
	(26, 10, 2153, 'Cuencas Hidrográficas', 242, 342, 'T/P', b'0'),
	(27, 10, 2154, 'Propiedades de la Madera', 242, 342, 'T/P', b'0'),
	(28, 10, 2155, 'Fitomejoramiento Forestal', 242, 342, 'T/P', b'0'),
	(29, 10, 2156, 'Extensión Forestal', 242, 342, 'T/P', b'0'),
	(30, 10, 2160, 'Ordenamiento Territorial', 242, 342, 'T/P', b'0'),
	(31, 10, 2161, 'Estructuras de Madera', 242, 342, 'T/P', b'0'),
	(32, 10, 2163, 'Silvicultura de Bosque Natural', 242, 342, 'T/P', b'0'),
	(33, 10, 2166, 'Evaluación Ambiental', 242, 342, 'T/P', b'0'),
	(34, 10, 2167, 'Industrias Forestales I', 242, 342, 'T/P', b'0'),
	(35, 10, 2170, 'Biología de la Conservación', 242, 342, 'T/P', b'0'),
	(36, 10, 2173, 'Ordenación de Bosques', 242, 342, 'T/P', b'0'),
	(37, 10, 2174, 'Industrias Forestales II', 242, 342, 'T/P', b'0'),
	(38, 10, 2175, 'Áreas Protegidas', 242, 342, 'T/P', b'0'),
	(39, 10, 2177, 'Gestión del Riesgo', 242, 342, 'T/P', b'0'),
	(40, 10, 2137, 'Practica Integrada I', 242, 342, 'P', b'0'),
	(41, 10, 2159, 'Practica Integrada II', 242, 342, 'P', b'0'),
	(42, 10, 2179, 'Practica Integrada III', 242, 342, 'P', b'0'),
	(43, 31, 2228, 'Localización de Vías', 243, NULL, 'T/P', b'0'),
	(44, 31, 2232, 'Fotogrametria y Fotointerpretación', 243, NULL, 'T/P', b'0'),
	(45, 31, 2238, 'Cartografía Digital', 243, 343, 'T/P', b'0'),
	(46, 31, 2241, 'Levantamientos Especiales', 243, NULL, 'T/P', b'0'),
	(47, 31, 2245, 'Geodesia Posicional', 243, NULL, 'T/P', b'0'),
	(48, 31, 19601, 'Levantamientos Planimétricos', 343, NULL, 'T/P', b'0'),
	(49, 31, 19604, 'Levantamientos Altimétricos', 343, NULL, 'T/P', b'0'),
	(50, 31, 19605, 'Levantamientos Astronómicos', 343, NULL, 'T/P', b'0'),
	(51, 31, 19606, 'Topografía de Vías I', 343, NULL, 'T/P', b'0'),
	(52, 31, 19608, 'Levantamientos Especiales I', 343, NULL, 'T/P', b'0'),
	(53, 31, 19609, 'Topografía de Vías II', 343, NULL, 'T/P', b'0'),
	(54, 31, 19610, 'Obras Civiles I', 343, NULL, 'T/P', b'0'),
	(55, 31, 19611, 'Levantamientos Fotogramétricos', 343, NULL, 'T/P', b'0'),
	(56, 31, 19613, 'Topografía Ambiental', 343, NULL, 'T/P', b'0'),
	(57, 31, 19615, 'Levantamientos Geodésicos', 343, NULL, 'T/P', b'0'),
	(58, 31, 19612, 'Trabajo Comunitario', 343, NULL, 'T/P', b'0'),
	(59, 32, 2005, 'Planimetría', 241, 341, 'T/P', b'0'),
	(60, 32, 2007, 'Altimetria', 241, 341, 'T/P', b'0'),
	(61, 32, 2009, 'Geodesia Posicional', 241, NULL, 'T/P', b'0'),
	(62, 32, 2015, 'Geodesia Geométrica', 241, 341, 'T/P', b'0'),
	(63, 32, 2020, 'Diseño Geométrico de Vías', 241, 341, 'T/P', b'0'),
	(64, 32, 2024, 'Localización de Vías', 241, 341, 'T/P', b'0'),
	(65, 32, 2031, 'Mecánica de Suelos', 241, 341, 'T/P', b'0'),
	(66, 32, 2038, 'Evaluación Ambiental', 241, 341, 'T/P', b'0'),
	(67, 32, 2041, 'Levantamientos Especiales', 241, 341, 'T/P', b'0'),
	(68, 32, 2053, 'Ingeniería Ambiental', 241, 341, 'T/P', b'0'),
	(69, 81, 2312, 'Ecología', 244, 344, 'T/P', b'0'),
	(70, 81, 2319, 'Calidad del Agua', 244, 344, 'T/P', b'0'),
	(71, 81, 2323, 'Gestión Ambiental II', 344, NULL, 'T/P', b'0'),
	(72, 81, 2324, 'Manejo Integral de Residuos Líquidos', 244, 344, 'T/P', b'0'),
	(73, 81, 2325, 'Administración Municipal y Desarrollo Local', 244, 344, 'T/P', b'0'),
	(74, 81, 2327, 'Gestión Ambiental I', 344, NULL, 'T/P', b'0'),
	(75, 81, 2328, 'Manejo Integral de Cuencas Hidrográficas', 344, NULL, 'T/P', b'0'),
	(76, 81, 2331, 'Manejo Integral de Residuos Sólidos', 244, 344, 'T/P', b'0'),
	(77, 81, 2334, 'Operación de Plantas y Estaciones de Bombeo', 244, 344, 'T/P', b'0'),
	(78, 81, 2339, 'Servicio Publico de Acueducto y Alcantarillado', 244, 344, 'T/P', b'0'),
	(79, 81, 2341, 'Servicio Publico de Energía Eléctrica', 244, 344, 'T/P', b'0'),
	(80, 81, 2346, 'Gestión Comercial de los Servicios Públicos', 244, 344, 'T/P', b'0'),
	(81, 85, 2027, 'Fundamentos de Ecología', 246, NULL, 'T/P', b'0'),
	(82, 85, 2503, 'Introducción al Saneamiento Ambiental', 246, NULL, 'T/P', b'0'),
	(83, 85, 2506, 'Hidráulica', 246, NULL, 'T/P', b'0'),
	(84, 85, 2507, 'Topografía y Cartografía', 246, NULL, 'T/P', b'0'),
	(85, 85, 2509, 'Sociedad y Ambiente', 246, NULL, 'T/P', b'0'),
	(86, 85, 2519, 'Calidad del Agua', 246, NULL, 'T/P', b'0'),
	(87, 85, 2520, 'Zoonosis', 246, NULL, 'T/P', b'0'),
	(88, 85, 2524, 'Fundamentos de Acueductos y Alcantarillados', 246, NULL, 'T/P', b'0'),
	(89, 85, 2525, 'Tratamiento de Agua para Consumo', 246, NULL, 'T/P', b'0'),
	(90, 85, 2526, 'Manejo Residuos Líquidos', 246, NULL, 'T/P', b'0'),
	(91, 85, 2528, 'Organización Comunitaria', 246, NULL, 'T/P', b'0'),
	(92, 85, 2532, 'Residuos Sólidos', 246, NULL, 'T/P', b'0'),
	(93, 85, 2539, 'Saneamiento Urbano y Rural', 246, NULL, 'T/P', b'0'),
	(94, 85, 2540, 'Salud Ocupacional y Seguridad Industrial', 246, NULL, 'T/P', b'0'),
	(95, 85, 2543, 'Salida Integral de Saneamiento', 246, NULL, 'T/P', b'0'),
	(96, 180, 2027, 'Fundamentos de Ecología', 247, NULL, 'T/P', b'0'),
	(97, 180, 2703, 'Introducción a la Ingeniería Ambiental', 247, 347, 'T/P', b'0'),
	(98, 180, 2716, 'Geología y Geomorfología', 247, 347, 'T/P', b'0'),
	(99, 180, 2720, 'Suelos', 247, 347, 'T/P', b'0'),
	(100, 180, 2724, 'Química Ambiental Aplicada', 247, NULL, 'T/P', b'0'),
	(101, 180, 2726, 'Hidrología', 247, 347, 'T/P', b'0'),
	(102, 180, 2727, 'Ecología Analítica', 247, 347, 'T/P', b'0'),
	(103, 180, 2728, 'Contaminación Ambiental I', 247, 347, 'T/P', b'0'),
	(104, 180, 2730, 'Físico Química de Fluidos ', 247, 347, 'T/P', b'0'),
	(105, 180, 2733, 'Ordenamiento Territorial Rural', 247, 347, 'T/P', b'0'),
	(106, 180, 2734, 'Contaminación Ambiental II', 247, 347, 'T/P', b'0'),
	(107, 180, 2735, 'Tecnologías Apropiadas I', 247, 347, 'T/P', b'0'),
	(108, 180, 2736, 'Hidrogeología', 247, 347, 'T/P', b'0'),
	(109, 180, 2739, 'Tecnologías Apropiadas II', 247, 347, 'T/P', b'0'),
	(110, 180, 2742, 'Evaluación Ambiental I', 247, 347, 'T/P', b'0'),
	(111, 180, 2743, 'Manejo Técnico Ambiental', 247, 347, 'T/P', b'0'),
	(112, 180, 2746, 'Evaluación Ambiental II', 347, NULL, 'T/P', b'0'),
	(113, 181, 2027, 'Fundamentos de Ecología', 249, 349, 'T/P', b'0'),
	(114, 181, 2509, 'Sociedad y Ambiente', 249, 349, 'T/P', b'0'),
	(115, 181, 2528, 'Organización Comunitaria', 249, 349, 'T/P', b'0'),
	(116, 181, 2531, 'Emisiones Atmosféricas', 249, 349, 'T/P', b'0'),
	(117, 181, 2532, 'Residuos Sólidos', 249, 349, 'T/P', b'0'),
	(118, 181, 11802, 'Ecología Humana', 249, 349, 'T/P', b'0'),
	(119, 181, 11804, 'Zoonosis y Epidemiología', 249, 349, 'T/P', b'0'),
	(120, 181, 11809, 'Química Sanitaria', 249, 349, 'T/P', b'0'),
	(121, 181, 11810, 'Acueductos', 249, 349, 'T/P', b'0'),
	(122, 181, 11811, 'Procesos Unitarios I', 249, 349, 'T/P', b'0'),
	(123, 181, 11812, 'Calidad del Aire', 249, 349, 'T/P', b'0'),
	(124, 181, 11814, 'Tratamiento y Disposición de Residuos Sólidos', 249, 349, 'T/P', b'0'),
	(125, 181, 11817, 'Plantas de Agua Potable', 249, 349, 'T/P', b'0'),
	(126, 181, 11820, 'Plantas de Agua Residual', 249, 349, 'T/P', b'0'),
	(127, 181, 11821, 'Salida Integral de Ingeniería Sanitaria', 249, 349, 'T/P', b'0'),
	(128, 185, 2418, 'Problemas y Alternativas Ambientales', 245, 345, 'T/P', b'0'),
	(129, 185, 2429, 'Factores de Riesgo Ambiental en Salud Pública', 245, 345, 'T/P', b'0'),
	(130, 185, 2434, 'Vulnerabilidad y Riesgos', 245, 345, 'T/P', b'0'),
	(131, 185, 2439, 'Planificación Ambiental Territorial', 245, NULL, 'T/P', b'0'),
	(132, 185, 2443, 'Administración de Recursos Naturales', 245, 345, 'T/P', b'0'),
	(133, 185, 19101, 'Planificación Ambiental Territorial', 345, NULL, 'T/P', b'0'),
	(134, 185, 19101, 'Planificación ambiental territorial ', 345, NULL, 'Teórico-Práctica', b'0'),
	(135, 185, 2434, 'Vulnerabilidad y riesgos ', 345, 245, 'Teórico-Práctica', b'0'),
	(136, 185, 2403, 'Introducción a la administración ambiental', 345, 245, 'Teórico-Práctica', b'0'),
	(137, 185, 2413, 'Organización comunitaria', 345, 245, 'Teórico-Práctica', b'0'),
	(999, 999, 0, 'N/A', 0, 0, 'N/A', b'0');
/*!40000 ALTER TABLE `espacio_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `abrev` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.estado: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
REPLACE INTO `estado` (`id`, `estado`, `abrev`) VALUES
	(1, 'Activo', 'Act.'),
	(2, 'Inactivo', 'Inact.'),
	(3, 'Aprobado', 'Aprob.'),
	(4, 'Desaprobado', 'Desap.'),
	(5, 'Pendiente', 'Pend.'),
	(6, 'Realizada', 'Hecho');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.estudiantes_solicitud_practica
CREATE TABLE IF NOT EXISTS `estudiantes_solicitud_practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_identificacion` int(11) NOT NULL DEFAULT '0',
  `num_identificacion` bigint(20) NOT NULL,
  `cod_estudiantil` bigint(20) NOT NULL,
  `id_solicitud_practica` int(11) NOT NULL DEFAULT '0',
  `nombres` varchar(50) NOT NULL DEFAULT '0',
  `apellidos` varchar(50) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date NOT NULL,
  `eps` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `aprob_terminos_condiciones` bit(1) DEFAULT b'0',
  `verificacion_asistencia` bit(1) DEFAULT b'0',
  `permiso_padres` blob,
  `seguro_estudiantil` blob,
  `documento_adicional_1` blob,
  `documento_adicional_2` blob,
  PRIMARY KEY (`id`),
  KEY `fk_estudiantes_solicitud_practica_tipo_identificacion_idx` (`id_tipo_identificacion`),
  KEY `fk_estudiantes_solicitud_practica_solicitud_practica_idx` (`id_solicitud_practica`),
  CONSTRAINT `fk_estudiantes_solicitud_practica_solicitud_practica` FOREIGN KEY (`id_solicitud_practica`) REFERENCES `solicitud_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiantes_solicitud_practica_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.estudiantes_solicitud_practica: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiantes_solicitud_practica` DISABLE KEYS */;
REPLACE INTO `estudiantes_solicitud_practica` (`id`, `id_tipo_identificacion`, `num_identificacion`, `cod_estudiantil`, `id_solicitud_practica`, `nombres`, `apellidos`, `fecha_nacimiento`, `eps`, `email`, `aprob_terminos_condiciones`, `verificacion_asistencia`, `permiso_padres`, `seguro_estudiantil`, `documento_adicional_1`, `documento_adicional_2`) VALUES
	(1, 1, 78532158, 8954, 1, 'Camila', 'Suarez', '1988-03-23', 'Sanitas', 'csuarez@gmail.com', b'0', b'0', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `estudiantes_solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.materiales_herramientas_proyeccion
CREATE TABLE IF NOT EXISTS `materiales_herramientas_proyeccion` (
  `id` int(11) NOT NULL,
  `det_materiales_rp` varchar(50) DEFAULT NULL,
  `det_materiales_ra` varchar(50) DEFAULT NULL,
  `det_herramientas_rp` varchar(50) DEFAULT NULL,
  `det_herramientas_ra` varchar(50) DEFAULT NULL,
  `det_equipos_rp` varchar(50) DEFAULT NULL,
  `det_equipos_ra` varchar(50) DEFAULT NULL,
  KEY `fk_materiales_herramientas_proyeccion_preliminar_idx` (`id`),
  CONSTRAINT `fk_materiales_herramientas_proyeccion_preliminar` FOREIGN KEY (`id`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.materiales_herramientas_proyeccion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `materiales_herramientas_proyeccion` DISABLE KEYS */;
REPLACE INTO `materiales_herramientas_proyeccion` (`id`, `det_materiales_rp`, `det_materiales_ra`, `det_herramientas_rp`, `det_herramientas_ra`, `det_equipos_rp`, `det_equipos_ra`) VALUES
	(1, 'prueba', 'prueba', NULL, NULL, NULL, NULL),
	(2, 'prueba2', 'prueba2', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `materiales_herramientas_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampoud.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampoud.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.periodo_academico
CREATE TABLE IF NOT EXISTS `periodo_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_academico` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.periodo_academico: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `periodo_academico` DISABLE KEYS */;
REPLACE INTO `periodo_academico` (`id`, `periodo_academico`) VALUES
	(1, 'I'),
	(2, 'II'),
	(3, 'III');
/*!40000 ALTER TABLE `periodo_academico` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.programa_academico
CREATE TABLE IF NOT EXISTS `programa_academico` (
  `id` int(11) NOT NULL,
  `programa_academico` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.programa_academico: ~10 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampoud.proyeccion_preliminar
CREATE TABLE IF NOT EXISTS `proyeccion_preliminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL DEFAULT '0',
  `id_programa_academico` int(11) DEFAULT NULL,
  `id_espacio_academico` int(11) DEFAULT NULL,
  `id_peridodo_academico` int(11) DEFAULT NULL,
  `id_semestre_asignatura` int(11) DEFAULT NULL,
  `id_docente_responsable` bigint(20) DEFAULT NULL,
  `num_estudiantes_aprox` int(11) DEFAULT NULL,
  `cantidad_grupos` int(11) DEFAULT NULL,
  `grupo_1` int(11) DEFAULT NULL,
  `grupo_2` int(11) DEFAULT NULL,
  `grupo_3` int(11) DEFAULT NULL,
  `grupo_4` int(11) DEFAULT NULL,
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
  `fecha_salida_aprox_ra` date DEFAULT NULL,
  `fecha_regreso_aprox_rp` date DEFAULT NULL,
  `fecha_regreso_aprox_ra` date DEFAULT NULL,
  `duracion_num_dias_ra` int(11) DEFAULT NULL,
  `duracion_num_dias_rp` int(11) DEFAULT NULL,
  `confirm_creador` bit(1) DEFAULT NULL,
  `id_creador_confirm` bigint(20) DEFAULT NULL,
  `confirm_docente` bit(1) DEFAULT NULL,
  `id_docente_confirm` bigint(20) DEFAULT NULL,
  `confirm_coord` bit(1) DEFAULT NULL,
  `id_coordinador_confirm` bigint(20) DEFAULT NULL,
  `confirm_electiva_coord` bit(1) DEFAULT NULL,
  `id_coordinador_electiva_confirm` bigint(20) DEFAULT NULL,
  `confirm_asistD` bit(1) DEFAULT NULL,
  `id_asistD_confirm` bigint(20) DEFAULT NULL,
  `conf_curricul_plan_pract_rp` bit(1) DEFAULT NULL,
  `conf_curricul_plan_pract_ra` bit(1) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.proyeccion_preliminar: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proyeccion_preliminar` DISABLE KEYS */;
REPLACE INTO `proyeccion_preliminar` (`id`, `id_estado`, `id_programa_academico`, `id_espacio_academico`, `id_peridodo_academico`, `id_semestre_asignatura`, `id_docente_responsable`, `num_estudiantes_aprox`, `cantidad_grupos`, `grupo_1`, `grupo_2`, `grupo_3`, `grupo_4`, `ruta_principal`, `destino_rp`, `ruta_alterna`, `destino_ra`, `det_recorrido_interno_rp`, `det_recorrido_interno_ra`, `lugar_salida_rp`, `lugar_salida_ra`, `lugar_regreso_rp`, `lugar_regreso_ra`, `fecha_salida_aprox_rp`, `fecha_salida_aprox_ra`, `fecha_regreso_aprox_rp`, `fecha_regreso_aprox_ra`, `duracion_num_dias_ra`, `duracion_num_dias_rp`, `confirm_creador`, `id_creador_confirm`, `confirm_docente`, `id_docente_confirm`, `confirm_coord`, `id_coordinador_confirm`, `confirm_electiva_coord`, `id_coordinador_electiva_confirm`, `confirm_asistD`, `id_asistD_confirm`, `conf_curricul_plan_pract_rp`, `conf_curricul_plan_pract_ra`, `observ_coordinador`, `observ_decano`, `aprobacion_coordinador`, `id_coordinador_aprob`, `aprobacion_decano`, `id_decano_aprob`, `aprobacion_asistD`, `id_asistD_aprob`, `aprobacion_consejo_facultad`, `cod_presup_tesoreria`, `id_asistD_aprob_consejo`, `fecha_diligenciamiento`, `created_at`, `updated_at`) VALUES
	(1, 1, 10, 6, 3, 10, 79418769, 35, 1, 302, NULL, NULL, NULL, _binary 0x707275656261, 'prueba', _binary 0x707275656261, 'prueba', _binary 0x7072756562612070727565626120707275656261207072756562617072756562617072756562617072756562612070727565626120707275656261207072756562612070727565626120707275656261207072756562612070727565626120707275656261207072756562612070727565626120707275656261, _binary 0x707275656261207072756562612070727565626120707275656261207072756562612070727565626120707275656261207072756562612070727565626120707275656261, _binary 0x707275656261, _binary 0x707275656261, _binary 0x707275656261, _binary 0x707275656261, '2020-07-16', '2020-07-16', '2020-07-19', '2020-07-18', 3, 4, b'1', 79418769, b'1', 79418769, b'1', 52527490, b'0', NULL, b'1', 659863256, b'1', b'1', NULL, NULL, 3, 52527490, 3, NULL, 3, 659863256, 3, NULL, 659863256, '2020-07-16', '2020-07-16 20:17:52', '2020-07-28 23:29:43'),
	(2, 1, 10, 6, 3, 10, 79418769, 1, 1, 5, NULL, NULL, NULL, _binary 0x64666768, 'gfhd', _binary 0x66646768, 'dfgh', _binary 0x66646768, _binary 0x64666768, _binary 0x64666768, _binary 0x66646768, _binary 0x66646768, _binary 0x66646768, '2020-07-23', '2020-07-23', '2020-07-26', '2020-07-28', 6, 4, b'1', 79418769, b'1', 79418769, b'1', 52527490, NULL, NULL, b'1', 659863256, b'1', b'1', NULL, NULL, 3, 52527490, 3, NULL, 3, 659863256, 3, NULL, 659863256, '2020-07-23', '2020-07-23 15:33:54', '2020-09-03 00:14:31');
/*!40000 ALTER TABLE `proyeccion_preliminar` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.riesgos_amenazas_practica
CREATE TABLE IF NOT EXISTS `riesgos_amenazas_practica` (
  `id` int(11) NOT NULL,
  `areas_acuaticas_rp` bit(1) NOT NULL DEFAULT b'0',
  `areas_acuaticas_ra` bit(1) NOT NULL DEFAULT b'0',
  `alturas_rp` bit(1) NOT NULL DEFAULT b'0',
  `alturas_ra` bit(1) NOT NULL DEFAULT b'0',
  `riesgo_biologico_rp` bit(1) NOT NULL DEFAULT b'0',
  `riesgo_biologico_ra` bit(1) NOT NULL DEFAULT b'0',
  `espacios_confinados_rp` bit(1) NOT NULL DEFAULT b'0',
  `espacios_confinados_ra` bit(1) NOT NULL DEFAULT b'0',
  `plan_contingencia_rp` json DEFAULT NULL,
  `plan_contingencia_ra` json DEFAULT NULL,
  KEY `fk_riesgos_amenazas_proyeccion_preliminar_idx` (`id`),
  CONSTRAINT `fk_riesgos_amenazas_proyeccion_preliminar` FOREIGN KEY (`id`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.riesgos_amenazas_practica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `riesgos_amenazas_practica` DISABLE KEYS */;
REPLACE INTO `riesgos_amenazas_practica` (`id`, `areas_acuaticas_rp`, `areas_acuaticas_ra`, `alturas_rp`, `alturas_ra`, `riesgo_biologico_rp`, `riesgo_biologico_ra`, `espacios_confinados_rp`, `espacios_confinados_ra`, `plan_contingencia_rp`, `plan_contingencia_ra`) VALUES
	(1, b'0', b'1', b'0', b'1', b'0', b'1', b'0', b'1', NULL, NULL),
	(2, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', NULL, NULL);
/*!40000 ALTER TABLE `riesgos_amenazas_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla practicampoud.roles: ~7 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampoud.semestre_asignatura
CREATE TABLE IF NOT EXISTS `semestre_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semestre_asignatura` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.semestre_asignatura: ~10 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampoud.solicitud_practica
CREATE TABLE IF NOT EXISTS `solicitud_practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyeccion_preliminar` int(11) DEFAULT NULL,
  `id_estado_solicitud_practica` int(11) DEFAULT NULL,
  `tipo_ruta` int(11) DEFAULT '1',
  `si_capital` bit(1) DEFAULT b'0',
  `tiene_resolucion` bit(1) DEFAULT b'0',
  `confirm_docente` bit(1) DEFAULT b'0',
  `id_docente_confirm` bigint(20) DEFAULT NULL,
  `confirm_coord` bit(1) DEFAULT b'0',
  `id_coordinador_confirm` bigint(20) DEFAULT NULL,
  `confirm_asistD` bit(1) DEFAULT b'0',
  `id_asistD_confirm` bigint(20) DEFAULT NULL,
  `aprobacion_coordinador` bit(1) DEFAULT b'0',
  `id_coordinador_aprob` bigint(20) DEFAULT NULL,
  `aprobacion_decano` bit(1) DEFAULT b'0',
  `id_decano_aprob` bigint(20) DEFAULT NULL,
  `aprobacion_asistD` bit(1) DEFAULT b'0',
  `id_asistD_aprob` bigint(20) DEFAULT NULL,
  `num_cdp` bigint(20) DEFAULT NULL,
  `fecha_resolucion` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_regreso` date DEFAULT NULL,
  `num_estudiantes` int(11) DEFAULT '0',
  `num_radicado_financiera` int(11) DEFAULT '0',
  `num_acompaniantes` int(11) DEFAULT '0',
  `lugar_salida` varchar(50) DEFAULT NULL,
  `lugar_regreso` varchar(50) DEFAULT NULL,
  `cronograma` blob,
  `observaciones` blob,
  `justificacion` blob,
  `objetivo_general` blob,
  `metodologia_evaluacion` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitud_practica_proyeccion_preliminar_idx` (`id_proyeccion_preliminar`),
  KEY `fk_solicitud_practica_estado_idx` (`id_estado_solicitud_practica`),
  CONSTRAINT `fk_solicitud_practica_estado` FOREIGN KEY (`id_estado_solicitud_practica`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_practica_proyeccion_preliminar` FOREIGN KEY (`id_proyeccion_preliminar`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.solicitud_practica: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_practica` DISABLE KEYS */;
REPLACE INTO `solicitud_practica` (`id`, `id_proyeccion_preliminar`, `id_estado_solicitud_practica`, `tipo_ruta`, `si_capital`, `tiene_resolucion`, `confirm_docente`, `id_docente_confirm`, `confirm_coord`, `id_coordinador_confirm`, `confirm_asistD`, `id_asistD_confirm`, `aprobacion_coordinador`, `id_coordinador_aprob`, `aprobacion_decano`, `id_decano_aprob`, `aprobacion_asistD`, `id_asistD_aprob`, `num_cdp`, `fecha_resolucion`, `fecha_salida`, `fecha_regreso`, `num_estudiantes`, `num_radicado_financiera`, `num_acompaniantes`, `lugar_salida`, `lugar_regreso`, `cronograma`, `observaciones`, `justificacion`, `objetivo_general`, `metodologia_evaluacion`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 3, b'1', b'1', b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, 852, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-28 23:29:44', '2020-07-28 23:29:44'),
	(2, 2, 5, 7, b'1', b'1', b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, b'0', NULL, 852, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, _binary 0x6767, _binary 0x6767, _binary 0x6767, _binary 0x6767, _binary 0x6767, '2020-07-29 21:38:57', '2020-08-05 18:38:33');
/*!40000 ALTER TABLE `solicitud_practica` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.solicitud_transporte
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

-- Volcando datos para la tabla practicampoud.solicitud_transporte: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud_transporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.tipo_certificacion
CREATE TABLE IF NOT EXISTS `tipo_certificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_certificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.tipo_certificacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_certificacion` DISABLE KEYS */;
REPLACE INTO `tipo_certificacion` (`id`, `tipo_certificacion`) VALUES
	(1, 'Constancia salida'),
	(2, 'Constancia asistencia');
/*!40000 ALTER TABLE `tipo_certificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.tipo_identificacion: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
REPLACE INTO `tipo_identificacion` (`id`, `tipo_identificacion`, `sigla`) VALUES
	(1, 'Cédula de Ciudadanía', 'C.C'),
	(2, 'Cédula de Extranjería', 'C.E'),
	(3, 'Pasaporte', 'PAS');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.tipo_transporte
CREATE TABLE IF NOT EXISTS `tipo_transporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_transporte` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.tipo_transporte: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_transporte` DISABLE KEYS */;
REPLACE INTO `tipo_transporte` (`id`, `tipo_transporte`) VALUES
	(1, 'Bus'),
	(2, 'Buseta'),
	(3, 'Camioneta'),
	(4, 'Otro');
/*!40000 ALTER TABLE `tipo_transporte` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.tipo_vinculacion
CREATE TABLE IF NOT EXISTS `tipo_vinculacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_vinculacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.tipo_vinculacion: ~7 rows (aproximadamente)
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

-- Volcando estructura para tabla practicampoud.tipo_zona_transitar
CREATE TABLE IF NOT EXISTS `tipo_zona_transitar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_zona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.tipo_zona_transitar: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_zona_transitar` DISABLE KEYS */;
REPLACE INTO `tipo_zona_transitar` (`id`, `tipo_zona`) VALUES
	(1, 'Rural'),
	(2, 'Urbana'),
	(3, 'Rural - Urbana');
/*!40000 ALTER TABLE `tipo_zona_transitar` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.transporte_proyeccion
CREATE TABLE IF NOT EXISTS `transporte_proyeccion` (
  `id` int(11) NOT NULL,
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
  KEY `fk_transporte_proyeccion_preliminar_idx` (`id`),
  KEY `fk_transporte_tipo_transporte_rp_idx` (`id_tipo_transporte_rp_1`),
  KEY `fk_transporte_tipo_transporte_ra_idx` (`id_tipo_transporte_ra_1`),
  CONSTRAINT `fk_transporte_proyeccion_preliminar` FOREIGN KEY (`id`) REFERENCES `proyeccion_preliminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transporte_tipo_transporte_ra` FOREIGN KEY (`id_tipo_transporte_ra_1`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transporte_tipo_transporte_rp` FOREIGN KEY (`id_tipo_transporte_rp_1`) REFERENCES `tipo_transporte` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla practicampoud.transporte_proyeccion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `transporte_proyeccion` DISABLE KEYS */;
REPLACE INTO `transporte_proyeccion` (`id`, `id_tipo_transporte_rp_1`, `id_tipo_transporte_rp_2`, `id_tipo_transporte_rp_3`, `id_tipo_transporte_ra_1`, `id_tipo_transporte_ra_2`, `id_tipo_transporte_ra_3`, `otro_tipo_transporte_rp_1`, `otro_tipo_transporte_rp_2`, `otro_tipo_transporte_rp_3`, `otro_tipo_transporte_ra_1`, `otro_tipo_transporte_ra_2`, `otro_tipo_transporte_ra_3`, `det_tipo_transporte_rp_1`, `det_tipo_transporte_rp_2`, `det_tipo_transporte_rp_3`, `det_tipo_transporte_ra_1`, `det_tipo_transporte_ra_2`, `det_tipo_transporte_ra_3`, `vlr_otro_tipo_transporte_rp_1`, `vlr_otro_tipo_transporte_rp_2`, `vlr_otro_tipo_transporte_rp_3`, `vlr_otro_tipo_transporte_ra_1`, `vlr_otro_tipo_transporte_ra_2`, `vlr_otro_tipo_transporte_ra_3`, `docen_respo_trasnporte_rp_1`, `docen_respo_trasnporte_rp_2`, `docen_respo_trasnporte_rp_3`, `docen_respo_trasnporte_ra_1`, `docen_respo_trasnporte_ra_2`, `docen_respo_trasnporte_ra_3`, `capac_transporte_rp_1`, `capac_transporte_rp_2`, `capac_transporte_rp_3`, `capac_transporte_ra_1`, `capac_transporte_ra_2`, `capac_transporte_ra_3`, `exclusiv_tiempo_rp_1`, `exclusiv_tiempo_rp_2`, `exclusiv_tiempo_rp_3`, `exclusiv_tiempo_ra_1`, `exclusiv_tiempo_ra_2`, `exclusiv_tiempo_ra_3`, `cant_transporte_rp`, `cant_transporte_ra`) VALUES
	(1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 'Cesar Augusto Garcia Valbuena', NULL, NULL, 'Cesar Augusto Garcia Valbuena', NULL, NULL, 38, NULL, NULL, 38, NULL, NULL, b'1', NULL, NULL, b'1', NULL, NULL, NULL, NULL),
	(2, 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 'Cesar Augusto Garcia Valbuena', NULL, NULL, 'Cesar Augusto Garcia Valbuena', NULL, NULL, 4, NULL, NULL, 8, NULL, NULL, b'1', NULL, NULL, b'1', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `transporte_proyeccion` ENABLE KEYS */;

-- Volcando estructura para tabla practicampoud.users
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

-- Volcando datos para la tabla practicampoud.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_role`, `id_tipo_identificacion`, `id_tipo_vinculacion`, `id_estado`, `id_espacio_academico_1`, `id_espacio_academico_2`, `id_espacio_academico_3`, `id_espacio_academico_4`, `id_espacio_academico_5`, `id_espacio_academico_6`, `id_programa_academico_coord`, `usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(30314801, 5, 1, 1, 1, 51, 9, 47, NULL, NULL, NULL, 999, 'emontesr', 'Emilia', NULL, 'Montes', 'Rojas', 3154269895, 7289645, 'lauritagiraldo.s@gmail.com.co', NULL, '$2y$10$JyWtQxOKKx9W2eWBn2yCduyRCcSU4W5YF6gErdNfeJ6B.Ti.Gl1S6', NULL, '2020-02-27 02:52:56', '2020-02-27 02:52:56'),
	(30569841, 4, 1, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, 81, 'jposadam', 'Jairo', NULL, 'Posada', 'Martinez', 3152695487, 3216956, 'jposadam@udistrital.edu.co', NULL, '$2y$10$ZNaeSKLtN/17lX6SVEmP2.TetVJQuvjBQTR93LLyat6B1VpuXOuI.', NULL, '2020-02-27 02:53:02', '2020-02-27 02:53:02'),
	(52527490, 4, 1, 1, 1, 58, 66, 51, 6, NULL, NULL, 10, 'npbonzap', 'Niria', 'Pastora', 'Bonza', 'Perez', 5711748, 5711748, 'npbonzap@udistrital.edu.co', NULL, '$2y$10$LXwvSEa5esmKWD52sV.dRukGlS6ZTiFEq0Oe/mqk122xJfjWsu3IO', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(63589653, 5, 1, 1, 2, 32, 51, NULL, NULL, NULL, NULL, 999, 'lsanin63', 'Lorena', NULL, 'Sanín', NULL, 3005236987, NULL, 'lsanin63@udistrital.edu.co', NULL, '$2y$10$TEuN2hTLIEpiJapMcr6weOnrGjKkDtS1CU6Vt0fA5W2EQ.OzyGEr2', NULL, '2020-05-04 02:31:21', '2020-05-04 02:31:21'),
	(79418769, 5, 1, 1, 1, 6, NULL, NULL, NULL, NULL, NULL, 10, 'cagarciav', 'Cesar', 'Augusto', 'Garcia', 'Valbuena', 5472365, 5472365, 'cagarciav@udistrital.edu.co', NULL, '$2y$10$rT54iBkqRKdycG78y8ypvO6u3L6uNST9kPkTZgqwn8pGA5dbdO93.', NULL, '2020-04-23 18:49:10', '2020-04-23 18:49:10'),
	(310698563, 2, 1, 3, 1, 10, NULL, NULL, NULL, NULL, NULL, 999, 'fussar', 'Freddy', NULL, 'Ussa', 'Rodriguez', 3156984569, 4523698, 'fussar@udistrital.edu.co', NULL, '$2y$10$r.oFd571jYk5PM4ycnfnr.OP1mV5HocwmN9z9Flt69qjeWnO6wRbi', NULL, '2020-02-16 23:44:20', '2020-02-16 23:44:20'),
	(659863256, 3, 1, 6, 1, 4, 999, NULL, NULL, NULL, NULL, 999, 'arojasc', 'Alejandro', NULL, 'Rojas', 'Castro', 32569874536, 5632121, 'arojasc@udistrital.edu.co', NULL, '$2y$10$zX5X9sIdU6OgWDABgq7G2uQKji/mGgZSIi0TfZpMzUn4zbKv2S1be', NULL, '2020-02-16 23:40:10', '2020-02-16 23:40:10'),
	(1038410523, 1, 1, 1, 1, 136, 132, 137, 131, NULL, NULL, 999, 'lvgiraldos', 'Laura', 'Vanessa', 'Giraldo', 'Salazar', 3107964434, 4125679, 'lvgiraldos@udistrital.edu.co', NULL, '$2y$10$V/4DkEVqMJNNXiHyUY42sOqTSRHtfhJAoOViAeoVxzbFwvj72ELg.', NULL, '2020-02-16 23:34:35', '2020-02-16 23:34:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
