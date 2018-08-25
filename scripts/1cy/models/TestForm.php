<?php


namespace app\models;
//use yii\base\Model;
use yii\db\ActiveRecord;

// т.к работа с бд Model заменяется на AR
class TestForm extends ActiveRecord{
// публичные св-ва отвечают за поля формы
	// При объявлении  AR поля формы объявлять необ.
   /* public $name;
    public $email;
    public $text;*/

      public static function tableName(){
        return 'posts';
    }


 public function attributeLabels(){
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
        ];
    }

// все те данные кот. описаны в правилах модели будут автом.загружены
    // есл какой-то атрибут не описан то NULL т.к. считается не безоп.
    public function rules(){
        return [
           /* [ ['name', 'email'], 'required','message'=>'Поле обязательно' ],*/
              //[ ['name', 'email'], 'required' ],
           // т.к. email должен быть NULL, то text обязательный
              [ ['name', 'text'], 'required' ],
            //[ 'email', 'email' ],
//            [ 'name', 'string', 'min' => 2, 'tooShort' => 'Мало' ],
//            [ 'name', 'string', 'max'=> 5, 'tooLong' => 'Много' ]
          //  [ 'name', 'string', 'length' => [2,5] ],
            // собственный валидатор.кот.описан ниже
            //[ 'name', 'myRule' ],
            //[ 'text', 'trim' ],
              //[ 'email', 'email' ], //поле email должно соот. формату email
              [ 'email', 'trim' ], // если не нужно полк валидировать то safe
        ];
    }
// валидатор сработает только на сервере
  /*  public function myRule($attr){
        if( !in_array($this->$attr, ['hello', 'world']) ){
            $this->addError($attr, 'Wrong!');
        }
    }*/

} 