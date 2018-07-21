<?php error_reporting(-1);

header('Content-Type: text/html; charset=utf-8');

/*
http://php.net/manual/ru/ref.strings.php
http://php.net/manual/ru/ref.mbstring.php

array explode ( string $delimiter , string $string [, int $limit ] )
string implode ( string $glue , array $pieces ) || join()
string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )
string rtrim ( string $str [, string $character_mask ] )
string ltrim ( string $str [, string $character_mask ] )
string md5 ( string $str [, bool $raw_output = false ] )
string sha1 ( string $str [, bool $raw_output = false ] )
string nl2br ( string $string [, bool $is_xhtml = true ] )

mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
mixed str_ireplace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
string strip_tags ( string $str [, string $allowable_tags ] )
int strlen ( string $string )

mixed mb_strlen ( string $str [, string $encoding = mb_internal_encoding() ] )
int mb_strpos ( string $haystack , string $needle [, int $offset = 0 [, string $encoding = mb_internal_encoding() ]] )
string mb_strtolower ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_strtoupper ( string $str [, string $encoding = mb_internal_encoding() ] )
string mb_substr ( string $str , int $start [, int $length = NULL [, string $encoding = mb_internal_encoding() ]] )
string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
string htmlspecialchars_decode ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 ] )
string htmlentities ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
*/

/*$str = 'Иванов Иван Иванович';
$data = explode(' ', $str); // разделяет строку на эл. массива  Array ( [0] => Иванов [1] => Иван [2] => Иванович )
print_r($data);*/
/*echo $data [0];// Иванов
echo $data [1]; //Иван
*/
/*$data = ['Иванов', 'Иван', 'Иванович'];
echo $str = implode(' ', $data); // 1 парам. стр., 2 парам. arr все эл. будут объед. в 1 стр. // Иванов Иван Иванович*/
//print_r ($data);

//trim удалаяет символы из начала и  конца стр. 
// \n- перенос стр.кода
/*$str = "\t<p>Hello</p>\n"; 
$str .= "\n<p>world!</p>\t";
// echo $str;
echo trim($str, "\t"); // удаляет символ табуляции
*/
/*$str = '..... test,';
echo rtrim($str, ',');*/

/*$str = 'password';
echo md5($str); // не реком.исп.
echo md5(md5($str)); // двойное штфрование тоже неактуално
password_hash // более соврем
echo md5($str);
*/
// заменяет переводы строк на тэг break <br> где поставлены переводы стр.
//$str = "Hello\nworld\n";
//echo($str); // echo
/*Hello
world*/
//echo nl2br($str);
/*Hello<br />
  world<br />*/


