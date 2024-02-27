CREATE DATABASE account;
USE account;

CREATE TABLE user(
	id int auto_increment not null primary key,
    email varchar(300) not null,
    senha varchar(150) not null,
	nome varchar(150) not null,
    sobrenome varchar(250) not null,
    data_nascimento date not null
)