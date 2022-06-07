-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2019 г., 10:45
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- База данных: `test`
--
-- --------------------------------------------------------
--
-- Структура таблицы `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `card` varchar(16) DEFAULT NULL,
  `usd` double(10, 2) DEFAULT 0,
  `eur` double(10, 2) DEFAULT 0,
  `btc` float DEFAULT 0,
  `usdProc` tinyint DEFAULT 0,
  `eurProc` tinyint DEFAULT 0,
  `btcProc` tinyint DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
CREATE TABLE `exchange` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
INSERT INTO `exchange` (`id`, `name`, `rate`)
VALUES (1, 'usd eur', 1.07),
  (2, 'usd btc', 30067.40),
  (3, 'eur usd', 0.93),
  (4, 'eur btc', 28051.23),
  (5, 'btc usd', 0.000033),
  (6, 'btc eur', 0.000036);
-- Индексы сохранённых таблиц
--
--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);
--
ALTER TABLE `exchange`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT для сохранённых таблиц
--
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
ALTER TABLE `exchange`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;