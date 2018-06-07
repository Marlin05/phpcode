<?php
// в отлич от интер.в трейтах в интерфейсах можно реал.но объекты создовать нельзя
//использ. трейта -значит мы берём от него все св-ва и методы. в отл.от абстр.класса можно указывать множество трейтов п.34 т.е. мы не можем создать множ.абст классов п.32 а трейтов - можем п. 35 как и реал.множ интерф.
    trait Id {
        
        protected $id; //ук. св-во. при смене имени $my_id реал.остаётся неизм.
        // 2 метода 
        public function getId() { // при смене name след. изм. name также во всех fun. 
            return $this->id; //инициализация 
        }
        
        public function setId($id) {
            $this->id = $id;
        }
        
    }
    
    trait Name {
        
        protected $name;
        
        public function getName() {
            return $this->name;
        }
        
        public function setName($name) {
            $this->name = $name;
            // if (!$this->validate ()) return false; может быть отдельный метод проверки
        }
        
    }
    // чтобы использовать трейты создаём класс
    // class User extends Id, Name {}
    class User {
        
        use Id, Name; // ключ слово use
    }
    
    class Cat {
        
        use Id, Name;
    }
    
    class Article {
        
        use Id;
    }
    
    $user = new User();// объект класса User
    $user->setId(10);
    $user->setName('Michael');
    echo $user->getId().'<br />';
    echo $user->getName();
?>