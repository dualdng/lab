<?php
include('mysql_class.php');
$db=new mysql_con;
$name=$_POST['name'];
$query='select * from tv where name like \'%'.$name.'%\''; 
$result=$db->fetch_all($query);
$row=count($result);
for($i=0;$i<$row;$i++)
{
		echo 'name:'.$result[$i][1].'<br />';
		echo 'url:'.$result[$i][2].'<br />';
		echo '<a href=\'#\'>≤‚ÀŸ</a><br />';
		switch($result[$i][4])
		case:1;
				echo 


