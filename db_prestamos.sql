-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2023 a las 15:21:11
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_prestamos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consecutivoPrestamo` ()   BEGIN
SELECT MAX(idprestamo) as consecutivo FROM prestamos;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `initcap` (`cadena` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_spanish_ci  BEGIN
DECLARE pos INT DEFAULT 0;
DECLARE tmp VARCHAR(255)
DEFAULT '';
DECLARE result VARCHAR(255) DEFAULT '';
REPEAT SET pos = LOCATE(' ', cadena);
IF pos = 0 THEN SET pos = CHAR_LENGTH(cadena);
END IF;
SET tmp = LEFT(cadena,pos);
IF CHAR_LENGTH(tmp) < 3 THEN SET result = CONCAT(result, tmp);
ELSE SET result = CONCAT(result, UPPER(LEFT(tmp,1)),SUBSTR(tmp,2));
END IF;
SET cadena = RIGHT(cadena,CHAR_LENGTH(cadena)-pos);
UNTIL CHAR_LENGTH(cadena) = 0 END REPEAT;
RETURN result;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `departamentoid` int(11) NOT NULL,
  `municipioid` int(11) DEFAULT NULL,
  `ocupacion` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fechacreado` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `identificacion`, `nombres`, `apellidos`, `telefono`, `correo`, `departamentoid`, `municipioid`, `ocupacion`, `direccion`, `fechacreado`, `estado`) VALUES
(1, '79425387', 'Arismendi', 'Güiza', 3508473267, 'arismendi.guiza@gmail.com', 1, 1, 4, 'Cra 12 Bis 34C 17 Sur apto. 3-304', '2023-04-25 12:28:06', 1),
(2, '1001425845', 'Samir', 'Güiza Triana', 3135260235, 'samir.guiza@gmail.com', 3, 149, 1, 'Cra 12 Bis 34C 17 Sur apto. 3-304', '2023-04-25 12:51:03', 1),
(3, '54234258', 'Yaneth', 'Triana Betancur', 3134585485, 'yanethtriana@hotmail.com', 3, 149, 1, 'Cra 11C # 4 09 Sur', '2023-04-26 12:43:45', 1),
(4, '1001299657', 'Simon', 'Güiza Triana', 3504926797, 'simon.guiza@gmail.com', 3, 149, 2, 'Cra 12 Bis # 34C 17 Sur', '2023-04-26 12:48:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `iddepartamento` int(11) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`iddepartamento`, `departamento`, `codigo`) VALUES
(1, 'Antioquia', 5),
(2, 'Atlantico', 8),
(3, 'Bogotá D.C.', 11),
(4, 'Bolivar', 13),
(5, 'Boyaca', 15),
(6, 'Caldas', 17),
(7, 'Caqueta', 18),
(8, 'Cauca', 19),
(9, 'Cesar', 20),
(10, 'Cordoba', 23),
(11, 'Cundinamarca', 25),
(12, 'Choco', 27),
(13, 'Huila', 41),
(14, 'La Guajira', 44),
(15, 'Magdalena', 47),
(16, 'Meta', 50),
(17, 'Nariño', 52),
(18, 'Norte de Santander', 54),
(19, 'Quindio', 63),
(20, 'Risaralda', 66),
(21, 'Santander', 68),
(22, 'Sucre', 70),
(23, 'Tolima', 73),
(24, 'Valle', 76),
(25, 'Arauca', 81),
(26, 'Casanare', 85),
(27, 'Putumayo', 86),
(28, 'San Andres', 88),
(29, 'Amazonas', 91),
(30, 'Guainia', 94),
(31, 'Guaviare', 95),
(32, 'Vaupes', 97),
(33, 'Vichada', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `titulo`, `descripcion`, `estado`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Clientes', 'Clientes', 1),
(3, 'Préstamos', 'Préstamos', 1),
(4, 'Pagos', 'Pagos', 1),
(5, 'Usuarios', 'Usuarios', 1),
(6, 'Roles', 'Roles', 1),
(7, 'Reportes', 'Reportes', 1),
(8, 'Contabilidad', 'Contabilidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `idmunicipio` int(11) NOT NULL,
  `departamentoid` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `municipio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`idmunicipio`, `departamentoid`, `codigo`, `municipio`) VALUES
(1, 1, 1, 'Medellin'),
(2, 1, 2, 'Abejorral'),
(3, 1, 4, 'Abriaqui'),
(4, 1, 21, 'Alejandria'),
(5, 1, 30, 'Amaga'),
(6, 1, 31, 'Amalfi'),
(7, 1, 34, 'Andes'),
(8, 1, 36, 'Angelopolis'),
(9, 1, 38, 'Angostura'),
(10, 1, 40, 'Anori'),
(11, 1, 42, 'Antioquia'),
(12, 1, 44, 'Anza'),
(13, 1, 45, 'Apartado'),
(14, 1, 51, 'Arboletes'),
(15, 1, 55, 'Argelia'),
(16, 1, 59, 'Armenia'),
(17, 1, 79, 'Barbosa'),
(18, 1, 86, 'Belmira'),
(19, 1, 88, 'Bello'),
(20, 1, 91, 'Betania'),
(21, 1, 93, 'Betulia'),
(22, 1, 101, 'Bolivar'),
(23, 1, 107, 'Briceño'),
(24, 1, 113, 'Buritica'),
(25, 1, 120, 'Caceres'),
(26, 1, 125, 'Caicedo'),
(27, 1, 129, 'Caldas'),
(28, 1, 134, 'Campamento'),
(29, 1, 138, 'Cañasgordas'),
(30, 1, 142, 'Caracoli'),
(31, 1, 145, 'Caramanta'),
(32, 1, 147, 'Carepa'),
(33, 1, 148, 'Carmen de Viboral'),
(34, 1, 150, 'Carolina'),
(35, 1, 154, 'Caucasia'),
(36, 1, 172, 'Chigorodo'),
(37, 1, 190, 'Cisneros'),
(38, 1, 197, 'Cocorna'),
(39, 1, 206, 'Concepcion'),
(40, 1, 209, 'Concordia'),
(41, 1, 212, 'Copacabana'),
(42, 1, 234, 'Dabeiba'),
(43, 1, 237, 'Don Matias'),
(44, 1, 240, 'Ebejico'),
(45, 1, 250, 'El Bagre'),
(46, 1, 264, 'Entrerrios'),
(47, 1, 266, 'Envigado'),
(48, 1, 282, 'Fredonia'),
(49, 1, 284, 'Frontino'),
(50, 1, 306, 'Giraldo'),
(51, 1, 308, 'Girardota'),
(52, 1, 310, 'Gomez Plata'),
(53, 1, 313, 'Granada'),
(54, 1, 315, 'Guadalupe'),
(55, 1, 318, 'Guarne'),
(56, 1, 321, 'Guatape'),
(57, 1, 347, 'Heliconia'),
(58, 1, 353, 'Hispania'),
(59, 1, 360, 'Itagui'),
(60, 1, 361, 'Ituango'),
(61, 1, 364, 'Jardin'),
(62, 1, 368, 'Jerico'),
(63, 1, 376, 'La Ceja'),
(64, 1, 380, 'La Estrella'),
(65, 1, 390, 'La Pintada'),
(66, 1, 400, 'La Union'),
(67, 1, 411, 'Liborina'),
(68, 1, 425, 'Maceo'),
(69, 1, 440, 'Marinilla'),
(70, 1, 467, 'Montebello'),
(71, 1, 475, 'Murindo'),
(72, 1, 480, 'Mutata'),
(73, 1, 483, 'Nariño'),
(74, 1, 490, 'Necocli'),
(75, 1, 495, 'Nechi'),
(76, 1, 501, 'Olaya'),
(77, 1, 541, 'Peñol'),
(78, 1, 543, 'Peque'),
(79, 1, 576, 'Pueblorrico'),
(80, 1, 579, 'Puerto Berrio'),
(81, 1, 585, 'Puerto Nare'),
(82, 1, 591, 'Puerto Triunfo'),
(83, 1, 604, 'Remedios'),
(84, 1, 607, 'Retiro'),
(85, 1, 615, 'Rionegro'),
(86, 1, 628, 'Sabanalarga'),
(87, 1, 631, 'Sabaneta'),
(88, 1, 642, 'Salgar'),
(89, 1, 647, 'San Andres'),
(90, 1, 649, 'San Carlos'),
(91, 1, 652, 'San Francisco'),
(92, 1, 656, 'San Jeronimo'),
(93, 1, 658, 'San Jose de la Montaña'),
(94, 1, 659, 'San Juan de Uraba'),
(95, 1, 660, 'San Luis'),
(96, 1, 664, 'San Pedro'),
(97, 1, 665, 'San Pedro de Uraba'),
(98, 1, 667, 'San Rafael'),
(99, 1, 670, 'San Roque'),
(100, 1, 674, 'San Vicente'),
(101, 1, 679, 'Santa Barbara'),
(102, 1, 686, 'Santa Rosa de Osos'),
(103, 1, 690, 'Santo Domingo'),
(104, 1, 697, 'Santuario'),
(105, 1, 736, 'Segovia'),
(106, 1, 756, 'Sonson'),
(107, 1, 761, 'Sopetran'),
(108, 1, 789, 'Tamesis'),
(109, 1, 790, 'Taraza'),
(110, 1, 792, 'Tarso'),
(111, 1, 809, 'Titiribi'),
(112, 1, 819, 'Toledo'),
(113, 1, 837, 'Turbo'),
(114, 1, 842, 'Uramita'),
(115, 1, 847, 'Urrao'),
(116, 1, 854, 'Valdivia'),
(117, 1, 856, 'Valparaiso'),
(118, 1, 858, 'Vegachi'),
(119, 1, 861, 'Venecia'),
(120, 1, 873, 'Vigia Del Fuerte'),
(121, 1, 885, 'Yali'),
(122, 1, 887, 'Yarumal'),
(123, 1, 890, 'Yolombo'),
(124, 1, 893, 'Yondo'),
(125, 1, 895, 'Zaragoza'),
(126, 2, 1, 'Barranquilla'),
(127, 2, 78, 'Baranoa'),
(128, 2, 137, 'Campo de la Cruz'),
(129, 2, 141, 'Candelaria'),
(130, 2, 296, 'Galapa'),
(131, 2, 372, 'Juan de Acosta'),
(132, 2, 421, 'Luruaco'),
(133, 2, 433, 'Malambo'),
(134, 2, 436, 'Manati'),
(135, 2, 520, 'Palmar de Varela'),
(136, 2, 549, 'Piojo'),
(137, 2, 558, 'Polo Nuevo'),
(138, 2, 560, 'Ponedera'),
(139, 2, 573, 'Puerto Colombia'),
(140, 2, 606, 'Repelon'),
(141, 2, 634, 'Sabanagrande'),
(142, 2, 638, 'Sabanalarga'),
(143, 2, 675, 'Santa Lucia'),
(144, 2, 685, 'Santo Tomas'),
(145, 2, 758, 'Soledad'),
(146, 2, 770, 'Suan'),
(147, 2, 832, 'Tubara'),
(148, 2, 849, 'Usiacuri'),
(149, 3, 1, 'Bogotá D.C.'),
(150, 3, 1, 'Usaquen'),
(151, 3, 2, 'Chapinero'),
(152, 3, 3, 'Santa fe'),
(153, 3, 4, 'San Cristobal'),
(154, 3, 5, 'Usme'),
(155, 3, 6, 'Tunjuelito'),
(156, 3, 7, 'Bosa'),
(157, 3, 8, 'Kennedy'),
(158, 3, 9, 'Fontibon'),
(159, 3, 10, 'Engativa'),
(160, 3, 11, 'Suba'),
(161, 3, 12, 'Barrios Unidos'),
(162, 3, 13, 'Teusaquillo'),
(163, 3, 14, 'Martires'),
(164, 3, 15, 'Antonio Nariño'),
(165, 3, 16, 'Puente Aranda'),
(166, 3, 17, 'Candelaria'),
(167, 3, 18, 'Rafael Uribe'),
(168, 3, 19, 'Ciudad Bolivar'),
(169, 3, 20, 'Sumapaz'),
(170, 4, 1, 'Cartagena'),
(171, 4, 6, 'Achi'),
(172, 4, 30, 'Altos Del Rosario'),
(173, 4, 42, 'Arenal'),
(174, 4, 52, 'Arjona'),
(175, 4, 62, 'Arroyohondo'),
(176, 4, 74, 'Barranco de Loba'),
(177, 4, 140, 'Calamar'),
(178, 4, 160, 'Cantagallo'),
(179, 4, 188, 'Cicuco'),
(180, 4, 212, 'Cordoba'),
(181, 4, 222, 'Clemencia'),
(182, 4, 244, 'El Carmen de Bolivar'),
(183, 4, 248, 'El Guamo'),
(184, 4, 268, 'El Peñon'),
(185, 4, 300, 'Hatillo de Loba'),
(186, 4, 430, 'Magangue'),
(187, 4, 433, 'Mahates'),
(188, 4, 440, 'Margarita'),
(189, 4, 442, 'Maria la Baja'),
(190, 4, 458, 'Montecristo'),
(191, 4, 468, 'Mompos'),
(192, 4, 473, 'Morales'),
(193, 4, 549, 'Pinillos'),
(194, 4, 580, 'Regidor'),
(195, 4, 600, 'Rio Viejo'),
(196, 4, 620, 'San Cristobal'),
(197, 4, 647, 'San Estanislao'),
(198, 4, 650, 'San Fernando'),
(199, 4, 654, 'San Jacinto'),
(200, 4, 655, 'San Jacinto Del Cauca'),
(201, 4, 657, 'San Juan Nepomuceno'),
(202, 4, 667, 'San Martin de Loba'),
(203, 4, 670, 'San Pablo'),
(204, 4, 673, 'Santa Catalina'),
(205, 4, 683, 'Santa Rosa'),
(206, 4, 688, 'Santa Rosa Del sur'),
(207, 4, 744, 'Simiti'),
(208, 4, 760, 'Soplaviento'),
(209, 4, 780, 'Talaigua Nuevo'),
(210, 4, 810, 'Tiquisio'),
(211, 4, 836, 'Turbaco'),
(212, 4, 838, 'Turbana'),
(213, 4, 873, 'Villanueva'),
(214, 4, 894, 'Zambrano'),
(215, 5, 1, 'Tunja'),
(216, 5, 22, 'Almeida'),
(217, 5, 47, 'Aquitania'),
(218, 5, 51, 'Arcabuco'),
(219, 5, 87, 'Belen'),
(220, 5, 90, 'Berbeo'),
(221, 5, 92, 'Beteitiva'),
(222, 5, 97, 'Boavita'),
(223, 5, 104, 'Boyaca'),
(224, 5, 106, 'Briceño'),
(225, 5, 109, 'Buenavista'),
(226, 5, 114, 'Busbanza'),
(227, 5, 131, 'Caldas'),
(228, 5, 135, 'Campohermoso'),
(229, 5, 162, 'Cerinza'),
(230, 5, 172, 'Chinavita'),
(231, 5, 176, 'Chiquinquira'),
(232, 5, 180, 'Chiscas'),
(233, 5, 183, 'Chita'),
(234, 5, 185, 'Chitaraque'),
(235, 5, 187, 'Chivata'),
(236, 5, 189, 'Cienega'),
(237, 5, 204, 'Combita'),
(238, 5, 212, 'Coper'),
(239, 5, 215, 'Corrales'),
(240, 5, 218, 'Covarachia'),
(241, 5, 223, 'Cubara'),
(242, 5, 224, 'Cucaita'),
(243, 5, 226, 'Cuitiva'),
(244, 5, 232, 'Chiquiza'),
(245, 5, 236, 'Chivor'),
(246, 5, 238, 'Duitama'),
(247, 5, 244, 'El Cocuy'),
(248, 5, 248, 'El Espino'),
(249, 5, 272, 'Firavitoba'),
(250, 5, 276, 'Floresta'),
(251, 5, 293, 'Gachantiva'),
(252, 5, 296, 'Gameza'),
(253, 5, 299, 'Garagoa'),
(254, 5, 317, 'Guacamayas'),
(255, 5, 322, 'Guateque'),
(256, 5, 325, 'Guayata'),
(257, 5, 332, 'Guican'),
(258, 5, 362, 'Iza'),
(259, 5, 367, 'Jenesano'),
(260, 5, 368, 'Jerico'),
(261, 5, 377, 'Labranzagrande'),
(262, 5, 380, 'La Capilla'),
(263, 5, 401, 'La Victoria'),
(264, 5, 403, 'La Uvita'),
(265, 5, 407, 'Villa de Leiva'),
(266, 5, 425, 'Macanal'),
(267, 5, 442, 'Maripi'),
(268, 5, 455, 'Miraflores'),
(269, 5, 464, 'Mongua'),
(270, 5, 466, 'Mongui'),
(271, 5, 469, 'Moniquira'),
(272, 5, 476, 'Motavita'),
(273, 5, 480, 'Muzo'),
(274, 5, 491, 'Nobsa'),
(275, 5, 494, 'Nuevo Colon'),
(276, 5, 500, 'Oicata'),
(277, 5, 507, 'Otanche'),
(278, 5, 511, 'Pachavita'),
(279, 5, 514, 'Paez'),
(280, 5, 516, 'Paipa'),
(281, 5, 518, 'Pajarito'),
(282, 5, 522, 'Panqueba'),
(283, 5, 531, 'Pauna'),
(284, 5, 533, 'Paya'),
(285, 5, 537, 'Paz Del rio'),
(286, 5, 542, 'Pesca'),
(287, 5, 550, 'Pisba'),
(288, 5, 572, 'Puerto Boyaca'),
(289, 5, 580, 'Quipama'),
(290, 5, 599, 'Ramiriqui'),
(291, 5, 600, 'Raquira'),
(292, 5, 621, 'Rondon'),
(293, 5, 632, 'Saboya'),
(294, 5, 638, 'Sachica'),
(295, 5, 646, 'Samaca'),
(296, 5, 660, 'San Eduardo'),
(297, 5, 664, 'San Jose de Pare'),
(298, 5, 667, 'San Luis de Gaceno'),
(299, 5, 673, 'San Mateo'),
(300, 5, 676, 'San Miguel de Sema'),
(301, 5, 681, 'San Pablo de Borbur'),
(302, 5, 686, 'Santana'),
(303, 5, 690, 'Santa Maria'),
(304, 5, 693, 'Santa Rosa de Viterbo'),
(305, 5, 696, 'Santa Sofia'),
(306, 5, 720, 'Sativanorte'),
(307, 5, 723, 'Sativasur'),
(308, 5, 740, 'Siachoque'),
(309, 5, 753, 'Soata'),
(310, 5, 755, 'Socota'),
(311, 5, 757, 'Socha'),
(312, 5, 759, 'Sogamoso'),
(313, 5, 761, 'Somondoco'),
(314, 5, 762, 'Sora'),
(315, 5, 763, 'Sotaquira'),
(316, 5, 764, 'Soraca'),
(317, 5, 774, 'Susacon'),
(318, 5, 776, 'Sutamarchan'),
(319, 5, 778, 'Sutatenza'),
(320, 5, 790, 'Tasco'),
(321, 5, 798, 'Tenza'),
(322, 5, 804, 'Tibana'),
(323, 5, 806, 'Tibasosa'),
(324, 5, 808, 'Tinjaca'),
(325, 5, 810, 'Tipacoque'),
(326, 5, 814, 'Toca'),
(327, 5, 816, 'Togui'),
(328, 5, 820, 'Topaga'),
(329, 5, 822, 'Tota'),
(330, 5, 832, 'Tunungua'),
(331, 5, 835, 'Turmeque'),
(332, 5, 837, 'Tuta'),
(333, 5, 839, 'Tutasa'),
(334, 5, 842, 'Umbita'),
(335, 5, 861, 'Ventaquemada'),
(336, 5, 879, 'Viracacha'),
(337, 5, 897, 'Zetaquira'),
(338, 6, 1, 'Manizales'),
(339, 6, 13, 'Aguadas'),
(340, 6, 42, 'Anserma'),
(341, 6, 50, 'Aranzazu'),
(342, 6, 88, 'Belalcazar'),
(343, 6, 174, 'Chinchina'),
(344, 6, 272, 'Filadelfia'),
(345, 6, 380, 'La Dorada'),
(346, 6, 388, 'La Merced'),
(347, 6, 433, 'Manzanares'),
(348, 6, 442, 'Marmato'),
(349, 6, 444, 'Marquetalia'),
(350, 6, 446, 'Marulanda'),
(351, 6, 486, 'Neira'),
(352, 6, 495, 'Norcasia'),
(353, 6, 513, 'Pacora'),
(354, 6, 524, 'Palestina'),
(355, 6, 541, 'Pensilvania'),
(356, 6, 614, 'Riosucio'),
(357, 6, 616, 'Risaralda'),
(358, 6, 653, 'Salamina'),
(359, 6, 662, 'Samana'),
(360, 6, 665, 'San Jose'),
(361, 6, 777, 'Supia'),
(362, 6, 867, 'Victoria'),
(363, 6, 873, 'Villamaria'),
(364, 6, 877, 'Viterbo'),
(365, 7, 1, 'Florencia'),
(366, 7, 29, 'Albania'),
(367, 7, 94, 'Belen de Los Andaquies'),
(368, 7, 150, 'Cartagena Del Chaira'),
(369, 7, 205, 'Curillo'),
(370, 7, 247, 'El Doncello'),
(371, 7, 256, 'El Paujil'),
(372, 7, 410, 'La Montañita'),
(373, 7, 460, 'Milan'),
(374, 7, 479, 'Morelia'),
(375, 7, 592, 'Puerto Rico'),
(376, 7, 610, 'San Jose de Fragua'),
(377, 7, 753, 'San Vicente Del Caguan'),
(378, 7, 756, 'Solano'),
(379, 7, 785, 'Solita'),
(380, 7, 860, 'Valparaiso'),
(381, 8, 1, 'Popayan'),
(382, 8, 22, 'Almaguer'),
(383, 8, 50, 'Argelia'),
(384, 8, 75, 'Balboa'),
(385, 8, 100, 'Bolivar'),
(386, 8, 110, 'Buenos Aires'),
(387, 8, 130, 'Cajibio'),
(388, 8, 137, 'Caldono'),
(389, 8, 142, 'Caloto'),
(390, 8, 212, 'Corinto'),
(391, 8, 256, 'El Tambo'),
(392, 8, 290, 'Florencia'),
(393, 8, 318, 'Guapi'),
(394, 8, 355, 'Inza'),
(395, 8, 364, 'Jambalo'),
(396, 8, 392, 'La Sierra'),
(397, 8, 397, 'La Vega'),
(398, 8, 418, 'Lopez (Micay)'),
(399, 8, 450, 'Mercaderes'),
(400, 8, 455, 'Miranda'),
(401, 8, 473, 'Morales'),
(402, 8, 513, 'Padilla'),
(403, 8, 517, 'Paez'),
(404, 8, 532, 'Patia'),
(405, 8, 533, 'Piamonte'),
(406, 8, 548, 'Piendamo'),
(407, 8, 573, 'Puerto Tejada'),
(408, 8, 585, 'Purace'),
(409, 8, 622, 'Rosas'),
(410, 8, 693, 'San Sebastian'),
(411, 8, 698, 'Santander de Quilichao'),
(412, 8, 701, 'Santa Rosa'),
(413, 8, 743, 'Silvia'),
(414, 8, 760, 'Sotara'),
(415, 8, 780, 'Suarez'),
(416, 8, 807, 'Timbio'),
(417, 8, 809, 'Timbiqui'),
(418, 8, 821, 'Toribio'),
(419, 8, 824, 'Totoro'),
(420, 8, 845, 'Villarica'),
(421, 9, 1, 'Valledupar'),
(422, 9, 11, 'Aguachica'),
(423, 9, 13, 'Agustin Codazzi'),
(424, 9, 32, 'Astrea'),
(425, 9, 45, 'Becerril'),
(426, 9, 60, 'Bosconia'),
(427, 9, 175, 'Chimichagua'),
(428, 9, 178, 'Chiriguana'),
(429, 9, 228, 'Curumani'),
(430, 9, 238, 'El Copey'),
(431, 9, 250, 'El Paso'),
(432, 9, 295, 'Gamarra'),
(433, 9, 310, 'Gonzalez'),
(434, 9, 383, 'La Gloria'),
(435, 9, 400, 'La Jagua Ibirico'),
(436, 9, 443, 'Manaure'),
(437, 9, 517, 'Pailitas'),
(438, 9, 550, 'Pelaya'),
(439, 9, 570, 'Pueblo Bello'),
(440, 9, 614, 'Rio de oro'),
(441, 9, 621, 'La Paz'),
(442, 9, 710, 'San Alberto'),
(443, 9, 750, 'San Diego'),
(444, 9, 770, 'San Martin'),
(445, 9, 787, 'Tamalameque'),
(446, 10, 1, 'Monteria'),
(447, 10, 68, 'Ayapel'),
(448, 10, 79, 'Buenavista'),
(449, 10, 90, 'Canalete'),
(450, 10, 162, 'Cerete'),
(451, 10, 168, 'Chima'),
(452, 10, 182, 'Chinu'),
(453, 10, 189, 'Cienaga de Oro'),
(454, 10, 300, 'Cotorra'),
(455, 10, 350, 'La Apartada'),
(456, 10, 417, 'Lorica'),
(457, 10, 419, 'Los Cordobas'),
(458, 10, 464, 'Momil'),
(459, 10, 466, 'Montelibano'),
(460, 10, 500, 'Moñitos'),
(461, 10, 555, 'Planeta Rica'),
(462, 10, 570, 'Pueblo Nuevo'),
(463, 10, 574, 'Puerto Escondido'),
(464, 10, 580, 'Puerto Libertador'),
(465, 10, 586, 'Purisima'),
(466, 10, 660, 'Sahagun'),
(467, 10, 670, 'San Andres Sotavento'),
(468, 10, 672, 'San Antero'),
(469, 10, 675, 'San Bernardo Del Viento'),
(470, 10, 678, 'San Carlos'),
(471, 10, 686, 'San Pelayo'),
(472, 10, 807, 'Tierralta'),
(473, 10, 855, 'Valencia'),
(474, 11, 1, 'Agua de Dios'),
(475, 11, 19, 'Alban'),
(476, 11, 35, 'Anapoima'),
(477, 11, 40, 'Anolaima'),
(478, 11, 53, 'Arbelaez'),
(479, 11, 86, 'Beltran'),
(480, 11, 95, 'Bituima'),
(481, 11, 99, 'Bojaca'),
(482, 11, 120, 'Cabrera'),
(483, 11, 123, 'Cachipay'),
(484, 11, 126, 'Cajica'),
(485, 11, 148, 'Caparrapi'),
(486, 11, 151, 'Caqueza'),
(487, 11, 154, 'Carmen de Carupa'),
(488, 11, 168, 'Chaguani'),
(489, 11, 175, 'Chia'),
(490, 11, 178, 'Chipaque'),
(491, 11, 181, 'Choachi'),
(492, 11, 183, 'Choconta'),
(493, 11, 200, 'Cogua'),
(494, 11, 214, 'Cota'),
(495, 11, 224, 'Cucunuba'),
(496, 11, 245, 'El Colegio'),
(497, 11, 258, 'El Peñon'),
(498, 11, 260, 'El Rosal'),
(499, 11, 269, 'Facatativa'),
(500, 11, 279, 'Fomeque'),
(501, 11, 281, 'Fosca'),
(502, 11, 286, 'Funza'),
(503, 11, 288, 'Fuquene'),
(504, 11, 290, 'Fusagasuga'),
(505, 11, 293, 'Gachala'),
(506, 11, 295, 'Gachancipa'),
(507, 11, 297, 'Gacheta'),
(508, 11, 299, 'Gama'),
(509, 11, 307, 'Girardot'),
(510, 11, 312, 'Granada'),
(511, 11, 317, 'Guacheta'),
(512, 11, 320, 'Guaduas'),
(513, 11, 322, 'Guasca'),
(514, 11, 324, 'Guataqui'),
(515, 11, 326, 'Guatavita'),
(516, 11, 328, 'Guayabal de Siquima'),
(517, 11, 335, 'Guayabetal'),
(518, 11, 339, 'Gutierrez'),
(519, 11, 368, 'Jerusalen'),
(520, 11, 372, 'Junin'),
(521, 11, 377, 'La Calera'),
(522, 11, 386, 'La Mesa'),
(523, 11, 394, 'La Palma'),
(524, 11, 398, 'La Peña'),
(525, 11, 402, 'La Vega'),
(526, 11, 407, 'Lenguazaque'),
(527, 11, 426, 'Macheta'),
(528, 11, 430, 'Madrid'),
(529, 11, 436, 'Manta'),
(530, 11, 438, 'Medina'),
(531, 11, 473, 'Mosquera'),
(532, 11, 483, 'Nariño'),
(533, 11, 486, 'Nemocon'),
(534, 11, 488, 'Nilo'),
(535, 11, 489, 'Nimaima'),
(536, 11, 491, 'Nocaima'),
(537, 11, 506, 'Venecia'),
(538, 11, 513, 'Pacho'),
(539, 11, 518, 'Paime'),
(540, 11, 524, 'Pandi'),
(541, 11, 530, 'Paratebueno'),
(542, 11, 535, 'Pasca'),
(543, 11, 572, 'Puerto Salgar'),
(544, 11, 580, 'Puli'),
(545, 11, 592, 'Quebradanegra'),
(546, 11, 594, 'Quetame'),
(547, 11, 596, 'Quipile'),
(548, 11, 599, 'Apulo (rafael Reyes)'),
(549, 11, 612, 'Ricaurte'),
(550, 11, 645, 'San Antonio Del Tequendama'),
(551, 11, 649, 'San Bernardo'),
(552, 11, 653, 'San Cayetano'),
(553, 11, 658, 'San Francisco'),
(554, 11, 662, 'San Juan de Rioseco'),
(555, 11, 718, 'Sasaima'),
(556, 11, 736, 'Sesquile'),
(557, 11, 740, 'Sibate'),
(558, 11, 743, 'Silvania'),
(559, 11, 745, 'Simijaca'),
(560, 11, 754, 'Soacha'),
(561, 11, 758, 'Sopo'),
(562, 11, 769, 'Subachoque'),
(563, 11, 772, 'Suesca'),
(564, 11, 777, 'Supata'),
(565, 11, 779, 'Susa'),
(566, 11, 781, 'Sutatausa'),
(567, 11, 785, 'Tabio'),
(568, 11, 793, 'Tausa'),
(569, 11, 797, 'Tena'),
(570, 11, 799, 'Tenjo'),
(571, 11, 805, 'Tibacuy'),
(572, 11, 807, 'Tibirita'),
(573, 11, 815, 'Tocaima'),
(574, 11, 817, 'Tocancipa'),
(575, 11, 823, 'Topaipi'),
(576, 11, 839, 'Ubala'),
(577, 11, 841, 'Ubaque'),
(578, 11, 843, 'Ubate'),
(579, 11, 845, 'Une'),
(580, 11, 851, 'Utica'),
(581, 11, 862, 'Vergara'),
(582, 11, 867, 'Viani'),
(583, 11, 871, 'Villagomez'),
(584, 11, 873, 'Villapinzon'),
(585, 11, 875, 'Villeta'),
(586, 11, 878, 'Viota'),
(587, 11, 885, 'Yacopi'),
(588, 11, 898, 'Zipacon'),
(589, 11, 899, 'Zipaquira'),
(590, 12, 1, 'Quibdo'),
(591, 12, 6, 'Acandi'),
(592, 12, 25, 'Alto Baudo'),
(593, 12, 50, 'Atrato'),
(594, 12, 73, 'Bagado'),
(595, 12, 75, 'Bahia Solano '),
(596, 12, 77, 'Bajo Baudo'),
(597, 12, 99, 'Bojaya'),
(598, 12, 135, 'Canton de San Pablo'),
(599, 12, 205, 'Condoto'),
(600, 12, 245, 'El Carmen de Atrato'),
(601, 12, 250, 'Litoral Del Bajo San Juan'),
(602, 12, 361, 'Istmina'),
(603, 12, 372, 'Jurado'),
(604, 12, 413, 'Lloro'),
(605, 12, 425, 'Medio Atrato'),
(606, 12, 430, 'Medio Baudo'),
(607, 12, 491, 'Novita'),
(608, 12, 495, 'Nuqui'),
(609, 12, 600, 'Rioquito'),
(610, 12, 615, 'Riosucio'),
(611, 12, 660, 'San Jose Del Palmar'),
(612, 12, 745, 'Sipi'),
(613, 12, 787, 'Tado'),
(614, 12, 800, 'Unguia'),
(615, 12, 810, 'Union Panamericana'),
(616, 13, 1, 'Neiva'),
(617, 13, 6, 'Acevedo'),
(618, 13, 13, 'Agrado'),
(619, 13, 16, 'Aipe'),
(620, 13, 20, 'Algeciras'),
(621, 13, 26, 'Altamira'),
(622, 13, 78, 'Baraya'),
(623, 13, 132, 'Campoalegre'),
(624, 13, 206, 'Colombia'),
(625, 13, 244, 'Elias'),
(626, 13, 298, 'Garzon'),
(627, 13, 306, 'Gigante'),
(628, 13, 319, 'Guadalupe'),
(629, 13, 349, 'Hobo'),
(630, 13, 357, 'Iquira'),
(631, 13, 359, 'Isnos'),
(632, 13, 378, 'La Argentina'),
(633, 13, 396, 'La Plata'),
(634, 13, 483, 'Nataga'),
(635, 13, 503, 'Oporapa'),
(636, 13, 518, 'Paicol'),
(637, 13, 524, 'Palermo'),
(638, 13, 530, 'Palestina'),
(639, 13, 548, 'Pital'),
(640, 13, 551, 'Pitalito'),
(641, 13, 615, 'Rivera'),
(642, 13, 660, 'Saladoblanco'),
(643, 13, 668, 'San Agustin'),
(644, 13, 676, 'Santa Maria'),
(645, 13, 770, 'Suaza'),
(646, 13, 791, 'Tarqui'),
(647, 13, 797, 'Tesalia'),
(648, 13, 799, 'Tello'),
(649, 13, 801, 'Teruel'),
(650, 13, 807, 'Timana'),
(651, 13, 872, 'Villavieja'),
(652, 13, 885, 'Yaguara'),
(653, 14, 1, 'Riohacha'),
(654, 14, 78, 'Barrancas'),
(655, 14, 90, 'Dibulla'),
(656, 14, 98, 'Distraccion'),
(657, 14, 110, 'El Molino'),
(658, 14, 279, 'Fonseca'),
(659, 14, 378, 'Hatonuevo'),
(660, 14, 420, 'La Jagua Del Pilar'),
(661, 14, 430, 'Maicao'),
(662, 14, 560, 'Manaure'),
(663, 14, 650, 'San Juan Del Cesar'),
(664, 14, 847, 'Uribia'),
(665, 14, 855, 'Urumita'),
(666, 14, 874, 'Villanueva'),
(667, 15, 1, 'Santa Marta'),
(668, 15, 30, 'Algarrobo'),
(669, 15, 53, 'Aracataca'),
(670, 15, 58, 'Ariguani'),
(671, 15, 161, 'Cerro San Antonio'),
(672, 15, 170, 'Chivolo'),
(673, 15, 189, 'Cienaga'),
(674, 15, 205, 'Concordia'),
(675, 15, 245, 'El Banco'),
(676, 15, 258, 'El Piñon'),
(677, 15, 268, 'El Reten'),
(678, 15, 288, 'Fundacion'),
(679, 15, 318, 'Guamal'),
(680, 15, 541, 'Pedraza'),
(681, 15, 545, 'Pijiño Del Carmen'),
(682, 15, 551, 'Pivijay'),
(683, 15, 555, 'Plato'),
(684, 15, 570, 'Puebloviejo'),
(685, 15, 605, 'Remolino'),
(686, 15, 660, 'Sabanas de San Angel'),
(687, 15, 675, 'Salamina'),
(688, 15, 692, 'San Sebastian de Buenavista'),
(689, 15, 703, 'San Zenon'),
(690, 15, 707, 'Santa ana'),
(691, 15, 745, 'Sitionuevo'),
(692, 15, 798, 'Tenerife'),
(693, 16, 1, 'Villavicencio'),
(694, 16, 6, 'Acacias'),
(695, 16, 110, 'Barranca de Upia'),
(696, 16, 124, 'Cabuyaro'),
(697, 16, 150, 'Castilla la Nueva'),
(698, 16, 223, 'San Luis de Cubarral'),
(699, 16, 226, 'Cumaral'),
(700, 16, 245, 'El Calvario'),
(701, 16, 251, 'El Castillo'),
(702, 16, 270, 'El Dorado'),
(703, 16, 287, 'Fuente de oro'),
(704, 16, 313, 'Granada'),
(705, 16, 318, 'Guamal'),
(706, 16, 325, 'Mapiripan'),
(707, 16, 330, 'Mesetas'),
(708, 16, 350, 'La Macarena'),
(709, 16, 370, 'La Uribe'),
(710, 16, 400, 'Lejanias'),
(711, 16, 450, 'Puerto Concordia'),
(712, 16, 568, 'Puerto Gaitan'),
(713, 16, 573, 'Puerto Lopez'),
(714, 16, 577, 'Puerto Lleras'),
(715, 16, 590, 'Puerto Rico'),
(716, 16, 606, 'Restrepo'),
(717, 16, 680, 'San Carlos de Guaroa'),
(718, 16, 683, 'San Juan de Arama'),
(719, 16, 686, 'San Juanito'),
(720, 16, 689, 'San Martin'),
(721, 16, 711, 'Vistahermosa'),
(722, 17, 1, 'Pasto'),
(723, 17, 19, 'Alban'),
(724, 17, 22, 'Aldana'),
(725, 17, 36, 'Ancuya'),
(726, 17, 51, 'Arboleda'),
(727, 17, 79, 'Barbacoas'),
(728, 17, 83, 'Belen'),
(729, 17, 110, 'Buesaco'),
(730, 17, 203, 'Colon'),
(731, 17, 207, 'Consaca'),
(732, 17, 210, 'Contadero'),
(733, 17, 215, 'Cordoba'),
(734, 17, 224, 'Cuaspud '),
(735, 17, 227, 'Cumbal'),
(736, 17, 233, 'Cumbitara'),
(737, 17, 240, 'Chachagui'),
(738, 17, 250, 'El Charco'),
(739, 17, 254, 'El Peñol'),
(740, 17, 256, 'El Rosario'),
(741, 17, 258, 'El Tablon'),
(742, 17, 260, 'El Tambo'),
(743, 17, 287, 'Funes'),
(744, 17, 317, 'Guachucal'),
(745, 17, 320, 'Guaitarilla'),
(746, 17, 323, 'Gualmatan'),
(747, 17, 352, 'Iles'),
(748, 17, 354, 'Imues'),
(749, 17, 356, 'Ipiales'),
(750, 17, 378, 'La Cruz'),
(751, 17, 381, 'La Florida'),
(752, 17, 385, 'La Llanada'),
(753, 17, 390, 'La Tola'),
(754, 17, 399, 'La Union'),
(755, 17, 405, 'Leiva'),
(756, 17, 411, 'Linares'),
(757, 17, 418, 'Los Andes'),
(758, 17, 427, 'Magui'),
(759, 17, 435, 'Mallama'),
(760, 17, 473, 'Mosquera'),
(761, 17, 490, 'Olaya Herrera'),
(762, 17, 506, 'Ospina'),
(763, 17, 520, 'Francisco Pizarro'),
(764, 17, 540, 'Policarpa'),
(765, 17, 560, 'Potosi'),
(766, 17, 565, 'Providencia'),
(767, 17, 573, 'Puerres'),
(768, 17, 585, 'Pupiales'),
(769, 17, 612, 'Ricaurte'),
(770, 17, 621, 'Roberto Payan'),
(771, 17, 678, 'Samaniego'),
(772, 17, 683, 'Sandona'),
(773, 17, 685, 'San Bernardo'),
(774, 17, 687, 'San Lorenzo'),
(775, 17, 693, 'San Pablo'),
(776, 17, 694, 'San Pedro de Cartago'),
(777, 17, 696, 'Santa Barbara'),
(778, 17, 699, 'Santa Cruz'),
(779, 17, 720, 'Sapuyes'),
(780, 17, 786, 'Taminango'),
(781, 17, 788, 'Tangua'),
(782, 17, 835, 'Tumaco'),
(783, 17, 838, 'Tuquerres'),
(784, 17, 885, 'Yacuanquer'),
(785, 18, 1, 'Cucuta'),
(786, 18, 3, 'Abrego'),
(787, 18, 51, 'Arboledas'),
(788, 18, 99, 'Bochalema'),
(789, 18, 109, 'Bucarasica'),
(790, 18, 125, 'Cacota'),
(791, 18, 128, 'Cachira'),
(792, 18, 172, 'Chinacota'),
(793, 18, 174, 'Chitaga'),
(794, 18, 206, 'Convencion'),
(795, 18, 223, 'Cucutilla'),
(796, 18, 239, 'Durania'),
(797, 18, 245, 'El Carmen'),
(798, 18, 250, 'El Tarra'),
(799, 18, 261, 'El Zulia'),
(800, 18, 313, 'Gramalote'),
(801, 18, 344, 'Hacari'),
(802, 18, 347, 'Herran'),
(803, 18, 377, 'Labateca'),
(804, 18, 385, 'La Esperanza'),
(805, 18, 398, 'La Playa'),
(806, 18, 405, 'Los Patios'),
(807, 18, 418, 'Lourdes'),
(808, 18, 480, 'Mutiscua'),
(809, 18, 498, 'Ocaña'),
(810, 18, 518, 'Pamplona'),
(811, 18, 520, 'Pamplonita'),
(812, 18, 553, 'Puerto Santander'),
(813, 18, 599, 'Ragonvalia'),
(814, 18, 660, 'Salazar'),
(815, 18, 670, 'San Calixto'),
(816, 18, 673, 'San Cayetano'),
(817, 18, 680, 'Santiago'),
(818, 18, 720, 'Sardinata'),
(819, 18, 743, 'Silos'),
(820, 18, 800, 'Teorama'),
(821, 18, 810, 'Tibu'),
(822, 18, 820, 'Toledo'),
(823, 18, 871, 'Villacaro'),
(824, 18, 874, 'Villa Del Rosario'),
(825, 19, 1, 'Armenia'),
(826, 19, 111, 'Buenavista'),
(827, 19, 130, 'Calarca'),
(828, 19, 190, 'Circasia'),
(829, 19, 212, 'Cordoba'),
(830, 19, 272, 'Filandia'),
(831, 19, 302, 'Genova'),
(832, 19, 401, 'La Tebaida'),
(833, 19, 470, 'Montenegro'),
(834, 19, 548, 'Pijao'),
(835, 19, 594, 'Quimbaya'),
(836, 19, 690, 'Salento'),
(837, 20, 1, 'Pereira'),
(838, 20, 45, 'Apia'),
(839, 20, 75, 'Balboa'),
(840, 20, 88, 'Belen de Umbria'),
(841, 20, 170, 'Dos Quebradas'),
(842, 20, 318, 'Guatica'),
(843, 20, 383, 'La Celia'),
(844, 20, 400, 'La Virginia'),
(845, 20, 440, 'Marsella'),
(846, 20, 456, 'Mistrato'),
(847, 20, 572, 'Pueblo Rico'),
(848, 20, 594, 'Quinchia'),
(849, 20, 682, 'Santa Rosa de Cabal'),
(850, 20, 687, 'Santuario'),
(851, 21, 1, 'Bucaramanga'),
(852, 21, 13, 'Aguada'),
(853, 21, 20, 'Albania'),
(854, 21, 51, 'Aratoca'),
(855, 21, 77, 'Barbosa'),
(856, 21, 79, 'Barichara'),
(857, 21, 81, 'Barrancabermeja'),
(858, 21, 92, 'Betulia'),
(859, 21, 101, 'Bolivar'),
(860, 21, 121, 'Cabrera'),
(861, 21, 132, 'California'),
(862, 21, 147, 'Capitanejo'),
(863, 21, 152, 'Carcasi'),
(864, 21, 160, 'Cepita'),
(865, 21, 162, 'Cerrito'),
(866, 21, 167, 'Charala'),
(867, 21, 169, 'Charta'),
(868, 21, 176, 'Chima'),
(869, 21, 179, 'Chipata'),
(870, 21, 190, 'Cimitarra'),
(871, 21, 207, 'Concepcion'),
(872, 21, 209, 'Confines'),
(873, 21, 211, 'Contratacion'),
(874, 21, 217, 'Coromoro'),
(875, 21, 229, 'Curiti'),
(876, 21, 235, 'El Carmen de Chucury'),
(877, 21, 245, 'El Guacamayo'),
(878, 21, 250, 'El Peñon'),
(879, 21, 255, 'El Playon'),
(880, 21, 264, 'Encino'),
(881, 21, 266, 'Enciso'),
(882, 21, 271, 'Florian'),
(883, 21, 276, 'Floridablanca'),
(884, 21, 296, 'Galan'),
(885, 21, 298, 'Gambita'),
(886, 21, 307, 'Giron'),
(887, 21, 318, 'Guaca'),
(888, 21, 320, 'Guadalupe'),
(889, 21, 322, 'Guapota'),
(890, 21, 324, 'Guavata'),
(891, 21, 327, 'Guepsa'),
(892, 21, 344, 'Hato'),
(893, 21, 368, 'Jesus Maria'),
(894, 21, 370, 'Jordan'),
(895, 21, 377, 'La Belleza'),
(896, 21, 385, 'Landazuri'),
(897, 21, 397, 'La paz'),
(898, 21, 406, 'Lebrija'),
(899, 21, 418, 'Los Santos'),
(900, 21, 425, 'Macaravita'),
(901, 21, 432, 'Malaga'),
(902, 21, 444, 'Matanza'),
(903, 21, 464, 'Mogotes'),
(904, 21, 468, 'Molagavita'),
(905, 21, 498, 'Ocamonte'),
(906, 21, 500, 'Oiba'),
(907, 21, 502, 'Onzaga'),
(908, 21, 522, 'Palmar'),
(909, 21, 524, 'Palmas Del Socorro'),
(910, 21, 533, 'Paramo'),
(911, 21, 547, 'Piedecuesta'),
(912, 21, 549, 'Pinchote'),
(913, 21, 572, 'Puente Nacional'),
(914, 21, 573, 'Puerto Parra'),
(915, 21, 575, 'Puerto Wilches'),
(916, 21, 615, 'Rionegro'),
(917, 21, 655, 'Sabana de Torres'),
(918, 21, 669, 'San Andres'),
(919, 21, 673, 'San Benito'),
(920, 21, 679, 'San gil'),
(921, 21, 682, 'San Joaquin'),
(922, 21, 684, 'San Jose de Miranda'),
(923, 21, 686, 'San Miguel'),
(924, 21, 689, 'San Vicente de Chucuri'),
(925, 21, 705, 'Santa Barbara'),
(926, 21, 720, 'Santa Helena Del Opon'),
(927, 21, 745, 'Simacota'),
(928, 21, 755, 'Socorro'),
(929, 21, 770, 'Suaita'),
(930, 21, 773, 'Sucre'),
(931, 21, 780, 'Surata'),
(932, 21, 820, 'Tona'),
(933, 21, 855, 'Valle San Jose'),
(934, 21, 861, 'Velez'),
(935, 21, 867, 'Vetas'),
(936, 21, 872, 'Villanueva'),
(937, 21, 895, 'Zapatoca'),
(938, 22, 1, 'Sincelejo'),
(939, 22, 110, 'Buenavista'),
(940, 22, 124, 'Caimito'),
(941, 22, 204, 'Coloso'),
(942, 22, 215, 'Corozal'),
(943, 22, 230, 'Chalan'),
(944, 22, 235, 'Galeras'),
(945, 22, 265, 'Guaranda'),
(946, 22, 400, 'La Union'),
(947, 22, 418, 'Los Palmitos'),
(948, 22, 429, 'Majagual'),
(949, 22, 473, 'Morroa'),
(950, 22, 508, 'Ovejas'),
(951, 22, 523, 'Palmito'),
(952, 22, 670, 'Sampues'),
(953, 22, 678, 'San Benito Abad'),
(954, 22, 702, 'San Juan de Betulia'),
(955, 22, 708, 'San Marcos'),
(956, 22, 713, 'San Onofre'),
(957, 22, 717, 'San Pedro'),
(958, 22, 742, 'Since'),
(959, 22, 771, 'Sucre'),
(960, 22, 820, 'Tolu'),
(961, 22, 823, 'Toluviejo'),
(962, 23, 1, 'Ibague'),
(963, 23, 24, 'Alpujarra'),
(964, 23, 26, 'Alvarado'),
(965, 23, 30, 'Ambalema'),
(966, 23, 43, 'Anzoategui'),
(967, 23, 55, 'Armero'),
(968, 23, 67, 'Ataco'),
(969, 23, 124, 'Cajamarca'),
(970, 23, 148, 'Carmen Apicala'),
(971, 23, 152, 'Casabianca'),
(972, 23, 168, 'Chaparral'),
(973, 23, 200, 'Coello'),
(974, 23, 217, 'Coyaima'),
(975, 23, 226, 'Cunday'),
(976, 23, 236, 'Dolores'),
(977, 23, 268, 'Espinal'),
(978, 23, 270, 'Falan'),
(979, 23, 275, 'Flandes'),
(980, 23, 283, 'Fresno'),
(981, 23, 319, 'Guamo'),
(982, 23, 347, 'Herveo'),
(983, 23, 349, 'Honda'),
(984, 23, 352, 'Icononzo'),
(985, 23, 408, 'Lerida'),
(986, 23, 411, 'Libano'),
(987, 23, 443, 'Mariquita'),
(988, 23, 449, 'Melgar'),
(989, 23, 461, 'Murillo'),
(990, 23, 483, 'Natagaima'),
(991, 23, 504, 'Ortega'),
(992, 23, 520, 'Palocabildo'),
(993, 23, 547, 'Piedras'),
(994, 23, 555, 'Planadas'),
(995, 23, 563, 'Prado'),
(996, 23, 585, 'Purificacion'),
(997, 23, 616, 'Rioblanco'),
(998, 23, 622, 'Roncesvalles'),
(999, 23, 624, 'Rovira'),
(1000, 23, 671, 'Saldaña'),
(1001, 23, 675, 'San Antonio'),
(1002, 23, 678, 'San Luis'),
(1003, 23, 686, 'Santa Isabel'),
(1004, 23, 770, 'Suarez'),
(1005, 23, 854, 'Valle de San Juan'),
(1006, 23, 861, 'Venadillo'),
(1007, 23, 870, 'Villahermosa'),
(1008, 23, 873, 'Villarrica'),
(1009, 24, 1, 'Cali'),
(1010, 24, 20, 'Alcala'),
(1011, 24, 36, 'Andalucia'),
(1012, 24, 41, 'Ansermanuevo'),
(1013, 24, 54, 'Argelia'),
(1014, 24, 100, 'Bolivar'),
(1015, 24, 109, 'Buenaventura'),
(1016, 24, 111, 'Buga'),
(1017, 24, 113, 'Bugalagrande'),
(1018, 24, 122, 'Caicedonia'),
(1019, 24, 126, 'Calima'),
(1020, 24, 130, 'Candelaria'),
(1021, 24, 147, 'Cartago'),
(1022, 24, 233, 'Dagua'),
(1023, 24, 243, 'El Aguila'),
(1024, 24, 246, 'El Cairo'),
(1025, 24, 248, 'El Cerrito'),
(1026, 24, 250, 'El Dovio'),
(1027, 24, 275, 'Florida'),
(1028, 24, 306, 'Ginebra'),
(1029, 24, 318, 'Guacari'),
(1030, 24, 364, 'Jamundi'),
(1031, 24, 377, 'La Cumbre'),
(1032, 24, 400, 'La Union'),
(1033, 24, 403, 'La Victoria'),
(1034, 24, 497, 'Obando'),
(1035, 24, 520, 'Palmira'),
(1036, 24, 563, 'Pradera'),
(1037, 24, 606, 'Restrepo'),
(1038, 24, 616, 'Riofrio'),
(1039, 24, 622, 'Roldanillo'),
(1040, 24, 670, 'San Pedro'),
(1041, 24, 736, 'Sevilla'),
(1042, 24, 823, 'Toro'),
(1043, 24, 828, 'Trujillo'),
(1044, 24, 834, 'Tulua'),
(1045, 24, 845, 'Ulloa'),
(1046, 24, 863, 'Versalles'),
(1047, 24, 869, 'Vijes'),
(1048, 24, 890, 'Yotoco'),
(1049, 24, 892, 'Yumbo'),
(1050, 24, 895, 'Zarzal'),
(1051, 25, 1, 'Arauca'),
(1052, 25, 65, 'Arauquita'),
(1053, 25, 220, 'Cravo Norte'),
(1054, 25, 300, 'Fortul'),
(1055, 25, 591, 'Puerto Rondon'),
(1056, 25, 736, 'Saravena'),
(1057, 25, 794, 'Tame'),
(1058, 26, 1, 'Yopal'),
(1059, 26, 10, 'Aguazul'),
(1060, 26, 15, 'Chameza'),
(1061, 26, 125, 'Hato Corozal'),
(1062, 26, 136, 'La Salina'),
(1063, 26, 139, 'Mani'),
(1064, 26, 162, 'Monterrey'),
(1065, 26, 225, 'Nunchia'),
(1066, 26, 230, 'Orocue'),
(1067, 26, 250, 'Paz de Ariporo'),
(1068, 26, 263, 'Pore'),
(1069, 26, 279, 'Recetor'),
(1070, 26, 300, 'Sabanalarga'),
(1071, 26, 315, 'Sacama'),
(1072, 26, 325, 'San Luis de Palenque'),
(1073, 26, 400, 'Tamara'),
(1074, 26, 410, 'Tauramena'),
(1075, 26, 430, 'Trinidad'),
(1076, 26, 440, 'Villanueva'),
(1077, 27, 1, 'Mocoa'),
(1078, 27, 219, 'Colon'),
(1079, 27, 320, 'Orito'),
(1080, 27, 568, 'Puerto Asis'),
(1081, 27, 569, 'Puerto Caicedo'),
(1082, 27, 571, 'Puerto Guzman'),
(1083, 27, 573, 'Puerto Leguizamo'),
(1084, 27, 749, 'Sibundoy'),
(1085, 27, 755, 'San Francisco'),
(1086, 27, 757, 'San Miguel'),
(1087, 27, 760, 'Santiago'),
(1088, 27, 865, 'La Hormiga'),
(1089, 27, 885, 'Villagarzon'),
(1090, 28, 1, 'San Andres'),
(1091, 28, 564, 'Providencia'),
(1092, 29, 1, 'Leticia'),
(1093, 29, 263, 'El Encanto'),
(1094, 29, 405, 'La Chorrera'),
(1095, 29, 407, 'La Pedrera'),
(1096, 29, 430, 'La Victoria'),
(1097, 29, 460, 'Miriti-parana'),
(1098, 29, 530, 'Puerto Alegria'),
(1099, 29, 536, 'Puerto Arica'),
(1100, 29, 540, 'Puerto Nariño'),
(1101, 29, 669, 'Puerto Santander'),
(1102, 29, 798, 'Tarapaca'),
(1103, 30, 1, 'Puerto Inirida'),
(1104, 30, 343, 'Barranco Minas'),
(1105, 30, 883, 'San Felipe'),
(1106, 30, 884, 'Puerto Colombia'),
(1107, 30, 885, 'La Guadalupe'),
(1108, 30, 886, 'Cacahual'),
(1109, 30, 887, 'Pana Pana'),
(1110, 30, 888, 'Morichal'),
(1111, 31, 1, 'San Jose Del Guaviare'),
(1112, 31, 15, 'Calamar'),
(1113, 31, 25, 'El Retorno'),
(1114, 31, 200, 'Miraflores'),
(1115, 32, 1, 'Mitu'),
(1116, 32, 161, 'Caruru'),
(1117, 32, 511, 'Pacoa'),
(1118, 32, 666, 'Taraira'),
(1119, 32, 777, 'Papunaua'),
(1120, 32, 889, 'Yavarate'),
(1121, 33, 1, 'Puerto Carreño'),
(1122, 33, 524, 'La Primavera'),
(1123, 33, 572, 'Santa Rita'),
(1124, 33, 666, 'Santa Rosalia'),
(1125, 33, 760, 'San Jose de Ocune'),
(1126, 33, 773, 'Cumaribo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL,
  `prestamoid` int(11) NOT NULL,
  `num_cuota` int(11) NOT NULL,
  `fecha_cuota` date NOT NULL,
  `valor_cuota` decimal(10,0) NOT NULL,
  `interes` decimal(10,0) NOT NULL,
  `capital` decimal(10,0) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `fecha_pago` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpago`, `prestamoid`, `num_cuota`, `fecha_cuota`, `valor_cuota`, `interes`, `capital`, `saldo`, `fecha_pago`, `estado`) VALUES
(1, 1, 1, '2023-08-16', '35705', '4000', '31705', '168295', '2023-07-16 11:41:32', 1),
(2, 1, 2, '2023-09-16', '35705', '3366', '32339', '135956', '2023-07-16 11:41:32', 1),
(3, 1, 3, '2023-10-16', '35705', '2719', '32986', '102970', '2023-07-16 11:41:32', 1),
(4, 1, 4, '2023-11-16', '35705', '2059', '33646', '69324', '2023-07-16 11:41:32', 1),
(5, 1, 5, '2023-12-16', '35705', '1386', '34319', '35005', '2023-07-16 11:41:32', 1),
(6, 1, 6, '2024-01-16', '35705', '700', '35005', '0', '2023-07-16 11:41:32', 1),
(7, 2, 1, '2023-08-16', '15313', '554', '14759', '105241', '2023-07-16 11:43:24', 1),
(8, 2, 2, '2023-08-23', '15313', '486', '14827', '90413', '2023-07-16 11:43:24', 1),
(9, 2, 3, '2023-08-30', '15313', '417', '14896', '75517', '2023-07-16 11:43:24', 1),
(10, 2, 4, '2023-09-06', '15313', '349', '14965', '60553', '2023-07-16 11:43:24', 1),
(11, 2, 5, '2023-09-13', '15313', '279', '15034', '45519', '2023-07-16 11:43:24', 1),
(12, 2, 6, '2023-09-20', '15313', '210', '15103', '30416', '2023-07-16 11:43:24', 1),
(13, 2, 7, '2023-09-27', '15313', '140', '15173', '15243', '2023-07-16 11:43:24', 1),
(14, 2, 8, '2023-10-04', '15313', '70', '15243', '0', '2023-07-16 11:43:24', 1),
(15, 3, 1, '2023-08-16', '51003', '1500', '49503', '100497', '2023-07-16 11:46:23', 1),
(16, 3, 2, '2023-08-31', '51003', '1005', '49998', '50498', '2023-07-16 11:46:23', 1),
(17, 3, 3, '2023-09-15', '51003', '505', '50498', '0', '2023-07-16 11:46:23', 1),
(18, 4, 1, '2023-08-16', '10030', '53', '9977', '70023', '2023-07-16 11:52:12', 1),
(19, 4, 2, '2023-08-17', '10030', '46', '9984', '60039', '2023-07-16 11:52:12', 1),
(20, 4, 3, '2023-08-18', '10030', '39', '9990', '50049', '2023-07-16 11:52:12', 1),
(21, 4, 4, '2023-08-19', '10030', '33', '9997', '40053', '2023-07-16 11:52:12', 1),
(22, 4, 5, '2023-08-20', '10030', '26', '10003', '30049', '2023-07-16 11:52:12', 1),
(23, 4, 6, '2023-08-21', '10030', '20', '10010', '20039', '2023-07-16 11:52:12', 1),
(24, 4, 7, '2023-08-22', '10030', '13', '10016', '10023', '2023-07-16 11:52:12', 1),
(25, 4, 8, '2023-08-23', '10030', '7', '10023', '0', '2023-07-16 11:52:12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `rolid` int(11) NOT NULL,
  `moduloid` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(86, 3, 1, 1, 0, 0, 0),
(87, 3, 2, 0, 0, 0, 0),
(88, 3, 3, 1, 1, 1, 1),
(89, 3, 4, 1, 1, 1, 1),
(90, 3, 5, 0, 0, 0, 0),
(91, 3, 6, 0, 0, 0, 0),
(92, 3, 7, 0, 0, 0, 0),
(93, 3, 8, 0, 0, 0, 0),
(270, 2, 1, 1, 1, 0, 0),
(271, 2, 2, 1, 1, 0, 0),
(272, 2, 3, 1, 1, 0, 0),
(273, 2, 4, 1, 1, 0, 0),
(274, 2, 5, 1, 1, 0, 0),
(275, 2, 6, 1, 0, 0, 0),
(276, 2, 7, 1, 0, 0, 0),
(277, 2, 8, 0, 0, 0, 0),
(278, 5, 1, 1, 1, 1, 0),
(279, 5, 2, 1, 1, 1, 1),
(280, 5, 3, 1, 1, 1, 1),
(281, 5, 4, 1, 1, 1, 1),
(282, 5, 5, 0, 0, 0, 0),
(283, 5, 6, 0, 0, 0, 0),
(284, 5, 7, 1, 0, 0, 0),
(285, 5, 8, 1, 0, 0, 0),
(294, 1, 1, 1, 1, 1, 1),
(295, 1, 2, 1, 1, 1, 1),
(296, 1, 3, 1, 1, 1, 1),
(297, 1, 4, 1, 1, 1, 1),
(298, 1, 5, 1, 1, 1, 1),
(299, 1, 6, 1, 1, 1, 1),
(300, 1, 7, 1, 1, 1, 1),
(301, 1, 8, 1, 1, 1, 1),
(310, 4, 1, 1, 1, 0, 0),
(311, 4, 2, 1, 1, 1, 1),
(312, 4, 3, 1, 1, 1, 1),
(313, 4, 4, 1, 1, 1, 1),
(314, 4, 5, 1, 0, 0, 0),
(315, 4, 6, 1, 0, 0, 0),
(316, 4, 7, 0, 0, 0, 0),
(317, 4, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `nombrefiscal` varchar(80) DEFAULT NULL,
  `direccionfiscal` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `prestamos` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `estado`, `prestamos`) VALUES
(1, '79425387', 'Arismendi', 'Güiza Medina', '350-847-3267', 'arismendi@info.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', NULL, NULL, NULL, NULL, 1, '2023-05-28 10:00:47', 1, 0),
(2, '85147236', 'Carlos', 'Rodriguez', '320-456-8520', 'carlos@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, 2, '2023-05-28 10:01:48', 1, 0),
(3, '65412025', 'Monica', 'Bejarano', '320-456-8521', 'monica@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, 4, '2023-05-28 10:52:27', 0, 0),
(4, '74521222', 'Paula', 'Escobar', '320-458-4111', 'paula@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '8004524257', 'Papeleria El Trebol', 'Calle 27 # 12 - 40 Sur local 102', NULL, 3, '2023-05-29 08:31:47', 1, 1),
(5, '1001299654', 'Simon', 'Güiza Triana', '350-492-6797', 'simon@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, 3, '2023-05-29 08:52:23', 1, 1),
(8, '62456258', 'Camila', 'Torres', '312-456-8521', 'camila@info.com', 'c7bb76525cef4b2914b40d109114b2da520731183c2616bef33509262dbc4ca7', '800456123', 'Panaderia el Trebol', 'Cra 12 # 26 - 45 Sur', NULL, 4, '2023-06-16 10:39:59', 1, 0),
(9, '641256200', 'Sandra', 'Castellanos', '312-456-8205', 'sandra@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', 'Calle 64 # 20 - 45 apto 404', NULL, 4, '2023-06-18 11:56:10', 0, 0),
(10, '85456205', 'Felipe', 'Rosas', '350-458-9562', 'felipe@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '800456285', 'Distibuidora Caracas', 'Cra 105 # 15 - 25', NULL, 3, '2023-06-18 12:46:23', 2, 0),
(11, '85456250', 'Victor Manuel', 'Ozuna', '312-458-6810', 'victor@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '900456285', 'Surtidora el Trigal', 'Calle 84 # 45 - 65 Local 202', NULL, 3, '2023-06-18 12:49:21', 1, 1),
(12, '60456123', 'Alberto', 'Sanchez', '312-458-6025', 'alberto@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', 'Calle 85 # 12 - 52', NULL, 3, '2023-06-18 12:51:52', 0, 0),
(13, '8352678', 'Angela', 'Garcia', '312-458-6205', 'angela@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', 'Calle 68 # 52 - 45 Cali', NULL, 3, '2023-06-18 12:53:44', 0, 0),
(14, '68456201', 'Amanda', 'Torres Lopez', '320-456-8520', 'amanda@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '900456258', 'Distribuidora El Rosal', 'Calle 120 # 65 -85 Ofic 404', NULL, 3, '2023-06-18 12:59:12', 1, 0),
(15, '51234258', 'Yaneth', 'Triana Betancur', '313-458-5485', 'yanethtriana@hotmail.com', 'ff3bc24a9113a29c3ade4e0b08b81cc3ac5561a6e78a5822caf3eefc8394f4dd', '', '', 'Cra 11C # 4 -11 Sur', NULL, 3, '2023-07-01 11:07:21', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idprestamo` int(11) NOT NULL,
  `personaid` int(11) NOT NULL,
  `monto_credito` decimal(11,0) NOT NULL,
  `interes` decimal(11,0) NOT NULL,
  `num_cuotas` int(3) NOT NULL,
  `valor_cuota` decimal(11,0) NOT NULL,
  `monto_total` decimal(10,0) NOT NULL,
  `forma_pago` varchar(15) NOT NULL,
  `moneda` varchar(5) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idprestamo`, `personaid`, `monto_credito`, `interes`, `num_cuotas`, `valor_cuota`, `monto_total`, `forma_pago`, `moneda`, `fecha_prestamo`, `estado`) VALUES
(1, 11, '200000', '24', 6, '35705', '214231', 'Mensual', 'COP', '2023-07-16', 1),
(2, 5, '120000', '24', 8, '15313', '122506', 'Semanal', 'COP', '2023-07-16', 1),
(3, 15, '150000', '24', 3, '51003', '153010', 'Quincenal', 'COP', '2023-07-16', 1),
(4, 4, '80000', '24', 8, '10030', '80237', 'Diario', 'COP', '2023-07-16', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporteprestamos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `reporteprestamos` (
`idprestamo` int(11)
,`cliente` varchar(181)
,`fecha_prestamo` date
,`monto_credito` decimal(11,0)
,`forma_pago` varchar(15)
,`num_cuotas` int(3)
,`interes` decimal(11,0)
,`valor_cuota` decimal(11,0)
,`intereses` decimal(12,0)
,`monto_total` decimal(10,0)
,`abonos` decimal(32,0)
,`estado` int(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Supervisor', 'Supervisor del sistema', 1),
(3, 'Cliente', 'Clientes del sistema', 1),
(4, 'Agente', 'Agente de crédito', 1),
(5, 'Tesorero', 'Tesorero de la sucursal', 1),
(6, 'Contador', 'Contador del sistema', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `token` varchar(100) NOT NULL,
  `rolid` int(11) NOT NULL DEFAULT 1,
  `fechacreado` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `clave`, `token`, `rolid`, `fechacreado`, `estado`) VALUES
(1, '79425387', 'Arismendi', 'Güiza', '3508473267', 'arismendi@info.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', 1, '2023-02-06 13:50:39', 1),
(2, '68456502', 'Roberto', 'Fonseca', '3124562088', 'rf@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 2, '2023-02-20 09:02:18', 1),
(3, '59420256', 'Bibiana', 'Buitrago', '3135026320', 'arisemendi@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, '2023-02-20 09:15:08', 1),
(8, '64123897', 'Camila', 'Cifuentes', '3134568520', 'camila@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 2, '2023-05-27 09:47:45', 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `reporteprestamos`
--
DROP TABLE IF EXISTS `reporteprestamos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporteprestamos`  AS SELECT `p`.`idprestamo` AS `idprestamo`, concat(`c`.`nombres`,' ',`c`.`apellidos`) AS `cliente`, `p`.`fecha_prestamo` AS `fecha_prestamo`, `p`.`monto_credito` AS `monto_credito`, `p`.`forma_pago` AS `forma_pago`, `p`.`num_cuotas` AS `num_cuotas`, `p`.`interes` AS `interes`, `p`.`valor_cuota` AS `valor_cuota`, `p`.`monto_total`- `p`.`monto_credito` AS `intereses`, `p`.`monto_total` AS `monto_total`, sum(case when `g`.`estado` = 0 then `g`.`valor_cuota` else 0 end) AS `abonos`, `p`.`estado` AS `estado` FROM ((`prestamos` `p` join `persona` `c` on(`c`.`idpersona` = `p`.`personaid`)) join `pagos` `g` on(`g`.`prestamoid` = `p`.`idprestamo`)) GROUP BY `g`.`prestamoid``prestamoid`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `departamentoid` (`departamentoid`),
  ADD KEY `municipioid` (`municipioid`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`idmunicipio`),
  ADD KEY `departamento_id` (`departamentoid`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `prestamoid` (`prestamoid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idprestamo`),
  ADD KEY `clienteid` (`personaid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `rolid_2` (`rolid`),
  ADD KEY `rolid_3` (`rolid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `idmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1127;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idprestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`departamentoid`) REFERENCES `departamentos` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`prestamoid`) REFERENCES `prestamos` (`idprestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulos` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_3` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
