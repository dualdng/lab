<?php
$strName=$_POST['name'];
$strEmail=isset($_POST['email'])?$_POST['email']:'none';
$strMy_email=$_POST['my_email'];
$strContent=$_POST['content'].'\nFrom:'.$strEmail;
// ������ HTML �����ʼ�ʱ����ʼ������ content-type
$strHeaders = "MIME-Version: 1.0" . "\r\n";
$strHeaders .= "Content-type:text/html;charset=utf-8" . "\r\n";
// ���౨ͷ
$strHeaders .= 'From: <'.$strEmail.'>' . "\r\n";
$strResult=mail($strMy_email,$strName,$strContent,$strHeaders)?'Success!':'error!';
echo $strResult;
?>
