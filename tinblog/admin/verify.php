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
		$user_name=$result['user_name'];
		$_SESSION['user_name']=$user_name;
		header('location:admin_page.php');
}
?>
