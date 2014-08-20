<html>
<head>	
<title>
admin
</title>
<meta charset='utf-8' >
<script src='../js/jquery-2.1.0.min.js' ></script>
<script src='js/main.js'></script> 
</head>
<body>
<?php
include('functions.php');
$result=list_category();
$num=count($result);
?>
<form method='get' action='edit_category.php'>
<?php for($i=0;$i<$num;$i++)
{
		?>
<input type='hidden' name='id' value='<?php echo $result[$i][0];?>'></input>
<span id='cate<?php echo $result[$i][0];?>'>CATAGORY:<input name='category_name' value='<?php echo $result[$i][1];?>'></input></span>&nbsp&nbsp<a id='dcate<?php echo $result[$i][0];?>'href='javascript:delete_category(<?php echo $result[$i][0];?>)'>delete_cate</a><br />
<?php };?>
<input name='submit' type='submit'>submit</input>
</form>
<button onclick=add_category()>add_cate</button>
<div id='add_cate'></div>
</body>
</html>


