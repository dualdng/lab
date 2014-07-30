<?php
require_once('include/functions.php');
$id=isset($_POST['id'])?$_POST['id']:die('none id');
$pre_post_id=isset($_POST['pre_post_id'])?$_POST['pre_post_id']:0;
$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;
$name=isset($_POST['name'])?$_POST['name']:die('none id');
$email=isset($_POST['email'])?$_POST['email']:die('none id');
$url=isset($_POST['url'])?$_POST['url']:die('none id');
if (!empty($_POST['text'])) {
		if (get_magic_quotes_gpc()) {
				$text = $_POST['text'];
		} else {
				$text = addslashes($_POST['text']);
		}
}
post_comments($id,$pre_post_id,$user_id,$name,$email,$url,$text);
?>

