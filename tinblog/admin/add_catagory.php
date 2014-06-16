<?php
include('../include/mysql_con.php');
$catagory_name=$_GET['catagory_name'];
$result=add_cata($catagory_name);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

