-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2024 a las 04:35:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `code_bar` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cedula`, `nombre`, `code_bar`, `email`, `imagen`) VALUES
(1109000333, 'karlitha', '3b50112dd3e27896b2479c6e9f9bdd29', 'py352842@gmail.com', '../img/barcode_1710300562.png'),
(1109000577, 'larry garcia', '90b2076af0908a16e444c19a74390de8', 'bladimirpar25@gmail.com', '../img/barcode_1710299518.png'),
(1109000587, 'kati la katarina no ', '9ae80008d4cf7968be6f880ca2a83b9b', 'garcialarry575@gmail.com', '../img/barcode_1710299550.png'),
(1109000654, 'mama', '648add016d064c994aeefa56c9badd25', 'bladimirpar25@gmail.com', '../img/barcode_1710299875.png'),
(1109000999, 'marlon', '0fdda59042de29fa37331dd3e5dd58b6', 'py352842@hjja', '../img/barcode_1710299706.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
