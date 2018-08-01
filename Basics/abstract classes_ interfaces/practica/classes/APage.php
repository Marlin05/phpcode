<?php
include 'IPage.php';
abstract class APage implements IPage {
	
	// ядро класса, где переопр.все методы интерфейса IPage
	protected $text;
	protected $db;//object classa Database
	
	public function get_all() {
		$this->db = $this->conn();
		$this->text = $this->db->get_all_db();
	}
	//переопр.метод
	// опр.объект класса db
	//объект возвр. методом conn
	// в сво-во текст возвр.отраб.мет.get_one_db т.е. полный текст статьи
	public function get_one($id) {
		$this->db = $this->conn();
		$this->text = $this->db->get_one_db($id);
	}
	//возвр.дескриптор подкл. к б.д. п. 19 Database.php
	protected function conn() {
		return new Database(HOST,USER,PASS,DB);
	}
	
	public function get_body($text,$file) {
		
		ob_start();
		include $file.'.php';
		
		
		return ob_get_clean();
	}
}
?>