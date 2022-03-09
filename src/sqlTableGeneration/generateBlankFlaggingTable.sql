create table updateFlagTable
(
    userId int           not null, -- this doesn't need to be a PK because this is just a flag table; we're not tracking anything
    flag   int default 1 not null,  -- ditto this: technically I'm just using this as a bit field
    roomId int
);

create unique index updateFlagTable_userId_uindex
    on updateFlagTable (userId);

