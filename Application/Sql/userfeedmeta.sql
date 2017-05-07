create table userfeedmeta(
  Id int not null primary key auto_increment,
  Identifier varchar(128),
  Value varchar(2048),
  UserFeedId int not null,
  foreign key(UserFeedId) references userfeed(Id)
);