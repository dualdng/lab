<?php
include('functions.php');
$no=$_GET['no'];
$name=$_GET['name'];
$link=$_GET['link'];
$title=$_GET['title'];
$result=add_link($no,$name,$link,$title);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

