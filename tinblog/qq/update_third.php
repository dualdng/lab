<?php
include('../include/functions.php');
$msg=array();
$third_id=$_POST['third_id'];
$email=$_POST['email'];
$url=$_POST['url'];
setcookie('email_third',$email,time()+3600*24*30,'/');
setcookie('url',$url,time()+3600*24*30,'/');
$pattern='/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]+/';
if(!preg_match($pattern,$email,$matches))
{
		$msg['error']='0';
		echo json_encode($msg);
		exit;
}
if(strpos('http://',$url,0))
{
		$url='http://'.$url;
}
update_third($email,$url,$third_id);
?>

