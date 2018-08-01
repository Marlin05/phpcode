<?php

include 'config.php';
include 'classes/APage.php';
include 'classes/Page.php';
include 'classes/View.php';
include 'classes/Database.php';



if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	if($id != 0) {
		$view = new View(); // 1 объект класса view
		$text = $view->get_one($id);
		echo $view->get_body($text,'view');
		exit();
	}
	else {
		exit('wrong parameter');
	}
}
else {
	$page = new Page(); // 2 объект класса page
	$text = $page->get_all();
	echo $page->get_body($text,'main');
	
}

?>