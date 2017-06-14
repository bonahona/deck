create table userexternalauthtoken (
  Id int not null primary key auto_increment,
  ExternelServiceId int default null,
  UserUd varchar(256),
  AuthToken varchar(256),
  LocalUserId int not null,
  foreign key(LocalUserId) references localuser(Id)
) engine = InnoDB;