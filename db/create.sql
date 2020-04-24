create database exercise;
use exercise

create table users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    mail VARCHAR(30),
    name VARCHAR(64),
    password VARCHAR(64)
);
insert into users(id, mail, name, password)values(1, 'php@test.jp', 'PHP', '20200424');
insert into users(id, mail, name, password)values(2, 'java@test.jp', 'Java', '20190424');
insert into users(id, mail, name, password)values(3, 'mysql@test.jp', 'MySQL', '20180424');

create table conversations(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(64),
    body VARCHAR(64),
    date DATETIME
);
insert into conversations(id, user_name, body, date)values(1, 'PHP', 'Hello PHP', now());
insert into conversations(id, user_name, body, date)values(2, 'Java', 'Hello Java', now());
insert into conversations(id, user_name, body, date)values(3, 'MySQL', 'Hello MySQL', now());