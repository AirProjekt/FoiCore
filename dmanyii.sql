-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Računalo: 127.0.0.1
-- Vrijeme generiranja: Tra 26, 2013 u 02:30 PM
-- Verzija poslužitelja: 5.5.27
-- PHP verzija: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `dmanyii`
--
CREATE DATABASE `dmanyii` DEFAULT CHARACTER SET cp1250 COLLATE cp1250_croatian_ci;
USE `dmanyii`;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(60) COLLATE cp1250_croatian_ci NOT NULL,
  `datum` date NOT NULL,
  `tema_id` int(11) NOT NULL,
  `klijent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tema_id` (`tema_id`),
  KEY `klijent_id` (`klijent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `anketa_korisnik`
--

CREATE TABLE IF NOT EXISTS `anketa_korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `anketa_id` int(11) NOT NULL,
  PRIMARY KEY (`korisnik_id`,`anketa_id`),
  KEY `korisnik_id` (`korisnik_id`,`anketa_id`),
  KEY `anketa_id` (`anketa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `klijent`
--

CREATE TABLE IF NOT EXISTS `klijent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(60) COLLATE cp1250_croatian_ci NOT NULL,
  `adresa` varchar(60) COLLATE cp1250_croatian_ci NOT NULL,
  `OIB` varchar(11) COLLATE cp1250_croatian_ci NOT NULL,
  `kontakt_osoba` varchar(70) COLLATE cp1250_croatian_ci NOT NULL,
  `telefon` varchar(30) COLLATE cp1250_croatian_ci NOT NULL,
  `mobitel` varchar(40) COLLATE cp1250_croatian_ci NOT NULL,
  `ostalo` text COLLATE cp1250_croatian_ci NOT NULL,
  `korisnici_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnici_id` (`korisnici_id`),
  UNIQUE KEY `OIB` (`OIB`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `lozinka` varchar(100) COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `lozinka`) VALUES
(1, 'miro@miro.hr', 'miro');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE cp1250_croatian_ci NOT NULL,
  `prezime` varchar(40) COLLATE cp1250_croatian_ci NOT NULL,
  `telefon` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `kljucne_rijeci` text COLLATE cp1250_croatian_ci NOT NULL,
  `tel_ank` tinyint(1) NOT NULL,
  `obav_mail` tinyint(1) NOT NULL,
  `korisnici_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnici_id` (`korisnici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `odgovori`
--

CREATE TABLE IF NOT EXISTS `odgovori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(250) COLLATE cp1250_croatian_ci NOT NULL,
  `pitanja_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pitanja_id` (`pitanja_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `odgovori_korisnik`
--

CREATE TABLE IF NOT EXISTS `odgovori_korisnik` (
  `odgovor_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  PRIMARY KEY (`odgovor_id`,`korisnik_id`),
  KEY `odgovor_id` (`odgovor_id`,`korisnik_id`),
  KEY `korisnik_id` (`korisnik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `pitanja`
--

CREATE TABLE IF NOT EXISTS `pitanja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(200) COLLATE cp1250_croatian_ci NOT NULL,
  `tip` int(1) NOT NULL,
  `anketa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anketa_id` (`anketa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) COLLATE cp1250_croatian_ci NOT NULL,
  `kratki_opis` varchar(250) COLLATE cp1250_croatian_ci NOT NULL,
  `dugi_opis` text COLLATE cp1250_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `naziv` (`naziv`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci AUTO_INCREMENT=1 ;

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `anketa`
--
ALTER TABLE `anketa`
  ADD CONSTRAINT `anketa_ibfk_1` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anketa_ibfk_2` FOREIGN KEY (`klijent_id`) REFERENCES `klijent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD CONSTRAINT `anketa_korisnik_ibfk_1` FOREIGN KEY (`anketa_id`) REFERENCES `anketa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anketa_korisnik_ibfk_2` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `klijent`
--
ALTER TABLE `klijent`
  ADD CONSTRAINT `klijent_ibfk_1` FOREIGN KEY (`korisnici_id`) REFERENCES `korisnici` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`korisnici_id`) REFERENCES `korisnici` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `odgovori`
--
ALTER TABLE `odgovori`
  ADD CONSTRAINT `odgovori_ibfk_1` FOREIGN KEY (`pitanja_id`) REFERENCES `pitanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `odgovori_korisnik`
--
ALTER TABLE `odgovori_korisnik`
  ADD CONSTRAINT `odgovori_korisnik_ibfk_1` FOREIGN KEY (`odgovor_id`) REFERENCES `odgovori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odgovori_korisnik_ibfk_2` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `pitanja`
--
ALTER TABLE `pitanja`
  ADD CONSTRAINT `pitanja_ibfk_1` FOREIGN KEY (`anketa_id`) REFERENCES `anketa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
