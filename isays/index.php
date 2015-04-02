<!doctypehtml>
<?php include('include/functions.php');
if(!isset($_GET['page']))
{
		$page=1;
}
else
{
		$page=$_GET['page'];
}
?>
<html>
<head>
<meta charset='utf-8' >
<link rel='stylesheet' text='text/css' href='style/main.css' />
<link rel='stylesheet' text='text/css' href='phzoom/phzoom.css' />
<script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
<script type='text/javascript' src='js/jquery.masonry.min.js'></script>
<script type='text/javascript' src='phzoom/phzoom.js'></script>
<script type='text/javascript' src='js/main.js'></script>
<script>
$(document).ready(function()
{
		$('.pic-content a').phzoom({});
}
)
</script>
<script>
$(function(){
	var $container = $('.pic-content');
	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : '.pic-contentleft',
			gutterWidth : 20,
			isAnimated: true,
		});
	});
});
</script>

<title>
图片墙|Brague
</title>
</head>
<body>
<div class='pic-content'>
<?php show_pic($page);?>
</div>
<div class='more'>
<?php
echo '<a id=\'loadmore\' href=\'index.php?page='.($page+1).'\'>';
?>
加载更多
</a>
<a href='javascript:rand_pic();'>试试手气</a>
</div>
<footer>
<nav id='navibar'>
<ul>
<li>
<a href='<?php echo 'http://www.uuuuj.com';?>'>Home</a>
</li>
<li>
<a href='#'>Category</a>
<ul>
<li><a href='<?php echo 'http://www.uuuuj.com';?>/category_page?category=LifeTime'>LifeTime</a></li>
<li><a href='<?php echo 'http://www.uuuuj.com';?>/category_page?category=Codes'>Codes</a></li>
<li><a href='<?php echo 'http://www.uuuuj.com';?>/category_page?category=Movies'>Movies</a></li>
<li><a href='<?php echo 'http://www.uuuuj.com';?>/category_page?category=Themes'>Themes</a></li>
</ul>
</li>
<li>
<a href='http://line.uuuuj.com'>Line</a>
<ul>
</ul>
</li>
<li>
<a href='http://blog.uuuuj.com'>Wordpress</a>
<ul>
<li><a href='#'></a></li>
</ul>
</li>
<li>
<div class='foot'>Music <a href='javascript:void(0);'  onclick="document.getElementById('backmusic').play()" >ON&nbsp|</a><a href='javascript:void(0);' onclick="document.getElementById('backmusic').pause()" >&nbspOFF</a><audio id='backmusic'src='#'  loop='loop'></audio>
Powered by <a href='http://www.uuuuj.com'>Brague</a></div>
</ul>
</nav>
</footer>
</body>
</html>

