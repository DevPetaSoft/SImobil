CREATE SCHEMA IF NOT EXISTS `db_simobil` DEFAULT CHARACTER SET utf8 ;
USE `db_simobil` ;

-- -----------------------------------------------------
-- Table `db_simobil`.`si_endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NULL,
  `numero` INT NULL,
  `estado` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_imobiliaria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_imobiliaria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `deletado` TINYINT(1) NULL DEFAULT 0,
  `dataCriacao` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_imovel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_imovel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(400) NOT NULL,
  `quarto` INT NULL,
  `preco` FLOAT NULL,
  `tipo` INT NOT NULL,
  `deletado` TINYINT(1) NULL DEFAULT 0,
  `dataLocacao` DATE NULL,
  `dataCriacao` DATE NOT NULL,
  `banheiro` INT NULL,
  `garagem` INT NULL,
  `cozinha` INT NULL,
  `sala` INT NULL,
  `disponivel` TINYINT(1) NULL,
  `si_endereco_idsi_endereco` INT NOT NULL,
  `si_imobiliaria_id` INT NOT NULL,
  `codigo` VARCHAR(10) NOT NULL,
  `regiao` VARCHAR(100) NULL,
  PRIMARY KEY (`id`, `si_endereco_idsi_endereco`, `si_imobiliaria_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_si_imovel_si_endereco1_idx` (`si_endereco_idsi_endereco` ASC),
  INDEX `fk_si_imovel_si_imobiliaria1_idx` (`si_imobiliaria_id` ASC),
  CONSTRAINT `fk_si_imovel_si_endereco1`
    FOREIGN KEY (`si_endereco_idsi_endereco`)
    REFERENCES `db_simobil`.`si_endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_si_imovel_si_imobiliaria1`
    FOREIGN KEY (`si_imobiliaria_id`)
    REFERENCES `db_simobil`.`si_imobiliaria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_fotoImovel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_fotoImovel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `si_imovel_id` INT NOT NULL,
  `photoLink` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `si_imovel_id`),
  INDEX `fk_si_imovelPhotos_si_imovel_idx` (`si_imovel_id` ASC),
  CONSTRAINT `fk_si_imovelPhotos_si_imovel`
    FOREIGN KEY (`si_imovel_id`)
    REFERENCES `db_simobil`.`si_imovel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_login` (
  `id` INT NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `permicao` INT NOT NULL,
  `ultimoLogin` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_Usuario` (
  `cpf` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `si_endereco_idsi_endereco` INT NOT NULL,
  `si_login_id` INT NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `dataCadastro` DATE NOT NULL,
  PRIMARY KEY (`cpf`, `si_endereco_idsi_endereco`, `si_login_id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_si_Usuario_si_endereco1_idx` (`si_endereco_idsi_endereco` ASC),
  INDEX `fk_si_Usuario_si_login1_idx` (`si_login_id` ASC),
  CONSTRAINT `fk_si_Usuario_si_endereco1`
    FOREIGN KEY (`si_endereco_idsi_endereco`)
    REFERENCES `db_simobil`.`si_endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_si_Usuario_si_login1`
    FOREIGN KEY (`si_login_id`)
    REFERENCES `db_simobil`.`si_login` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_aluguel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_aluguel` (
  `idsi_aluguel` INT NOT NULL,
  `si_imovel_id` INT NOT NULL,
  `si_Usuario_cpf` VARCHAR(14) NOT NULL,
  `si_Usuario_si_endereco_idsi_endereco` INT NOT NULL,
  `si_Usuario_si_login_id` INT NOT NULL,
  `condiminio` FLOAT NOT NULL DEFAULT 0,
  `valorFinal` FLOAT NOT NULL DEFAULT 0,
  `mesReferente` INT NOT NULL,
  `anoReferente` INT NOT NULL,
  `descricaoCondominio` VARCHAR(400) NULL,
  PRIMARY KEY (`idsi_aluguel`, `si_imovel_id`, `si_Usuario_cpf`, `si_Usuario_si_endereco_idsi_endereco`, `si_Usuario_si_login_id`),
  INDEX `fk_si_aluguel_si_imovel1_idx` (`si_imovel_id` ASC),
  INDEX `fk_si_aluguel_si_Usuario1_idx` (`si_Usuario_cpf` ASC, `si_Usuario_si_endereco_idsi_endereco` ASC, `si_Usuario_si_login_id` ASC),
  CONSTRAINT `fk_si_aluguel_si_imovel1`
    FOREIGN KEY (`si_imovel_id`)
    REFERENCES `db_simobil`.`si_imovel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_si_aluguel_si_Usuario1`
    FOREIGN KEY (`si_Usuario_cpf` , `si_Usuario_si_endereco_idsi_endereco` , `si_Usuario_si_login_id`)
    REFERENCES `db_simobil`.`si_Usuario` (`cpf` , `si_endereco_idsi_endereco` , `si_login_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_propriedade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_propriedade` (
  `idsi_` INT NOT NULL,
  `si_imovel_id` INT NOT NULL,
  `si_Usuario_cpf` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`idsi_`, `si_imovel_id`, `si_Usuario_cpf`),
  INDEX `fk_si__si_imovel1_idx` (`si_imovel_id` ASC),
  INDEX `fk_si_propriedade_si_Usuario1_idx` (`si_Usuario_cpf` ASC),
  CONSTRAINT `fk_si__si_imovel1`
    FOREIGN KEY (`si_imovel_id`)
    REFERENCES `db_simobil`.`si_imovel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_si_propriedade_si_Usuario1`
    FOREIGN KEY (`si_Usuario_cpf`)
    REFERENCES `db_simobil`.`si_Usuario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_simobil`.`si_imobiliaria_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_simobil`.`si_imobiliaria_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `si_imobiliaria_id` INT NOT NULL,
  `si_Usuario_cpf` VARCHAR(14) NOT NULL,
  `si_Usuario_si_endereco_idsi_endereco` INT NOT NULL,
  `si_Usuario_si_login_id` INT NOT NULL,
  PRIMARY KEY (`id`, `si_imobiliaria_id`, `si_Usuario_cpf`, `si_Usuario_si_endereco_idsi_endereco`, `si_Usuario_si_login_id`),
  INDEX `fk_si_imobiliaria_usuario_si_imobiliaria1_idx` (`si_imobiliaria_id` ASC),
  INDEX `fk_si_imobiliaria_usuario_si_Usuario1_idx` (`si_Usuario_cpf` ASC, `si_Usuario_si_endereco_idsi_endereco` ASC, `si_Usuario_si_login_id` ASC),
  CONSTRAINT `fk_si_imobiliaria_usuario_si_imobiliaria1`
    FOREIGN KEY (`si_imobiliaria_id`)
    REFERENCES `db_simobil`.`si_imobiliaria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_si_imobiliaria_usuario_si_Usuario1`
    FOREIGN KEY (`si_Usuario_cpf` , `si_Usuario_si_endereco_idsi_endereco` , `si_Usuario_si_login_id`)
    REFERENCES `db_simobil`.`si_Usuario` (`cpf` , `si_endereco_idsi_endereco` , `si_login_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
