<?php
include('functions.php');
$title=$_GET['title'];
$keywords=$_GET['keywords'];
$description=$_GET['description'];
$result=set_option($title,$keywords,$description);
if($result=='1')
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

