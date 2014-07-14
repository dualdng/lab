<?php
include('../include/mysql_con.php');
$result=list_category();
$num=$result->num_rows;
function show_num()
{
		global $num;// global 
		return $num;
}
function show_result()
{
		global $result;
		return $result;
}
$action=@$_GET['action'];
if($action=='delete_cache')//delete the cache file
{
		$cache_file='../sql_cache.txt';
		if(unlink($cache_file))
		{
				echo '<script>alert(\'the cache_file has been deleted!\');location.href=\'admin_page.php\';</script>';// alert the confirm window and change the location to admin_page.php
		}
		else
		{
				echo 'can not delete the cache_file';
		}
	}
elseif($action=='session_destroy')//unregister the session!
{
		session_start();
		session_destroy();
		header('location:admin.php');
}
else
{
		echo 'xxxxxxxxxxx';
}
?>

