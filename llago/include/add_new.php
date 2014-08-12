<?php
include('functions.php');
if(isset($_COOKIE['time']))
{
		$msg['code']='-2';
		echo json_encode($msg);
		exit;
}
$msg=array();
$pattern='/[a-zA-z]+:\/\/[^\s]*/';
$result=preg_match($pattern,$_POST['name'],$matches);
if($result===1) {
		$msg['code']='-1';
		echo json_encode($msg);
		exit;
}
$result=preg_match($pattern,$_POST['line'],$matches);
if($result===1) {
		$msg['code']='-1';
		echo json_encode($msg);
		exit;
}
$line=$_POST['line'];
$pattern='/《|》/';
$result=preg_match($pattern,$_POST['name'],$matches);
if($result===1) {
		$name=$_POST['name'];
} else {
		$name='《'.$_POST['name'].'》';
}
$name=remove_html_tags($name);
$line=remove_html_tags($line);
add_new($name,$line);
setcookie('time','1',time()+60);
$msg['code']='1';
echo json_encode($msg);
