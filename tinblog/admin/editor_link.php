<?php
include('../include/mysql_con.php');
$no=$_GET['no'];
$name=$_GET['name'];
$link=$_GET['link'];
$title=$_GET['title'];
$result=set_link($no,$name,$link,$title);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

