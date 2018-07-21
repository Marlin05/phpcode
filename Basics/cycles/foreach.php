<?php error_reporting(-1);


// foreach 


$arr = ['Ivanov', 'Petrov', 'Sidorov'];

// эл. идут не попорядку
$arr[5] = 'Pupkin';
$arr[] = 'Doe';
echo '<pre>';
print_r($arr);
echo '</pre>';

$names = [
	'Ivan' => 'Ivanov',
	'Petr' => 'Petrov',
	'Sidor' => 'Sidorov',
];

/*echo '<pre>';
print_r($names);
echo '</pre>';
*/
// 
/*foreach($names as $name){ // все данные попадают в пер.name
	echo $name . '<br>';
} // echo: 
	/*Ivanov
	  Petrov
	  Sidorov*/

/*foreach($names as $name => $surname){ // $name - ключ $surname - знач.
	echo "Name: $name, Surname: $surname <br>";
} // echo: Name: Ivan, Surname: Ivanov 
	/*Name: Petr, Surname: Petrov 
	  Name: Sidor, Surname: Sidorov */


/*foreach($arr as $k => $v){
	echo "Key: $k, Name: $v <br>"; // ключ Key сод.в перем.$k и Name сод. в перем. $v
} // echo:
/*  Key: 0, Name: Ivanov 
	Key: 1, Name: Petrov 
	Key: 2, Name: Sidorov 
	Key: 5, Name: Pupkin 
	Key: 6, Name: Doe  
	
	print_r $arr :
	[0] => Ivanov
    [1] => Petrov
    [2] => Sidorov
    [5] => Pupkin
    [6] => Doe
)
	*/

 
// $a = 2;
/*if( $a > 3 && $a < 7 ){ // а > 3 и < 7 
	echo 'Ok';
}else{
	echo 'No';
}*/
/*if( $a > 3 || $a < 7 ){ // or- если хотя бы одна из частей true
	echo 'Ok';
}else{
	echo 'No';
}*/

/*for($i = 0; $i <= 30; $i++){
	echo $i . '<br>';
	if( $i == 5 ){
		echo '<h1>Found!!!</h1>';
		break;
	}
}*/


/*
for($i = 0; $i <= 10; $i++){
	if( $i == 5) continue; // если i = 5, то это число пропустит
	echo $i . '<br>';
	 }
*/


/*for($i = 0; $i <= 30; $i++){
	if( $i == 10 || $i == 20 ) continue; // 10 и 20 пропустит
	echo $i . '<br>';
}
*/
/*$x = 1; 
echo "<table border='1'>\n";
for($i = 0; $i <= 50; $i++){
	 if( $i == 0 || $i == 10) continue;
	 //echo $i . '<br>';
	 echo "\t<tr>\n";
     if ($i == 20 || $i == 30) continue;
  	 echo "\t<tr>\n";
    // echo $i . '<br>';
     if ($i == 50) continue;
	 echo "\t<tr>\n";
	 // echo $i . '<br>';
}
echo '</table>';
*/





/*
for($i = 0; $i <= 30; $i++){
	if( $i >= 10 && $i <= 20 ) continue; // пропустит все числа больше 10 и меньше 20 т.е. от 10 до 20
	echo $i . '<br>';
}


for($i = 1; $i <= 30; $i++){
	if( $i >= 10 || $i <= 20 ) continue; //  1 < 20  = true если хоть 1 из частей явл. истиной усл. выполняется, поэтому ничего не выведет
	если число будет больше 20, то тоже true т.к. >10
	echo $i . '<br>';
}
*/

