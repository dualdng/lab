<?php
class mysql_con
{
		private $db;
		private $res;
		private $query;
		function __construct()
		{
				$this->db=new mysqli(url,usrname,passwd,database);
				if(mysqli_connect_errno())
				{
						echo 'can not connect the database';
				}
		}
		function query($query)
		{
				$res=$this->db->query($query);
				if(empty($res))
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
		function fetch_assoc($query)//return on result 
		{
				$res=$this->query($query);
				$res=$res->fetch_assoc();
				return $res;
		}
		function _insert($query)
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
