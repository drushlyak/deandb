-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 16 2018 г., 19:51
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deandb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `debt`
--

CREATE TABLE `debt` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `debt`
--

INSERT INTO `debt` (`id`, `student_id`, `discipline_id`) VALUES
(1, 3, 8),
(3, 17, 7),
(5, 18, 4),
(6, 20, 1),
(7, 21, 2),
(9, 4, 1),
(26, 18, 7),
(32, 29, 5),
(34, 18, 5),
(36, 1, 1),
(37, 1, 6),
(38, 1, 3),
(39, 16, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `name_of_discipline` varchar(255) NOT NULL,
  `number_of_academic_hours` int(11) NOT NULL,
  `type_of_examination` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `name_of_discipline`, `number_of_academic_hours`, `type_of_examination`, `lecturer_id`) VALUES
(1, 'Экономика предприятия', 225, 2, 2),
(2, 'Базы данных', 210, 1, 3),
(3, 'История России', 233, 1, 2),
(4, 'Физика', 180, 3, 1),
(5, 'Химия', 199, 1, 1),
(6, 'ООП', 150, 1, 3),
(7, 'Геополитика', 120, 1, 4),
(8, 'Математический анализ', 190, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_code` varchar(255) NOT NULL,
  `quantity_of_students` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group_code`, `quantity_of_students`) VALUES
(1, 'ЭП-12', 25),
(2, 'М-2', 14),
(3, 'ПИ-7', 23),
(4, 'АВТ-1', 19),
(5, 'ФК-12', 22);

-- --------------------------------------------------------

--
-- Структура таблицы `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `lecturer` varchar(255) NOT NULL,
  `full_time_job` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lecturers`
--

INSERT INTO `lecturers` (`id`, `lecturer`, `full_time_job`) VALUES
(1, 'Петров Иван Соломонович', 0),
(2, 'Маюк Тамара Петровна', 0),
(3, 'Крамер Габриэль', 0),
(4, 'Ножкин Александр Викторович', 1),
(5, 'Бородин Петр Борисович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `evaluation` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `student_id`, `discipline_id`, `semester_id`, `evaluation`) VALUES
(1, 1, 1, 1, 4),
(2, 2, 1, 1, 5),
(4, 4, 1, 2, 4),
(5, 4, 2, 2, 4),
(6, 6, 5, 12, 1),
(7, 6, 5, 6, 5),
(8, 7, 3, 1, 4),
(9, 7, 4, 1, 5),
(10, 7, 2, 2, 3),
(11, 7, 1, 1, 5),
(12, 11, 1, 1, 3),
(14, 11, 4, 2, 5),
(15, 11, 3, 3, 3),
(16, 12, 2, 2, 2),
(17, 12, 3, 3, 3),
(18, 12, 1, 3, 5),
(19, 18, 1, 2, 3),
(20, 18, 2, 5, 5),
(21, 18, 3, 3, 3),
(23, 19, 1, 1, 5),
(24, 19, 2, 2, 2),
(25, 19, 3, 3, 3),
(28, 20, 2, 2, 4),
(30, 12, 4, 4, 3),
(31, 13, 2, 2, 3),
(32, 13, 1, 3, 4),
(33, 13, 4, 4, 5),
(35, 32, 1, 1, 3),
(37, 11, 2, 2, 5),
(39, 20, 1, 1, 5),
(40, 1, 1, 2, 2),
(41, 6, 1, 3, 3),
(42, 1, 1, 1, 2),
(44, 1, 1, 1, 5),
(45, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `information` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `information`) VALUES
(1, 6, 'Изучение специальных дисциплин, сдача экзаменов, зачетов. Написание курсовой работы.'),
(2, 2, 'Изучение общих дисциплин, сдача экзаменов, зачетов. Написание курсовой работы.'),
(3, 3, 'Изучение общих и специальных дисциплин, сдача экзаменов, зачетов.'),
(4, 8, 'Преддипломная практика. Защита выпускной работы бакалавра. Сдача госэкзамена.'),
(5, 5, 'Изучение специальных дисциплин, сдача экзаменов, зачетов.'),
(6, 7, 'Изучение специальных дисциплин, сдача экзаменов, зачетов. Подготовка к гсэкзамену.'),
(9, 9, 'Изучение специальных дисциплин, сдача экзаменов, зачетов.'),
(10, 10, 'Изучение специальных дисциплин, сдача экзаменов, зачетов, преподавание.'),
(11, 11, 'Изучение специальных дисциплин, сдача экзаменов, зачетов, подготовка к госэкзамену.'),
(12, 12, 'Преддипломная практика. Защита выпускной работы магистра. Сдача госэкзамена.'),
(13, 1, 'Изучение общих дисциплин, сдача экзаменов, зачетов.'),
(15, 4, '	Изучение общих и специальных дисциплин, сдача экзаменов, зачетов. Написание курсовой работы.');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_of_student` int(11) NOT NULL,
  `surname_of_student` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_second_name` varchar(255) NOT NULL,
  `group_number` int(11) NOT NULL,
  `accepted` varchar(255) NOT NULL,
  `expelled` varchar(255) DEFAULT NULL,
  `study_fee` int(11) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `type_of_study` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_of_student`, `surname_of_student`, `student_name`, `student_second_name`, `group_number`, `accepted`, `expelled`, `study_fee`, `residence`, `phone_number`, `type_of_study`) VALUES
(1, 'Иванов', 'Сергей', 'Викторович', 1, '2016-11-01', '', 1, 'г. Томск, ул. Красноясная, д. 55', '+78764567668', 1),
(2, 'Петров', 'Сергей', 'Юрьевич', 1, '2016-09-11', '', 2, 'г. Томск, ул. Ленина, д. 55', '+78764568888', 1),
(3, 'Иванов', 'Сергей', 'Семенович', 1, '2015-08-01', '', 4, 'г. Томск, ул. Красивая, д. 5', '+78764567887', 1),
(4, 'Семенов', 'Артур', 'Борисович', 1, '2015-08-01', '', 3, 'г. Томск, ул. Ленина, 33/1', '+79873456776', 1),
(5, 'Борисов', 'Александр', 'Александрович', 1, '2015-08-01', '', 1, 'г. Томск, ул. Южная, 345/1', '+79872342121', 1),
(6, 'Арутюнян', 'Вагик', 'Левонович', 1, '2015-08-10', '', 1, 'г. Томск, ул. Революции, 44/4', '+78762345454', 1),
(7, 'Тиль', 'Артур', 'Михайлович', 1, '2015-09-01', '', 2, 'г. Воронеж, ул. Лесная, 22', '+4567653434', 1),
(8, 'Иванова', 'Наталия', 'Сергеевна', 2, '2016-09-03', '', 3, 'г. Томск, ул. Вишневая, 22/1', '+4561234334', 1),
(9, 'Тарамир', 'Марат', 'Изекович', 2, '2016-09-03', '2017-04-30', 2, 'г. Томск, ул. Степная, 33', '+71234566544', 1),
(10, 'Лампова', 'Юлия', 'Борисовна', 2, '2016-09-01', '', 4, 'г. Томск, ул. Дзержинского, 12/1', '+76541231211', 1),
(11, 'Евсеев', 'Даниил', 'Олегович', 2, '2016-09-03', '', 4, 'г. Томск, ул. Ванеева, 45/5', '+79876565445', 1),
(12, 'Кирпичев', 'Вадим', 'Вадимович', 2, '2016-09-01', '', 2, 'г. Томск, ул. Болотная, 23', '+71230909887', 1),
(13, 'Овсянкин', 'Дмитрий', 'Владимирович', 3, '2016-10-03', NULL, 3, 'г. Ейск, ул. Казачья, 98', '+8763454332', 3),
(14, 'Мамлейчук', 'Роман', 'Сергеевич', 3, '2016-09-24', '', 3, 'г. Ялта, ул. Московская, 6', '+79874545443', 1),
(15, 'Борисенко', 'Борис', 'Владимирович', 3, '2016-09-11', '2017-10-10', 1, 'г. Симферополь, ул. Водицкого,7', '+79783457878', 1),
(16, 'Чалов', 'Алексей', 'Алексеевич', 3, '2016-09-30', '', 3, 'г. Севастополь, ул. Песочная, 9', '+79783456767', 1),
(17, 'Петрошенковский', 'Игорь', 'Игоревич', 3, '2016-10-10', '', 3, 'г. Самара, ул. Ленина, 22/1', '+765234565', 1),
(18, 'Галашкевич', 'Владимир', 'Владимирович', 4, '2016-09-01', NULL, 2, 'г. Омск, ул. Степная, 22/89', '+7432232322', 1),
(19, 'Ромашкевич', 'София', 'Соломоновна', 4, '2016-09-01', NULL, 2, 'г. Омск, ул. Степаняна, 22', '+7651234343', 1),
(20, 'Туманова', 'Надежда', 'Сергеевна', 4, '2016-09-02', NULL, 3, 'г. Омск, ул. Заречная, 87/1', '+98763453554', 1),
(21, 'Максимов', 'Евгений', 'Борисович', 4, '2016-09-02', NULL, 4, 'г. Омск, ул. Сибирская, 33', '+73452345411', 1),
(22, 'Жуков', 'Михаил', 'Миронович', 4, '2016-09-01', NULL, 1, 'г. Омск, ул. Парадная, 76', '+76542345588', 4),
(23, 'Петрощук', 'Сергей', 'Павлович', 2, '2016-08-02', '', 3, 'г.Омск, ул. Морская, 55/12', '+73451234321', 1),
(27, 'Соколова', 'Ирина', 'Михайловна', 5, '2016-12-12', '', 1, 'г. Воркута, ул. Угольная, 12', '+787623454544', 1),
(28, 'Миронова', 'Лилия', 'Сергеевна', 2, '2015-11-11', '', 1, 'г. Москва, ул. Ленина, 21/111', '+74550987676', 1),
(29, 'Ромашевская', 'Лидия', 'Маммедовна', 5, '1995-09-22', '', 3, 'Швеция, г. Стокгольм, Тафештрассе, 12б/11', '45643333455', 1),
(30, 'Орлова', 'Сирафима', 'Ивановна', 5, '2016-09-01', '', 2, 'г. Шахтинск, ул. Веселая, 12', '+79773334432', 1),
(31, 'Яценко', 'Натали', 'Семеновна', 5, '2016-09-12', '', 4, 'г. Новосибирск, ул. Счастливая, 12/22', '+4531231231', 1),
(32, 'мимипвап', 'вапвапа', 'вапавп', 4, '', '', 1, 'впвапва', '55555555555', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `study_fees`
--

CREATE TABLE `study_fees` (
  `id` int(11) NOT NULL,
  `kind_of_study_fees` varchar(255) NOT NULL,
  `arrears` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_fees`
--

INSERT INTO `study_fees` (`id`, `kind_of_study_fees`, `arrears`) VALUES
(1, 'За счет федерального бюджета', 110025),
(2, 'За счет местного бюджета', 0),
(3, 'За собственный счет', 223111),
(4, 'За счет ОАО Газпром', 12112);

-- --------------------------------------------------------

--
-- Структура таблицы `types_of_examination`
--

CREATE TABLE `types_of_examination` (
  `id` int(11) NOT NULL,
  `type_of_examination` varchar(255) NOT NULL,
  `id_examiner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types_of_examination`
--

INSERT INTO `types_of_examination` (`id`, `type_of_examination`, `id_examiner`) VALUES
(1, 'Экзамен', 1),
(2, 'Зачет', 2),
(3, 'Дифференцированный зачет', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `types_of_study`
--

CREATE TABLE `types_of_study` (
  `id` int(11) NOT NULL,
  `type_of_study` varchar(255) NOT NULL,
  `accepted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types_of_study`
--

INSERT INTO `types_of_study` (`id`, `type_of_study`, `accepted`) VALUES
(1, 'Очное обучение', '2019-05-31'),
(2, 'Заочное обучение', '2017-12-04'),
(3, 'Дистанционное обучение', '2017-12-04'),
(4, 'Экстернат', '2017-12-04');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@mail.ru', 'a12345678', 'administrator'),
(3, 'sadmin', 'sadmin@mail.ru', 'a12345678', 'superadmin'),
(6, '3333', '33333333@ddd.ru', '3333333333', '3333333333333');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `type_of_examination` (`type_of_examination`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_of_student`),
  ADD KEY `id_of_student` (`id_of_student`),
  ADD KEY `group_number` (`group_number`),
  ADD KEY `study_fee` (`study_fee`),
  ADD KEY `type_of_study` (`type_of_study`);

--
-- Индексы таблицы `study_fees`
--
ALTER TABLE `study_fees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_4` (`id`);

--
-- Индексы таблицы `types_of_examination`
--
ALTER TABLE `types_of_examination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `types_of_study`
--
ALTER TABLE `types_of_study`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `debt`
--
ALTER TABLE `debt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_of_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `study_fees`
--
ALTER TABLE `study_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `types_of_examination`
--
ALTER TABLE `types_of_examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `types_of_study`
--
ALTER TABLE `types_of_study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `debt_ibfk_1` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`),
  ADD CONSTRAINT `debt_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id_of_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplines_ibfk_2` FOREIGN KEY (`type_of_examination`) REFERENCES `types_of_examination` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id_of_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`study_fee`) REFERENCES `study_fees` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`group_number`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`type_of_study`) REFERENCES `types_of_study` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
