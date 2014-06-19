<?php 
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
$db=new mysqli('127.0.0.1','pic','d3621201,','pic');
if(mysqli_connect_errno())
{
		echo 'can\'t connect the database';
		exit;
}
$url='http://www.isays.cn/category/picturewall';
$result=file_get_contents($url);
$pattern='/[a-zA-z]+:\/\/www.isays[a-zA-Z .-_\/]*[0-9]+.html/';
preg_match_all($pattern,$result,$matches);
$num=count($matches[0]);
$page_url=json_encode($matches[0]);
$file='url.txt';
file_put_contents($file,$page_url);
for($i=0;$i<$num;$i++)
{
		$url=$matches[0][$i];
		$result=file_get_contents($url);
		$pattern='/[a-z]+:\/\/[a-z0-9.\/]+jpg/';
		preg_match_all($pattern,$result,$matches2);
		$row=count($matches2[0]);
		for($a=0;$a<$row;$a+=3)
		{
				$file='img/'.$a.'.jpg';
				file_put_contents($file,file_get_contents($matches2[0][$a]));
				echo $matches2[0][$a].'<br />';
				$query='insert into pic values(\'\',\'\',\''.$file.'\')';
								$result=$db->query($query);
								if(empty($result))
								{
								echo 'erro insert';
								}
								}
								}
								?>
