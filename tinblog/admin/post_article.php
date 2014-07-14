<?php
include('../include/mysql_con.php');
	$content = '';
	if (!empty($_POST['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = $_POST['content'];
		} else {
			$content = addslashes($_POST['content']);
		}
	}
$title=$_POST['title'];
$excerpt=$_POST['excerpt'];
$category_id=$_POST['category'];
$tag=$_POST['tag'];
$post_type=$_POST['type'];
$user_id=$_POST['user_id'];
if(isset($_POST['status']))
{
$status=$_POST['status'];
}
else
{
		$status=0;
}
$result=post_article($title,$content,$excerpt,$user_id,$category_id,$tag,$post_type,$status);
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
