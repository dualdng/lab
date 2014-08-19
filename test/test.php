 <?php
$api_back = file_get_contents('http://music.baidu.com/data/music/fmlink?songIds=121911466');
preg_match('/music\W{2}([0-9]*)\W{2}/', $api_back, $id);
echo $id[1];
?>
