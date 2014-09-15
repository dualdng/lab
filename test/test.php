<?php
/**
$str_str='[1-3,5-6,8-20周][1,3-8,10周][1周]';
$patterna='/\[([0-9-]*),*([0-9-]*),*([0-9-]*),*周\]/';
$patternb='/\[([0-9,-]*)周\]/';
$res=preg_match_all($patterna,$str_str,$match);
var_dump($match);
**/
header("Content-Type: text/html; charset=utf-8");
$a='物联网规划与组建总学时：80{br}许常青[1-3,5-6,8-10周][1-2节]物联网综合实验室（J4-208）{br}';
preg_match_all('/\[([\d|\-|,]*?)周\]/is', $a, $matches);//匹配出周数集合
var_dump($matches);
$data=empty($matches)?die('匹配周数集合错误'):$matches[1];
$res=array();
foreach ($data as $s){//遍历
	$res[]=explode(',',$s);//拆分周数集合
}
var_dump($res);
$resdata=empty($res[0])?die('拆分集合错误'):$res[0];
$numArray=array();
foreach ($resdata as $s){//将周数全部遍历出来
	if(preg_match('/(\d+)\-(\d+)/', $s,$res)){
		//var_dump($res);
		$start=$res[1];
		$end=$res[2];
		$lv=$end-$start;
		if($lv==1){
			$numArray[]=(int)$start;
			$numArray[]=(int)$end;
		}else{
			$numArray[]=(int)$start;
			while($lv!=1){
				$numArray[]=(int)($end-$lv+1);			
				$lv--;
			}
			$numArray[]=(int)$end;
		}
	}else{
	$numArray[]=(int)$s;
	}
}
var_dump($numArray);

$w=10;//第三周
$notice=array_search($w, $numArray);//array_search如果存在则返回键值，不存在就false
var_dump($notice);
if($notice){
	echo '这周的课程为'.$a;
}else{
	echo '皆大欢喜，木有课';
}

?>
