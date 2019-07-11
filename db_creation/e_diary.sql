CREATE DATABASE  IF NOT EXISTS `e_diary` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_diary`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e_diary
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id_meetings` int(11) NOT NULL AUTO_INCREMENT,
  `meetings` datetime NOT NULL,
  `meetings_status` tinyint(1) DEFAULT '0',
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_meetings`),
  KEY `fk_meeting_shedules_users1_idx` (`from_id_user`),
  CONSTRAINT `fk_meeting_shedules_users1` FOREIGN KEY (`from_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id_messages` int(11) NOT NULL AUTO_INCREMENT,
  `message_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_content` text,
  `message_status` tinyint(1) DEFAULT NULL,
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `fk_messages_users1_idx` (`from_id_user`),
  KEY `fk_messages_users2_idx` (`to_id_user`),
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`from_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users2` FOREIGN KEY (`to_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent_notifications`
--

DROP TABLE IF EXISTS `parent_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent_notifications` (
  `id_parent_notification` int(11) NOT NULL AUTO_INCREMENT,
  `notification_content` text,
  PRIMARY KEY (`id_parent_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent_notifications`
--

LOCK TABLES `parent_notifications` WRITE;
/*!40000 ALTER TABLE `parent_notifications` DISABLE KEYS */;
INSERT INTO `parent_notifications` VALUES (1,'Test notification');
/*!40000 ALTER TABLE `parent_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id_schedules` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id_schedules`)
) ENGINE=InnoDB AUTO_INCREMENT=456 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'Srpski jezik i knjizevnost',1,1,1),(2,'Matematika',2,1,1),(3,'Likovno',3,1,1),(4,'Biologija',4,1,1),(5,'N/A',5,1,1),(6,'',6,1,1),(7,'',7,1,1),(8,'Istorija',1,2,1),(9,'Matematika',2,2,1),(10,'Srpski jezik i knjizevnost',3,2,1),(11,'Fizicko vaspitanje',4,2,1),(12,'Engleski jezik',5,2,1),(13,'',6,2,1),(14,'',7,2,1),(15,'Srpski jezik i knjizevnost',1,3,1),(16,'Informatika',2,3,1),(17,'Hemija',3,3,1),(18,'Geografija',4,3,1),(19,'Veronauka',5,3,1),(20,'Likovno',6,3,1),(21,'',7,3,1),(22,'Engleski jezik',1,4,1),(23,'Srpski jezik i knjizevnost',2,4,1),(24,'Fizicko vaspitanje',3,4,1),(25,'Engleski jezik',4,4,1),(26,'Informatika',5,4,1),(27,'Matematika',6,4,1),(28,'Srpski jezik i knjizevnost',7,4,1),(29,'Likovno',2,5,1),(30,'Veronauka',1,5,1),(31,'Istorija',3,5,1),(32,'Engleski jezik',4,5,1),(33,'Hemija',5,5,1),(34,'Istorija',6,5,1),(35,'',7,5,1);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules_users`
--

DROP TABLE IF EXISTS `schedules_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules_users` (
  `id_user` int(11) NOT NULL,
  `id_schedules` int(11) NOT NULL,
  KEY `fk_schedules_has_users_users1_idx` (`id_user`),
  KEY `fk_schedules_has_users_schedules1_idx` (`id_schedules`),
  CONSTRAINT `fk_schedules_has_users_schedules1` FOREIGN KEY (`id_schedules`) REFERENCES `schedules` (`id_schedules`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedules_has_users_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules_users`
--

LOCK TABLES `schedules_users` WRITE;
/*!40000 ALTER TABLE `schedules_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_classes`
--

DROP TABLE IF EXISTS `school_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_classes` (
  `id_school_class` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id_school_class`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_classes`
--

LOCK TABLES `school_classes` WRITE;
/*!40000 ALTER TABLE `school_classes` DISABLE KEYS */;
INSERT INTO `school_classes` VALUES (1,'1-1'),(2,'1-2'),(3,'1-3'),(4,'1-4'),(5,'1-5'),(6,'1-6'),(7,'2-1'),(8,'2-2'),(9,'2-3'),(10,'2-4'),(11,'2-5'),(12,'2-6'),(13,'3-1'),(14,'3-2'),(15,'3-3'),(16,'3-4'),(17,'3-5'),(18,'3-6'),(19,'4-1'),(20,'4-2'),(21,'4-3'),(22,'4-4'),(23,'4-5'),(25,'4-6'),(26,'4-7');
/*!40000 ALTER TABLE `school_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_school_class` int(11) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `fk_students_school_classes1_idx` (`id_school_class`),
  CONSTRAINT `fk_students_school_classes1` FOREIGN KEY (`id_school_class`) REFERENCES `school_classes` (`id_school_class`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (6,'student2','student2',2),(26,'student3','student3',3),(27,'student1','student1',1),(28,'student4','student4',17);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_subjects`
--

DROP TABLE IF EXISTS `students_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students_subjects` (
  `id_student_subject` int(11) NOT NULL AUTO_INCREMENT,
  `grades` int(11) NOT NULL,
  `grade_status` tinyint(1) NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  PRIMARY KEY (`id_student_subject`),
  KEY `fk_students_subjects_students1_idx` (`id_student`),
  KEY `fk_students_subjects_subjects1_idx` (`id_subject`),
  CONSTRAINT `fk_students_subjects_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_subjects`
--

LOCK TABLES `students_subjects` WRITE;
/*!40000 ALTER TABLE `students_subjects` DISABLE KEYS */;
INSERT INTO `students_subjects` VALUES (9,5,0,1,27,1),(10,5,0,1,27,4),(11,4,0,1,27,6),(12,5,1,1,27,8),(13,5,1,1,27,2);
/*!40000 ALTER TABLE `students_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Srpski jezik i knjizevnost'),(2,'Matematika'),(3,'Likovno'),(4,'Biologija'),(5,'Fizicko vaspitanje'),(6,'Geografija'),(7,'Istorija'),(8,'Engleski jezik'),(9,'Informatika'),(10,'Hemija'),(11,'Veronauka');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'Administrator','Administrator can delete update edit users,user roles,schedules,notifications'),(2,'Director','have access to statistics on the efficiency of the classroomto have access to statistics on the efficiency of subjects at the school level'),(3,'Teacher','can have 1 class and access to only that class,access their department and write, delete, and conclude grades,can accept and reject the request for parents to come to the open door,message section , schedule'),(4,'Parent','has access to and grades only for his child,has access to the part of the application where he will schedule the arrival at the open door,messages, notification access');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user_role` int(11) NOT NULL DEFAULT '4',
  `teacher_class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_user_roles_idx` (`id_user_role`),
  CONSTRAINT `fk_users_user_roles` FOREIGN KEY (`id_user_role`) REFERENCES `user_roles` (`id_user_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'administrator','$2y$10$2hg/V3YhIgKl2XNe0fNij.0DrBdXzns5AaeWu.j6h5QnXLjZNvEsW','administrator@gmail.com',1,0),(6,'director','$2y$10$YG.Ity62kSWi1j9xz0EdKeR96pITfKLX5Go7wocI/oCrg794HqZVm','director@gmail.com',2,0),(8,'teacher','$2y$10$91fxW1z3ChSXmhFh2Qy2U.7/ipBBotLWeSS2fspc27I2CbPfjldha','teacher@gmail.com',3,1),(15,'parent','$2y$10$3VngNhp8CWN2rL3nOXK6Au8jtqqTAGGg9g3/Nm7jXCpDr216.fCYe','parent@gmail.com',4,0),(16,'parent2','$2y$10$zSftZHwrEQatTsL/C8QBNOeze3fkwWkH2MRU/9G5scowdMycMGLfW','parent2@gmail.com',4,0),(34,'teacher1','$2y$10$e4dRFqGtFyjXaRARefmHP.PujuGjm3o63pZmEp4b7uORKewBPuvda','teacher1@gmail.com',3,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_students`
--

DROP TABLE IF EXISTS `users_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_students` (
  `id_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  KEY `fk_users_students_users1_idx` (`id_user`),
  KEY `fk_users_students_students1_idx` (`id_student`),
  CONSTRAINT `fk_users_students_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_students_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_students`
--

LOCK TABLES `users_students` WRITE;
/*!40000 ALTER TABLE `users_students` DISABLE KEYS */;
INSERT INTO `users_students` VALUES (16,6),(16,26),(15,27);
/*!40000 ALTER TABLE `users_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_subjects`
--

DROP TABLE IF EXISTS `users_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_subjects` (
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  KEY `fk_users_subjects_users1_idx` (`id_user`),
  KEY `fk_users_subjects_subjects1_idx` (`id_subject`),
  CONSTRAINT `fk_users_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_subjects_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_subjects`
--

LOCK TABLES `users_subjects` WRITE;
/*!40000 ALTER TABLE `users_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'e_diary'
--

--
-- Dumping routines for database 'e_diary'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-11 12:31:24
