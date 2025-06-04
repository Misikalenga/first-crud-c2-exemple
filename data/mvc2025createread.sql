-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mvc2025createread
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mvc2025createread` ;

-- -----------------------------------------------------
-- Schema mvc2025createread
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mvc2025createread` DEFAULT CHARACTER SET utf8 ;
USE `mvc2025createread` ;

-- -----------------------------------------------------
-- Table `mvc2025createread`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc2025createread`.`user` ;

CREATE TABLE IF NOT EXISTS `mvc2025createread`.`user` (
  `iduser` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(50) NOT NULL,
  `user_name` VARCHAR(120) NOT NULL,
  `user_pwd` VARCHAR(255) NOT NULL,
  `user_role` VARCHAR(50) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `user_login_UNIQUE` (`user_login` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mvc2025createread`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mvc2025createread`.`article` ;

CREATE TABLE IF NOT EXISTS `mvc2025createread`.`article` (
  `idarticle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_title` VARCHAR(120) NOT NULL,
  `article_text` TEXT NOT NULL,
  `article_date_created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `article_date_published` DATETIME NULL,
  `article_is_published` TINYINT UNSIGNED NULL DEFAULT 0,
  `user_iduser` MEDIUMINT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  INDEX `fk_article_user_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_article_user`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `mvc2025createread`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
