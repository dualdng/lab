<?php include('functions.php');?>
<!doctype html>
<html>
<head>
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
<meta http-equiv='content-type' content='text/html;charset=utf-8'>
</head>
<body>
<form class='form'name="article" method="post" action="post_article.php">
title:<input type='text' id='title' name='title'></input><br />
conntent:<textarea id='editor_id' name='content' style='width:700px;height:300px;'></textarea><br />
excerpt:<textarea id='except' name='excerpt'></textarea><br />
tag:<input type='text' id='tag' name='tag'></input><br />
type:<input type='radio' id='type' name='type' value='1'>image</input><br />
<input type='radio' id='type' name='type' value='2'>music</input><br />
<input type='radio' id='type' name='type' value='3'>status</input><br />
<input type='radio' id='type' name='type' value='4'>standard</input><br />
<?php
for($i=1;$i<=show_num();$i++)
{
		$showcate=show_result()->fetch_assoc();
		echo 'category:<input type=\'radio\' id=\'category\' name=\'category\' value=\''.$showcate['id'].'\'>'.$showcate['category_name'].'</input><br />';
}
?>
<input type='radio' id='status' name='status' value='1'>草稿</input><br />
<input type='hidden' id='auther' name='user_id'value='1'></input>
<input type='submit' id='submit' name='submit' value='submit'></input>
</form>
</body>
</html>
