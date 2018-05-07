-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 07 2018 г., 13:09
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `referal`
--

INSERT INTO `referal` (`id`, `user_id`, `referal_id`) VALUES
(1, 6, 8),
(2, 6, 9),
(3, 6, 10),
(4, 6, 11),
(5, 6, 12),
(6, 9, 13),
(7, 9, 14),
(8, 17, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `authKey` varchar(200) NOT NULL,
  `accessToken` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_db`
--

INSERT INTO `user_db` (`id`, `email`, `password`, `authKey`, `accessToken`) VALUES
(6, 'q@q.q', 'q', 'keyq@q.q', 'q@q.qq@q.q'),
(7, 'qwe@qwe.ru', 'ww', 'qwe@qwe.ru_Key', 'qwe@qwe.ru_Token'),
(8, 'w@w.w', 'www', 'w@w.w_Key', 'w@w.w_Token'),
(9, 'd@d.d', 'ddd', 'd@d.d_Key', 'd@d.d_Token'),
(10, 'd@d.d1', 'ddd', 'd@d.d1_Key', 'd@d.d1_Token'),
(11, 'd@d.d11', 'ddd', 'd@d.d11_Key', 'd@d.d11_Token'),
(12, 'd@d.d111', 'ddd', 'd@d.d111_Key', 'd@d.d111_Token'),
(13, 'd@d.d1111', 'ddd', 'd@d.d1111_Key', 'd@d.d1111_Token'),
(14, 'a@s.s', 'sss', 'a@s.s_Key', 'a@s.s_Token'),
(15, 'qwe@qwe.qwe', 'qwe', 'qwe@qwe.qwe_Key', 'qwe@qwe.qwe_Token'),
(16, 'qwe@qwe.qwe11', 'qwe', 'qwe@qwe.qwe11_Key', 'qwe@qwe.qwe11_Token'),
(17, 'a@a.a', 'aaa', 'a@a.a_Key', 'a@a.a_Token'),
(18, 'f@f.f', 'fff', 'f@f.f_Key', 'f@f.f_Token');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
