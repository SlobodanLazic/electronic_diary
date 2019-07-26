-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2019 at 06:59 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_diary`
--
CREATE DATABASE IF NOT EXISTS `e_diary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e_diary`;

-- --------------------------------------------------------

--
-- Table structure for table `class_masters`
--

DROP TABLE IF EXISTS `class_masters`;
CREATE TABLE IF NOT EXISTS `class_masters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_masters`
--

INSERT INTO `class_masters` (`id`, `id_professor`, `id_class`) VALUES
(3, 73, 3),
(5, 75, 10),
(6, 76, 17),
(7, 77, 11);

-- --------------------------------------------------------

--
-- Table structure for table `grade_for`
--

DROP TABLE IF EXISTS `grade_for`;
CREATE TABLE IF NOT EXISTS `grade_for` (
  `id_grade_for` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start_from` date DEFAULT NULL,
  `end_to` date DEFAULT NULL,
  PRIMARY KEY (`id_grade_for`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_for`
--

INSERT INTO `grade_for` (`id_grade_for`, `name`, `start_from`, `end_to`) VALUES
(1, 'Trimester1', '2019-07-02', NULL),
(2, 'Trimester2', '2019-07-03', NULL),
(3, 'Trimester3', '2019-07-04', NULL),
(4, 'Trimester4', '2019-07-05', NULL),
(5, 'Semester', NULL, NULL),
(6, 'Final', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE IF NOT EXISTS `meetings` (
  `id_meetings` int(11) NOT NULL AUTO_INCREMENT,
  `meetings` datetime NOT NULL,
  `meetings_status` tinyint(1) DEFAULT '0',
  `meeting_view` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_meetings`),
  KEY `fk_meeting_shedules_users1_idx` (`teacher`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id_meetings`, `meetings`, `meetings_status`, `meeting_view`, `teacher`, `parent`) VALUES
(1, '2019-07-19 19:10:00', 1, 0, 15, 8),
(2, '2019-07-24 19:02:00', 1, 0, 15, 8),
(3, '2019-07-26 21:05:00', 0, 0, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int(11) NOT NULL AUTO_INCREMENT,
  `message_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_content` text,
  `message_status` tinyint(1) DEFAULT NULL,
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `fk_messages_users1_idx` (`from_id_user`),
  KEY `fk_messages_users2_idx` (`to_id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_messages`, `message_time`, `message_content`, `message_status`, `from_id_user`, `to_id_user`) VALUES
(1, '2019-07-18 16:15:42', 'fdgdfgfg', 0, 15, 8),
(2, '2019-07-18 16:15:59', 'fdgfg', 0, 15, 8),
(3, '2019-07-18 16:16:16', 'hgjghjhj', 0, 15, 8),
(4, '2019-07-18 16:16:18', 'hgjhgjgh', 0, 15, 8),
(5, '2019-07-18 16:16:29', 'hgjhgjhgjhgj', 0, 15, 8),
(6, '2019-07-18 16:16:31', 'ghjhgjgh', 0, 15, 8),
(7, '2019-07-18 16:16:32', 'hgjghj', 0, 15, 8),
(8, '2019-07-18 19:42:50', 'csacasacds', 0, 8, 15),
(9, '2019-07-18 19:42:56', 'cascaa', 0, 8, 15),
(10, '2019-07-24 10:06:13', 'sasccacsac', 0, 8, 15),
(11, '2019-07-24 10:43:18', 'sdasdsadsadsa', 0, 8, 15),
(12, '2019-07-24 10:43:40', 'Cao , gospodine', 0, 8, 15),
(13, '2019-07-26 08:56:51', 'fdgfhgfh', 1, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `parent_notifications`
--

DROP TABLE IF EXISTS `parent_notifications`;
CREATE TABLE IF NOT EXISTS `parent_notifications` (
  `id_parent_notification` int(11) NOT NULL AUTO_INCREMENT,
  `notification_content` text,
  PRIMARY KEY (`id_parent_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_notifications`
--

INSERT INTO `parent_notifications` (`id_parent_notification`, `notification_content`) VALUES
(1, 'Test notification');

-- --------------------------------------------------------

--
-- Table structure for table `professor_info`
--

DROP TABLE IF EXISTS `professor_info`;
CREATE TABLE IF NOT EXISTS `professor_info` (
  `id_professor_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  PRIMARY KEY (`id_professor_info`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_info`
--

INSERT INTO `professor_info` (`id_professor_info`, `id_professor`, `id_class`, `id_subject`) VALUES
(95, 75, 15, 2),
(99, 75, 13, 2),
(98, 75, 13, 1),
(97, 75, 18, 3),
(96, 75, 18, 1),
(94, 75, 15, 1),
(93, 75, 15, 1),
(92, 75, 13, 6),
(91, 75, 13, 2),
(90, 73, 16, 1),
(100, 75, 13, 3),
(101, 73, 15, 2),
(102, 76, 15, 1),
(103, 76, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id_schedules` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id_schedules`)
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_schedules`, `subject_name`, `order_id`, `day_id`, `class_id`) VALUES
(1, 'Srpski jezik i knjizevnost', 1, 1, 1),
(2, 'Likovno', 2, 1, 1),
(3, 'Likovno', 3, 1, 1),
(4, 'Biologija', 4, 1, 1),
(5, '', 5, 1, 1),
(6, '', 6, 1, 1),
(7, '', 7, 1, 1),
(8, 'Istorija', 1, 2, 1),
(9, 'Matematika', 2, 2, 1),
(10, 'Srpski jezik i knjizevnost', 3, 2, 1),
(11, 'Fizicko vaspitanje', 4, 2, 1),
(12, 'Engleski jezik', 5, 2, 1),
(13, '', 6, 2, 1),
(14, '', 7, 2, 1),
(15, 'Srpski jezik i knjizevnost', 1, 3, 1),
(16, 'Informatika', 2, 3, 1),
(17, 'Hemija', 3, 3, 1),
(18, 'Geografija', 4, 3, 1),
(19, 'Veronauka', 5, 3, 1),
(20, 'Likovno', 6, 3, 1),
(21, '', 7, 3, 1),
(22, 'Engleski jezik', 1, 4, 1),
(23, 'Srpski jezik i knjizevnost', 2, 4, 1),
(24, 'Fizicko vaspitanje', 3, 4, 1),
(25, 'Engleski jezik', 4, 4, 1),
(26, 'Informatika', 5, 4, 1),
(27, 'Matematika', 6, 4, 1),
(28, 'Srpski jezik i knjizevnost', 7, 4, 1),
(29, 'Likovno', 2, 5, 1),
(30, 'Veronauka', 1, 5, 1),
(31, 'Istorija', 3, 5, 1),
(32, 'Engleski jezik', 4, 5, 1),
(33, 'Hemija', 5, 5, 1),
(34, 'Istorija', 6, 5, 1),
(35, '', 7, 5, 1),
(456, 'Srpski jezik i knjizevnost', 1, 1, 2),
(457, 'Matematika', 2, 1, 2),
(458, 'Likovno', 3, 1, 2),
(459, 'Geografija', 4, 1, 2),
(460, 'Engleski jezik', 5, 1, 2),
(461, '', 6, 1, 2),
(462, '', 7, 1, 2),
(463, 'Srpski jezik i knjizevnost', 1, 2, 2),
(464, 'Istorija', 2, 2, 2),
(465, 'Hemija', 3, 2, 2),
(466, 'Srpski jezik i knjizevnost', 4, 2, 2),
(467, 'Hemija', 5, 2, 2),
(468, 'Veronauka', 6, 2, 2),
(469, '', 7, 2, 2),
(470, 'Likovno', 1, 3, 2),
(471, 'Fizicko vaspitanje', 2, 3, 2),
(472, 'Engleski jezik', 3, 3, 2),
(473, 'Hemija', 4, 3, 2),
(474, '', 5, 3, 2),
(475, '', 6, 3, 2),
(476, '', 7, 3, 2),
(477, 'Istorija', 1, 4, 2),
(478, 'Biologija', 2, 4, 2),
(479, 'Informatika', 3, 4, 2),
(480, 'Veronauka', 4, 4, 2),
(481, 'Geografija', 5, 4, 2),
(482, '', 6, 4, 2),
(483, '', 7, 4, 2),
(484, 'Srpski jezik i knjizevnost', 2, 5, 2),
(485, 'Fizicko vaspitanje', 1, 5, 2),
(486, 'Geografija', 3, 5, 2),
(487, 'Istorija', 4, 5, 2),
(488, 'Informatika', 5, 5, 2),
(489, 'Hemija', 6, 5, 2),
(490, 'Veronauka', 7, 5, 2),
(491, 'Matematika', 1, 1, 3),
(492, 'Biologija', 2, 1, 3),
(493, 'Engleski jezik', 3, 1, 3),
(494, 'Hemija', 4, 1, 3),
(495, 'Biologija', 5, 1, 3),
(496, 'Engleski jezik', 6, 1, 3),
(497, 'Veronauka', 7, 1, 3),
(498, 'Likovno', 1, 2, 3),
(499, 'Srpski jezik i knjizevnost', 2, 2, 3),
(500, 'Engleski jezik', 3, 2, 3),
(501, 'Likovno', 4, 2, 3),
(502, 'Hemija', 5, 2, 3),
(503, '', 6, 2, 3),
(504, '', 7, 2, 3),
(505, 'Srpski jezik i knjizevnost', 1, 3, 3),
(506, 'Engleski jezik', 2, 3, 3),
(507, 'Fizicko vaspitanje', 3, 3, 3),
(508, 'Hemija', 4, 3, 3),
(509, 'Engleski jezik', 5, 3, 3),
(510, '', 6, 3, 3),
(511, '', 7, 3, 3),
(512, 'Srpski jezik i knjizevnost', 1, 4, 3),
(513, 'Istorija', 2, 4, 3),
(514, 'Fizicko vaspitanje', 3, 4, 3),
(515, 'Fizicko vaspitanje', 4, 4, 3),
(516, '', 5, 4, 3),
(517, '', 6, 4, 3),
(518, '', 7, 4, 3),
(519, 'Istorija', 2, 5, 3),
(520, 'Srpski jezik i knjizevnost', 1, 5, 3),
(521, 'Engleski jezik', 3, 5, 3),
(522, 'Informatika', 4, 5, 3),
(523, 'Veronauka', 5, 5, 3),
(524, '', 6, 5, 3),
(525, '', 7, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedules_users`
--

DROP TABLE IF EXISTS `schedules_users`;
CREATE TABLE IF NOT EXISTS `schedules_users` (
  `id_user` int(11) NOT NULL,
  `id_schedules` int(11) NOT NULL,
  KEY `fk_schedules_has_users_users1_idx` (`id_user`),
  KEY `fk_schedules_has_users_schedules1_idx` (`id_schedules`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

DROP TABLE IF EXISTS `school_classes`;
CREATE TABLE IF NOT EXISTS `school_classes` (
  `id_school_class` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id_school_class`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id_school_class`, `name`) VALUES
(1, '1-1'),
(2, '1-2'),
(3, '1-3'),
(4, '1-4'),
(5, '1-5'),
(6, '1-6'),
(7, '2-1'),
(8, '2-2'),
(9, '2-3'),
(10, '2-4'),
(11, '2-5'),
(12, '2-6'),
(13, '3-1'),
(14, '3-2'),
(15, '3-3'),
(16, '3-4'),
(17, '3-5'),
(18, '3-6'),
(19, '4-1'),
(20, '4-2'),
(21, '4-3'),
(22, '4-4'),
(23, '4-5'),
(25, '4-6'),
(26, '4-7');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_school_class` int(11) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `fk_students_school_classes1_idx` (`id_school_class`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `first_name`, `last_name`, `id_school_class`) VALUES
(6, 'student2', 'student2', 2),
(26, 'student3', 'student3', 3),
(27, 'student1', 'student1', 1),
(28, 'student4', 'student4', 17),
(29, 'student2', 'student2', 2),
(30, 'student3', 'student3', 3),
(31, 'student4', 'student4@gmail.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

DROP TABLE IF EXISTS `students_subjects`;
CREATE TABLE IF NOT EXISTS `students_subjects` (
  `id_student_subject` int(11) NOT NULL AUTO_INCREMENT,
  `grades` int(11) NOT NULL,
  `grade_status` tinyint(1) NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `grade_for_id` int(11) NOT NULL,
  PRIMARY KEY (`id_student_subject`),
  KEY `fk_students_subjects_students1_idx` (`id_student`),
  KEY `fk_students_subjects_subjects1_idx` (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_subjects`
--

INSERT INTO `students_subjects` (`id_student_subject`, `grades`, `grade_status`, `school_class_id`, `id_student`, `id_subject`, `grade_for_id`) VALUES
(28, 1, 1, 1, 27, 1, 4),
(29, 1, 1, 1, 27, 1, 1),
(30, 1, 1, 1, 27, 1, 1),
(31, 1, 1, 1, 27, 1, 1),
(32, 1, 1, 1, 27, 1, 4),
(33, 1, 1, 1, 27, 1, 4),
(34, 1, 1, 1, 27, 1, 4),
(35, 1, 1, 1, 27, 1, 4),
(36, 1, 1, 1, 27, 1, 4),
(37, 1, 1, 1, 27, 1, 4),
(38, 1, 1, 1, 27, 1, 4),
(39, 1, 1, 1, 27, 1, 4),
(40, 1, 1, 1, 27, 1, 4),
(41, 1, 1, 1, 27, 1, 4),
(42, 1, 1, 1, 27, 1, 4),
(43, 1, 1, 1, 27, 1, 4),
(44, 1, 1, 1, 27, 1, 1),
(45, 1, 1, 1, 27, 1, 4),
(46, 1, 1, 1, 27, 1, 4),
(47, 1, 1, 1, 27, 1, 4),
(48, 1, 1, 1, 27, 1, 4),
(49, 1, 1, 1, 27, 1, 4),
(50, 1, 1, 1, 27, 1, 4),
(51, 1, 1, 1, 27, 1, 4),
(52, 1, 1, 1, 27, 1, 4),
(53, 1, 1, 1, 27, 1, 4),
(54, 1, 1, 1, 27, 1, 4),
(55, 1, 1, 1, 27, 1, 4),
(56, 1, 1, 1, 27, 1, 4),
(57, 1, 1, 1, 27, 1, 4),
(58, 1, 1, 1, 27, 1, 4),
(59, 1, 1, 1, 27, 1, 4),
(60, 1, 1, 1, 27, 1, 4),
(61, 1, 1, 1, 27, 1, 4),
(62, 1, 1, 1, 27, 1, 4),
(63, 1, 1, 1, 27, 1, 4),
(64, 1, 1, 1, 27, 1, 4),
(65, 1, 1, 1, 27, 1, 4),
(66, 1, 1, 1, 27, 1, 4),
(67, 1, 1, 1, 27, 1, 4),
(68, 1, 1, 1, 27, 1, 4),
(69, 1, 1, 1, 27, 1, 4),
(70, 1, 1, 1, 27, 1, 4),
(71, 1, 1, 1, 27, 1, 4),
(72, 1, 1, 1, 27, 1, 4),
(73, 1, 1, 1, 27, 1, 4),
(74, 1, 1, 1, 27, 1, 4),
(75, 1, 1, 1, 27, 1, 4),
(76, 1, 1, 1, 27, 1, 4),
(77, 1, 1, 1, 27, 1, 4),
(78, 1, 1, 1, 27, 1, 4),
(79, 1, 1, 1, 27, 1, 4),
(80, 1, 1, 1, 27, 1, 4),
(81, 1, 1, 1, 27, 1, 4),
(82, 1, 1, 1, 27, 1, 4),
(83, 1, 1, 1, 27, 1, 4),
(84, 1, 1, 1, 27, 1, 4),
(85, 1, 1, 1, 27, 1, 4),
(86, 1, 1, 1, 27, 1, 4),
(87, 1, 1, 1, 27, 1, 4),
(88, 1, 1, 1, 27, 1, 4),
(89, 1, 1, 1, 27, 1, 4),
(90, 1, 1, 1, 27, 1, 4),
(91, 1, 1, 1, 27, 1, 4),
(92, 1, 1, 1, 27, 1, 4),
(93, 1, 1, 1, 27, 1, 4),
(94, 1, 1, 1, 27, 1, 4),
(95, 1, 1, 1, 27, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name`) VALUES
(1, 'Srpski jezik i knjizevnost'),
(2, 'Matematika'),
(3, 'Likovno'),
(4, 'Biologija'),
(5, 'Fizicko vaspitanje'),
(6, 'Geografija'),
(7, 'Istorija'),
(8, 'Engleski jezik'),
(9, 'Informatika'),
(10, 'Hemija'),
(11, 'Veronauka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user_role` int(11) NOT NULL DEFAULT '4',
  `teacher_class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_user_roles_idx` (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `id_user_role`, `teacher_class_id`) VALUES
(2, 'administrator', '$2y$10$2hg/V3YhIgKl2XNe0fNij.0DrBdXzns5AaeWu.j6h5QnXLjZNvEsW', 'administrator@gmail.com', 1, 0),
(6, 'director', '$2y$10$YG.Ity62kSWi1j9xz0EdKeR96pITfKLX5Go7wocI/oCrg794HqZVm', 'director@gmail.com', 2, 0),
(8, 'teacher', '$2y$10$91fxW1z3ChSXmhFh2Qy2U.7/ipBBotLWeSS2fspc27I2CbPfjldha', 'teacher@gmail.com', 3, 1),
(15, 'parent', '$2y$10$3VngNhp8CWN2rL3nOXK6Au8jtqqTAGGg9g3/Nm7jXCpDr216.fCYe', 'parent@gmail.com', 4, 0),
(34, 'teacher1', '$2y$10$e4dRFqGtFyjXaRARefmHP.PujuGjm3o63pZmEp4b7uORKewBPuvda', 'teacher1@gmail.com', 3, 2),
(40, 'parent2', '$2y$10$HsATeFX5yQzoTr26sFP./OuT5S4jHowTbVithPPBLeKlV3/Z0dNrC', 'parent2@gmail.com', 4, 0),
(73, 'profesor', '$2y$10$TrI2szvZ9KaefD2uSo9MHOvl5mUYNMujrfV6jD48S9r1UAHdbpfS.', 'profesor@gmail.com', 5, 0),
(74, 'teacher2', '$2y$10$YWO7ubcCcM/QeOrBJHB44.YYe2k8Oye5iCDuUZgO26xrOjdDmqHFC', 'teacher2@gmail.com', 3, 12),
(75, 'profesor1', '$2y$10$tQeK4FHTO2uzLEizujuu7OTH77k6c0AqMNethjj3DWElM3pECklg.', 'profesor1@gmail.com', 5, 0),
(76, 'profesor2', '$2y$10$RZjTQfdDdHRmE9kk3vbnm.V/LWsA81WXqcrxpGd7zTTEuU3oCcN/C', 'profesor2@gmail.com', 5, 0),
(77, 'profesor3', '$2y$10$4dTonLYomvHFE0UTpA5oju81gQuMRxWMjhVL5NJiSn5TVK0pO2cDO', 'profesor3@gmail.com', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_students`
--

DROP TABLE IF EXISTS `users_students`;
CREATE TABLE IF NOT EXISTS `users_students` (
  `id_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  KEY `fk_users_students_users1_idx` (`id_user`),
  KEY `fk_users_students_students1_idx` (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_students`
--

INSERT INTO `users_students` (`id_user`, `id_student`) VALUES
(15, 27),
(40, 29),
(40, 30),
(15, 31);

-- --------------------------------------------------------

--
-- Table structure for table `users_subjects`
--

DROP TABLE IF EXISTS `users_subjects`;
CREATE TABLE IF NOT EXISTS `users_subjects` (
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  KEY `fk_users_subjects_users1_idx` (`id_user`),
  KEY `fk_users_subjects_subjects1_idx` (`id_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_user` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id_log`, `login_time`, `logout_time`, `ip_user`, `id_user`) VALUES
(1, '2019-07-18 16:13:33', '2019-07-18 17:50:44', '::1', 15),
(2, '2019-07-18 17:51:09', '2019-07-18 18:09:42', '::1', 2),
(3, '2019-07-18 18:09:51', '2019-07-18 18:09:51', '::1', 15),
(4, '2019-07-18 18:13:53', '2019-07-18 18:13:53', '::1', 15),
(5, '2019-07-18 18:15:30', '2019-07-18 18:15:33', '::1', 8),
(6, '2019-07-18 18:16:36', '2019-07-18 18:16:36', '::1', 2),
(7, '2019-07-18 18:19:12', '2019-07-18 18:27:06', '::1', 40),
(8, '2019-07-18 18:27:15', '2019-07-18 18:27:15', '::1', 15),
(9, '2019-07-18 19:42:16', '2019-07-18 19:44:28', '::1', 8),
(10, '2019-07-18 19:44:48', '2019-07-19 08:49:37', '::1', 15),
(11, '2019-07-19 08:49:45', '2019-07-19 08:49:45', '::1', 15),
(12, '2019-07-19 22:38:34', '2019-07-19 22:38:44', '::1', 2),
(13, '2019-07-19 22:38:52', '2019-07-19 22:38:52', '::1', 8),
(14, '2019-07-20 08:34:19', '2019-07-20 08:34:47', '::1', 15),
(15, '2019-07-20 08:34:57', '2019-07-20 08:34:57', '::1', 8),
(16, '2019-07-20 08:45:56', '2019-07-20 08:45:56', '::1', 2),
(17, '2019-07-23 23:04:05', '2019-07-23 23:04:05', '::1', 8),
(18, '2019-07-24 08:59:30', '2019-07-24 08:59:30', '::1', 8),
(19, '2019-07-24 10:41:57', '2019-07-24 10:42:32', '::1', 2),
(20, '2019-07-24 10:42:38', '2019-07-24 10:43:43', '::1', 8),
(21, '2019-07-24 10:43:50', '2019-07-24 10:44:27', '::1', 15),
(22, '2019-07-24 10:44:35', '2019-07-24 10:51:28', '::1', 2),
(23, '2019-07-24 10:51:35', '2019-07-24 10:51:35', '::1', 8),
(24, '2019-07-24 11:47:49', '2019-07-24 11:47:49', '::1', 2),
(25, '2019-07-24 12:47:58', '2019-07-24 12:47:58', '::1', 8),
(26, '2019-07-25 09:11:17', '2019-07-25 09:11:17', '::1', 8),
(27, '2019-07-26 08:50:54', '2019-07-26 08:50:54', '::1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id_user_role`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrator can delete update edit users,user roles,schedules,notifications'),
(2, 'Director', 'have access to statistics on the efficiency of the classroomto have access to statistics on the efficiency of subjects at the school level'),
(3, 'Teacher', 'can have 1 class and access to only that class,access their department and write, delete, and conclude grades,can accept and reject the request for parents to come to the open door,message section , schedule'),
(4, 'Parent', 'has access to and grades only for his child,has access to the part of the application where he will schedule the arrival at the open door,messages, notification access'),
(5, 'Professor', 'Profesor can teach one or more subjects and can have 1 or more classes');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `fk_meeting_shedules_users1` FOREIGN KEY (`teacher`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users1` FOREIGN KEY (`from_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messages_users2` FOREIGN KEY (`to_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedules_users`
--
ALTER TABLE `schedules_users`
  ADD CONSTRAINT `fk_schedules_has_users_schedules1` FOREIGN KEY (`id_schedules`) REFERENCES `schedules` (`id_schedules`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schedules_has_users_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_school_classes1` FOREIGN KEY (`id_school_class`) REFERENCES `school_classes` (`id_school_class`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD CONSTRAINT `fk_students_subjects_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_students_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_roles` FOREIGN KEY (`id_user_role`) REFERENCES `user_roles` (`id_user_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_students`
--
ALTER TABLE `users_students`
  ADD CONSTRAINT `fk_users_students_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_students_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD CONSTRAINT `fk_users_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_subjects_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
