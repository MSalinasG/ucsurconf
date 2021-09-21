-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2021 a las 22:03:44
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17621713_ucssurconf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'admin', 'Maicol Yordan', '$2y$12$.rt0q9oZfIzVKNk420sPAuF6YxByUAQ1XxaRZ6YSOj2I67JKLH26a', '2019-07-23 11:30:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', NULL),
(2, 'Conferencias', 'fa-comment', NULL),
(5, 'Talleres', 'fa-code', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(17, 'Responsive Web Design', '2021-12-10', '10:00:00', 5, 1, 'taller_01', '0000-00-00 00:00:00'),
(18, 'Flexbox', '2021-12-10', '12:00:00', 5, 2, 'taller_02', '0000-00-00 00:00:00'),
(19, 'HTML5 y CSS3', '2021-12-10', '14:00:00', 5, 5, 'taller_03', '0000-00-00 00:00:00'),
(20, 'Drupal', '2021-12-10', '17:00:00', 5, 4, 'taller_04', '0000-00-00 00:00:00'),
(21, 'WordPress', '2021-12-10', '19:00:00', 5, 5, 'taller_05', '0000-00-00 00:00:00'),
(22, 'Como ser freelancer', '2021-12-10', '10:00:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(23, 'Tecnologías del Futuro', '2021-12-10', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(24, 'Seguridad en la Web', '2021-12-10', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(25, 'Diseño UI y UX para móviles', '2021-12-10', '10:00:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(26, 'AngularJS', '2021-12-11', '04:00:00', 2, 1, 'taller_06', '2019-07-23 11:30:24'),
(27, 'PHP y MySQL', '2021-12-11', '12:00:00', 5, 2, 'taller_07', '0000-00-00 00:00:00'),
(28, 'JavaScript Avanzado', '2021-12-11', '14:00:00', 5, 5, 'taller_08', '0000-00-00 00:00:00'),
(29, 'SEO en Google', '2021-12-11', '17:00:00', 5, 4, 'taller_09', '0000-00-00 00:00:00'),
(30, 'De Photoshop a HTML5 y CSS3', '2021-12-11', '19:00:00', 5, 5, 'taller_10', '0000-00-00 00:00:00'),
(31, 'PHP Intermedio y Avanzado', '2021-12-11', '21:00:00', 5, 6, 'taller_11', '0000-00-00 00:00:00'),
(32, 'Como crear una tienda online que venda millones en pocos días', '2021-12-11', '10:00:00', 2, 6, 'conf_04', '0000-00-00 00:00:00'),
(33, 'Los mejores lugares para encontrar trabajo', '2021-12-11', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(34, 'Pasos para crear un negocio rentable ', '2021-12-11', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(36, 'Diseño UI y UX para móviles', '2021-12-11', '17:00:00', 1, 5, 'sem_03', '0000-00-00 00:00:00'),
(37, 'Laravel', '2021-12-12', '10:00:00', 5, 1, 'taller_12', '0000-00-00 00:00:00'),
(38, 'Crea tu propia API', '2021-12-12', '12:00:00', 5, 2, 'taller_13', '0000-00-00 00:00:00'),
(39, 'JavaScript y jQuery', '2021-12-12', '14:00:00', 5, 5, 'taller_14', '0000-00-00 00:00:00'),
(40, 'Creando Plantillas para WordPress', '2021-12-12', '17:00:00', 5, 4, 'taller_15', '0000-00-00 00:00:00'),
(41, 'Tiendas Virtuales en Magento', '2021-12-12', '19:00:00', 5, 5, 'taller_16', '0000-00-00 00:00:00'),
(42, 'Como hacer Marketing en línea', '2021-12-12', '10:00:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(43, '¿Con que lenguaje debo empezar?', '2021-12-12', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(44, 'Frameworks y librerias Open Source', '2021-12-12', '19:00:00', 2, 5, 'conf_09', '0000-00-00 00:00:00'),
(45, 'Creando una App en Android en una mañana', '2021-12-12', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(46, 'Creando una App en iOS en una tarde', '2021-12-12', '17:00:00', 1, 1, 'sem_05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_invitado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `url_imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam.', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam.', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam.', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi a. Dolore aut voluptatum repellat molestiae at, iure quisquam omnis, quae dolores eaque quibusdam. Delectus velit a voluptates. Excepturi, officiis!', 'invitado6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_registrado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_registrado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `talleres_registrados` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pagado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`ID_Registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(56, 'Maicol', 'Gonzales', 'mysalinasgonzales@gmail.com', '2021-09-19 19:35:37', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"25\",\"22\",\"23\",\"24\",\"17\",\"18\",\"19\",\"20\",\"21\"]}', 2, '41.3', 1),
(57, 'Maicol', 'Gonzales', 'mysalinasgonzales@gmail.com', '2021-09-19 20:14:06', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"22\"]}', 2, '30', 1),
(58, 'Maicol', 'Gonzales', 'mysalinasgonzales@gmail.com', '2021-09-19 20:42:57', '{\"un_dia\":{\"cantidad\":\"0\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"\"},\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"25\",\"22\",\"23\",\"24\",\"26\",\"32\",\"33\",\"34\",\"44\",\"39\",\"40\",\"41\"]}', 2, '61.3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
