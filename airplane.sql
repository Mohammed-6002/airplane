-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2025 om 12:29
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airplane`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `plane`
--

CREATE TABLE `plane` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `year_of_build` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `plane`
--

INSERT INTO `plane` (`id`, `name`, `img`, `year_of_build`, `vendor_id`) VALUES
(6, 'Dreamliner', 'dreamliner.png', 2009, 1),
(7, 'Superjumbo', 'superjumbo.png', 2007, 2),
(8, 'Stealth Fighter', 'stealth_fighter.png', 2005, 3),
(9, 'Sky Cruiser', 'sky_cruiser.png', 2012, 1),
(10, 'Mega Transporter', 'mega_transporter.png', 2010, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `year_of_establishment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `logo`, `year_of_establishment`) VALUES
(1, 'Boeing', 'boeing_logo.png', 1916),
(2, 'Airbus', 'airbus_logo.png', 1970),
(3, 'Lockheed Martin', 'lockheed_martin_logo.png', 1995);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexen voor tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `plane`
--
ALTER TABLE `plane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `plane`
--
ALTER TABLE `plane`
  ADD CONSTRAINT `vendor_plane` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
