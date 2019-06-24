-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2019 at 06:12 PM
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
(1, 'fdsfdsfdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=554 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`id_school_class`, `name`) VALUES
(3, '1-1'),
(4, '1-2'),
(5, '1-3'),
(6, '1-4'),
(7, '1-5'),
(8, '2-1'),
(9, '2-2'),
(10, '2-3'),
(11, '2-4');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `first_name`, `last_name`, `id_school_class`) VALUES
(4, 'Mateja', 'Stankovic', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name`) VALUES
(2, 'Srpski'),
(3, 'Matematika'),
(4, 'Likovno');

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
  `id_user_role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`),
  KEY `fk_users_user_roles_idx` (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `id_user_role`) VALUES
(2, 'administrator', '$2y$10$2hg/V3YhIgKl2XNe0fNij.0DrBdXzns5AaeWu.j6h5QnXLjZNvEsW', 'administrator@gmail.com', 1),
(4, 'Milan', '$2y$10$BV8K9.rhH8t6em8.EyTDQO9G97YpDaiFAkNsQ65hhwqkfDMRxx45W', 'milan@gmail.com', 4),
(5, 'Milan', '$2y$10$.uyW2q994Nv446YbrUmZse.f9vJdc5Lw3Ns8cnjewMYpvz024OEVm', 'milaerwern@gmail.com', 4),
(6, 'Milan', '$2y$10$WzuoWqUXkPLWVJcmgVlMPetNqdqD8SH64RY7y/eNJtSW57aGQmupu', 'milfgan@gmail.com', 4),
(7, 'Anaa', '$2y$10$9XUwH9VukFkbE.g9GiSRBuGomnyvBNqhvX7rn1fIJBPJOuMVLAtJS', 'milanz@gmail.com', 2),
(8, 'Milan', '$2y$10$9pGqF7hBapUZiyML1pChauc8CAGeBWnq4JZW9msVqElg5c0lw3Zu2', 'mdfilan@gmail.com', 4);

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
(8, 4);

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
(2, 'Teacher', ''),
(3, 'Director', NULL),
(4, 'Parent', NULL);

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
  ADD CONSTRAINT `fk_students_school_classes1` FOREIGN KEY (`id_school_class`) REFERENCES `school_classes` (`id_school_class`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
