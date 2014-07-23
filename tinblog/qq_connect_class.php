<?php
class qq_connect
{
		private $strApp_id='101141172';
		private $strApp_key='e0709edf1e54d54bb182665e8f5f79b6';
		private $strRedirect='http://www.uuuuj.com/qq/index.php';
		private $strState='001';
		private $obResult;
		private $strCode;
		private $strAccess_token;
		private $strOpen_id;
		function qq_login()
		{
				$strUrl='https://graph.qq.com/oauth2.0/authorize';
				$strUrl.='?response_type=code';
				$strUrl.='&redirect_uri='.urlencode($this->strRedirect);
				$strUrl.='&state='.$this->strState;
				$strUrl.='&client_id='.$this->strApp_id;
				header("Location:$strUrl");
		}
		function get_authorization_code()
		{
				$this->strCode=$_GET['code'];
				return $this->strCode;
		}
		function get_access_token()
		{
				$this->strCode=$_GET['code'];
				$strUrl='https://graph.qq.com/oauth2.0/token';
				$strUrl.='?grant_type=authorization_code';
				$strUrl.='&client_id='.$this->strApp_id;
				$strUrl.='&client_secret='.$this->strApp_key;
				$strUrl.='&code='.$this->strCode;
				$strUrl.='&redirect_uri='.urlencode($this->strRedirect);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$strUrl);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$obResponse = curl_exec($ch);
				$arrTemp=array();
				parse_str($obResponse,$arrTemp);
				$this->strAccess_token=$arrTemp['access_token'];
				return $this->strAccess_token;
		}
		function get_openid()
		{
				$access_toke=qq_connect::get_access_token();
				$strUrl='https://graph.qq.com/oauth2.0/me';
				$strUrl.='?access_token='.$access_token;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$strUrl);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$obResponse = curl_exec($ch);
				$arrTemp=array();
				$arrTemp=json_decode($obResponse,true);
				$this->strOpen_id=$arrTemp['openid'];
				return $this->strOpen_id;
		}
		function get_user_info()
		{
				$open_id=qq_connect::get_openid();
				$strUrl='https://graph.qq.com/user/get_user_info';
				$strUrl.='?access_toke='.$this->strAccess_token;
				$strUrl.='&oauth_consumer_key='.$this->strApp_id;
				$strUrl.='&openid='.$openid;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$strUrl);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$obResponse = curl_exec($ch);
				$arrTemp=array();
				$arrTemp=json_decode($obResponse,true);
				return $arrTemp;
		}
		function _die($strErrcode)
		{
				echo 'error';		
		}
}
?>



