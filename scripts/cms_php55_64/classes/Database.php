<?php

class Database {
	public $db;
	
	public function __construct($host,$user,$pass,$db) {
		$this->db = mysql_connect($host,$user,$pass);
		if(!$this->db) {
			exit('No connection with database');
		}
		if(!mysql_select_db($db,$this->db)) {
			exit('No table');
		}
		
		mysql_query("SET NAMES cp1251");
		
		return $this->db;
	}
	
	public function get_all_db() {
		$sql = "SELECT id,title,discription FROM statti LIMIT 10";
		
		$res = mysql_query($sql);
		
		if(!$res) {
			return FALSE;
		}
		for ($i = 0;$i < mysql_num_rows($res); $i++) {
			$row[] = mysql_fetch_array($res,MYSQL_ASSOC);
		}
		
		return $row;
	}
	
	public function get_one_db($id) {
	
		$sql = "SELECT id,title,text FROM statti WHERE id='$id'";
		$res = mysql_query($sql);
		// var_dump($res);
		if(!$res) {
			return FALSE;
		}
		$row = mysql_fetch_array($res,MYSQL_ASSOC);
		// так как выборка из одного ряда то выз. функ. 1 раз
		//print_r($row);
		return $row; // возвр. arr с ключ. id, title, text
	}
}

?>