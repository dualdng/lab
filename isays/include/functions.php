<?php
header("Content-type: text/html; charset=utf-8");
$db=new mysqli('127.0.0.1','pic','123qwe','pic');
$query='select url from pic';
$result=$db->query($query);
$result=$result->fetch_all();
$num=count($result);
$pagenum=ceil($num/10);
$db->close();
function show_pic($page)
{
		$url='/isays';
		global $result;
		global $pagenum;
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
					echo '<div class=\'pic-contentleft\'><a href=\''.$url.'/'.$result[$i][0].'\'><img src=\''.$url.'/'.$result[$i][0].'\'/></a></div>';
			}
		}
}
function rand_pic()
{
		$url='/isays';
	global $result;
	global $num;
	$rand_array=range(0,$num);
	shuffle($rand_array);
	$rand_array=array_slice($rand_array,0,10);
	foreach($rand_array as $i)
	{
			echo '<div class=\'pic-contentleft\'><a href=\''.$url.'/'.$result[$i][0].'\'><img src=\''.$url.'/'.$result[$i][0].'\'/></a></div>';
	}
}
?>
