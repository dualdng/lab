<?php
$no=$_GET['no'];
$id=$_GET['id'];
include('header.php');
hit_count($id,$no);
?>
<div id='banner'>
<?php 
$url=$_SERVER['PHP_SELF'];
$filename=end(explode('/',$url));
		switch($filename)
		{
				case 'single.php':
				echo '<a  id=\'a\' href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp<a id=\'b\' href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</a>&nbsp>&nbsp'.$res[$no][1];
				break;
				case 'index.php':
				echo '<a  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>';
				break;
				case 'catagory_page.php';
				echo '<a id=\'a\' href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$catagory;
				break;
				case 'tag_page.php';
				echo '<a id=\'a\'  href=\'http://'.$_SERVER['HTTP_HOST'].'\'>HOME</a>&nbsp>&nbsp'.$tag;
				break;
				default:
				echo 'Brague';
				break;
		}
 ?>
 </div>
<article class="main_content">
<div class='double'><button class='d_button' onclick='javascript:double();'>双栏</button>
<button class='d_button' onclick='javascript:one();'>单栏</button></div>
<div id='page'>
<div id='article'><?php single_post($no);?>
<div id="SOHUCS" sid='<?php echo $no;?>'></div>
<script>
	(function(){
			var appid = 'cyrfJEyS0',
    conf = 'prod_1c7bc3bf2c3ed4a45a7f0bab620800f9';
    var doc = document,
    s = doc.createElement('script'),
    h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
    s.type = 'text/javascript';
    s.charset = 'utf-8';
    s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
    h.insertBefore(s,h.firstChild);
    window.SCS_NO_IFRAME = true;
	})()
</script>
</div>
<div id='side'><?php include('side.php');?></div>
</div>
<div id='share'></div>
</article>
</div>
<?php include('footer.php');?>
