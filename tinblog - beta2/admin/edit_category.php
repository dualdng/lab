<?php
include('functions.php');
$catagory_name=$_GET['catagory_name'];
$id=$_GET['id'];
$result=set_cata($id,$catagory_name);
if($result=='1')
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

