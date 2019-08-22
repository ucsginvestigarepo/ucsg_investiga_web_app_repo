-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dboproyecto
CREATE DATABASE IF NOT EXISTS `dboproyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dboproyecto`;

-- Dumping structure for table dboproyecto.dbocarrera
CREATE TABLE IF NOT EXISTS `dbocarrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `idFacultad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idFacultad` (`idFacultad`),
  CONSTRAINT `dbocarrera_ibfk_1` FOREIGN KEY (`idFacultad`) REFERENCES `dbofacultad` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='Carreras asociadas a la facultad';

-- Dumping data for table dboproyecto.dbocarrera: ~59 rows (approximately)
/*!40000 ALTER TABLE `dbocarrera` DISABLE KEYS */;
INSERT INTO `dbocarrera` (`id`, `nombre`, `idFacultad`, `created_at`, `updated_at`) VALUES
	(1, 'AGROINDUSTRIA', 1, '2019-06-30 16:17:37', '2019-06-30 21:17:37'),
	(2, 'AGROPECUARIA', 1, NULL, NULL),
	(3, 'ELECTRICIDAD', 1, NULL, NULL),
	(4, 'ELECTRONICA Y AUTOMATIZACION', 1, NULL, NULL),
	(5, 'MEDICINA Y VETERINARIA', 1, NULL, NULL),
	(6, 'TELECOMUNICACIONES', 1, NULL, NULL),
	(7, 'INGENIERIA AGROPECUARIA', 1, NULL, NULL),
	(8, 'INGENIERIA AGROINDUSTRIAL', 1, NULL, NULL),
	(9, 'MEDICINA VETERINARIA Y ZOOTECNICA', 1, NULL, NULL),
	(10, 'INGENIERIA EN ELECTRICO-MECANICA', 1, NULL, NULL),
	(11, 'INGENIERIA EN TELECOMUNICACIONES', 1, NULL, NULL),
	(12, 'ELECTRONICA EN AUTOMATISMO', 1, NULL, NULL),
	(13, 'ARQUITECTURA', 2, NULL, NULL),
	(14, 'DISEÑO DE INTERIORES', 2, NULL, NULL),
	(15, 'DISEÑO GRAFICO', 2, NULL, NULL),
	(16, 'GESTIONGRAFICA PUBLICITARIA', 2, NULL, NULL),
	(17, 'ANIMACION DIGITAL', 3, NULL, NULL),
	(18, 'ARTES MUSICALES', 3, NULL, NULL),
	(19, 'CINE', 3, NULL, NULL),
	(20, 'PEDAGOCIA DE LOS IDIOMAS NACIONALES Y EXTRANJEROS - INGLES', 3, NULL, NULL),
	(21, 'ARTES AUDIOVISUALES', 3, NULL, NULL),
	(22, 'ARTES MULTIMEDIA', 3, NULL, NULL),
	(23, 'LENGUA INGLESA', 3, NULL, NULL),
	(24, 'MUSICA', 3, NULL, NULL),
	(25, 'ADMINISTRACION DE EMPRESAS', 4, NULL, NULL),
	(26, 'CONTABILIDAD Y AUDITORIA', 4, NULL, NULL),
	(27, 'ECONOMIA', 4, NULL, NULL),
	(28, 'NEGOCIOS INTERNACIONALES', 4, NULL, NULL),
	(29, 'CONTABILIDAD Y AUDITORIA, CPA', 4, NULL, NULL),
	(30, 'GESTION EMPRESARIAL INTERNACIONAL\r\n', 4, NULL, NULL),
	(31, 'ENFERMERIA', 5, NULL, NULL),
	(32, 'MEDICINA', 5, NULL, NULL),
	(33, 'NUTRICION, DIETÉTICA Y ESTÉTICA', 5, NULL, NULL),
	(34, 'ODONTOLOGIA', 5, NULL, NULL),
	(35, 'TERAPIA FISICA', 5, NULL, NULL),
	(36, 'FISIOTERAPIA', 5, NULL, NULL),
	(37, 'COMERCIO', 6, NULL, NULL),
	(38, 'COMERCIO EXTERIOR', 6, NULL, NULL),
	(39, 'EMPRENDIMIENTO DE INNOVACION SOCIAL', 6, NULL, NULL),
	(40, 'MERCADOTECNIA', 6, NULL, NULL),
	(41, 'TURISMO', 6, NULL, NULL),
	(42, 'ADMINISTRACION EN VENTAS', 6, NULL, NULL),
	(43, 'COMERCIO Y FINANZAS INTERNACIONALES', 6, NULL, NULL),
	(44, 'TURISTICAS Y HOTELERAS', 6, NULL, NULL),
	(45, 'MARKETING', 6, NULL, NULL),
	(46, 'EMPRENDIMIENTO', 6, NULL, NULL),
	(47, 'COMUNICACION', 7, NULL, NULL),
	(48, 'EDUCACION', 7, NULL, NULL),
	(49, 'PSICOLOGIA CLINICA', 7, NULL, NULL),
	(50, 'LITERATURA', 7, NULL, NULL),
	(51, 'COMUNICACION SOCIAL', 7, NULL, NULL),
	(52, 'PEDAGOGIA', 7, NULL, NULL),
	(53, 'PSICOLOGIA ORGANIZACIONAL', 7, NULL, NULL),
	(54, 'INGENIERIA CIVIL', 8, NULL, NULL),
	(55, 'COMPUTACION', 8, NULL, NULL),
	(56, 'INGENIERIA EN SISTEMAS COMPUTACIONALES', 8, NULL, NULL),
	(57, 'DERECHO', 9, NULL, NULL),
	(58, 'TRABAJO SOCIAL', 9, NULL, NULL),
	(59, 'TRABAJO SOCIAL Y DESARROLLO HUMANO', 9, NULL, NULL);
/*!40000 ALTER TABLE `dbocarrera` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbodetallecalificacion
CREATE TABLE IF NOT EXISTS `dbodetallecalificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTema` int(11) DEFAULT NULL,
  `idPropuesta` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTema` (`idTema`),
  KEY `idPropuesta` (`idPropuesta`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `dbodetallecalificacion_ibfk_1` FOREIGN KEY (`idTema`) REFERENCES `dbotemacalificacion` (`id`),
  CONSTRAINT `dbodetallecalificacion_ibfk_2` FOREIGN KEY (`idPropuesta`) REFERENCES `dbopropuesta` (`id`),
  CONSTRAINT `dbodetallecalificacion_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `dbousuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='Se detalla la calificacion de cada propuesta segun su tema ejemplo (titulo, objetivos etc) y puntaje';

-- Dumping data for table dboproyecto.dbodetallecalificacion: ~71 rows (approximately)
/*!40000 ALTER TABLE `dbodetallecalificacion` DISABLE KEYS */;
INSERT INTO `dbodetallecalificacion` (`id`, `idTema`, `idPropuesta`, `idUsuario`, `nota`, `created_at`, `updated_at`) VALUES
	(1, 10, 2, 44, 4, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(2, 11, 2, 44, 6, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(3, 12, 2, 44, 4, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(4, 13, 2, 44, 2, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(5, 14, 2, 44, 2, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(6, 15, 2, 44, 3, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(7, 16, 2, 44, 4, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(8, 17, 2, 44, 2, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(9, 18, 2, 44, 2, '2019-08-07 15:03:54', '2019-08-07 15:03:54'),
	(10, 10, 2, 46, 5, '2019-08-07 15:07:20', '2019-08-07 15:07:20'),
	(11, 11, 2, 46, 7, '2019-08-07 15:07:20', '2019-08-07 15:07:20'),
	(12, 12, 2, 46, 10, '2019-08-07 15:07:20', '2019-08-07 15:07:20'),
	(13, 13, 2, 46, 10, '2019-08-07 15:07:20', '2019-08-07 15:07:20'),
	(14, 14, 2, 46, 23, '2019-08-07 15:07:21', '2019-08-07 15:07:21'),
	(15, 15, 2, 46, 7, '2019-08-07 15:07:21', '2019-08-07 15:07:21'),
	(16, 16, 2, 46, 12, '2019-08-07 15:07:21', '2019-08-07 15:07:21'),
	(17, 17, 2, 46, 10, '2019-08-07 15:07:21', '2019-08-07 15:07:21'),
	(18, 18, 2, 46, 5, '2019-08-07 15:07:21', '2019-08-07 15:07:21'),
	(19, 10, 2, 56, 5, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(20, 11, 2, 56, 9, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(21, 12, 2, 56, 10, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(22, 13, 2, 56, 13, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(23, 14, 2, 56, 25, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(24, 15, 2, 56, 7, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(25, 16, 2, 56, 12, '2019-08-07 15:08:55', '2019-08-07 15:08:55'),
	(26, 17, 2, 56, 10, '2019-08-07 15:08:56', '2019-08-07 15:08:56'),
	(27, 18, 2, 56, 5, '2019-08-07 15:08:56', '2019-08-07 15:08:56'),
	(28, 10, 8, 42, 5, '2019-08-12 20:36:26', '2019-08-12 20:36:26'),
	(29, 11, 8, 42, 9, '2019-08-12 20:36:26', '2019-08-12 20:36:26'),
	(30, 12, 8, 42, 10, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(31, 13, 8, 42, 13, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(32, 14, 8, 42, 25, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(33, 15, 8, 42, 8, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(34, 16, 8, 42, 15, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(35, 17, 8, 42, 10, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(36, 18, 8, 42, 5, '2019-08-12 20:36:27', '2019-08-12 20:36:27'),
	(37, 10, 8, 46, 5, '2019-08-12 20:37:59', '2019-08-12 20:37:59'),
	(38, 11, 8, 46, 9, '2019-08-12 20:37:59', '2019-08-12 20:37:59'),
	(39, 12, 8, 46, 10, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(40, 13, 8, 46, 13, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(41, 14, 8, 46, 25, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(42, 15, 8, 46, 8, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(43, 16, 8, 46, 15, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(44, 17, 8, 46, 10, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(45, 18, 8, 46, 5, '2019-08-12 20:38:00', '2019-08-12 20:38:00'),
	(46, 10, 10, 39, 4, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(47, 11, 10, 39, 8, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(48, 12, 10, 39, 7, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(49, 13, 10, 39, 12, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(50, 14, 10, 39, 20, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(51, 15, 10, 39, 7, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(52, 16, 10, 39, 12, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(53, 17, 10, 39, 10, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(54, 18, 10, 39, 4, '2019-08-17 05:14:02', '2019-08-17 05:14:02'),
	(55, 10, 10, 55, 2, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(56, 11, 10, 55, 4, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(57, 12, 10, 55, 2, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(58, 13, 10, 55, 3, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(59, 14, 10, 55, 10, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(60, 15, 10, 55, 5, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(61, 16, 10, 55, 10, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(62, 17, 10, 55, 6, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(63, 18, 10, 55, 3, '2019-08-19 18:25:57', '2019-08-19 18:25:57'),
	(64, 10, 10, 43, 5, '2019-08-19 21:14:01', '2019-08-19 21:14:01'),
	(65, 11, 10, 43, 9, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(66, 12, 10, 43, 10, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(67, 13, 10, 43, 10, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(68, 14, 10, 43, 15, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(69, 15, 10, 43, 7, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(70, 16, 10, 43, 12, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(71, 17, 10, 43, 9, '2019-08-19 21:14:02', '2019-08-19 21:14:02'),
	(72, 18, 10, 43, 4, '2019-08-19 21:14:02', '2019-08-19 21:14:02');
/*!40000 ALTER TABLE `dbodetallecalificacion` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbodetallerevision
CREATE TABLE IF NOT EXISTS `dbodetallerevision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTema` int(11) DEFAULT NULL,
  `idPropuesta` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `revisado` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTema` (`idTema`),
  KEY `idPropuesta` (`idPropuesta`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `dbodetallerevision_ibfk_1` FOREIGN KEY (`idTema`) REFERENCES `dbotemacalificacion` (`id`),
  CONSTRAINT `dbodetallerevision_ibfk_2` FOREIGN KEY (`idPropuesta`) REFERENCES `dbopropuesta` (`id`),
  CONSTRAINT `dbodetallerevision_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `dbousuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8 COMMENT='Se registra todos los puntos chekeados de una propuesta por el gestor';

-- Dumping data for table dboproyecto.dbodetallerevision: ~36 rows (approximately)
/*!40000 ALTER TABLE `dbodetallerevision` DISABLE KEYS */;
INSERT INTO `dbodetallerevision` (`id`, `idTema`, `idPropuesta`, `idUsuario`, `revisado`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(2, 2, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(3, 3, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(4, 4, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(5, 5, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(6, 6, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(7, 7, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(8, 8, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(9, 9, 2, 37, 1, '2019-08-07 14:59:09', '2019-08-07 14:59:09'),
	(136, 1, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(137, 2, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(138, 3, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(139, 4, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(140, 5, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(141, 6, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(142, 7, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(143, 8, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(144, 9, 5, 34, 1, '2019-08-08 17:21:22', '2019-08-08 17:21:22'),
	(145, 1, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(146, 2, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(147, 3, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(148, 4, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(149, 5, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(150, 6, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(151, 7, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(152, 8, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(153, 9, 8, 41, 1, '2019-08-12 20:34:07', '2019-08-12 20:34:07'),
	(262, 1, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(263, 2, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(264, 3, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(265, 4, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(266, 5, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(267, 6, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(268, 7, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(269, 8, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53'),
	(270, 9, 10, 33, 1, '2019-08-17 03:09:53', '2019-08-17 03:09:53');
/*!40000 ALTER TABLE `dbodetallerevision` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbodominio
CREATE TABLE IF NOT EXISTS `dbodominio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Dominios para el registro de cada propuesta';

-- Dumping data for table dboproyecto.dbodominio: ~6 rows (approximately)
/*!40000 ALTER TABLE `dbodominio` DISABLE KEYS */;
INSERT INTO `dbodominio` (`id`, `nombre`, `created_at`, `updated_at`, `estado_id`) VALUES
	(1, 'HABITAT Y DISEÑO', '2019-06-20 19:45:47', '2019-06-21 00:45:47', 10),
	(2, 'TECNOLOGÍAS Y SISTEMAS PRODUCTIVOS', '2019-06-20 19:42:01', '2019-06-21 00:42:01', 10),
	(3, 'SALUD INTEGRAL Y BIOCONOCIMIENTO', '2019-06-20 19:42:02', '2019-06-21 00:42:02', 10),
	(4, 'EDUCACIÓN, COMUNICACIÓN, ARTE Y SUBJETIVIDAD', '2019-06-20 19:42:04', '2019-06-21 00:42:04', 10),
	(5, 'DINÁMICAS SOCIO-POLÍTICAS, INSTITUCIONES JURÍDICAS Y DEMOCRACIA', '2019-06-20 19:42:06', '2019-06-21 00:42:06', 10),
	(6, 'ECONOMÍA PARA EL DESARROLLO SOCIAL Y EMPRESARIAL', '2019-08-08 09:43:10', '2019-08-08 09:43:10', 10);
/*!40000 ALTER TABLE `dbodominio` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dboestado
CREATE TABLE IF NOT EXISTS `dboestado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Los estados que se manejan dentro del sistema';

-- Dumping data for table dboproyecto.dboestado: ~14 rows (approximately)
/*!40000 ALTER TABLE `dboestado` DISABLE KEYS */;
INSERT INTO `dboestado` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'NO ASIGNADO', '2019-06-08 17:25:50', '2019-06-08 22:25:50'),
	(2, 'INGRESADO', '2019-06-08 17:25:55', '2019-06-08 22:25:55'),
	(3, 'REVISADO', '2019-06-08 16:36:46', '2019-06-08 21:36:46'),
	(4, 'APROBADO', '2019-06-08 19:48:37', '2019-06-08 19:48:37'),
	(7, 'DESTACADO', '2019-06-08 23:03:43', '2019-06-08 23:03:43'),
	(8, 'REASIGNADO', '2019-06-08 23:03:51', '2019-06-08 23:03:51'),
	(9, 'RECHAZADO', '2019-07-13 15:07:50', '2019-07-13 15:07:50'),
	(10, 'ACTIVO', '2019-06-08 23:04:00', '2019-06-20 19:32:55'),
	(11, 'INACTIVO', '2019-06-08 23:04:00', '2019-06-20 19:32:55'),
	(12, 'ASIGNADO', '2019-06-08 23:04:00', '2019-06-23 16:26:42'),
	(13, 'CALIFICADO', NULL, NULL),
	(14, 'EN REVISION', NULL, NULL),
	(15, 'RECALIFICAR', NULL, NULL),
	(16, 'PRECALIFICADO', NULL, NULL);
/*!40000 ALTER TABLE `dboestado` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbofacultad
CREATE TABLE IF NOT EXISTS `dbofacultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Facultades de la universidad';

-- Dumping data for table dboproyecto.dbofacultad: ~9 rows (approximately)
/*!40000 ALTER TABLE `dbofacultad` DISABLE KEYS */;
INSERT INTO `dbofacultad` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'EDUCACION TECNICA PARA EL DESARROLLO', '2019-06-30 15:01:26', '2019-06-30 20:01:26'),
	(2, 'ARQUITECTURA Y DISEÑO', NULL, NULL),
	(3, 'ARTES Y HUMANIDADES', NULL, NULL),
	(4, 'CIENCIAS ECONOMICAS Y ADMINISTRATIVAS', NULL, NULL),
	(5, 'CIENCIAS MEDICAS', NULL, NULL),
	(6, 'ESPECIALIDADES EMPRESARIALES', '2019-06-30 15:01:55', '2019-06-30 20:01:55'),
	(7, 'FILOSOFIA, LETRAS Y CIENCIAS DE LA EDUCACION', NULL, NULL),
	(8, 'INGENIERIA', NULL, NULL),
	(9, 'JURISPRUDENCIA', NULL, NULL);
/*!40000 ALTER TABLE `dbofacultad` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbofase
CREATE TABLE IF NOT EXISTS `dbofase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fechadesde` date DEFAULT NULL,
  `fechahasta` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Cronograma de participacion';

-- Dumping data for table dboproyecto.dbofase: ~5 rows (approximately)
/*!40000 ALTER TABLE `dbofase` DISABLE KEYS */;
INSERT INTO `dbofase` (`id`, `nombre`, `fechadesde`, `fechahasta`, `created_at`, `updated_at`, `estado_id`) VALUES
	(3, 'LANZAMIENTO EN REDES SOCIALES', '2019-06-03', '2019-06-24', '2019-06-20 20:48:52', '2019-06-21 01:48:52', 10),
	(4, 'INICIO DEL CONCURSO', '2019-06-25', '2019-06-25', '2019-06-20 19:51:58', '2019-06-21 00:51:58', 10),
	(5, 'ENTREGA DE LOS TRABAJOS EN LA PAGINA WEB, POR PARTE DE LOS PROFESORES PARTICIPANTES', '2019-06-26', '2019-08-26', '2019-06-20 19:53:28', '2019-06-21 00:53:28', 10),
	(6, 'REVISIÓN Y CALIFICACIÓN DE LOS TRABAJOS', '2019-08-27', '2019-09-11', '2019-07-17 19:26:40', '2019-07-17 19:26:40', 10),
	(8, 'DECLARATORIA DE GANADORES', '2019-09-12', '2019-09-12', '2019-06-20 19:54:24', '2019-06-21 00:54:24', 10);
/*!40000 ALTER TABLE `dbofase` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbopropuesta
CREATE TABLE IF NOT EXISTS `dbopropuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepropuesta` varchar(255) DEFAULT NULL,
  `palabraclave` varchar(255) DEFAULT NULL,
  `descripciontema` text,
  `problema` varchar(255) DEFAULT NULL,
  `solucionproblema` text,
  `rutaarchivo` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `aceptatermino` int(11) DEFAULT NULL,
  `idFase` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idDominio` int(11) DEFAULT NULL,
  `gestor_id` int(11) DEFAULT NULL,
  `revisor_id` int(11) DEFAULT NULL,
  `revisor_id2` int(11) DEFAULT NULL,
  `revisor_id3` int(11) DEFAULT NULL,
  `motivorechazo` text,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idEstado` (`idEstado`),
  KEY `idFase` (`idFase`),
  KEY `idDominio` (`idDominio`),
  CONSTRAINT `dbopropuesta_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `dbousuario` (`id`),
  CONSTRAINT `dbopropuesta_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `dboestado` (`id`),
  CONSTRAINT `dbopropuesta_ibfk_3` FOREIGN KEY (`idFase`) REFERENCES `dbofase` (`id`),
  CONSTRAINT `dbopropuesta_ibfk_4` FOREIGN KEY (`idDominio`) REFERENCES `dbodominio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Propuesta de cada usuario que sube al sistema para su posterior revision';

-- Dumping data for table dboproyecto.dbopropuesta: ~9 rows (approximately)
/*!40000 ALTER TABLE `dbopropuesta` DISABLE KEYS */;
INSERT INTO `dbopropuesta` (`id`, `nombrepropuesta`, `palabraclave`, `descripciontema`, `problema`, `solucionproblema`, `rutaarchivo`, `idUsuario`, `idEstado`, `aceptatermino`, `idFase`, `created_at`, `updated_at`, `idDominio`, `gestor_id`, `revisor_id`, `revisor_id2`, `revisor_id3`, `motivorechazo`) VALUES
	(1, 'PROPUESTA DE NUEVAS MEDICINAS CASERAS', 'MEDICINA, CASERA', 'INVESTIGACIóN CIENTíFICA DE USO DE MEDICINAS CASERAS EN EL AñO 2019', 'PROBLEMAS DE SALUD', 'MUCHAS SOLUCIONES AL RESPECTO', 'historia-compuesta.pdf', 31, 9, 0, 3, '2019-08-07 14:35:06', '2019-08-07 14:35:06', 3, 34, 43, 45, 45, 'TITULO: Lo mas conciso posible y debe sintetizar la idea principal.\r\nRESUMEN: Entre 250 y 300 palabras.\r\nPALABRAS CLAVES: Entre 3 a 5 palabras claves.\r\nDESARROLLO Y RESULTADOS: Debe de describir de forma clara y concisa el desarrollo de investigación y los métodos aplicados.\r\nTABLAS Y FIGURAS: Deberían enumerarse y seguir el formato APA.'),
	(2, 'ESTRATEGIAS PARA CONSTRUCCIóN DE CASAS EN EL SECTOR SUROESTE DE GUAYAQUIL', 'MATERIALES, CONSTRUCCIóN', 'ANáLISIS DE LOS MEJORES MATERIALES POSIBLES, PARA LA CONSTRUCCIóN', 'FALTA DE UN ANáLISIS PARA LA SELECCIóN DE LOS MATERIALES DE CONSTRUCCIóN', 'ANáLISIS PARA LA MEJOR SELECCIóN DE MATERIALES PARA LA CONSTRUCCIóN', '32_157-715-1-PB.pdf', 32, 13, 1, 5, '2019-08-07 15:08:56', '2019-08-07 15:08:56', 1, 37, 44, 46, 56, NULL),
	(3, 'ANáLISIS DE LA COMUNICACIóN ORGANIZACIONAL', 'COMUNICACIóN, ORGANIZACIóN, EMPRESAS', 'COMUNICACIóN ORGANIZACIONAL INTERNA Y SU INCIDENCIA EN EL DESARROLLO DE LAS EMPRESAS DE GUAYAQUIL.', 'VARIOS', 'MUCHAS', '40_historia-compuesta.pdf', 40, 9, 1, 5, '2019-08-17 02:34:01', '2019-08-17 02:34:01', 4, 47, 39, 43, 46, 'TITULO: Lo mas conciso posible y debe sintetizar la idea principal.\r\nNota: no especifica idea principal.\r\nPALABRAS CLAVES: Entre 3 a 5 palabras claves.\r\nNota: Solo habían 2 palabras clave.\r\nINTRODUCCIÓN: Debe incluir la importancia del tema, antecedentes conceptuales e históricos, el problema y los objetivos.\r\nNota: No incluye antecedentes históricos.'),
	(5, 'ANALISIS DE MEDICINAS VERDES', 'ANALISIS, COMPUESTOS QUIMICOS, MEDICINAS VERDES, LABORATORIO', 'ANáLISIS DE COMPUESTOS QUíMICOS DE LAS MEDICINAS VERDES PARA LABORATORIO SAN LUCAS', 'VARIOS', 'BASTANTES', '49_historia-compuesta.pdf', 49, 3, 1, 5, '2019-08-08 17:21:22', '2019-08-08 17:21:22', 3, 34, 45, 56, 57, NULL),
	(6, 'LALALA', 'BASTANTES', 'LALALALALALA', 'MUCHAS', 'VARIAS', '36_historia-compuesta.pdf', 36, 9, 1, 5, '2019-08-08 17:48:10', '2019-08-08 17:48:10', 3, 33, 38, 42, 43, 'FORMATO: Times New Roman tamaño 12. Interlineado de 1.5. Margenes de 2.5. Extension de 9000 a 12000 palabras. A4, Word y PDF.\r\nTITULO: Lo mas conciso posible y debe sintetizar la idea principal.'),
	(7, 'MI PROPUESTA HOY', 'NUEVA,OTRA', 'PROPUESTA NUEVA', 'PROBLEMA HOY', 'PROBLEMA HOY', '51_historia-compuesta.pdf', 51, 9, 1, 5, '2019-08-12 20:27:00', '2019-08-12 20:27:00', 1, 34, 43, 56, 56, 'FORMATO: Times New Roman tamaño 12. Interlineado de 1.5. Margenes de 2.5. Extension de 9000 a 12000 palabras. A4, Word y PDF.\r\nNota tjutgut\r\nTITULO: Lo mas conciso posible y debe sintetizar la idea principal.\r\nNota'),
	(8, 'GANADORES', 'GANADORES', 'GANADORES', 'GANADORES', 'GANADORES', '53_historia-compuesta.pdf', 53, 13, 1, 5, '2019-08-12 20:38:00', '2019-08-12 20:38:00', 4, 41, 42, 46, 56, NULL),
	(9, 'TéCNICAS DE ENSEñANZA A NIñOS CON PROBLEMAS DE CAPACIDAD LIMITADA', 'APRENDIZAJE, CAPACIDADES IMITADAS, CAPACIDAD INTELECTUAL, CAPTACIóN Y APRENDIZAJE', 'METODOLOGíA  DEN ENSEñANZA A NIñOS CON CAPACIDADES LIMITADAS, PARA AUMENTAR LA CAPACIDAD INTELECTUAL, DE CAPTACIóN Y DE APRENDIZAJE.', 'VARIOS', 'MUCHOS', '35_historia-compuesta.pdf', 35, 12, 1, 5, '2019-08-16 23:11:32', '2019-08-16 23:11:32', 4, 47, 43, 38, 57, NULL),
	(10, 'PLAN ECONóMICO SOCIO VIVIENDA', 'VICIENDAS', 'VIVIENDAS PARA TODOS', 'MUCHOS', 'VARIAS', '59_historia-compuesta.pdf', 59, 13, 1, 5, '2019-08-19 21:14:02', '2019-08-19 21:14:02', 6, 33, 39, 55, 43, NULL);
/*!40000 ALTER TABLE `dbopropuesta` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dborol
CREATE TABLE IF NOT EXISTS `dborol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Roles de usuarios';

-- Dumping data for table dboproyecto.dborol: ~5 rows (approximately)
/*!40000 ALTER TABLE `dborol` DISABLE KEYS */;
INSERT INTO `dborol` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRADOR', '2019-06-08 21:32:18', '2019-06-09 02:32:18'),
	(2, 'REVISOR', '2019-06-09 02:32:44', '2019-06-09 02:32:44'),
	(3, 'GESTOR', '2019-06-09 02:32:56', '2019-06-09 02:32:56'),
	(5, 'PROFESOR', '2019-06-09 02:33:43', '2019-06-09 02:33:43'),
	(6, 'USUARIO WEB', '2019-06-09 02:33:43', '2019-06-23 10:58:35');
/*!40000 ALTER TABLE `dborol` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbotemacalificacion
CREATE TABLE IF NOT EXISTS `dbotemacalificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Tabla maestra de los temas a calificar por gestores y revisores, esta tabla no tiene mantenimiento se maneja internamente';

-- Dumping data for table dboproyecto.dbotemacalificacion: ~18 rows (approximately)
/*!40000 ALTER TABLE `dbotemacalificacion` DISABLE KEYS */;
INSERT INTO `dbotemacalificacion` (`id`, `nombre`, `descripcion`, `tipo`, `nota`) VALUES
	(1, 'FORMATO', 'Times New Roman tamaño 12. Interlineado de 1.5. Margenes de 2.5. Extension de 9000 a 12000 palabras. A4, Word y PDF', 'GESTOR', 0),
	(2, 'TITULO', 'Lo mas conciso posible y debe sintetizar la idea principal', 'GESTOR', 0),
	(3, 'RESUMEN', 'Entre 250 y 300 palabras', 'GESTOR', 0),
	(4, 'PALABRAS CLAVES', 'Entre 3 a 5 palabras claves', 'GESTOR', 0),
	(5, 'INTRODUCCION', 'Debe incluir la importancia del tema, antecendentes conceptuales e hitoricos, el problema y los objetivos', 'GESTOR', 0),
	(6, 'DESARROLLO Y RESULTADOS', 'Debe de describir de forma clara y concisa el desarrollo de investigacion y los metodos aplicados', 'GESTOR', 0),
	(7, 'CONCLUSIONES Y RECOMENDACIONES', 'Debe estar relacionada con la hipotesis o preguntas de investigacion planteadas', 'GESTOR', 0),
	(8, 'REFERENCIAS BIBLIOGRAFICAS', 'Debe seguir la norma APA', 'GESTOR', 0),
	(9, 'TABLAS Y FIGURAS', 'Deberian enumerarse y seguir el formato APA', 'GESTOR', 0),
	(10, 'RESUMEN-PALABRAS CLAVES', 'El resumen debe ser entre 250 y 300 palabras y las palabras claves deben ser entre 3 a 5 palabras que describan el trabajo', 'REVISOR', 5),
	(11, 'INTRODUCCION (JUSTIFICACION)', 'Debe incluir la importancia del tema, antecendentes conceptuales e históricos', 'REVISOR', 9),
	(12, 'PROBLEMA DE INVESTIGACION', 'El problema debe ser válido y en concordancia a la actualidad', 'REVISOR', 10),
	(13, 'OBJETIVOS (GENERAL Y ESPECIFICOS)', 'Debe describir lo que se alcanzara y realizara en el proyecto', 'REVISOR', 13),
	(14, 'METODOLOGIA', 'Segun los metodos de investigacion aplicarse como inductivo, deductivo, etc', 'REVISOR', 25),
	(15, 'HIPOTESIS O PREGUNTAS DE INVESTIGACION', 'Validar segun la solucion y problema que se detalla en la investigación', 'REVISOR', 8),
	(16, 'RESULTADOS Y DISCUSION', 'Se tomara en consideración los resultados del proyecto y solución al problema', 'REVISOR', 15),
	(17, 'CONCLUSIONES Y RECOMENDACIONES', 'Debe estar relacionada con la hipotesis o preguntas de investigacion planteadas', 'REVISOR', 10),
	(18, 'REFERENCIAS BIBLIOGRAFICAS', 'Deben seguir las normas APA', 'REVISOR', 5);
/*!40000 ALTER TABLE `dbotemacalificacion` ENABLE KEYS */;

-- Dumping structure for table dboproyecto.dbousuario
CREATE TABLE IF NOT EXISTS `dbousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `grado` varchar(255) DEFAULT NULL,
  `idFacultad` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `rutaarchivo` varchar(255) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `integra` varchar(255) DEFAULT NULL,
  `certificado` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idRol` (`idRol`),
  KEY `idFacultad` (`idFacultad`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idEstado` (`idEstado`),
  CONSTRAINT `dbousuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `dborol` (`id`),
  CONSTRAINT `dbousuario_ibfk_3` FOREIGN KEY (`idCarrera`) REFERENCES `dbocarrera` (`id`),
  CONSTRAINT `dbousuario_ibfk_4` FOREIGN KEY (`idEstado`) REFERENCES `dboestado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COMMENT='Usuarios dentro del sistema, clasificados por roles.';

-- Dumping data for table dboproyecto.dbousuario: ~30 rows (approximately)
/*!40000 ALTER TABLE `dbousuario` DISABLE KEYS */;
INSERT INTO `dbousuario` (`id`, `cedula`, `name`, `direccion`, `email`, `telefono`, `password`, `grado`, `idFacultad`, `idCarrera`, `idEstado`, `idRol`, `created_at`, `updated_at`, `remember_token`, `email_verified_at`, `rutaarchivo`, `celular`, `integra`, `certificado`) VALUES
	(15, '0914691854', 'Administrador de Sitio', 'UNIVERSIDAD CATOLICA', 'admin@ucsg-investiga.com', '043873960', '$2y$10$UjNbpPTHm/jhP1LouzDBCuJ3xWtA.kB/JCzxItd6bpo.9/uLD9Wr2', 'USER', 1, 1, 10, 1, '2019-07-22 21:39:25', '2019-07-22 21:39:25', NULL, NULL, NULL, '0924372808', '12345', NULL),
	(31, '0300907441', 'Isabel Altamirano', 'ciudadela reinitas', 'isabel-altamirano@hotmail.com', '215673', '$2y$10$ZLQDnj/nokN/PHgnpvKP7ezmEZslVu.DnE.sqaq/uhxM4M0oNSAJS', 'USER', 3, 17, 10, 5, '2019-08-07 14:20:01', '2019-08-07 14:20:01', NULL, NULL, 'img53212433.jpg', '0911827341', '12345', NULL),
	(32, '1711402980', 'Dorian Molina', 'ciudadela reinitas', 'dorian-molina@hotmail.com', '216788', '$2y$10$xB0iwQOHBS//BSfIFGjIgehtbbamf1qFiSmvcMivNWgu9zFi46mz.', 'USER', 5, 31, 10, 5, '2019-08-07 14:08:19', '2019-08-07 14:08:19', NULL, NULL, 'img9086726.jpg', '0918374523', '12345', NULL),
	(33, '1709262933', 'Paul Sanchez', 'ferroviaria', 'paul-sanchez@hotmail.com', '215675', '$2y$10$AlPc/lPLUxSpxl4in0Z/q.R0b44uF8KoXSsynb/RcTHoZ2GIoDMZC', 'USER', 5, 31, 10, 3, '2019-08-19 14:32:20', '2019-08-19 14:32:20', NULL, NULL, 'img88098024.jpg', '0911872561', '12345', 'SI'),
	(34, '0702884826', 'Mercy Alvarado', 'ferroviaria', 'mercy-alvarado@hotmail.com', '213445', '$2y$10$1DDbIzdenmOlVbayu5PCF.I5o0Uiuaut1wMRurMvfcTsQPGHyrZfm', 'USER', 3, 20, 10, 3, '2019-08-07 14:08:38', '2019-08-07 14:08:38', NULL, NULL, '', '0918735699', '12345', NULL),
	(35, '0104292461', 'Sandra Rincon', 'urdenor', 'sandra-rincon@hotmail.com', '244563', '$2y$10$/s4Mr3hwP3tk889xcxwkn.bczv5.E3WX3DsgDMTqaJ7kBuRns8l5C', 'USER', 6, 37, 10, 5, '2019-08-07 14:09:46', '2019-08-07 14:09:46', NULL, NULL, 'img75631513.jpg', '0918374534', '12345', NULL),
	(36, '1803538246', 'Luis Paredes', 'ceibos', 'luis-paredes@gmail.com', '213643', '$2y$10$KC3nvE1DZK08bAV.3hQz4eHQKew/GKSUPGQ5G7yVHb9zQ75Hg0Ihe', 'USER', 2, 13, 10, 5, '2019-08-07 14:10:02', '2019-08-07 14:10:02', NULL, NULL, '', '0918846361', '12345', NULL),
	(37, '0301506044', 'Fernanda Garcia', 'centenario', 'fernanda-garcia@hotmail.com', '213435', '$2y$10$L.0ZDSaerZpSr0XuzuKQ7esmh//5lG4CCA7An0ffO6w.d4RzDA4va', 'USER', 5, 31, 10, 3, '2019-08-07 14:10:15', '2019-08-07 14:10:15', NULL, NULL, '', '0918463634', '12345', NULL),
	(38, '1102955406', 'Leonardo Loaza', 'urdenor', 'leonardo-loaza@hotmail.es', '256477', '$2y$10$8zguMhMUsSQK.xgz70uqeu/fMxSOd9HGU.psLScSPS..IzgwYnS..', 'USER', 4, 25, 10, 2, '2019-08-07 14:10:29', '2019-08-07 14:10:29', NULL, NULL, 'img86914672.jpg', '0917847371', '12345', NULL),
	(39, '0102250362', 'Cristina Toral', 'ferroviaria', 'cristina-toral@hotmail.com', '216563', '$2y$10$by3Ve.pFf9BshQcpxF53cej/TfTyCKClmNoxkFFxOy86CxHqEklDC', 'USER', 3, 18, 10, 2, '2019-08-07 14:10:44', '2019-08-07 14:10:44', NULL, NULL, 'img36306722.jpg', '0917436476', '12345', NULL),
	(40, '1706172648', 'Pilar Abata Reinoso', 'ceibos', 'pilar-reinoso@gmail.com', '234456', '$2y$10$.UECk9sttiQZywXvgvawtOwoMQ/wtCOKbtBcekSVt7kyH230gDssS', 'USER', 1, 7, 10, 5, '2019-08-07 14:11:02', '2019-08-07 14:11:02', NULL, NULL, 'img89442407.jpg', '0916378647', '12345', NULL),
	(41, '1303753618', 'MArcelo Pablo Nieto', 'urdenor', 'marcelo-nieto@gmail.com', '212653', '$2y$10$bhC7XUrN/F3Wlh7DOKmJmOlKz/fR.95Q7GKkJZr1gYRydpshenxvq', 'USER', 1, 1, 10, 3, '2019-08-07 14:11:15', '2019-08-07 14:11:15', NULL, NULL, '', '0967453342', '12345', NULL),
	(42, '1103037048', 'Narcisa Lourdes Castillo', 'lomas de urdesa', 'narcisa-castillo@outlook.com', '212355', '$2y$10$2lc9k8/dfyWpPS77Ng6xmurgv9lq1kG2BAybvyLNxdK1ldV/Q9tGK', 'USER', 5, 31, 10, 2, '2019-08-07 14:11:28', '2019-08-07 14:11:28', NULL, NULL, 'img43782555.jpg', '0954675342', '12345', NULL),
	(43, '1704997012', 'Cecilia Palacios', 'ceibos', 'cecilia-palacios@hotmail.com', '243263', '$2y$10$LcC6CKfzO/Qn9I.yvWuJiOcDe4Jw9pWU3sjxTBNI12AvOvIzlP3xu', 'USER', 2, 14, 10, 2, '2019-08-19 14:32:56', '2019-08-19 14:32:56', NULL, NULL, 'img64906141.jpg', '0902843766', '12345', 'SI'),
	(44, '1714818299', 'David Acosta', 'ciudadela rio frio', 'david-acosta@gmail.com', '243556', '$2y$10$ufAHsoI4VDUa0MK43Jrw0ekcWImK48W1TuZYf0By9CZD7Br6xmIke', 'USER', 4, 25, 10, 2, '2019-08-07 14:12:06', '2019-08-07 14:12:06', NULL, NULL, 'img43412900.jpg', '0908247534', '12345', NULL),
	(45, '0200982163', 'Eugenio Aguilar', 'ceibos', 'eugenio-aguilar@gmail.com', '246557', '$2y$10$D1qXPsGhknsC0qdNeDuaYe.1cxR4mXfTZQ9RjQZcdxO5RJ.CIaNQK', 'USER', 4, 27, 10, 2, '2019-08-07 14:12:17', '2019-08-07 14:12:17', NULL, NULL, 'img77345264.jpg', '0965326423', '12345', NULL),
	(46, '0913537742', 'Alejandro Aguayo', 'atarazana', 'alejandro-aguayo@gmail.com', '213455', '$2y$10$sMO.CY9Grgs2FTmEL.XRfO3SQccnSrUkOLT0CKzsuFmw/WSx3Ak12', 'USER', 3, 17, 10, 2, '2019-08-07 15:06:36', '2019-08-07 15:06:36', NULL, NULL, 'img53744592.jpg', '0936856345', '12345', NULL),
	(47, '0702648551', 'Adolfo Heredia', 'ciudadela entre rios', 'adolfo-heredia@hotmail.es', '256758', '$2y$10$7vAioymj3df/senysktRH.tXfngDqfElXznKc2uF7Mi36BRTIQUjq', 'USER', 6, 37, 10, 3, '2019-08-07 14:12:40', '2019-08-07 14:12:40', NULL, NULL, 'img33180730.jpg', '0946556763', '12345', NULL),
	(48, '1715241434', 'Sheila Iturralde', 'ciudadela gaviotas', 'sheila-iturralde@hotmail.com', '267467', '$2y$10$X1KVzP/2.XfOYu7R3UYXPe.nJWRdind.VwA7OdwTph5mRfcBxzHye', 'USER', 3, 21, 10, 5, '2019-08-07 14:12:56', '2019-08-07 14:12:56', NULL, NULL, 'img81434990.jpg', '0967473322', '12345', NULL),
	(49, '0917385288', 'Martin Acurio', 'ciudadela las riveras', 'martin-acurio@gmail.com', '267467', '$2y$10$oqHMeX2CAomaWF33IStf.eH4ZMIHe27kT3HdOIs4Bjr2VkOtkByeS', 'USER', 7, 47, 10, 5, '2019-08-07 14:15:38', '2019-08-07 14:15:38', NULL, NULL, 'img53528759.jpg', '0967256735', '12345', NULL),
	(50, '1103756134', 'Victor Aguirre', 'urdenor', 'victor-aguinaga@outlook.com', '213545', '$2y$10$.7Rps8GagWzr3GAvu1G.ee3SOYSbYiJMybqAMGGyu0.sTJ/uXxbcm', 'USER', 4, 25, 10, 5, '2019-08-07 14:15:51', '2019-08-07 14:15:51', NULL, NULL, 'img17784838.jpg', '0956434433', '12345', NULL),
	(51, '1103201461', 'Katerina Bermeo', 'ciudadela reinitas', 'katerina-bermeo@gmail.com', '213456', '$2y$10$fBIFxzIu2KEL9IhrcptwvuuWkkT1QXv.XeseyiGmZiQn6Se3D2C5y', 'USER', 4, 28, 10, 5, '2019-08-07 14:16:05', '2019-08-07 14:16:05', NULL, NULL, 'img33391806.jpg', '0926453453', '12345', NULL),
	(52, '0102051349', 'Elizabeth Rodriguez', 'ciudadela rio frio', 'elizabeth-rodriguez@gmail.com', '234564', '$2y$10$mFgQzMkM.LupYEHF8vc1/ekRP7nHjTRLGMICJBxIjPdc8DSwrRyj.', 'USER', 5, 33, 10, 5, '2019-08-07 14:16:19', '2019-08-07 14:16:19', NULL, NULL, 'img70013940.jpg', '0965373119', '12345', NULL),
	(53, '1713580221', 'Luis Alarcon', 'lomas de urdesa', 'luis-alarcon@hotmail.com', '257577', '$2y$10$4GR/rqdaYSRtjveQRokWwevkL5gZQN79innQMbk/t/QtfAWaZFmve', 'USER', 4, 25, 10, 5, '2019-09-12 14:48:22', '2019-09-12 14:48:22', NULL, NULL, 'img44114302.jpg', '0956725367', '12345', 'SI'),
	(54, '0601899396', 'Marcelo Calderon', 'ciudadela sol matador', 'marcelo-calderon@hotmail.es', '2673567312', '$2y$10$2tLkau/JRjYzYLrM6mvuE.8RGH7L295TikzdjBYe949fyLSH2l3Qu', 'USER', 3, 17, 10, 3, '2019-08-19 14:30:35', '2019-08-19 14:30:35', NULL, NULL, '', '0956735345', '12345', 'SI'),
	(55, '0200562791', 'Alfonso Alban', 'ciudadela gaviotas', 'alfonso-alban@outlook.com', '246542', '$2y$10$EFKMfgJnNsz7OzjVfBC.leDrKX6idrYsgheFr5fZSGDlJvWOptirK', 'USER', 5, 34, 10, 2, '2019-08-19 14:29:15', '2019-08-19 14:29:15', NULL, NULL, 'img93371766.jpg', '0965267323', '12345', 'SI'),
	(56, '0501675946', 'Vinicio Zambonino', 'ciudadela sol matinal', 'vinicio-zambonino@gmail.com', '256745', '$2y$10$WfInOR8ymFXAIGj2XqZZMeRiF9mEWCIDKwwNoaWwGTRCsyE5obGIC', 'USER', 6, 37, 10, 2, '2019-08-07 14:16:42', '2019-08-07 14:16:42', NULL, NULL, 'img6033787.jpg', '0956735232', '12345', NULL),
	(57, '1303292583', 'Bolivar Basurto', 'ceibos norte', 'bolivar-basurto@hotmail.com', '254667', '$2y$10$TilIk9347YVm0g4sBh24huKoRQcz3Lrf6O91oAUub56kRlv8t1gHy', 'USER', 4, 28, 10, 2, '2019-08-07 14:16:51', '2019-08-07 14:16:51', NULL, NULL, 'img54289318.jpg', '0967354554', '12345', NULL),
	(58, '1708706302', 'Oswaldo Almeida', 'urdenor', 'oswaldo-almeida@gmail.com', '276349', '$2y$10$f//SLdGiaL0PvOCulGNmkek5.HgztZFPK3AeAMEMhF2fRGDyfuoXa', 'USER', 3, 18, 10, 3, '2019-09-12 15:09:36', '2019-09-12 15:09:36', NULL, NULL, 'img32492183.jpg', '0957356433', '12345', 'SI'),
	(59, '0701396830', 'Gabriel Alonso', 'ciudadela entre rios', 'gabriel-alonso@hotmail.es', '213454', '$2y$10$1Beapp.XsOjpUtW/JZf0eudhSAferqyhGEFsA3cUjWtu7vMcp145i', 'USER', 3, 19, 10, 5, '2019-09-12 15:09:07', '2019-09-12 15:09:07', NULL, NULL, '', '0965453311', '12345', 'SI'),
	(60, '0102684529', 'María Antonieta de las Nieves', 'La vecindad del chavo', 'maria-antonieta-de-las-nieves@hotmail.com', '216789', '$2y$10$RLLI.cYVIRQYizQM3/VNk.tHbrI5VPlrxuRkEejKXkp2ZdRVRF0U2', 'USER', 7, 47, 1, 6, '2019-08-15 17:16:15', '2019-08-15 17:16:15', NULL, NULL, 'img80351792.jpg', '0918453813', '12345', NULL),
	(61, '0800923294', 'prueba', 'prueba', 'prueba@gmail.com', '238783', '$2y$10$UsS.elEx911TvJZnUD5lbeXbKbqJ9dWNx44eTKN9BRK7vBfijW.Na', 'USER', 4, 25, 1, 6, '2019-09-12 02:33:18', '2019-09-12 02:33:18', NULL, NULL, '', '0918645731', '12345', NULL),
	(62, '0915851216', 'mercesdes aviles', 'prueba', 'mercedes@gmail.com', '213456', '$2y$10$k1f6JygdrmAiJZGe81e/L.RhCKU7YxQ8//kBopivrrk9NolkHBEFW', 'USER', 2, 13, 1, 6, '2019-09-12 02:37:26', '2019-09-12 02:37:26', NULL, NULL, '', '0918645720', '12345', NULL),
	(63, '0201338829', 'maria chumy', 'prueba', 'maria-chumy@gmail.com', '213456', '$2y$10$eFOKo654Um84FCQPzafSCup80CapfmG.SLd3TCkFGRWc7./v9vcJG', 'USER', 4, 27, 1, 6, '2019-09-12 02:39:44', '2019-09-12 02:39:44', NULL, NULL, '', '0918637633', '12345', NULL);
/*!40000 ALTER TABLE `dbousuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
