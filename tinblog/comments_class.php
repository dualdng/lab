<?
include('mysql_class.php');
class comments extends mysql_con 
{
		function comments_no($no)
		{
		}
		function post_comments($no)
		{
				$query='insert';
		}
		function show_comments($no)//this is not in use
		{
				$query='select * from b_comments where no=\''.$no.'\' and pre_post_id=0 order by post_id asc';
				$result=parent::fetch_all($query);
				$rows=count($result);
				$pre_post_id=array();
				$post_id=array();
				for($i=0;$i<$rows;$i++)
				{
						echo '<div class=\'comments\'>';
						echo '<div class=\'author\'>'.$result[$i][3].'</div>';
						echo '<div class=\'author_avatar\'><a href=\''.$result[$i][5].'\'><img src=\'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $result[$i][4] ) ) ).'?s=80\'/></a></div>';
						echo '<div class=\'text\'>'.$result[$i][6].'</div>';
						$this->children_comments($result[$i][1]);
						echo '</div>';
				}
		}
		function children_comments($post_id)
		{
				$query='select * from b_comments where pre_post_id=\''.$post_id.'\' order by post_id asc';
				$result=parent::fetch_all($query);
				$result=$db->fetch_all($query);
				if(!empty($result))
				{
						$rows=count($result);
						for($i=0;$i<$rows;$i++)
						{
								echo '<div class=\'comments_children\'>';
								echo '<div class=\'author\'>'.$result[$i][3].'</div>';
								echo '<div class=\'author_avatar\'><a href=\''.$result[$i][5].'\'><img src=\'http://www.gravatar.com/avatar/'.md5( strtolower( trim( $result[$i][4] ) ) ).'?s=80\'/></a></div>';
								echo '<div class=\'text\'>'.$result[$i][6].'</div>';
								children_comments($result[$i][1]);
								echo '</div>';
						}
				}
		}
}
?>

