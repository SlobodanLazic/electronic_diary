-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema e_diary
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `e_diary` ;

-- -----------------------------------------------------
-- Schema e_diary
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `e_diary` DEFAULT CHARACTER SET utf8mb4 ;
USE `e_diary` ;

-- -----------------------------------------------------
-- Table `e_diary`.`user_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`user_roles` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`user_roles` (
  `id_user_role` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` NVARCHAR(255) NULL,
  PRIMARY KEY (`id_user_role`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`users` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `username` NVARCHAR(45) NOT NULL,
  `password` NVARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `id_user_role` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_users_user_roles_idx` (`id_user_role` ASC),
  CONSTRAINT `fk_users_user_roles`
    FOREIGN KEY (`id_user_role`)
    REFERENCES `e_diary`.`user_roles` (`id_user_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`subjects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`subjects` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`subjects` (
  `id_subject` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_subject`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`users_subjects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`users_subjects` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`users_subjects` (
  `id_user` INT NOT NULL,
  `id_subject` INT NOT NULL,
  INDEX `fk_users_subjects_users1_idx` (`id_user` ASC),
  INDEX `fk_users_subjects_subjects1_idx` (`id_subject` ASC),
  CONSTRAINT `fk_users_subjects_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_subjects_subjects1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `e_diary`.`subjects` (`id_subject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`parent_notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`parent_notifications` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`parent_notifications` (
  `id_parent_notification` INT NOT NULL AUTO_INCREMENT,
  `notification_content` TEXT NULL,
  PRIMARY KEY (`id_parent_notification`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`meeting_shedules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`meeting_shedules` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`meeting_shedules` (
  `id_meeting_shedule` INT NOT NULL AUTO_INCREMENT,
  `meeting_date` DATETIME NOT NULL,
  `meeting_status` TINYINT(1) NULL DEFAULT 0,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id_meeting_shedule`),
  INDEX `fk_meeting_shedules_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_meeting_shedules_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`school_classes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`school_classes` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`school_classes` (
  `id_school_class` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_school_class`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`students`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`students` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`students` (
  `id_student` INT NOT NULL AUTO_INCREMENT,
  `first_name` NVARCHAR(255) NOT NULL,
  `last_name` NVARCHAR(255) NOT NULL,
  `id_school_class` INT NOT NULL,
  PRIMARY KEY (`id_student`),
  INDEX `fk_students_school_classes1_idx` (`id_school_class` ASC),
  CONSTRAINT `fk_students_school_classes1`
    FOREIGN KEY (`id_school_class`)
    REFERENCES `e_diary`.`school_classes` (`id_school_class`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`users_students`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`users_students` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`users_students` (
  `id_user` INT NOT NULL,
  `id_student` INT NOT NULL,
  INDEX `fk_users_students_users1_idx` (`id_user` ASC),
  INDEX `fk_users_students_students1_idx` (`id_student` ASC),
  CONSTRAINT `fk_users_students_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_students_students1`
    FOREIGN KEY (`id_student`)
    REFERENCES `e_diary`.`students` (`id_student`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`messages` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`messages` (
  `id_messages` INT NOT NULL AUTO_INCREMENT,
  `message_time` DATETIME NOT NULL DEFAULT NOW(),
  `message_content` TEXT NULL,
  `message_status` TINYINT(1) NULL,
  `from_id_user` INT NOT NULL,
  `to_id_user` INT NOT NULL,
  PRIMARY KEY (`id_messages`),
  INDEX `fk_messages_users1_idx` (`from_id_user` ASC),
  INDEX `fk_messages_users2_idx` (`to_id_user` ASC),
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`from_id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users2`
    FOREIGN KEY (`to_id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`students_subjects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`students_subjects` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`students_subjects` (
  `grades` INT NOT NULL,
  `grade_status` TINYINT(1) NOT NULL,
  `school_class_id` INT NOT NULL,
  `id_student` INT NOT NULL,
  `id_subject` INT NOT NULL,
  INDEX `fk_students_subjects_students1_idx` (`id_student` ASC),
  INDEX `fk_students_subjects_subjects1_idx` (`id_subject` ASC),
  CONSTRAINT `fk_students_subjects_students1`
    FOREIGN KEY (`id_student`)
    REFERENCES `e_diary`.`students` (`id_student`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_subjects_subjects1`
    FOREIGN KEY (`id_subject`)
    REFERENCES `e_diary`.`subjects` (`id_subject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`schedules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`schedules` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`schedules` (
  `id_schedules` INT NOT NULL AUTO_INCREMENT,
  `scheduled_date` DATETIME NOT NULL,
  `scheduled_class_id` INT NOT NULL,
  `scheduled_subject_id` INT NOT NULL,
  `scheduled_user_id` INT NOT NULL,
  PRIMARY KEY (`id_schedules`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_diary`.`schedules_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `e_diary`.`schedules_users` ;

CREATE TABLE IF NOT EXISTS `e_diary`.`schedules_users` (
  `id_user` INT NOT NULL,
  `id_schedules` INT NOT NULL,
  INDEX `fk_schedules_has_users_users1_idx` (`id_user` ASC),
  INDEX `fk_schedules_has_users_schedules1_idx` (`id_schedules` ASC),
  CONSTRAINT `fk_schedules_has_users_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `e_diary`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedules_has_users_schedules1`
    FOREIGN KEY (`id_schedules`)
    REFERENCES `e_diary`.`schedules` (`id_schedules`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
