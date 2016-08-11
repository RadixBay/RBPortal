DROP TABLE `RBPortalDB`.`customer_access`;

CREATE TABLE `RBPortalDB`.`customer_access` (
  `id_customer` INT NOT NULL,
  `id_portal_user` INT NOT NULL,
  PRIMARY KEY (`id_customer`, `id_portal_user`),
  INDEX `user_FK_idx` (`id_portal_user` ASC),
  CONSTRAINT `customer_access_FK`
    FOREIGN KEY (`id_customer`)
    REFERENCES `RBPortalDB`.`customers` (`id_customer`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `portal_users_access_FK`
    FOREIGN KEY (`id_portal_user`)
    REFERENCES `RBPortalDB`.`portal_users` (`id_portal_user`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION);

