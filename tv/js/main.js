function rand_line()
{
	$.ajax({
		url:'rand_line.php',
		type:'POST',
		success:function(data)
	{
		$('#line_content').empty();
		$('#line_content').append(data);

	}
	})
};
function search()
{
		var value=$('.search_value').val();
		var parstr={"value":value};
		$.ajax({
				url:'search_line.php',
				type:'POST',
				data:parstr,
				success:function(data)
		{
				$('#line_content').empty();
				$('#line_content').append(data);
		}
		})
		return false;
}
$(document).on('click','#loadmore',function()
{
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data)
				{
				var result=$(data).find('#article');
				var nexturl=$(data).find('#loadmore').attr('href');
				$('#article').empty();
				$('#article').append(result);
				$('#loadmore').attr('href',nexturl);
				}
		})
		return false;
});
$(document).on('mouseover','.vote_star a',function()
				{
						var rate=$(this).attr('rate');
						switch(rate){
								case '1':
										$('.abel').addClass('mouser');
										break;
								case '2':
										$('.abel').addClass('mouser');
										$('.baker').addClass('mouser');
										break;
								case '3':
										$('.abel').addClass('mousesr');
										$('.baker').addClass('mouser');
										$('.charlie').addClass('mouser');
										break;
								case '4':
										$('.abel').addClass('mouser');
										$('.baker').addClass('mouser');
										$('.charlie').addClass('mouser');
										$('.dog').addClass('mouser');
										break;
								case '5':
										$('.abel').addClass('mouser');
										$('.baker').addClass('mouser');
										$('.charlie').addClass('mouser');
										$('.dog').addClass('mouser');
										$('.easy').addClass('mouser');
										break;
								default:
										void(0);
										break;
						}
				})
$(document).on('mouseout','.vote_star a',function()
				{
						$('.vote_star a').removeClass('mouser');

				})
function vote(rate,id,no)
{
		alert(rate+'and'+id+'and'+no);
		$('#vote').text(5);
						$('.vote_star a').removeClass('mouser');
							
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

