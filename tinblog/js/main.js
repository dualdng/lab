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
								case '1':
										$('#abel').addClass('mouser');
										break;
								case '2':
										$('#abel').addClass('mouser');
										$('#baker').addClass('mouser');
										break;
								case '3':
										$('#abel').addClass('mousesr');
										$('#baker').addClass('mouser');
										$('#charlie').addClass('mouser');
										break;
								case '4':
										$('#abel').addClass('mouser');
										$('#baker').addClass('mouser');
										$('#charlie').addClass('mouser');
										$('#dog').addClass('mouser');
										break;
								case '5':
										$('#abel').addClass('mouser');
										$('#baker').addClass('mouser');
										$('#charlie').addClass('mouser');
										$('#dog').addClass('mouser');
										$('#easy').addClass('mouser');
										break;
								default:
										void(0);
										break;
						}
				})
$(document).on('mouseout','#vote_star a',function()
				{
						$('#vote_star a').removeClass('mouser');

				})
function vote(rate,id,no)
{
		alert(rate+'and'+id+'and'+no);
		$('#vote').text(5);
						$('#vote_star a').removeClass('mouser');
							
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

$(document).ready(function($)
				{
						var avery=$('#vote').text();
						//avery!=''?alert(avery):void(0); jquery 的三元运算;
						switch(avery){
								case '1':
										$('#abel').removeClass('light').addClass('light');
										break;
								case '2':
										$('#abel').removeClass('light').addClass('light');
										$('#baker').removeClass('light').addClass('light');
										break;
								case '3':
										$('#abel').removeClass('light').addClass('light');
										$('#baker').removeClass('light').addClass('light');
										$('#charlie').removeClass('light').addClass('light');
										break;
								case '4':
										$('#abel').removeClass('light').addClass('light');
										$('#baker').removeClass('light').addClass('light');
										$('#charlie').removeClass('light').addClass('light');
										$('#dog').removeClass('light').addClass('light');
										break;
								case '5':
										$('#abel').removeClass('light').addClass('light');
										$('#baker').removeClass('light').addClass('light');
										$('#charlie').removeClass('light').addClass('light');
										$('#dog').removeClass('light').addClass('light');
										$('#easy').removeClass('light').addClass('light');
										break;
								default:
										void(0);
										break;
						}
				}
				)

function comments_fields(id,post_id)
{
		$('a.reply_'+post_id).css({'display':'none'});
		$('a.cancel_reply_'+post_id).css({'display':'block'})
		var data={"id":id,"post_id":post_id,"user_id":"0"};
		$('.comments_form_'+post_id).load('comments.php',data);
		$('.comments_form').css({'display':'none'});
}
function cancel_reply(post_id)
{
		$('.comments_form_'+post_id).empty();
		$('a.cancel_reply_'+post_id).css({'display':'none'});
		$('a.reply_'+post_id).css({'display':'block'})
		$('.comments_form').css({'display':'block'});
}
function post_comments()
{
		var id=$(':input[name=\'id\']').val();
		var pre_post_id=$(':input[name=\'pre_post_id\']').val();
		var user_id=$(':input[name=\'user_id\']').val();
		var name=$(':input[name=\'name\']').val();
		var email=$(':input[name=\'email\']').val();
		var url=$(':input[name=\'url\']').val();
		var text=$(':input[name=\'text\']').val();
		var parastr={"id":id,"pre_post_id":pre_post_id,"user_id":user_id,"name":name,"email":email,"url":url,"text":text};
//		var parastr='id='+id+'&pre_post_id='+pre_post_id+'&user_id='+user_id+'&name='+name+'&email='+email+'&url='+url+'&text='+text;
		$.ajax({
				url:'post_comments.php',
				type:'POST',
				data:parastr,
				dataType:'json',
				success:function(data){
						if(data.error==0) {
								alert('邮箱格式错误');
								exit;
						}
						else if (data.error==1) {
								alert('请输入中文');
								exit;
						}
						else if (data.error==3) {
								alert('评论过快');
								exit;
						}
						else if (data.success==-1) {
						$('.comments_field').css({'display':'none'});
						$('.comments_form').css({'display':'none'});
						$('#ajax_comments').html(text);
						$("html,body").animate({scrollTop:$("#ajax_comments").offset().top-100},1000);
						}
								//输出每个root子对象的名称和值 

				}
		})
		return false;
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


