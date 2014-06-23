function rand_pic()
{
	$.ajax({
		url:'rand_pic.php',
		type:'POST',
		success:function(data)
	{
		$('.content').empty();
		$('.content').append(data);
	}
	})
};
$(document).on('click','#loadmore',function()
{
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data)
				{
				var result=$(data).find('.content');
				var nexturl=$(data).find('#loadmore').attr('href');
				$('#content').append(result);
				$('#loadmore').attr('href',nexturl);
				}
		})
		return false;
});








