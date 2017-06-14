CREATE TABLE localuser (
   Id int(11) primary key NOT NULL AUTO_INCREMENT,
   Salt varchar(256),
   PasswordHash varchar(256),
   UserLevel int not null default 0
 ) ENGINE = InnoDB;