create table b_comments
(
		no int(10) not null,
		post_id int(10) not null primary key auto_increment,
		pre_post_id int(10),
		user_id int(10),
		name varchar(20) not null,
		url varchar(50),
		email varchar(50),
		text text
);
alter table b_article add column vote int(10) default 0;
alter table b_article add column rank int(10) default 0;
/**insert  into b_comments values
(
		'1','1','1','test1','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','2','2','test2','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','3','2','test3','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','4','1','test4','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','5','3','test5','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','6','5','test6','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','7','5','test7','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','8','4','test8','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
insert  into b_comments values
(
		'1','9','1','test9','http://www.uuuuj.com','admin@uuuuj.com','This is a test1,and this is a test1,this is a test1'
);
**/

