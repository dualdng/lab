create database movie_lines;
create user gather identified by 'd3621201,';
use movie_lines;
create table line (
no int(10) not null auto_increment primary key,
line varchar(200) not null,
name varchar(30),
url varchar(100)
);
grant select,insert,update on movie_lines.* to gather@'%' identified by 'd3621201,';

