-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 09 2022 г., 10:26
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cy48335_hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chambers`
--

CREATE TABLE IF NOT EXISTS `chambers` (
  `id_chambers` int(11) NOT NULL AUTO_INCREMENT,
  `departments_ref` int(11) NOT NULL,
  `number_chambers` int(11) NOT NULL,
  `chambers_department` varchar(50) GENERATED ALWAYS AS (concat(`departments_ref`,_utf8mb4'-',`number_chambers`)) VIRTUAL NOT NULL,
  PRIMARY KEY (`id_chambers`),
  UNIQUE KEY `chambers_department` (`chambers_department`),
  KEY `departments_ref` (`departments_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chambers`
--

INSERT INTO `chambers` (`id_chambers`, `departments_ref`, `number_chambers`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 2, 1),
(9, 1, 22221),
(10, 2, 23),
(13, 1, 999999999);

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id_departments` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_departments`),
  UNIQUE KEY `department_name` (`department_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id_departments`, `department_name`) VALUES
(1, 'Терапевтическое'),
(2, 'Хирургическое');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id_doctors` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_doctor` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `second_name_doctor` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `patronymic_name_doctor` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `proffesion_ref` int(11) NOT NULL,
  `chambers_ref` int(11) NOT NULL,
  PRIMARY KEY (`id_doctors`),
  UNIQUE KEY `id_chambers` (`chambers_ref`),
  KEY `id_proffesion` (`proffesion_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id_doctors`, `first_name_doctor`, `second_name_doctor`, `patronymic_name_doctor`, `proffesion_ref`, `chambers_ref`) VALUES
(1, 'Доктор', 'Докторов', 'Докторович', 1, 1),
(4, 'Майонез', 'Майонезов', 'Майонезович', 1, 2),
(6, ' Николай', 'Айболит', 'Иванович', 17, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `log_incoming`
--

CREATE TABLE IF NOT EXISTS `log_incoming` (
  `id_log_incoming` int(11) NOT NULL AUTO_INCREMENT,
  `patient_ref` int(11) NOT NULL,
  `doctors_ref` int(11) NOT NULL,
  `date_income` date NOT NULL,
  `date_outcome` date DEFAULT NULL,
  `symptoms` varchar(255) NOT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `drugs` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_log_incoming`),
  KEY `id_patient` (`patient_ref`),
  KEY `id_doctors` (`doctors_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `log_incoming`
--

INSERT INTO `log_incoming` (`id_log_incoming`, `patient_ref`, `doctors_ref`, `date_income`, `date_outcome`, `symptoms`, `diagnosis`, `drugs`) VALUES
(44, 8, 6, '2022-10-01', '2022-10-20', 'покраснения', 'Диатез', 'ибупрофен'),
(45, 1, 6, '2022-09-01', '2022-10-05', 'ожоги', '', ''),
(46, 1, 1, '2022-08-05', '2022-08-31', 'Опьянение', 'Алкоголизм', 'капельницы');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id_patients` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_patient` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `second_name_patient` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `patronymic_name_patient` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `insurance_policy` varchar(7) DEFAULT NULL,
  `passport` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `allergy` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id_patients`),
  UNIQUE KEY `insurance` (`insurance_policy`),
  UNIQUE KEY `pasport` (`passport`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id_patients`, `first_name_patient`, `second_name_patient`, `patronymic_name_patient`, `insurance_policy`, `passport`, `allergy`) VALUES
(1, 'Больно', 'Больной', 'Больнович', 'АГ1234В', '1111111111', ''),
(4, 'Петр', 'Петров', 'Петрович', 'АГ1235В', '2222222222', '1111111112'),
(6, 'Николаевна', 'Жданова', 'Анна', 'ББ5555И', '2222222223', 'Антибиотики'),
(7, 'Николай', 'Николаев', 'Николаевич', 'АГ4564В', '1111111112', '1111'),
(8, 'Александр', 'Александров', 'Александрович', 'АА9998А', '1234567890', 'на красное');

-- --------------------------------------------------------

--
-- Структура таблицы `professions`
--

CREATE TABLE IF NOT EXISTS `professions` (
  `id_professions` int(11) NOT NULL AUTO_INCREMENT,
  `profession` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_professions`),
  UNIQUE KEY `proffesion` (`profession`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `professions`
--

INSERT INTO `professions` (`id_professions`, `profession`) VALUES
(4, 'Акушер'),
(5, 'Аллерголог'),
(6, 'Ангиохирург'),
(7, 'Андролог'),
(8, 'Анестезиолог'),
(9, 'Аудиолог'),
(10, 'Бактериолог'),
(11, 'Венеролог'),
(12, 'Вертебролог'),
(13, 'Врач лабораторной диагностики'),
(14, 'Врач лечебной физкультуры'),
(15, 'Врач магнитно-резонансной томографии'),
(16, 'Врач общей практики'),
(17, 'Врач спортивной медицины'),
(18, 'Врач ультразвуковой диагностики'),
(19, 'Врач функциональной диагностики'),
(20, 'Гастроэнтеролог'),
(21, 'Гематолог'),
(22, 'Генетик'),
(23, 'Гепатолог'),
(24, 'Гериатр vvvv'),
(25, 'Гигиенист new vfff'),
(26, 'Гинеколог'),
(27, 'Гирудотерапевт'),
(28, 'Гомеопат'),
(29, 'Дерматовенеролог'),
(30, 'Дерматолог'),
(31, 'Детский хирург'),
(32, 'Диетолог'),
(33, 'Другая специальность'),
(34, 'Иммунолог'),
(35, 'Инфекционист'),
(36, 'Кардиолог'),
(37, 'Кинезитерапевт'),
(38, 'Клинический фармаколог'),
(39, 'Колопроктолог'),
(1, 'Терапевт'),
(2, 'Хирург');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chambers`
--
ALTER TABLE `chambers`
  ADD CONSTRAINT `chambers_ibfk_1` FOREIGN KEY (`departments_ref`) REFERENCES `departments` (`id_departments`);

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`proffesion_ref`) REFERENCES `professions` (`id_professions`),
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`chambers_ref`) REFERENCES `chambers` (`id_chambers`);

--
-- Ограничения внешнего ключа таблицы `log_incoming`
--
ALTER TABLE `log_incoming`
  ADD CONSTRAINT `log_incoming_ibfk_1` FOREIGN KEY (`patient_ref`) REFERENCES `patients` (`id_patients`),
  ADD CONSTRAINT `log_incoming_ibfk_2` FOREIGN KEY (`doctors_ref`) REFERENCES `doctors` (`id_doctors`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
