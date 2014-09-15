<?php
$strName=$_POST['name'];
$strEmail=isset($_POST['email'])?$_POST['email']:'none';
$strMy_email=$_POST['my_email'];
$strContent=$_POST['content'].'\nFrom:'.$strEmail;
// 当发送 HTML 电子邮件时，请始终设置 content-type
$strHeaders = "MIME-Version: 1.0" . "\r\n";
$strHeaders .= "Content-type:text/html;charset=utf-8" . "\r\n";
// 更多报头
$strHeaders .= 'From: <'.$strEmail.'>' . "\r\n";
$strResult=mail($strMy_email,$strName,$strContent,$strHeaders)?'Success!':'error!';
echo $strResult;
?>
