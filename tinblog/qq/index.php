<?php
include('header.php');
include('banner.php');
include('qq_connect_class.php');
include('../include/functions.php');
$qq_login=new qq_connect();
$res=$qq_login->get_user_info();
$openid=$qq_login->get_openid();
create_third($res['nickname'],$res['figureurl_qq_1'],$openid);
setcookie('name',$res['nickname'],time()+3600*24*30.'/');
setcookie('openid',$openid,time()+3600*24*30.'/');
?>
<article class="main_content">
		<div class='double'><button class='button arrowleft icon' onclick='javascript:double();'></button>
				<button class='button arrowright icon' onclick='javascript:one();'></button></div>
		<div id='page'>
				<div id='article'>
						<form id='add_personal' method='POST' action='update_third.php'>
						<input type='hidden' name='third_id' value='<?php echo $openid;?>'></input>
								<input type='text' name='email' placeholder='input your email here'></input>
								<input type='text' name='url' placeholder='input your website here'></input>
								<input type='submit' name='submit' value='POST'></input>
						</form>
<a href='http://www.uuuuj.com'>Back</a>
				</div>
				<div id='side'><?php include('side.php');?></div>
				<div style='clear:both'></div>
				<div class="spinner">
						<div class="cube1"></div>
						<div class="cube2"></div>
				</div>
		</div>
</article>
<?php include('footer.php');?>
