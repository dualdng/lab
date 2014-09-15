<?php
class git_connect
{
		private $client_id='27d665346af7a22ae94e';
		private $client_secret='97ab9f434408044d5991d064eb58b2743cfb3cd5';
		private $strRedirect='http://www.uuuuj.com/git/index.php';
		private $strState='001';
		private $obResult;
		private $strCode;
		private $strAccess_token;
//		private $strAccess_token='022ad7707d24230a537f65b2872da466311816c3';  //git hub testing token
		private $strOpen_id;
		function __construct()
		{
				$this->strAccess_token=$this->get_access_token();
		}
		function login()
		{
				$strUrl='https://github.com/login/oauth/authorize';
				$strUrl.='?scope=user,user:email';
				$strUrl.='&redirect_uri='.urlencode($this->strRedirect);
				$strUrl.='&state='.$this->strState;
				$strUrl.='&client_id='.$this->client_id;
				header("Location:$strUrl");
		}
		function get_access_token()
		{
				$this->strCode=$_GET['code'];
				$strUrl='https://github.com/login/oauth/access_token';
				$data=array(
						'client_id'=>$this->client_id,
						'client_secret'=>$this->client_secret,
						'code'=>$this->strCode,
						'redirect_uri'=>$this->strRedirect
				);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $strUrl);  
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$obResponse = curl_exec($ch);
				$arrTemp=array();
				parse_str($obResponse,$arrTemp);
				return $arrTemp['access_token'];
		}
		function get_user_info()
		{
				$access_token=$this->strAccess_token;
				$strUrl='https://api.github.com/user';
				$strUrl.='?access_token='.$access_token;
				$header[]='User-Agent:dualdng';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_HTTPHEADER,$header);  //github needs a user-agent header;
				curl_setopt($ch, CURLOPT_URL,$strUrl);  
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



