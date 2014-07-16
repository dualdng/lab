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
$result=show_option();
$result=$result->fetch_all();
?>
<form method='get' action='editor_option.php'>
TITLE:<input name='title' value='<?php echo $result[0][0];?>'></input><br />
KEYWORDS:<input name='keywords' value='<?php echo $result[0][1];?>'></input><br />
DESCRIPTION:<textarea name='description' ><?php echo $result[0][2];?></textarea><br />
<input name='submit' type='submit'></input>
</form>
</body>
</html>


