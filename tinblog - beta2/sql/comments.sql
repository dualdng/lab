create table b_comments
(
		no int(10) not null,
		post_id int(10) not null primary key auto_increment,
		pre_post_id int(10),
		user_id varchar(50),
		name varchar(20) not null,
		url varchar(50),
		email varchar(50),
		text text,
		time datetime
);

