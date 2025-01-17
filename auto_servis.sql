-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 08:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzave`
--

CREATE TABLE `drzave` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drzave`
--

INSERT INTO `drzave` (`id`, `naziv`) VALUES
(1, 'Afganistan'),
(2, 'Albanija'),
(3, 'Alžir'),
(4, 'Andora'),
(5, 'Angola'),
(6, 'Antigva i Barbuda'),
(7, 'Argentina'),
(8, 'Armenija'),
(9, 'Australija'),
(10, 'Austrija'),
(11, 'Azerbajdžan'),
(12, 'Bahami'),
(13, 'Bahrein'),
(14, 'Bangladeš'),
(15, 'Barbados'),
(16, 'Bjelorusija'),
(17, 'Belgija'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Butan'),
(21, 'Bolivija'),
(22, 'Bosna i Hercegovina'),
(23, 'Bocvana'),
(24, 'Brazil'),
(25, 'Brunej'),
(26, 'Bugarska'),
(27, 'Burkina Faso'),
(28, 'Burundi'),
(29, 'Kambodža'),
(30, 'Kamerun'),
(31, 'Kanada'),
(32, 'Kabo Verde'),
(33, 'Centralnoafrička Republika'),
(34, 'Čad'),
(35, 'Čile'),
(36, 'Kina'),
(37, 'Kolumbija'),
(38, 'Komori'),
(39, 'Kongo (Kinšasa)'),
(40, 'Kongo (Brazzaville)'),
(41, 'Kostarika'),
(42, 'Hrvatska'),
(43, 'Kuba'),
(44, 'Kipar'),
(45, 'Češka'),
(46, 'Danska'),
(47, 'Džibuti'),
(48, 'Dominika'),
(49, 'Dominikanska Republika'),
(50, 'Ekvador'),
(51, 'Egipat'),
(52, 'Salvador'),
(53, 'Ekvatorijalna Gvineja'),
(54, 'Eritreja'),
(55, 'Estonija'),
(56, 'Eswatini'),
(57, 'Etiopija'),
(58, 'Fidži'),
(59, 'Finska'),
(60, 'Francuska'),
(61, 'Gabon'),
(62, 'Gambija'),
(63, 'Gruzija'),
(64, 'Njemačka'),
(65, 'Gana'),
(66, 'Grčka'),
(67, 'Grenada'),
(68, 'Gvatemala'),
(69, 'Gvineja'),
(70, 'Gvineja Bisau'),
(71, 'Gvajana'),
(72, 'Haiti'),
(73, 'Honduras'),
(74, 'Mađarska'),
(75, 'Island'),
(76, 'Indija'),
(77, 'Indonezija'),
(78, 'Iran'),
(79, 'Irak'),
(80, 'Irska'),
(81, 'Izrael'),
(82, 'Italija'),
(83, 'Jamajka'),
(84, 'Japan'),
(85, 'Jordan'),
(86, 'Kazahstan'),
(87, 'Kenija'),
(88, 'Kiribati'),
(89, 'Koreja (Sjeverna)'),
(90, 'Koreja (Južna)'),
(91, 'Kosovo'),
(92, 'Kuvajt'),
(93, 'Kirgistan'),
(94, 'Laos'),
(95, 'Latvija'),
(96, 'Liban'),
(97, 'Lesoto'),
(98, 'Liberija'),
(99, 'Libija'),
(100, 'Lihtenštajn'),
(101, 'Litva'),
(102, 'Luksemburg'),
(103, 'Madagaskar'),
(104, 'Malavi'),
(105, 'Malezija'),
(106, 'Maldivi'),
(107, 'Mali'),
(108, 'Malta'),
(109, 'Maršalovi Otoci'),
(110, 'Mauritanija'),
(111, 'Mauricijus'),
(112, 'Meksiko'),
(113, 'Mikronezija'),
(114, 'Moldavija'),
(115, 'Monako'),
(116, 'Mongolija'),
(117, 'Crna Gora'),
(118, 'Maroko'),
(119, 'Mozambik'),
(120, 'Mjanmar'),
(121, 'Namibija'),
(122, 'Nauru'),
(123, 'Nepal'),
(124, 'Nizozemska'),
(125, 'Novi Zeland'),
(126, 'Nikaragva'),
(127, 'Niger'),
(128, 'Nigerija'),
(129, 'Sjeverna Makedonija'),
(130, 'Norveška'),
(131, 'Oman'),
(132, 'Pakistan'),
(133, 'Palau'),
(134, 'Palestina'),
(135, 'Panama'),
(136, 'Papua Nova Gvineja'),
(137, 'Paragvaj'),
(138, 'Peru'),
(139, 'Filipini'),
(140, 'Poljska'),
(141, 'Portugal'),
(142, 'Katar'),
(143, 'Rumunjska'),
(144, 'Rusija'),
(145, 'Ruanda'),
(146, 'Sveti Kristofor i Nevis'),
(147, 'Sveta Lucija'),
(148, 'Sveti Vincent i Grenadini'),
(149, 'Samoa'),
(150, 'San Marino'),
(151, 'Sao Tome i Principe'),
(152, 'Saudijska Arabija'),
(153, 'Senegal'),
(154, 'Srbija'),
(155, 'Sejšeli'),
(156, 'Sijera Leone'),
(157, 'Singapur'),
(158, 'Slovačka'),
(159, 'Slovenija'),
(160, 'Solomonovi Otoci'),
(161, 'Somalija'),
(162, 'Južna Afrika'),
(163, 'Španjolska'),
(164, 'Šri Lanka'),
(165, 'Sudan'),
(166, 'Surinam'),
(167, 'Švedska'),
(168, 'Švicarska'),
(169, 'Sirija'),
(170, 'Tajvan'),
(171, 'Tadžikistan'),
(172, 'Tanzanija'),
(173, 'Tajland'),
(174, 'Timor-Leste'),
(175, 'Togo'),
(176, 'Tonga'),
(177, 'Trinidad i Tobago'),
(178, 'Tunis'),
(179, 'Turska'),
(180, 'Turkmenistan'),
(181, 'Tuvalu'),
(182, 'Uganda'),
(183, 'Ukrajina'),
(184, 'Ujedinjeni Arapski Emirati'),
(185, 'Ujedinjeno Kraljevstvo'),
(186, 'Sjedinjene Američke Države'),
(187, 'Urugvaj'),
(188, 'Uzbekistan'),
(189, 'Vanuatu'),
(190, 'Vatikan'),
(191, 'Venezuela'),
(192, 'Vijetnam'),
(193, 'Zambija'),
(194, 'Zimbabve'),
(195, 'Zimbabve'),
(196, 'Zimbabve'),
(197, 'Zimbabve');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `image`) VALUES
(1, 'Otvoren novi servisni centar', 'Naša nova lokacija pruža još bolje usluge.', '2025-01-17 12:48:28', 'slikevijesti/jolly2.jpg'),
(2, 'Popust na sve usluge', 'Iskoristite 20% popusta tijekom ovog mjeseca.', '2025-01-17 12:48:28', NULL),
(3, 'Novi alati za brži popravak', 'Nabavili smo najmoderniju opremu za servisiranje automobila.', '2025-01-17 12:48:28', NULL),
(5, 'Rimac Auto', 'Slika Rimac super automobila', '2025-01-17 16:31:49', 'slikevijesti/rimac.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `drzava_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 = Admin, 2 = User, 3 = Moderator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `email`, `username`, `password`, `drzava_id`, `role`) VALUES
(4, 'Pero', 'Peric', 'pero.peric@outlook.com', 'pperic', '$2y$10$p.S3oa2ZPXSwWG3.uKmEo.ASPfN2db.Y.3Ow2pBQ7NLFJ.zA7Jjz.', 17, 2),
(8, 'admin', 'admin', 'admin@admin.com', 'admin', '$2y$10$un4JZNk3idpaWrJGmGwATumCPHvtQffwN3gyzdc09pGTK2JVYFYqW', 10, 1),
(10, 'user', 'user', 'user@user.com', 'user1', '$2y$10$Cp3iUJrEC1C.Tt3OnrpNQ.9P8hYgQLcPk9X9mRVhsX8DoGtiPxLbm', 51, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzave`
--
ALTER TABLE `drzave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `drzava_id` (`drzava_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzave`
--
ALTER TABLE `drzave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`drzava_id`) REFERENCES `drzave` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
