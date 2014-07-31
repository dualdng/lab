<?php
require_once('include/functions.php');
$msg=array();
$id=$_POST['id'];
$pre_post_id=$_POST['pre_post_id'];
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$pattern='/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]+/';
if(!preg_match($pattern,$email,$matches));
{
		$msg[]='0';
}
$url=$_POST['url'];
if(strpos('http://',$url,0))
{
		$url='http://'.$url;
}
if (!empty($_POST['text'])) {
		if (get_magic_quotes_gpc()) {
				$text = $_POST['text'];
		} else {
				$text = addslashes($_POST['text']);
		}
}
post_comments($id,$pre_post_id,$user_id,$name,$email,$url,$text);
?>

