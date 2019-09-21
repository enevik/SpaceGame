-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 sep 2019 om 12:02
-- Serverversie: 10.1.39-MariaDB
-- PHP-versie: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacegame`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ownedships`
--

CREATE TABLE `ownedships` (
  `id` int(11) NOT NULL,
  `shipid` int(11) NOT NULL,
  `engine` int(11) NOT NULL DEFAULT '0',
  `cargo` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `endtime2` varchar(255) NOT NULL,
  `endtime3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ownedships`
--

INSERT INTO `ownedships` (`id`, `shipid`, `engine`, `cargo`, `userid`, `endtime`, `endtime2`, `endtime3`) VALUES
(85, 5, 0, 0, 1, '', '', ''),
(86, 2, 0, 0, 1, '', '', ''),
(87, 1, 0, 0, 1, '', '', ''),
(94, 3, 0, 0, 1, '', '', ''),
(131, 6, 0, 0, 1, '', '', ''),
(132, 7, 0, 0, 88, '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `shipname` varchar(255) NOT NULL,
  `shippic` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `joblengthmars` int(11) NOT NULL,
  `joblengthjupiter` int(11) NOT NULL,
  `joblengthsaturnus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ships`
--

INSERT INTO `ships` (`id`, `shipname`, `shippic`, `price`, `description`, `joblengthmars`, `joblengthjupiter`, `joblengthsaturnus`) VALUES
(1, 'Hispenia', 'hispenia.png', 60000, 'A lightweight spaceship to get everywhere you want.', 10, 15, 20),
(2, 'Hunter-Gratzner', 'Hunter-Gratzner.png', 80000, 'Carries many commodities. Very strong heavyweight ship.', 8, 12, 15),
(3, 'Millenium-Falcon', 'falcon_spaceship.png', 100000, 'The greatest spaceship of all times. Fast, strong, does everything you want.', 3, 4, 6),
(4, 'Jumper', 'jumper.jpg', 120000, 'Jumps from planet to planet, nobody can keep up with this one!', 3, 4, 5),
(5, 'Destroyer', 'destroyer.jpg', 160000, 'Destroys worlds while mining commodities, makes sure you get what you need ;)', 2, 3, 4),
(6, 'Traveller', 'traveller.jpg', 200000, 'Travels through galaxies, has seen more than anyone will ever see.', 2, 2, 3),
(7, 'Miner-hero', 'starter.jpg', 0, 'starter ship', 15, 20, 25);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `commodities` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `cash`, `commodities`, `duration`, `admin`, `job`) VALUES
(1, 'Bas', 2460700, '1782030', '3', 1, '2019-09-21 22:14:38'),
(88, 'Test', 5000, '', '15', 0, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ownedships`
--
ALTER TABLE `ownedships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipid` (`shipid`);

--
-- Indexen voor tabel `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ownedships`
--
ALTER TABLE `ownedships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT voor een tabel `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `ownedships`
--
ALTER TABLE `ownedships`
  ADD CONSTRAINT `ownedships_ibfk_1` FOREIGN KEY (`shipid`) REFERENCES `ships` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
