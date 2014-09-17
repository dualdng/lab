<?php 
$id=$_GET['id'];
require_once('include/functions.php');
echo '<span class=\'icon-neutral\'>&nbspHere comes the comments:</span><br />';
show_comments($id);
echo '<div id=\'pagenavi_comments\'>';
pagenavi_comments($id);
echo '</div>';
?>

