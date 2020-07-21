-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Júl 21. 09:10
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jacsomedia`
--
CREATE DATABASE IF NOT EXISTS `jacsomedia` DEFAULT CHARACTER SET latin2 COLLATE latin2_hungarian_ci;
USE `jacsomedia`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(5) UNSIGNED NOT NULL COMMENT 'A felhasználó ID-ja',
  `felhasznalonev` varchar(16) COLLATE latin2_hungarian_ci NOT NULL COMMENT 'Felhasználónév',
  `jelszo` varchar(40) COLLATE latin2_hungarian_ci NOT NULL COMMENT 'Jelszó',
  `statusz` enum('Aktív','Letiltott') COLLATE latin2_hungarian_ci NOT NULL DEFAULT 'Aktív' COMMENT 'Státusz (Aktív, Letiltott)',
  `vezeteknev` varchar(30) COLLATE latin2_hungarian_ci NOT NULL COMMENT 'Vezetéknév',
  `keresztnev` varchar(30) COLLATE latin2_hungarian_ci NOT NULL COMMENT 'Keresztnév'
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci COMMENT='Adatok a felhasználókról';

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `felhasznalonev`, `jelszo`, `statusz`, `vezeteknev`, `keresztnev`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Aktív', 'Abonyi', 'Antal');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szavak`
--

CREATE TABLE `szavak` (
  `ID` int(5) UNSIGNED NOT NULL COMMENT 'ID',
  `felhasznalo` int(5) UNSIGNED NOT NULL COMMENT 'A felhasználó ID-ja',
  `mezo` int(5) UNSIGNED NOT NULL COMMENT 'A mező ID-ja',
  `szo` int(5) UNSIGNED DEFAULT NULL COMMENT 'A szó'
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_hungarian_ci;

--
-- A tábla adatainak kiíratása `szavak`
--

INSERT INTO `szavak` (`ID`, `felhasznalo`, `mezo`, `szo`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3),
(4, 1, 4, 4),
(5, 1, 5, 5),
(6, 1, 6, 6),
(7, 1, 7, 7),
(8, 1, 8, 8),
(9, 1, 9, 9),
(10, 1, 10, 11),
(11, 1, 11, 10),
(12, 1, 12, 12),
(13, 1, 13, NULL),
(14, 1, 14, NULL),
(15, 1, 15, NULL),
(16, 1, 16, NULL),
(17, 1, 17, NULL),
(18, 1, 18, NULL),
(19, 1, 19, NULL),
(20, 1, 20, NULL),
(21, 1, 21, NULL),
(22, 1, 22, NULL),
(23, 1, 23, NULL),
(24, 1, 24, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`) COMMENT 'Elsődleges kulcs',
  ADD UNIQUE KEY `felhasznalonev` (`felhasznalonev`) COMMENT 'A felhasználónév egyedi';

--
-- A tábla indexei `szavak`
--
ALTER TABLE `szavak`
  ADD PRIMARY KEY (`ID`) COMMENT 'Elsődleges kulcs';

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'A felhasználó ID-ja', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `szavak`
--
ALTER TABLE `szavak`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
