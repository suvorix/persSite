-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 25 2018 г., 14:48
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
(7, 'Педагогическая деятельность', '{\"min\":\"\\/img\\/uploads\\/min-00fb0759.jpg\",\"max\":\"\\/img\\/uploads\\/max-00fb0759.jpg\"}', '1521816662'),
(8, 'Мастер педагогического труда - 2015', '{\"min\":\"\\/img\\/uploads\\/min-c0e7087b.jpg\",\"max\":\"\\/img\\/uploads\\/max-c0e7087b.jpg\"}', '1521816816'),
(9, 'Новогодний огонек ПС-15', '{\"min\":\"\\/img\\/uploads\\/min-efb06d51.jpg\",\"max\":\"\\/img\\/uploads\\/max-efb06d51.jpg\"}', '1521816906'),
(10, 'Зимние каникулы', '{\"min\":\"\\/img\\/uploads\\/min-9085a127.jpg\",\"max\":\"\\/img\\/uploads\\/max-9085a127.jpg\"}', '1521817024');

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
(2, 0, 'Достижения', 'Описание раздела', 'methodological'),
(3, 0, '2 курс', 'Описание раздела', 'student'),
(4, 0, '3 курс', 'Описание раздела', 'student');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `cmt_name` varchar(255) NOT NULL,
  `cmt_email` varchar(255) NOT NULL,
  `cmt_text` text NOT NULL,
  `cmt_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `cmt_name`, `cmt_email`, `cmt_text`, `cmt_date`) VALUES
(1, 'suvorix', 'suvorix@vhavke.ru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ullam aspernatur, laboriosam repellendus molestiae at debitis. Delectus libero iusto fuga ipsum ducimus doloremque suscipit necessitatibus a consectetur quos. Iste, ex!', '151515'),
(2, 'Иван Иванов', 'test@email.com', 'В это трудно поверить, но крошечная японская компания Aspark, о которой совсем недавно никто и знать не знал, разработала электрический гиперкар Owl, который обещал победить в разгоне до «сотни» все существующие автомобили для дорог общего пользования. Сказано — сделано! Японцы опубликовали видео чудовищного разгона «Совы» до 100 км/ч с результатом… 1,92 секунды! https://www.popmech.ru/vehicles/411052-yaponcy-pokazali-razgon-do-100-km-ch-za-192-sekundy/?utm_referrer=https%3A%2F%2Fzen.yandex.com', '151516'),
(16, 'Админ', 'admin@karpusheva.esy.es', 'Тестовый отзыв сделанный из админки.', '1521968872'),
(17, 'asd', 'nik_suv1999@mail.ru', 'asdsd', '1521977830'),
(18, 'test123', 'nik_suv1999@mail.ru', 'dasd', '1521977883'),
(19, 'capchatestt', 'nik_suv1999@mail.ru', 'adsasd', '1521977928');

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
  `pg_group` varchar(255) NOT NULL DEFAULT 'methodological',
  `pg_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id_page`, `pg_catId`, `pg_name`, `pg_description`, `pg_text`, `pg_group`, `pg_date`) VALUES
(1, 1, 'УМК', 'Описание страницы', '<h3>Учебно-методический комплекс</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure laborum optio tempore dolorem minima. Eveniet provident repellendus minima ad tempora, dolorem expedita odio labore adipisci, dolores qui itaque doloremque modi?</p><ul><li><a href=\"#\">GIMP</a><ul><li><a href=\"#\">Лекции</a></li><li><a href=\"#\">Примеры для практических работ</a></li><li><a href=\"#\">Тестирование</a></li><li><a href=\"#\">Практические задания</a></li></ul></li><li><a href=\"#\">Photoshop</a><ul><li><a href=\"#\">Лекции</a></li><li><a href=\"#\">Примеры для практических работ</a></li><li><a href=\"#\">Тестирование</a></li><li><a href=\"#\">Практические задания</a></li></ul></li><li><a href=\"#\">Flash</a><ul><li><a href=\"#\">Лекции</a></li><li><a href=\"#\">Примеры для практических работ</a></li><li><a href=\"#\">Тестирование</a></li><li><a href=\"#\">Практические задания</a></li></ul></li><li><a href=\"#\">Video Editing</a><ul><li><a href=\"#\">Лекции</a></li><li><a href=\"#\">Примеры для практических работ</a></li><li><a href=\"#\">Тестирование</a></li><li><a href=\"#\">Практические задания</a></li></ul></li></ul>', 'methodological', '151515'),
(2, 1, 'Проектная деятельность', 'Описание страницы', '<p>Проектная деятельность</p>', 'methodological', '151516'),
(3, 1, 'Публикации', 'Описание страницы', '<p>Публикации</p>', 'methodological', '151517'),
(4, 2, 'Участие в конкурсах', 'Описание страницы', '<p>Участие в конкурсах</p>', 'methodological', '151518'),
(5, 2, 'Награды и благодарности', 'Описание страницы', '<p>Награды и благодарности</p>', 'methodological', '151519'),
(6, 2, 'Достижения студентов', 'Описание страницы', '<p>Достижения студентов</p>', 'methodological', '151520'),
(7, 1, 'Методическая копилка', 'Описание страницы', '<p>Методическая копилка</p>', 'methodological', '151521'),
(8, 1, 'Анализ педагогической деятельности', 'Описание страницы', '<p>Анализ педагогической деятельности</p>', 'methodological', '151522'),
(9, 0, 'Рабочие программы', 'Описание страницы', '<p>Рабочие программы</p>', 'methodological', '151523'),
(10, 0, 'Контрольно-оценочные средства', 'Описание страницы', '<p>Контрольно-оценочные средства</p>', 'methodological', '151524'),
(11, 3, '|ОП.05| Основы программирования', 'Описание страницы', '<p>Основы программирования</p>', 'student', '151525'),
(12, 3, '|МДК 01.02| Прикладное программирование', 'Описание страницы', '<p>Прикладное программирование</p>', 'student', '151526'),
(13, 4, '|МДК 03.01| Технология разработки программного обеспечения', 'Описание страницы', '<h3>Технология разработки программного обеспечения</h3><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><ul><li><a href=\"\">Лекция 1. Основные понятия и определения</a></li><li><a href=\"\">Лекция 2. Модели процессов жизненного цикла систем и программных средств</a></li><li><a href=\"\">Лекция 3. Роль системотехники в прогрпммной инженерии</a></li><li><a href=\"\">Лекция 4. Системные основы современных технологий программной инженерии</a></li><li><a href=\"\">Лекция 5. Профили стандартов жизненного цикла систем и программных средств</a></li><li><a href=\"\">Лекция 6. Модели и процессы управления проектами программных средств</a></li><li><a href=\"\">Лекция 7. Стандарты менеджмента (административного управления) качестом систем</a></li><li><a href=\"\">Лекция 8. Стандарты открытых систем</a></li><li><a href=\"\">Лекция 9. Цели и принципы системного проектирования</a></li><li><a href=\"\">Лекция 10. Структурное проектирование программных средств</a></li><li><a href=\"\">Лекция 11. Проектирование программных средств</a></li><li><a href=\"\">Лекция 12. Разработка технического задания</a></li><li><a href=\"\">Лекция 13. Примеры разработки технического задания</a></li><li><a href=\"\">Лекция 14. Цели и процессы обоснования проектов программных средств</a></li><li><a href=\"\">Лекция 15. Методики оценивания технико-экономических показателей</a></li><li><a href=\"\">Лекция 17. Диаграммы переходов состояний</a></li><li><a href=\"\">Лекция 18. Функциональные диаграммы</a></li><li><a href=\"\">Лекция 19. Диаграммы потоков данных</a></li><li><a href=\"\">Лекция 20. Диаграмма \"Сущьность-связь\"</a></li><li><a href=\"\">Лекция 23. Структурная схема. Функциональная схема.</a></li></ul>', 'student', '151527'),
(14, 4, '|МДК 03.03| Документирование и сертификация', 'Описание страницы', '<p>Документирование и сертификация</p>', 'student', '151528');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id_photo` int(11) NOT NULL,
  `pht_albumId` int(11) NOT NULL,
  `pht_img` varchar(255) NOT NULL DEFAULT '{"min": "/img/default.png", "max": "/img/default.png"}',
  `pht_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photo`, `pht_albumId`, `pht_img`, `pht_date`) VALUES
(12, 7, '{\"min\":\"\\/img\\/uploads\\/min-679c8075.jpg\",\"max\":\"\\/img\\/uploads\\/max-679c8075.jpg\"}', '1521816677'),
(13, 7, '{\"min\":\"\\/img\\/uploads\\/min-d48a45de.jpg\",\"max\":\"\\/img\\/uploads\\/max-d48a45de.jpg\"}', '1521816687'),
(14, 7, '{\"min\":\"\\/img\\/uploads\\/min-578a7b78.jpg\",\"max\":\"\\/img\\/uploads\\/max-578a7b78.jpg\"}', '1521816698'),
(15, 7, '{\"min\":\"\\/img\\/uploads\\/min-5e38f175.jpg\",\"max\":\"\\/img\\/uploads\\/max-5e38f175.jpg\"}', '1521816709'),
(16, 7, '{\"min\":\"\\/img\\/uploads\\/min-3471db5b.jpg\",\"max\":\"\\/img\\/uploads\\/max-3471db5b.jpg\"}', '1521816723'),
(17, 7, '{\"min\":\"\\/img\\/uploads\\/min-dd7b427f.jpg\",\"max\":\"\\/img\\/uploads\\/max-dd7b427f.jpg\"}', '1521816734'),
(18, 8, '{\"min\":\"\\/img\\/uploads\\/min-a20ebfd1.jpg\",\"max\":\"\\/img\\/uploads\\/max-a20ebfd1.jpg\"}', '1521816827'),
(19, 8, '{\"min\":\"\\/img\\/uploads\\/min-6699c825.jpg\",\"max\":\"\\/img\\/uploads\\/max-6699c825.jpg\"}', '1521816837'),
(20, 9, '{\"min\":\"\\/img\\/uploads\\/min-610cf238.jpg\",\"max\":\"\\/img\\/uploads\\/max-610cf238.jpg\"}', '1521816921'),
(21, 9, '{\"min\":\"\\/img\\/uploads\\/min-db699a24.jpg\",\"max\":\"\\/img\\/uploads\\/max-db699a24.jpg\"}', '1521816931'),
(22, 9, '{\"min\":\"\\/img\\/uploads\\/min-12c35c69.jpg\",\"max\":\"\\/img\\/uploads\\/max-12c35c69.jpg\"}', '1521816941'),
(23, 9, '{\"min\":\"\\/img\\/uploads\\/min-d6542b9d.jpg\",\"max\":\"\\/img\\/uploads\\/max-d6542b9d.jpg\"}', '1521816951'),
(24, 9, '{\"min\":\"\\/img\\/uploads\\/min-cc51f82a.jpg\",\"max\":\"\\/img\\/uploads\\/max-cc51f82a.jpg\"}', '1521816963'),
(25, 9, '{\"min\":\"\\/img\\/uploads\\/min-9c3ad12a.jpg\",\"max\":\"\\/img\\/uploads\\/max-9c3ad12a.jpg\"}', '1521816974'),
(26, 10, '{\"min\":\"\\/img\\/uploads\\/min-8473a31a.jpg\",\"max\":\"\\/img\\/uploads\\/max-8473a31a.jpg\"}', '1521817046'),
(27, 10, '{\"min\":\"\\/img\\/uploads\\/min-544cfd93.jpg\",\"max\":\"\\/img\\/uploads\\/max-544cfd93.jpg\"}', '1521817056'),
(28, 10, '{\"min\":\"\\/img\\/uploads\\/min-2bb6183b.jpg\",\"max\":\"\\/img\\/uploads\\/max-2bb6183b.jpg\"}', '1521817067');

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
