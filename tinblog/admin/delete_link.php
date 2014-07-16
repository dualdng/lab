<?php
include('functions.php');
$no=$_GET['no'];
$result=delete_link($no);
if(empty($result))
{
		echo 'error';
}
?>

