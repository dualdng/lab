<?php 
include('functions.php');
$no=$_GET['no'];
$res=list_article();
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8' />
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
<form name="article" method="get" action="update_post.php">
<div class='right_tag'>标题</div>
<input type='text' id='title' name='title' value='<?php echo $res[$no][1];?>'></input><br />
<textarea id='editor_id' name='content' ><?php echo stripslashes($res[$no][2]);?></textarea><br />
<div class='right_t'>其他</div> 
<textarea id='except' name='excerpt'><?php echo $res[$no][3];?></textarea><br />
<div class='right_tag'>标签</div>
<div class='other'>
<input type='text' id='tag' name='tag' value='<?php echo $res[$no][6];?>'</input><br />
</div>
<div class='right_tag'>文章样式</div>
<div class='other'>
<input type='radio' id='type' name='type' value='1'<?php if($res[$no][7]==1 ) echo 'checked=\'checked\''?>>image</input>
<input type='radio' id='type' name='type' value='2'<?php if($res[$no][7]==2 ) echo 'checked=\'checked\''?>>music</input>
<input type='radio' id='type' name='type' value='3'<?php if($res[$no][7]==3 ) echo 'checked=\'checked\''?>>status</input>
<input type='radio' id='type' name='type' value='4'<?php if($res[$no][7]==4 ) echo 'checked=\'checked\''?>>standard</input>
</div>
<div class='right_tag'>分类</div>
<div class='other'>
<?php
$cate=list_category();
$num=count($cate);
for($i=0;$i<$num;$i++)
{
		if($res[$no][5]==$cate[$i][0])
		{
		echo '<input type=\'radio\' id=\'category\' name=\'category\' value=\''.$cate[$i][0].'\' checked=\'checked\'>'.$cate[$i][1].'</input>';
		}
		else
		{
		echo '<input type=\'radio\' id=\'category\' name=\'category\' value=\''.$cate[$i][0].'\'>'.$cate[$i][1].'</input>';
		}
}
?>
</div>
<input type='radio' id='status' name='status' value='1'>草稿</input><br />
<input type='submit' id='submit' name='submit' value='submit'></input>
<input type='hidden'id='no' name='no' value='<?php echo $res[$no][0];?>' ></input>
</form>
</body>
</html>
