-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2020, 23:28
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

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
(2, 2, 2, 'How do you choose to style a h1 element with class \'light\'?', 'h1.light');

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
(2, 'test2', 'test2@test.pl', 'user', '$2y$10$joaO54wF9.3AO64oBWJ8TerQXUy3Ap3FgYpAMew1Ld9XCBpS4tgSu'),
(3, 'user3', 'user3@email.com', 'user', '$2y$10$JY37mbpF.zWsC6KMUK8WMumBZYR/i2q3kDBL5KY8438x13aRgXFr6'),
(4, 'admin', 'admin@example.com', 'admin', '$2y$10$i3E76coMZfiNgxiLyOMOguEunT7g0tj4eJjWrpk51RWuO/M4/niji'),
(6, 'aaa', 'aaa@aaaaaaaaaaaa.pl', 'user', '$2y$10$vfEGmlTOCOooVm9dblgZRuxKdhmV2egAQEZ.pb4STMwkRJ2XJTWxa'),
(8, 'test5', 'test5@a.pl', 'user', '$2y$10$pSmKQHNa5dogMTAmhSTGOukBnbjIfamsoLvOZwVQ4kBO9Ms5ixFwS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_courses`
--

CREATE TABLE `users_courses` (
  `id_user` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tests`
--
ALTER TABLE `tests`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
