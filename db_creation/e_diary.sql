-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2019 at 05:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

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
-- Table structure for table `meeting_shedules`
--

DROP TABLE IF EXISTS `meeting_shedules`;
CREATE TABLE IF NOT EXISTS `meeting_shedules` (
  `id_meeting_shedule` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_date` datetime NOT NULL,
  `meeting_status` tinyint(1) DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_meeting_shedule`),
  KEY `fk_meeting_shedules_users1_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_schedules`, `subject_name`, `order_id`, `day_id`, `class_id`) VALUES
(1, 'Srpski jezik i knjizevnost', 1, 1, 1),
(2, 'Matematika', 2, 1, 1),
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
(35, '', 7, 5, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

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
(25, '4-6');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `first_name`, `last_name`, `id_school_class`) VALUES
(5, 'student', 'student', 1),
(6, 'student2', 'student2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

DROP TABLE IF EXISTS `students_subjects`;
CREATE TABLE IF NOT EXISTS `students_subjects` (
  `grades` int(11) NOT NULL,
  `grade_status` tinyint(1) NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  KEY `fk_students_subjects_students1_idx` (`id_student`),
  KEY `fk_students_subjects_subjects1_idx` (`id_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `id_user_role`, `teacher_class_id`) VALUES
(2, 'administrator', '$2y$10$2hg/V3YhIgKl2XNe0fNij.0DrBdXzns5AaeWu.j6h5QnXLjZNvEsW', 'administrator@gmail.com', 1, 0),
(6, 'director', '$2y$10$YG.Ity62kSWi1j9xz0EdKeR96pITfKLX5Go7wocI/oCrg794HqZVm', 'director@gmail.com', 2, 0),
(8, 'teacher', '$2y$10$91fxW1z3ChSXmhFh2Qy2U.7/ipBBotLWeSS2fspc27I2CbPfjldha', 'teacher@gmail.com', 3, 0),
(15, 'parent', '$2y$10$3VngNhp8CWN2rL3nOXK6Au8jtqqTAGGg9g3/Nm7jXCpDr216.fCYe', 'parent@gmail.com', 4, 0),
(16, 'parent2', '$2y$10$zSftZHwrEQatTsL/C8QBNOeze3fkwWkH2MRU/9G5scowdMycMGLfW', 'parent2@gmail.com', 4, 0),
(34, 'teacher1', '$2y$10$e4dRFqGtFyjXaRARefmHP.PujuGjm3o63pZmEp4b7uORKewBPuvda', 'teacher1@gmail.com', 3, 4),
(37, 'teacher2', '$2y$10$0suu4xPQqZogXoHUkji24.wsgGuJYkNzcbPo8o.9U3Au147UjPoY.', 'teacher2@gmail.com', 3, 3);

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
(15, 5),
(16, 6);

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
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id_user_role`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrator can delete update edit users,user roles,schedules,notifications'),
(2, 'Director', 'have access to statistics on the efficiency of the classroomto have access to statistics on the efficiency of subjects at the school level'),
(3, 'Teacher', 'can have 1 class and access to only that class,access their department and write, delete, and conclude grades,can accept and reject the request for parents to come to the open door,message section , schedule'),
(4, 'Parent', 'has access to and grades only for his child,has access to the part of the application where he will schedule the arrival at the open door,messages, notification access');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting_shedules`
--
ALTER TABLE `meeting_shedules`
  ADD CONSTRAINT `fk_meeting_shedules_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_students_subjects_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_students_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
