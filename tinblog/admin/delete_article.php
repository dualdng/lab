<?php
include('../include/mysql_con.php');
$no=$_GET['no'];
$result=delete_article($no);
?>
