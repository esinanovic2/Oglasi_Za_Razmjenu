-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 09:51 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15
-- korisnik za bazu i password: admin admin

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mijenjajba`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `komentar` text COLLATE utf16_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL,
  `vijest` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`),
  KEY `korisnik` (`korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `prezime` varchar(150) COLLATE utf16_slovenian_ci NOT NULL,
  `username` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE utf16_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'Administrator', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'admin@email.com'),
(2, 'korisnik', 'korisnik', 'korisnik1', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'korisnik@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

DROP TABLE IF EXISTS `vijesti`;
CREATE TABLE IF NOT EXISTS `vijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf16_slovenian_ci NOT NULL,
  `oglas` text COLLATE utf16_slovenian_ci NOT NULL,
  `url` varchar(512) COLLATE utf16_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL,
  `korisnik` int(11) NOT NULL,
  `mozekomentar` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik` (`korisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `oglas`, `url`, `datum`, `korisnik`, `mozekomentar`) VALUES
(1, 'B', 'Ovo je oglas', 'http://cdn5.3dtuning.com/info/Volkswagen%20Golf%204%202003%203%20Door%20Hatchback/tuning/19.jpg', '2016-06-06 19:35:16', 1, 1),
(2, 'A', 'Drugi oglas', 'http://www.njuskalo.hr/image-bigger/mtb-bicikli/giant-rock-xc-velicina-l-21-53.5cm-slika-17797010.jpg', '2016-06-06 20:38:46', 2, 1),
(3, 'Oglas 3', 'Oglas', 'http://www.h2-shop.com/content/images/thumbs/0010379_MOB-0018.jpeg', '2016-06-06 21:24:18', 1, 1),
(4, 'Oglas 3', 'Treci oglas', 'http://www.h2-shop.com/content/images/thumbs/0010379_MOB-0018.jpeg', '2016-06-06 21:28:49', 1, 1),
(5, 'Oglas 4', 'Tekst oglasa', 'https://www.topmobilni.rs/uploads/phone/Tesla/2015/Smartphone-6/tesla-smartphone-6-foto-milena-djordjevic-15.jpg', '2016-06-06 21:29:56', 1, 1),
(6, 'Oglas 5', 'Oglas 5', 'http://www.h2-shop.com/content/images/thumbs/0009297_MOB-0019.jpeg', '2016-06-06 21:50:05', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `korisnik` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `vijest` FOREIGN KEY (`vijest`) REFERENCES `vijesti` (`id`);

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `korvijest` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
