<?php
// проверим на валидность, является ли адрес правильным. если нет, сгенерируем искл. если возникнет иск.-мы будем пытаться ловить его.
    try {
        $email = 'abc@mail.ru';
      //  if (true) throw new Exception('My Error'); // если false -ген.искл.// echo п.10
       
         if (!true) throw new Exception('My Error');//echo п.10 т.к. никаких искл.вызвано не было
         echo 'Мы прошли проверку успешно!';
    } catch (Exception $e) { // чтобы перехватить сообщение 'My Error' необх.ук.область catch. е - переменная
        echo 'Возникла ошибка: '.$e->getMessage(); // в getMessage получим то сообщ.кот.передавали в 'My Error'
    }
    finally { // блок отв.за то, что будет вып.в любом сл.
        echo '<br />Тут блок finally';
    }
    
    class User {
        private $name;
        // if (!$name) return false; - в простых прогах так лучше.
        public function setName($name) { // уст. метод
            if (!$name) throw new Exception('Invalid name');// если имя не указано, пустая стр.рег.выр.,то выбрасываем искл. с сообщ."Invalid name"
            $this->name = $name; // инициализация имени
        }
        
    }
    
    $user = new User();
    $user->setName('Igor'); // уст.имя
   //  $user->setName(''); // вываливается искл.fatal error. т.е. в этом сл.вызывается искл. внутри класса User п.20, а  обработка за пределами класса п.29
    try {
        $user->setName(''); // 
    } catch (Exception $e) {
        echo '<br />Возникла ошибка: '.$e->getMessage();
    }
?>