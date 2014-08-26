<html>
<head>	
<title>
admin
</title>
<meta charset='utf-8' >
</head>
<body>
<?php
include('functions.php');
$result=list_option();
?>
<form method='get' action='edit_option.php'>
<div class='right_tag'>Title</div>
<input name='title' value='<?php echo $result[0][0];?>'></input><br />
<div class='right_tag'>Keywords</div>
<input name='keywords' value='<?php echo $result[0][1];?>'></input><br />
<div class='right_tag'>Description</div>
<textarea name='description' ><?php echo $result[0][2];?></textarea><br />
<input id='submit'  name='submit' type='submit'></input>
</form>
</body>
</html>


