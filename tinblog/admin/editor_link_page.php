<html>
<head>	
<title>
admin
</title>
<meta charset='utf-8' >
<script src='../js/jquery-2.1.0.min.js' ></script>
<script src='main.js'></script> 
</head>
<body>
<?php
include('functions.php');
$result=show_link();
$result=$result->fetch_all();
$num=count($result);
?>
<form method='get' action='editor_link.php'>
<?php for($i=0;$i<$num;$i++)
{
		?>
<div id='link<?php echo $result[$i][0];?>'>
NO:<input  name='no' value='<?php echo $result[$i][0];?>'></input>
NAME:<input name='name' value='<?php echo $result[$i][1];?>'></input>
LINK:<input  name='link' value='<?php echo $result[$i][2];?>'></input>
TITLE:<input  name='title' value='<?php echo $result[$i][3];?>'></input>
</div>
<a id='dlink<?php echo $result[$i][0];?>'href='javascript:delete_link(<?php echo $result[$i][0];?>)'>delete_link</a><br />
<?php };?>
<input name='submit' type='submit'>submit</input>
</form>
<button onclick=add_link()>add_link</button>
<div id='add_link'></div>
</body>
</html>


