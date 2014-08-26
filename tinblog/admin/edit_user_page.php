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
<div class='right_tag'>NAME</div>
<input name='user_name' value='<?php echo $result[0][1];?>'></input><br />
<div class='right_tag'>Email</div>
<input name='user_email' value='<?php echo $result[0][2];?>'></input><br />
<div class='right_tag'>Desc</div>
<textarea name='user_des' ><?php echo $result[0][3];?></textarea><br />
<input type='hidden' name='user_id' value='<?php echo $result[0][0];?>'></input>
<input id='submit'  name='submit' type='submit'></input>
</form>
</body>
</html>


