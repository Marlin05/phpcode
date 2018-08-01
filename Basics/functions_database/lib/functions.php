<?php
 ini_set('display_errors',1);
error_reporting(E_ALL);

	/*$mysqli = false;
	function connectDB() {
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "mysite-local", "gb");
		$mysqli->query("SET NAMES 'utf8',");
	}*/
	
	function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

?>
