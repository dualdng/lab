<?php
include('functions.php');
$id=$_GET['id'];
$result=delete_cate($id);
if(empty($result))
{
		echo 'error';
}
?>

