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
<link rel='stylesheet' text='text/css' href='pic/pic.css' />
<link rel='stylesheet' text='text/css' href='phzoom/phzoom.css' />
<script type='text/javascript' src='jquery-2.1.0.min.js'></script>
<script type='text/javascript' src='pic/jquery.masonry.min.js'></script>
<script type='text/javascript' src='phzoom/phzoom.js'></script>
<script type='text/javascript' src='main.js'></script>
<script>
$(document).ready(function()
{
		$('#content a').phzoom({});
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
</body>
</html>
