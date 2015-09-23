CREATE  TABLE IF NOT EXISTS `mydb`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT ,
  `ruc` VARCHAR(11) NULL ,
  `razonsocial` VARCHAR(11) NULL ,
  `contacto` VARCHAR(100) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `telefono` VARCHAR(100) NULL ,
  `fecha_creacion` VARCHAR(50) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`idproveedor`) )
ENGINE = InnoDB



CREATE  TABLE IF NOT EXISTS `mydb`.`transporte` (
  `idtransporte` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NULL ,
  `descripcion` VARCHAR(100) NULL ,
  `fecha_creacion` VARCHAR(50) NULL ,
  `estado` VARCHAR(2) NULL ,
  PRIMARY KEY (`idtransporte`) )
ENGINE = InnoDB




CREATE  TABLE IF NOT EXISTS `mydb`.`maeprov` (
  `idmaeprov` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(11) NOT NULL ,
  `ruc` VARCHAR(11) NOT NULL ,
  `alias` VARCHAR(50) NOT NULL ,
  `nombre` VARCHAR(100) NULL ,
  `direccion` VARCHAR(200) NULL ,
  `telefono` VARCHAR(50) NULL ,
  `representante` VARCHAR(100) NULL ,
  PRIMARY KEY (`idmaeprov`) )
ENGINE = InnoDB




CREATE  TABLE IF NOT EXISTS `mydb`.`maecli` (
  `idmaecli` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(11) NOT NULL ,
  `ruc` VARCHAR(11) NOT NULL ,
  `alias` VARCHAR(50) NOT NULL ,
  `nombre` VARCHAR(100) NULL ,
  `direccion` VARCHAR(200) NULL ,
  `telefono` VARCHAR(50) NULL ,
  `representante` VARCHAR(100) NULL ,
  PRIMARY KEY (`idmaecli`) )
ENGINE = InnoDB

CREATE  TABLE IF NOT EXISTS `mydb`.`distritos` (
  `iddistritos` INT NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`iddistritos`) )
ENGINE = InnoDB


CREATE  TABLE IF NOT EXISTS `mydb`.`reporte_transporte` (
  `idreporte_transporte` INT NOT NULL AUTO_INCREMENT ,
  `proveedor_idproveedor` INT NOT NULL ,
  `transporte_idtransporte` INT NOT NULL ,
  `distritos_iddistritos` INT NOT NULL ,
  `maeprov_idmaeprov` INT NOT NULL ,
  `maecli_idmaecli` INT NOT NULL ,
  `fecha_reporte` VARCHAR(50) NULL ,
  `direccion_reporte` VARCHAR(45) NULL ,
  `costo_reporte` DECIMAL(15,6) NULL ,
  `centcos_reporte` VARCHAR(10) NULL ,
  `ot_reporte` VARCHAR(20) NULL ,
  `documento_reporte` VARCHAR(50) NULL ,
  `guia_reporte` VARCHAR(50) NULL ,
  `comentario_reporte` TEXT NULL ,
  `fecha_creacion` VARCHAR(50) NULL ,
  `estado` VARCHAR(3) NULL DEFAULT '00' ,
  PRIMARY KEY (`idreporte_transporte`) ,
  INDEX `fk_reporte_transporte_proveedor_idx` (`proveedor_idproveedor` ASC) ,
  INDEX `fk_reporte_transporte_transporte1_idx` (`transporte_idtransporte` ASC) ,
  INDEX `fk_reporte_transporte_distritos1_idx` (`distritos_iddistritos` ASC) ,
  INDEX `fk_reporte_transporte_maeprov1_idx` (`maeprov_idmaeprov` ASC) ,
  INDEX `fk_reporte_transporte_maecli1_idx` (`maecli_idmaecli` ASC) ,
  CONSTRAINT `fk_reporte_transporte_proveedor`
    FOREIGN KEY (`proveedor_idproveedor` )
    REFERENCES `mydb`.`proveedor` (`idproveedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_transporte_transporte1`
    FOREIGN KEY (`transporte_idtransporte` )
    REFERENCES `mydb`.`transporte` (`idtransporte` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_transporte_distritos1`
    FOREIGN KEY (`distritos_iddistritos` )
    REFERENCES `mydb`.`distritos` (`iddistritos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_transporte_maeprov1`
    FOREIGN KEY (`maeprov_idmaeprov` )
    REFERENCES `mydb`.`maeprov` (`idmaeprov` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reporte_transporte_maecli1`
    FOREIGN KEY (`maecli_idmaecli` )
    REFERENCES `mydb`.`maecli` (`idmaecli` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB



CREATE  TABLE IF NOT EXISTS `mydb`.`estados` (
  `idestados` VARCHAR(3) NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idestados`) )
ENGINE = InnoDB


