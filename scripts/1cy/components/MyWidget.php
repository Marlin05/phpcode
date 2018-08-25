<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 10.04.2016
 * Time: 10:34
 */

namespace app\components;
use yii\base\Widget; // класс для расширения

class MyWidget extends Widget{

// объявление параметра для передачи в парам.виджета 
    public $name;

// занимается нормализацией св-в
    // проверяем: передан ли парам. если не передан т.е. имя не инициал. то объявл.какое-нибудь св-во по ум.
    // обязательно выполнить род.метод init
    public function init(){
        parent::init();
  //  if( $this->name === null ) $this->name = 'Гость';
       ob_start(); // буферизируем то что ук.между begin и end
    }


    public function run(){
       $content = ob_get_clean(); // пом.буфериз.вывод
     $content = mb_strtoupper($content, 'utf-8');// переводим всё в верхний регистр
     // подключаем вид для вывода контента Привет мир
      return $this->render('my', compact('content'));
        // чтобы перем.передалась её необходимо передать в my.php 
     // в п.49 указ.парам Петя в show.php и передаём в сontent my.php
    //return $this->render('my', ['name' => $this->name]);
        //return "<h1>{$this->name}, привет, мир!</h1>";
    }

} 