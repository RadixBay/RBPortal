DROP TABLE `RBPortalDB`.`metrics`;

CREATE TABLE `RBPortalDB`.`metrics` (
  `id_metric` INT NOT NULL,
  `id_metric_type` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id_metric`),
  INDEX `id_metric_type_idx` (`id_metric_type` ASC),
  CONSTRAINT `metric_type_FK`
    FOREIGN KEY (`id_metric_type`)
    REFERENCES `RBPortalDB`.`metric_types` (`id_metric_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

