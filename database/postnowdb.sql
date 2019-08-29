drop table if exists post;
drop table if exists comment;

create table post (
    postId integer not null primary key autoincrement,
    postName varchar(30) not null,
    postTitle varchar(50) not null,
    postMessage varchar(200) not null,
    postCreated datetime not null
);

create table comment (
    commentId integer not null primary key autoincrement,
    commentName varchar(30) not null,
    commentMessage varchar(100) not null,
    commentPostId integer not null references post(postId)
);

-- This is the post insert



insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please shatre and spread the news that postnow is now global launched.",
    "2019-01-01 10:00:00"
);

insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please shatre and spread the news that postnow is now global launched.",
    "2019-01-01 10:00:00"
);

insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please shatre and spread the news that postnow is now global launched.",
    "2019-01-01 10:00:00"
);

insert into post values (
    null,
    "Jake Attard",
    "New social media site postnow",
    "Please shatre and spread the news that postnow is now global launched.",
    "2019-01-01 10:00:00"
);

insert into comment values (
    null,
    5,
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
    4,
    "Test comment",
    "Jake Comment Test"
);