<?php
include('mysql_class.php');
$a=new mysql_con;
$query='select * from b_option';
$res=$a->list_post($query);
print_r($res) ;
?>

