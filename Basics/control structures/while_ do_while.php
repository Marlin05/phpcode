<?php error_reporting(-1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php

/*$i = 1;
while($i <= 10){
	echo $i . '<br>';
	$i++; // $i = $i + 1; $i += 1;
}*/
/*
$i = 1;  // инициализируем счётчик для строк
echo "<table border=\"1\">\n"; // border 1 - границы ячеек
while($i <= 15){
	echo "\t<tr>\n"; // \t - горизонтальнвя табуляция - tr вложен в table т.е. дочерний тэг
	// \n - чтобы td был на след.стр.ниже
	 // условие выполняется, открываем тэг стр.
	$n = 1;
	while($n <= 5){ // 1 цикл- выполняется стр.1  колонка 1
		// 2 раз - n по прежнему = стр.1  колонка 2
		// 3 раз - n по прежнему = стр.1  колонка 3
	
		echo "\t\t<td>Row $i | Col - $n</td>\n";
		$n++;
	}
	echo "\t</tr>\n";  // после 3 итераций закрывается тэг строки и увелич. счётчик 
	// \n - перенос строки
	// \t - символ табуляции
	$i++;
}
echo '</table>';
*/

// выбор года
/*$year = 1900;
echo '<select>' . "\n"; //  . "\n" - перенос стр.
	while($year <= 2015){
		echo "\t<option value='$year'>$year</option>\n";
		$year++;
	}
echo '</select>';
*/



/*$i = 11;
while($i <= 10){
	echo $i++ . '<br>';
}*/

// в цикле do while вначале выполняется действие, затем проверяется условие
/*$i = 10;
do{
	echo $i++ . '<br>';
}while($i <= 10); // если невып. усл 1 раз будет вып.набор действий
*/


/* // таблица умножения
$cols=10;
$rows=10;
$tr=1;

echo "<table border='1'>" ;

while($tr<=$rows){
  echo "<tr>" ; 
  $td=1;
  while ($td<=$cols){
    echo "<td>".$tr*$td."</td>";
    $td++; 
  }
  echo "</tr>";
  $tr++ ;
}
*/

// 2 вариант таблицы *

$x = 1; // горизонтальная ось, нач. счётчик с 1 т.е. 1 ряд
// ряды rows - ось х колонки cols - ось у
// тэг таблицы:
echo "<table border='1'>\n";
while($x <= 10){
	echo "\t<tr>\n";
	$y = 1;
	//строим 9 ячеек:
	while($y <= 10){
		echo "\t\t<td>$x * $y = " . $x * $y . "</td>\n";
		$y++;
	}
	echo "\t</tr>\n";
	$x++;
}
echo '</table>';
?>

</body>
</html>