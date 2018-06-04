<?php

// сериализация -преобразование объекта в строку, либо востановление объекта. применяется при сохранении инфо перед разными сессиями или запросами. альтернатива - сессии, куки
    class User {
        
        public $email;
        public $password;
        public $lt;// $last time
        
        public function __construct($email, $password) { // $passowrd $email- переменные

            // инициализация 
            $this->email = $email;
            $this->password = $password;
            $this->lt = time();
        }
        
        public function __sleep() {//вызывается перед serialize. необходимо чтобы f возвращала массив тех свойств объектов, которые мы хотим сохранить ($email  $lt) а password в файле будет отсутствовать
            return ['email', 'lt'];
        }
        
        public function __wakeup() {//преобразовать строку serialize в объект при вызове функции  $u = unserialize($str)- вызывается метод
            $this->lt = time();//обновить lt на новое время
        }
    }
    
    $user = new User('abc@mail.ru', '123'); // '123'- строка

   // $str = serialize($user); // передача в функццию serialize объект $user
    print_r($user); // что представляет из себя объект
    //создаём для каждого пользователя файл
   // $fp = fopen ($user->email, 'w'); //$user->email имя файла совпадает с email.  режим 'w'- файл открывается для записи, если он не существует то будет создан. если потом открывать таким режимом, он всё стирает. это нужно делать в разных файлах
   
    //fwrite($fp, $str); //запись в строку 
   // fclose($fp); //закрыть файл
    //$str = fread ($fp, filesize($user->email)); //вытащить строку из файла. передаем дескриптор fp и размер. cчитывается все сод.файла
    $str = file_get_contents($user->email);//получаем строку
    sleep (2);
    $u = unserialize($str); //сравниваем объекты
    print_r($u);
?>