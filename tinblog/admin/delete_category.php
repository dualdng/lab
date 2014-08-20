<?php
include('functions.php');
$id=$_GET['id'];
$result=delete_cate($id);
if($result=='1')
{
		echo 'error';
}
?>

