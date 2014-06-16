<?php
include('../include/mysql_con.php');
$id=$_GET['id'];
$result=delete_cata($id);
if(empty($result))
{
		echo 'error';
}
?>

