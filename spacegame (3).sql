-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 sep 2019 om 11:15
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
(1, 3, 0, 0, 37),
(2, 2, 0, 0, 37),
(3, 1, 0, 0, 37);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `shipname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ships`
--

INSERT INTO `ships` (`id`, `shipname`) VALUES
(1, 'Hispenia'),
(2, 'Hunter-Gratzner'),
(3, 'Millenium');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `commodities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `cash`, `commodities`) VALUES
(1, '', 9010, '400'),
(32, 'Blabla', 0, ''),
(33, 'Pietje', 0, ''),
(34, '123', 5000, ''),
(35, '123', 5000, ''),
(36, '123', 5000, ''),
(37, '1234', -511000, '700'),
(38, 'wicher', 5000, ''),
(39, 'Bla', 5000, ''),
(40, '123', 5000, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
