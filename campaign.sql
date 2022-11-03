-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Kas 2022, 12:10:08
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `campaign`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `description`) VALUES
(1, '2022-07', 'Temmuz 2022'),
(2, '2022-08', 'Ağustos 2022'),
(3, '2022-09', 'Eylül 2022');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `campaign_name` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `surname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `points` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `details`
--

INSERT INTO `details` (`id`, `campaign_id`, `campaign_name`, `name`, `surname`, `email`, `employee_id`, `phone`, `points`) VALUES
(45, 2, 'asda', 'Rina', 'Sweeney', 'urna.Nunc@Integertincidunt.com', 161711075760, 5306300252, 566),
(46, 2, 'asda', 'Leroy', 'George', 'sit.amet@Donec.net', 169612164278, 5329835280, 3249),
(47, 2, 'fasf', 'Rina', 'Sweeney', 'urna.Nunc@Integertincidunt.com', 161711075760, 5306300252, 566),
(48, 2, 'fasf', 'Leroy', 'George', 'sit.amet@Donec.net', 169612164278, 5329835280, 3249),
(49, 2, 'asda', 'Rina', 'Sweeney', 'urna.Nunc@Integertincidunt.com', 161711075760, 5306300252, 566),
(50, 2, 'asda', 'Leroy', 'George', 'sit.amet@Donec.net', 169612164278, 5329835280, 3249);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaigns_campaign_id` (`campaign_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
