-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2017 г., 16:24
-- Версия сервера: 5.7.13-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `postID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `commentDesc` varchar(500) NOT NULL,
  `commentAuthor` varchar(500) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`postID`, `commentID`, `commentDesc`, `commentAuthor`, `commentTime`) VALUES
(47, 19, 'ded', 'kolian', '2017-02-26 17:09:05'),
(47, 20, 'vdvs', 'kolian', '2017-02-26 17:09:12'),
(47, 21, 'efw', 'kolian', '2017-02-26 17:09:26'),
(47, 23, 'efw', 'kolian', '2017-02-26 17:46:59'),
(47, 24, 'efw', 'kolian', '2017-02-26 17:47:03'),
(47, 25, 'works!', 'kolian', '2017-02-26 18:40:31'),
(47, 26, 'works!', 'kolian', '2017-02-26 18:41:23'),
(47, 27, 'works!', 'kolian', '2017-02-26 18:41:42'),
(47, 28, 'works!', 'kolian', '2017-02-26 18:44:34'),
(47, 29, 'works!', 'kolian', '2017-02-26 18:44:43'),
(59, 32, 'Отличная статья!', 'kolian', '2017-03-02 18:09:02'),
(59, 33, 'Хочу еще новостей!', 'kolian', '2017-03-02 18:09:08'),
(59, 58, 'Странная статья...', 'kolian', '2017-03-02 19:35:41'),
(59, 59, 'Странная статья...', 'kolian', '2017-03-02 19:35:44'),
(59, 60, 'Странная статья...', 'kolian', '2017-03-02 19:36:04'),
(59, 61, 'Странная статья...', 'kolian', '2017-03-02 19:36:07'),
(59, 62, 'О чем статья? =)', 'kolian', '2017-03-02 19:37:08'),
(55, 63, 'Optio, cumque nihil molestiae consequatur.', 'kolian', '2017-03-03 09:03:17'),
(56, 64, 'Работают коментарии!', 'kolian', '2017-03-03 09:20:22'),
(56, 66, '', 'kolian123', '2017-03-03 16:54:56'),
(56, 67, 'Работают коментарии! 232', 'kolian123', '2017-03-03 16:55:00');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postDesc` varchar(10000) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postTag` varchar(40) NOT NULL,
  `postImage` varchar(100) NOT NULL,
  `postAuthor` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postImage`, `postAuthor`) VALUES
(41, 'Каждый веб-разработчик знает, что такое текст-«рыба»', 'Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, несмотря на название, не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. ', '2017-02-26 12:48:14', 'рыба', 'images/20140520-gal7.jpg', 'admin'),
(42, 'Самым известным «рыбным» текстом является знаменитый Lorem ipsum', 'Самым известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в книгопечатании еще в XVI веке. Своим появлением Lorem ipsum обязан древнеримскому философу Цицерону, ведь именно из его трактата «О пределах добра и зла» средневековый книгопечатник вырвал отдельные фразы и слова, получив текст-«рыбу», широко используемый и по сей день. ', '2017-02-26 12:48:51', 'Lorem', 'images/2221.jpg', 'admin'),
(43, 'И даже с языками, использующими латинский алфавит', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой, имеется разница в длине наиболее распространенных слов. Отсюда напрашивается вывод, что все же лучше использовать в качестве «рыбы» текст на том языке, который планируется использовать при запуске проекта. ', '2017-02-26 12:49:58', 'алфавит', 'images/Schlaf-Elefant.jpg', 'admin'),
(44, 'Грибной, проливной, мелкий и взвыл от страха природу!', 'Грибной, проливной, мелкий и взвыл от страха природу. Богдан хмельницкий послал русскому царю телеграмму и часто. Он сразу женился декабристы накопили большую потенцию и часто ходила. Плохие он сразу женился под дождём. Горницу вошел негр, румяный. Виляя хвостом птицы, кроме вороны обломов разложил. Часто ходила на меня напала. Ольгу на двор и взвыл от страха мелкий и четырёх пар.', '2017-02-26 12:51:53', 'Грибной', 'images/zhhDQ.jpg', 'admin'),
(45, 'Слегка попахивая плохие он сразу женился слегка попахивая старуха', 'Слегка попахивая плохие он сразу женился слегка попахивая старуха. Сделать! длинными зимними холодными вечерами она не пожалел для друга. Чеканя шаг, прошли танки стихотворение написано в клетке сидит мой пернатый друг. Плохие он сразу женился друга ни белая мошонка пьера безухова в заду. Бессмертный хранил свою смерть в ледяную воду.. поезда. Негр, румяный с точками на кота и сам не пожалел.', '2017-02-26 12:58:17', 'Слегка', 'images/1457079283_kartinki-25.jpg', 'admin'),
(46, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet. Quam nihil impedit, quo minus. Rem aperiam eaque ipsa, quae. Inventore veritatis et dolore magnam aliquam quaerat. Debitis aut reiciendis voluptatibus maiores. Quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex. Ipsa, quae ab illo inventore veritatis et dolore magnam aliquam quaerat. Consequatur, vel illum, qui ratione voluptatem sequi nesciunt neque. Natus error sit voluptatem sequi nesciunt.', '2017-02-26 12:58:55', 'ipsum', 'images/1458690561_1.jpg', 'admin'),
(47, 'Amet, consectetur, adipisci velit, sed quia non numquam eius', 'Amet, consectetur, adipisci velit, sed quia non numquam eius. Dolor sit, amet, consectetur, adipisci velit, sed ut et harum quidem. Eum iure reprehenderit, qui blanditiis praesentium voluptatum deleniti atque corrupti. Assumenda est, omnis voluptas nulla vero eos et molestiae consequatur, vel illum. Labore et quasi architecto beatae vitae dicta sunt, explicabo sint. Omnis dolor repellendus accusamus. Consequatur aut odit aut perferendis doloribus asperiores repellat. sapiente delectus, ut labore.', '2017-02-26 12:59:40', 'Amet', 'images/images (1).jpg', 'admin'),
(54, 'Consequatur WORK!!!!', 'Consequatur aut officiis debitis aut odit aut odit aut officiis debitis. Hic tenetur a sapiente delectus. Nihil impedit, quo voluptas sit. Aliquid ex ea commodi autem quibusdam. Dignissimos ducimus, qui molestiae non numquam eius modi tempora incidunt. Omnis dolor repellendus ea voluptate velit esse quam. Earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Voluptates repudiandae sint et dolore magnam aliquam quaerat voluptatem sequi.', '2017-02-26 19:40:16', 'Consequatur', 'images/1462460739_kartinki-4.jpg', 'kolian'),
(55, 'Laudantium', 'Laudantium, totam rem aperiam eaque ipsa. Necessitatibus saepe eveniet, ut labore. Consequatur aut officiis debitis aut odit aut perferendis doloribus asperiores repellat.. Culpa, qui quibusdam et iusto odio dignissimos ducimus. Ut perspiciatis, unde omnis voluptas. Sint et molestiae non numquam eius modi tempora incidunt. Et iusto odio dignissimos ducimus, qui in ea voluptate velit. Optio, cumque nihil molestiae consequatur.', '2017-02-26 19:42:26', 'Laudantium', 'images/79195-6824508-Yosemite_Winter_jpg1.jpg', 'kolian'),
(56, 'Commodi autem vel eum fugiat', 'Commodi autem vel eum fugiat, quo minus id, quod maxime placeat facere. Dolorem eum iure reprehenderit, qui. Laborum et quas molestias excepturi sint, obcaecati cupiditate non numquam eius. Ipsam voluptatem, quia dolor sit, aspernatur. Obcaecati cupiditate non provident, similique sunt in ea voluptate. Ratione voluptatem sequi nesciunt, neque porro. Cumque nihil molestiae consequatur, vel eum fugiat, quo voluptas assumenda est.', '2017-02-26 19:59:40', 'Commodi', 'images/2844-1600x1200.jpg', 'kolian'),
(57, 'Eveniet', 'Eveniet, ut aut reiciendis voluptatibus maiores alias. Sunt in ea commodi autem quibusdam et quas molestias. Ab illo inventore veritatis et dolore magnam aliquam quaerat voluptatem. Soluta nobis est laborum et molestiae consequatur. Eveniet, ut enim ad minima veniam. Quo voluptas nulla vero eos et aut rerum facilis est eligendi optio. Nihil molestiae consequatur, vel eum fugiat, quo voluptas sit, amet consectetur.', '2017-02-26 20:00:09', 'Eveniet', 'images/18961-1280x1024.jpg', 'kolian'),
(59, 'Наиболее распространенных', 'Наиболее распространенных слов сегодня существует несколько вариантов lorem создающие собственные варианты. Восприятия макета веб-дизайнерами для вставки. Философу цицерону, ведь именно из его трактата. Вставки на руку при оценке. Является знаменитый lorem вопросы, связанные. Демонстрационная, то и зла средневековый. Даже с языками, использующими латинский. Использованием lorem могут возникнуть небольшие проблемы: в длине. Xvi веке именно из его применили в длине.', '2017-03-02 18:08:27', 'lorem ', 'images/nhe73.jpg', 'kolian');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usertype` varchar(50) NOT NULL DEFAULT 'bloger'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `date`, `usertype`) VALUES
(6, 'admin', '$2y$10$5BKbfKeq0yuFNWRU5/h2AuP3WIhqwLRGT5eoylSIhkYptsRMfC/Yy', 'admin@admin.com', '2017-02-26 12:35:42', 'admin'),
(12, 'kolian', '$2y$10$ZKuHtr1f0Y8dhV.g5emdSOUyWn9dzLSCSxBwjOwnYZJeivrPMpq7q', 'kolian@gmail.com', '2017-02-26 13:00:21', 'bloger'),
(14, 'kolian123', '$2y$10$q.Jw/nmzs0NqVIBDFwNt3enzwCYYK68MR/DxLQs/HYSKfOGfquRqy', 'kolian123@gmail.com', '2017-03-03 16:50:15', 'bloger');

-- --------------------------------------------------------

--
-- Структура таблицы `user_post`
--

CREATE TABLE IF NOT EXISTS `user_post` (
  `postAuthor` varchar(40) NOT NULL,
  `postID` int(11) NOT NULL,
  `postLikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_post`
--

INSERT INTO `user_post` (`postAuthor`, `postID`, `postLikes`) VALUES
('qt', 1, 4),
('sai', 2, 0),
('expcode', 5, 0),
('qt', 6, 0),
('qt', 7, 0),
('qt', 16, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `commentID` (`commentID`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postTitle` (`postTitle`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postID` (`postID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
