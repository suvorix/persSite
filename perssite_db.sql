-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2018 г., 22:47
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `perssite_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `alb_name` varchar(255) NOT NULL,
  `alb_image` varchar(255) NOT NULL DEFAULT '{"min": "/img/default.png", "max": "/img/default.png"}',
  `alb_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id_album`, `alb_name`, `alb_image`, `alb_date`) VALUES
(1, 'Педагогическая деятельность', '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', '15151515'),
(2, 'Мастер педагогического труда - 2015', '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', '15151516'),
(3, 'Новогодний огонек ПС-15', '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', '15151517'),
(4, 'Зимние каникулы', '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', '15151518'),
(5, 'Ещё один альбом с очень длинным названием для проверки многоточий', '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', '15151519');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `ctg_parentId` int(11) NOT NULL DEFAULT '0',
  `ctg_name` varchar(255) NOT NULL,
  `ctg_description` varchar(255) NOT NULL,
  `ctg_page` varchar(255) NOT NULL DEFAULT 'methodological'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `ctg_parentId`, `ctg_name`, `ctg_description`, `ctg_page`) VALUES
(1, 0, 'Методическая работа', 'Описание раздела', 'methodological'),
(2, 0, 'Достижения', 'Описание раздела', 'methodological');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `cmt_name` varchar(255) NOT NULL,
  `cmt_email` varchar(255) NOT NULL,
  `cmt_text` varchar(500) NOT NULL,
  `cmt_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `cmt_name`, `cmt_email`, `cmt_text`, `cmt_date`) VALUES
(1, 'suvorix', 'suvorix@vhavke.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ullam aspernatur, laboriosam repellendus molestiae at debitis. Delectus libero iusto fuga ipsum ducimus doloremque suscipit necessitatibus a consectetur quos. Iste, ex!', '151515'),
(2, 'Иван Иванов', 'test@email.com', 'В это трудно поверить, но крошечная японская компания Aspark, о которой совсем недавно никто и знать не знал, разработала электрический гиперкар Owl, который обещал победить в разгоне до «сотни» все существующие автомобили для дорог общего пользования. Сказано — сделано! Японцы опубликовали видео чудовищного разгона «Совы» до 100 км/ч с результатом… 1,92 секунды! https://www.popmech.ru/vehicles/411052-yaponcy-pokazali-razgon-do-100-km-ch-za-192-sekundy/?utm_referrer=https%3A%2F%2Fzen.yandex.com', '151516');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `pg_catId` int(11) NOT NULL DEFAULT '0',
  `pg_name` varchar(255) NOT NULL,
  `pg_description` varchar(255) NOT NULL,
  `pg_text` text NOT NULL,
  `pg_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id_page`, `pg_catId`, `pg_name`, `pg_description`, `pg_text`, `pg_date`) VALUES
(1, 1, 'УМК', 'Описание страницы', '<p>CONTENT</p>', '151515'),
(2, 1, 'Проектная деятельность', 'Описание страницы', '<p>CONTENT</p>', '151516'),
(3, 1, 'Публикации', 'Описание страницы', '<p>CONTENT</p>', '151517'),
(4, 2, 'Участие в конкурсах', 'Описание страницы', '<p>CONTENT</p>', '151518'),
(5, 2, 'Награды и благодарности', 'Описание страницы', '<p>CONTENT</p>', '151519'),
(6, 2, 'Достижения студентов', 'Описание страницы', '<p>CONTENT</p>', '151520'),
(7, 1, 'Методическая копилка', 'Описание страницы', '<p>CONTENT</p>', '151521'),
(8, 1, 'Анализ педагогической деятельности', 'Описание страницы', '<p>CONTENT</p>', '151522'),
(9, 0, 'Рабочие программы', 'Описание страницы', '<p>CONTENT</p>', '151523'),
(10, 0, 'Контрольно-оценочные средства', 'Описание страницы', '<p>CONTENT</p>', '151524');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `pht_albumId` int(11) NOT NULL,
  `pht_img` varchar(255) NOT NULL DEFAULT '{"min": "/img/default.png", "max": "/img/default.png"}',
  `pht_imgDesc` varchar(255) NOT NULL,
  `pht_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photo`, `pht_albumId`, `pht_img`, `pht_imgDesc`, `pht_date`) VALUES
(1, 1, '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', 'ImageDescription', '151515'),
(2, 1, '{\"min\": \"/img/default.png\", \"max\": \"/img/default.png\"}', 'ImageDescription', '151516'),
(3, 5, '{\"min\": \"/img/uploads/1.jpg\", \"max\": \"/img/uploads/1.jpg\"}', 'ImageDescription', '151516');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
