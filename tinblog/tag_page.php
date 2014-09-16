<?php 
$tag=$_GET['tag'];
include('header.php');
?>
<?php //include('banner.php');?>
<article class="main_content">
<h2>TAG:<?php echo $tag;?></h2>
<div id='article'>
<?php tag_list($tag);?>
</div>
<div id='pagenavi'><?php pagenavi_tag($tag);?></div>
</article>
<?php include('footer.php');?>
