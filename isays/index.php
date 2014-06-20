<!doctypehtml>
<?php include('functions.php');?>
<html>
<head>
<meta charset='utf-8' >
<link rel='stylesheet' text='text/css' href='main.css' />
<link rel='stylesheet' text='text/css' href='phzoom/phzoom.css' />
<script type='text/javascript' src='jquery-2.1.0.min.js'></script>
<script type='text/javascript' src='phzoom/phzoom.js'></script>
<script>
$(document).ready(function()
{
		$('#content a').phzoom({});
}
)
</script>
<title>
</title>
</head>
<body>
<div id='content'><?php show_pic();?></div> 
</body>
</html>
