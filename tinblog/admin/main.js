/**function post_article()
{
		$.ajax({
				url:'admin_panel.php',
				type:'post',
				success:function(data)
				{
						$('.right').empty();
						result=$(data).find('form');
						$('.right').append(result);
						alert(result);
				}
		})
}
**/
function post_article()
{
		$('.right').load('post_article_page.php');
		$('.right_t').html('发表文章');
};
function editor_article()
{
		$('.right').load('editor_article_page.php');
		$('.right_t').html('编辑文章');
};
function editor_user()
{
		$('.right').load('editor_user_page.php');
		$('.right_t').html('编辑用户');
};
function editor_category()
{
		$('.right').load('editor_category_page.php');
		$('.right_t').html('编辑用户');
};
function editor_option()
{
		$('.right').load('editor_option_page.php');
		$('.right_t').html('网站选项');
};
function editor_link()
{
		$('.right').load('editor_link_page.php');
		$('.right_t').html('友情链接');
};
$(document).on('click','.list a',function()
{
var	url=$(this).attr('href');//notice :the diffrents between '$(this)' and $('.list a') 
		$.ajax(
		{
				type:'POST',
				url:url,//url,//+'&'+'t='+Math.random(),
				success:function(data)
				{
						result=$(data).find('form');//here,i just can't get the 'form' content,so just use the data to achieve the ajax functons
						$('.right').empty();
						$('.right').append(data);
						}
		});
		return false;
});
function delete_article(no)//use the ajax to delete the article
{
		if(confirm('are you sure delete the '+no+'article'))
		{
		$.ajax(
		{
				type:'POST',
				url:'delete_article.php?no='+no,
				success:function(data)
				{
						$('#list_'+no).remove();
						$('#dlist_'+no).remove();
				}
				})
		}
		else
		{
		return false;
		}
}
function delete_category(id)//use the ajax to delete the article
{
		if(confirm('are you sure delete the '+id+'category'))
		{
		$.ajax(
		{
				type:'POST',
				url:'delete_category.php?id='+id,
				success:function(data)
				{
						$('#cate'+id).remove();
						$('#dcate'+id).remove();
				}
				})
		}
		else
		{
		return false;
		}
}
function add_category()//use the ajax to delete the article
{
		$.ajax(
		{
				type:'POST',
				url:'add_category_page.php',
				success:function(data)
				{
						$('#add_cate').append(data);
				}
				})
		}
function delete_link(no)//use the ajax to delete the article
{
		if(confirm('are you sure delete the '+no+'link'))
		{
		$.ajax(
		{
				type:'POST',
				url:'delete_link.php?no='+no,
				success:function(data)
				{
						$('#link'+no).remove();
						$('#dlink'+no).remove();
				}
				})
		}
		else
		{
		return false;
		}
}
function add_link()//use the ajax to delete the article
{
		$.ajax(
		{
				type:'POST',
				url:'add_link_page.php',
				success:function(data)
				{
						$('#add_link').append(data);
				}
				})
		}




