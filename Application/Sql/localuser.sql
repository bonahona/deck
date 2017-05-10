CREATE TABLE localuser (
   Id int(11) primary key NOT NULL AUTO_INCREMENT,
   FacebookUserId varchar(256) DEFAULT NULL,
   UserLevel int not null default 0
 ) ENGINE = InnoDB;