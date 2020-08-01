-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 30 2019 г., 08:04
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `database_full`
--

-- --------------------------------------------------------

--
-- Структура таблицы `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `IDD` int(11) DEFAULT NULL,
  `work_speace` int(11) DEFAULT NULL,
  `sname` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDD` (`IDD`),
  KEY `work_speace` (`work_speace`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `emp`
--

INSERT INTO `emp` (`id`, `name`, `IDD`, `work_speace`, `sname`) VALUES
(1, 'Мария', 1, 1, 'Маслова'),
(2, 'Харитина', 2, 1, 'Никитина'),
(3, 'Инесса', 3, 1, 'Казакова'),
(4, 'Тамара', 4, 1, 'Смирнова'),
(5, 'Фёдор', 1, 2, 'Воробьёв'),
(6, 'Роберт', 2, 2, 'Шилов'),
(7, 'Зигмунд', 3, 2, 'Шубин'),
(8, 'Антонина', 1, 1, 'Желиба'),
(15, 'Пётр', 1, 3, 'Богданов'),
(16, 'Трофим', 2, 3, 'Правый'),
(17, 'Семён', 3, 3, 'Ильин'),
(18, 'Фёдор', 4, 3, 'Петренко'),
(19, 'Эрик', 1, 4, 'Осипов'),
(20, 'Станислав', 2, 4, 'Терещенко'),
(21, 'Захар', 3, 4, 'Ковалёв'),
(22, 'Эдуард', 4, 4, 'Бородай'),
(23, 'Рада', 1, 5, 'Ярова'),
(24, 'Капитолина', 2, 5, 'Капустина'),
(25, 'Анна', 2, 5, 'Тарасюк'),
(26, 'Анфиса', 1, 1, 'Тихоноваа');

-- --------------------------------------------------------

--
-- Структура таблицы `finish_items`
--

CREATE TABLE IF NOT EXISTS `finish_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `in_shop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `in_shop` (`in_shop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `finish_items`
--

INSERT INTO `finish_items` (`id`, `name`, `count`, `in_shop`) VALUES
(1, 1, 5, 1),
(2, 3, 4, 1),
(3, 8, 5, 1),
(4, 9, 7, 1),
(5, 2, 2, 1),
(7, 1, 5, 2),
(8, 3, 2, 2),
(9, 5, 7, 2),
(10, 7, 6, 2),
(11, 10, 4, 2),
(12, 4, 3, 2),
(13, 9, 4, 3),
(14, 7, 4, 3),
(15, 4, 5, 3),
(16, 3, 6, 3),
(17, 1, 3, 3),
(18, 8, 5, 3),
(19, 1, 5, 4),
(20, 5, 3, 4),
(21, 6, 6, 4),
(22, 7, 5, 4),
(23, 8, 3, 4),
(24, 9, 6, 4),
(25, 10, 3, 5),
(26, 9, 4, 5),
(27, 8, 5, 5),
(28, 7, 6, 5),
(29, 6, 3, 5),
(30, 5, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `finish_items_for_work`
--

CREATE TABLE IF NOT EXISTS `finish_items_for_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `count` int(11) NOT NULL,
  `id_provider` int(11) DEFAULT NULL,
  `in_shop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `in_shop` (`in_shop`),
  KEY `name` (`name`),
  KEY `id_provider` (`id_provider`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `finish_items_for_work`
--

INSERT INTO `finish_items_for_work` (`id`, `name`, `date`, `count`, `id_provider`, `in_shop`) VALUES
(1, NULL, '2019-12-01', 2, 1, 1),
(2, 3, '2019-12-02', 3, 3, 1),
(3, 5, '2019-12-05', 4, 5, 1),
(4, NULL, '2019-12-02', 5, 3, 1),
(5, 8, '2019-12-18', 6, 4, 2),
(6, 7, '2019-11-05', 8, 2, 2),
(7, 5, '2019-12-03', 9, 2, 2),
(8, 9, '2019-12-09', 5, 3, 2),
(9, 5, '2019-12-17', 6, 2, 3),
(10, 5, '2019-12-02', 7, 3, 3),
(11, 8, '2019-12-23', 8, 5, 3),
(12, 9, '2019-12-05', 3, 5, 3),
(13, 5, '2019-12-04', 5, 1, 4),
(14, 6, '2019-12-09', 5, 2, 4),
(15, 4, '2019-12-28', 6, 3, 4),
(16, 12, '2019-12-11', 6, 4, 4),
(17, 4, '2019-12-08', 6, 2, 5),
(18, 7, '2019-12-10', 3, 3, 5),
(19, 4, '2019-12-05', 4, 2, 5),
(20, 10, '2019-12-09', 1, 5, 5),
(30, 6, NULL, 5, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `items_for_work`
--

CREATE TABLE IF NOT EXISTS `items_for_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `price_by_buy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `items_for_work`
--

INSERT INTO `items_for_work` (`id`, `name`, `price_by_buy`) VALUES
(3, 'Сахар', 12),
(4, 'Соль', 10),
(5, 'Мука', 14),
(6, 'Масло', 21),
(7, 'Мясо', 40),
(8, 'Яблоки', 5),
(9, 'Молоко', 12),
(10, 'Творог', 15),
(11, 'Картошка', 10),
(12, 'Капуста', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `name_items`
--

CREATE TABLE IF NOT EXISTS `name_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `name_items`
--

INSERT INTO `name_items` (`id`, `name`, `price`) VALUES
(1, 'пряник', 30),
(2, 'курник', 50),
(3, 'пирожок с картошкой', 20),
(4, 'пирожок с творогом', 20),
(5, 'пирожок с капустой', 20),
(6, 'самса', 50),
(7, 'пончик', 25),
(8, 'пирог с рыбой', 100),
(9, 'пирог с яблоком', 100),
(10, 'хлеб', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `position_emp`
--

CREATE TABLE IF NOT EXISTS `position_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_position` char(30) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `position_emp`
--

INSERT INTO `position_emp` (`id`, `name_position`, `salary`) VALUES
(1, 'Повар', 15000),
(2, 'Продавец', 15000),
(3, 'Директор', 20000),
(4, 'Уборщик', 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `number_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `provider`
--

INSERT INTO `provider` (`id`, `name`, `number_phone`) VALUES
(1, 'Ревень', 7072996),
(2, 'Хлеб', 7846608),
(3, 'Дружба', 7722482),
(4, 'Милбо', 6364385),
(5, 'Фреддо', 1670533);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_shop` char(10) NOT NULL,
  `street` char(30) DEFAULT NULL,
  `home` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name_shop`, `street`, `home`) VALUES
(1, 'Клубничка', 'ул. Ленина', 5),
(2, 'Золушка', 'ул. Ленина', 10),
(3, 'Сладоба', 'ул. Уфимская', 15),
(4, 'Конфа', 'ул. Центральная', 55),
(5, 'Тиволи', 'ул. Хлебная', 12);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `emp_ibfk_1` FOREIGN KEY (`IDD`) REFERENCES `position_emp` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `emp_ibfk_2` FOREIGN KEY (`work_speace`) REFERENCES `shop` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `finish_items`
--
ALTER TABLE `finish_items`
  ADD CONSTRAINT `finish_items_ibfk_1` FOREIGN KEY (`name`) REFERENCES `name_items` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `finish_items_ibfk_2` FOREIGN KEY (`in_shop`) REFERENCES `shop` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `finish_items_for_work`
--
ALTER TABLE `finish_items_for_work`
  ADD CONSTRAINT `finish_items_for_work_ibfk_1` FOREIGN KEY (`in_shop`) REFERENCES `shop` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `finish_items_for_work_ibfk_2` FOREIGN KEY (`name`) REFERENCES `items_for_work` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `finish_items_for_work_ibfk_3` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
