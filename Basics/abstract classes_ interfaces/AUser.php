<?php
 
 abstract class AUser implements IUser {
 	// kod klassa
	public $user = 'Viktor';
	public $role;
	
	public function get_user($a) {
		return $this->user;
	}
	
	public function get_role() {
		
	}
	public function call() {
		
	}
	
	abstract function can($a,$b);
	
 }
 
 
 
?>