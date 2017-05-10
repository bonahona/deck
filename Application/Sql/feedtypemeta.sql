create table feedtypemeta (
 Id int not null primary key auto_increment,
 DisplayName varchar(256),
 DataName varchar(256),
 IsOptional int(1) default 1,
 IsDeleted int(1) default 0,
 FeedTypeId int not null,
 foreign key(FeedTypeId) references FeedType(Id)
) engine = InnoDB;