<?php
    $handler = @fopen('a.txt', 'r'); // пытаемся открыть файл, кот.не сущ. 'r' - режим чтения. @- глушит ошибку т.е. её отключает
    if (!$handler) echo 'Ошибка открытия файла<br />'; // если файла нет -выводит сообщение

    //мы хотим проверить-отправлена форма или нет 
    // по правилам должно быть
    /*1 вар. if (isset($_POST['myform'])) {
   echo 'Форма отправлена';
    }*/
    //удобней так но без @ - Notice: Undefined index: myform in D:\sites\mysite.local\www\rus\index.php on line 11
//2 вар. if (empty ($_POST['myform'])) {  - проверка на сущ.
	// if (!empty($_POST['myform'])) {  //- возвращает true если переменная сущ.и имеет отл.от null, false знач.
//3 вар.
    if (@$_POST['myform']) { 
        echo 'Форма отправлена';
    }
    // вместо @ лучше проверить isset, empty. также- сущ.файл или нет или чтобы он ещё и создавался. 
?>
<form name='myform' action='index.php' method='post'>
    <div>
        <input type='submit' name='myform' value='Отправить' />
    </div>


</form>

