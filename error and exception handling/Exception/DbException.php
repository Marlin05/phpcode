<?php
// создаём свой обработчик ошибок db 
class DbException extends Exception {
	public function __construct($msg) {
		parent::__construct($msg);
		$this->write_log($msg); //вызов
	}
	// парам сообщение $msg
	protected function write_log($msg) {
		$data = 'ERROR - '.$msg."\n"; 
		file_put_contents('log.txt',$data,FILE_APPEND); // каждый раз будет записывать за предыдущими
	}
}
?>