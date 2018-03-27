-- MySQL Script generated by MySQL Workbench
-- Monday, 14 August, 2017 02:34:21 PM PHT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema vision_international
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vision_international
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vision_international` DEFAULT CHARACTER SET utf8 ;
USE `vision_international` ;

-- -----------------------------------------------------
-- Table `vision_international`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vision_international`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` VARCHAR(45) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vision_international`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vision_international`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `article` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` DATETIME NULL,
  `created_by` INT NOT NULL,
  PRIMARY KEY (`id`, `created_by`),
  INDEX `fk_news_users_idx` (`created_by` ASC),
  CONSTRAINT `fk_news_users`
    FOREIGN KEY (`created_by`)
    REFERENCES `vision_international`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vision_international`.`testimonials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vision_international`.`testimonials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `organization` VARCHAR(255) NULL,
  `testimony` MEDIUMTEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` DATETIME NULL,
  `created_by` INT NOT NULL,
  PRIMARY KEY (`id`, `created_by`),
  INDEX `fk_testimonials_users1_idx` (`created_by` ASC),
  CONSTRAINT `fk_testimonials_users1`
    FOREIGN KEY (`created_by`)
    REFERENCES `vision_international`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vision_international`.`programs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vision_international`.`programs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `created_by` INT NOT NULL,
  `deleted_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `created_by`),
  INDEX `fk_programs_users1_idx` (`created_by` ASC),
  CONSTRAINT `fk_programs_users1`
    FOREIGN KEY (`created_by`)
    REFERENCES `vision_international`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;