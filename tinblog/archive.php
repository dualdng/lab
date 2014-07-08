<?php include('header.php');?>
<?php include('banner.php');?>
<article class="main_content">
		<div class='double'><button class='d_button' onclick='javascript:double();'>双栏</button>
				<button class='d_button' onclick='javascript:one();'>单栏</button></div>
		<div id='page'>
				<div id='article'><?php show_archive();?>
				</div>
				<div id='side'><?php include('side.php');?></div>
				<div style='clear:both'></div>
				<div class="spinner">
						<div class="cube1"></div>
						<div class="cube2"></div>
				</div>
		</div>
</article>
<?php include('footer.php');?>

