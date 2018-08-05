<?php error_reporting(-1);

require_once 'funcs.php';

/*function sum ($a, $b) { // пар.функ.
	echo $a + $b;
	echo '<br>';

}
sum (5,7);*/





$nums = [1,2,3];
$names = ['Ivanov', 'Petrov'];
$names2 = ['Ivan' => 'Ivanov', 'Petr' => 'Petrov']; // асс. arr

$test = [];

// в пер. keys вернём рез. раб. array_keys
$keys = array_keys($nums);
print_r($keys); // Array ( [0] => 0 [1] => 1 [2] => 2 )
//значения - ключи arr
echo '<br>';
$keys2 = my_array_keys($nums);
print_r($keys2); // Array ( [0] => 0 [1] => 1 [2] => 2 ) Array ( [0] => 0 [1] => 1 [2] => 2 )
echo '<br>';
$keys3 = my_array_keys($names2);
print_r($keys3); // Array ( [0] => Ivan [1] => Petr ) // Ivan и Petr - ключи

/*echo count($nums);
echo count($names);*/

/*$a = 200;
*/

/*function sum ($a, $b) { // пар.функ.
	echo $a + $b;
	echo '<br>';

}*/

// фун sum прин. 2 парам a b . а как их передаём - чилсами или перем - не имеет знач.

/*$x = 100;
$y = 10;

sum(5,7);
sum(10,5);
sum(5,10);
sum($x, $y);
sum(100);
*/
/*echo $a;
*/
// передача по &
/*$a = 5; 
$b = 10;
echo $a; // 5
echo '<br>';
sum($a,$b); // 15
echo $a; // 100
*/

/*$res = sum(1,2);
echo $res;*/

/*sum(1,2); // ничего не выведет
echo '<br>';
echo sum(1,2); // 3
echo '<br>';
echo 5 + sum(1,2); // 8
$res = sum(1,2); // сохр. рез. в пер. res 
echo '<br>';
echo  $res; // echo  return 3
echo '<br>';
echo  5 + $res; // echo 8
*/



