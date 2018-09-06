-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 06 2018 г., 07:57
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sibers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `gender`, `birthday`, `role`) VALUES
(1, 'ulanbek', '827ccb0eea8a706c4c34a16891f84e7b', 'ulik one', 'jumabai', 1, '01/01/2001', 1),
(7, 'ulanc', '827ccb0eea8a706c4c34a16891f84e7b', 'ulik 2', 'jumabai', 1, '01/01/2001', 2),
(9, 'ulan one', '827ccb0eea8a706c4c34a16891f84e7b', 'ulik 4', 'jumabai', 1, '01/01/2001', 2),
(10, 'ulanz', '', 'new 5', 'jumabai', 2, '01/01/2001', 2),
(12, 'ulanbek', '8cb2237d0679ca88db6464eac60da96345513964', 'ulik 6', 'Bilan', 1, '01/01/2001', 2),
(13, 'juma', '8cb2237d0679ca88db6464eac60da96345513964', 'ulik 7', 'Bilan', 1, '01/01/2001', 2),
(14, 'Arra', '8cb2237d0679ca88db6464eac60da96345513964', 'ulan 8', 'Bilan', 1, '01/01/2001', 2),
(15, 'Bluev', '8cb2237d0679ca88db6464eac60da96345513964', 'ulan 9', 'Bilan', 1, '01/01/2001', 2),
(16, 'Red', '8cb2237d0679ca88db6464eac60da96345513964', 'ulan 10', 'Bilan', 1, '01/01/2001', 2),
(20, 'Nur', '8cb2237d0679ca88db6464eac60da96345513964', 'ulan 11', 'Bilan', 1, '01/01/2001', 2),
(22, 'ulancho', '8cb2237d0679ca88db6464eac60da96345513964', 'Ulan', 'Jumabaev', 1, '01/01/0000', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
