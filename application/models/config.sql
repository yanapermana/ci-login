create database tutorial;
use tutorial;

create table login(
	id int primary key not null auto_increment,
	username varchar(255),
	password varchar(255)
);

insert into login values (NULL,'admin','admin');