-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 04:43 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logaty`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `plalppla` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content`, `local`, `plalppla`) VALUES
(1, '', 'ar,en,es,de', 0),
(2, '', 'en,es,de', 0),
(3, '', 'ar,en,es,de', 0),
(4, '', 'ar,de', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logaty_translation`
--

CREATE TABLE IF NOT EXISTS `logaty_translation` (
  `id` int(11) NOT NULL,
  `lang` varchar(10) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `id_ref` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logaty_translation`
--

INSERT INTO `logaty_translation` (`id`, `lang`, `title`, `content`, `id_ref`) VALUES
(1, 'ar', 'انا المقالة رقم واحد (1)', 'مرحبا انا المقالة رقم واحد \n<br>\nانا قد اتيت من قاعدة البيانات, انا مترجمة في كل اللغات <br>\nلذا ستجدني مهما حاولت تغيير اللغة :)', 1),
(2, 'en', 'I''am Article Number One (1)', 'Hello I''m article number one\n<br>\nI have come from the database, I translated in all languages <br>\nSo you find me  how you  tried to change the language :)', 1),
(3, 'es', 'I''am artículo número uno (1)', 'Hola soy el artículo número uno\n<br>\nHe venido de la base de datos, he traducido en todos los idiomas <br>\nAsí que me has encontrado lo que trató de cambiar el idioma :)\n\n-----------\nMohammed añadió Starter no habla español así que usa Google para mi, lo sentimos si hubo un error de traducción', 1),
(4, 'de', 'Ich bin Artikelnummer ein (1)', 'Hallo, ich bin Artikelnummer ein\n<br>\nIch habe aus der Datenbank kommen, in alle Sprachen übersetzt I Liebe-\nSo finden Sie mich, wie Sie <br> versucht, die Sprache zu ändern :)\n--------------\nEr hat die deutsche Mohammed übersetzt mit Google, so leid, wenn es einen Übersetzungsfehler', 1),
(5, 'en', 'I''am Article Number Two (2)', 'Hi, I''am Article Number 2 , \r\n<br>\r\nI''am Not Translated in Arabic Language\r\n\r\n<br>\r\n\r\nSo Try Choice Arabic Language ! <br>\r\n\r\nArabic = العربية', 2),
(6, 'es', 'Yo Soy el artículo número dos (2', 'Hola, Soy el artículo número 2,\r\n<br>\r\nI''am no traducido en lengua árabe\r\n\r\n<br>\r\n\r\nAsí que trate de elección de idioma árabe!\r\n<br>\r\nárabe = العربية', 2),
(7, 'de', 'Ich bin Artikelnummer Zwei (2)', 'Hallo, Ich bin Artikelnummer 2,\r\n<br>\r\nI Am Not in arabischer Sprache übersetzt\r\n<br>\r\nAlso versuchen Wahl Arabische Sprache!\r\n<br>\r\n\r\nArabische = العربية', 2),
(8, 'ar', 'انا المقالة رقم ثلاث(3)', 'مرحبا انا المقالة رقم ثلاث\r\n<br>\r\nانا قد اتيت من قاعدة البيانات, انا مترجمة في كل اللغات <br>\r\nلذا ستجدني مهما حاولت تغيير اللغة :)', 3),
(9, 'en', 'I''am Article Number Three(3)', 'Hello I''m article number three\r\n<br>\r\nI have come from the database, I translated in all languages <br>\r\nSo you find me  how you  tried to change the language :)', 3),
(10, 'es', 'I''am artículo número Tres(3)', 'Hola soy el artículo número Tres\r\n<br>\r\nHe venido de la base de datos, he traducido en todos los idiomas <br>\r\nAsí que me has encontrado lo que trató de cambiar el idioma :)\r\n', 3),
(11, 'de', 'Ich bin Artikelnummer drei (3)', 'Hallo, ich bin Artikelnummer drei \r\n<br>\r\nIch habe aus der Datenbank kommen, in alle Sprachen übersetzt I Liebe-\r\nSo finden Sie mich, wie Sie <br> versucht, die Sprache zu ändern :)\r\n--------------\r\nEr hat die deutsche Mohammed übersetzt mit Google, so leid, wenn es einen Übersetzungsfehler', 3),
(12, 'ar', 'انا المقالة رقم اربعة(4)', 'مرحبا انا المقالة رقم اربعة\r\n<br>\r\nانا قد اتيت من قاعدة البيانات, انا غير مترجة باللغة الانجليزية والاسبانية! <br>\r\n<br>\r\nلذا لن تجدني ان اخترت احدى تلك اللغتين', 4),
(13, 'de', 'Ich bin Artikelnummer vier (4)', 'Hallo, ich bin Artikelnummer vier\r\n<br>\r\nIch habe aus der Datenbank kommen, Mitrjh ich in Englisch und Spanisch! szmtag\r\n<br>\r\nSo werden Sie nicht finden, dass Sie eine dieser beiden Sprachen auswählen', 4);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `value`, `name`) VALUES
(3, 'ar', 'defualt_lang'),
(4, NULL, 'detect_browser_lang'),
(5, NULL, 'detect_country_lang'),
(6, NULL, 'hide_untranslated'),
(7, NULL, 'alert_user_available_lang'),
(8, NULL, 'hide_default_language'),
(9, NULL, 'enabled_languages'),
(10, NULL, 'supported_languages'),
(11, NULL, 'languages_name'),
(12, '{"ar":"u0627u0644u0639u0631u0628u064au0629","en":"English"}', 'name_mother_tongue'),
(13, NULL, 'langLocal'),
(14, NULL, 'not_available'),
(15, NULL, 'flag'),
(16, NULL, 'lang_files'),
(17, NULL, 'flags'),
(18, NULL, 'lang_dir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logaty_translation`
--
ALTER TABLE `logaty_translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logaty_translation`
--
ALTER TABLE `logaty_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
