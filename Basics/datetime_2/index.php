<?php error_reporting(-1);

header('Content-Type: text/html; charset=utf-8');

/*
http://php.net/manual/ru/ref.datetime.php

string date ( string $format [, int $timestamp = time() ] )
int time ( void )
string date_default_timezone_get ( void )
bool date_default_timezone_set ( string $timezone_identifier )
array getdate ([ int $timestamp = time() ] )
int strtotime ( string $time [, int $now = time() ] )
int mktime ([ int $hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1 ]]]]]]] )
mixed microtime ([ bool $get_as_float = false ] )

DateTime date_create ([ string $time = "now" [, DateTimeZone $timezone = NULL ]] )
DateTime date_add ( DateTime $object , DateInterval $interval )
string date_format ( DateTimeInterface $object , string $format )
date_interval_create_from_date_string()
DateInterval date_diff ( DateTimeInterface $datetime1 , DateTimeInterface $datetime2 [, bool $absolute = false ] )
*/

/*$date = date_create(date('Y-m-d H:i:s')); // в пер.date вызыв. функ. d_c с парам.
 var_dump($date); */
 // object(DateTime)#1 (3) { ["date"]=> string(26) "2018-07-22 22:53:47.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(13) "Europe/Moscow" }


/*$start = microtime(true);
$date = date_create(date('Y-m-d H:i:s'));
echo date_format($date, 'Y-m-d H:i:s');
date_add($date, date_interval_create_from_date_string('2 days + 2 hours + 10 minutes + 5 seconds'));
echo '<br>';
echo date_format($date, 'Y-m-d H:i:s');

*/

/*echo time(); // возвр.время без микросек
echo '<br>';
echo microtime(); //замеряет время раб.сайта
// var_dump(microtime(true));
*/
// замеряем нач.время:
$start = microtime(true); // присваиваем в пер. рез.функц. microtime
 usleep(1000000); // замараж. время выполн. скрипта  1 сек. в микросек.

// сколько времени займёт перебор счётчика  
 //  уст. 1, пока счётчик <= 1000 будет вып. набор действий ув.счётчик
for($i = 1; $i <= 1000; $i++){
	if($i == 1000) echo '<p>Отсчет завершен</p>';
}
//зам.конечное время
$end = microtime(true);
echo $end - $start; // разница 2 пер. конечного времени от стартового