use blog;
rename table b_catagory to b_category;
alter table b_category change catagory_name category_name varchar(10);
alter table b_article change catagory_id category_id int(2);
