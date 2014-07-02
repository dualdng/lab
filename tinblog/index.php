<?php include('header.php');?>
<article class="main_content">
		<div class='double'><button class='d_button' onclick='javascript:double();'>双栏</button>
				<button class='d_button' onclick='javascript:one();'>单栏</button></div>
		<div id='page'>
				<div id='article'><?php post_list();?>
				</div>
				<div id='side'><?php include('side.php');?></div>
				<div style='clear:both'></div>
				<div class="spinner">
						<div class="cube1"></div>
						<div class="cube2"></div>
				</div>
				<div id='pagenavi'><?php pagenavi_index();?></div>
		</div>
</article>
<?php include('footer.php');?>

