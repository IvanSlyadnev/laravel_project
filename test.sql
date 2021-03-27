-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2021 г., 22:08
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_code` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `urls`
--

INSERT INTO `urls` (`id`, `user_id`, `name`, `url`, `short_code`, `counter`) VALUES
(12, 3, 'Ссылка', 'https://laravel.ru/docs/v5/migrations', 'lEwt0R', 1),
(14, 4, 'Валидация', 'https://laravel.com/docs/8.x/validation', '6mCLrw', 2),
(16, 3, 'Иван', 'https://github.com/vladneverov/Laravel-Short-Links/blob/master/resources/views/shortenLink.blade.php', 'tZbFgy', 1),
(22, 3, 'Роутинг', 'https://laravel.com/docs/8.x/routing', 'DH27Lg', 0),
(23, 3, 'диск', 'https://yadi.sk/d/chl8YVJ157vMmw', 'CT5YkO', 1),
(28, 4, 'Роутинг', 'https://laravel.com/docs/8.x/routing', 'EtvDgX', 0),
(30, 4, 'ГитХаб', 'https://github.com/vladneverov/Laravel-Short-Links/blob/master/resources/views/shortenLink.blade.php', '15OJU1', 2),
(31, 4, 'phpmyadmin', 'http://127.0.0.1/openserver/phpmyadmin/sql.php?server=1&db=test&table=urls&pos=0', 'VgfQDh', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(3, 'test@gmail.com', '$2y$10$kEIPTJLNgA5U2hDDx18sN.wEfTGeIDHzdppTkhhTvSM.Jl7EHLqDm'),
(4, 'alex@gmail.com', '$2y$10$mbIb7WlJGj4/qZNgp0Oo1eALGl9q6SoNrkzVIVLf8ZInfjufa9hjK'),
(5, 'ivanslyadnev2015@gmail.com', '$2y$10$RglzsWU9Rnwope0rCsjivOwlnWQ7xia.0FnWCKvEgEIsHC37O6xk6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `urls`
--
ALTER TABLE `urls`
  ADD CONSTRAINT `urls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
