<?php error_reporting(-1);
// TODO add 1 element to array

/*$arr = ['Ivanov', 'Petrov', 'Sidorov'];

// $arr[3] = 'Pupkin';
$arr[] = 'Pupkin';
$arr[] = 'Doe';
print_r($arr);

$names = [
	'Ivan' => 'Ivanov',
	'Petr' => 'Petrov',
	'Sidor' => 'Sidorov',
];*/
// print_r($names);
$i = 1;  //объявление цикла
while( $i < 10 ){  // условие
	echo $i . "<br>";
	$i++; // увеличение
}


/*for($i = 1; $i < 11; $i++){
	echo $i . "<br>";
}*/
/*
//вывод кол. эл. массива arr
// пока счётчик меньше кол-ва эл.arr вып. действия в теле цикла и ув.счётчик
for($i = 0; $i < count($arr); $i++ ){
	echo $arr[$i] . '<br>';
*/

//выпадающий счётчик с циклом for
/*
echo '<select>';  // выпадающий список
for($i = 1900; $i <= 2016; $i++){
	echo "<option>$i</option>";
}
echo '</select>';
*/

}