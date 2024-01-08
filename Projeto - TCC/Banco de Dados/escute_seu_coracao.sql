-- -----------------------------------------------------
-- Table `coracao`.`sentimentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`sentimentos` (
  `id_sentimento` INT(5) NOT NULL AUTO_INCREMENT,
  `nome_sentimento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_sentimento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`tipo_usuario` (
  `tipo_user` INT(1) NOT NULL DEFAULT 0,
  `desct_tip_user` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`tipo_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(220) NOT NULL,
  `sobrenome` VARCHAR(220) NOT NULL,
  `usuario` VARCHAR(220) NOT NULL,
  `email` VARCHAR(220) NOT NULL,
  `senha` VARCHAR(10) NOT NULL,
  `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` DATETIME NULL,
  `tipo_usuario_tipo_user` INT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_tipo_usuario1_idx` (`tipo_usuario_tipo_user` ASC) ,
  CONSTRAINT `fk_usuarios_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_tipo_user`)
    REFERENCES `coracao`.`tipo_usuario` (`tipo_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`playlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`playlists` (
  `playlist_cod` INT(11) NOT NULL AUTO_INCREMENT,
  `playlist_nome` VARCHAR(45) NOT NULL,
  `playlist_desc` VARCHAR(225) NULL,
  `usuarios_id` INT(11) NOT NULL,
  PRIMARY KEY (`playlist_cod`),
  INDEX `fk_playlists_usuarios1_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_playlists_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `coracao`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`musicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`musicas` (
  `id_musicas` INT(5) NOT NULL AUTO_INCREMENT,
  `nome_musica` VARCHAR(150) NOT NULL,
  `artista` VARCHAR(50) NOT NULL,
  `album` VARCHAR(150) NOT NULL,
  `duracao` TIME NOT NULL,
  `link_original` VARCHAR(225) NOT NULL,
  `vezes_reproduzida` INT(7) NOT NULL,
  PRIMARY KEY (`id_musicas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`musicas_sentimentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`musicas_sentimentos` (
  `musicas_id_musicas` INT(5) NOT NULL,
  `sentimentos_id_sentimento` INT(5) NOT NULL,
  `tipo_votacao` INT NULL,
  PRIMARY KEY (`musicas_id_musicas`, `sentimentos_id_sentimento`),
  INDEX `fk_musicas_has_sentimentos_sentimentos1_idx` (`sentimentos_id_sentimento` ASC) ,
  INDEX `fk_musicas_has_sentimentos_musicas1_idx` (`musicas_id_musicas` ASC) ,
  CONSTRAINT `fk_musicas_has_sentimentos_musicas1`
    FOREIGN KEY (`musicas_id_musicas`)
    REFERENCES `coracao`.`musicas` (`id_musicas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_musicas_has_sentimentos_sentimentos1`
    FOREIGN KEY (`sentimentos_id_sentimento`)
    REFERENCES `coracao`.`sentimentos` (`id_sentimento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`musicas_playlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`musicas_playlists` (
  `musicas_id_musicas` INT(5) NOT NULL,
  `playlists_playlist_cod` INT(11) NOT NULL,
  PRIMARY KEY (`musicas_id_musicas`, `playlists_playlist_cod`),
  INDEX `fk_musicas_has_playlists_playlists1_idx` (`playlists_playlist_cod` ASC) ,
  INDEX `fk_musicas_has_playlists_musicas1_idx` (`musicas_id_musicas` ASC) ,
  CONSTRAINT `fk_musicas_has_playlists_musicas1`
    FOREIGN KEY (`musicas_id_musicas`)
    REFERENCES `coracao`.`musicas` (`id_musicas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_musicas_has_playlists_playlists1`
    FOREIGN KEY (`playlists_playlist_cod`)
    REFERENCES `coracao`.`playlists` (`playlist_cod`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`favoritas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`favoritas` (
  `usuarios_id` INT(11) NOT NULL,
  `musicas_id_musicas` INT(5) NOT NULL,
  PRIMARY KEY (`usuarios_id`, `musicas_id_musicas`),
  INDEX `fk_usuarios_has_musicas_musicas1_idx` (`musicas_id_musicas` ASC) ,
  INDEX `fk_usuarios_has_musicas_usuarios1_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_usuarios_has_musicas_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `coracao`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_has_musicas_musicas1`
    FOREIGN KEY (`musicas_id_musicas`)
    REFERENCES `coracao`.`musicas` (`id_musicas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coracao`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coracao`.`comentarios` (
  `usuarios_id` INT(11) NOT NULL,
  `musicas_id_musicas` INT(5) NOT NULL,
  `assunto` VARCHAR(500) NOT NULL,
  `created_comentario` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuarios_id`, `musicas_id_musicas`),
  INDEX `fk_usuarios_has_musicas_musicas2_idx` (`musicas_id_musicas` ASC) ,
  INDEX `fk_usuarios_has_musicas_usuarios2_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_usuarios_has_musicas_usuarios2`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `coracao`.`usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_has_musicas_musicas2`
    FOREIGN KEY (`musicas_id_musicas`)
    REFERENCES `coracao`.`musicas` (`id_musicas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;