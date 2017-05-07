CREATE TABLE userpage (
   Id int(11) primary key NOT NULL AUTO_INCREMENT,
   NavigationName varchar(256) DEFAULT NULL,
   PageTitle varchar(256) DEFAULT NULL,
   IsActive int(1) NOT NULL DEFAULT '0',
   IsNotify int(1) NOT NULL DEFAULT '0',
   IsDeleted int(1) NOT NULL DEFAULT '0',
   ShowInMenu int(1) NOT NULL DEFAULT '0',
   LocalUserId int not null,
   foreign key(localUserId) references localuser(id)
 ) ENGINE = InnoDb;