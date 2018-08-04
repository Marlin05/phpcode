<?php
class Archive implements IWidgets{
	public $arc;
	
	public function init() {
		$this->arc[] = 'Feb';
		$this->arc[] = 'Mar';
		$this->arc[] = 'April';
		$this->arc[] = 'May';
	}
	
	public function get_body() {
		return $this->arc;
	}
}
?>