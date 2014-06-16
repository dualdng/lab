<?php 
$tag=$_GET['tag'];
include('header.php');
?>
<article>
<div id='page'>
<h2>&nbsp&nbspTAG:<?php echo $tag;?></h2>
<div id='article'>
<?php tag_list($tag);?>
</div>
<div id='side'><?php include('side.php');?></div>
<div id='pagenavi'><?php pagenavi_tag($tag);?></div>
</div>
</article>
<?php include('footer.php');?>
