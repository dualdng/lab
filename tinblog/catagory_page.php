<?php 
$catagory=$_GET['catagory'];
include('header.php');
?>
<article class="main_content">
<div class='double'><button class='d_button' onclick='javascript:double();'>双栏</button>
<button class='d_button' onclick='javascript:one();'>单栏</button></div>
<div id='page'>
<h2>&nbsp&nbspCATAGORY:<?php echo $catagory;?></h2>
<div id='article'><?php cata_list($catagory);?></div>
<div id='side'><?php include('side.php');?></div>
<div style='clear:both'></div>
<div id='pagenavi'><?php pagenavi_cata($catagory);?></div>
</div>
</article>
<?php include('footer.php');?>

