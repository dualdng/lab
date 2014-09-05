function select()
{
		var url=$('#first').attr('val');
		alert(url);
}
$(document).ready(function()
{

		}
)
$(document).on('click','a#list',function(){
		var songid=$(this).attr('val');
		var url='../../music/'+songid+'.mp3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		play();
		return false;

}
)
function play()
{
		$('#music')[0].play();//下标0的作用，推测为当前页面有多个audio的时候，选择第几个(the foot '0' means that when there are more than one audio tags ,you should select the element by the foot)
		setTimeout(duration(),50000);
}
function pause()
{
		//js method
//		var audio=document.getElementById('music');
//		audio.pause();
//jquery method
		$('#music')[0].pause();
}
function duration()
{
		clearInterval(a);
		var length=$('#music')[0].duration;
		var time=length/60;
		$('#time').text(time);
		var a=setInterval(function(){
//		var length_2=$('#music')[0].played.end(0);
		var time_pass=$('#music')[0].currentTime;
		$('#time_p').text(time_pass);
		var width=100/time_pass;
		$('#scroll').css({'width':width});
		},1000);
}
function next()
{
		var val=$('#music').attr('val');
		val=parseInt(val);//将字符串转换为数字，因为从html中获得值都是字符串形式的
		var songid=val+1;
		var url='../../music/'+songid+'.mp3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		play();
}
function pre()
{
		var val=$('#music').attr('val');
		val=parseInt(val);
		var songid=val-1;
		var url='../../music/'+songid+'.mp3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		play();
}
