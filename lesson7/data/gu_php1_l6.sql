-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2019 г., 15:03
-- Версия сервера: 5.7.25
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gu_php1_l6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `created_at`) VALUES
(2, '2019-07-01 09:12:00'),
(3, '2019-07-01 09:13:13'),
(4, '2019-07-01 09:13:45'),
(5, '2019-07-01 09:14:48'),
(6, '2019-07-01 09:15:55'),
(7, '2019-07-01 09:46:43'),
(8, '2019-07-01 09:47:31'),
(9, '2019-07-01 09:48:40'),
(10, '2019-07-01 09:49:12'),
(11, '2019-07-01 09:49:50'),
(12, '2019-07-01 09:49:58'),
(13, '2019-07-01 09:51:15'),
(14, '2019-07-01 09:51:34'),
(15, '2019-07-01 09:53:59'),
(16, '2019-07-01 09:56:01'),
(17, '2019-07-01 10:02:19'),
(18, '2019-07-01 10:04:13'),
(19, '2019-07-01 10:04:50'),
(20, '2019-07-01 10:05:19'),
(21, '2019-07-01 10:06:03'),
(22, '2019-07-01 11:18:53'),
(23, '2019-07-01 11:19:36'),
(24, '2019-07-01 11:19:54'),
(25, '2019-07-01 11:21:33');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `message` varchar(4096) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `message`, `datetime`) VALUES
(6, 'ewrwrwer', 'werwerwerwre', '2019-06-24 08:11:06');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `img` varchar(256) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`) VALUES
(1, 'Ноутбук', 'soon.png', 'Ноутбук', 40000),
(2, 'Телефон', 'soon.png', 'Телефон', 19999),
(3, 'Клавиатура', 'soon.png', 'Телефон', 1200),
(4, 'Мышка', 'soon.png', 'Мышка', 799);

-- --------------------------------------------------------

--
-- Структура таблицы `products_in_cart`
--

CREATE TABLE `products_in_cart` (
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_in_cart`
--

INSERT INTO `products_in_cart` (`product_id`, `cart_id`, `quantity`) VALUES
(3, 14, 1),
(2, 15, 2),
(1, 16, 1),
(2, 21, 5),
(1, 21, 5),
(3, 22, 1),
(2, 22, 3),
(2, 23, 3),
(2, 24, 1),
(2, 25, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role_id`) VALUES
(1, 'admin', '$2y$10$9fpAe0bBrMv3s72ouOU8oOu9SBaKhWVlkppeTUAYNIllRxkSYGLtC', 'mail@mail.me', 1),
(2, 'moderator', '$2y$10$t/nQVihvUJClgEKBwjOrUu/LUnlhg65EdDDlaZNO/XyCxt0xK6I/m', 'mail@mail.me', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD CONSTRAINT `products_in_cart_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `products_in_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
