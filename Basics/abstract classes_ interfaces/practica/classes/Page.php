<?php
class Page extends APage{
	
	public function get_all() {
		parent::get_all();
		return $this->text;
	}
	
	
}
?>