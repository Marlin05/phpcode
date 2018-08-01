-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 01 2018 г., 23:19
-- Версия сервера: 5.5.53-log
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statti`
--

CREATE TABLE `statti` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `text` text CHARACTER SET utf16 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `statti`
--

INSERT INTO `statti` (`id`, `title`, `discription`, `text`) VALUES
(1, 'Название 1 статьи', 'Описание 1 статьи: Мы уже победили свалку в Царёво! Теперь Мы победим свалку в Малинках! Коган и Дударева должны покинуть свои посты! ', 'Текст 1 статьи: Мы - инициативная группа граждан, которой надоел беспредел на свалке в Царево. Пришло время перемен, время изменить ситуацию в нашу сторону!\r\n'),
(2, 'название 2 статьи', 'Описание 2статьи: КРЫМ-что за цены на бензин?! ', 'Я езжу в Крым из Анапы почти каждый день, ведь благодаря Крымскому мосту он стал там близок, что сравним с поездкой в соседний город, например, в Новороссийск. Дорога занимает всего 1,5 часа. \r\n\r\nНо по дороге каждый раз в Старотитаровке (это крайняя станица в Краснодарском крае перед мостом) вижу очереди на заправках, как за колбасой в советские времена! \r\n\r\nВсе пишут, что цены на бензин выросли, но вы не видели цены на бензин в Крыму! \r\n\r\nВ чем причина дороговизны и очередей? \r\n');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statti`
--
ALTER TABLE `statti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `statti`
--
ALTER TABLE `statti`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
