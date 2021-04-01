SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `departamento` VALUES
(1, 'Ciencias'),
(2, 'Tecnologia'),
(3, 'Administracion');

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento` (`departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `empleado` VALUES
(1, 'Juan', 3),
(2, 'Alex', 2),
(3, 'Iris', 1);

ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`);