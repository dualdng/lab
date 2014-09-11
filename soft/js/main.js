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
//		var audio=document.getElementById('music');
		var audio=$('#music')[0];
		var songid=$(this).attr('val');
		var url='../../music/'+songid+'.mp3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		audio.load();//下标0的作用，推测为当前页面有多个audio的时候，选择第几个(the foot '0' means that when there are more than one audio tags ,you should select the element by the foot)
		play_pause();
		return false;

}
)
function play_pause()
{
//		var audio=document.getElementById('music');
		var audio=$('#music')[0];
		if (audio.paused) {
		audio.play();//下标0的作用，推测为当前页面有多个audio的时候，选择第几个(the foot '0' means that when there are more than one audio tags ,you should select the element by the foot)
		$('#button').attr('class','icon-pause');
		duration();
		} else {
				audio.pause();
		$('#button').attr('class','icon-play');
		}
}
function pause()
{
//		var audio=document.getElementById('music');
		var audio=$('#music')[0];
		//js method
//		var audio=document.getElementById('music');
//		audio.pause();
//jquery method
		audio.pause();
}
function duration()
{
		clearInterval(a);
		/** javascript 的写法
		var audio=document.getElementById('music');
		audio.addEventListener('loadedmetadata', function() {
				var length=audio.duration;
		var time=length/60;
		$('#time').text(time);
    });
 **/
		/** jquery 写法**/
		var audio=$('#music')[0];
		$('#music').on('loadedmetadata', function() {
						length_full=audio.duration;
						var time_full=time_transfer(length_full);
						$('#time').text(time_full);
		});

		var a=setInterval(function(){
//		var length_2=$('#music')[0].played.end(0);
		var length_pass=audio.currentTime;
		var time_pass=time_transfer(length_pass);
		$('#time_p').text(time_pass);
		var width=(length_pass/length_full)*600;
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
function time_transfer(length) //s时间格式转换，由秒转换为分+秒
{
		var time=(length/60).toFixed(2);
		var time_str=time.toString();
		var time_array=time_str.split('.');
		var time_m=time_array[0];
		var time_s=Math.round((time_array[1]/100)*60);
		var res=time_m+'分'+time_s+'秒';
		return  res;
}
/**  进度条时间设置 **/
$(document).on('click','#scroll_full',function(e){
		var audio=$('#music')[0];
		var x=e.pageX;
		var left=$('#scroll_full').offset().left;
		x=x-left;
		audio.currentTime=x/600*length_full;
		}) 
function menu_bar()
{
		var a=$('#cool').attr('val');
		if(a==1) {
				$('#cool').attr('class','icon-cool2').attr('val','2');
				$('#menu-bar').css({'display':'block'});
		} else if (a==2) {
				$('#cool').attr('class','icon-cool').attr('val','1');
				$('#menu-bar').css({'display':'none'});
		}

}
function list()
{
		var a=$('#list-menu').attr('val');
		if(a==1) {
				$('#list-menu').attr('class','icon-music').attr('val','2');
				$('#list-music').css({'display':'block'});
		} else if (a==2) {
				$('#list-menu').attr('class','icon-music').attr('val','1');
				$('#list-music').css({'display':'none'});
		}

}

