<?php
include('functions.php');
$title=$_GET['title'];
$keywords=$_GET['keywords'];
$description=$_GET['description'];
$result=set_option($title,$keywords,$description);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

