<!DOCTYPE html>
<?php include('include/functions.php');?>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Inspiration for Article Intro Effects | Demo 3</title>
<meta name="description" content="Inspiration for Article Intro Effects" />
<meta name="keywords" content="title, header, effect, scroll, inspiration, medium, web design" />
<meta name="author" content="Codrops" />
<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="style/component.css" />
<script type='text/javascript' src='js/jquery-2.1.0.min.js'></script>
<script type='text/javascript' src='js/main.js'></script>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<?php 
$url=$_SERVER['PHP_SELF'];
$url=explode('/',$url);
$url=end($url);
if($url=='index.php'||$url=='about.php'||$url='single.php')
{?>
<header>
<div class="bg-img"></div>
<div class="main_title">
<h1><a href='<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>'>Brague</a></h1>
<span><?php line_api();?></span>
</div>
<div class="bg-img"></div>
</header>
<button class="trigger" data-info="Click to see the header effect"><span>Trigger</span></button>
<?php }?>

