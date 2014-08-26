<!doctypehtml>
<html>
<head>
<?php include('functions.php');?>
<meta charset='utf-8' />
<title>
admin_page
</title>
</head>
<body>
<?php 
$res=list_article();
$num=count($res);
for($i=0;$i<$num;$i++)
{
		echo '<div class=\'list\' id=\'list_'.$res[$i][0].'\'>'.$res[$i][1].'</div>';
		echo '<div class=\'dlist\' id=\'dlist_'.$res[$i][0].'\'><a class=\'button\' id=\'edit\' href=\'edit_article.php?no='.$i.'\'>编辑</a><a class=\'button\' href=\'javascript:delete_article('.$res[$i][0].')\'>删除</a></div>';
};
?> 
</body>
</html>
