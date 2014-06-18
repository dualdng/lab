$(document).ready(function($){
/**var H=$('nav').offset().top;*/
		$(window).scroll(function()
			{
				var scroh=$(this).scrollTop();
				if(scroh>=0)
		{
		$('.bg-img:first-child').css({'-webkit-transform':'translateY(-80%)','border-bottom':'1px solid #ebeaea'});
		$('.bg-img:last-child').css({'-webkit-transform':'translateY(100%)'});
		$('.main_title').css({'-webkit-transform':'translate(0%,-350%)'});
		$('.main_title span').html('<span style=\'color:#61a64b\'>L</span>ife <span style=\'color:#66ccff\'>i</span>s <span style=\'color:pink\'>a</span> <span style=\'color:red\'>c</span>olor <span style=\'color:yellow\'>b</span>lind');
		}
			})
			
		
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
