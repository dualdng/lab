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
?>


<?php
include('banner.php');
?>

<article class="main_content">
<div id='article'><?php single_post($no);?>
<div id='relative'><?php rand_single_post();?></div>
<!--comments start-->
<div id='ajax_comments'>
</div>
<div id='comments'>
<?php include('comments_page.php');?>
</div>
<div class='comments_form'> 
<div class='comments_title'><span class='icon-pencil'>&nbsp&nbspPost your comments here:</span></div>
<?php comments_fields($id,0);?>
</div>
<!--comments end-->
</div>
</article>
<?php include('footer.php');?>
