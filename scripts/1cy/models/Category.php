<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 03.04.2016
 * Time: 11:35
 */

namespace app\models;

use yii\db\ActiveRecord;
// т.к. имя таблицы и модели не совпадают то указываем
class Category extends ActiveRecord{

    public static function tableName(){
        return 'categories';
    }
// связываем модель категории и продукты
    // ключами массива - поле связываемой таблицы  т.е. products
   // а значение - поле основной таблицы т.е. category
    // ключ массива- parent из таблицы product
    // знач.- поле справочника на кот. мы ссылаемся т.е. поле id из category
    // связь hasMany т.к у 1 категории может быть много продуктов
 public function getProducts(){
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}