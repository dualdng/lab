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
$res=show_list();
$num=count($res);
for($i=0;$i<$num;$i++)
{
		/**			$editor=$result->fetch_assoc();   **/
		$editor=$res[$i];
		$no=$res[$i][0];
		/**				echo '<a href=\'editor_article.php?no='.$editor['no'].'\'>'.$editor['title'].'</a><br />';   **/
		echo '<div class=\'list\' id=\'list_'.$no.'\'><a href=\'editor_article.php?no='.$i.'\'>'.$editor[1].'</a></div><div id=\'dlist_'.$no.'\'><a href=\'javascript:delete_article('.$no.')\'>Delete</a></div>';
};
?> 
<?php echo 'editor_post';?>
</body>
</html>
