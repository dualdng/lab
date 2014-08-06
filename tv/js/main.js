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
