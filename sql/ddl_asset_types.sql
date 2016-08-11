DROP TABLE `RBPortalDB`.`asset_types`;

CREATE TABLE `RBPortalDB`.`asset_types` (
  `id_asset_type` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id_asset_type`),
  UNIQUE INDEX `asset_type_name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;

