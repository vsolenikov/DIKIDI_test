-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 03 2024 г., 21:43
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `moto_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `moto_table`
--

CREATE TABLE `moto_table` (
                              `moto_id` int(11) NOT NULL,
                              `moto_name` varchar(100) NOT NULL,
                              `prod_status` tinyint(1) NOT NULL DEFAULT 1,
                              `moto_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `moto_table`
--

INSERT INTO `moto_table` (`moto_id`, `moto_name`, `prod_status`, `moto_type_id`) VALUES
                                                                                     (1, 'Moto_1', 0, 1),
                                                                                     (2, 'Moto_2', 1, 1),
                                                                                     (3, 'Moto_3', 0, 2),
                                                                                     (4, 'Moto_4', 1, 2),
                                                                                     (5, 'Moto_5', 0, 2),
                                                                                     (7, 'Moto_6', 4, 2),
                                                                                     (8, 'Moto_7', 0, 1),
                                                                                     (9, 'Motorolla', 1, 3),
                                                                                     (15, 'Motorcycle', 5, 3),
                                                                                     (16, 'Mottor', 1, 3),
                                                                                     (17, 'New_Moto', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `moto_types`
--

CREATE TABLE `moto_types` (
                              `moto_type_id` int(11) NOT NULL,
                              `name_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `moto_types`
--

INSERT INTO `moto_types` (`moto_type_id`, `name_type`) VALUES
                                                           (1, 'Type_1'),
                                                           (2, 'Type_2'),
                                                           (3, 'Type_3'),
                                                           (4, 'Old_Type_1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `moto_table`
--
ALTER TABLE `moto_table`
    ADD PRIMARY KEY (`moto_id`),
  ADD KEY `moto_type_id` (`moto_type_id`);

--
-- Индексы таблицы `moto_types`
--
ALTER TABLE `moto_types`
    ADD PRIMARY KEY (`moto_type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `moto_table`
--
ALTER TABLE `moto_table`
    MODIFY `moto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `moto_types`
--
ALTER TABLE `moto_types`
    MODIFY `moto_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `moto_table`
--
ALTER TABLE `moto_table`
    ADD CONSTRAINT `moto_table_ibfk_1` FOREIGN KEY (`moto_type_id`) REFERENCES `moto_types` (`moto_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
