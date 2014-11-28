-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2014 at 07:58 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `continuara`
--

-- --------------------------------------------------------

--
-- Table structure for table `colaboraciones`
--

CREATE TABLE IF NOT EXISTS `colaboraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idHistoria` int(11) NOT NULL,
  `contenido` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `colaboraciones`
--

INSERT INTO `colaboraciones` (`id`, `idUsuario`, `idHistoria`, `contenido`) VALUES
(1, 1, 1, 'la concha de la lora'),
(2, 1, 1, 'Era la historia de un hombre pequeno'),
(3, 1, 1, 'Quisiera pasar web mientras entiendo como hacer el taller 3 el cual estaba completamente perdido...');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idHistoria` int(11) NOT NULL,
  `contenido` varchar(1000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `idUsuario`, `idHistoria`, `contenido`) VALUES
(1, 1, 1, 'Quisiera pasar Web y no morir en el intento c:'),
(2, 1, 1, 'holi '),
(3, 1, 2, 'Comento en mi propia historia'),
(4, 1, 1, ''),
(5, 1, 1, 'Perdi web'),
(6, 3, 2, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `historias`
--

CREATE TABLE IF NOT EXISTS `historias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(256) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(256) COLLATE utf8_bin NOT NULL,
  `tiempo` int(11) NOT NULL,
  `contenido` text COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `creador` varchar(1024) COLLATE utf8_bin NOT NULL,
  `cupos` int(11) NOT NULL,
  `imgCreador` varchar(1024) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `historias`
--

INSERT INTO `historias` (`id`, `titulo`, `tipo`, `categoria`, `tiempo`, `contenido`, `idUsuario`, `creador`, `cupos`, `imgCreador`) VALUES
(1, 'Gatosfera', 'Cuento', 'Comedia', 0, 'Cat ipsum dolor sit amet, curl into a furry donut, but intrigued by the shower yet poop on grasses. Throwup on your pillow always hungry nap all day use lap as chair, yet i like big cats and i can not lie so sleep on keyboard, for sit in box. Hack up furballs need to chase tail plan steps for world domination yet whos the baby, so destroy couch. Eat grass, throw it back up. Chew iPad power cord stick butt in face.  Kammil Carranza  la concha de la lora', 2, 'Veronica Alegria', 1, 'img/alegria.png'),
(2, 'Placard Infinia', 'Historia', 'Drama', 0, 'Cat ipsum dolor sit amet, curl into a furry donut, but intrigued by the shower yet poop on grasses. Throwup on your pillow always hungry nap all day use lap as chair, yet i like big cats and i can not lie so sleep on keyboard, for sit in box. Hack up furballs need to chase tail plan steps for world domination yet whos the baby, so destroy couch. Eat grass, throw it back up. Chew iPad power cord stick butt in face.', 1, 'Kammil Carranza', 5, 'img/kammil.png'),
(3, 'Kammil no tiene pipi', 'Cuento', 'Romance', 0, 'Look, just because I don''t be givin'' no man a foot massage don''t make it right for Marsellus to throw Antwone into a glass motherfuckin'' house, fuckin'' up the way the nigger talks. Motherfucker do that shit to me, he better paralyze my ass, ''cause I''ll kill the motherfucker, know what I''m sayin''?', 3, 'sebastianvcruz', 3, 'img/default.png'),
(4, 'Las Aventuras Sexuales de Chucho ', 'Historia', 'Improvisar', 0, 'A chucho se le pudrio el pikachu', 3, 'Sebastian Vasquez', 0, 'img/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idParticipante` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idHistoria` int(11) NOT NULL,
  `permiso` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `idParticipante`, `idUsuario`, `idHistoria`, `permiso`) VALUES
(2, 1, 2, 1, 'verdadero'),
(3, 1, 1, 2, 'falso'),
(4, 3, 2, 1, 'falso');

-- --------------------------------------------------------

--
-- Table structure for table `plumas`
--

CREATE TABLE IF NOT EXISTS `plumas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idHistoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `plumas`
--

INSERT INTO `plumas` (`id`, `idUsuario`, `idHistoria`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 2, 2),
(5, 1, 2),
(6, 3, 1),
(7, 3, 2),
(8, 3, 3),
(9, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` varchar(256) COLLATE utf8_bin NOT NULL,
  `rutaImg` varchar(1024) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombre`, `contrasena`, `nacimiento`, `genero`, `rutaImg`) VALUES
(1, 'kaescavi94@gmail.com', 'Kammil Carranza', 'a', '1994-12-04', 'hombre', 'img/kammil.png'),
(2, 'mvapsacr@gmail.com', 'Veronica Alegria', 'zapato1', '1995-04-02', 'mujer', 'img/alegria.png'),
(3, 'sebastianvcruz@gmail.com', 'sebastianvcruz', '1234', '1986-10-31', 'hombre', 'img/default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
