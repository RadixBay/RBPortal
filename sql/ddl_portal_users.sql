DROP TABLE `RBPortalDB`.`portal_users`;

CREATE TABLE `RBPortalDB`.`portal_users` (
  `id_portal_user` INT NOT NULL AUTO_INCREMENT,
  `userid` VARCHAR(45) NOT NULL,
  `passwd` VARCHAR(45) NOT NULL,
  `full_name` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_portal_user`),
  UNIQUE INDEX `portal_userid_UNIQUE` (`userid` ASC))
ENGINE = InnoDB;

