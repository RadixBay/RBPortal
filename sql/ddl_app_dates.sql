DROP TABLE `RBPortalDB`.`app_dates`;

CREATE TABLE `RBPortalDB`.`app_dates` (
  `the_date` date NOT NULL,
  `mmddyyyy` varchar(10) NOT NULL,
  `yyyymmdd` varchar(10) NOT NULL,
  `mm` varchar(2) NOT NULL,
  `mon` varchar(3) NOT NULL,
  `month` varchar(15) NOT NULL,
  `d` varchar(1) NOT NULL,
  `dd` varchar(2) NOT NULL,
  `ddd` varchar(3) NOT NULL,
  `day` varchar(15) NOT NULL,
  `dy` varchar(3) NOT NULL,
  `ddspth` varchar(80) NOT NULL,
  `yyyy` varchar(4) NOT NULL,
  `year` varchar(80) NOT NULL,
  `quarter` varchar(1) NOT NULL,
  `ww` varchar(1) NOT NULL,
  `w` varchar(1) NOT NULL,
  `julian` varchar(1) NOT NULL,
  `holiday` char(1) NOT NULL DEFAULT 'N',
  `business_day` char(1) NOT NULL DEFAULT 'N',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`the_date`)) 
ENGINE=InnoDB;

