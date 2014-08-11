<?php
include('functions.php');
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
add_new($name,$line);
$msg['code']='1';
echo json_encode($msg);
