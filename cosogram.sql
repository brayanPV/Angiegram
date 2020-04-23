-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 04:55:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cosogram`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistad`
--

CREATE TABLE `amistad` (
  `usuario` int(11) DEFAULT NULL,
  `amistad` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fechasolicitud` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL COMMENT 'Almacena el estado de la solicitud, 0 si fue realizada, 1 si se aprobo y 2 si fue rechazada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena la relación de amistad entre los usuarios';

--
-- Volcado de datos para la tabla `amistad`
--

INSERT INTO `amistad` (`usuario`, `amistad`, `id`, `fechasolicitud`, `estado`) VALUES
(3, 4, 11, NULL, 1),
(3, 22, 12, NULL, 1),
(4, 20, 13, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `publicacion` int(11) DEFAULT NULL COMMENT 'Almacena el identificador de la publicacipon del usuario',
  `usuario` int(11) DEFAULT NULL COMMENT 'Almacena el identificador del usuario que realizó la publicación',
  `fechapublicacion` date DEFAULT NULL COMMENT 'Almacena la fecha de la publicación',
  `estado` int(11) DEFAULT NULL COMMENT 'Almacena el estado de la publicación, que puede ser desde activo, bloqueado o demas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena la información de los comentarios realizados por los usuarios sobre las distintas publicaciones a la base de datos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `id` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL COMMENT 'Almacena el identificador del usuario que etiqueto',
  `publicacion` int(11) DEFAULT NULL COMMENT 'Almacena el identificador de la publicacion donde fue etiquetado, se asume que solo puede etiquetar el usuario dueño de la publicacion',
  `fecha` date DEFAULT NULL COMMENT 'Almacena la fecha de la etiqueta',
  `mensaje` text DEFAULT NULL COMMENT 'Almacena el mensaje de la etiqueta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena la información de las etiquetas de los usuarios sobre las publicaciones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `fechamensaje` date DEFAULT NULL,
  `envia` int(11) NOT NULL COMMENT 'Corresponde al identificador del usuario que envia',
  `recibe` int(11) NOT NULL COMMENT 'Corresponde al identificador del usuario que recibe',
  `mensaje` text DEFAULT NULL COMMENT 'Corresponde al mensaje enviado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los mensaje privados que son enviados a los usuarios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL COMMENT 'Almacena el usuario que realiza la publicación',
  `fechapublicacion` date DEFAULT current_timestamp() COMMENT 'Almacena la fecha de publicación del usuario',
  `acceso` int(11) DEFAULT NULL COMMENT 'Define el tipo de acceso de la publicación, que puede ser privado, publico o solo para amigos.',
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena la información de las publicaciones del usuario';

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id`, `descripcion`, `usuario`, `fechapublicacion`, `acceso`, `foto`) VALUES
(1, '!asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(2, '!asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(3, '!asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(4, 'asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(5, 'asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(6, 'asdasdasd', 3, '2020-04-19', NULL, '158c7493dffac06a3b87c7e52873f646.jpg'),
(7, 'Una mierda OwO', 3, '2020-04-19', NULL, '43001596_674422416290025_4584277465584631808_n.jpg'),
(8, 'Una mierda OwO', 3, '2020-04-19', NULL, '43001596_674422416290025_4584277465584631808_n.jpg'),
(9, 'ASDASDASD', 3, '2020-04-19', NULL, 'Fcvm2AOT_400x400.jpg'),
(10, 'asdasdqweqweqwe', 3, '2020-04-19', NULL, 'Fcvm2AOT_400x400.jpg'),
(11, 'Un koala jajaja', 4, '2020-04-19', NULL, 'Fcvm2AOT_400x400.jpg'),
(12, 'una tuteca xDDDDD', 4, '2020-04-19', NULL, '93612133_918305005279797_3345506552642535424_n.jpg'),
(13, 'una tuteca xDDDDD', 3, '2020-04-20', NULL, '93612133_918305005279797_3345506552642535424_n.jpg'),
(14, 'una tuteca xDDDDD', 3, '2020-04-20', NULL, '93612133_918305005279797_3345506552642535424_n.jpg'),
(15, 'una cena xDDDDDD', 20, '2020-04-20', NULL, 'photo_2020-04-07_22-17-50.jpg'),
(16, 'gris', 22, '2020-04-20', NULL, '83945131_196948698151214_8776060315486912512_o.jpg'),
(17, 'ajjaja un icono', 4, '2020-04-20', NULL, 'iconoLogin.png'),
(18, 'jjaja un mapache papa', 42, '2020-04-21', NULL, 'descarga.jpg'),
(19, 'un perrito en la piscina ', 3, '2020-04-21', NULL, 'perrito.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL COMMENT 'Almacena el identificador interno del usuario, es un codigo interno del sistema-',
  `usuario` varchar(50) NOT NULL COMMENT 'Almacena el nombre identificador del usuario',
  `email` varchar(100) NOT NULL COMMENT 'Almacena el correo electrónico del usuario. El email debe ser unico.',
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `fecharegistro` date DEFAULT current_timestamp() COMMENT 'Almacena la fecha de registro del usuario.  Esta fecha es generada por el sistema de forma automatica',
  `fechanacimiento` date DEFAULT NULL COMMENT 'Almacena la fecha de nacimiento del usuario',
  `pais` int(11) DEFAULT NULL COMMENT 'Registra el país de procedencia del usuario',
  `foto` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='El usuario debe ser unico para todos los participantes en la red';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `email`, `nombre`, `apellido`, `pass`, `fecharegistro`, `fechanacimiento`, `pais`, `foto`) VALUES
(3, 'reneEditado2', 'crangarita2@gmail.com', 'CarlosEdit', 'ReneEdit', '1234', NULL, NULL, 0, 'iconoLogin.png'),
(4, 'crangarita', 'crangarita@gmail.com', 'Carlos', 'Angarita', '1234', NULL, NULL, 0, ''),
(20, 'zang', 'zang@gmail.com', NULL, 'kol', 'solo', NULL, '2017-01-12', NULL, ''),
(22, 'getso@getson.com', 'getso@getson.com', 'brayan', 'palomino', '1234', NULL, '2020-01-18', NULL, 'Fcvm2AOT_400x400.jpg'),
(42, 'kose25', 'carlosjosepg@ufps.edu.co', 'Carlos', 'Pablos', 'kose25', '2020-04-21', '1998-06-17', NULL, '93612133_918305005279797_3345506552642535424_n.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_amistad` (`usuario`,`amistad`,`estado`),
  ADD KEY `FK_amistad_usuario_02` (`amistad`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comentario_publicacion` (`publicacion`),
  ADD KEY `FK_comentario_usuario` (`usuario`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_etiqueta_publicacion` (`publicacion`),
  ADD KEY `FK_etiqueta_usuario` (`usuario`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mensaje_usuario` (`envia`),
  ADD KEY `FK_mensaje_usuario_02` (`recibe`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_publicacion_usuario` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amistad`
--
ALTER TABLE `amistad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Almacena el identificador interno del usuario, es un codigo interno del sistema-', AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD CONSTRAINT `FK_amistad_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_amistad_usuario_02` FOREIGN KEY (`amistad`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `FK_comentario_publicacion` FOREIGN KEY (`publicacion`) REFERENCES `publicacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comentario_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `FK_etiqueta_publicacion` FOREIGN KEY (`publicacion`) REFERENCES `publicacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_etiqueta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `FK_mensaje_usuario` FOREIGN KEY (`envia`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mensaje_usuario_02` FOREIGN KEY (`recibe`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `FK_publicacion_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
