drop database if exists senha;
create database if not exists senha;

use senha

create table login(
    email varchar(170) not null,
    senha varchar(170) not null

);

insert into login values('testandoophpmaile@gmail.com', 'abc');