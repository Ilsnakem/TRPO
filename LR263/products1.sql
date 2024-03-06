-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 29 2024 г., 16:58
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydatabase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products1`
--

CREATE TABLE `products1` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products1`
--

INSERT INTO `products1` (`id`, `category`, `name`, `description`, `price`, `image_path`) VALUES
(8, 'Электроника', 'Смартфон', 'Мощный смартфон с отличной камерой', '599.99', 'images/pr1.jpg'),
(9, 'Одежда', 'Куртка', 'Теплая зимняя куртка', '129.99', 'images/pr3.jpg'),
(10, 'Книги', 'Роман \"Прекрасные новые миры\"', 'Фантастический роман Алдоуса Хаксли', '19.99', 'images/pr4.jpg'),
(11, 'Электроника', 'Ноутбук', 'Легкий и производительный ноутбук', '899.99', 'images/pr2.jpeg'),
(12, 'Одежда', 'Футболка', 'Комфортная хлопковая футболка', '19.99', 'images/pr5.jpg'),
(13, 'Книги', 'Детектив \"Тайная комната\"', 'Захватывающий детектив от Агаты Кристи', '14.99', 'images/pr6.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products1`
--
ALTER TABLE `products1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products1`
--
ALTER TABLE `products1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
