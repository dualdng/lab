<?php
include('functions.php');
$result=rand_post();
$rows=count($result);
for($i=0;$i<$rows;$i++)
{
		echo	'<a href=\'single.php?no='.$i.'&id='.$result[$i][0].'\'>'.$result[$i][1].'</a><br />';
}
?>
