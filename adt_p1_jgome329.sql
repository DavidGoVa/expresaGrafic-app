-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 01:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adt_p1_jgome329`
--

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `prioridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `titulo`, `descripcion`, `prioridad`) VALUES
(1, 'Primer Tarea', 'Esta es mi primer tarea', 1),
(2, 'Segunda Tarea', 'esta es la segunda tarea y estoy viendo cuanto texto le cabe para saber como se vera y si su diseño es responisvo como pienso que es', 2),
(3, 'Tarea Desde Interfaz', 'Está bien?', 3),
(4, 'tarea con jquery', 'porfavor sirve', 2),
(5, 'dasd', 'asd', 1),
(6, 'Pueba', 'Otra desc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `ap_paterno` varchar(25) NOT NULL,
  `ap_materno` varchar(25) DEFAULT NULL,
  `global_id` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2,
  `areaT` varchar(200) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Desconectado',
  `correo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `ap_paterno`, `ap_materno`, `global_id`, `password`, `rol`, `areaT`, `estado`, `correo`) VALUES
(25, 'David', 'Gomez', 'Vazquez', 'jgome329', '$2y$10$oOhou3uwxAgU.j18VWTFeeFxaINEUgQh/juE9tD3Z71sLYelIcNgi', 1, 'NPS', 'Conectado', 'david@jci.com'),
(27, 'Mono', 'Monal', 'Monkiki', 'jgome111', '$2y$10$Dw999buMxoaIdA0XCiZs1.x27K0DaqmGPvi12S9eXzkZ9zCTG6fGW', 2, 'NPS', 'Desconectado', 'macaco@jci.com'),
(28, 'Ma', 'Mamica', 'Macaca', 'ma1', '$2y$10$a2u7tthq0mcjM6Wf5xJjWO/yxNJ1ts8KG.Asf.zX2/DwyiNvDE/ri', 2, 'NPS', 'Desconectado', 'ma@jci.com'),
(29, 'Manolo', 'Niño', 'A', '12345', '$2y$10$QU0cqwa.5TShY4hDJERmYeINkXI5wNpTqaYJ7kf4LEO6SzjaGZnhm', 2, 'NPS', 'Desconectado', 'mano_nino@jci.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `global_id` (`global_id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
