<?php
include('../include/mysql_con.php');
	$content = '';
	if (!empty($_GET['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = $_GET['content'];
		} else {
			$content = stripslashes($_GET['content']);
		}
	}
$no=$_GET['no'];
$title=$_GET['title'];
$excerpt=$_GET['excerpt'];
$category_id=$_GET['category'];
$tag=$_GET['tag'];
$post_type=$_GET['type'];
if(isset($_GET['status']))
{
$status=$_GET['status'];
}
else
{
		$status=0;
}
$result=update_post($no,$title,$content,$excerpt,$category_id,$tag,$post_type,$status);
if(!empty($result))
{
		header('location:admin_page.php');
}
else
{
		echo 'error!';
}
?>
