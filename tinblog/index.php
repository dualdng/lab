<?php include('header.php');?>
<article class="main_content">
<div id='page'>
<div id='article'><?php post_list();?>
</div>
<div id='side'><?php include('side.php');?></div>
<div class="spinner">
<div class="cube1"></div>
<div class="cube2"></div>
</div>
<div id='pagenavi'><?php pagenavi_index();?></div>
</div>
</article>
<?php include('footer.php');?>

