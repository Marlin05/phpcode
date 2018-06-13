<?php
   /* function TestRegularFirst(){
        $text='Карл у Клары украл кораллы, а Клара у Карла украла кларнет .';
        echo '<strong>Пример:</strong> '.htmlspecialchars($text); 
            preg_match_all("/(Клар.*?)\s/i",$text,$result); 
        echo '<br/><strong>Результат:</strong> <pre>'.var_export($result[1],true).'</pre>';
    }
    TestRegularFirst();
*/

    //Инициализируем cURL-сессию
$ch = curl_init ("https://www.web2cat.ru/");
 
//открываем для записи файл yandex.txt
//сюда внесём исходный html-код
$fp = fopen ("web2cat.txt", "w");
 
//указываем куда копировать содержимое
curl_setopt ($ch, CURLOPT_FILE, $fp);
 
//Заголовок - не выводим
curl_setopt ($ch, CURLOPT_HEADER, 0);
 
//Поехали!
curl_exec ($ch);
 
//Закрываем cURL-сессию
curl_close ($ch);
 
//Закрываем дексриптор файла
fclose ($fp);
 
//И вставляем на страницу полученный код
include 'web2cat.txt';

?>


