create database `db_game`;

use `db_game`;

create table if not exists `t_users` (
    `id` int  primary key auto_increment,
    `user_name` varchar(30),
    `score` smallint default 0,
    `creation_date` datetime
);


--drop database db_game;
