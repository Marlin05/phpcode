<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord{

    public static function tableName(){
        return 'products';
    }

  // если будем работать  с таблицей продуктов в конт.продуктов и нужно связать её с категорией
    // связ hasОne т.к. у 1 продукта не может быть 2 категорий
    /*public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }*/

}