<?php
require 'config.php';

header('Content-type: text/html; charset=utf-8');

class Database {
	public $db;
	
	public function __construct($host,$user,$pass,$db) {
		/*$this->db = mysqli_connect($host,$user,$pass);*/
		
	/*	$this->db = mysqli_connect($host, $root, $pass, $db)*/
		
	//	 or die('Ошибка соединения с БД');

		/*$this->db = @mysqli_connect($host, 'root', '', 'my_bd') or die('Ошибка соединения с БД');*/
		/*$db = @mysqli_connect('localhost', 'root', '', 'gb') 
		or die('Ошибка соединения с БД');
*/

		/*$link = mysqli_connect(‘localhost’, $user, $pass, $db);*/
		 $db = mysqli_connect(HOST, USER, PASS, DB);
   if (mysqli_connect_errno()) {
       $this->error_tpl('Не удалось подключиться к базе данных', mysqli_connect_error());
       die();
   }
   if (!mysqli_set_charset($db, "utf8")) {
       $this->error_tpl('Ошибка базы данных', mysqli_error($db));
       die();
   }
   return $db;

		
		
	/*	mysqli_query("SET NAMES cp1251");*/
	//	mysqli_query($link, ‘set names cp1251’)
		/*mysqli_set_charset($db, "SET NAMES cp1251") or die('Не установлена кодировка');*/
		mysqli_query($link, "utf8")  or die('Не установлена кодировка');


		
		return $this->db;
	}
	
	public function get_all_db() {
		
		/*$db = mysqli_connect('', 'root', 'pass') or die('Error connect');*/
 
		$sql = "SELECT id, title, discription FROM statti";
		
		//$res = mysqli_query($db, $query);
		$result = mysqli_query ($connect, "SELECT ".$fields." FROM `".$statti."`");
		
		/*$res = mysqli_query($db, $query);*/
		/*$res = mysqli_query($link, $query,"SELECT * id,title,discription FROM statii") or die("ERROR: ".mysqli_error());*/
/*$result = mysqli_query( $db, $query, "SELECT id,title, discription FROM statti") or die("ERROR: ".mysqli_error());*/
if(!$res) {
			return FALSE;
		}
		for ($i = 0;$i < mysqli_num_rows($res); $i++) {
			$row[] = mysqli_fetch_array($res,MYSQL_ASSOC);
		}

	



		/*$db = mysqli_connect('127.0.0.1', 'root', '') or die('Error connect');

$sql = "SELECT id,title,discription FROM statti";*/

//$query = mysqli_query($db,$query);
//var_dump($res);

/*$res = mysqli_fetch_assoc($db);*/
/*$result = mysqli_query($mysqli, $link,'SELECT * FROM statii') or die("ERROR: ".mysqli_error());
*/
//$link = mysqli_connect($host,$user,$pass,$db);
/*$res = $db->query('SELECT  id,title,discription FROM statti') or die("ERROR: ".mysqli_error($link));

*/
/*$messages = get_all_db($id);*/
		return $row;


	}


	
	public function get_one_db($id) {
	
		/*$sql = "SELECT id,title,text FROM statti WHERE id='$id'";*/

		$sql = "SELECT id,title,text FROM statti WHERE id=?";
		$res = mysqli_query($sql,$query);
		
		if(!$res) {
			return FALSE;
		}
		$row = mysqli_fetch_array($res,MYSQL_ASSOC);
		
		return $row;
	}
}

?>
