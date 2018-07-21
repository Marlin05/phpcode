<?php

$students = array('Иванов','Петров','Сидоров');
$fructs = ['Orange','Banana', 'an Apple'];
 
 /* ассоциативный массив */
 
 $sinth = ["стол" => 'Дубовый', 'cтул'=> 'Хреновый'];
 //echo $sinth["стол"];
 
 /* нумерованный массив*/
$students [2] ='Фурман';


//echo $students[2];

//print_r($sinth);

//циклы

//foreach ($students as $key => $value) {
//	echo $value .  "привет!<br>";
//}

/* for ($i=0; $i<5; $i++){
	echo $i . '<br>';	
} */

// ссылки

$a = 5;
$b = &$a;

$b = 17;
$a = 2;
echo $b;
