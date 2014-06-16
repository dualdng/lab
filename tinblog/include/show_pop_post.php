<?php
include('mysql_con.php');
$result=most_pop();
$result=$result->fetch_all();
$rows=count($result);
for($i=0;$i<$rows;$i++)
{
		echo	'<a href=\'single.php?no='.$i.'&id='.$result[$i][0].'\'>'.$result[$i][1].'</a><br />';
}
?>
