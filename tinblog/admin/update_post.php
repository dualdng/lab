<?php
include('functions.php');
	$content = '';
	if (!empty($_GET['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = $_GET['content'];
		} else {
			$content = addslashes($_GET['content']);
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
$result=update_article($no,$title,$content,$excerpt,$category_id,$tag,$post_type,$status);
if($result=='1')
{
		header('location:admin_page.php');
}
else
{
		echo 'error!';
}
?>
