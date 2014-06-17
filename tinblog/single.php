<?php
$no=$_GET['no'];
$id=$_GET['id'];
include('header.php');
hit_count($id,$no);
?>
<article class="main_content">
<div id='page'>
<div id='article'><?php single_post($no);?>
<!--duoshuo start-->
<div class="ds-thread" data-thread-key="<?php echo $no;?>"
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
</div>
<div id='share'></div>
</article>
</div>
<?php include('footer.php');?>
