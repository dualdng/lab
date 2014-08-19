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
<div class='right_tag'>标题</div>
<input type='text' id='title' name='title' placeholder='输入标题'></input><br />
<textarea id='editor_id' name='content' placeholder='输入内容'></textarea><br />
<div class='right_t'>其他</div> 
<textarea id='except' name='excerpt' placeholder='摘要'></textarea><br />
<div class='right_tag'>标签</div>
<div class='other'>
<input type='text' id='tag' name='tag'placeholder='标签用","分隔'></input><br />
</div>
<div class='right_tag'>文章样式</div>
<div class='other'>
<input type='radio' id='type' name='type' value='1'>image</input>
<input type='radio' id='type' name='type' value='2'>music</input>
<input type='radio' id='type' name='type' value='3'>status</input>
<input type='radio' id='type' name='type' value='4'>standard</input>
</div>
<div class='right_tag'>分类</div>
<div class='other'>
<?php
for($i=1;$i<=show_num();$i++)
{
		$showcate=show_result()->fetch_assoc();
		echo '<input type=\'radio\' id=\'category\' name=\'category\' value=\''.$showcate['id'].'\'>&nbsp'.$showcate['category_name'].'&nbsp</input>';
}
?>
</div>
<input type='radio' id='status' name='status' value='1'>草稿</input><br />
<input type='hidden' id='auther' name='user_id'value='1'></input>
<input type='submit' id='submit' name='submit' value='submit'></input>
</form>
</body>
</html>
