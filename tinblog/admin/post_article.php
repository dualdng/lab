<?php
include('../include/mysql_con.php');
	$content = '';
	if (!empty($_GET['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = stripslashes($_GET['content']);
		} else {
			$content = $_GET['content'];
		}
	}
$title=$_GET['title'];
$excerpt=$_GET['excerpt'];
$catagory_id=$_GET['catagory'];
$tag=$_GET['tag'];
$post_type=$_GET['type'];
$user_id=$_GET['user_id'];
if(isset($_GET['status']))
{
$status=$_GET['status'];
}
else
{
		$status=0;
}
$result=post_article($title,$content,$excerpt,$user_id,$catagory_id,$tag,$post_type,$status);
if($result)
{
		echo 'success!';
		echo $user_id;
}
else
{
		echo 'error!';
}
?>
