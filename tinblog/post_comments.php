<?php
require_once('include/functions.php');
if(isset($_COOKIE['time']))
{
		$msg['error']='3';
		echo json_encode($msg);
		exit;
}

$msg=array();
$id=$_POST['id'];
$pre_post_id=$_POST['pre_post_id'];
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$url=$_POST['url'];
$text=$_POST['text'];
$pattern='/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]+/';
if(!empty($email))
{
		if(isset($_COOKIE['time']))
		{
				$msg['error']='2';
				echo json_encode($msg);
				exit;
		}
		if(!preg_match($pattern,$email,$matches))
		{
				$msg['error']='0';
				echo json_encode($msg);
				exit;
		}
		$pattern='/[^x00-x80]+/';
		if(!preg_match($pattern,$text,$matches))
		{
				$msg['error']='1';
				echo json_encode($msg);
				exit;
		}
		if(!strpos($url,'http://'))
		{
				$url='http://'.$url;
		}
}
$text=remove_html_tags($text);
//if (!get_magic_quotes_gpc()) {
//		$text = addslashes($text);
//}
//
post_comments($id,$pre_post_id,$user_id,$name,$email,$url,$text);
setcookie('name',$name,time()+3600*24*30,'/');
setcookie('email',$email,time()+3600*24*30,'/');
setcookie('url',$url,time()+3600*24*30,'/');
setcookie('time','1',time()+60,'/');
$msg['success']='-1';
echo json_encode($msg);
?>

