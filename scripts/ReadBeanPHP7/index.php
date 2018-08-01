<?php
//include 'config.php';
//include 'classes/Page.php';
//include 'classes/Database.php';
require 'rb/rb.php';


 R::setup('mysql:host=127.0.0.1;dbname=my_bd', 'root', '' );
 if ( !R::testConnection()) {

 	exit ('No connection');
 }

 

/*
$cats = R::findAll('statti');*/

/*$cat = R::findAll('statti', 'id > ?', [1]);
echo '<pre>';
/*
print_r($cat);
*/
/*$cat = R::findAll('statti', 'id > ?', [1]); foreach($cat as $c){ echo $c->id;
 
 }*/
 
/*
$cat = R::findAll('statti', 'id > ?', [0]); foreach($cat as $c){ echo'<br>', $c->title, $c->discription, $c->text; }

*/
$cat = R::findAll('statti', 'id > ?', [0]); foreach($cat as $c){ echo $c->title.' <br> '.$c->discription.' <br> '.$c->text; }

/*
$cat = R::load('statti',1);
$c = R::load('statti',2);
echo $cat->title;
echo '<br>';
echo $cat->discription;
echo '<br>';
echo $cat->text; // работаем с данными, как с объектом
echo '<br>';

echo $c['title'];
echo '<br>';
echo $c['discription'];
echo '<br>';
echo $c['text'];
*/


 // работаем с данными, как с массивом

/*$name = 'yan';
$game = R::findOne('game', 'name = ?', array($name));
 echo implode($game) . '<br>';*/

R::close();
  // R::setup( 'sqlite:/tmp/dbfile.db' );
/*$page = new Page();
if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	if($id != 0) {
		$text = $page->get_one($id);
		echo $page->get_body($text,'view');
		exit();
	}
	else {
		exit('wrong parameter');
	}
}
else {
	$text = $page->get_all();
	echo $page->get_body($text,'main');
	
}
*/
?>