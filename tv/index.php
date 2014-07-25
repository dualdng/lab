<?php
include_once('rate/connect.php');

$query=mysql_query("select * from raty where id=1");
$rs=mysql_fetch_array($query);
$aver=$rs['total']/$rs['voter'];
$aver=round($aver,1)*10;
?>
<!doctypehtml>
<html><head><meta charset='utf-8'>
<style type="text/css">
.rate{width:600px; margin:100px auto; color:#51555c; font-size:14px; position:relative; padding:10px 0;}
.rate p {margin:0; padding:0; display:inline; height:40px; overflow:hidden; position:absolute; top:0; left:100px; margin-left:140px;}
.rate p span.s {font-size:36px; line-height:36px; float:left; font-weight:bold; color:#DD5400;}
.rate p span.g {font-size:22px; display:block; float:left; color:#DD5400;}
.big_rate {width:140px; height:28px; text-align:left; position:absolute; top:3px; left:85px; display:inline-block; background:url(star.gif) left bottom repeat-x;}
.big_rate span {display:inline-block; width:24px; height:28px; position:relative; z-index:1000; cursor:pointer; overflow:hidden;}
.big_rate_up {width:140px; height:28px; position:absolute; top:0; left:0; background:url(star.gif) left top;}
#my_rate{ position:absolute; margin-top:40px; margin-left:100px}
#my_rate span{color:#dd5400; font-weight:bold}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	get_rate(<?php echo $aver;?>);
});
function get_rate(rate){
	rate=rate.toString();
	var s;
	var g;
	$("#g").show();
	if (rate.length>=3){
		s=10;	
		g=0;
		$("#g").hide();
	}else if(rate=="0"){
		s=0;
		g=0;
	}else{
		s=rate.substr(0,1);
		g=rate.substr(1,1);
	}
	$("#s").text(s);
	$("#g").text("."+ g);
	$(".big_rate_up").animate({width:(parseInt(s)+parseInt(g)/10) * 14,height:26},1000);
	$(".big_rate span").each(function(){
		$(this).mouseover(function(){
			$(".big_rate_up").width($(this).attr("rate") * 14 );
			$("#s").text($(this).attr("rate"));
			$("#g").text("");
		}).click(function(){
			var score = $(this).attr("rate");
			$("#my_rate").html("您的评分：<span>"+score+"</span>");
			$.ajax({
		       type: "POST",
		       url: "action.php",
		       data:"score="+score,
		       success: function(msg){
				   //alert(msg);
				   if(msg==1){
					   $("#my_rate").html("<span>您已经评过分了！</span>");
				   }else if(msg==2){
					   $("#my_rate").html("<span>您评过分了！</span>");
				   }else{
					   get_rate(msg);
				   }
		       }
	        });
		})
	})
	$(".big_rate").mouseout(function(){
		$("#s").text(s);
		$("#g").text("."+ g);
		$(".big_rate_up").width((parseInt(s)+parseInt(g)/10) * 14);
	})
}
</script>
</head>
<body>
<form id='add' method='POST' action='add.php'>
<input class='name' type='text' name='name' placeholder='xxxxxxxxxxxx'></input>
<input class='url' type='text' name='url' placeholder='xxxxxxxxxxxx'></input>
type:<select>
  <option value ="1">Volvo</option>
  <option value ="2">Saab</option>
  <option value="3">Opel</option>
  <option value="4">Audi</option>
</select>
<input class='submit' type='submit' value='add'></input>
</form>
<form id='search' method='POST' action='search.php'>
<input class='search_content' type='text' name='search_value' placeholder='xxxxxxxxxxxx'></input>
<input class='submit' type='submit' value='submit'></input>
</form>
<div id='result_content'>
</div>
</body>
</html>

