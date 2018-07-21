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

// ищет символ в стр.
/*$str = 'Привет, мир!';
// echo mb_strpos($str, 'и', 3, 'utf-8');

if (mb_strpos($str, 'и', 3, 'utf-8')) echo 'OK';
else echo 'NO'; // echo OK
*/

/*$str = 'Привет, мир!';
echo (mb_strpos($str, 'П', 0, 'utf-8')); 
if (mb_strpos($str,'П',0,'utf-8')) echo 'OK';
	else echo 'NO'; // echo 0 NO т.к. нум в стр. с 0 сим.П=0 = true, но  0 в php = NO 
*/

/*$str = 'Привет, мир!';
echo (mb_strpos($str, 'П', 0, 'utf-8')); 
if (mb_strpos($str,'П',0,'utf-8') !== false ) echo 'OK';
	else echo 'NO'; // 0OK
*/
/*

if( 0 !== false ) echo 'OK'; // при строгом сравнении 0 = не булев тип, а false - integer
else echo 'NO';// OK */

/*$str = 'привет, мир!';
$str2 = 'ПРИВЕТ, МИР!';

// перевод стр
 echo mb_strtoupper($str, 'utf-8'); // приводит к верхнему регистру
 echo mb_strtolower($str, 'utf-8'); // нижний рег.
*/

// взять часть стр
/*$str = 'Привет, мир!';
// взять из стр. слово Привет
echo mb_substr($str, 0, 6, 'utf-8'); // Привет
echo '<br>';
echo mb_substr($str, 1, null, 'utf-8'); // ривет, мир!
echo '<br>';
echo mb_substr($str, 8, 3, 'utf-8'); // с 8 символа 3 символа мир
echo '<br>';
echo mb_substr($str, -4, 3, 'utf-8'); // 4 символа с конца строки взять 3 предыдущих мир
*/

/*$str = '&amp;<h1><i>Привет</i>! Меня зовут <b>Вася</b>!</h1><iframe src="http://astrovok.iforum.name/" height="100%" width="100%"></iframe><script>alert(\'XSS\')</script>';
echo htmlspecialchars($str, ENT_QUOTES, 'utf-8', false);
//echo $str;
*/

/*$str = '&amp;&lt;h1&gt;&lt;i&gt;Привет&lt;/i&gt;! Меня зовут &lt;b&gt;Вася&lt;/b&gt;!&lt;/h1&gt;&lt;iframe src=&quot;http://webformyself.com&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;&lt;/iframe&gt;&lt;script&gt;alert(&#039;XSS&#039;)&lt;/script&gt;';
echo htmlspecialchars_decode($str);*/

