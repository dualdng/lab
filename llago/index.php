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
<script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
<script type='text/javascript' src='js/main.js'></script>
<title>
		Line|Brague
</title>
</head>
<body>
<div id='banner'>
<?php 
echo '<a  href=\'http://www.uuuuj.com\'>HOME</a>&nbsp>&nbspLines';
?>
</div>

<article class="main_content">
		<div id='page'>
				<div id='article'>
						<div class='title'>
								<form class='search' method='POST' action='search.php' onSubmit='return search();'>
										<input class='search_value' type='text' name='value' placeholder='   支持空格分词'></input>
										<input class='submit' type='submit' value='搜索'></input>
								</form>
						</div>
<div id='line_content'>

						<?php show_line_text($page);?>
				</div>
				</div>
				<div class='more'>
<?php
echo '<a id=\'loadmore\' href=\'index.php?page='.($page+1).'\'>';
?>
								加载更多
						</a>
						<a href='javascript:rand_line();'>试试手气</a>
				</div>
		</div>
</article>
<footer>
		<nav id='navibar'>
				<ul>
						<li>
						<a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Home</a>
						</li>
						<li>
						<a href='#'>Category</a>
						<ul>
								<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/category_page?category=LifeTime'>LifeTime</a></li>
								<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/category_page?category=Codes'>Codes</a></li>
								<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/category_page?category=Movies'>Movies</a></li>
								<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/category_page?category=Themes'>Themes</a></li>
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
								<span><a href='http://www.uuuuj.com/about'>About</a> | <a href='http://www.uuuuj.com/archive.php'>Archive</a></span></div>
						</li>
				</ul>
		</nav>
</footer>
</body>
</html>

