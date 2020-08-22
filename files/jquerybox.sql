-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Oca 2019, 19:28:30
-- Sunucu sürümü: 5.7.23
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `jquerybox`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

DROP TABLE IF EXISTS `il`;
CREATE TABLE IF NOT EXISTS `il` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`id`, `ad`) VALUES
(1, 'İstanbul'),
(2, 'İzmir'),
(3, 'Ankara'),
(4, 'Bursa'),
(5, 'Düzce'),
(6, 'Çanakkale'),
(7, 'Bolu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilce`
--

DROP TABLE IF EXISTS `ilce`;
CREATE TABLE IF NOT EXISTS `ilce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilid` int(11) NOT NULL,
  `ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilce`
--

INSERT INTO `ilce` (`id`, `ilid`, `ad`) VALUES
(1, 1, 'Beşiktaş'),
(2, 1, 'Bakırköy'),
(3, 1, 'Zeytinburnu'),
(4, 1, 'Kadıköy'),
(5, 2, 'Buca'),
(6, 2, 'Menemen'),
(7, 2, 'Göztepe'),
(8, 3, 'Ulus'),
(9, 3, 'Sincan'),
(10, 3, 'Gölbaşı'),
(11, 4, 'Nilüfer'),
(12, 4, 'Gemlik'),
(13, 5, 'Kaynaşlı'),
(14, 5, 'Gölyaka'),
(15, 5, 'Cumayeri'),
(16, 6, 'Ezine'),
(17, 6, 'Çan'),
(18, 6, 'Biga'),
(19, 7, 'Gerede'),
(20, 7, 'Mengen'),
(21, 7, 'Dörtdivan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
