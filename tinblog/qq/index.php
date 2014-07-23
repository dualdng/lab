<?php
include('../qq_connect_class.php');
$qq_login=new qq_connect();
$res1=$qq_login->get_access_token();
echo $res1.'<br />';
$res2=$qq_login->get_openid();
echo $res2;
?>
