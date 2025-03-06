-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 19:08:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemamedico1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id_Agenda` int(11) NOT NULL,
  `id_Medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id_Agenda`, `id_Medico`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_medica`
--

CREATE TABLE `atencion_medica` (
  `id_atencion_medica` int(11) NOT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Diagnostico` text DEFAULT NULL,
  `Fecha` date DEFAULT current_timestamp(),
  `id_Cita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atencion_medica`
--

INSERT INTO `atencion_medica` (`id_atencion_medica`, `Motivo`, `Diagnostico`, `Fecha`, `id_Cita`) VALUES
(1, 'Revisión de presión arterial', 'Hipertensión', '2025-03-05', 1),
(2, 'Control de azúcar', 'Diabetes tipo 2', '2025-03-05', 2),
(3, 'Tratamiento de asma', 'Asma aguda', '2025-03-06', 3),
(4, 'Examen ginecológico', 'Control preventivo', '2025-03-06', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_Cita` int(11) NOT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Observacion` text DEFAULT NULL,
  `Monto` float NOT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `id_Horario` int(11) DEFAULT NULL,
  `id_Especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_Cita`, `Estado`, `Observacion`, `Monto`, `id_Usuario`, `id_Horario`, `id_Especialidad`) VALUES
(1, 'Pendiente', 'Agendada a través del formulario', 0, 4, 4, 4),
(2, 'Pendiente', 'Agendada a través del formulario', 0, 4, 3, 3),
(3, 'Pendiente', 'Agendada a través del formulario', 0, 3, 1, 1),
(4, 'Atendida', 'No hay observaciones', 0, 5, 6, 5),
(7, 'Pendiente', 'Agendada a través del formulario', 0, 4, 2, 2),
(8, 'Pendiente', 'Agendada a través del formulario', 0, 4, 5, 5),
(9, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(10, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(11, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(12, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(13, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(14, 'Pendiente', 'Agendada a través del formulario', 0, 20, 6, 5),
(20, 'Pendiente', 'Agendada a través del formulario', 6788, NULL, 6, NULL),
(21, 'Pendiente', 'Agendada a través del formulario', 5667, NULL, 6, NULL),
(22, 'Pendiente', 'Agendada a través del formulario', 124, 20, 6, 5),
(23, 'Pendiente', 'Agendada a través del formulario', 53, 20, 6, 5),
(24, 'Pendiente', 'Agendada a través del formulario', 67, 20, 6, 5),
(25, 'Pendiente', 'Agendada a través del formulario', 165, 20, 6, 5),
(26, 'Pendiente', 'Agendada a través del formulario', 185, 20, 6, 5),
(27, 'Pendiente', 'Agendada a través del formulario', 144, 20, 6, 5),
(28, 'Pendiente', 'Agendada a través del formulario', 98, 20, 6, 5),
(29, 'Pendiente', 'Agendada a través del formulario', 70, 20, 4, 5),
(30, 'Pendiente', 'Agendada a través del formulario', 138, 20, 6, 5),
(31, 'Pendiente', 'Agendada a través del formulario', 142, 31, 4, 5),
(32, 'Pendiente', 'Agendada a través del formulario', 110, 32, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_Especialidad` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_Especialidad`, `Nombre`, `Descripcion`) VALUES
(1, 'Cardiología', 'Especialidad médica que se ocupa del diagnóstico y tratamiento de las enfermedades del corazón.'),
(2, 'Neurología', 'Especialidad médica que estudia el sistema nervioso y sus trastornos.'),
(3, 'Pediatría', 'Especialidad médica dedicada al cuidado de la salud infantil.'),
(4, 'Ginecología', 'Especialidad médica que se centra en el sistema reproductivo femenino.'),
(5, 'Dermatología', 'Especialidad médica que se ocupa del diagnóstico y tratamiento de las afecciones de la piel.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE `historial_medico` (
  `id_Historial` int(11) NOT NULL,
  `Fecha_Creacion` date DEFAULT current_timestamp(),
  `Diagnostico` text DEFAULT NULL,
  `Alergias` text DEFAULT NULL,
  `Enfermedades_Cronicas` text DEFAULT NULL,
  `Cirugias_Previas` text DEFAULT NULL,
  `Medicamentos_Actuales` text DEFAULT NULL,
  `Grupo_Sanguineo` varchar(10) DEFAULT NULL,
  `Antecedentes_Familiares` text DEFAULT NULL,
  `Vacunas` text DEFAULT NULL,
  `Ultima_Actualizacion` date DEFAULT current_timestamp(),
  `id_Paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_medico`
--

INSERT INTO `historial_medico` (`id_Historial`, `Fecha_Creacion`, `Diagnostico`, `Alergias`, `Enfermedades_Cronicas`, `Cirugias_Previas`, `Medicamentos_Actuales`, `Grupo_Sanguineo`, `Antecedentes_Familiares`, `Vacunas`, `Ultima_Actualizacion`, `id_Paciente`) VALUES
(1, '2025-03-01', 'Hipertensión', 'Penicilina', 'Polen', 'Apéndicsitis\r\n', 'Lisinopril', 'A-', 'Padre con diabetes', 'Vacuna contra la ', '2025-03-06', 3),
(2, '2025-03-01', 'Diabetes tipo 2', 'Ninguna', 'Diabetes tipo 2', 'Corte de rodilla', 'Metformina', 'A-', 'Madre con hipertensión', 'Vacuna contra la varicela', '2025-03-01', 4),
(3, '2025-03-03', 'Asma', 'Alergia al polen', 'Asma', 'Ninguna', 'Salbutamol', 'B+', 'Abuelo con cáncer', 'Vacuna contra la neumonía', '2025-03-01', 5),
(4, '2025-03-01', 'Artritis', 'Ninguna', 'Artritis', 'Cirugía de rodilla', 'Ibuprofeno', 'O-', 'Padre con artritis', 'Vacuna contra el tétanos', '2025-03-01', 6),
(5, '2025-03-01', 'Migrañas', 'Alergia al maní', 'Migrañas', 'Ninguna', 'Sumatriptán', 'AB+', 'Madre con hipertensión', 'Vacuna contra la hepatitis', '2025-03-01', 7),
(6, '2025-03-03', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', '2025-03-03', 2),
(7, '2025-03-03', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '2025-03-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_Horario` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora_Inicio` time DEFAULT NULL,
  `Hora_Fin` time DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `id_Agenda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_Horario`, `Fecha`, `Hora_Inicio`, `Hora_Fin`, `Estado`, `id_Agenda`) VALUES
(1, '2025-03-04', '09:00:00', '12:00:00', 'Reservada', 1),
(2, '2025-03-06', '13:00:00', '16:00:00', 'Reservada', 2),
(3, '2025-03-07', '09:00:00', '12:00:00', 'Reservada', 3),
(4, '2025-03-04', '13:00:00', '16:00:00', 'Reservada', 6),
(5, '2025-03-06', '09:00:00', '12:00:00', 'Disponible', 6),
(6, '2025-03-05', '21:00:00', '22:00:00', 'Reservada', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_Laboratorio` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `id_Historial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_Laboratorio`, `Nombre`, `Direccion`, `id_Historial`) VALUES
(1, 'Laboratorio Alpha', 'Calle Ficticia 123, Ciudad ABC', 1),
(2, 'Laboratorio Beta', 'Avenida Principal 456, Ciudad XYZ', 2),
(3, 'Laboratorio Gamma', 'Calle Secundaria 789, Ciudad LMN', 3),
(4, 'Laboratorio Delta', 'Plaza Central 101, Ciudad PQR', 4),
(5, 'Laboratorio Epsilon', 'Calle 5, Zona 7, Ciudad DEF', 5),
(6, 'Buena Aventura', 'B/Narcizo - C/General', 1),
(7, 'Ojitos Locos', 'B/Senac', 1),
(12, 'wattfi', 'C/Ballivia', 1),
(19, 'www', 'ww', 1),
(20, 'Consultorio Luis Navarro', 'C/Madrid', 1),
(21, 'fff', 'C/nose', 6),
(22, 'San Juan de Dios', 'B/Fatima', 1),
(23, 'San Juan de Dios', 'B/Panosas', 1),
(24, 'San Juan de Dios', 'B/San Jose', 1),
(25, 'San Juan de Dios', 'B/San Jose', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_Medico` int(11) NOT NULL,
  `Razon_Social` varchar(100) DEFAULT NULL,
  `Sueldo` float DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_Medico`, `Razon_Social`, `Sueldo`, `Nombre`, `Apellido`, `Direccion`, `id_Usuario`, `foto`, `descripcion`) VALUES
(1, 'Dr. Juan Pérez', 5000, 'Juan', 'Pérez', 'Calle Ficticia 123', 13, NULL, NULL),
(2, 'Dra. Laura Gómez', 5500, 'Laura', 'Gómez', 'Avenida Siempre Viva 456', 14, NULL, NULL),
(3, 'Dr. Luis Rodríguez', 6000, 'Luis', 'Rodríguez', 'Boulevard Central 789', 15, NULL, NULL),
(4, 'Dra. Marta Sánchez', 6500, 'Marta', 'Sánchez', 'Calle Luna 101', 16, NULL, NULL),
(5, 'Dr. Carlos Díaz', 7000, 'Carlos', 'Díaz', 'Calle Sol 202', 17, 'http://localhost/Clinica_D_sistemas2/Proyecto_final/src/doc1.jpg', 'Es un médico con una gran pasión por la salud y el bienestar de sus pacientes. Con años de experiencia y un enfoque cercano, se dedica tanto al tratamiento como a la prevención de enfermedades, ayudando a sus pacientes a llevar una vida más saludable.'),
(6, 'Dra. Elena Martínez', 7500, 'Elena', 'Martínez', 'Avenida del Mar 303', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_especialidad`
--

CREATE TABLE `medico_especialidad` (
  `id_Medico` int(11) NOT NULL,
  `id_Especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico_especialidad`
--

INSERT INTO `medico_especialidad` (`id_Medico`, `id_Especialidad`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_Paciente` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `id_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_Paciente`, `Nombre`, `Apellido`, `Fecha_Nacimiento`, `id_Usuario`) VALUES
(1, 'Ana', 'Pérez', '1990-05-15', 3),
(2, 'Luis', 'Gómez', '1985-08-20', 4),
(3, 'María', 'López', '2000-01-10', 5),
(4, 'Carlos', 'Martínez', '1992-07-25', 6),
(5, 'Laura', 'Hernández', '1988-11-30', 7),
(6, 'José', 'García', '1995-03-05', 8),
(7, 'Sofía', 'Rodríguez', '1993-12-15', 9),
(8, 'David', 'Fernández', '1980-02-28', 10),
(9, 'Isabel', 'Sánchez', '1998-09-10', 11),
(10, 'Pedro', 'Ramírez', '1983-06-22', 12),
(11, 'Karla', 'Torrez', '2004-04-23', 19),
(12, 'wattfi', 'vargas', '2003-09-15', 20),
(13, 'wattfi', 'vargas', '2003-09-15', 21),
(14, 'Doo wop', 'k,k', '2025-03-22', 22),
(15, 'faride', 'vargas', '2025-03-19', 23),
(16, 'faride', 'vargas', '2025-03-21', 24),
(17, 'juan', 'perez', '2025-03-21', 25),
(18, 'paquita', 'perez', '2025-03-21', 26),
(19, 'jaime', 'peres', '2025-03-13', 27),
(20, 'faride', 'assas', '2025-03-11', 28),
(21, 'wattfi', 'assas', '2025-03-13', 29),
(22, 'karla', 'Torrez', '2025-03-11', 30),
(23, 'karla', 'vargas', '2025-03-05', 31),
(24, 'faride', 'vargas', '2025-03-07', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_Pago` int(11) NOT NULL,
  `Fecha` date DEFAULT current_timestamp(),
  `Estado` varchar(50) DEFAULT NULL,
  `id_Cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_Permiso` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT current_timestamp(),
  `id_Rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_Permiso`, `Nombre`, `Descripcion`, `Activo`, `Fecha_Creacion`, `id_Rol`) VALUES
(1, 'Acceso completo', 'Permiso con acceso completo al sistema', 1, '2025-03-01', 1),
(2, 'Acceso limitado', 'Permiso con acceso restringido', 1, '2025-03-01', 2),
(3, 'Visualización solo de consultas', 'Permiso para ver solo las consultas de pacientes', 1, '2025-03-01', 3),
(4, 'Edición de pacientes', 'Permiso para editar los datos de los pacientes', 1, '2025-03-01', 2),
(5, 'Acceso a historial médico', 'Permiso para acceder a los historiales médicos', 1, '2025-03-01', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Fecha_Emision` date DEFAULT current_timestamp(),
  `id_tratamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id_receta`, `Descripcion`, `Fecha_Emision`, `id_tratamiento`) VALUES
(1, 'Receta para Lisinopril 10mg', '2025-03-05', 1),
(2, 'Receta para Metformina 500mg', '2025-03-05', 2),
(3, 'Receta para Salbutamol 100mcg', '2025-03-06', 3),
(4, 'Receta para ibuprofeno 400mg ', '2025-03-06', 4),
(5, 'Receta para Crema tópica de corticoides', '2025-03-07', 4),
(6, 'Te de anis', '2025-03-05', 18),
(7, 'Dele paracetamol', '2025-03-06', 20),
(8, '5hhhh', '2025-03-06', 21),
(9, 'ibuprofeno', '2025-03-06', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_Rol` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_Rol`, `Nombre`, `Descripcion`, `Fecha_Creacion`) VALUES
(1, 'Administrador', 'Rol con acceso completo al sistema', '2025-03-01'),
(2, 'Paciente', 'Rol asignado a los pacientes', '2025-03-01'),
(3, 'Medico', 'Rol asignado a los médicos', '2025-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `Detalle` text DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `id_atencion_medica` int(11) DEFAULT NULL,
  `id_historial_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id_tratamiento`, `Detalle`, `Estado`, `id_atencion_medica`, `id_historial_medico`) VALUES
(1, 'Recetado Lisinopril para hipertensión', 'Activo', 1, 2),
(2, 'Metformina para control de azúcar', 'Activo', 2, 2),
(3, 'Inhalador de Salbutamol para asma', 'Activo', 3, 3),
(4, 'Ibuprofeno para  el dolor de estomago', 'Pendiente', 4, 1),
(18, 'Dolor de Estomago', 'Pendiente', 4, 1),
(20, 'Dolor de Estomago ', 'Activo', 4, 1),
(21, 'dd', 'Activo', 4, 1),
(22, 'Tratamiento conjuntivitis', 'Pendiente', 4, 1),
(23, 'Tratamiento para diarrea', 'Pendiente', 4, 1),
(24, 'Tratamiento diabetes', 'Pendiente', 4, 1),
(25, 'Ibuprofeno para  el dolor de gargarta', 'Pendiente', 4, 1),
(26, 'dddf', 'Pendiente', 4, 1),
(27, 'Tratamiento conjuntivitis', 'Pendiente', 4, 1),
(28, 'Ibuprofeno para  el dolor de gargarta', 'Pendiente', 4, 1),
(29, 'Tratamiento conjuntivitis', 'Pendiente', 4, 1),
(30, 'Tratamiento conjuntivitis', 'Pendiente', 4, 1),
(31, 'Tratamiento conjuntivitis', 'Pendiente', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `Alias` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT current_timestamp(),
  `id_Rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Alias`, `Contrasena`, `Telefono`, `Correo`, `Fecha_Creacion`, `id_Rol`) VALUES
(1, 'admin1', 'contrasena1', '123456789', 'admin1@ejemplo.com', '2025-03-01', 1),
(2, 'admin2', 'contrasena2', '987654321', 'admin2@ejemplo.com', '2025-03-01', 1),
(3, 'paciente1', 'contrasena3', '123456789', 'paciente1@ejemplo.com', '2025-03-01', 2),
(4, 'paciente2', 'contrasena4', '987654321', 'paciente2@ejemplo.com', '2025-03-01', 2),
(5, 'paciente3', 'contrasena5', '555666777', 'paciente3@ejemplo.com', '2025-03-01', 2),
(6, 'paciente4', 'contrasena6', '333444555', 'paciente4@ejemplo.com', '2025-03-01', 2),
(7, 'paciente5', 'contrasena7', '666777888', 'paciente5@ejemplo.com', '2025-03-01', 2),
(8, 'paciente6', 'contrasena8', '999888777', 'paciente6@ejemplo.com', '2025-03-01', 2),
(9, 'paciente7', 'contrasena9', '555444333', 'paciente7@ejemplo.com', '2025-03-01', 2),
(10, 'paciente8', 'contrasena10', '333222111', 'paciente8@ejemplo.com', '2025-03-01', 2),
(11, 'paciente9', 'contrasena11', '777666555', 'paciente9@ejemplo.com', '2025-03-01', 2),
(12, 'paciente10', 'contrasena12', '888777666', 'paciente10@ejemplo.com', '2025-03-01', 2),
(13, 'medico1', 'contrasena13', '123123123', 'medico1@ejemplo.com', '2025-03-01', 3),
(14, 'medico2', 'contrasena14', '321321321', 'medico2@ejemplo.com', '2025-03-01', 3),
(15, 'medico3', 'contrasena15', '555555555', 'medico3@ejemplo.com', '2025-03-01', 3),
(16, 'medico4', 'contrasena16', '666666666', 'medico4@ejemplo.com', '2025-03-01', 3),
(17, 'medico5', 'contrasena17', '777777777', 'medico5@ejemplo.com', '2025-03-01', 3),
(18, 'medico6', 'contrasena18', '888888888', 'medico6@ejemplo.com', '2025-03-01', 3),
(19, 'karly', '$2y$10$SalfGAJmBW9o04UKBiy0tupM/XAZmDvPg8DD1gNHGWTeJ9kW7.Mva', '59167966970', 'jkarly6028@gmail.com', '2025-03-01', 1),
(20, 'wattfi', '123', '72947160', 'wattfiv@gmail.com', '2025-03-04', 2),
(21, 'grace1804', '$2y$10$WKmCGB.MwV6Pr2Tv3JsfJe13QA3KM82vg1gSn8juVPa7YOc/yL8sS', '72947160', 'wattfiv@gmail.com', '2025-03-04', 2),
(22, 'medico4', '$2y$10$HJGvJQc/kRTZz.GemleKGu0/EWng7OnA5b4m1sxxVX29C52B/aR9G', '72947160', 'wattfiv@gmail.com', '2025-03-05', 1),
(23, 'faride4', '$2y$10$KO5DILuKN96dfohRza/5OOTvNms2DY26XSAWrQepFoG/B8quF9s0K', '6899', 'wattfiv@gmail.com', '2025-03-05', 1),
(24, 'faride4', '$2y$10$AsB8giWmxgfzywJ8T/VfMe61dv6Uv.MhgSf3e9pSNF1YHXtKW6XIG', '6899', 'er3@gmail.com', '2025-03-05', 1),
(25, 'juanperez', '$2y$10$rfLc42y/Zds3Z3ji/phyFO30pv7Fq5xpxs4zw2CJg5xCgKQcjLOdW', '68990', '5677@gmail.com', '2025-03-05', 1),
(26, 'paquita', '$2y$10$mA.Bq7VWBh/z5rFvrPNypeZGlQs/lZqjYZMnkeKLfnXk/nnddnPli', '68990', '5677@gmail.com', '2025-03-05', 2),
(27, 'jaime35', '$2y$10$Vo2uG7Wv3Xu7dsHDqEuha.yBwRKuHSl43aliKsMDGL503nusi0wlO', '56890', '5677@gmail.com', '2025-03-05', 2),
(28, 'sofi34', '$2y$10$ZSkyFJp4DEbBhC.Whotjt.ph/B4pCsvGQ97aqabLU9ZMzy96AfUHW', ' 72947160', 'wattfiv@gmail.com', '2025-03-05', 2),
(29, 'faride4', '$2y$10$mBGeOm7Dx6wTnIZTx8j3veh5z7T1RWK3Ya4DuEEv1upOK.Kx023aW', '72947160', 'er3@gmail.com', '2025-03-05', 2),
(30, 'karla123', '$2y$10$YMI.pN/Bpzx1kL8vr3lrc.TbUf/Rd/3wvJjsoM5QQfj1WgJsmbkdu', ' 72947160', 'er3@gmail.com', '2025-03-06', 2),
(31, 'karla', '$2y$10$57aRK./4CjhX1Ca1exqYTeo.3nwbIIqC1Yu9Rprd8PzWtFO4LPtgW', '72947160', 'wattfiv@gmail.com', '2025-03-06', 2),
(32, 'faride12', '$2y$10$cn5LuBtCZJM9y92FghBiPuutfA3G8XyMMc8UT3AX4bGx.GrkYeIO6', '72947160', 'wattfiv@gmail.com', '2025-03-06', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_Agenda`),
  ADD KEY `id_Medico` (`id_Medico`);

--
-- Indices de la tabla `atencion_medica`
--
ALTER TABLE `atencion_medica`
  ADD PRIMARY KEY (`id_atencion_medica`),
  ADD KEY `id_Cita` (`id_Cita`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_Cita`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Horario` (`id_Horario`),
  ADD KEY `fk_Cita_Especialidad` (`id_Especialidad`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_Especialidad`);

--
-- Indices de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD PRIMARY KEY (`id_Historial`),
  ADD KEY `id_Paciente` (`id_Paciente`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_Horario`),
  ADD KEY `id_Agenda` (`id_Agenda`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_Laboratorio`),
  ADD KEY `id_Historial` (`id_Historial`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_Medico`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `medico_especialidad`
--
ALTER TABLE `medico_especialidad`
  ADD PRIMARY KEY (`id_Medico`,`id_Especialidad`),
  ADD KEY `id_Especialidad` (`id_Especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_Paciente`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_Pago`),
  ADD KEY `id_Cita` (`id_Cita`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_Permiso`),
  ADD KEY `id_Rol` (`id_Rol`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_Rol`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_atencion_medica` (`id_atencion_medica`),
  ADD KEY `id_historial_medico` (`id_historial_medico`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD KEY `id_Rol` (`id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_Agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `atencion_medica`
--
ALTER TABLE `atencion_medica`
  MODIFY `id_atencion_medica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_Especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  MODIFY `id_Historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_Laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_Medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_Pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_Permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_Medico`) REFERENCES `medico` (`id_Medico`);

--
-- Filtros para la tabla `atencion_medica`
--
ALTER TABLE `atencion_medica`
  ADD CONSTRAINT `atencion_medica_ibfk_1` FOREIGN KEY (`id_Cita`) REFERENCES `cita` (`id_Cita`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_Horario`) REFERENCES `horarios` (`id_Horario`),
  ADD CONSTRAINT `fk_Cita_Especialidad` FOREIGN KEY (`id_Especialidad`) REFERENCES `especialidad` (`id_Especialidad`);

--
-- Filtros para la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD CONSTRAINT `historial_medico_ibfk_1` FOREIGN KEY (`id_Paciente`) REFERENCES `paciente` (`id_Paciente`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_Agenda`) REFERENCES `agenda` (`id_Agenda`);

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `laboratorio_ibfk_1` FOREIGN KEY (`id_Historial`) REFERENCES `historial_medico` (`id_Historial`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `medico_especialidad`
--
ALTER TABLE `medico_especialidad`
  ADD CONSTRAINT `medico_especialidad_ibfk_1` FOREIGN KEY (`id_Medico`) REFERENCES `medico` (`id_Medico`),
  ADD CONSTRAINT `medico_especialidad_ibfk_2` FOREIGN KEY (`id_Especialidad`) REFERENCES `especialidad` (`id_Especialidad`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_Cita`) REFERENCES `cita` (`id_Cita`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`id_Rol`) REFERENCES `rol` (`id_Rol`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamiento` (`id_tratamiento`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_atencion_medica`) REFERENCES `atencion_medica` (`id_atencion_medica`),
  ADD CONSTRAINT `tratamiento_ibfk_2` FOREIGN KEY (`id_historial_medico`) REFERENCES `historial_medico` (`id_Historial`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_Rol`) REFERENCES `rol` (`id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
