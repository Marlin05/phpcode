<?php
class DbException1 extends Exception {
	public function __construct($msg) {
		parent::__construct($msg);
		$this->write_log($msg);
	}
	
	protected function write_log($msg) {
		$data = 'ERROR - '.$msg."\n";
		file_put_contents('log1.txt',$data,FILE_APPEND);
	}
}
?>