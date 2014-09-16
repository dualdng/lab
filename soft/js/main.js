$(document).ready(function()
{

		/** 歌曲编号数组 **/
song=new Array(
		'Life Is Like A Cup of Coffee',
		'Promise',
		'Eternal Hope',
		'2003',
		'A Little Story',
		'Arriettys Song',
		'Beyond the memory',
		'Rain of Love',
		'The Righteous Path',
		'Hope',
		'The Ludlows',
		'Dirk Ehlert - Excelsior',
		'DJ Okawari - Flower Dance',
		'DJ Sly - ジブリ？メドレー',
		'Geo- Hey!!! 与你的夏日',
		'Great Morning',
		'KENSHU-幽灵公主',
		'Kiss',
		'Last Tears',
		'Letters From Heave',
		'Mein traum',
		'memory',
		'Mother Earth',
		'My Soul',
		'One Sweetest',
		'oukaitou-桜',
		'Oukaitou-雨空',
		'Rainy Day Reminiscence',
		'Raujika - City of Twilight',
		'Ros - 秋, 彩々',
		'Serenade',
		'Smooth J - The Hill Of Wind',
		'So beautiful',
		'Somewhere',
		'soulmate',
		'Sweet Rain - 为你而奏的旋律',
		'Theme of SSS',
		'Waiting man',
		'風の通り道',
		'花之泪',
		'今でもずっと',
		'今年也想你的我',
		'今日もどこかで',
		'泪色天宆',
		'难道是我哭了',
		'你是唯一',
		'素直になれたら',
		'我们的幸福时光',
		'我喜欢躺在···',
		'无法完成的事',
		'因为你',
		'Cangsta Symphony',
		'Immediate Music - Europa (Electric Romeo )',
		'Ivan Torrent - Human Legacy',
		'John Dreamer - Rise',
		'John Dreamer【End of my Journey 】',
		'Last of the Wilds',
		'Mark Petrie - Willpower',
		'Protectors of the Earth',
		'ready for war （DANIZ）',
		'The Ecstasy Of Gold',
		'Two Steps From Hell - Dragon Rider',
		'Two Steps From Hell - Men Of Honor·',
		'暗战',
		'杀死比尔',
		'只要为你活一天',
		'Determine纯音乐(暴力街区2超经典音乐)',
		'悠久の翼アレンジVer （加长）',
		'DJ电音：萧恒嘉---雷光'
				);
/** 歌曲评分 **/
like=new Array(
				);
		var i=Math.floor(Math.random()*7);
		$('#img img').attr('src','img/'+(i+1)+'.jpg');
		$('#line').load('line.php');
		var i=0;
		var length=song.length;
		for (i;i<25;i++) {
				$('#list_one').append('<li><a id=\'list\' href=\'#\' val=\''+i+'\'>'+song[i]+'</a></li>');
		}
		for (i=25;i<50;i++) {
				$('#list_two').append('<li><a id=\'list\' href=\'#\' val=\''+i+'\'>'+song[i]+'</a></li>');
		}
		for (i=50;i<length;i++) {
				$('#list_three').append('<li><a id=\'list\' href=\'#\' val=\''+i+'\'>'+song[i]+'</a></li>');
		}
/**		var m=song.length;
		var songid=Math.floor(Math.random()*m);
		**/
		var songid=0; //第一首 不随机 放promise
		var url='http://music.uuuuj.com/song/'+song[songid]+'.MP3';
		$('#music').attr('src',url);
		$('#name span').text(song[songid]);
		play_pause();
		shuffle_on=0;
		})
$(document).on('click','a#list',function(){ //歌曲点击播放
//		var audio=document.getElementById('music');
		var audio=$('#music')[0];
		var songid=$(this).attr('val');
		var url='http://music.uuuuj.com/song/'+song[songid]+'.MP3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		var name=$(this).text();
		$('#name').text(name);
		$('#line').load('line.php');
		var a=Math.floor(Math.random()*7);
		$('#img img').attr('src','img/'+(a+1)+'.jpg');
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
function duration()
{
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
		var a=setInterval(function(){
//		var length_2=$('#music')[0].played.end(0);
		var length_pass=audio.currentTime;
		var time_pass=time_transfer(length_pass);
		$('#time_p').text(time_pass);
		var width=(length_pass/length_full)*600;
		$('#scroll').css({'width':width});
		if(audio.readyState) {
				$('.spinner').css({'display':'none'});
		}else {
				$('.spinner').css({'display':'block'});
		}
		/** 判断是否播放结束，如果结束则继续下一首 **/
		if (audio.ended) {
				if(shuffle_on==1){ //判断shuffles是否打开
						var m=song.length;
						var i=Math.floor(Math.random()*m);
						var songid=i;
				} else {
				var val=$('#music').attr('val');
				val=parseInt(val);//将字符串转换为数字，因为从html中获得值都是字符串形式的
				var songid=val+1;
				var songid=(songid>=song.length)?0:songid; 
				}
				var url='http://music.uuuuj.com/song/'+song[songid]+'.MP3';
				$('#music').attr('src',url);
				$('#music').attr('val',songid);
				var i=Math.floor(Math.random()*7);
				$('#img img').attr('src','img/'+(i+1)+'.jpg');
				$('#line').load('line.php');
				$('#name').text(song[songid]);
				play_pause();
		}
		},1000);
		});
}
function next()
{
		var val=$('#music').attr('val');
		val=parseInt(val);//将字符串转换为数字，因为从html中获得值都是字符串形式的
		var songid=val+1;
		var songid=(songid>=song.length)?0:songid; 
		var url='http://music.uuuuj.com/song/'+song[songid]+'.MP3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		var a=Math.floor(Math.random()*7);
		$('#img img').attr('src','img/'+(a+1)+'.jpg');
		$('#line').load('line.php');
		$('#name').text(song[songid]);
		play_pause();
}
function pre()
{
		var val=$('#music').attr('val');
		val=parseInt(val);
		var songid=val-1;
		var songid=(songid<0)?(song.length-1):songid; 
		var url='http://music.uuuuj.com/song/'+song[songid]+'.MP3';
		$('#music').attr('src',url);
		$('#music').attr('val',songid);
		var a=Math.floor(Math.random()*7);
		$('#img img').attr('src','img/'+(a+1)+'.jpg');
		$('#line').load('line.php');
		$('#name').text(song[songid]);
		play_pause();
}
function time_transfer(length) //s时间格式转换，由秒转换为分+秒
{
		var time=(length/60).toFixed(2);
		var time_str=time.toString();
		var time_array=time_str.split('.');
		var time_m=time_array[0];
		time_m=(time_m.length<2)?('0'+time_m):time_m;
		var time_s=Math.round((time_array[1]/100)*60);
		time_s=time_s.toString();
		time_s=(time_s.length<2)?('0'+time_s):time_s;
		var res=time_m+':'+time_s+'';
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
$(document).on('mouseover','#scroll_full',function(){
		$('#scroll_full').addClass('shine_blue');
		})
$(document).on('mouseout','#scroll_full',function(){
		$('#scroll_full').removeClass();
		})

function menu_bar()
{
		var a=$('#cool').attr('val');
		if(a==1) {
				$('#cool').attr('class','icon-cool2').attr('val','0');
				$('#menu-bar').css({'display':'block'});
		} else if (a==0) {
				$('#cool').attr('class','icon-cool').attr('val','1');
				$('#menu-bar').css({'display':'none'});
		}

}
function list()
{
		var a=$('#list-menu').attr('val');
		if(a==1) {
				$('#list-menu').attr('class','icon-close').attr('val','0');
				$('#list-music').css({'display':'block'});
		} else if (a==0) {
				$('#list-menu').attr('class','icon-headphones').attr('val','1');
				$('#list-music').css({'display':'none'});
		}

}
function shuffle()
{
		var a=$('#shuffle').attr('val');
		if(a==1) {
				$('#shuffle').attr('class','icon-close').attr('val','0');
		} else if (a==0) {
				$('#shuffle').attr('class','icon-shuffle').attr('val','1');
		}
		shuffle_on=a;
		var m=song.length;
		var i=Math.floor(Math.random()*m);
}
function building()
{
		alert('施工中!');
}
function list_nav()
{
		var i=$('#list_nav').attr('val');
		if (i==1) {
				$('#list_one').css({'display':'none'});
				$('#list_two').css({'display':'block'});
				$('#list_nav').text('下一页').attr('val','2');
		} else if (i==2) {
				$('#list_one').css({'display':'none'});
				$('#list_two').css({'display':'none'});
				$('#list_three').css({'display':'block'});
				$('#list_nav').text('第一页').attr('val','0');
		} else {
				$('#list_one').css({'display':'block'});
				$('#list_two').css({'display':'none'});
				$('#list_three').css({'display':'none'});
				$('#list_nav').text('下一页').attr('val','1');
		}
}
function likeit()
{
		var val=$('#music').attr('val');
		var origin_like=(typeof(like[val])=='undefined')?0:like[val];
		like[val]=++origin_like;
		alert('施工');
}

