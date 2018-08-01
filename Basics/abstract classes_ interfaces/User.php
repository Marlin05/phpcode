<?php
abstract class User extends AUser {
	
	public function get() {
		return $this->get_user($a);
	} 
	
	public function can($f,$c) {
		return TRUE;
	}
	
}
?>