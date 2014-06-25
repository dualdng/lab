function rand_pic()
{
	$.ajax({
		url:'rand_pic.php',
		type:'POST',
		success:function(data)
	{
		$('.pic-contentleft').empty();
		$('.pic-contentleft').append(data);
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
				var result=$(data).find('.pic-contentleft');
				var nexturl=$(data).find('#loadmore').attr('href');
				$('.pic-content').append(result);
				$('#loadmore').attr('href',nexturl);

				}
		})
		return false;
});








