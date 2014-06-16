<?php
include('../include/mysql_con.php');
$user_name=$_GET['user_name'];
$user_email=$_GET['user_email'];
$user_des=$_GET['user_des'];
$user_id=$_GET['user_id'];
$result=set_user($user_id,$user_name,$user_email,$user_des);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

