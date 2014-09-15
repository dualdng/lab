<?php
$thread_key=$_POST['thread_key'];
$short_name='tinty';
$url='http://api.duoshuo.com/threads/counts.json?short_name='.$short_name.'&threads='.$thread_key;
$res=@file_get_contents($url);
$res=json_decode($res,true);
echo  $res['response'][$thread_key]['comments'];
?>

