<?php
$id=$_GET['id'];
include('header.php');
$row=count($res);
for($i=0;$i<$row;$i++)//转换文章id为数组res中的数字索引，主要目的：解决通过数组res数字索引区分文章导致的url一直是变化的，现在就可以直接使用id作为文章的划分，同时又保留了数字索引的方便。
{
		if($res[$i][0]==$id)
		{
				$no=$i;
		}
}

hit_count($id,$no);
include('banner.php');
?>
<article class="main_content">
<div class='double'><button class='button arrowleft icon' onclick='javascript:double();'></button>
<button class='button arrowright icon' onclick='javascript:one();'></button></div>
<div id='page'>
<div id='article'><?php single_post($no);?>
<div id='vote'><?php show_rank($id,$no);?></div>
<!--duoshuo start-->
<div class="ds-thread" data-thread-key="<?php echo $id;?>"
data-title="<?php echo $res[$no][1];?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"tinty"};
(function() {
 var ds = document.createElement('script');
 ds.type = 'text/javascript';ds.async = true;
 ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
 ds.charset = 'UTF-8';
 (document.getElementsByTagName('head')[0] 
  || document.getElementsByTagName('body')[0]).appendChild(ds);
 })();
</script>
<!-- duoshuo end -->
</div>
<div id='side'><?php include('side.php');?></div>
<div id='share'></div>
</article>
</div>
<?php include('footer.php');?>
