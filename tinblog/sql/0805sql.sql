alter table b_article add column vote int(10) not null default 0 comment '评分字段次数';
alter table b_article add column rank int(10) not null default 0 comment '评分字段总分';
create table b_third (
user_id varchar(50) not null primary key,
name varchar(30) not null,
email varchar(50),
url varchar(50),
avatar varchar(100),
third_id varchar(50) not null);
