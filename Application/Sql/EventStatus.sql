create table EventStatus(
Id int not null primary key auto_increment,
UserId varchar(128),
EventId varchar(128),
IsDismissed int(1) not null default 0,
IsSeen int(1) not null default 0
);