<?php error_reporting(-1);




$arr = array('Ivanov', 'Petrov', 'Sidorov');
// var_dump($arr);

// echo $arr;
/*echo "<pre>";
print_r($arr);
echo "</pre>";*/

// echo $arr[1];

// $var = 'Ivanov';
// $var = 2;
// echo $var;

$arr2 = [
	1,
	2,
	[
		'banana',
		'orange',
		'apple'
	],
	4,
	'cat',
	6,
	7,
	8,
	9,
	10,];
/*echo "<pre>";
print_r($arr2);
echo "</pre>";*/

// echo $arr2[2][2];

$arr3 = [
	2 => 'Ivanov',
	4 => 'Petrov',
	10 => 'Sidorov',
	'Pupkin'
];
/*echo "<pre>";
print_r($arr3);
echo "</pre>";
echo $arr3[10];*/
/*
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
	]
];

echo "<pre>";
print_r($goods);
echo "</pre>";

echo $goods[0]['title'] . ' - ' . $goods[0]['price'];
echo '<br>';
echo $goods[1]['title'] . ' - ' . $goods[1]['price'];
*/

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
	[
		'title' => 'Sony',
		'price' => 300,
		'description' => 'Description'
	]
];

/*echo $goods[0]['title'] . ' - ' . $goods[0]['price'];
echo '<br>';
echo $goods[1]['title'] . ' - ' . $goods[1]['price'];*/

$i = 0;
while($i < 3){
	echo $goods[$i]['title'] . ' - ' . $goods[$i]['price'];
	echo '<br>';
	$i++;
}