<?php 
require_once('include/functions.php');
$id=$_POST['id'];
$post_id=isset($_POST['post_id'])?$_POST['post_id']:0;
$user_id=isset($_POST['user_id'])?$_POST['user_id']:0;
comments_fields($id,$post_id,$user_id);
?>

