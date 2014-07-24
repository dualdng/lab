<!doctypehtml>
<html>
<head>
<meta charset='utf-8'>
</head>
<body>
<?php
include('../git_connect_class.php');
$qq_login=new git_connect();
$res=$qq_login->get_user_info();
print_r($res);
//print_r($res);
?>
</body>
<html>

