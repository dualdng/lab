<?php
include('include/functions.php');
$value=$_POST['value'];
$value=explode(' ',$value);
foreach($value as $values)
{
		search_line($values);
}
?>

