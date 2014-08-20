<?php
include('functions.php');
session_start();
$userid=$_GET['username'];
$passwd=$_GET['passw'];
$result=user_verify($userid,$passwd);
if(count($result)==0)
{
		echo $userid.'<br />'.$passwd; 
		echo 'invalid user!';
}
else
{
		$userid=$result['user_id'];
		$_SESSION['user_id']=$userid;
		header('location:admin_page.php');
}
?>
