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
function add_line()
{
		$('#line_content').empty();
		$('#line_content').load('include/add_line.php');
}
function add_new()
{
		var name=$('.movie_name').val();
		var line=$('.movie_line').val();
		var url='include/add_new.php';
		var data={"name":name,"line":line};
		$.ajax({
				url:url,
				type:'POST',
				data:data,
				dataType:'json',
				success:function(data){
						if (data.code=='-1') {
								alert('格式无效');
								exit;
						} else if (data.code=='1') {
								alert('success');
								exit;
						} else if (data.code=='-2') {
								alert('过快');
						}
				}
		})
		return false;
}

