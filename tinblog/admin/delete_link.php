<?php
include('functions.php');
$no=$_GET['no'];
$result=delete_link($no);
if($result=='1')
{
		echo 'error';
}
?>

