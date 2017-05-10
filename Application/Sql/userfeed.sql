create table userfeed(
  Id int not null primary key auto_increment,
  FeedTypeId int not null,
  Width int not null default 0,
  IsDeleted int not null default 0,
  IsNotify int not null default 0,
  LaneId int not null default 0,
  UserPageId int not null,
  foreign key(UserPageId) references userpage(Id),
  foreign key(FeedTypeId) references feedtype(Id)
) engine = InnoDB;