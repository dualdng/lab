<?php
include('functions.php');
session_start();
$userid=$_GET['username'];
$passwd=$_GET['passw'];
$result=user_verify($userid,$passwd);
$result=$result->fetch_assoc();
$result2=editor_post();
$num=$result2->num_rows;
$res=$result2->fetch_all();
$userid=$result['user_id'];
if(empty($result))
{
		echo $userid.'<br />'.$passwd; 
		echo 'invalid user!';
}
else
{
		$_SESSION['user_id']=$userid;
		$_SESSION['num']=$num;
		$_SESSION['res']=$res;
header('location:admin_page.php');
}
?>
