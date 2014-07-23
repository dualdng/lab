<!doctypehtml>
<html>
<head>
<meta charset='utf-8'>
</head>
<body>
<?php
include('../qq_connect_class.php');
$qq_login=new qq_connect();
$res=$qq_login->get_user_info();
$openid=$qq_login->get_openid();
echo $openid.'<br />';
print_r($res);
?>
</body>
<html>

