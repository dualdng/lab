<?php
class mysql_con
{
		public $db;
		private $res;
		private $query;
		function __construct()//init the mysqli connect
		{
				$this->db=new mysqli(url,usrname,passwd,database);
				if(mysqli_connect_errno())
				{
						echo 'can not connect the database';
				}
		}
		function query($query)//query the sqls
		{
				$res=$this->db->query($query);
				$this->db->query('set names utf8');
				if(!$res)
				{
						echo 'can not query the value';
						exit;
				}
				return $res;
		}
		function fetch_all($query)//select all result,array like arr[0][0]
		{
				$res=$this->query($query);
				$res=$res->fetch_all();
				return $res;
		}
		function fetch_assoc($query)//return one result 
		{
				$res=$this->query($query);
				$res=$res->fetch_assoc();
				return $res;
		}
		function row_num($query)
		{
				$res=$this->query($query);
				$num=$res->num_rows;
				return $num;
		}
		function _insert($query)//insert
		{
				$res=$this->query($query);
				return $res;
		}
		function _update($query)
		{
				$res=$this->query($query);
				return $res;
		}
		function _delete($query)
		{
				$res=$this->query($query);
				return $res;
		}
		function __destruct()	
		{
				$this->db->close();
		}
}
?>
