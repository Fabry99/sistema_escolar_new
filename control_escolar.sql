-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2023 a las 00:52:30
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `curp` varchar(150) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `id_grado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `curp`, `edad`, `birthdate`, `id_grado`, `fecha`) VALUES
(4, 'Hector', 'Gomez Chavez', 'campos12@gmail.com', '99111656701', 'WDSGDFSGN', '21', '2023-08-20', 1, '2023-08-28 23:56:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `especialidad`, `fecha`) VALUES
(1, 'Informactica', '2023-08-19 23:47:08'),
(2, 'Ciencias & Tecnologias', '2023-08-28 23:40:02'),
(3, 'Literatura', '2023-08-19 23:47:34'),
(4, 'Lenguas Extrangeras', '2023-08-19 23:47:52'),
(5, 'Matematicas Aplicadas', '2023-08-19 23:48:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `descripcion`, `duracion`, `fecha`) VALUES
(1, '1A', '6 meses', '2023-08-28 23:34:18'),
(2, '1B', '3 meses', '2023-08-19 23:41:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `per_ini` date NOT NULL,
  `per_fin` date NOT NULL,
  `id_grado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `materia`, `id_profesor`, `per_ini`, `per_fin`, `id_grado`, `fecha`) VALUES
(1, 'Matematicas', 2, '2023-08-19', '2023-09-01', 2, '2023-08-28 23:30:04'),
(9, 'Matematicassjkukk.lujk', 2, '2023-08-17', '2023-08-22', 1, '2023-08-29 03:49:54'),
(12, 'srthrsth', 2, '2023-08-03', '2023-08-07', 2, '2023-08-29 03:50:20'),
(15, 'EFRGDF', 1, '2023-08-05', '2023-08-22', 2, '2023-08-29 03:50:49'),
(16, 'Matematicassjkukk.lujk', 1, '2023-08-04', '2023-08-11', 1, '2023-08-29 03:51:00'),
(17, 'Matematicas23', 1, '2023-08-11', '2023-08-30', 1, '2023-08-29 03:51:11'),
(18, 'SDFGFDGHBFN', 1, '2023-08-11', '2023-08-11', 2, '2023-08-29 03:51:19'),
(19, 'MHHJGMN', 2, '2023-08-18', '2023-08-03', 1, '2023-08-29 03:51:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `curp` varchar(150) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `fecha_na` date NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `curp`, `edad`, `fecha_na`, `id_especialidad`, `fecha`) VALUES
(1, '0145756', 'Alexander', 'Castillo Cervantes', 'lex@gmail.com', 'SDFGSDFGOJDSH', '34', '2000-08-02', 1, '2023-08-28 23:48:04'),
(2, '527532', 'Emmanuel', 'Gomez Chavez', 'example@gmail.com', 'MNRFHGRTHRH6868', '22', '2023-08-20', 5, '2023-08-20 15:31:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_rol` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `correo`, `password`, `fecha`, `id_rol`, `imagen`) VALUES
(5, 'Administrador', 'admin@gmail.com', '$2y$05$rSGStdVtYXAeIMxNwVR1suYBn4LT7zwImjLKvEMTT7Rxx1kKlCA8W', '2023-08-19 22:40:13', 1, ''),
(20, 'Emanuel', 'saul@gmail.com', '$2y$05$4rVBmwaaBu2Auh.XH87jFeNmrPdsgDL9JFL680q/QwKIeLpNpu7BW', '2023-08-29 00:37:24', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
