<?php session_start();
if(!isset($_SESSION['user_name']))
	{
			header('location:index.php');
	}
	else
	{
			$user_name=$_SESSION['user_name'];
	}
	?>
<!doctypehtml>
<html>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='style/style.css' />
<script src='../js/jquery-2.1.0.min.js' ></script>
<script src='js/main.js' ></script>
	<link rel="stylesheet" href="editor/themes/default/default.css" />
	<link rel="stylesheet" href="editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="editor/kindeditor.js"></script>
	<script charset="utf-8" src="editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : 'editor/plugins/code/prettify.css',
				uploadJson : 'editor/php/upload_json.php',
				fileManagerJson : 'editor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=article]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=article]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>

<title>
Admin page
</title>
</head>
<body>
<div id='wrapper'>
<div id='banner'>
欢迎:<?php echo $user_name;?>
</div>
<div class='admin'>管理</div>
<menu class='left'>
<ul>
<li>
<a href='javascript:post_article()' >发表文章</a>
</li>
<li>
<a href='javascript:edit_article()'>编辑文章</a>
</li>
<li>
<a href='javascript:edit_user()'>编辑用户</a>
</li>
<li>
<a href='javascript:edit_category()'>编辑分类</a>
</li>
<li>
<a href='javascript:edit_option()'>网站选项</a>
</li>
<li>
<a href='javascript:edit_link()'>友情链接</a>
</li>
</ul>
<ul>
<div class='admin'>选项</div>
<li>
<a href='functions.php?action=delete_cache'>清空缓存</a><!-- action-->
</li>
<li>
<a href='functions.php?action=session_destroy'>登出</a>
</li>
</ul>
</menu>
<article>
<div class='right_t'></div>
<div class='right'></div>
</article>
</div>
</body>
</html>

