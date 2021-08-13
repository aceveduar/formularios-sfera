-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para formatos
CREATE DATABASE IF NOT EXISTS `formatos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `formatos`;

-- Volcando estructura para tabla formatos.autorizacion_a_trabajar
CREATE TABLE IF NOT EXISTS `autorizacion_a_trabajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_crea` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `dias` tinyint(2) NOT NULL DEFAULT 1,
  `daterange` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `compensacion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `solicita` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `autoriza` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_control` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla formatos.autorizacion_de_retardo
CREATE TABLE IF NOT EXISTS `autorizacion_de_retardo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_crea` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_lab` time NOT NULL DEFAULT '08:00:00',
  `horario_comida` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `retardo` tinyint(1) NOT NULL DEFAULT 1,
  `solicita` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `autoriza` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_control` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla formatos.aviso_y_autorizacion
CREATE TABLE IF NOT EXISTS `aviso_y_autorizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_crea` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `dia_permiso` date NOT NULL,
  `durante` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `hora1` time NOT NULL,
  `hora2` time NOT NULL,
  `goc_sueldo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `motivo` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `solicita` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `autoriza` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_control` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Aviso y Autorización de Retardo o Salida Antes de Hora';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla formatos.permiso_de_salida
CREATE TABLE IF NOT EXISTS `permiso_de_salida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_crea` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dia` date NOT NULL DEFAULT current_timestamp(),
  `desde` time NOT NULL,
  `hasta` time NOT NULL,
  `viaticos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(255) NOT NULL,
  `motivo` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `solicita` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `autoriza` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Permiso de Salida En horario Laboral';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla formatos.solicitud_de_vacaciones
CREATE TABLE IF NOT EXISTS `solicitud_de_vacaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_crea` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `dias` tinyint(2) NOT NULL DEFAULT 1,
  `solicita` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `autoriza` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `daterange` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_control` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
