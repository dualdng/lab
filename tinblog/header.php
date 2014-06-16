<!doctypehtml>
<?php
include('include/functions.php');
?>
<html>
<title>
<?php show_title();?>
</title>
<head>
<meta name='keywords' content='<?php echo $option[0][1];?>' />
<meta name='description' content='<?php echo $option[0][2];?>' />
<meta charset='utf-8'>
<link rel='stylesheet' href='style/main.css' /> 
<link rel='stylesheet' href='phzoom/phzoom.css' /> 
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="phzoom/phzoom.js"></script>
<script type='text/javascript' src='js/main.js' ></script>
<script type="text/javascript"> 
var scrollFunc=function(e){ 
    ee=e || window.event; 
    var t1=document.getElementById("wheelDelta"); 
    var t2=document.getElementById("detail"); 
    if(e.wheelDelta){//IE/Opera/Chrome 
	
        t1.value=e.wheelDelta; 
		if(t1.value<0)
		{document.getElementById("navibar").style.height="0px";
		}
		else if(t1.value>0)
		{document.getElementById("navibar").style.height="50px";
		}

    }else if(e.detail){//Firefox 
        t2.value=e.detail; 
    } 
} 
/*注册事件*/ 
if(document.addEventListener){ 
    document.addEventListener('DOMMouseScroll',scrollFunc,false); 
}//W3C 
window.onmousewheel=document.onmousewheel=scrollFunc;//IE/Opera/Chrome 
</script> 

</head>
<body>
<?php 
$url=$_SERVER['PHP_SELF'];
$url=explode('/',$url);
$url=end($url);
if($url=='index.php'||$url=='about.php')
{?>
		<header>
				<div id='name'><h1>Brague</h1></div>
				<div id='hitokoto'><h2><?php line_api();?></h2></div>
				<div id='brague_logo'><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>' ><img src='image/brague_logo.png' ?></a></div>

				</header>

				<div class='wipe-overlay'></div>
				<?php };?>
				<div id='mousewheel'><label for="wheelDelta">滚动值:</label>(IE/Opera)<input type="text" id="wheelDelta"/> 
				<label for="detail">滚动值:(Firefox)</label><input type="text" id="detail"/> 
				</div>

<nav id='navibar'>
<ul>
<li>
<a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Home</a>
</li>
<li>
<a href='#'>Catagory</a>
<ul>
<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/catagory_page?cata=LifeTime'>LifeTime</a></li>
<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/catagory_page?cata=Codes'>Codes</a></li>
<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/catagory_page?cata=Movies'>Movies</a></li>
<li><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/catagory_page?cata=Themes'>Themes</a></li>
</ul>
</li>
<li>
<a href='http://line.uuuuj.com'>Line</a>
<ul>
<li><a href='#'></a></li>
<li><a href='#'></a></li>
<li><a href='#'></a></li>
<li><a href='#'></a></li>
<li><a href='#'></a></li>
</ul>
</li>
<li>
<a href='http://blog.uuuuj.com'>Wordpress</a>
<ul>
<li><a href='#'></a></li>
</ul>
</li>
<li>
<div class='foot'>Music <a href='javascript:void(0);'  onclick="document.getElementById('backmusic').play()" >ON&nbsp|</a><a href='javascript:void(0);' onclick="document.getElementById('backmusic').pause()" >&nbspOFF</a><audio id='backmusic'src='http://music.uuuuj.com/dance to the death .mp3'  loop='loop'></audio>
Powered by <a href='http://www.uuuuj.com'>Brague</a></div>
</ul>
</nav>
<div id='banner'>
<?php 
$url=$_SERVER['PHP_SELF'];
$filename=end(explode('/',$url));
		switch($filename)
		{
				case 'single.php':
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp<a href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</a>&nbsp>&nbsp'.$res[$no][1];
				break;
				case 'index.php':
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>';
				break;
				case 'catagory_page.php';
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$catagory;
				break;
				case 'tag_page.php';
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$tag;
				break;
				default:
				echo 'Brague';
				break;
		}
 ?>
 </div>

