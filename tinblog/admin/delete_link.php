<?php
include('../include/mysql_con.php');
$no=$_GET['no'];
$result=delete_link($no);
if(empty($result))
{
		echo 'error';
}
?>

