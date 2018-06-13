<?php
    

// 2 основных способа получения контента со страницы сайта:
//В первую очередь приготовим массив с нужными адресами страниц:


        //3 ссылки нашего сайта:
        $urls = array('http://hello-site.ru/blog/','http://hello-site.ru/web-notes/','http://hello-site.ru/games/');

       /* 1 вариант - php функция file_get_contents. Функция возвращает html-строку, которую мы будем парсить на ссылки:*/


        //помещаем каждую ссылку в функцию file_get_contents
        foreach($urls as $urlsItem){    
            $out .= file_get_contents($urlsItem);   //и добавляем содержание каждой страницы в строку
        }
        echo $out;  //здесь контент всех трех страниц
    
/*2 вариант - CURL. Библиотека, которая поддерживается php и имеет большой набор настроек, от POST-запросов до работы с FTP. Рассмотрим стандартный вызов библиотеки curl, который отдаст нам контент сайта:*/


        foreach($urls as $urlsItem){    //пропускаем каждую ссылку в цикле
            $output = curl_init();  //подключаем курл
            curl_setopt($output, CURLOPT_URL, $urlsItem);   //отправляем адрес страницы
            curl_setopt($output, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($output, CURLOPT_HEADER, 0);
            $out .= curl_exec($output);     //помещаем html-контент в строку
            curl_close($output);    //закрываем подключение
        }
        echo $out;  //здесь контент всех трех страниц
    
/*Теперь в нашей строке $out находится контент всех трех страниц. Итак, переходим непосредственно к парсингу нашей строки.Опять же хочу показать 3 варианта решения нашей задачи: "нативный" способ на php, с помощью встроенной библиотеки DOMDocument и библиотеки SimpleHTMLDOM.
1. php функция explode. Функция находит искомый символ или часть строки и делит целую строку на элементы массива.
Повторюсь, нам необходимо получить значения всех атрибутов href у тегов a, для этого будем делить общую строку на некоторые части\отрезки:*/


        // explode
        $hrefs = explode('<a',$out);    //делим нашу строку контента 3х страниц на элементы массива, разделенные "<a"
        unset($hrefs[0]);   //удаляем 1ый элемент, там точно ничего нет
        foreach($hrefs as $hrefsItem){  
            $arHref = explode('href="',$hrefsItem); //следующее деление строки на "href=""
            $arHref = explode('"',$arHref[1]);  //аналогично, но берем 2ой элемент массива
            $hrefText[] = $arHref[0];   //в этом случае наш нужный отрезок строки в 1ом элементе массива
        }

        foreach($hrefText as $hrefTextItem){    //избавляемся от ссылок с пустым атрибутом href
            if($hrefTextItem!=''){
                $clearHrefs[]=$hrefTextItem;
            }
        }
        $clearHrefs = array_unique($clearHrefs);    //избавляемся от одинаковых ссылок
        print_r($clearHrefs);   // в итоге у нас массив со всем ссылками с 3х страниц
    
//Если распечатать наш массив, будет примерно следующее:


     /*   Array
        (
            [0] => 
            [1] => /hello
            [3] => /timer/
            [4] => /leftmenu/
            [5] => /faq/
            [6] => /blog/
            [8] => /web-notes/
            [9] => /ordersite/
            [10] => /games
        )*/
    
/*2. встроенная библиотека DOMDocument. Работаем с классом примерно следующим образом:*/
//domelement
        $dom = new DOMDocument; //создаем объект
        $dom->loadHTML($out);   //загружаем контент
        $node = $dom->getElementsByTagName('a');   //берем все теги a
        for ($i = 0; $i < $node->length; $i++) {
            $hrefText[] = $node->item($i)->getAttribute('href');    //вытаскиваем из тега атрибут href
        }
        foreach($hrefText as $hrefTextItem){    //избавляемся от ссылок с пустым атрибутом href
            if($hrefTextItem!=''){
                $clearHrefs[]=$hrefTextItem;
            }
        }
        $clearHrefs = array_unique($clearHrefs);    //избавляемся от одинаковых ссылок
        print_r($clearHrefs);   // в итоге у нас массив со всем ссылками с 3х страниц

      /*  Результат такого кода ровно такой же, что и с помощью функции explode.

3. библиотека SimpleHTMLDOM. Ее необходимо подключать из файла. Работа примерно схожа с DOMDocument. Работаем с классом:*/
//simplehtml
        include('simple_html_dom.php');   //подключаем файл с классом SimpleHTMLDOM
        $html = new simple_html_dom();  //создаем объект
        $html->load($out);  //помещаем наш контент
        $collection = $html->find('a');     //собираем все теги a
        foreach($collection as $collectionItem) 
        {
            $articles[] = $collectionItem->attr;   //массив всех атрибутов, href в том числе
        }
        foreach($articles as $articlesItem){
            $hrefText[] = $articlesItem['href'];    //собираем в массив значения подмассива с ключом href
        }
        foreach($hrefText as $hrefTextItem){    //избавляемся от ссылок с пустым атрибутом href
            if($hrefTextItem!=''){
                $clearHrefs[]=$hrefTextItem;
            }
        }
        $clearHrefs = array_unique($clearHrefs);    //избавляемся от одинаковых ссылок
        print_r($clearHrefs);   // в итоге у нас массив со всем ссылками с 3х страниц
        //Результат в массив ровно такой же как и выше в двух вышеперечисленных.

 
?>
