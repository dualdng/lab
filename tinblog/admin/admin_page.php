<?php session_start();
if(!isset($_SESSION['user_id']))
	{
			header('location:admin.php');
	}
	else
	{
			$user_id=$_SESSION['user_id'];
	}
	?>
<!doctypehtml>
<html>
<head>
<meta charset='utf-8'>
<script src='../js/jquery-2.1.0.min.js' ></script>
<script src='main.js' ></script>
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
<div class='left'>
<ul>
ADMIN
<li>
<a href='javascript:post_article()' >post article</a>
</li>
<li>
<a href='javascript:editor_article()'>edito article</a>
</li>
<li>
<a href='javascript:editor_user()'>edito user</a>
</li>
<li>
<a href='javascript:editor_catagory()'>edito catagory</a>
</li>
<li>
<a href='javascript:editor_option()'>edito option</a>
</li>
<li>
<a href='javascript:editor_link()'>edito link</a>
</li>
</ul>
<ul>
config
<li>
<a href='functions.php?action=delete_cache'>recache</a><!-- action-->
</li>
<li>
<a href='functions.php?action=session_destroy'>Log out</a>
</li>
</ul>
</div>
<div class='right'>
right
</div>
</body>
</html>

