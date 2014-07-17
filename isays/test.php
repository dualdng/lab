<?php	
$data=file_get_contents('http://www.isays.cn/5758.html');
//$data=file_get_contents('http://www.isays.cn/6035.html');
//echo $data;
//debug to txt file
$a=fopen('1.txt', 'w+');
fwrite($a, $data);
fclose($a);
preg_match_all('/<a .*class="fancybox".*>(<img src=".*"\/>)<\/a>/', $data,$result);
//preg_match_all('/<img class="alignnone" src="([a-z]+:\/\/[a-zA-Z0-9.\/]*)/', $data,$result);
$result=$result?$result:die('数据没抓到');
var_dump($result);
?>

