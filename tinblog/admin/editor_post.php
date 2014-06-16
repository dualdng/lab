<?php
session_start();
$res=$_SESSION['res'];
$num=$_SESSION['num'];
function show_list()
{
		global $num;
		global $res;
		for($i=0;$i<$num;$i++)
		{
	/**			$editor=$result->fetch_assoc();   **/
				$editor=$res[$i];
				$no=$res[$i][0];
/**				echo '<a href=\'editor_article.php?no='.$editor['no'].'\'>'.$editor['title'].'</a><br />';   **/
				echo '<div class=\'list\' id=\'list_'.$no.'\'><a href=\'editor_article.php?no='.$i.'\'>'.$editor[1].'</a></div><div id=\'dlist_'.$no.'\'><a href=\'javascript:delete_article('.$no.')\'>Delete</a></div>';
		};
};
?>
