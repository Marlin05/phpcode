<?php

class Page {
	
	const NUMBER = 1;
	const HOST = 'localhost';
	//const  = 'Viktor';
	
	public function get_const() {
		echo self::NUMBER; 
	}
	
}

//echo Page::NUMBER;

class Index extends Page {
	
	public function __construct() {
		echo self::NUMBER;
	}
}

$page = new Page();
$page->get_const();

echo '<br>';
$index = new Index();

if(defined("Page::NUMBER")) {
	echo 'Constant exist';
}
else  {
	echo 'No';
}
?>