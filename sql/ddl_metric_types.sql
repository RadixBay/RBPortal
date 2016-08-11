DROP TABLE `RBPortalDB`.`metric_types`;

CREATE TABLE `RBPortalDB`.`metric_types` (
  `id_metric_type` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id_metric_type`),
  UNIQUE INDEX `metric_type_name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;

