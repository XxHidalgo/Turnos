SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `caja` (
  `Id_Caja` int NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `caja` (`Id_Caja`, `Nombre`) VALUES
(1, 'AB201');

CREATE TABLE `cliente` (
  `Id_Cliente` int NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Cedula` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cliente` (`Id_Cliente`, `Nombres`, `Apellidos`, `Cedula`) VALUES
(1, 'Josue ', 'Hidalgo Luna', '402-4433194-4');

CREATE TABLE `empleado` (
  `Id_Empleado` int NOT NULL,
  `Cod_Caja` int NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `empleado` (`Id_Empleado`, `Cod_Caja`, `Nombres`, `Apellidos`, `Estado`) VALUES
(1, 1, 'Letty', 'Luna', 1);

CREATE TABLE `turno` (
  `Id_Turno` int NOT NULL,
  `Codigo` int NOT NULL,
  `Cod_Cliente` int NOT NULL,
  `Cod_Empleado` int NOT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `turno` (`Id_Turno`, `Codigo`, `Cod_Cliente`, `Cod_Empleado`, `Fecha`, `Estado`) VALUES
(65, 1, 1, 1, '2024-05-05 19:09:01', 'Terminado'),
(66, 2, 1, 1, '2024-05-05 19:31:15', 'Terminado'),
(67, 3, 1, 1, '2024-05-05 19:31:19', 'Terminado'),
(68, 4, 1, 1, '2024-05-05 19:31:26', 'Terminado'),
(69, 5, 1, 1, '2024-05-05 21:48:38', 'Terminado'),
(79, 1, 1, 1, '2024-05-06 20:19:19', 'Terminado'),
(80, 2, 1, 1, '2024-05-06 20:19:22', 'Terminado'),
(81, 3, 1, 1, '2024-05-06 20:32:07', 'Terminado'),
(82, 4, 1, 1, '2024-05-06 20:33:31', 'Terminado'),
(83, 5, 1, 1, '2024-05-06 20:41:00', 'Terminado'),
(84, 6, 1, 1, '2024-05-06 20:41:51', 'Terminado'),
(85, 7, 1, 1, '2024-05-06 20:45:16', 'Terminado'),
(86, 8, 1, 1, '2024-05-06 20:45:45', 'Terminado'),
(87, 9, 1, 1, '2024-05-06 22:10:30', 'Terminado'),
(88, 10, 1, 1, '2024-05-06 22:54:31', 'Terminado'),
(89, 11, 1, 1, '2024-05-06 22:56:11', 'Terminado'),
(90, 12, 1, 1, '2024-05-06 22:59:26', 'Terminado'),
(91, 11, 1, 1, '2024-05-06 23:07:31', 'Terminado'),
(92, 1, 1, 1, '2024-05-06 23:08:56', 'Terminado'),
(93, 1, 1, 1, '2024-05-06 23:12:36', 'Terminado'),
(94, 2, 1, 1, '2024-05-06 23:18:25', 'Terminado'),
(95, 1, 1, 1, '2024-05-06 23:34:59', 'Terminado'),
(96, 1, 1, 1, '2024-05-06 23:37:36', 'Terminado'),
(97, 2, 1, 1, '2024-05-06 23:37:37', 'Terminado'),
(98, 3, 1, 1, '2024-05-06 23:37:39', 'Terminado'),
(99, 4, 1, 1, '2024-05-06 23:37:41', 'Terminado'),
(100, 5, 1, 1, '2024-05-06 23:37:43', 'Terminado'),
(101, 6, 1, 1, '2024-05-06 23:37:45', 'Terminado'),
(102, 1, 1, 1, '2024-05-06 23:51:43', 'Terminado'),
(103, 1, 1, 1, '2024-05-06 23:53:26', 'Terminado'),
(104, 2, 1, 1, '2024-05-06 23:53:28', 'Terminado'),
(105, 3, 1, 1, '2024-05-06 23:53:29', 'Terminado'),
(106, 4, 1, 1, '2024-05-06 23:53:31', 'Terminado'),
(107, 5, 1, 1, '2024-05-06 23:53:32', 'Solicitado'),
(108, 1, 1, 1, '2024-05-07 07:50:12', 'Terminado'),
(109, 1, 1, 1, '2024-05-07 07:52:02', 'Terminado'),
(110, 2, 1, 1, '2024-05-07 07:53:44', 'Terminado'),
(111, 3, 1, 1, '2024-05-07 07:53:46', 'Terminado'),
(112, 4, 1, 1, '2024-05-07 07:56:29', 'Terminado'),
(115, 7, 1, 1, '2024-05-07 20:04:35', 'Terminado'),
(117, 1, 1, 1, '2024-05-07 20:53:01', 'Terminado');

CREATE TABLE `usuario` (
  `Id_Usuario` int NOT NULL,
  `Cod_Empleado` int NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuario` (`Id_Usuario`, `Cod_Empleado`, `Usuario`, `Contraseña`) VALUES
(1, 1, 'letty', '123');


ALTER TABLE `caja`
  ADD PRIMARY KEY (`Id_Caja`);

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`);

ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`),
  ADD KEY `fk_Cod_caja` (`Cod_Caja`);

ALTER TABLE `turno`
  ADD PRIMARY KEY (`Id_Turno`),
  ADD KEY `fk_cod_cliente` (`Cod_Cliente`),
  ADD KEY `fk_Cod_Empleado` (`Cod_Empleado`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `fk_cod_empleado_u` (`Cod_Empleado`);


ALTER TABLE `caja`
  MODIFY `Id_Caja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `turno`
  MODIFY `Id_Turno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Cod_caja` FOREIGN KEY (`Cod_Caja`) REFERENCES `caja` (`Id_Caja`);

ALTER TABLE `turno`
  ADD CONSTRAINT `fk_cod_cliente` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Id_Cliente`),
  ADD CONSTRAINT `fk_Cod_Empleado` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Id_Empleado`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_cod_empleado_u` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Id_Empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
