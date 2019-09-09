-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 sep 2019 om 11:05
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.3.1

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
-- Tabelstructuur voor tabel `owned ships`
--

CREATE TABLE `owned ships` (
  `id` int(11) NOT NULL,
  `shipid` varchar(255) NOT NULL,
  `engine` int(11) NOT NULL DEFAULT '1',
  `cargo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `shipname` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '', 10, '3600'),
(2, 'dani', 150000, '22000'),
(3, 'Bas', 0, ''),
(4, 'Ertugrul', 0, ''),
(5, 'Nick', 5000, ''),
(6, 'Dennis', 5000, ''),
(7, '', 5000, ''),
(8, 'lol', 5000, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `owned ships`
--
ALTER TABLE `owned ships`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT voor een tabel `owned ships`
--
ALTER TABLE `owned ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
