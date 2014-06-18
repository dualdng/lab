<?php
header("Content-type: text/html; charset=utf-8");
include('mysql_class.php');
include('pagenavi_class.php');
include('config.php');
		$db=new mysql_con();
		$query='select t1.no,t1.title,t2.user_name,t3.catagory_name,t1.tag,t1.post_type,t1.create_date,t1.content,t1.excerpt,t1.hit_count from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_catagory t3 on t1.catagory_id=t3.id order by no desc';
		$res=$db->fetch_all($query);//select all the post
function pagenavi_index()
{
		global $res;
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		}
		$rows=count($res);
		$pagesize=5;
		$pagenum=ceil($rows/$pagesize);//get the pagenum
		$url='index.php?';
		$pagenavi=pagenavi::getInstance();
		$pagenavi->_pagenavi($page,$pagesize,$url,$pagenum);
}
function hitokoto()//hitokoto api
{
		$url='http://api.hitokoto.us/rand?cat=a&charset=utf-8';
		@$tw=file_get_contents($url);
		$tw=json_decode($tw,true);
		echo $tw['source'].':'.$tw['hitokoto'];
}
function line_api()
{
	$url='http://127.0.0.1/gather/include/line_api.php?type=1';
	$line=file_get_contents($url);
	$line=strip_tags($line);
	$line=json_decode($line,true);
	$error=json_last_error();
	echo '<a href=\'http://line.uuuuj.com\' title=\''.$line['name'].'\'>'.$line['line'].'</a>——'.$line['name'];
}

function post_list()//show post's list on index.php
{
		global $res;
		$pagesize=5;
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		}
		$pagestart=($page-1)*$pagesize;//set the for_start pagenum,eg:2*5-15
		for($i=$pagestart;$i<$pagestart+5;$i++)// array([0]=>no,1=>title,2=>user_name.3=>catagory_name,4=>tag,5=>post_type,6=>create_date,7=>content,8=>excerpt)
		{
				if(empty($res[$i]))
				{
				}
				else
						{
				$tag=explode(',',$res[$i][4]);
				$num=count($tag);
			echo '<div class=\'article\'>';
		/**	echo '<div class=\'hit_count\'>'.$res[$i][9].'</div>';**/
				while($res[$i][5]==1)//image
				{
						$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
						$str=$res[$i][7];
						preg_match_all($ruls,$str,$matches);
						$c=count($matches[0]);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
								if(empty($res[$i][8]))
						{
								for($b=0;$b<$c;$b++)
								{
								echo '<div class=\'content\'><a href=\''.$matches[1][$b].'\'>'.@$matches[0][$b].'</a></div>';
								}
						}
						else
						{
								for($b=0;$b<$c;$b++)
								{
								echo '<div class=\'content\'><a href=\''.$matches[1][$b].'\'>'.$res[$i][8].@$matches[0][$b].'</div>';
								}
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
								if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.@$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].@$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][7].'</div>
								<div class=\'user\'><span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';
								for($a=0;$a<$num;$a++)
								{
										echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
								}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;

				}
				while($res[$i][5]==4)//standard
				{
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
						}
			echo '</div>';		
			}
}
function single_post($no)
{
		global $res;
		$tag=explode(',',$res[$no][4]);
		$num=count($tag);
				while($res[$no][5]==1)//image
				{
						echo '<div id=\'single\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'>'.$res[$no][1].'</div>
								<div class=\'content\'>'.$res[$no][7].'</div>
								<div class=\'user\'>Post by '.$res[$no][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$no][6].'</div>
								</div>';
						break;
				}
				while($res[$no][5]==2)//music
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'>'.$res[$no][1].'</div>
								<div class=\'content\'>'.$res[$no][7].'</div>
								<div class=\'user\'>Post by '.$res[$no][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$no][6].'</div>
								</div>'; 
						break;
				}
				while($res[$no][5]==3)//status
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'>'.$res[$no][7].'</div>
								<div class=\'user\'>Post by '.$res[$no][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</a></span></div>
								<div class=\'tag\'>';
								for($a=0;$a<$num;$a++)
								{
										echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
								}
						echo '</div>
								<div class=\'date\'>'.$res[$no][6].'</div>
								</div>';
						break;

				}
				while($res[$no][5]==4)//standard
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'>'.$res[$no][1].'</div>';
						echo '<div class=\'content\'>'.$res[$no][7].'</div>';
						echo '<div class=\'user\'>Post by '.$res[$no][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$no][3].'\'>'.$res[$no][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$no][6].'</div>
								</div>';
						break;
				}
/**
		global $res;
		echo $res[$no][1].'<br />';
		echo $res[$no][7].'<br />';
		echo $res[$no][3].'<br />';
		echo $res[$no][4].'<br />';
		echo $res[$no][6].'<br />';
		**/
		return $res[$no][1];
}
function show_title()
{

		$url=$_SERVER['PHP_SELF'];
		$filename=end(explode('/',$url));
		global $no;
		global $res;
		global $option;
		global $catagory;
		global $tag;
		global $db;
		$query='select * from b_option';
		$option=$db->fetch_all($query);
		switch($filename)
		{
				case 'single.php':
				echo $res[$no][1].'|Brague';
				break;
				case 'index.php':
				echo 'Brague|'.$option[0][2];
				break;
				case 'catagory_page.php';
				echo $catatory.'|Brague';
				break;
				case 'tag_page.php';
				echo $tag.'|Brague';
				break;
				default:
				echo 'Brague';
				break;
		}
}
function tag_list($tag)
{
		global $res;
		global $tag_num;
		$rows=count($res);
		$temp=array();
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		};

		for($i=0;$i<$rows;$i++)
		{
				$pos=stripos($res[$i][4],$tag);//找出tag是否在字段tag里面，如果在则将该id放进数组temp中
				if($pos!==false)
				{
						$temp[$i]=$i;
				}
		}
		$tag_num=count($temp);
		$pagestart=($page-1)*5;
		$temp=array_slice($temp,$pagestart,$pagestart+5);
		foreach($temp as $i)
		{
				$tag=explode(',',$res[$i][4]);
				$num=count($tag);
				echo '<div class=\'article\'>';
				while($res[$i][5]==1)//image
				{
						$ruls='/<img[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][7].'</div>
								<div class=\'user\'><span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;

				}
				while($res[$i][5]==4)//standard
				{
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
				echo '</div>';

		}
}
function pagenavi_tag($tag)
{
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		}
		global $tag_num;
		$pagesize=5;
		$pagenum=ceil($tag_num/$pagesize);//get the pagenum
		$url='tag_page.php?tag='.$tag.'&';
		$pagenavi=pagenavi::getInstance();
		$pagenavi->_pagenavi($page,$pagesize,$url,$pagenum);
}


function cata_list($cata)
{
		global $res;
		global $cata_num;
		$rows=count($res);
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		};
		$temp=array();
		for($i=0;$i<$rows;$i++)
		{
				if($res[$i][3]==$cata)
				{
						$temp[$i]=$i;
				}
		}
		$cata_num=count($temp);
		$pagestart=($page-1)*5;
		$temp=array_slice($temp,$pagestart,$pagestart+5);
		foreach($temp as $i)
		{
				$tag=explode(',',$res[$i][4]);
				$num=count($tag);
				echo '<div class=\'article\'>';
				while($res[$i][5]==1)//image
				{
						$ruls='/<img[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][7].'</div>
								<div class=\'user\'><span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;

				}
				while($res[$i][5]==4)//standard
				{
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'catagory_page.php?catagory='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'>'.$res[$i][6].'</div>
								</div>';
						break;
				}
				echo '</div>';

		}
}
function pagenavi_cata($cata)
{
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		}
		global $cata_num;
		$pagesize=5;
		$pagenum=ceil($cata_num/$pagesize);//get the pagenum
		$url='catagory_page.php?catagory='.$cata.'&';
		$pagenavi=pagenavi::getInstance();
		$pagenavi->_pagenavi($page,$pagesize,$url,$pagenum);
}
function get_avatar($email,$size=80)
{
//	$email=trim($email); // "MyEmailAddress@example.com"
//	$email=strtolower($email); // "myemailaddress@example.com"
//	$email_hashed=md5($email);
//	$email_url='http://www.gravatar.com/avatar/'.$email;
//	return $email_url;
	echo 'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $email ) ) ).'?s='.$size;
}
function tag_cloud()
{
		global $res;
		global $db;
		$rows=count($res);
		$tag_cloud=array();
		$temp=array();
		for($i=0;$i<$rows;$i++)
		{
			$tag=explode(',',$res[$i][4]);	
			$tag_cloud[$i]=$tag;
		}
		foreach($tag_cloud as $key=>$value)
		{
				$temp=array_merge($temp,$value);/** merge the arrays**/
		}
		$temp=array_unique($temp);
		foreach($temp as $value)
		{
		$query='select count(*) from b_article where tag like\'%'.$value.'%\'';
		$result=$db->fetch_all($query);
		$num=$result[0][0];
				echo'<a href=\'tag_page.php?tag='.$value.'\'>'.$value.'</a>('.$num.')&nbsp&nbsp';
		}
}
function hit_count($id,$no)
{
		global $res;
		global $db;
		if(!isset($res[$no][9]))
		{
				$res[$no][9]=1;
		}
		else
		{
				$res[$no][9]+=1;
		}
		$count=$res[$no][9];
		$query='update b_article set hit_count=\''.$count.'\'where no=\''.$id.'\'';
		$result=$db->_update($query);
}
function rand_article()
{
		global $res;
		$rows=count($res);
		$rand_array=range(0,$rows-1);
		shuffle($rand_array);
		$rand_array=array_slice($rand_array,0,5);
		foreach($rand_array as $i)
		{
				echo'<a href=\'single.php?no='.$i.'&id='.$res[$i][0].'\'>'.$res[$i][1].'</a><br />';
		}
}
function cata_cloud()
{
		global $db;
		$query='select * from b_catagory';
		$result=$db->fetch_all($query);
		$rows=count($result);
		for($i=0;$i<$rows;$i++)
		{
				echo'<a class=\'icon-flag\' href=\'catagory_page.php?catagory='.$result[$i][1].'\'>'.$result[$i][1].'</a><br />';
		}
}
function links()
{
		global $db;
		$query='select no,name,link,title from b_links';
		$result=$db->fetch_all($query);
		$rows=count($result);
		for($i=0;$i<$rows;$i++)
		{
				echo '<li><a class=\'icon-heart2\' href=\''.$result[$i][2].'\' title=\''.$result[$i][3].'\'>'.$result[$i][1].'</a></li>';
		}
}
function show_user()
{
		global $db;
		$query='select user_id,user_name,user_email,user_des from b_user';
		$result=$db->fetch_all($query);
		return $result;
}
?>
