DROP TABLE `RBPortalDB`.`customers`;

CREATE TABLE `RBPortalDB`.`customers` (
  `id_customer` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id_customer`),
  UNIQUE INDEX `cust_name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;

