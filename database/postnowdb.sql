drop table if exists post;

create table post (
    postId int not null primary key,
    postName varchar(30) not null,
    postTitle varchar(50) not null,
    postMessage varchar(200) not null
);

insert into post values (
    "",
    "Jake Attard",
    "New social media site postnow",
    "Please share and spread the news that postnow is now global launched."
);