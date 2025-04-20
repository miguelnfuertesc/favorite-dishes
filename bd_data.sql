-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-08-2018 a las 01:51:25
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_dish` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_informacion`
--

INSERT INTO `tb_users` (`user_id`, `user_name`, `user_dish`) VALUES
(1, 'Miguel', 'Tallarines'),
(43, 'Claudia', 'Lentejas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
