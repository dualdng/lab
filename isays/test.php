<?php	
//$data=file_get_contents('http://www.isays.cn/5758.html');
//$data=file_get_contents('http://www.isays.cn/6035.html');
//echo $data;
//debug to txt file
//$a=fopen('1.txt', 'w+');
//fwrite($a, $data);
//fclose($a);
$data2='aaaabbbccc这是间隔ddddeeefff这是间隔gggghhhjjj这里是间隔|kkkklllmmm';
preg_match_all('/gggg(h(hh))jjj|aaaa(bbb)c(cc)|dddd(eee)fff|kkkk(lll)mmm/', $data2,$result);
$result=$result?$result:die('数据没抓到');
var_dump($result);

?>

