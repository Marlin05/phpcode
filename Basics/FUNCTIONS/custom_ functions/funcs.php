<?php


/*function sum ($a, $b) { // пар.функ.
	echo $a + $b;
	echo '<br>';
}
*/
// парам по ум.
/*function sum($a = 1, $b = 2){
	$a = 300; // перем.внутри функции echo $ a = 300
	echo $a + $b;
	echo '<br>';
}*/


/*function sum($a, $b){ // echo $a = 5
	//$a = 100; echo sum (a + b) 100 +10  = 110
	echo $a + $b;
	echo '<br>';
	$a = 100; // echo 15 
	
}*/

// передача пер. по ссылке

/*function sum(&$a, $b){ 
	//$a = 100;
	echo $a + $b;
	echo '<br>';
	$a = 100;
	
}*/

function sum($a, $b){
	// echo $a + $b;
	/*$c = $a + $b; // сохранение в пер.
	return $c;*/
	//return $a + $b; // вывод ьез сохр. в пер.
}

// возвр. ключи arr
function my_array_keys($arr){
	$data = []; // объявляем пустой arr
	//is_array(var) - проверяет пустой ли arr
	foreach($arr as $k => $v){
		$data[] = $k; // добавл. пер. k
	}
	return $data;
}