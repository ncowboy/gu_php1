-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2019 г., 17:47
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
  `status` int(11) NOT NULL DEFAULT '1',
  `id_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `status`, `id_order`, `created_at`) VALUES
(41, 1, NULL, '2019-07-04 10:22:26'),
(42, 1, NULL, '2019-07-04 10:32:05'),
(43, 1, NULL, '2019-07-04 10:33:22'),
(44, 1, NULL, '2019-07-04 10:34:05'),
(45, 1, NULL, '2019-07-04 10:36:37'),
(48, 1, NULL, '2019-07-04 11:35:28'),
(49, 1, NULL, '2019-07-04 11:35:28'),
(57, 1, NULL, '2019-07-04 11:51:51'),
(58, 1, NULL, '2019-07-04 11:51:51'),
(70, 1, NULL, '2019-07-04 12:57:57'),
(71, 2, 3, '2019-07-04 13:51:45'),
(72, 2, 4, '2019-07-04 13:58:58'),
(73, 2, 5, '2019-07-04 14:11:34'),
(74, 2, 6, '2019-07-04 14:12:41'),
(75, 2, 7, '2019-07-04 14:45:03'),
(78, 1, NULL, '2019-07-04 14:46:21');

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
(6, 'ewrwrwer', 'werwerwerwre', '2019-06-24 08:11:06'),
(7, 'sadasd', 'asdasd', '2019-07-03 13:28:52');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `info` varchar(2048) NOT NULL,
  `id_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `info`, `id_user`) VALUES
(1, 'Админasdas', 'dasdasd', 'asdas', 'dasdasd', 1),
(2, 'Админ111111', '1111111', '11111111', '11111111111111', 1),
(3, 'Админ111111', '1111111', '11111111', '11111111111111', 1),
(4, 'Админasdasd', 'asda', 'sdasdasd', 'asdasdasd', 1),
(5, 'Админ```````', '````````````', '````````', '`````````````````', 1),
(6, 'Админ`11111111', '111111', '1111111', '11111111111', 1),
(7, 'Игорь', '+79261220379', 'На деревню дедушке', 'с 10 до 18', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`) VALUES
(1, 'created'),
(2, 'ordered');

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
(3, 41, 6),
(2, 41, 1),
(1, 41, 1),
(4, 41, 7),
(4, 42, 2),
(3, 42, 1),
(4, 43, 1),
(1, 44, 1),
(2, 44, 1),
(4, 44, 1),
(3, 45, 5),
(4, 45, 10),
(2, 45, 1),
(2, 48, 2),
(2, 49, 1),
(3, 57, 1),
(3, 58, 1),
(4, 70, 3),
(4, 71, 4),
(3, 72, 1),
(2, 73, 3),
(3, 74, 5),
(3, 75, 2),
(2, 75, 1),
(1, 75, 4),
(4, 75, 4),
(2, 78, 1);

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
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`, `email`, `role_id`) VALUES
(1, 'admin', 'Админ', '$2y$10$9fpAe0bBrMv3s72ouOU8oOu9SBaKhWVlkppeTUAYNIllRxkSYGLtC', 'mail@mail.me', 1),
(2, 'moderator', 'Модератор', '$2y$10$t/nQVihvUJClgEKBwjOrUu/LUnlhg65EdDDlaZNO/XyCxt0xK6I/m', 'mail@mail.me', 2),
(3, 'user', 'Юзер', '$2y$10$gxSpramQUaKfMGP1Alep1OesAzLJBbHLqsbOdewrVR9Con30yRuT.', 'mail@mail.me', 2),
(4, 'user1', 'sadasd', '$2y$10$cbU12Qp5S9Fl/hzqJ9bbW.KDPQdbNUrBxQJKOr5yed.r6OAgpkEfS', 'asdasd@sadads.sd', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
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
  ADD KEY `products_in_cart_ibfk_1` (`cart_id`),
  ADD KEY `products_in_cart_ibfk_2` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`status`) REFERENCES `order_statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_in_cart`
--
ALTER TABLE `products_in_cart`
  ADD CONSTRAINT `products_in_cart_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_in_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
