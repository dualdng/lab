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
$result=list_link();
$num=count($result);
?>
<form method='get' action='edit_link.php'>
<?php for($i=0;$i<$num;$i++)
{
		?>
<div id='link<?php echo $result[$i][0];?>'>
<label>序号</label> 
<input  class='no' name='no' value='<?php echo $result[$i][0];?>'></input>
<label>名称</label> 
<input name='name' value='<?php echo $result[$i][1];?>'></input>
<label>地址</label> 
<input  name='link' value='<?php echo $result[$i][2];?>'></input>
<label>说明</label> 
<input  name='title' value='<?php echo $result[$i][3];?>'></input>
</div>
<div style='height:10px;'></div>
<a class='button' id='dlink<?php echo $result[$i][0];?>'href='javascript:delete_link(<?php echo $result[$i][0];?>)'>删除</a><br />
<div style='height:10px;'></div>
<?php };?>
<input id='submit'  name='submit' type='submit' value='submit'></input>
</form>
<button onclick=add_link()>新增</button>
<div id='add_link'></div>
</body>
</html>


