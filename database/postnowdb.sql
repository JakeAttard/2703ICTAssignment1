create table post (
    postId int not null auto_increment primary key,
    postName varchar(30) not null,
    postTitle varchar(50) not null,
    postMessage varchar(200) not null
);