<?php 
$category=$_GET['category'];
include('header.php');
?>
<?php // include('banner.php');?>
<article class="main_content">
<h2>CATAGORY:<?php echo $category;?></h2>
<div id='article'><?php cate_list($category);?></div>
<div id='side'><?php include('side.php');?></div>
<div style='clear:both'></div>
<div id='pagenavi'><?php pagenavi_cate($category);?></div>
</article>
<?php include('footer.php');?>

