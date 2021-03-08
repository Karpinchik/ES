-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 08 2021 г., 15:18
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `elsila_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feed_back_tbl`
--

CREATE TABLE `feed_back_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name_image` varchar(191) NOT NULL,
  `file_tmp_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feed_back_tbl`
--

INSERT INTO `feed_back_tbl` (`id`, `name`, `email`, `message`, `display`, `created_at`, `updated_at`, `name_image`, `file_tmp_name`) VALUES
(18, 'Kate', 'kate@mail.ru', 'one test text', 1, '2021-03-08 15:05:15', '2021-03-08 15:03:44', 'zdaniia_arhitektura_ozero_144390_1920x1080.jpg', 'app/uploads/'),
(19, 'Din', 'demo@mail.ru', 'Din test text', 1, '2021-03-08 15:06:17', '2021-03-08 15:03:22', 'Безянный.png', 'app/uploads/'),
(20, 'test', 'test@mail.ru', 'test', 0, '2021-03-08 15:07:19', NULL, '1006361.jpeg', 'app/uploads/');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feed_back_tbl`
--
ALTER TABLE `feed_back_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feed_back_tbl`
--
ALTER TABLE `feed_back_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
