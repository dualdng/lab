$(document).ready(function($){
	$(function(){
			
			$('#article a').phzoom({});
var H=$('nav').offset().top;
		$(window).scroll(function()
			{
				var scroh=$(this).scrollTop();
				if(scroh>=H)
		{
		$('#navibar2').css({'display':'none'})
			$('header').fadeOut('slow');
		}
		
		/**			else
		  {
		  $('#navibar2').css({'display':'none'})
		  }
		 */
			})
	})

});
window.onload=function(){
			$('.wipe-overlay').css({'width':'0px'});
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
var result1=$(data).find('#article');
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
