<!DOCTYPE html>
<?php include('include/functions.php');?>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title><?php show_title();?></title>
<meta name="description" content="<?php echo $option[0][2];?>" />
<meta name="keywords" content="<?php echo $option[0][1];?>" />
<meta name="author" content="Tinty" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="style/main.css" />
<link rel='stylesheet' href='phzoom/phzoom.css' />
<link rel="stylesheet" href="admin/editor/plugins/code/prettify.css" />
<script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
<script type="text/javascript" src="phzoom/phzoom.js"></script>
<script type='text/javascript' src='js/main.js'></script>
<script charset="utf-8" src="admin/editor/kindeditor.js"></script>
<script charset="utf-8" src="admin/editor/plugins/code/code.js"></script>
<script charset="utf-8" src="admin/editor/plugins/code/prettify.js"></script>

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<?php 
$url=$_SERVER['PHP_SELF'];
$url=explode('/',$url);
$url=end($url);
if($url=='index.php'||$url=='about.php')
{?>
<header>
<div class="bg-img"></div>
<div class="main_title">
<h1><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Brague</a></h1>
<span><?php line_api();?></span>
</div>
<div class="bg-img"></div>
</header>
<?php }?>


