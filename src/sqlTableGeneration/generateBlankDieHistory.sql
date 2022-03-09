drop table if exists DIEROLLHISTORY;
create table DIEROLLHISTORY
(

    dr_id int                not null,
    userId int               not null,
    roomId int               not null,
    sum   int                not null,
    breakdown varchar(100)   not null,
    constraint DIEROLLHISTORY_dr_id_uindex
        unique (dr_id)
);
