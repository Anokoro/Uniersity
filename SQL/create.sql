SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
drop database if exists service_center;
create database if not exists service_center;
set global general_log=on;
use service_center;
CREATE TABLE accounts
(
    UID         integer         not null auto_increment,
    username    varchar(32)     not null,
    password    varchar(32)     not null,#MD5加密存储
    #token       varchar(50)     not null,
    #token_exptime int(10)       not null,
    #status      integer         not null default '0',
    regtime     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lastLogin   datetime default '1970-01-01 00:00:00', # 0表示未登录过
    loginTimes  integer default '0',
    role        varchar(10) default 'user',#1-admin,2-server,3-user
    primary key(UID)
)ENGINE = INNODB;

CREATE TABLE userInfo
(
    UID         integer         not null,
    name        varchar(32)     not null,
    photo       varchar(100)DEFAULT'photos/default.jpg',
    gender      varchar(6)      not null,
    age         integer unsigned  not null,
    nation      varchar(32)     not null,
    phone       varchar(11)     not null,
    email       varchar(32)     not null,
    foreign key(UID) references accounts(UID) 
        on delete cascade 
        on update cascade,
    check (gender in ('female','male')),
    check (age < 150)
)ENGINE = INNODB;

CREATE TABLE assistInfo
(
    AID         integer         not null auto_increment,
    UID         integer         not null,
    name        varchar(32)     not null,
    photo       varchar(100)DEFAULT'photos/default.jpg',
    gender      varchar(6)      not null,
    age         integer         not null,
    nation      VARCHAR(20)     not null,
    phone       varchar(11)     not null,
    email       varchar(32)     not null,
    primary key(AID),
    foreign key(UID) references accounts(UID) 
        on delete cascade 
        on update cascade,
    check (gender in ('female','male')),
    check (age < 150)
)ENGINE = INNODB;

CREATE TABLE service
(
    SID         integer         not null auto_increment,
    photo       varchar(100)DEFAULT'photos/default.jpg',
    name        varchar(32)     not null,
    open        datetime        null,
    close       datetime        null,
    duration    time            not null,
    price       decimal(5,2)    not null,
    description VARCHAR(255)DEFAULT 'balabala  babala balala',
    primary key(SID)
)ENGINE = INNODB;

CREATE TABLE works
(
    AID         integer         not null,
    SID         integer         not null,
    level       integer         not null default '0' ,
    avgscore    decimal(3,2)    not null default '0' ,
    foreign key(AID) references assistInfo(AID)
        on delete cascade 
        on update cascade,
    foreign key(SID) references service(SID) # 更改某项服务之后，对应的工作表也要修改
        on delete cascade
        on update cascade,
    check (level <=5)
)ENGINE = INNODB;
CREATE TABLE salary
(
    AID         integer         not null,
    salary      decimal(8,2)    not null default '0' ,
    foreign key(AID) references assistInfo(AID)
        on delete cascade 
        on update cascade,
    check(salary >=0)
)ENGINE = INNODB;

# 预约表
# 条件：要保证用户和服务人员均有时间
# 这怕是最难表之一了
CREATE TABLE orders
(
    OID         integer         not null AUTO_INCREMENT,
    AID         integer         not null,
    UID         integer         not null,
    SID         integer         not null,
    userName    varchar(32)     not null,
    serverName  varchar(32)     not null,
    serviceName varchar(32)     not null,
    orderTime   TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
    appointmentTime datetime    not null,
    PRIMARY KEY (OID),
    foreign key(AID) references assistInfo(AID)
        on delete cascade
        on update cascade,
    foreign key(UID) references accounts(UID)
        on delete cascade
        on update cascade,
    foreign key(SID) references service(SID)
        on delete cascade
        on update cascade
)ENGINE = INNODB;

CREATE TABLE records
(
    RID         integer         not null auto_increment,
    AID         integer         not null,
    UID         integer         not null,
    SID         integer         not null,
    orderTime   TIMESTAMP       not null,
    start       datetime        not null,
    finish      datetime        not null,
    score       decimal(2,1)default '5',
    feedback    VARCHAR(255)DEFAULT 'I think it\'s good',
    primary key (RID),
    foreign key (AID) references assistInfo(AID),
    foreign key (UID) references accounts(UID),
    foreign key (SID) references service(SID)
)ENGINE = INNODB;

create table logs
(
    LID         integer         not null,
    time        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    event       varchar(255)    not null,
    primary key (LID)
)ENGINE = INNODB;

source /var/www/html/servCenter1/code/SQL/init.sql;
source /var/www/html/servCenter1/code/SQL/view.sql;
source /var/www/html/servCenter1/code/SQL/procedure.sql;
source /var/www/html/servCenter1/code/SQL/function.sql;

