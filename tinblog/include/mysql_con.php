<?php
function list_post()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		}
		$query='select t1.no,t1.title,t2.user_name,t3.catagory_name,t1.tag,t1.post_type,t1.create_date,t1.content,t1.excerpt,t1.hit_count from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_catagory t3 on t1.catagory_id=t3.id order by no desc';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function user_verify($userid,$passwd)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select user_id from b_user where user_name=\''.$userid.'\'and user_paswd=\''.$passwd.'\''; 
		$result=$db->query($query);
		return $result;
		$db->close();
}
/**function post_list($pagesize,$currentpageid)
{
		global $db;
		$query='select t1.no,t1.title,t2.user_name,t3.catagory_name,t1.tag,t1.post_type,t1.create_date,t1.content,t1.excerpt from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_catagory t3 on t1.catagory_id=t3.id order by no desc limit '.($currentpageid-1)*$pagesize.','.$pagesize;
		$result=$db->query($query);
		return $result;
		$db->close();
}
function show_post($no)
{
		global $db;
		$query='select t1.title,t2.user_name,t3.catagory_name,t1.tag,t1.post_type,t1.create_date,t1.content from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_catagory t3 on t1.catagory_id=t3.id where t1.no=\''.$no.'\''; 
		$result=$db->query($query);
		return $result;
		$db->close();
}
function page_amount()
{
		global $db;
		$query='select count(*) from b_article';
		$result=$db->query($query);
		return $result;
		$db->close();
}
**/
function list_catagory()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select * from b_catagory';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function post_article($title,$content,$excerpt,$user_id,$catagory_id,$tag,$post_type,$status,$hit_count=0)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		date_default_timezone_set('Asia/Shanghai');    //把时区设置为中国的上海，避免时间误差，)
		$create_date=date('Y-m-d H:i:s');
		$query='insert into b_article values(\'\',\''.$title.'\',\''.$content.'\',\''.$excerpt.'\',\''.$user_id.'\',\''.$catagory_id.'\',\''.$tag.'\',\''.$post_type.'\',\''.$create_date.'\',\''.$status.'\',\''.$hit_count.'\')';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function editor_post()
{
$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
if(mysqli_connect_errno())
{
echo 'can\'t connect the database;';
};
		$query='select * from b_article order by no asc';
		$result=$db->query($query);	
		return $result;
		$db->close();
}
function update_post($no,$title,$content,$excerpt,$catagory_id,$tag,$post_type,$status)
{
$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
if(mysqli_connect_errno())
{
		echo 'can\'t connect the database;';
};
		$query='update b_article set title=\''.$title.'\',content=\''.$content.'\',excerpt=\''.$excerpt.'\',catagory_id=\''.$catagory_id.'\',tag=\''.$tag.'\',post_type=\''.$post_type.'\',status=\''.$status.'\'where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
/**function tag_list($tag)
{
		global $db;	
		$query='select no,title from b_article where tag like \'%'.$tag.'%\'';
		$result=$db->query($query);
		return $result;
		$db->close();				
}**/
/*function catagory_list($catagory)
{
		global $db;	
		$query='select no,title from b_article where catagory_id = (select id from b_catagory where catagory_name = \''.$catagory.'\')';
		$result=$db->query($query);
		return $result;
		$db->close();
}
**/
function delete_article($no)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='delete from b_article where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function update_hit_count($id,$count)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='update b_article set hit_count=\''.$count.'\'where no=\''.$id.'\'';
		$result=$db->query($query);
		$db->close();
}
function most_pop()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select no,title from b_article order by hit_count desc limit 0,5';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function rand_post()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select no,title from b_article order by rand() limit 0,5';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function tag_num($tag)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select count(*) from b_article where tag like\'%'.$tag.'%\'';
		$result=$db->query($query);
		$result=$result->fetch_all();
		return $result[0][0];
		$db->close();
}
function show_option()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select * from b_option';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function set_option($title,$keywords,$description)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='update b_option set title=\''.$title.'\',keywords=\''.$keywords.'\',$description=\''.$description.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function show_user()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select user_id,user_name,user_email,user_des from b_user';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function set_user($user_id,$user_name,$user_email,$user_des)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='update b_user set user_name=\''.$user_name.'\',user_email=\''.$user_email.'\',user_des=\''.$user_des.'\'where user_id=\''.$user_id.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function delete_cata($id)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='delete from b_catagory where id=\''.$id.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function add_cata($catagory_name)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='insert into b_catagory values(\'\',\''.$catagory_name.'\')';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function set_cata($id,$catagory_name)
{

        $db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='update b_catagory set catagory_name=\''.$catagory_name.'\'where id=\''.$id.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}	
function delete_link($no)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='delete from b_links where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function add_link($no,$name,$link,$title)
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='insert into b_links values(\''.$no.'\',\''.$title.'\',\''.$link.'\',\''.$name.'\')';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function set_link($no,$name,$link,$title)
{

        $db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='update b_links set name=\''.$name.'\',link=\''.$link.'\',title=\''.$title.'\'where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
		$db->close();
}
function show_link()
{
		$db=new mysqli('127.0.0.1','blog','d3621201,','blog');
		if(mysqli_connect_errno())
		{
				echo 'can\'t connect the database;';
		};
		$query='select no,name,link,title from b_links';
		$result=$db->query($query);
		return $result;
		$db->close();
}

?>
