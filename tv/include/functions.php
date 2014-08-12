<?php
header("Content-type: text/html; charset=utf-8");
$db=new mysqli('127.0.0.1','root','','tv');
if(mysqli_connect_errno())
{
		echo 'can not connect the database';
}
$query='select * from tv';
$result=$db->query($query);
$result=$result->fetch_all();
$db->close();
$num=count($result);
$pagenum=ceil($num/10);
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
				echo '<div class=\'title\'>  '.@$result[$i][1].'</div>';
				echo '<div class=\'line\'>  '.@$result[$i][2].'</div>';
				echo '<div id=\'vote\'>'.show_rank(@$result[$i][0],$i).'</div>';
				echo '<div class=\'vote_star\'>';
				echo '<a href=\'javascript:void(0);\' class=\'abel\' class=\'default\' rate=\'1\' onclick=\'javascript:vote(4,'.@$result[$i][0].','.$i.');\'>★</a>';
				echo '<a href=\'javascript:void(0);\' class=\'baker\'  class=\'default\' rate=\'2\' onclick=\'javascript:vote(4);\'>★</a>';
				echo '<a href=\'javascript:void(0);\' class=\'charlie\'  class=\'default\' rate=\'3\' onclick=\'javascript:vote(6);\'>★</a>';
				echo '<a href=\'javascript:void(0);\' class=\'dog\'  class=\'default\' rate=\'4\' onclick=\'javascript:vote(8);\'>★</a>';
				echo '<a href=\'javascript:void(0);\' class=\'easy\'  class=\'default\' rate=\'5\' onclick=\'javascript:vote(10);\'>★</a>';
				echo '</div>';
				echo '</div>';
				var int a=10;
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
			echo '<div class=\'title\'>  '.$result[$i][2].'</div>';
			echo '<div class=\'line\'>  '.$result[$i][1].'</div>';
			echo '<div id=\'vote\'>'.show_rank($result[$i][0],$i).'</div>';
			echo '<div id=\'vote_star\'>';
			echo '<a href=\'javascript:void(0);\' id=\'abel\' class=\'default\' rate=\'1\' onclick=\'javascript:vote(4,'.$result[$i][0].','.$i.');\'>★</a>';
			echo '<a href=\'javascript:void(0);\' id=\'baker\'  class=\'default\' rate=\'2\' onclick=\'javascript:vote(4);\'>★</a>';
			echo '<a href=\'javascript:void(0);\' id=\'charlie\'  class=\'default\' rate=\'3\' onclick=\'javascript:vote(6);\'>★</a>';
			echo '<a href=\'javascript:void(0);\' id=\'dog\'  class=\'default\' rate=\'4\' onclick=\'javascript:vote(8);\'>★</a>';
			echo '<a href=\'javascript:void(0);\' id=\'easy\'  class=\'default\' rate=\'5\' onclick=\'javascript:vote(10);\'>★</a>';
			echo '</div>';
			echo '</div>';
	}
}
function search_line($value)
{
		$db=new mysqli('127.0.0.1','root','','tv');
		if(mysqli_connect_errno())
		{
				echo 'can not connect the database';
		}
		$query='select * from tv where name like \'%'.$value.'%\'';
		$result=$db->query($query);
		$result=$result->fetch_all();
		$db->close();
		$rows=count($result);
		for($i=0;$i<=$rows;$i++)
		{
				echo '<div class=\'contentleft\'>';
				echo '<div class=\'title\'>  '.@$result[$i][2].'</div>';
				echo '<div class=\'line\'>  '.@$result[$i][1].'</div>';
				echo '</div>';
		}
}
function show_rank($id,$no)
{
		global $db;
		global $result;
		$goal=@round($result[$no][4]/$result[$no][5],1);//四舍五入去整，小数点一位
		$avery=round($goal/2,0);
		return $avery;
}
function update_rank($id,$no,$goal)
{
		global $db;
		global $result;
		$result[$no][5]++;
		$query='update b_article set vote=\''.$result[$no][5].'\',rank=\''.$goal.'\'where no=\''.$id.'\'';
		$db->_update($query);
}

?>
