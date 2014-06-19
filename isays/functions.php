<?php
$db=new mysqli('127.0.0.1','pic','d3621201,','pic');
$query='select url from pic';
$result=$db->query($query);
$result=$result->fetch_all();
function show_pic()
{
		global $result;
		$num=count($result);
		for($i=0;$i<$num;$++)
		{
				echo $result[$i][0];
		}
}
?>
