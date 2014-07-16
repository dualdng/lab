<?php 
header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
$db=new mysqli('127.0.0.1','pic','123qwe','pic');
if(mysqli_connect_errno())
{
		echo 'can\'t connect the database';
		exit;
}
$url='http://www.isays.cn/category/picturewall';
$result=file_get_contents($url);
/**$pattern='/[a-zA-z]+:\/\/www.isays[a-zA-Z .-_\/]*[0-9]+.html/';**/
$pattern='/[0-9]+.html/';
preg_match_all($pattern,$result,$matches);
$arr_url=array();
$arr_diff=array();
$arr_url=$matches[0];
$arr_url=array_unique($arr_url);
sort($arr_url);
foreach($arr_url as $key=>$value)
{
		$arr_url[$key]='http://www.isays.cn/'.$value;
}
$file='url.txt';//判断是否已经被获取过
$res=file_get_contents($file);
if($res)
{
		$res=json_decode($res);
		$arr_url=array_diff($arr_url,$res);
		if(empty($arr_url))//判断数组是否为空
		{
				echo 'Everything is up to date';
				exit;
		}
		$page_url=json_encode(array_merge($arr_url,$res));
		file_put_contents($file,$page_url,FILE_APPEND);
		$num=count($arr_url);
		for($i=0;$i<$num;$i++)
		{
				$url=$arr_url[$i];
				$result=file_get_contents($url);
				$pattern='/[a-z]+:\/\/[a-z0-9.\/]+jpg/';
				preg_match_all($pattern,$result,$matches2);
				$arr_img=array();
				$arr_img=$matches2[0];
				$arr_img=array_unique($arr_img);
				sort($arr_img);
				$row=count($arr_img);
				for($a=0;$a<$row;$a++)
				{
						$file='img/'.basename($arr_img[$a]);
						file_put_contents($file,file_get_contents($arr_img[$a]));
						echo $arr_img[$a].'<br />';
						$query='insert into pic values(\'\',\'\',\''.$file.'\')';
						$result=$db->query($query);
						if(empty($result))
						{
								echo 'erro insert';
						}
				}
		}
}
else
{
		$page_url=json_encode($arr_url);
		file_put_contents($file,$page_url,FILE_APPEND);
		$num=count($arr_url);
		for($i=0;$i<$num;$i++)
		{
				$url=$arr_url[$i];
				$result=file_get_contents($url);
				$pattern='/[a-z]+:\/\/[a-z0-9.\/]+jpg|[a-z]+:\/\/images.isays.cn[a-z0-9.\/]+/';
				preg_match_all($pattern,$result,$matches2);
				$arr_img=array();
				$arr_img=$matches2[0];
				$arr_img=array_unique($arr_img);
				sort($arr_img);
				$row=count($arr_img);
				for($a=0;$a<$row;$a++)
				{
						$file='img/'.basename($arr_img[$a]);
						file_put_contents($file,file_get_contents($arr_img[$a]));
						echo $arr_img[$a].'<br />';
						$query='insert into pic values(\'\',\'\',\''.$file.'\')';
						$result=$db->query($query);
						if(empty($result))
						{
								echo 'erro insert';
						}
				}
		}
}
?>
