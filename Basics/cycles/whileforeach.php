<?php

$test =10;
while ($test <=20)
{
echo 'Test' . $test. '<br/>';
$test++;
}


$names =array(
'Jonny',
'Abraham',
'Whisker',
'Woody'
);

foreach ($names as $value)
{

	echo $value . '<br/>';
}

	$numbers = array (5,10,25,50);

	foreach ($numbers as $num )
	{
		echo 'Куб числа ' . $num . ': ' . ($num * $num) . '<br>';
	}

	