-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Ara 2022, 03:54:33
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `burstakip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bursbasvuru`
--

DROP TABLE IF EXISTS `bursbasvuru`;
CREATE TABLE IF NOT EXISTS `bursbasvuru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `neden` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bursbasvuru`
--

INSERT INTO `bursbasvuru` (`id`, `ad`, `soyad`, `telefon`, `mail`, `neden`) VALUES
(27, 'Ömer', 'Tekin', '5415155656', 'omertekin@gmail.com', 'Lorem impsum.'),
(23, 'Furkan', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 'Üniversite öğrencisiyim, para lazım.'),
(24, 'Furkan', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 'Üniversite öğrencisiyim, para lazım.'),
(29, 'Fatih', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 'Üniversite öğrencisiyim, para lazım.'),
(28, 'Salih', 'Tepe', '5423631338', 'salihtepe@gmail.com', 'Lorem impsum.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bursiyer`
--

DROP TABLE IF EXISTS `bursiyer`;
CREATE TABLE IF NOT EXISTS `bursiyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `burs` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bursiyer`
--

INSERT INTO `bursiyer` (`id`, `ad`, `soyad`, `telefon`, `mail`, `burs`) VALUES
(1, 'Fatih', 'Ayça', '5456564585', 'fatihayca@gmail.com', 3000),
(2, 'Burak', 'Dertop', '5456568484', 'burakdertop@gmail.com', 20000),
(3, 'Ahmet', 'Ayça', '5456565665', 'ahmetayca@gmail.com', 1500),
(4, 'Furkan', 'Ayça', '5455655454', 'furkanayca@gmail.com', 20000),
(13, 'Fatih', 'Ayça', '5423631338', 'fatihayca@gmail.com', 5000),
(15, 'Burak', 'Dertop', '5423631338', 'burakdertop@gmail.com', 1500),
(16, 'Furkan', 'Ayça', '5423631338', 'fatihayca@gmail.com', 11),
(12, 'Fatih', 'Ayça', '5423631338', 'fatihayca@gmail.com', 5000),
(17, 'Fatih', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 1000),
(18, 'Omer', 'Ersoy', '5423631338', 'fatihaycaa@gmail.com', 1000),
(19, 'Furkan', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bursveren`
--

DROP TABLE IF EXISTS `bursveren`;
CREATE TABLE IF NOT EXISTS `bursveren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bagis` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bursveren`
--

INSERT INTO `bursveren` (`id`, `ad`, `soyad`, `telefon`, `mail`, `bagis`) VALUES
(1, 'Mehmet Selçuk', 'Batal', '5455454545', 'msbatal@gmail.com', 50000),
(2, 'Fatih', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 10000),
(3, 'Ali', 'Mehmet', '5455454545', 'alimehmet@gmail.com', 10000),
(4, 'Merve', 'Dede', '5455454545', 'mervedede@gmail.com', 5000),
(14, 'Muhammed', 'Ali', '5423631338', 'fatihaycaa@gmail.com', 5000),
(15, 'Ahmet', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 4000),
(16, 'Fatih', 'Ayça', '5423631338', 'fatihaycaa@gmail.com', 50000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

DROP TABLE IF EXISTS `destek`;
CREATE TABLE IF NOT EXISTS `destek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `ileti` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `destek`
--

INSERT INTO `destek` (`id`, `ad`, `soyad`, `mail`, `ileti`) VALUES
(5, 'Fatih', 'Ayça', 'fatihayca@gmail.com', 'Lorem ipsum'),
(6, 'Fatih', 'Ayça', 'fatihayca@gmail.com', 'Lorem ipsum'),
(9, 'Burak', 'Dertop', 'fatihaycaa@gmail.com', 'Çok sikayetciyim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
CREATE TABLE IF NOT EXISTS `yonetici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `ad`, `soyad`, `user`, `password`) VALUES
(1, 'Fatih', 'Ayça', 'fatih', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
