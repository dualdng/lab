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
include('../include/mysql_con.php');
$result=list_catagory();
$result=$result->fetch_all();
$num=count($result);
?>
<form method='get' action='editor_catagory.php'>
<?php for($i=0;$i<$num;$i++)
{
		?>
<input type='hidden' name='id' value='<?php echo $result[$i][0];?>'></input>
<span id='cata<?php echo $result[$i][0];?>'>CATAGORY:<input name='catagory_name' value='<?php echo $result[$i][1];?>'></input></span>&nbsp&nbsp<a id='dcata<?php echo $result[$i][0];?>'href='javascript:delete_catagory(<?php echo $result[$i][0];?>)'>delete_cata</a><br />
<?php };?>
<input name='submit' type='submit'>submit</input>
</form>
<button onclick=add_catagory()>add_cata</button>
<div id='add_cata'></div>
</body>
</html>


