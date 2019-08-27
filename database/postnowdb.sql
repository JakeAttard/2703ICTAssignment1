drop table if exists post;

create table post (
    postId integer not null primary key autoincrement,
    postName varchar(30) not null,
    postTitle varchar(50) not null,
    postMessage varchar(200) not null,
    postCreated datetime not null
);

-- This is the post inser

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