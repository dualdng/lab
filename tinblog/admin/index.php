<!doctypehtml>
<html>
<title>
admin
</title>
<head>
<style>
*{margin:0;padding:0;}
body{background:url(../image/bg_admin.jpg) no-repeat; background-size:100%;margin:0 auto;width:100%;font-family:"Maison Neue Book",Helvetica,华文细黑,Arial;font-size:14px;}
form{margin:0 auto;color:#fff;width:200px;margin-top:15%;text-align:center;}
#Brague{width:200px;text-align:center;margin-bottom:7%;}
#Brague a{color:#fff;font-size:32px;text-decoration:none;}
input{margin-bottom:2%;}
#commit{text-align:center;width:200px;display:block;margin-top:2%;}
#submit{
    border-style:none;
    padding:8px 30px;
    line-height:24px;
    color:#fff;
    font:16px "Microsoft YaHei", Verdana, Geneva, sans-serif;
    cursor:pointer;
    border:1px #ae7d0a solid;
    -webkit-box-shadow:inset 0px 0px 1px #fff;
    -moz-box-shadow:inset 0px 0px 1px #fff;
    box-shadow:inset 0px 0px 1px #fff;/*内发光效果*/
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;/*边框圆角*/
    text-shadow:1px 1px 0px #b67f01;/*字体阴影效果*/
    background-color:#feb100;
    background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#feb100), to(#e8a201));
    background-image: -webkit-linear-gradient(top, #feb100 0%, #e8a201 100%);
    background-image: -moz-linear-gradient(top, #feb100 0%, #e8a201 100%);
    background-image: -ms-linear-gradient(top, #feb100 0%, #e8a201 100%);
    background-image: -o-linear-gradient(top, #feb100 0%, #e8a201 100%);
    background-image: linear-gradient(top, #feb100 0%, #e8a201 100%);/*颜色渐变效果*/
}
#submit:hover {
    background-color:#e8a201;
    background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#e8a201), to(#feb100));
    background-image: -webkit-linear-gradient(top, #e8a201 0%, #feb100 100%);
    background-image: -moz-linear-gradient(top, #e8a201 0%, #feb100 100%);
    background-image: -ms-linear-gradient(top, #e8a201 0%, #feb100 100%);
    background-image: -o-linear-gradient(top, #e8a201 0%, #feb100 100%);
    background-image: linear-gradient(top, #e8a201 0%, #feb100 100%);
}
</style>
<meta charset='utf-8' >
</head>
<body>
<form action='verify.php' method='get'>
<div id='Brague'><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Brague</a></div>
<input id='userid' type='text' name='username'></input><br />
<input id='passw' type='text' name='passw'></input>
<span id='commit'><input id='submit' type='submit' name='submit' value='submit'></input></span>
</form>
</body>
