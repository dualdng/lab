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
$result=list_user();
?>
<form method='get' action='edit_user.php'>
NAME:<input name='user_name' value='<?php echo $result[0][1];?>'></input><br />
EMAIL:<input name='user_email' value='<?php echo $result[0][2];?>'></input><br />
DESCRIPTION:<textarea name='user_des' ><?php echo $result[0][3];?></textarea><br />
<input type='hidden' name='user_id' value='<?php echo $result[0][0];?>'></input>
<input name='submit' type='submit'></input>
</form>
</body>
</html>


