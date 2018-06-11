<?php
    try {
        throw new Exception('Error message', 1); // 'Error message'- сообщение, 1 -код сообщения
    } catch (Exception $e) { //перехват
        echo $e->getMessage().'<br />'; //получение сообщения, переданного из констр.
        echo $e->getCode().'<br />'; //метод получения кода ош.
        echo $e->getFile().'<br />'; //дир.файла, в кот.возникла данная ош.т.е. Exception
        echo $e->getLine().'<br />';//покажет строку в файле
        print_r($e->getTrace()); // возвр.стэк вызовов массив.
        echo '<br />';
        echo $e->getTraceAsString().'<br />'; // аналог только  возв.в виде строки
    }
    //заполняем стэк
    function test1() {
        throw new Exception('Error message', 1);
    }
    
    function test2() {
        test1(); // при вызове echo п.25 - искл.возникнет из этой функ.в тест 1 на стр.19
    }
    
    try {
        test2(); // затем  в echo попадаем в test2 /нагляднее ctrl +u
    } catch (Exception $e) {
        echo $e->getTraceAsString().'<br />'; // затем вернёмся на глобальный уровень
    }

    //Создание класса Exeption для своих исл.
    
    class FileException extends Exception {
        
    }
    
    class NameException extends Exception {
        
        public function __construct(int $code) { 

        //переопределение констр. чтобы убрать ненужный параметр
       //     parent::__construct('', $code); //ссылаемся на род.констр. ('', $code)- передаем род.данные
        }
    }
    //пишем простой код
    try {
        $name = '555';
        $file = 'o.txt'; //путь к файлу, кот. нет
         if (!$name) throw new NameException('Пустое имя', 1); //если имя не задано ''(пустая стр.)-> NameExeption, код ош.1
     
        if (!file_exists($file)) throw new FileException('Файл не существует', 1);
        //если мы хотим ловить и Name и file_exist, то обращаемся к род.классу Exeption -это полиморфизм т.к. Exeption может принимать много форм
            } catch (Exception $e) { // если file_exists - false -> FileException
            	// если нужно различать искл.:
        if ($e instanceof NameException) echo 'Это исключение NameException';
        elseif ($e instanceof FileException) echo 'Это исключение FileException';
        echo '<br />'.$e->getMessage();
          echo '<br />'.$e->getCode();
    }
?>