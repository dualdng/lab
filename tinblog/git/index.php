<!doctypehtml>
<html>
<head>
<meta charset='utf-8'>
</head>
<body>
<?php
include('../git_connect_class.php');
$qq_login=new git_connect();
$res=$qq_login->get_access_token();
echo $res;
?>
</body>
<html>

