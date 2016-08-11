DROP TABLE `RBPortalDB`.`customer_asset_metrics`;

CREATE TABLE `RBPortalDB`.`customer_asset_metrics` (
  `id_metric` INT NOT NULL,
  `id_asset` INT NOT NULL,
  `metric_datetime` DATE NOT NULL,
  `metric_date` DATE NOT NULL,
  `id_customer` INT NOT NULL,
  `value` INT NOT NULL,
  PRIMARY KEY (`id_metric`, `id_asset`, `metric_datetime`),
  INDEX `customer_FK_idx` (`id_customer` ASC),
  CONSTRAINT `customer_metric_FK`
    FOREIGN KEY (`id_customer`)
    REFERENCES `RBPortalDB`.`customers` (`id_customer`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `metric_measurement_FK`
    FOREIGN KEY (`id_metric`)
    REFERENCES `RBPortalDB`.`metrics` (`id_metric`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION);

