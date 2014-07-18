<?php
header("Content-type: text/html; charset=utf-8");
$db=new mysqli('127.0.0.1','gather','123qwe','movie_lines');
if(mysqli_connect_errno())
{
		echo 'can not connect the database';
}
$query='select * from line';
$result=$db->query($query);
$db->close();
$result=$result->fetch_all();
$num=count($result);
$pagenum=ceil($num/10);
function show_line($page)
{
		global $pagenum;
		global $result;
		if($page>$pagenum)
		{
			return false;
		}
		else
		{
			$pagebegin=($page-1)*10;
			$pageend=$page*10;
			for($i=$pagebegin;$i<=$pageend;$i++)
			{
				echo '<div class=\'pic-contentleft\'>';
				echo '<img src=\''.$result[$i][3].'\'/>';
				echo '<div id=\'other\'><div id=\'imgtags\'>'.$result[$i][2];
				echo '<div class=\'imgtags\'>'.$result[$i][1].'</div></div></div>';
				echo '</div>';
			}
		}
}
function rand_line()
{
	global $result;
	global $pagenum;
	$rand_array=range(0,$pagenum);
	shuffle($rand_array);
	$rand_array=array_slice($rand_array,0,10);
	foreach($rand_array as $i)
	{
		echo '<div class=\'pic-contentleft\'>';
		echo '<img src=\''.$result[$i][3].'\'/>';
		echo '<div id=\'other\'><div id=\'imgtags\'>'.$result[$i][2];
		echo '<div class=\'imgtags\'>'.$result[$i][1].'</div></div></div>';
		echo '</div>';
	}
}
function line_api($type=0)
{
	global $result;
	global $num;
	$i=rand(0,$num);
	if($type==0)
	{
		echo json_encode(addslashes($result[$i][1]));
	}
	elseif($type==1)
	{
		$array=array('line'=>stripslashes($result[$i][1]),'name'=>stripslashes($result[$i][2]));
		echo json_encode($array);
	}
}

		
?>
