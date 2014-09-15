<!doctypehtml>
<html>
<head>
<meta charset='utf-8' >
<title>Home center|brague</title>
<link rel='stylesheet' type='text/css' href='../style/main.css' />
</head>
<body>
<?php
include('qq_connect_class.php');
include('../include/functions.php');
if(!isset($_COOKIE['openid']))
{
$qq=new qq_connect();
$res=$qq->get_user_info();
$openid=$qq->get_openid();
create_third($res['nickname'],$res['figureurl_qq_1'],$openid);
setcookie('name',$res['nickname'],time()+3600*24*30,'/');
setcookie('openid',$openid,time()+3600*24*30,'/');
//setcookie('name',$res['nickname'],time()-3600,'/');
//setcookie('openid',$openid,time()-3600,'/');
}
?>
<div id='banner'>
		<?php 
		echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbspHome Center';
		?>
</div>

<article class="main_content">
		<div id='page'>
				<div id='article'>
						<div class='title'></div></div><img src='<?php echo $res['figureurl_qq_1'];?>'/><?php echo $res['nickname'];?></div>
		<form id='add_personal' method='POST' action='update_third.php'>
				<input class='third' type='hidden' name='third_id' value='<?php echo $openid;?>'></input>
				<p>Your Email Address Here:</p>
				<input class='third' type='text' name='email' placeholder='    input your email here'></input>
				<p>Your Website Here:</p>
				<input class='third'type='text' name='url' placeholder='    input your website here'></input><br />
				<input class='third_submit' type='submit' name='submit' value='POST'></input>
		</form>
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
