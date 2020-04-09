-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 09 2020 г., 12:11
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
-- База данных: `phpauthtest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_attempts`
--

CREATE TABLE `phpauth_attempts` (
  `id` int(11) NOT NULL,
  `ip` char(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_config`
--

CREATE TABLE `phpauth_config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `phpauth_config`
--

INSERT INTO `phpauth_config` (`setting`, `value`) VALUES
('allow_concurrent_sessions', '0'),
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+30 minutes'),
('cookie_http', '0'),
('cookie_name', 'phpauth_session_cookie'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_renew', '+100 minutes'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '3'),
('recaptcha_enabled', '0'),
('recaptcha_secret_key', ''),
('recaptcha_site_key', ''),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_language', 'en_GB'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_debug', '0'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'phpauth_attempts'),
('table_emails_banned', 'phpauth_emails_banned'),
('table_requests', 'phpauth_requests'),
('table_sessions', 'phpauth_sessions'),
('table_translations', 'phpauth_translation_dictionary'),
('table_users', 'phpauth_users'),
('translation_source', 'php'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_emails_banned`
--

CREATE TABLE `phpauth_emails_banned` (
  `id` int(11) NOT NULL,
  `domain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_requests`
--

CREATE TABLE `phpauth_requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `token` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expire` datetime NOT NULL,
  `type` enum('activation','reset') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_sessions`
--

CREATE TABLE `phpauth_sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phpauth_sessions`
--

INSERT INTO `phpauth_sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(3, 5, '28c5c00aca0e37a1e4c994c01047f292e3b44ebd', '2020-04-08 13:35:25', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0', '0e4790906d711803f9d51f8fdaac0c89e9468707');

-- --------------------------------------------------------

--
-- Структура таблицы `phpauth_users`
--

CREATE TABLE `phpauth_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phpauth_users`
--

INSERT INTO `phpauth_users` (`id`, `email`, `password`, `isactive`, `dt`) VALUES
(1, 'test@email.com', '$2y$10$LyzA4EwBwmikHvZmZcJwheyT3W.dh.xta7ssZD0qBTuPwDQ09r1eS', 1, '2020-04-06 07:30:02'),
(2, 'te22st@email.com', '$2y$10$QVIgrwvGl8xtbxvh2.8FL.OYLi2lrNRJLNMeuKdH2HNaf80nGG9uS', 1, '2020-04-06 08:03:45'),
(3, 'svarv@fg.ru', '$2y$10$r.gswKtJ.RvffHcVbn0EKeye59AggP/PFxP8q3oVlpB8J9BlnwJRK', 1, '2020-04-08 10:00:09'),
(4, 'svarv@2fg.ru', '$2y$10$yGn1l2OLCQsyrEl/kL/9tO8zWj8YLZy7MxIdgb47E/KhxsxB4zuWu', 1, '2020-04-08 10:00:54'),
(5, 'qqs@mail.ru', '$2y$10$B2RkvpEe7w9PeNBFKuQMLuqrd2/vLvgnc5Y2FfPe.Jt4u4rdx8IMW', 1, '2020-04-08 10:16:27'),
(6, 'cafwegf@nm.ru', '$2y$10$Kiv08y1T4yDUTybuNXTPluuacoq0qwYMIthq72QVooWUQQ87Iruz.', 1, '2020-04-09 06:22:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `phpauth_attempts`
--
ALTER TABLE `phpauth_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`);

--
-- Индексы таблицы `phpauth_config`
--
ALTER TABLE `phpauth_config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Индексы таблицы `phpauth_emails_banned`
--
ALTER TABLE `phpauth_emails_banned`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phpauth_requests`
--
ALTER TABLE `phpauth_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `token` (`token`),
  ADD KEY `uid` (`uid`);

--
-- Индексы таблицы `phpauth_sessions`
--
ALTER TABLE `phpauth_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phpauth_users`
--
ALTER TABLE `phpauth_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `phpauth_attempts`
--
ALTER TABLE `phpauth_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `phpauth_emails_banned`
--
ALTER TABLE `phpauth_emails_banned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `phpauth_requests`
--
ALTER TABLE `phpauth_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `phpauth_sessions`
--
ALTER TABLE `phpauth_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT для таблицы `phpauth_users`
--
ALTER TABLE `phpauth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
