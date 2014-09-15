<?php
include('functions.php');
$no=$_GET['no'];
$name=$_GET['name'];
$link=$_GET['link'];
$title=$_GET['title'];
$result=set_link($no,$name,$link,$title);
if($result=='1')
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

