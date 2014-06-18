<?php $userinfo=show_user();
?>
<div class='widget'><div class='widget_tag'><span class='icon-heart'>&nbspABOUT AUTHOR</span></div>
<img src='<?php get_avatar($userinfo[0][2],120);?>' />
<div id='widget'>
<p><?php echo $userinfo[0][3];?></p>
</div>
</div>
<div class='widget'>
<div class='widget_tag'><span class='icon-tag'>&nbspTAGS</span></div>
<div id='widget'>
<?php tag_cloud();?>
</div>
</div>
<div class='widget'>
<div class='widget_tag'><span class='icon-map'>&nbsp</span><a href='javascript:show_rand_post();'>RAND</a>&nbsp|&nbsp<a href='javascript:show_pop_post();'>MOST</a></div>
<div id='widget'>
<div id='most_pop'><?php rand_article();?></div>
</div>
</div>
<div class='widget'>
<div class='widget_tag'><span class='icon-flag'>&nbsp</span>CATAGORY</div>
<div id='widget'>
<?php cata_cloud();?>
</div>
</div>
<div class='widget'>
<div class='widget_tag'><span class='icon-star'>&nbsp</span>LINKS</div>
<div id='widget'>
<ul>
<?php links();?>
</ul>
<div style='clear:both'></div>
</div>
</div>

