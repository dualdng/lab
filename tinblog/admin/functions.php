<?php
include('../include/mysql_class.php');
include('../include/config.php');
$db=new mysql_con;
$result=list_category();
$num=$result->num_rows;
function show_num()
{
		global $num;// global 
		return $num;
}
function show_result()
{
		global $result;
		return $result;
}
$action=@$_GET['action'];
if($action=='delete_cache')//delete the cache file
{
		$cache_file='../sql_cache.txt';
		if(unlink($cache_file))
		{
				echo '<script>alert(\'the cache_file has been deleted!\');location.href=\'admin_page.php\';</script>';// alert the confirm window and change the location to admin_page.php
		}
		else
		{
				echo 'can not delete the cache_file';
		}
	}
elseif($action=='session_destroy')//unregister the session!
{
		session_start();
		session_destroy();
		header('location:admin.php');
}
else
{
		echo 'xxxxxxxxxxx';
}
/** database **/
function list_post()
{
		global $db;
		$query='select t1.no,t1.title,t2.user_name,t3.category_name,t1.tag,t1.post_type,t1.create_date,t1.content,t1.excerpt,t1.hit_count from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_category t3 on t1.category_id=t3.id order by no desc';
		$result=$db->query($query);
		return $result;
}
function user_verify($userid,$passwd)
{
		global $db;
		$query='select user_id from b_user where user_name=\''.$userid.'\'and user_paswd=\''.$passwd.'\''; 
		$result=$db->query($query);
		return $result;
}
function list_category()
{
		global $db;
		$query='select * from b_category';
		$result=$db->query($query);
		return $result;
}
function post_article($title,$content,$excerpt,$user_id,$category_id,$tag,$post_type,$status,$hit_count=0)
{
		global $db;
		date_default_timezone_set('Asia/Shanghai');    //把时区设置为中国的上海，避免时间误差，)
		$create_date=date('Y-m-d H:i:s');
		$query='insert into b_article values(\'\',\''.$title.'\',\''.$content.'\',\''.$excerpt.'\',\''.$user_id.'\',\''.$category_id.'\',\''.$tag.'\',\''.$post_type.'\',\''.$create_date.'\',\''.$status.'\',\''.$hit_count.'\')';
		$result=$db->query($query);
		return $result;
}
function editor_post()
{
		global $db;
		$query='select * from b_article order by no asc';
		$result=$db->query($query);	
		return $result;
}
function update_post($no,$title,$content,$excerpt,$category_id,$tag,$post_type,$status)
{
		global $db;
		$query='update b_article set title=\''.$title.'\',content=\''.$content.'\',excerpt=\''.$excerpt.'\',category_id=\''.$category_id.'\',tag=\''.$tag.'\',post_type=\''.$post_type.'\',status=\''.$status.'\'where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
}
function delete_article($no)
{
		global $db;
		$query='delete from b_article where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
}

function show_option()
{
		global $db;
		$query='select * from b_option';
		$result=$db->query($query);
		return $result;
}
function set_option($title,$keywords,$description)
{
		global $db;
		$query='update b_option set title=\''.$title.'\',keywords=\''.$keywords.'\',description=\''.$description.'\'';
		$result=$db->query($query);
		return $result;
}
function show_user()
{
		global $db;
		$query='select user_id,user_name,user_email,user_des from b_user';
		$result=$db->query($query);
		return $result;
}
function set_user($user_id,$user_name,$user_email,$user_des)
{
		global $db;
		$query='update b_user set user_name=\''.$user_name.'\',user_email=\''.$user_email.'\',user_des=\''.$user_des.'\'where user_id=\''.$user_id.'\'';
		$result=$db->query($query);
		return $result;
}
function delete_cate($id)
{
		global $db;
		$query='delete from b_category where id=\''.$id.'\'';
		$result=$db->query($query);
		return $result;
}
function add_cate($category_name)
{
		global $db;
		$query='insert into b_category values(\'\',\''.$category_name.'\')';
		$result=$db->query($query);
		return $result;
}
function set_cate($id,$category_name)
{
		global $db;
		$query='update b_category set category_name=\''.$category_name.'\'where id=\''.$id.'\'';
		$result=$db->query($query);
		return $result;
}	
function delete_link($no)
{
		global $db;
		$query='delete from b_links where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
}
function add_link($no,$name,$link,$title)
{
		global $db;
		$query='insert into b_links values(\''.$no.'\',\''.$title.'\',\''.$link.'\',\''.$name.'\')';
		$result=$db->query($query);
		return $result;
}
function set_link($no,$name,$link,$title)
{
		global $db;
		$query='update b_links set name=\''.$name.'\',link=\''.$link.'\',title=\''.$title.'\'where no=\''.$no.'\'';
		$result=$db->query($query);
		return $result;
}
function show_link()
{
		global $db;
		$query='select no,name,link,title from b_links';
		$result=$db->query($query);
		return $result;
}
?>

