-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- المزود: 127.0.0.1
-- أنشئ في: 03 أبريل 2015 الساعة 12:36
-- إصدارة المزود: 5.5.34
-- PHP إصدارة: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `mlang`
--

-- --------------------------------------------------------

--
-- بنية الجدول `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `content`
--

INSERT INTO `content` (`id`, `local`) VALUES
(1, 'en,es'),
(2, 'ar,en'),
(3, 'en');

-- --------------------------------------------------------

--
-- بنية الجدول `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `translation`
--

INSERT INTO `translation` (`id`, `title`, `content`, `lang`) VALUES
(1, '1 english', '111111111111111111111111111111111111111', 'en'),
(1, 'spain 1', '11111111111111111111111111111111111111 ', 'es'),
(2, '2 english', '2222222222222222222222222', 'en'),
(2, 'arabic 1', '2222222222222222222222222222222222222222222222222', 'ar'),
(3, 'english 3', '333333333333333333333333333333333333333', 'en');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
