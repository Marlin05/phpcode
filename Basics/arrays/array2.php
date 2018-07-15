<?php error_reporting(-1);
// TODO add 1 element to array
$arr = array('Ivanov', 'Petrov', 'Sidorov');

$goods = [
	[
		'title' => 'Nokia',
		'price' => 100,
		'description' => 'Description'
	],
	[
		'title' => 'iPad',
		'price' => 200,
		'description' => 'Description'
	],
];


$arr[] = 'Li';
//$arr[15] = 'Li'; // с конкр. инд.
/*echo "<pre>";
print_r($arr);
echo "</pre>";
*/

//echo count ($goods,1); // общее кол-во arr
/*
count
array_diff // ищет те значения кот. нет в других arr

$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);
*/

//array_intersect // вычисляет схождение arr

/*$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);*/


/*
array_key_exists // наличие ключей в arr,
возвр. либо true либо false
*/
/*$search_array = array('first' => 1, 'second' => 4);
if (array_key_exists('first', $search_array)) {
    echo "Массив содержит элемент 'first'.";
}*/


/*
//array_keys -  выбирает ключ
*/
//$result = array_keys($arr);
/*$result = array_keys($goods[0]);
echo "<pre>";
print_r($result);
echo "</pre>";
*/
/*
array_values // выбирает значения
array_merge // сливает arr
// перезапис. только стр кл. числовые ключи не меняет- добавл. в конец arr
*/
/*$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);
*/
//2 способ
/*
$array1 = array();
$array2 = array(1 => "data");
$result = array_merge($array1, $array2);
print_r($result);*/



//array_rand - Выбирает один или несколько случайных ключей из массива

/*$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2); // 2 соnst
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";
/*


array_reverse // возвр. arr в обратном порядке

/*
$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
print_r($reversed);
print_r($preserved); 
*/
/*$result = array_reverse ($arr);*/
/*$result = array_reverse ($arr, true); // переворачивает arr, сохр. ключи

print_r($result);
*/

//compact
/*$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";

// реал. без функц.
/*$result = [
	$city  = "city";
	$state = "state";
	$event = "event"

];*/

    // реал. с функцией
/*	$result = compact('city','state','event');
	echo "<pre>";
	print_r($result);
	echo "</pre>";

*/




//extract - Импортирует переменные из массива в текущую таблицу символов
	// работает только с acc.arr

/* Предположим, что $var_array - это массив, полученный в результате
   wddx_deserialize */

/*$size = "large";
$var_array = array("color" => "blue",
                   "size"  => "medium",
                   "shape" => "sphere");
extract($var_array, EXTR_PREFIX_SAME, "wddx");

echo "$color, $size, $shape, $wddx_size\n";
// echo blue, large, sphere, medium
*/


/*$result = [
    'city'  => 'SF',
	'state' => 'CA',
	'event' => 'do',
];
extract($result); // извлечёт из arr и создаст пер.
echo $city; 
//var_dump($city); // string(2) "SF"
*/

/*
//  

arsort // Сортирует массив в обратном алф.порядке, сохраняя ключи
asort // сортирует в алф. порялке с сохр. кл.
sort // в прямом порядке не сохр. кл.
//подх.для нум.arr
rsort // в обратн. поряд. и удалит все сущ.кл.

array_combine
array_search
array_shift
array_unique
array_unshift
array_flip
array_pop
array_push
in_array
list
*/



