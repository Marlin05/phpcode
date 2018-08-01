<?php
class Page {
	
	public $text;
	
	public function get_all() {
		$db = new Database(HOST,USER,PASS,DB); // объект класса Databese и передаём 4 константы из конфига
		$result = $db->get_all_db();
		
		return $result; // сюда вначале попадает res arr из get_all_db и затем res. попадает в пер. text п.10 index.php
	}
	
	public function get_one($id) {
		$db = new Database(HOST,USER,PASS,DB);
		$result = $db->get_one_db($id); // пер. id, кот. опис. в index.php п/11
		
		return $result;
	}
	// ук. main в пер. file
	public function get_body($text,$file) {
		
		ob_start(); // весь вывод из res п.20 index.php попадает в буфер обмена
		include $file.'.php'; // подкл.file main.php 
		
		
		return ob_get_clean(); //возвр.вывод из буфера и выводим в index.php echo $page->get_body($text,'main');
	}
}
?>