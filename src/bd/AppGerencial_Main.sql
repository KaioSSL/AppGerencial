-- MySQL Script generated by MySQL Workbench
-- Tue Sep 15 19:46:51 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema AppGerencial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AppGerencial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AppGerencial` DEFAULT CHARACTER SET utf8 ;
USE `AppGerencial` ;

-- -----------------------------------------------------
-- Table `AppGerencial`.`CMN_PES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`CMN_PES` (
  `PES_COD` INT NOT NULL,
  `PES_CPF` VARCHAR(16) NOT NULL,
  `PES_NOME` VARCHAR(45) NOT NULL,
  `PES_TEL` VARCHAR(45) NOT NULL,
  `PES_EMA` VARCHAR(45) NOT NULL,
  `PES_DAT_CAD` VARCHAR(45) NOT NULL,
  `PES_END` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PES_COD`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`FIN_BUY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`FIN_BUY` (
  `BUY_COD` INT NOT NULL,
  `BUY_DAT` DATETIME NOT NULL,
  `BUY_TOT_VLR` DOUBLE NOT NULL,
  `BUY_DAT_CAD` DATETIME NOT NULL,
  `PES_COD_FOR` INT NOT NULL,
  PRIMARY KEY (`BUY_COD`),
  CONSTRAINT `fk_FIN_BUY_CMN_PES1`
    FOREIGN KEY (`PES_COD_FOR`)
    REFERENCES `AppGerencial`.`CMN_PES` (`PES_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`COM_INS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`COM_INS` (
  `INS_COD` INT NOT NULL,
  `INS_DES` VARCHAR(45) NOT NULL,
  `INS_PESO` FLOAT NOT NULL,
  `INS_MEDIDA` VARCHAR(45) NOT NULL,
  `INS_DAT_CAD` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`INS_COD`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`CMN_AMZ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`CMN_AMZ` (
  `AMZ_COD` INT NOT NULL,
  `AMZ_DES` VARCHAR(45) NOT NULL,
  `AMZ_END` VARCHAR(45) NOT NULL,
  `AMZ_DAT_CAD` DATETIME NOT NULL,
  `AMZ_STATUS` INT NOT NULL,
  PRIMARY KEY (`AMZ_COD`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`INS_AMZ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`INS_AMZ` (
  `INS_AMZ_COD` INT NOT NULL,
  `INS_QTD_DISP` INT NOT NULL,
  `INS_COD` INT NOT NULL,
  `AMZ_COD` INT NOT NULL,
  PRIMARY KEY (`INS_AMZ_COD`),
  CONSTRAINT `fk_INS_AMZ_COM_INS1`
    FOREIGN KEY (`INS_COD`)
    REFERENCES `AppGerencial`.`COM_INS` (`INS_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INS_AMZ_CMN_AMZ1`
    FOREIGN KEY (`AMZ_COD`)
    REFERENCES `AppGerencial`.`CMN_AMZ` (`AMZ_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`BUY_INS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`BUY_INS` (
  `BUY_INS_COD` INT NOT NULL,
  `INS_COD` INT NOT NULL,
  `BUY_COD` INT NOT NULL,
  `INS_AMZ_COD` INT NOT NULL,
  `INS_QTD` INT NOT NULL,
  `INS_VALIDADE` DATETIME NOT NULL,
  PRIMARY KEY (`BUY_INS_COD`),
  CONSTRAINT `fk_BUY_INS_COM_INS`
    FOREIGN KEY (`INS_COD`)
    REFERENCES `AppGerencial`.`COM_INS` (`INS_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BUY_INS_FIN_BUY1`
    FOREIGN KEY (`BUY_COD`)
    REFERENCES `AppGerencial`.`FIN_BUY` (`BUY_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BUY_INS_INS_AMZ1`
    FOREIGN KEY (`INS_AMZ_COD`)
    REFERENCES `AppGerencial`.`INS_AMZ` (`INS_AMZ_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`COM_PRD`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`COM_PRD` (
  `PRD_COD` INT NOT NULL,
  `PRD_VLR_VENDA` DOUBLE NOT NULL,
  `PRD_VLR_CUSTO` DOUBLE NOT NULL,
  `PRD_PESO` DOUBLE NOT NULL,
  `PRD_DAT_CAD` DATETIME NOT NULL,
  PRIMARY KEY (`PRD_COD`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`PRD_INS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`PRD_INS` (
  `PRD_INS_COD` INT NOT NULL,
  `PRD_INS_DAT_CAD` DATETIME NOT NULL,
  `INS_COD` INT NOT NULL,
  `PRD_COD` INT NOT NULL,
  PRIMARY KEY (`PRD_INS_COD`),
  CONSTRAINT `fk_PRD_INS_COM_INS1`
    FOREIGN KEY (`INS_COD`)
    REFERENCES `AppGerencial`.`COM_INS` (`INS_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRD_INS_COM_PRD1`
    FOREIGN KEY (`PRD_COD`)
    REFERENCES `AppGerencial`.`COM_PRD` (`PRD_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`FIN_SELL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`FIN_SELL` (
  `SELL_COD` INT NOT NULL,
  `SELL_TOT_VLR` DOUBLE NOT NULL,
  `SELL_DAT` DATETIME NOT NULL,
  `SELL_DAT_CAD` DATETIME NOT NULL,
  `PES_COD_CLI` INT NOT NULL,
  PRIMARY KEY (`SELL_COD`),
  CONSTRAINT `fk_FIN_SELL_CMN_PES1`
    FOREIGN KEY (`PES_COD_CLI`)
    REFERENCES `AppGerencial`.`CMN_PES` (`PES_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`PRD_AMZ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`PRD_AMZ` (
  `PRD_AMZ_COD` INT NOT NULL,
  `PRD_QTD_DISP` INT NOT NULL,
  `PRD_COD` INT NOT NULL,
  `AMZ_COD` INT NOT NULL,
  PRIMARY KEY (`PRD_AMZ_COD`),
  CONSTRAINT `fk_PRD_AMZ_COM_PRD1`
    FOREIGN KEY (`PRD_COD`)
    REFERENCES `AppGerencial`.`COM_PRD` (`PRD_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRD_AMZ_CMN_AMZ1`
    FOREIGN KEY (`AMZ_COD`)
    REFERENCES `AppGerencial`.`CMN_AMZ` (`AMZ_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppGerencial`.`SELL_PRD`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AppGerencial`.`SELL_PRD` (
  `SELL_PRD_COD` INT NOT NULL,
  `PRD_COD` INT NOT NULL,
  `SELL_COD` INT NOT NULL,
  `PRD_AMZ_COD` INT NOT NULL,
  `PRD_QTD` INT NOT NULL,
  `PRD_VALIDADE` DATETIME NOT NULL,
  PRIMARY KEY (`SELL_PRD_COD`),
  CONSTRAINT `fk_SELL_PRD_COM_PRD1`
    FOREIGN KEY (`PRD_COD`)
    REFERENCES `AppGerencial`.`COM_PRD` (`PRD_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SELL_PRD_FIN_SELL1`
    FOREIGN KEY (`SELL_COD`)
    REFERENCES `AppGerencial`.`FIN_SELL` (`SELL_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SELL_PRD_PRD_AMZ1`
    FOREIGN KEY (`PRD_AMZ_COD`)
    REFERENCES `AppGerencial`.`PRD_AMZ` (`PRD_AMZ_COD`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
