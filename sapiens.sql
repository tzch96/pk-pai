-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Sty 2020, 21:53
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sapiens`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'Web Development'),
(2, 'Object-Oriented Programming');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `course_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `courses`
--

INSERT INTO `courses` (`id_course`, `id_category`, `course_name`, `description`, `photo`) VALUES
(1, 1, 'CSS for Beginners', 'CSS is a language that describes how HTML elements will be displayed. This is a course covering the basics of CSS.', NULL),
(2, 1, 'HTML for Beginners', 'HTML is the standard markup language for describing the structure of documents intended to be accessed by a web browser. This is a course covering the basics of HTML.', NULL),
(3, 2, 'Object-Oriented Programming Concepts', 'OOP is a programming paradigm based on the concept of objects, which contain both data (fields - attributes or properties) and code (methods). This course covers the most important concepts associated with Object-Oriented Programming.', NULL);

--
-- Wyzwalacze `courses`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_course` AFTER DELETE ON `courses` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("courses", "deleted", old.id_course, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_course` AFTER INSERT ON `courses` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("courses", "inserted", new.id_course, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_course` AFTER UPDATE ON `courses` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("courses", "updated", new.id_course, now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `courses_with_categories`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `courses_with_categories` (
`id_course` int(11)
,`category_name` tinytext
,`course_name` tinytext
,`description` text
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `course_lessons`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `course_lessons` (
`id_course` int(11)
,`id_lesson` int(11)
,`lesson_name` tinytext
,`theory` longtext
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `db_events`
--

CREATE TABLE `db_events` (
  `id_event` int(11) NOT NULL,
  `affected_table` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_affected_row` int(11) NOT NULL,
  `action` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `db_events`
--

INSERT INTO `db_events` (`id_event`, `affected_table`, `id_affected_row`, `action`, `event_date`) VALUES
(1, 'users', 103, 'inserted', '2020-01-24 21:37:01'),
(2, 'users', 103, 'deleted', '2020-01-24 21:40:10'),
(3, 'users', 104, 'inserted', '2020-01-24 21:46:50'),
(4, 'users', 105, 'inserted', '2020-01-24 21:46:56'),
(5, 'users', 105, 'deleted', '2020-01-24 21:46:59'),
(6, 'users', 106, 'inserted', '2020-01-24 21:48:22'),
(7, 'users', 106, 'deleted', '2020-01-24 21:48:25'),
(8, 'users', 107, 'inserted', '2020-01-24 21:48:52'),
(9, 'users', 107, 'deleted', '2020-01-24 21:48:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `flashcards`
--

CREATE TABLE `flashcards` (
  `id_flashcard` int(11) NOT NULL,
  `id_lesson` int(11) DEFAULT NULL,
  `front` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lessons`
--

CREATE TABLE `lessons` (
  `id_lesson` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `lesson_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `lessons`
--

INSERT INTO `lessons` (`id_lesson`, `id_course`, `lesson_name`, `theory`) VALUES
(1, 1, 'CSS Introduction', '<h2>What is CSS?</h2>\r\n<p><strong>CSS</strong> stands for <strong>C</strong>ascading <strong>S</strong>tyle <strong>S</strong>heets.</p>\r\n<p>It is used to describe how HTML elements will be displayed on screen.</p>\r\n<p>CSS rules can be defined either inside a HTML element tag (inline styles) or in an external stylesheet (usually linked in the head element).</p>\r\n\r\n<h2>CSS syntax</h2>\r\n<p>A CSS rule consists of a selector and a declaration block. The declaration block lists properties and their values.</p>\r\n<p>Example:<br />\r\n<code>\r\nh1 {\r\n    color: blue;\r\n    font-size: 48px;\r\n}\r\n</code><br />\r\nThis portion of CSS code will cause all level 1 headings (h1) to be of color blue and their text to be of 48 pixels in height.</p>\r\n\r\n<h2>CSS comments</h2>\r\n<p>As most languages do, CSS has support for comments. Commented lines are ignored by the browser.</p>\r\n<p>Commenting CSS code is done like this: <br />\r\n<code>\r\n/* single-line comment */\r\n/* multi-line\r\ncomment */\r\n</code><br />\r\n</p>'),
(2, 1, 'CSS Selectors', '<h2>CSS Selectors</h2>\r\n<p>CSS selectors are used to specify the HTML element to style.</p>\r\n\r\n<h2>Types of selectors</h2>\r\n<h4>All elements on page</h4>\r\n<code>\r\n* {\r\n    /* ... */\r\n)\r\n</code>\r\n<h4>Based on element name</h4>\r\n<code>\r\np {\r\n    /* ... */\r\n}\r\n</code>\r\n<h4>Based on element id</h4>\r\n<code>\r\n#id {\r\n    /* ... */\r\n}\r\n</code>\r\n<h4>Based on class name</h4>\r\n<code>\r\n.class {\r\n    /* ... */\r\n}\r\n</code>\r\n<h4>Combining element name and class name selectors</h4>\r\n<code>\r\np.class {\r\n    /* ... */\r\n}\r\n</code>\r\n<h4>Grouping multiple selectors</h4>\r\n<code>\r\np, h1 {\r\n    /* ... */\r\n}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `id_lesson` int(11) DEFAULT NULL,
  `id_test` int(11) DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id_task`, `id_lesson`, `id_test`, `question`, `answer`) VALUES
(1, 1, NULL, 'What does CSS stand for?', 'Cascading Style Sheets'),
(2, 2, 2, 'How do you choose to style a h1 element with class \'light\'?', 'h1.light'),
(3, 1, NULL, 'How do you call the pattern used to choose which elements you want to style?', 'selector');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests`
--

CREATE TABLE `tests` (
  `id_test` int(11) NOT NULL,
  `id_lesson` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `tests`
--

INSERT INTO `tests` (`id_test`, `id_lesson`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinytext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `userpassword` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `role`, `userpassword`) VALUES
(4, 'admin', 'admin@example.com', 'admin', '$2y$10$i3E76coMZfiNgxiLyOMOguEunT7g0tj4eJjWrpk51RWuO/M4/niji'),
(9, 'test', 'example@example.com', 'user', '$2y$10$h/dYp55faMZIQUU0fLDSpO6p5G9FO9NdeNf5JEa83R2mem..pKwzy'),
(11, 'demo', 'demo@example.com', 'user', '$2y$10$YYBTBC84LZy9psxyPjIHC.EWus7BB69SwlMb8oVolywfXukJNwHK6'),
(12, 'test2', 'test2@example.com', 'user', '$2y$10$OwT/NN19WC3lXpll4hnOJ.UZdss/Pwamue..0UBQK2MwLsLZrVI.y'),
(13, 'example', 'example@example.com', 'user', '$2y$10$7xCFl3RgoB04P2ZC.5zN/OV.FxwoNla47/Zlc1Ko2DTlWRJWg74Y2'),
(14, 'new', 'new@new.pl', 'user', '$2y$10$.Y.Ivy74Wmcy5jSODtedBeLGRtda1cIqEKFg6bHDOeDmVyqTQwLjq'),
(104, 'user', 'user@user.pl', 'user', '$2y$10$fqtctPPReQRF1zhgaFhh/OWkw9czcmog6Sq9tElj7ONhKP7dhhZ6C');

--
-- Wyzwalacze `users`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_user` AFTER DELETE ON `users` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("users", "deleted", old.id_user, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_delete_user_backup` AFTER DELETE ON `users` FOR EACH ROW insert into users_backup(id_user, username, email, userpassword, role, backup_date) values (old.id_user, old.username, old.email, old.userpassword, old.role, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_user` AFTER INSERT ON `users` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("users", "inserted", new.id_user, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_user` AFTER UPDATE ON `users` FOR EACH ROW insert into db_events(affected_table, action, id_affected_row, event_date) values ("users", "updated", new.id_user, now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_user_backup` AFTER UPDATE ON `users` FOR EACH ROW insert into users_backup(id_user, username, email, userpassword, role, backup_date) values (old.id_user, old.username, old.email, old.userpassword, old.role, now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_backup`
--

CREATE TABLE `users_backup` (
  `id_backup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpassword` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `backup_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users_backup`
--

INSERT INTO `users_backup` (`id_backup`, `id_user`, `username`, `email`, `role`, `userpassword`, `backup_date`) VALUES
(1, 15, 'test50', 'test@test.pl', 'user', '$2y$10$qtz4OFY/oYQqJ2XFwdmcO.Kl893IlqWkoTrd9SyFfpt1/S6J4u7ZK', '2020-01-24 21:27:50'),
(2, 103, 'testtrig', 'testtrig@test.pl', 'user', '$2y$10$vpy0NEr3/yDegWd1UsQsJOKZ0Ny0Wcq9GwpjpcrgHWsFbkNMv.0ui', '2020-01-24 21:40:10'),
(3, 105, '', '', '', '$2y$10$HfSHmBZwIM7SuiVzrZbre.ugvDpOLojS6jIGdaRfz13cjXrSuNEBq', '2020-01-24 21:46:59'),
(4, 106, 'asd', '', '', '$2y$10$vzf99y27252hE7Ff7PmIs.yF0NAABhs7Eyyo3xnvZZGYYqIH2T6rW', '2020-01-24 21:48:25'),
(5, 107, 'NULL', '', '', '$2y$10$lYfxVxjn8ZjVzJCqD4JH/.MjiAjFDgckCBw.QBT3VRDhWqUXz5ZqG', '2020-01-24 21:48:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_courses`
--

CREATE TABLE `users_courses` (
  `id_user` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users_courses`
--

INSERT INTO `users_courses` (`id_user`, `id_course`) VALUES
(9, 1),
(9, 2),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `user_courses`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `user_courses` (
`id_user` int(11)
,`id_course` int(11)
,`course_name` tinytext
);

-- --------------------------------------------------------

--
-- Struktura widoku `courses_with_categories`
--
DROP TABLE IF EXISTS `courses_with_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER VIEW `courses_with_categories`  AS  select `courses`.`id_course` AS `id_course`,`categories`.`category_name` AS `category_name`,`courses`.`course_name` AS `course_name`,`courses`.`description` AS `description` from (`courses` join `categories` on(`categories`.`id_category` = `courses`.`id_category`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `course_lessons`
--
DROP TABLE IF EXISTS `course_lessons`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER VIEW `course_lessons`  AS  select `courses`.`id_course` AS `id_course`,`lessons`.`id_lesson` AS `id_lesson`,`lessons`.`lesson_name` AS `lesson_name`,`lessons`.`theory` AS `theory` from (`lessons` join `courses` on(`lessons`.`id_course` = `courses`.`id_course`)) ;

-- --------------------------------------------------------

--
-- Struktura widoku `user_courses`
--
DROP TABLE IF EXISTS `user_courses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`127.0.0.1` SQL SECURITY DEFINER VIEW `user_courses`  AS  select `users`.`id_user` AS `id_user`,`courses`.`id_course` AS `id_course`,`courses`.`course_name` AS `course_name` from ((`courses` left join `users_courses` on(`users_courses`.`id_course` = `courses`.`id_course`)) left join `users` on(`users_courses`.`id_user` = `users`.`id_user`)) ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeksy dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `fk_course_category` (`id_category`);

--
-- Indeksy dla tabeli `db_events`
--
ALTER TABLE `db_events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeksy dla tabeli `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id_flashcard`),
  ADD KEY `fk_flashcard_lesson` (`id_lesson`);

--
-- Indeksy dla tabeli `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id_lesson`),
  ADD KEY `fk_lesson_course` (`id_course`);

--
-- Indeksy dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `fk_task_lesson` (`id_lesson`),
  ADD KEY `fk_task_test` (`id_test`);

--
-- Indeksy dla tabeli `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id_test`),
  ADD UNIQUE KEY `id_lesson` (`id_lesson`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeksy dla tabeli `users_backup`
--
ALTER TABLE `users_backup`
  ADD PRIMARY KEY (`id_backup`);

--
-- Indeksy dla tabeli `users_courses`
--
ALTER TABLE `users_courses`
  ADD KEY `fk_user_course` (`id_course`),
  ADD KEY `fk_course_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `db_events`
--
ALTER TABLE `db_events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id_flashcard` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `tests`
--
ALTER TABLE `tests`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT dla tabeli `users_backup`
--
ALTER TABLE `users_backup`
  MODIFY `id_backup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_course_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Ograniczenia dla tabeli `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `fk_flashcard_lesson` FOREIGN KEY (`id_lesson`) REFERENCES `lessons` (`id_lesson`);

--
-- Ograniczenia dla tabeli `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lesson_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);

--
-- Ograniczenia dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_task_lesson` FOREIGN KEY (`id_lesson`) REFERENCES `lessons` (`id_lesson`),
  ADD CONSTRAINT `fk_task_test` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id_test`);

--
-- Ograniczenia dla tabeli `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `fk_test_lesson` FOREIGN KEY (`id_lesson`) REFERENCES `lessons` (`id_lesson`);

--
-- Ograniczenia dla tabeli `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `fk_course_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_user_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
