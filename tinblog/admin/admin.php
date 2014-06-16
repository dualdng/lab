<!doctypehtml>
<html>
<title>
admin
</title>
<head>
<meta charset='utf-8' >
<link rel='stylesheet' href='style.css' />
</head>
<body>
<form action='verify.php' method='get'>
<div id='Brague'><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Brague</a></div>
<input id='userid' type='text' name='username'></input><br />
<input id='passw' type='text' name='passw'></input>
<span id='commit'><input id='submit' type='submit' name='submit' value='submit'></input></span>
</form>
</body>
