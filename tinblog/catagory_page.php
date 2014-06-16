<?php 
$catagory=$_GET['catagory'];
include('header.php');
?>
<article>
<div id='page'>
<h2>&nbsp&nbspCATAGORY:<?php echo $catagory;?></h2>
<div id='article'><?php cata_list($catagory);?></div>
<div id='side'><?php include('side.php');?></div>
<div id='pagenavi'><?php pagenavi_cata($catagory);?></div>
</div>
</article>
<?php include('footer.php');?>

