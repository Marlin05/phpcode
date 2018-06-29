<?php
//маршрутизатор, обраб.адресн.строку и вызыв.контр.и его соотв.метод.
class Route {
    
    public static function start() {//все выполн.работы нач. с этого метода
        $controller_name = 'Main'; // по умолчанию
        $action_name = 'index'; // по умол.будет откр.глав.стр.
        
        $uri = $_SERVER['REQUEST_URI'];
        $uri = substr($uri, 1); // убрать 1 сим. 0
        if ($uri) $action_name = $uri; // если uri остался к прим.гл.стр., то меняем на экшен uri. к прим. был index стал page
        // определяем наз.класса
        $controller_name = $controller_name.'Controller'; // полное имя contr
        // определяем назв.метода класса кот.хоитм вызвать
        $action_name = 'action'.$action_name; // полное имя - action_script, к прим.
        $controller = new $controller_name(); // создаём класс

        // если в классе контр.содер метод с таким именем, то  вызываем метод
        if (method_exists($controller, $action_name)) $controller->$action_name();
        else $controller->action404(); // если нет метода
    }
}

?>