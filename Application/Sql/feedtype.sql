create table feedtype(
  Id int not null primary key auto_increment,
  Title varchar(256),
  Description varchar(2048),
  Icon varchar(256),
  TemplateName varchar(256),
  TemplateVariableName varchar(256),
  TemplatePath varchar(256),
  LaneName varchar(256),
  LaneTitle varchar(256),
  JavascriptFunctionName varchar(256),
  DataSourceUrl varchar(256),
  CallbackFunction varchar(256),
  IsUnique int(1) default 0,
  IsDeleted int(1) default 0
)  engine = InnoDB;