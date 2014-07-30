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
<div id='vote'><?php echo show_rank($id,$no);?></div>
<div id='vote_star'>
<a href='javascript:void(0);' id='abel' class='default' rate='1' onclick='javascript:vote(4,<?php echo $id;?>,<?php echo $no;?>);'>★</a>
<a  href='javascript:void(0);' id='baker'  class='default' rate='2' onclick='javascript:vote(4);'>★</a>
<a  href='javascript:void(0);' id='charlie'  class='default' rate='3' onclick='javascript:vote(6);'>★</a>
<a  href='javascript:void(0);' id='dog'  class='default' rate='4' onclick='javascript:vote(8);'>★</a>
<a  href='javascript:void(0);' id='easy'  class='default' rate='5' onclick='javascript:vote(10);'>★</a>
</div>
<!--comments start-->
<div id='comments'>
<?php show_comments($id);?>
<div class='comments_form'> 
<?php comments_fields($id,0,0);?>
</div>
</div>
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
