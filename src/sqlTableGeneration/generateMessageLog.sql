drop table if exists messageLog;
create table messageLog
(

    ml_id int                not null,
    userId int               not null,
    roomId int               not null,
    message varchar(500)     not null,
    constraint messageLog_ml_id_uindex
        unique (ml_id)
);

