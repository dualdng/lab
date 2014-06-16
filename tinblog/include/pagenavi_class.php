<?php
class pagenavi
{
		private $page;
		private $pagesize;
		private $url;
		private $pagenum;
		static private $instance=null;
		function getInstance()
		{
				if(self::$instance==null)
				{
						self::$instance=new self();
				}
				return self::$instance;
		}
		function _pagenavi($page,$pagesize,$url,$pagenum)
		{
				$this->page=$page;
				$this->pagesize=$pagesize;
				$this->url=$url;
				$this->pagenum=$pagenum;
				if($this->pagenum==1)
				{
				}
				else
				{
						if($this->page!=1)
						{
								echo '<a href=\''.$this->url.'page='.($this->page-1).'\'>Pre</a>&nbsp';
						}
						for($i=1;$i<=$this->pagenum;$i++)
						{
								while($i==$this->page)
								{
										echo $i.'&nbsp';
										break;
								}
								while($i!=$this->page&$i<($this->page+4))
								{	
										echo '<a href=\''.$this->url.'page='.$i.'\'>'.$i.'</a>&nbsp';
										break;
								}
								while($i>($this->page+4))
								{
										echo '...&nbsp<a href=\''.$this->url.'page='.$this->pagenum.'\'>'.$this->pagenum.'</a>&nbsp';
										break;
								}
						}
						if($this->page!=$this->pagenum)
						{
								echo '<a href=\''.$this->url.'page='.($this->page+1).'\'>Next</a>';
						}
				}
		}
}
?>
