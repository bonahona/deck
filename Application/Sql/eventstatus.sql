 CREATE TABLE eventstatus (
   ID int(11) primary key NOT NULL AUTO_INCREMENT,
   UserId varchar(128) DEFAULT NULL,
   EventId varchar(128) DEFAULT NULL,
   IsDismissed int(1) NOT NULL DEFAULT '0',
   IsSeen int(1) NOT NULL DEFAULT '0'
 ) ENGINE = InnoDB