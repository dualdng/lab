<?php
function line_api()//line api
{
		$url='http://line.uuuuj.com/include/line_api.php?type=1';
		$line=file_get_contents($url);
		$line=json_decode($line,true);
		$error=json_last_error();
		echo '<a href=\'http://www.uuuuj.com\' title=\''.$line['name'].'\'>'.$line['line'].'</a>';
}
?>
