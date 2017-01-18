-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 07:05 AM
-- Server version: 5.6.30
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmiflights`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(11) NOT NULL,
  `airport` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `airport`) VALUES
(4, 'Aarhus'),
(5, 'Aberdeen'),
(6, 'Agadir'),
(7, 'Alghero'),
(8, 'Alicante'),
(9, 'Almeria'),
(10, 'Amsterdam'),
(11, 'Ancona'),
(12, 'Athens'),
(13, 'Baden-Baden'),
(14, 'Barcelona'),
(15, 'Barcelona (GRO)'),
(16, 'Barcelona (REU)'),
(17, 'Bari'),
(18, 'Basel'),
(19, 'Belfast International'),
(20, 'Bergerac'),
(21, 'Berlin (SXF)'),
(22, 'Beziers'),
(23, 'Biarritz'),
(24, 'Billund'),
(25, 'Birmingham'),
(26, 'Bologna'),
(27, 'Bordeaux'),
(28, 'Bournemouth'),
(29, 'Bratislava'),
(30, 'Bremen'),
(31, 'Brest'),
(32, 'Brindisi'),
(33, 'Bristol'),
(34, 'Brive'),
(35, 'Brno'),
(36, 'Brussels'),
(37, 'Brussels (CRL)'),
(38, 'Bucharest'),
(39, 'Budapest'),
(40, 'Bydgoszcz'),
(41, 'Cagliari'),
(42, 'Carcassonne'),
(43, 'Cardiff'),
(44, 'Castellon (Valencia)'),
(45, 'Catania'),
(46, 'Chania'),
(47, 'Clermont'),
(48, 'Cologne'),
(49, 'Comiso'),
(50, 'Copenhagen'),
(51, 'Corfu'),
(52, 'Cork'),
(53, 'Craiova'),
(54, 'Crotone'),
(55, 'Cuneo'),
(56, 'Deauville'),
(57, 'Derry'),
(58, 'Dinard'),
(59, 'Dole'),
(60, 'Dortmund'),
(61, 'Dublin'),
(62, 'Dusseldorf Weeze'),
(63, 'East Midlands'),
(64, 'Edinburgh'),
(65, 'Eilat'),
(66, 'Eindhoven'),
(67, 'Faro'),
(68, 'Fez'),
(69, 'Figari'),
(70, 'Frankfurt (HHN)'),
(71, 'Frankfurt International'),
(72, 'Fuerteventura'),
(73, 'Gdansk'),
(74, 'Genoa'),
(75, 'Glasgow'),
(76, 'Glasgow (PIK)'),
(77, 'Gothenburg (GOT)'),
(78, 'Gran Canaria'),
(79, 'Grenoble'),
(80, 'Hamburg'),
(81, 'Haugesund'),
(82, 'Ibiza'),
(83, 'Jerez'),
(84, 'Katowice'),
(85, 'Kaunas'),
(86, 'Kefalonia'),
(87, 'Kerry'),
(88, 'Knock'),
(89, 'Kos'),
(90, 'Krakow'),
(91, 'La Rochelle'),
(92, 'Lamezia'),
(93, 'Lanzarote'),
(94, 'Larnaca'),
(95, 'Leeds Bradford'),
(96, 'Leipzig'),
(97, 'Lille'),
(98, 'Limoges'),
(99, 'Linz'),
(100, 'Lisbon'),
(101, 'Liverpool'),
(102, 'Lodz'),
(103, 'London Gatwick'),
(104, 'London Luton'),
(105, 'London Stansted'),
(106, 'Lorient'),
(107, 'Lourdes'),
(108, 'Lublin'),
(109, 'Luxembourg'),
(110, 'Maastricht'),
(111, 'Madrid'),
(112, 'Malaga'),
(113, 'Mallorca'),
(114, 'Malta'),
(115, 'Manchester'),
(116, 'Marrakesh'),
(117, 'Marseille'),
(118, 'Memmingen'),
(119, 'Menorca'),
(120, 'Milan Bergamo'),
(121, 'Milan Malpensa'),
(122, 'Montpellier'),
(123, 'Murcia'),
(124, 'Mykonos'),
(125, 'Nador'),
(126, 'Nantes'),
(127, 'Newcastle'),
(128, 'Newquay Cornwall'),
(129, 'Nice'),
(130, 'Nimes'),
(131, 'Nis'),
(132, 'Nuremberg'),
(133, 'Olsztyn - Mazury'),
(134, 'Oradea'),
(135, 'Osijek'),
(136, 'Oslo'),
(137, 'Oslo (RYG)'),
(138, 'Oslo (TRF)'),
(139, 'Ostrava'),
(140, 'Oujda'),
(141, 'Palanga'),
(142, 'Palermo'),
(143, 'Paphos'),
(144, 'Paris (BVA)'),
(145, 'Paris Vatry'),
(146, 'Parma'),
(147, 'Perpignan'),
(148, 'Perugia'),
(149, 'Pescara'),
(150, 'Pisa'),
(151, 'Plovdiv'),
(152, 'Podgorica'),
(153, 'Poitiers'),
(154, 'Ponta Delgada'),
(155, 'Porto'),
(156, 'Poznan'),
(157, 'Prague'),
(158, 'Pula'),
(159, 'Rabat'),
(160, 'Rhodes'),
(161, 'Riga'),
(162, 'Rijeka'),
(163, 'Rodez'),
(164, 'Rome (CIA)'),
(165, 'Rome (FCO T2)'),
(166, 'Rzeszow'),
(167, 'Salzburg'),
(168, 'Santander'),
(169, 'Santiago'),
(170, 'Santorini'),
(171, 'Seville'),
(172, 'Shannon'),
(173, 'Smaland (VXO)'),
(174, 'Sofia'),
(175, 'St Etienne'),
(176, 'Stockholm (NYO)'),
(177, 'Stockholm (VST)'),
(178, 'Strasbourg'),
(179, 'Stuttgart'),
(180, 'Szczecin'),
(181, 'Tallinn'),
(182, 'Tampere'),
(183, 'Tangier'),
(184, 'Tenerife North'),
(185, 'Tenerife Sth'),
(186, 'Terceira Lajes'),
(187, 'Thessaloniki'),
(188, 'Timisoara'),
(189, 'Toulouse'),
(190, 'Tours Loire Valley'),
(191, 'Trapani'),
(192, 'Trieste'),
(193, 'Turin'),
(194, 'Valencia'),
(195, 'Valladolid'),
(196, 'Venice (TSF)'),
(197, 'Venice M.Polo'),
(198, 'Verona'),
(199, 'Vigo'),
(200, 'Vilnius'),
(201, 'Vitoria'),
(202, 'Warsaw (WMI)'),
(203, 'Warsaw Chopin'),
(204, 'Wroclaw'),
(205, 'Zadar'),
(206, 'Zaragoza');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `seat` varchar(5) NOT NULL,
  `business` varchar(3) NOT NULL,
  `ticket_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `seat`, `business`, `ticket_id`) VALUES
(50, 'a b', '1A', 'No', 28),
(51, 'a b', '1A', 'No', 29),
(52, 'a a', '1A', 'No', 30),
(53, 's s', '1B', 'No', 30),
(54, 'f d', '2A', 'No', 30),
(55, 'Lab233 Unibuc', '28C', 'Yes', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(3) NOT NULL,
  `fly_from` varchar(50) NOT NULL,
  `fly_to` varchar(50) NOT NULL,
  `fly_out` varchar(10) NOT NULL,
  `fly_back` varchar(10) DEFAULT NULL,
  `departure_time` varchar(5) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `fly_from`, `fly_to`, `fly_out`, `fly_back`, `departure_time`, `price`, `user_id`) VALUES
(28, 'Aarhus', 'Alicante', '15/01/2017', NULL, '00:00', '$ 50.00', 8),
(29, 'Aarhus', 'Alicante', '15/01/2017', NULL, '00:00', '$ 50.00', 8),
(30, 'Barcelona (REU)', 'London Stansted', '24/01/2017', '24/01/2017', '00:00', '$ 300.00', 8),
(31, 'Bucharest', 'Barcelona', '23/01/2017', NULL, '06:00', '$ 70.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL,
  `secret` varchar(35) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'user',
  `gender` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `secret_question` varchar(100) NOT NULL,
  `secret_response` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `secret`, `email`, `password`, `first_name`, `last_name`, `type`, `gender`, `country`, `mobile`, `secret_question`, `secret_response`) VALUES
(8, 'e22f28c1feffaa9ea8f8126b2d20e94b891', 'antone.andreas@icloud.com', 'e10adc3949ba59abbe56e057f20f883e', 'Andreas', 'Antone', 'admin', 'Male', 'RO', '0728443867', '1', '20'),
(9, 'd7e990eebb0e0bbdf7987173f49f4f009e8', 'demo@localhost.com', 'e10adc3949ba59abbe56e057f20f883e', 'John', 'Doe', 'moderator', 'Male', 'US', '0729212822', '1', '1'),
(10, 'ef7ec22bc266c68bbd0526c59352505672c', 'k2830863@mvrht.com', '25f9e794323b453885f5181f1b624d0b', 'Lab233', 'UNIBUC', 'user', 'Male', 'AR', '000000', '9', 'rony');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `airport_UNIQUE` (`airport`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Passenger` (`ticket_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Tickets` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `fk_Passenger` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_Tickets` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
