 <?php
 $apikey='31b6d1d9f563';
 $blog='https://blog.uuuuj.com';
/** $url='rest.akismet.com/1.1/verify-key';
// $data='{"key":$apikey,"blog":$blog}';
$data=array('key'=>$apikey,'blog'=>$blog);
 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$url);
 curl_setopt($curl,CURLOPT_HEADER,1);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                            
						 'User-Agent:Tinblog/1.0 | Akismet/2.5.9'                                                                                  
						 )                                                                         
			);         
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($curl,CURLOPT_POST,1);
 curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
 $res=curl_exec($curl);
**/
 $url=$apikey.'.rest.akismet.com/1.1/comment-check';
$user_ip='69.85.84.23';
$user_agent='Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6';
$referrer='http://www.google.com';
$comment_author='viagra-test-123';
$data=array(
'blog'=>$blog,
'user_ip'=>$user_ip,
'user_agent'=>$user_agent,
'referrer'=>$referrer,
'comment_author'=>$comment_author
);
 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$url);
 curl_setopt($curl,CURLOPT_HEADER,1);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                            
						 'User-Agent:Tinblog/1.0 | Akismet/2.5.9'                                                                                  
						 )                                                                         
			);         
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($curl,CURLOPT_POST,1);
 curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
 $res=curl_exec($curl);
 echo $res;

?>
