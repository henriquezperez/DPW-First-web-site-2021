-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6365
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para uclases
CREATE DATABASE IF NOT EXISTS `uclases` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `uclases`;

-- Volcando estructura para tabla uclases.area
CREATE TABLE IF NOT EXISTS `area` (
  `areaid` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estadoId` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`areaid`),
  KEY `Índice 2` (`estadoId`),
  CONSTRAINT `FK_area_estado` FOREIGN KEY (`estadoId`) REFERENCES `estado` (`estadoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla uclases.area: ~7 rows (aproximadamente)
INSERT INTO `area` (`areaid`, `nombre`, `imagen`, `descripcion`, `estadoId`) VALUES
	(1, 'Soporte Técnico', 'computacion.png', 'Aprende a dar Soporte técnico!.', 1),
	(2, 'Bases de datos', 'base-de-datos.png', 'Convierte un experto en base de datos', 1),
	(3, 'Diseño y desarrollo Web', 'dising-web.pgn.png', 'Crea paginas increibles!', 1),
	(7, 'Criptomoneda', 'miner.png', 'Aprende todo sobre las criptomonedas!', 1),
	(12, 'Programación', 'programmer.png', 'Aprende a programar con facilidad!', 1),
	(21, 'Diseño gráfico', 'da90d137.png', 'Crea imagenes increible!', 1),
	(22, 'Animación 3D', '5a744de1.png', 'Aprende a crear y diseñar en 3D!', 1);

-- Volcando estructura para tabla uclases.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `cursoid` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `estadoId` int(11) NOT NULL DEFAULT 1,
  `areaid` int(11) NOT NULL,
  `instructorid` int(11) NOT NULL,
  `costo` decimal(20,2) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`cursoid`),
  KEY `areaid` (`areaid`),
  KEY `instructorid` (`instructorid`),
  KEY `estadoId` (`estadoId`) USING BTREE,
  CONSTRAINT `FK_cursos_estado` FOREIGN KEY (`estadoId`) REFERENCES `estado` (`estadoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`areaid`) REFERENCES `area` (`areaid`),
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`instructorid`) REFERENCES `instructor` (`instructorid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla uclases.cursos: ~23 rows (aproximadamente)
INSERT INTO `cursos` (`cursoid`, `nombre`, `estadoId`, `areaid`, `instructorid`, `costo`, `descripcion`, `imagen`) VALUES
	(1, 'JAVA', 1, 12, 1, 35.50, 'Aprende java', 'programacion/java.png'),
	(2, 'HTML', 1, 3, 4, 40.00, 'Diseña y estructura página', 'web/html.png'),
	(3, 'Mineria con Bitcoin', 1, 7, 4, 60.00, 'Especializate en las mineria', 'criptomonedas/bitcoin.jpg'),
	(14, 'C#', 1, 12, 1, 80.00, 'Aprende C#', 'programacion/c-sharp.png'),
	(15, 'Kotlin', 1, 12, 3, 30.00, 'Aprende Kotlin', 'programacion/kotlin.png'),
	(16, 'Python', 1, 12, 7, 30.00, 'Aprende Python', 'programacion/python.png'),
	(17, 'Mantenimiento de Computadoras', 1, 1, 1, 20.00, 'Aprende a dar soporte técnico', 'computacion/mantenimiento.jpg'),
	(18, 'Soporte en Tarjetas madres', 1, 1, 3, 21.50, 'Verifica el funcionamiento', 'computacion/tarjeta-madre.jpg'),
	(19, 'MariaDB', 1, 2, 4, 35.50, 'Usa MariaDB para tus proyectos', 'base-de-datos/mariaDB.png'),
	(20, 'Microsoft - SQL Server', 1, 2, 14, 40.00, 'Usa MS-SQL Server', 'base-de-datos/sql-server.png'),
	(21, 'Dogecoin', 1, 7, 3, 50.00, 'Especializate en esta graciosa criptomoneda', 'criptomonedas/dogecoin.png'),
	(22, 'CSS', 1, 3, 1, 25.00, 'Dale un estilo único a tus páginas web', 'web/css.png'),
	(23, 'JavaScript', 1, 3, 4, 25.00, 'Añade funcionalidad a tus páginas', 'web/javascript.png'),
	(24, 'Angular', 1, 3, 3, 20.00, 'Usa este fabuloso framework para tus sitios', 'web/angular.png'),
	(25, 'Deno', 1, 3, 2, 20.00, 'Maxíma la productividad', 'web/deno.png'),
	(29, 'Ethereum ', 1, 7, 7, 50.00, 'Ethereum es una plataforma open source, que sirve para programar contratos inteligentes.', '4dc6336e.jpg'),
	(31, 'Krita', 1, 21, 1, 30.00, 'Krita', '6490203a.png'),
	(32, 'Gimp', 1, 21, 7, 30.00, 'Gimp', '3f101246.png'),
	(33, 'Adobe Photoshop', 1, 21, 14, 50.00, 'Adobe Photoshop es un editor de fotografías desarrollado por Adobe Systems Incorporated', 'b1b3eff2.gif'),
	(34, 'Blender', 1, 22, 2, 100.00, 'Blender es un programa dedicado especialmente al modelado, iluminación, renderizado, la animación y creación de gráficos tridimensionales', 'b31cadb2.jpg'),
	(35, 'Unity', 1, 22, 15, 150.00, 'Unity es un motor de videojuego multiplataforma creado por Unity Technologies', '58a40e6c.png'),
	(41, 'Unreal Engine', 1, 22, 2, 150.00, 'Unreal Engine es un motor de juego creado por la compañía Epic Games', '1488f1b8.jpg'),
	(42, 'nuevo cursos', 2, 22, 4, 20.50, 'Este es un curso de prueba', 'a0b24d92.jpg');

-- Volcando estructura para tabla uclases.cursosdeusuario
CREATE TABLE IF NOT EXISTS `cursosdeusuario` (
  `compraId` int(11) NOT NULL AUTO_INCREMENT,
  `cursoId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  PRIMARY KEY (`compraId`),
  KEY `cursoId` (`cursoId`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `FK_cursosdeusuario_cursos` FOREIGN KEY (`cursoId`) REFERENCES `cursos` (`cursoid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cursosdeusuario_usuario` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`usuarioid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla uclases.cursosdeusuario: ~5 rows (aproximadamente)
INSERT INTO `cursosdeusuario` (`compraId`, `cursoId`, `usuarioId`) VALUES
	(6, 19, 1),
	(27, 25, 69),
	(28, 21, 69),
	(39, 33, 69),
	(92, 20, 1);

-- Volcando estructura para tabla uclases.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `estadoId` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`estadoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla uclases.estado: ~4 rows (aproximadamente)
INSERT INTO `estado` (`estadoId`, `Nombre`) VALUES
	(1, 'Activo'),
	(2, 'Inactivo'),
	(3, 'En curso'),
	(4, 'Finalizado');

-- Volcando estructura para tabla uclases.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `instructorid` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecompleto` varchar(200) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `estadoId` int(11) DEFAULT 1,
  PRIMARY KEY (`instructorid`),
  KEY `Índice 2` (`estadoId`),
  CONSTRAINT `FK_instructor_estado` FOREIGN KEY (`estadoId`) REFERENCES `estado` (`estadoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla uclases.instructor: ~7 rows (aproximadamente)
INSERT INTO `instructor` (`instructorid`, `nombrecompleto`, `especialidad`, `foto`, `estadoId`) VALUES
	(1, 'Kevin Miguel Henríquez Pérez', 'Programación', 'miguel.png', 1),
	(2, 'Alan Key', 'Ingeniero informático', 'alan-key.jpg', 1),
	(3, 'Murray  Hopper', 'Lógica computacional', 'Murray-Hopper.jpg', 1),
	(4, 'Linus Torvalds', 'Ingeniero de software', 'linus.jpg', 1),
	(7, 'Steve Wozniak', 'Ingeniero computacional', 'Steve-Wozniak.jpg', 1),
	(14, 'Bill Gates', 'Programación', '36f8b4cc.jpg', 1),
	(15, 'Hideo Kojima', 'Animador en 3D', 'e50beae7.png', 1);

-- Volcando estructura para tabla uclases.tipodecurso
CREATE TABLE IF NOT EXISTS `tipodecurso` (
  `tipoCursoId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`tipoCursoId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla uclases.tipodecurso: ~2 rows (aproximadamente)
INSERT INTO `tipodecurso` (`tipoCursoId`, `nombre`) VALUES
	(1, 'Normal'),
	(2, 'Premium');

-- Volcando estructura para tabla uclases.tipousuario
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `tipoUsuarioId` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`tipoUsuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla uclases.tipousuario: ~2 rows (aproximadamente)
INSERT INTO `tipousuario` (`tipoUsuarioId`, `nombre`) VALUES
	(1, 'admin'),
	(2, 'cliente');

-- Volcando estructura para tabla uclases.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioid` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `clave` varchar(50) NOT NULL DEFAULT '',
  `tipousuario` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`usuarioid`) USING BTREE,
  KEY `estado` (`estado`),
  KEY `tipousuario` (`tipousuario`),
  CONSTRAINT `FK_usuario_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`estadoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usuario_tipousuario` FOREIGN KEY (`tipousuario`) REFERENCES `tipousuario` (`tipoUsuarioId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla uclases.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`usuarioid`, `nombreusuario`, `email`, `estado`, `clave`, `tipousuario`) VALUES
	(1, 'miguel', 'miguel@email.com', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1),
	(69, 'cusadmin', 'us@ema', 1, '81dc9bdb52d04dc20036dbd8313ed055', 2),
	(70, 'otro', 'otro@email.com', 1, '81dc9bdb52d04dc20036dbd8313ed055', 2),
	(74, 'nuevo', 'nuevo@email.com', 1, '81dc9bdb52d04dc20036dbd8313ed055', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
