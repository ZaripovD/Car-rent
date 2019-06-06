-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2019 г., 20:44
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car_rent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_model` int(5) UNSIGNED NOT NULL,
  `number` varchar(6) NOT NULL,
  `year` date NOT NULL,
  `id_type` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `id_model`, `number`, `year`, `id_type`) VALUES
(0, 0, '', '0000-00-00', 404),
(2, 2, 'b123bb', '2018-12-11', 3),
(3, 3, 'f222ff', '2010-03-01', 1),
(405, 1, 'А222АА', '2016-09-07', 3),
(424, 11, 'Н666АЙ', '2018-02-10', 3),
(425, 10, 'Ч123ОН', '2016-12-29', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `car_mark`
--

CREATE TABLE `car_mark` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car_mark`
--

INSERT INTO `car_mark` (`id`, `name`) VALUES
(0, 'ТОВАР УДАЛЕН'),
(1, 'Lada'),
(2, 'Chevrolet'),
(3, 'Ford'),
(4, 'Honda'),
(5, 'Acure'),
(6, 'Skoda'),
(7, '');

-- --------------------------------------------------------

--
-- Структура таблицы `car_model`
--

CREATE TABLE `car_model` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_mark` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car_model`
--

INSERT INTO `car_model` (`id`, `name`, `id_mark`) VALUES
(0, 'ТОВАР УДАЛЕН', 0),
(1, 'Granta', 1),
(2, 'Camaro', 2),
(3, '14', 1),
(4, 'Largus', 1),
(5, 'KALINA CROSS', 1),
(6, 'VESTA', 1),
(7, 'Xray', 1),
(8, 'Tahoe', 1),
(10, 'Traverse', 2),
(11, 'Octavia', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `fines`
--

CREATE TABLE `fines` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(70) NOT NULL,
  `cost` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fines`
--

INSERT INTO `fines` (`id`, `name`, `cost`) VALUES
(1, 'Минус бампер', 3000),
(2, 'всё ок', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_auto` int(5) UNSIGNED NOT NULL,
  `cost` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `id_auto`, `cost`) VALUES
(0, 0, 0),
(1, 2, 300),
(4, 424, 800),
(5, 425, 1300);

-- --------------------------------------------------------

--
-- Структура таблицы `rent`
--

CREATE TABLE `rent` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(5) UNSIGNED NOT NULL,
  `start_rent` date NOT NULL,
  `end_rent` date NOT NULL,
  `id_price` int(5) UNSIGNED NOT NULL,
  `id_fines` int(5) UNSIGNED DEFAULT '2',
  `summary` int(14) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rent`
--

INSERT INTO `rent` (`id`, `id_user`, `start_rent`, `end_rent`, `id_price`, `id_fines`, `summary`) VALUES
(1, 0, '2019-04-01', '2019-04-17', 0, 2, 1233),
(7, 0, '2019-04-04', '2019-04-22', 1, 1, 21111),
(40, 13, '2019-04-11', '2019-04-25', 1, 2, 14000),
(41, 13, '2019-04-12', '2019-04-29', 4, 2, 13600),
(42, 13, '2019-04-13', '2019-04-16', 4, 2, 2400),
(59, 13, '2019-04-12', '2019-04-13', 5, 2, 1300),
(60, 13, '2019-04-12', '2019-04-19', 5, 2, 9100),
(70, 13, '2019-04-12', '2019-04-27', 5, 2, 19500),
(72, 13, '2019-04-11', '2019-04-13', 4, 2, 1600),
(83, 17, '2019-04-12', '2019-04-19', 4, 2, 5600);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Юзер'),
(2, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Эконом'),
(2, 'Премиум'),
(3, 'Комфорт'),
(404, 'ТОВАР УДАЛЕН');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `email` varchar(230) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `family` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `fathername` varchar(35) NOT NULL,
  `birthday` date NOT NULL,
  `license_get` date NOT NULL,
  `license` varchar(10) NOT NULL,
  `phone` text NOT NULL,
  `id_role` int(5) UNSIGNED NOT NULL DEFAULT '1',
  `father` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `login`, `password`, `family`, `name`, `fathername`, `birthday`, `license_get`, `license`, `phone`, `id_role`, `father`) VALUES
(0, '', 'ПОЛЬЗОВАТЕЛЬ УД', '', '', '', '', '0000-00-00', '0000-00-00', '', '', 1, NULL),
(13, 'ma3aukos@gmail.com', 'GonZallo', '21232f297a57a5a', 'Зарипов', 'Данияр', 'Наилевич', '2000-02-07', '2018-03-10', '111155555', '9963361957', 2, NULL),
(17, '', 'stas', '7694f4a66316e53', '', '', '', '1996-03-02', '2014-02-02', '', '', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `car_mark`
--
ALTER TABLE `car_mark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mark` (`id_mark`);

--
-- Индексы таблицы `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Индексы таблицы `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_price` (`id_price`),
  ADD KEY `id_fines` (`id_fines`),
  ADD KEY `id_client` (`id_user`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT для таблицы `car_mark`
--
ALTER TABLE `car_mark`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `car_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`);

--
-- Ограничения внешнего ключа таблицы `car_model`
--
ALTER TABLE `car_model`
  ADD CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`id_mark`) REFERENCES `car_mark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id`);

--
-- Ограничения внешнего ключа таблицы `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rent_ibfk_5` FOREIGN KEY (`id_fines`) REFERENCES `fines` (`id`),
  ADD CONSTRAINT `rent_ibfk_6` FOREIGN KEY (`id_price`) REFERENCES `price` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
