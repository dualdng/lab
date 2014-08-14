<?php
include('mysql_class.php');
include('pagenavi_class.php');
include('config.php');
		$db=new mysql_con();//call the class mysql_class
		$query='select t1.no,t1.title,t2.user_name,t3.category_name,t1.tag,t1.post_type,t1.create_date,t1.content,t1.excerpt,t1.hit_count,t1.vote,t1.rank from b_article t1 left join b_user t2 on t1.user_id=t2.user_id left join b_category t3 on t1.category_id=t3.id order by no desc';
		$res=$db->fetch_all($query);//select all the post
		//index 页面的page导航
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
		$pagenum=ceil($rows/$pagesize);//获取总页数，取整
		$url='index.php?';
		$pagenavi=pagenavi::getInstance();//调用pagenavi_class
		$pagenavi->_pagenavi($page,$pagesize,$url,$pagenum);
}
function hitokoto()//hitokoto api
{
		$url='http://api.hitokoto.us/rand?cat=a&charset=utf-8';
		@$tw=file_get_contents($url);
		$tw=json_decode($tw,true);
		echo $tw['source'].':'.$tw['hitokoto'];
}
function line_api()//line api
{
	$url='http://line.uuuuj.com/include/line_api.php?type=1';
	$line=file_get_contents($url);
//	$line=strip_tags($line);
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
		for($i=$pagestart;$i<$pagestart+5;$i++)// array([0]=>no,1=>title,2=>user_name.3=>category_name,4=>tag,5=>post_type,6=>create_date,7=>content,8=>excerpt)
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
				while($res[$i][5]==1)//image   id w为文章唯一字段
				{
						$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
						$str=$res[$i][7];
						preg_match_all($ruls,$str,$matches);
						$c=count($matches[0]);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
								echo '<div class=\'content\'>';
								if(empty($res[$i][8]))
						{
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
						else
						{
								echo $res[$i][8];
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
								echo '</div>';
						echo '<div style=\'clear:both\'></div>';
						echo '<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
								if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.@$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].@$matches[0].'</div>';
						}
						echo '<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][7].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
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
						$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'<a href=\''.@$matches[1].'\'>'.@$matches[0].'</a></div>';
						}
						echo '<div style=\'clear:both\'></div>';
						echo '<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>
								<div class=\'date\'></div>
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
		$row=count($res);
		$tag=explode(',',$res[$no][4]);
		$num=count($tag);
			echo '<div class=\'article\'>';
				while($res[$no][5]==1)//image
				{
						echo '<div id=\'single\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'>'.$res[$no][1].'<span class=\'views\'>'.$res[$no][9].' Views<br />'.date('d M,y',strtotime($res[$no][6])).'</span></div>
								<div class=\'content\'>'.$res[$no][7].'</div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$no][3].'\'>'.$res[$no][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>';
						break;
				}
				while($res[$no][5]==2)//music
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'>'.$res[$no][1].'<span class=\'views\'>'.$res[$no][9].' Views<br />'.date('d M,y',strtotime($res[$no][6])).'</span></div>
								<div class=\'content\'>'.$res[$no][7].'</div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$no][3].'\'>'.$res[$no][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>'; 
						break;
				}
				while($res[$no][5]==3)//status
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'>'.$res[$no][7].'<span class=\'views\'>'.$res[$no][9].' Views<br />'.date('d M,y',strtotime($res[$no][6])).'</span></div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$no][3].'\'>'.$res[$no][3].'</a></span></div>
								<div class=\'tag\'>';
								for($a=0;$a<$num;$a++)
								{
										echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
								}
						echo '</div>
								<div class=\'date\'></div>
								</div>';
						break;

				}
				while($res[$no][5]==4)//standard
				{
						echo '<div id=\'single\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'>'.$res[$no][1].'<span class=\'views\'>'.$res[$no][9].' Views<br />'.date('d M,y',strtotime($res[$no][6])).'</span></div>';
						echo '<div class=\'content\'>'.$res[$no][7].'</div>';
						echo '<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$no][3].'\'>'.$res[$no][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp&nbsp';
						}
						echo '</div>
								<div class=\'date\'></div>
								</div>';
						break;
				}
				echo '</div>';
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
function show_title()//show the title of html pedding the pagename
{

		$url=$_SERVER['PHP_SELF'];
		$filename=end(explode('/',$url));
		global $id;
		global $res;
		global $option;
		global $category;
		global $tag;
		global $db;
		$row=count($res);
		for($i=0;$i<$row;$i++)//转换文章id为数组res中的数字索引，主要目的：解决通过数组res数字索引区分文章导致的url一直是变化的，现在就可以直接使用id作为文章的划分，同时又保留了数字索引的方便。
		{
				if($res[$i][0]==$id)
				{
						$no=$i;
				}
		}
		$query='select * from b_option';
		$option=$db->fetch_all($query);
		switch($filename)
		{
				case 'single.php':
				echo $res[$no][1].'|Brague';
				break;
				case 'index.php':
				echo 'Brague | '.$option[0][2];
				break;
				case 'category_page.php';
				echo $category.' | Brague';
				break;
				case 'tag_page.php';
				echo $tag.' | Brague';
				break;
				default:
				echo 'Brague';
				break;
		}
}
function tag_list($tag)//show the posts who with the same tags
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
				$pos=stripos($res[$i][4],$tag);//找出tag是否在字段tag里面，如果在则将该数组的索引放进数组temp中
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
						$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
						$str=$res[$i][7];
						preg_match_all($ruls,$str,$matches);
						$c=count($matches[0]);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
								echo '<div class=\'content\'>';
								if(empty($res[$i][8]))
						{
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.@$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
						else
						{
								echo $res[$i][8];
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.@$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
								echo '</div>';
						echo '<div style=\'clear:both\'></div>';
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][7].'</div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
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
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'></div>
								</div>';
						break;
				}
				echo '</div>';

		}
}
function pagenavi_tag($tag)//the pagenavi of the tag_page
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


function cate_list($cate)//show the posts who with the same category
{
		global $res;
		global $cate_num;
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
				if($res[$i][3]==$cate)
				{
						$temp[$i]=$i;
				}
		}
		$cate_num=count($temp);
		$pagestart=($page-1)*5;
		$temp=array_slice($temp,$pagestart,$pagestart+5);
		foreach($temp as $i)
		{
				$tag=explode(',',$res[$i][4]);
				$num=count($tag);
				echo '<div class=\'article\'>';
				while($res[$i][5]==1)//image
				{
						$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
						$str=$res[$i][7];
						preg_match_all($ruls,$str,$matches);
						$c=count($matches[0]);
						echo '<div id=\'image\'><img id=\'type\' src=\'image/image.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
								echo '<div class=\'content\'>';
								if(empty($res[$i][8]))
						{
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
						else
						{
								echo $res[$i][8];
								for($b=0;$b<$c;$b++)
								{
								echo '<a href=\''.$matches[1][$b].'\'>'.@$matches[0][$b].'</a>';
								}
						}
								echo '</div>';
						echo '<div style=\'clear:both\'></div>';
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
								<div class=\'tag\'>';

						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>';
						break;
				}
				while($res[$i][5]==2)//music
				{
						$ruls='/<audio[^>]+\/>/iu';
						$str=$res[$i][7];
						preg_match($ruls,$str,$matches);
						echo '<div id=\'music\'><img id=\'type\'  src=\'image/music.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$matches[0].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].$matches[0].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>

								<div class=\'date\'></div>
								</div>'; 
						break;
				}
				while($res[$i][5]==3)//status
				{
						echo '<div id=\'status\'><img id=\'type\'  src=\'image/status.png\' /><div class=\'content\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][7].'</div>
								<div class=\'user\'><span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a></span></div>
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
						echo '<div id=\'standard\'><img id=\'type\'  src=\'image/standard.png\' /><div class=\'title\'><a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><span class=\'views\'>'.$res[$i][9].' Views<br />'.date('d M,y',strtotime($res[$i][6])).'</span></div>';
						if(empty($res[$i][8]))
						{
								echo '<div class=\'content\'>'.$res[$i][7].'</div>';
						}
						else
						{
								echo '<div class=\'content\'>'.$res[$i][8].'</div>';
						}
						echo '<div class=\'user\'>Post by '.$res[$i][2].' on <span><a href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</span></div>
								<div class=\'tag\'>';
						for($a=0;$a<$num;$a++)
						{
								echo'<a class=\'ta'.$a.'\'href=\'tag_page.php?tag='.$tag[$a].'\'>'.$tag[$a].'</a>&nbsp|&nbsp';
						}
						echo '</div>
								<div class=\'date\'></div>
								</div>';
						break;
				}
				echo '</div>';

		}
}
function pagenavi_cate($cate)//the pagenavi of the category_page
{
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		}
		global $cate_num;
		$pagesize=5;
		$pagenum=ceil($cate_num/$pagesize);//get the pagenum
		$url='category_page.php?category='.$cate.'&';
		$pagenavi=pagenavi::getInstance();
		$pagenavi->_pagenavi($page,$pagesize,$url,$pagenum);
}
function get_avatar($email,$size=80)//get the avatar pedding the user's email
{
//	$email=trim($email); // "MyEmailAddress@example.com"
//	$email=strtolower($email); // "myemailaddress@example.com"
//	$email_hashed=md5($email);
//	$email_url='http://www.gravatar.com/avatar/'.$email;
//	return $email_url;
	echo 'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $email ) ) ).'?s='.$size;
}
function tag_cloud()//realized the tag_cloud,this is very important
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
function hit_count($id,$no)//count the post's views and this is not in use
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
function rand_article()//show the rand posts on sidebar
{
		global $res;
		$rows=count($res);
		$rand_array=range(0,$rows-1);
		shuffle($rand_array);
		$rand_array=array_slice($rand_array,0,5);
		foreach($rand_array as $i)
		{
				echo'<a href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><br />';
		}
}
function cate_cloud()//show the categorys on sidebar
{
		global $db;
		$query='select * from b_category';
		$result=$db->fetch_all($query);
		$rows=count($result);
		for($i=0;$i<$rows;$i++)
		{
				echo'<a class=\'icon-flag\' href=\'category_page.php?category='.$result[$i][1].'\'>'.$result[$i][1].'</a><br />';
		}
}
function links()//show the links on sidebar
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
function show_user()//show the user's information on sidebar
{
		global $db;
		$query='select user_id,user_name,user_email,user_des from b_user';
		$result=$db->fetch_all($query);
		return $result;
}
function comments_fields($id,$pre_post_id=0)
{
				echo '<form class=\'comments_field\' method=\'post\' action=\'post_comments.php\'onSubmit=\'return post_comments()\'>';
				echo '<input type=\'hidden\' name=\'id\' class=\'name\' value=\''.$id.'\'></input>';
				echo '<input type=\'hidden\' name=\'pre_post_id\' class=\'name\' value=\''.$pre_post_id.'\'></input>';

		if(isset($_COOKIE['name']))
		{

				$name=$_COOKIE['name'];
				if(isset($_COOKIE['openid']))
				{
						$user_id='qq'.$_COOKIE['openid'];
						$email=isset($_COOKIE['email'])?$_COOKIE['email']:'';
						$url=isset($_COOKIE['url'])?$_COOKIE['url']:'';
						if(strlen($name)>12)
						{
								$name=substr($name,0,6).'...';
						}
						echo '<p class=\'qq_name\'>欢迎:<a href=\'qq/index.php\'>'.$name.'</a></p>';
						echo '<p class=\'qq_name\'><a id=\'log_out\' href=\'include/functions.php?action=log_out\' >Log_out</a></p>';
						echo '<input type=\'hidden\' name=\'user_id\' class=\'name\' value=\''.$user_id.'\'></input>';
						echo '<input type=\'hidden\' name=\'name\' class=\'name\' value=\''.$name.'\'></input>';
						echo '<input type=\'hidden\' name=\'email\' class=\'email\' value=\''.$email.'\' required=\'required\'></input>';
						echo '<input type=\'hidden\' name=\'url\' class=\'url\' value=\''.$url.'\'></input>';

				}
				else
				{
						$user_id=0;
						$email=isset($_COOKIE['email'])?$_COOKIE['email']:'';
						$url=isset($_COOKIE['url'])?$_COOKIE['url']:'';
						echo '<input type=\'hidden\' name=\'user_id\' class=\'name\' value=\''.$user_id.'\'></input>';
						echo '<input type=\'text\' name=\'name\' class=\'name\' value=\''.$name.'\'></input><br />';
						echo '<input type=\'text\' name=\'email\' class=\'email\' value=\''.$email.'\' required=\'required\'></input><br />';
						echo '<input type=\'text\' name=\'url\' class=\'url\' value=\''.$url.'\'></input><br />';

				}
		}
		else
		{
				$user_id=0;
				echo '<input type=\'hidden\' name=\'user_id\' class=\'name\' value=\''.$user_id.'\'></input>';
				echo '<input type=\'text\' name=\'name\' class=\'name\' placeholder=\'Your Name*\' required=\'required\'></input><br />';
				echo '<input type=\'text\' name=\'email\' class=\'email\' placeholder=\'Your Email*\' required=\'required\'></input><br />';
				echo '<input type=\'text\' name=\'url\' class=\'url\' placeholder=\'Your Website\'></input><br />';
		}
				echo '<textarea type=\'text\' rows=\'6\' name=\'text\' class=\'textarea\' placeholder=\'Something Here\' required=\'required\'></textarea><br />';
				echo '<input type=\'submit\' name=\'submit\' class=\'submit\' value=\'submit\'></input>';
				echo '</form>';
				echo '<div class=\'qq_login\'><img src=\'qq/Connect_logo_1.png\'/><a href=\'javascript:void(0);\'>使用QQ登录</a></div>';
}

function post_comments($id,$pre_post_id,$user_id,$name,$email,$url,$text)
{
		global $db;
		date_default_timezone_set('Asia/Shanghai');    //把时区设置为中国的上海，避免时间误差，)
		$date=date('Y-m-d H:i:s');
		$query='insert into b_comments value(\''.$id.'\',\'\',\''.$pre_post_id.'\',\''.$user_id.'\',\''.$name.'\',\''.$url.'\',\''.$email.'\',\''.$text.'\',\''.$date.'\')';
		$result=$db->_insert($query);
}
		
function show_comments($id)//this is not in use
{
		global $db;
		$query='select * from b_comments where no=\''.$id.'\' and pre_post_id=0 order by post_id asc';
		$result=$db->fetch_all($query);
		$rows=count($result);
		$pre_post_id=array();
		$post_id=array();
		for($i=0;$i<$rows;$i++)
		{
								echo '<div class=\'comments\'>';
								if(strpos($result[$i][3],'qq')!==false)
								{
										$query='select avatar from b_third where user_id=\''.$result[$i][3].'\'';
										$res=$db->fetch_assoc($query);
										echo '<div class=\'author_avatar\'><img src=\''.$res['avatar'].'\'/></div>';
								}
								else
								{
								echo '<div class=\'author_avatar\'><img src=\'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $result[$i][6] ) ) ).'?s=40\'/></div>';
								}
								echo '<div class=\'comments_contents\'>';
								echo '<div class=\'comments_pak\'>';
								echo '<div class=\'comments_author\'><a href=\''.$result[$i][5].'\'>'.$result[$i][4].'</a></div>';
								echo '<div class=\'comments_date\'>'.date('d M,y',strtotime($result[$i][8])).'</div>';
								echo '</div>';
								echo '<div class=\'comments_text\'>'.$result[$i][7].'</div>';
								echo '<div class=\'comments_reply\'><a class=\'reply_'.$result[$i][1].' reply\' href=\'javascript:void(0);\'onclick=\'comments_fields('.$id.','.$result[$i][1].')\'>reply</a><a href=\'javascript:void(0)\' class=\'cancel_reply_'.$result[$i][1].' cancel_reply\' onclick=\'cancel_reply('.$result[$i][1].')\'>cancel</a></div>';
						echo '<div class=\'comments_form_'.$result[$i][1].'\'></div>';
								echo '</div>';
						if ($result[$i][1]!=0) {
								children_comments($result[$i][1]);
						}
								echo '</div>';
		}
}
function children_comments($post_id)
{
		global $db;
		$query='select * from b_comments where pre_post_id=\''.$post_id.'\' order by post_id asc';
		$result=$db->fetch_all($query);
		if(!empty($result))
		{
				$rows=count($result);
				for($i=0;$i<$rows;$i++)
				{
						echo '<div class=\'comments_children\'>';
						if(strpos($result[$i][3],'qq')!==false)
						{
								$query='select avatar from b_third where user_id=\''.$result[$i][3].'\'';
								$res=$db->fetch_assoc($query);
								echo '<div class=\'author_avatar\'><img src=\''.$res['avatar'].'\'/></div>';
						}
						else
						{
								echo '<div class=\'author_avatar\'><img src=\'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $result[$i][6] ) ) ).'?s=40\'/></div>';
						}

						echo '<div class=\'comments_contents\'>';
						echo '<div class=\'comments_pak\'>';
						echo '<div class=\'comments_author\'><a href=\''.$result[$i][5].'\'>'.$result[$i][4].'</a></div>';
						echo '<div class=\'comments_date\'>'.date('d M,y',strtotime($result[$i][8])).'</div>';
						echo '</div>';
						echo '<div class=\'comments_text\'>'.$result[$i][7].'</div>';
						echo '<div class=\'comments_reply\'><a class=\'reply_'.$result[$i][1].' reply\' href=\'javascript:void(0);\'onclick=\'comments_fields('.$result[$i][0].','.$result[$i][1].')\'>reply</a><a href=\'javascript:void(0)\' class=\'cancel_reply_'.$result[$i][1].' cancel_reply\' onclick=\'cancel_reply('.$result[$i][1].')\'>cancel</a></div>';
						echo '<div class=\'comments_form_'.$result[$i][1].'\'></div>';
						echo '</div>';
						children_comments($result[$i][1]);
						echo '</div>';
				}
		}
}
function show_archive()
{
		$month_arr=array('12','11','10','09','08','07','06','05','04','03','02','01');
		$year_arr=array('14','15','16');
		echo '<div class=\'article\'>';
		foreach($month_arr as $value)
		{
				$arrResult=archive('14',$value);
				if(!empty($arrResult))
				{
						$strTime=empty($arrResult)?'':'2014-'.$value;
						echo '<div class=\'archive_date\'>'.$strTime.'</div>';
						echo '<div class=\'archive_content\'>';
						foreach($arrResult as $strValues)
						{
								echo $strValues;
						}
						echo '</div>';
				}
		}
		echo '</div>';
}
function archive($year,$month)
{
		global $db;
		global $res;
		$row=count($res);
		$arrResult=array();
		for($i=0;$i<$row;$i++)
		{
						if($year==substr($res[$i][6],2,2))
						{
										if($month==substr($res[$i][6],5,2))
										{
												$arrResult[]='<a class=\'archive_title\' href=\'single.php?id='.$res[$i][0].'\'>'.$res[$i][1].'</a><br />'; 
												$arrResult[].='<span>on <a class=\'archive_cate\' href=\'category_page.php?category='.$res[$i][3].'\'>'.$res[$i][3].'</a>';
												$arrResult[].=' in '.date('m-d',strtotime($res[$i][6])).'<br /></span>';
										}
										else
										{
										}

						}
						else
						{
						}
		}
		return $arrResult;
}
function comments_no($thread_key=59,$short_name='tinty') 
{
		$url='http://api.duoshuo.com/threads/counts.json?short_name='.$short_name.'&threads='.$thread_key;
		$res=@file_get_contents($url);
		$res=json_decode($res,true);
		return $res['response'][$thread_key]['comments'];
}
/** pop post**/
function most_pop()
{
		global $db;
		$query='select no,title from b_article order by hit_count desc limit 0,5';
		$result=$db->fetch_all($query);
		return $result;
}
function rand_post()
{
		global $db;
		$query='select no,title from b_article order by rand() limit 0,5';
		$result=$db->fetch_all($query);
		return $result;
}
function tag_num($tag)
{
		global $db;
		$query='select count(*) from b_article where tag like\'%'.$tag.'%\'';
		$result=$db->query($query);
		$result=$result->fetch_all();
		return $result[0][0];
}
function themes_list()
{
		global $res;
		global $cate_num;
		if(!isset($_GET['page']))
		{
				$page=1;
		}
		else
		{
				$page=$_GET['page'];
		};
		$pagestart=($page-1)*9;
		$rows=count($res);
		$temp=array();
		for($i=0;$i<$rows;$i++)
		{
				if($res[$i][3]=='Themes')//category is themes
				{
						$temp[$i]=$i;
				}
		}
		$temp=array_slice($temp,$pagestart,$pagestart+9);
		foreach($temp as $i)
		{
				$ruls="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
				$str=$res[$i][7];
				preg_match($ruls,$str,$matches);
				$c=count($matches[0]);
				echo '<div class=\'themes_page\'>';
				echo '<a href=\''.$matches[1].'\'>'.@$matches[0].'</a>';
				echo '<div class=\'themes_pak\'><a href=\'single.php?id='.$res[$i][0].'\'><p>'.$res[$i][1].'</p><span>Read More-></span></a></div>';
				echo '</div>';
		}
}
function show_rank($id,$no)
{
		global $db;
		global $res;
		$goal=@round($res[$no][11]/$res[$no][10],1);//四舍五入去整，小数点一位
		$avery=round($goal/2,0);
		return $avery;
		/**
		switch($avery)
		{
		case 0:
				echo '
						<span class=\'h\' rate=\'2\'>★</span>
						<span class=\'h\' rate=\'4\'>★</span>
						<span class=\'h\' rate=\'6\'>★</span>
						<span class=\'h\' rate=\'8\'>★</span>
						<span class=\'h\' rate=\'10\'>★</span>
						';
				break;
		case 1:
				echo '
						<span class=\'s\' rate=\'2\'>★</span>
						<span class=\'h\' rate=\'4\'>★</span>
						<span class=\'h\' rate=\'6\'>★</span>
						<span class=\'h\' rate=\'8\'>★</span>
						<span class=\'h\' rate=\'10\'>★</span>
						';
				break;

		case 2:
				echo '
						<span class=\'s\' rate=\'2\'>★</span>
						<span class=\'s\' rate=\'4\'>★</span>
						<span class=\'h\' rate=\'6\'>★</span>
						<span class=\'h\' rate=\'8\'>★</span>
						<span class=\'h\' rate=\'10\'>★</span>
						';
				break;
		case 3:
				echo '
						<span class=\'s\' rate=\'2\'>★</span>
						<span class=\'s\' rate=\'4\'>★</span>
						<span class=\'s\' rate=\'6\'>★</span>
						<span class=\'h\' rate=\'8\'>★</span>
						<span class=\'h\' rate=\'10\'>★</span>
						';
				break;
		case 4:
				echo '
						<span class=\'s\' rate=\'2\'>★</span>
						<span class=\'s\' rate=\'4\'>★</span>
						<span class=\'s\' rate=\'6\'>★</span>
						<span class=\'s\' rate=\'8\'>★</span>
						<span class=\'h\' rate=\'10\'>★</span>
						';
				break;
		case 5:
				echo '
						<span class=\'s\' rate=\'2\'>★</span>
						<span class=\'s\' rate=\'4\'>★</span>
						<span class=\'s\' rate=\'6\'>★</span>
						<span class=\'s\' rate=\'8\'>★</span>
						<span class=\'s\' rate=\'10\'>★</span>
						';
				break;
		default:
				echo '
						<span class=\'s\'>★</span>
						<span class=\'s\'>★</span>
						<span class=\'s\'>★</span>
						<span class=\'s\'>★</span>
						<span class=\'s\'>★</span>
						';
				break;
		}
		**/

}
function update_rank($id,$no,$goal)
{
		global $db;
		global $res;
		$res[$no][10]++;
		$query='update b_article set vote=\''.$res[$no][10].'\',rank=\''.$goal.'\'where no=\''.$id.'\'';
		$db->_update($query);
}
function create_third($name,$avatar,$third_id)
{
	$user_id='qq'.$third_id;
		global $db;
		$query='insert into b_third value(\''.$user_id.'\',\''.$name.'\',\'\',\'\',\''.$avatar.'\',\''.$third_id.'\')';
		$res=$db->_insert($query);
}
//set the third part user_account 
function update_third($email,$url,$third_id)
{
		global $db;
		$query='update b_third set email=\''.$email.'\',url=\''.$url.'\' where third_id=\''.$third_id.'\'';
		$db->_update($query);
}
//函数 过滤HTML标签，去掉单引号等特殊符号
function remove_html_tags($content) {
$value = strip_tags($content);

return is_array($value) ? array_map('k::htmlspecialchars', $value) : preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array(
'&',
'"',
'<',
'>',
'\''
) , array(
'&amp;',
'&quot;',
'&lt;',
'&gt;',
'’'
) , $value));
}
$action=@$_GET['action'];
if($action=='log_out')
{
		setcookie('openid','',time()-3600);
		header('location:http://www.uuuuj.com');
}
//获取评论数量
function
?>
