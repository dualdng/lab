<?php
header("Content-type: text/html; charset=utf-8");
$db=new mysqli('127.0.0.1','gather','d3621201,','movie_lines');
if(mysqli_connect_errno())
{
		echo 'can not connect the database';
}
$query='select * from line order by no desc';
$result=$db->query($query);
$result=$result->fetch_all();
$db->close();
$num=count($result);
$pagenum=ceil($num/10);
function show_line($page) //瀑布流版
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
		echo json_encode(stripslashes($result[$i][1]));
	}
	elseif($type==1)
	{
		$array=array('line'=>stripslashes($result[$i][1]),'name'=>stripslashes($result[$i][2]));
		echo json_encode($array);
	}
}
function show_line_text ($page)
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
				echo '<div class=\'contentleft\'>';
				echo '<div class=\'title\'><span>'.$result[$i][2].'</span></div>';
				echo '<div class=\'line\'>  '.$result[$i][1].'</div>';
				echo '</div>';
			}
		}
}
function rand_line_text()
{
	global $result;
	global $pagenum;
	$rand_array=range(0,$pagenum);
	shuffle($rand_array);
	$rand_array=array_slice($rand_array,0,10);
	foreach($rand_array as $i)
	{
			echo '<div class=\'contentleft\'>';
			echo '<div class=\'title\'><span>'.$result[$i][2].'</span></div>';
			echo '<div class=\'line\'>  '.$result[$i][1].'</div>';
			echo '</div>';
	}
}
function search_line($value)
{
		$db=new mysqli('127.0.0.1','gather','d3621201,','movie_lines');
		if(mysqli_connect_errno())
		{
				echo 'can not connect the database';
		}
		$query='select line,name from line where line like \'%'.$value.'%\' or name like \'%'.$value.'%\'';
		$result=$db->query($query);
		$result=$result->fetch_all();
		$db->close();
		$rows=count($result);
		for($i=0;$i<=$rows;$i++)
		{
				echo '<div class=\'contentleft\'>';
				echo '<div class=\'title\'><span>'.@$result[$i][1].'</span></div>';
				echo '<div class=\'line\'>  '.@$result[$i][0].'</div>';
				echo '</div>';
		}
}
function add_new($name,$line)
{
		$db=new mysqli('127.0.0.1','gather','d3621201,','movie_lines');
		if(mysqli_connect_errno())
		{
				echo 'can not connect the database';
		}
		$query='insert into line values (\'\',\''.$line.'\',\''.$name.'\',\'\')';
		$result=$db->query($query);
		if (empty($result)) {
				echo 'can not insert into the database';
		}

}
//函数 过滤HTML标签，去掉单引号等特殊符号
function remove_html_tags($content) {
$value = strip_tags($content);

return is_array($value) ? array_map('k::htmlspecialchars', $value) : preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array(
'&',
'"',
'<',
'>',
'\''
) , array(
'&amp;',
'&quot;',
'&lt;',
'&gt;',
'’'
) , $value));
}
?>
