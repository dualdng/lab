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
		echo '<div class=\'list\' id=\'list_'.$res[$i][0].'\'><a href=\'edit_article.php?no='.$i.'\'>'.$res[$i][1].'</a></div><div id=\'dlist_'.$res[$i][0].'\'><a href=\'javascript:delete_article('.$res[$i][0].')\'>Delete</a></div>';
};
?> 
<?php echo 'editor_post';?>
</body>
</html>
