<!doctypehtml>
<html>
<body>
<head>
<meta charset='utf-8'>
<title>soft</title>
<script typt='text/javascript' src='js/jquery-2.1.0.min.js'></script>
<script typt='text/javascript' src='js/main.js'></script>
<link rel='stylesheet' type='text/css' href='style/main.css' />
</head>
<div id='menu'>
 <a class='icon-home'></a><br />
<a  class='icon-alarm' val='1' onclick='javascript:void(0)'></a><br />
<a  class='icon-heart' val='1' onclick='javascript:void(0)'></a><br />
 <a id='cool' class='icon-cool' val='1' onclick='javascript:menu_bar()'></a><br />
<div id='menu-bar'>
<a class='icon-first' onclick='javascript:pre();'></a>
<a class='icon-last' onclick='javascript:next();'></a>
<a class='icon-volume-increase' onclick='javascript:volumeup();'></a>
<a class='icon-volume-decrease' onclick='javascript:volumedown();'></a>
<a id='shuffle' class='icon-shuffle' onclick='javascript:shuffle();' val='1'></a>
</div>

<a id='list-menu' class='icon-headphones' val='1' onclick='javascript:list()'></a>
<div id='list-music'>
<ul>
<li><a id='list' href='#' val='1'>矜持</a></li>
<li><a id='list' href='#' val='2'>勿忘心安</a></li>
<li><a id='list' href='#' val='3'>钟无艳</a></li>
<li><a id='list' href='#' val='0'>DreamHigh</a></li>
</ul>
</div>
</div>

</div>
<div id='wrapper'>
<div id='banner'></div>
<div id='img'><img src='img/1.jpg' /><a id='button' class='icon-play' onclick='javascript:play_pause();'></a></div>
<audio preload='preload' id='music'  src='../../music/0.mp3' val='0'> 
</audio>
<div id='border'></div>
<div id='time'>
4:40
</div>
<div id='time_p'>
0:10
</div>
<div id='audio'>
<div id='scroll_full'>
<div id='scroll'>
</div>
</div>
</div>
</div>
<div id='name'>
<span>DreamHigh</span><br />
</div>
<div id='line'>
</div>
</body>
</html>
