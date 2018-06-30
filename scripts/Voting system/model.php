<?php

class Model {
    
    private $pdo; 
    
    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=mysite', 'root', '');
        } catch (PDOException $e) {
            echo 'Ошибка подключения к базе данных!';
        }
    }
    
    // создаём механизм кот. по id будет получать вопрос
    public function getPoll($id) {
        $query = 'SELECT * FROM `polls` WHERE `id` = ?';
        $poll = $this->pdo->prepare($query);
        $poll->execute([$id]);
        return $poll->fetch(PDO::FETCH_ASSOC);
    }
    
    // получаем опрос по переданному id
    //// известно id вопроса и нужно получить его все варианты
    public function getVariants($poll_id) {
        $query = 'SELECT * FROM `variants` WHERE `poll_id` = ?';
        $variants = $this->pdo->prepare($query);
        $variants->execute([$poll_id]); // передаём массив данных чтобы он подставлял парам. ?
        return $variants->fetchAll(PDO::FETCH_ASSOC); // вернуть всю таблицу с рез. в виде 2 мерн.arr
    }
    
// функция получ.голос.для вариантов
    // к прим.-сколько голос для вар.2 и 3?
    public function getVoters($variant_ids) {
        $in = str_repeat('?,', count($variant_ids) - 1).'?'; 
        $query = "SELECT * FROM voters WHERE `variant_id` IN ($in)"; // параметриз.сиквел запрос
        $voters = $this->pdo->prepare($query); // обр.к сво-ву класса п.5
        // доступ к нему возможен т.к. обращ.внутри класса 
        $voters->execute($variant_ids); // у pdo statment вызываем метод execute
        return $voters->fetchAll(PDO::FETCH_ASSOC);
    }
    // добавление голоса в бд
    public function addVoter($variant_id) {
        $query = 'INSERT INTO `voters` (`variant_id`) VALUES(?)'; // в парам.переч. все поля кот.хотим заполнить. id не нужно ук. т.к. автоинкр. VALUES(?)' - парам.сикв.запр.
        $voter = $this->pdo->prepare($query);
        return $voter->execute([$variant_id]);
    }
    
    // метод пол.объект с вопросом по variant_id
    // запрос-вернуть опрос их таблицы polls у кот. id = тому что вернёт сикв.запрос. 
    public function getPollOnVariantId($variant_id) {
        $query = 'SELECT * FROM `polls` WHERE `id` = (SELECT `poll_id` FROM `variants` WHERE `id` = ?)';
        $poll = $this->pdo->prepare($query);
        $poll->execute([$variant_id]); // выполняем запрос передавая arr с парам.
        return $poll->fetch(); // получ. массив с данными опроса
    }
    
}

?>