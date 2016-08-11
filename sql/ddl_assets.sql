DROP TABLE `RBPortalDB`.`assets`;

CREATE TABLE `RBPortalDB`.`assets` (
  `id_asset` INT NOT NULL,
  `id_asset_type` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id_asset`),
  INDEX `id_asset_type_idx` (`id_asset_type` ASC),
  CONSTRAINT `asset_type_FK`
    FOREIGN KEY (`id_asset_type`)
    REFERENCES `RBPortalDB`.`asset_types` (`id_asset_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

