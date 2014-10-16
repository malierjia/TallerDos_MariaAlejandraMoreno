-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2014 a las 18:08:56
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tallerdos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `destacado` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `imagen`, `descripcion`, `precio`, `destacado`) VALUES
(1, 'Kit GPS', 'images/art1.png', 'Kit de elementos electronicos para crear un wearable con gps', 20000, 1),
(2, 'Kit pulsador', 'images/art2.png', 'Kit de elementos electronicos para crear un pulsador', 30000, 1),
(3, 'Hilo conductor', 'images/art3.png', 'Un metro de hilo conductor para crear un wearable', 5000, 1),
(4, 'Tira de Leds ', 'images/art4.png', 'Ocho leds de superficie color rojo, purpura, rosado', 10000, 1),
(5, 'GPS', 'images/art5.png', 'sensor GPS', 8000, 1),
(6, 'Flora', 'images/art6.png', 'Tarjeta flora para programar y usar sensores y leds', 9000, 1),
(7, 'Sensor de pulsaciones', 'images/art7.png', 'Kit para medir las pulsaciones con wearable', 3000, 1),
(8, 'Led', 'images/art8.png', 'Led de superficie', 2000, 1),
(9, 'Flora 2.0', 'images/art9.png', 'Nueva Flora resistente al agua', 16000, 1),
(10, 'acelerometro', 'images/art9.png', 'sensor de movimiento', 8000, 0),
(11, 'kit pulsadores', 'images/art2.png', 'kit para hacer tus propios pulsadores', 18000, 0),
(12, 'hilo 1/2 metro', 'images/art3.png', 'hilo conductivo', 2000, 0),
(13, 'cable usb', 'images/art10.png', '3 metro cable usb', 5000, 0),
(14, 'bateria', 'images/art11.png', 'bateria alcalina', 1000, 0),
(17, 'kit multiusos', 'images/art12.png', 'kit para realizar culquier proyecto', 2000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
`id` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` text NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `correo` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `contrasena`, `correo`) VALUES
(1, 'Maria Alejandra', 'Moreno Mayor', '123', 'malierjia@hotmail.com'),
(2, 'Juan Carlos', 'Micolta', '456', 'jmicolta@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`id` int(100) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `articulo` int(100) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `cliente`, `articulo`, `fecha`) VALUES
(1, 1, 3, '2014-10-16'),
(2, 1, 8, '2014-10-16'),
(3, 1, 7, '2014-10-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
