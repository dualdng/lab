$(document).ready(function($){
		$('a:has(img)').phzoom({});
/**var H=$('nav').offset().top;*/
		$(window).scroll(function()
			{
				var scroh=$(this).scrollTop();
				if(scroh>=0)
		{
		$('.bg-img:first-child').css({'-webkit-transform':'translateY(-80%)','-moz-transform':'translateY(-80%)','-o-transform':'translateY(-80%)','transform':'translateY(-80%)','border-bottom':'1px solid #ebeaea'});
		$('.bg-img:last-child').css({'-webkit-transform':'translateY(100%)','-moz-transform':'translateY(100%)','-o-transform':'translateY(100%)','transform':'translateY(100%)'});
		$('.main_title').css({'top':'1%'});
		$('.main_title span').html('<span style=\'color:#61a64b\'>L</span>ife <span style=\'color:#66ccff\'>i</span>s <span style=\'color:pink\'>a</span> <span style=\'color:red\'>c</span>olor <span style=\'color:yellow\'>b</span>lind');
		}
			})
/**				var thread_key=58;
				var comval='';
				var res='';
		$.ajax({
				url:'http://api.duoshuo.com/threads/counts.jsonp?short_name=tinty&threads=59&callback=?',
				dataType:'json',
				success:function(data)
		{

				$.each(data.response, function(i, item) {
                     comval += item.comments;
				})
				res=data.response;
				alert(res.comments);
				alert(comval);
				$('span.views').append(data);
		}
		})
		**/
			
		
		/**			else
		  {
		  $('#navibar2').css({'display':'none'})
		  }
		 */
});
window.onload=function(){
			$('.wipe-overlay').css({'width':'0px'});
}
function double(){
		$('#article').css({'width':'70%'})
		$('button:first-child').css({'display':'none'})
		$('button:last-child').css({'display':'block'})
		$('#side').css({'display':'block'})
}
function one(){
		$('#article').css({'width':'100%'})
		$('button:first-child').css({'display':'block'})
		$('button:last-child').css({'display':'none'})
		$('#side').css({'display':'none'})
}

function show_pop_post()
{
		$.ajax
				(
				 {
url:'include/show_pop_post.php',
type:'POST',
success:function(data)
{
$('#most_pop').empty();
$('#most_pop').append(data);
}
}
)
				return false;
				}
function show_rand_post()
{
		$.ajax
				(
				 {
url:'include/show_rand_post.php',
type:'POST',
success:function(data)
{
$('#most_pop').empty();
$('#most_pop').append(data);
}
}
)
				return false;
				}



$(document).on('click','#pagenavi a',function()
				{
				$('#article').fadeOut();
				$('.spinner').css('display','block');
				var	url=$(this).attr('href');
				$.ajax
				(
				 {
url:url,
type:'POST',
success:function(data)
{
$('.spinner').css('display','none');
var result1=$(data).find('.article');
var result2=$(data).find('#pagenavi');
$('#article').empty();
$('#pagenavi').empty();
$('#article').append(result1);
$('#article').fadeIn();
$('#pagenavi').append(result2);
}
})
return false;
})
$(document).on('mouseover','#vote_star a',function()
				{
						var rate=$(this).attr('rate');
						switch(rate){
								case '1':$('#abel').addClass('light');break;
								case '2':$('#abel').addClass('light');$('#baker').addClass('light');break;
								case '3':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');break;
								case '4':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');break;
								case '5':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');$('#easy').addClass('light');break;
								default:void(0);break;
						}
				})
$(document).on('mouseout','#vote_star a',function()
				{
						$('#vote_star a').removeClass('light');

				})
$(document).ready(function($)
				{
						var avery=$('#vote').text();
						//avery!=''?alert(avery):void(0); jquery 的三元运算;
						switch(avery){
								case '1':$('#abel').addClass('light');break;
								case '2':$('#abel').addClass('light');$('#baker').addClass('light');break;
								case '3':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');break;
								case '4':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');break;
								case '5':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');$('#easy').addClass('light');break;
								default:void(0);break;
						}
				}
				)
function vote(rate,id,no)
{
		alert(rate+'and'+id+'and'+no);
		$('#vote').text(5);
							switch(rate){
								case '1':$('#abel').addClass('light');break;
								case '2':$('#abel').addClass('light');$('#baker').addClass('light');break;
								case '3':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');break;
								case '4':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');break;
								case '5':$('#abel').addClass('light');$('#baker').addClass('light');$('#charlie').addClass('light');$('#dog').addClass('light');$('#easy').addClass('light');break;
								default:void(0);break;
						}
	
/**		$.ajax({
				url:'../include/vote.php?no='+no,
				type:'POST',
				success:function(data)
		{
				$('#vote').text(data);
		}
		})
		**/
}

/** ajax ep **/
/**
$.ajax({ 
    url: "Service.php", 
    type: "POST", 
    contentType: "application/json;utf-8", 
    dataType: 'json', 
    cache: false, 
    beforeSend:function(){ 
        $("#showloading").html("<img src=\"images/loading.gif\" />正在请求数据,请稍后..."); 
    }, 
    success: function(data) { 
        var d = eval(data); 
        //处理json,方法略 
    }, 
    error: function(data) { 
        alert(data); 
    } 
});
**/


