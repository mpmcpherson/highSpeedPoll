drop table if exists updateFlagTable;
create table updateFlagTable
(
    userId int           not null,
    flag   int default 1 not null,
    roomId int           null,
    sessionId int        not null,
    constraint updateFlagTable_userId_uindex
        unique (userId)
);

