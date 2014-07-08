<div id='banner'>
<?php 
$url=$_SERVER['PHP_SELF'];
$filename=end(explode('/',$url));
		switch($filename)
		{
				case 'single.php':
				echo '<a  id=\'a\' href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp<a id=\'b\' href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</a>&nbsp>&nbsp'.$res[$no][1];
				break;
				case 'index.php':
				break;
				case 'catagory_page.php';
				echo '<a id=\'a\' href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$catagory;
				break;
				case 'tag_page.php';
				echo '<a id=\'a\'  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$tag;
				break;
				case 'archive.php':
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbspArchive';
				break;
				default:
				echo 'Brague';
				break;
		}
 ?>
 </div>

