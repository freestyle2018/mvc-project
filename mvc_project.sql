-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 09 2020 г., 11:07
-- Версия сервера: 5.7.28
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zadacha`
--

CREATE TABLE `zadacha` (
  `zadacha_id` int(5) NOT NULL,
  `zadacha_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zadacha_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zadacha_text` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `zadacha`
--

INSERT INTO `zadacha` (`zadacha_id`, `zadacha_user`, `zadacha_email`, `zadacha_text`) VALUES
(1, 'Иван', 'ivan@yandex.ru', 'Космос'),
(2, 'Олег', 'oleg@yandex.ru', 'Биология'),
(3, 'Стас', 'stas@mail.ru', 'Танцы'),
(4, 'Никон', 'nikon@yandex.ru', 'Кораблестроение'),
(5, 'Никифор', 'nikifor@mail.ru', 'Стадион'),
(6, 'Лаврентий', 'lavrentii@yandex.ru', 'Иностранный язык'),
(7, 'Сергей', 'sergei@yandex.ru', 'Программирование'),
(8, 'Лика', 'lika@rambler.ru', 'Поделки'),
(9, 'Анна', 'anna@nn.ru', 'Психология'),
(11, 'Светлана', 'svetlana@rambler.ru', 'Вязание'),
(12, 'Ника', 'nika@yandex.ru', 'Парашют');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `zadacha`
--
ALTER TABLE `zadacha`
  ADD PRIMARY KEY (`zadacha_id`),
  ADD UNIQUE KEY `zadacha_id` (`zadacha_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
