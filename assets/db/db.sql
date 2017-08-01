-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`TB_PERFIL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_PERFIL` (
  `id_per` INT(11) NOT NULL AUTO_INCREMENT,
  `desc_per` VARCHAR(25) NULL,
  PRIMARY KEY (`id_per`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_USUARIO` (
  `id_usu` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_usu` VARCHAR(45) NULL,
  `email_usu` VARCHAR(45) NULL,
  `cpf_usu` VARCHAR(11) NULL,
  `sexo_usu` VARCHAR(10) NULL,
  `TB_PERFIL_id_per` INT(11) NOT NULL,
  `senha_usu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usu`),
  INDEX `INXPER` (`TB_PERFIL_id_per` ASC),
  CONSTRAINT `fk_TB_USUARIO_TB_PERFIL1`
    FOREIGN KEY (`TB_PERFIL_id_per`)
    REFERENCES `mydb`.`TB_PERFIL` (`id_per`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_COMP_CURC`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_COMP_CURC` (
  `id_ccr` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_ccr` VARCHAR(45) NULL,
  `cargaHoraria_ccr` INT(11) NULL,
  PRIMARY KEY (`id_ccr`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_SIMULADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_SIMULADOR` (
  `id_sml` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_sml` VARCHAR(45) NULL,
  `descricao_sml` VARCHAR(45) NULL,
  PRIMARY KEY (`id_sml`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_CICL_SIMU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_CICL_SIMU` (
  `id_csm` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao_csm` VARCHAR(45) NULL,
  `imagem_csm` VARCHAR(45) NULL,
  `TB_COMP_CURC_id_ccr` INT(11) NOT NULL,
  `TB_SIMULADOR_id_sml` INT(11) NOT NULL,
  PRIMARY KEY (`id_csm`),
  INDEX `INXCCR` (`TB_COMP_CURC_id_ccr` ASC),
  INDEX `INXSML` (`TB_SIMULADOR_id_sml` ASC),
  CONSTRAINT `fk_CicloSimulador_ComponenteCurricular1`
    FOREIGN KEY (`TB_COMP_CURC_id_ccr`)
    REFERENCES `mydb`.`TB_COMP_CURC` (`id_ccr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_CICL_SIMU_TB_SIMULADOR1`
    FOREIGN KEY (`TB_SIMULADOR_id_sml`)
    REFERENCES `mydb`.`TB_SIMULADOR` (`id_sml`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_RELZ_CICL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_RELZ_CICL` (
  `id_rcc` INT(11) NOT NULL AUTO_INCREMENT,
  `pontuacaoAlcancada_rcc` INT(11) NULL,
  `TB_CICL_SIMU_id_csm` INT(11) NOT NULL,
  `TB_USUARIO_id_usu` INT(11) NOT NULL,
  PRIMARY KEY (`id_rcc`),
  INDEX `INXCSM` (`TB_CICL_SIMU_id_csm` ASC),
  INDEX `INXUSU` (`TB_USUARIO_id_usu` ASC),
  CONSTRAINT `fk_RealizarCiclo_CicloSimulador1`
    FOREIGN KEY (`TB_CICL_SIMU_id_csm`)
    REFERENCES `mydb`.`TB_CICL_SIMU` (`id_csm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_RELZ_CICL_TB_USUARIO1`
    FOREIGN KEY (`TB_USUARIO_id_usu`)
    REFERENCES `mydb`.`TB_USUARIO` (`id_usu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_CURSO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_CURSO` (
  `id_cur` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cur` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_ATIV_SIMU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_ATIV_SIMU` (
  `id_asm` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_asm` VARCHAR(45) NULL,
  `tempo_asm` INT(11) NULL,
  `pontuacao_asm` INT(11) NULL,
  `imagem_asm` VARCHAR(45) NULL,
  `TB_CICL_SIMU_id_csm` INT(11) NOT NULL,
  PRIMARY KEY (`id_asm`),
  INDEX `INXCSM` (`TB_CICL_SIMU_id_csm` ASC),
  CONSTRAINT `fk_TB_ATIV_SIMU_TB_CICL_SIMU1`
    FOREIGN KEY (`TB_CICL_SIMU_id_csm`)
    REFERENCES `mydb`.`TB_CICL_SIMU` (`id_csm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_ITEN_ATV_SML`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_ITEN_ATV_SML` (
  `id_ias` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_ias` VARCHAR(45) NULL,
  `sequencia_ias` INT(11) NULL,
  `TB_ATIV_SIMU_id_ias` INT(11) NOT NULL,
  PRIMARY KEY (`id_ias`),
  INDEX `INXASM` (`TB_ATIV_SIMU_id_ias` ASC),
  CONSTRAINT `fk_ItensAtividadeSimulador_AtividadeSimulador1`
    FOREIGN KEY (`TB_ATIV_SIMU_id_ias`)
    REFERENCES `mydb`.`TB_ATIV_SIMU` (`id_asm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_COMP_NORT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_COMP_NORT` (
  `id_cnr` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cnr` VARCHAR(45) NULL,
  `TB_SIMULADOR_id_sml` INT(11) NOT NULL,
  PRIMARY KEY (`id_cnr`),
  INDEX `INXSML` (`TB_SIMULADOR_id_sml` ASC),
  CONSTRAINT `fk_CompetenciasNoteadoras_Simulador1`
    FOREIGN KEY (`TB_SIMULADOR_id_sml`)
    REFERENCES `mydb`.`TB_SIMULADOR` (`id_sml`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_ETG_CCR_CNT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_ETG_CCR_CNT` (
  `id_ccr_cnt` INT(11) NOT NULL,
  `TB_COMP_CURC_id_ccr` INT(11) NOT NULL,
  `TB_COMP_NOTE_id_cnt` INT(11) NOT NULL,
  PRIMARY KEY (`id_ccr_cnt`),
  INDEX `INXCNR` (`TB_COMP_NOTE_id_cnt` ASC),
  INDEX `INXCCR` (`TB_COMP_CURC_id_ccr` ASC),
  CONSTRAINT `fk_ComponenteCurricular_has_CompetenciasNoteadoras_Componente1`
    FOREIGN KEY (`TB_COMP_CURC_id_ccr`)
    REFERENCES `mydb`.`TB_COMP_CURC` (`id_ccr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComponenteCurricular_has_CompetenciasNoteadoras_Competenci1`
    FOREIGN KEY (`TB_COMP_NOTE_id_cnt`)
    REFERENCES `mydb`.`TB_COMP_NORT` (`id_cnr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TB_ETG_CUR_CCR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TB_ETG_CUR_CCR` (
  `id_cur_ccr` INT(11) NOT NULL AUTO_INCREMENT,
  `TB_CURSO_id_cur` INT(11) NOT NULL,
  `TB_COMP_CURC_id_ccr` INT(11) NOT NULL,
  PRIMARY KEY (`id_cur_ccr`),
  INDEX `INXCCR` (`TB_COMP_CURC_id_ccr` ASC),
  INDEX `INXCUR` (`TB_CURSO_id_cur` ASC),
  CONSTRAINT `fk_Curso_has_ComponenteCurricular_Curso1`
    FOREIGN KEY (`TB_CURSO_id_cur`)
    REFERENCES `mydb`.`TB_CURSO` (`id_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_has_ComponenteCurricular_ComponenteCurricular1`
    FOREIGN KEY (`TB_COMP_CURC_id_ccr`)
    REFERENCES `mydb`.`TB_COMP_CURC` (`id_ccr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
