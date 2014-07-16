<?php
include('functions.php');
$category_name=$_GET['category_name'];
$result=add_cate($category_name);
if(empty($result))
{
		echo 'error';
}
else
{
		header('location:admin_page.php');
}
?>

