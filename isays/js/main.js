function rand_pic()
{
		return:false;
	$.ajax({
		url:'rand_pic.php',
		type:'POST',
		success:function(data)
	{
		$('.pic-contentleft').empty();
		$('.pic-content').append(data);
		$newElems = result.css({ opacity: 0 });//pre-loaded the function masonry()
                    $newElems.imagesLoaded(function(){
                        $('.pic-content').masonry( 'appended', $newElems, true );
                        // 渐显新的内容
                        $newElems.animate({ opacity: 1 });
						});

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
				 $newElems = result.css({ opacity: 0 });
                    $newElems.imagesLoaded(function(){
                        $('.pic-content').masonry( 'appended', $newElems, true );
                        // 渐显新的内容
                        $newElems.animate({ opacity: 1 });
						});
				}
		})
		return false;
});
