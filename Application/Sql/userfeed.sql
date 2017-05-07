create table userfeed(
  Id int not null primary key auto_increment,
  FeedType int not null default 0,
  Width int not null default 0,
  IsDeleted int not null default 0,
  IsNotify int not null default 0,
  LaneId int not null default 0,
  UserPageId int not null,
  foreign key(UserPageId) references userpage(Id)
) engine = InnoDB;