drop table if exists post;
drop table if exists comment;
drop table if exists user;

create table post (
    postId integer not null primary key autoincrement,
    postName varchar(30) not null,
    postTitle varchar(50) not null,
    postMessage varchar(200) not null,
    postCreated datetime not null
);

create table comment (
    commentId integer not null primary key autoincrement,
    commentPostId integer not null,
    commentName varchar(30) not null,
    commentMessage varchar(100) not null,
    constraint commentPostIdFk foreign key (commentPostId) references post (postId)
);

-- This is the post insert
insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please share and spread the news that postnow is now global launched.",
    "31-08-2019 08:00:00"
);

insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please share and spread the news that postnow is now global launched.",
    "31-08-2019 10:00:00"
);

insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please share and spread the news that postnow is now global launched.",
    "01-09-2019 08:00:00"
);

insert into comment values (
    null,
    1,
    "Test comment",
    "Jake Comment Test"
);

insert into comment values (
    null,
    1,
    "Test comment",
    "Jake Comment Test"
);

insert into comment values (
    null,
    2,
    "Test comment",
    "Jake Comment Test"
);

insert into comment values (
    null,
    3,
    "Test comment",
    "Jake Comment Test"
);