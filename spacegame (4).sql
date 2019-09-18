-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 sep 2019 om 15:39
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
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ownedships`
--

INSERT INTO `ownedships` (`id`, `shipid`, `engine`, `cargo`, `userid`) VALUES
(85, 5, 0, 0, 1),
(86, 2, 0, 0, 1),
(87, 1, 0, 0, 1);

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
  `joblength` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ships`
--

INSERT INTO `ships` (`id`, `shipname`, `shippic`, `price`, `description`, `joblength`) VALUES
(1, 'Hispenia', 'hispenia.png', 60000, '', 20),
(2, 'Hunter-Gratzner', 'Hunter-Gratzner.png', 80000, '', 15),
(3, 'Millenium', 'falcon_spaceship.png', 100000, '', 10),
(4, 'Jumper', 'jumper.jpg', 120000, 'Springeee', 5),
(5, 'Destroyer', 'destroyer.jpg', 160000, 'I destroy worlds', 5),
(6, 'Traveller', 'traveller.jpg', 200000, 'I travel through galaxies', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `commodities` varchar(255) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `cash`, `commodities`, `duration`, `admin`) VALUES
(1, 'Bas', 38000, '1890500', '1', 1),
(32, 'Blabla', 0, '', '', 0),
(33, 'Pietje', 0, '', '', 0),
(34, '123', 5000, '', '', 0),
(35, '123', 5000, '', '', 0),
(36, '123', 5000, '', '', 0),
(37, '1234', -508000, '42700', '1440', 0),
(38, 'wicher', 5000, '4800', '30', 0),
(39, 'Bla', 5000, '3600', '30', 0),
(40, '123', 5000, '', '', 0),
(43, 'Pat', 5000, '', '', 0),
(44, 'Ben', 5000, '', '', 0),
(45, 'Ben', 5000, '', '', 0),
(46, 'Baas', 5000, '', '', 0),
(47, 'Pet', 5000, '', '', 0),
(48, 'Bis', 5000, '', '', 0),
(49, 'Pitt', 5000, '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT voor een tabel `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
